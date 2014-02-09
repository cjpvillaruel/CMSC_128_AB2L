<?php
	class Model_search extends CI_Model{
		//constructor loads the database
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		 // Finds all books that match the passed string
		 //querry must be refined so that it can support tags such as tags that are found in tags table
		function find_suggestion($str){
			$this->db->select('title
				FROM book 
				WHERE title LIKE \'%'.$str.'%\'
				or call_number LIKE \'%'.$str.'%\'
				or year_of_pub LIKE \'%'.$str.'%\'
				or call_number in
					(SELECT call_number
					FROM book_author
					WHERE author LIKE \'%'.$str.'%\')
				or call_number in
					(SELECT call_number
					FROM book_subject
					WHERE subject LIKE \'%'.$str.'%\')
				LIMIT 5
				', FALSE);
			return $this->db->get();
		}

		function addOr($query,$or_check){
			if($or_check==true) $query=$query." or ";
			return $query;
		}

		function addAnd($query,$and_check){
			if($and_check==true) $query=$query." and ";
			return $query;
		}
		//Finds all the books that match the data array
		//refine qeury so that it can fetch data of the book if it is reserved or not.
		function fetch_book_data($data,$limit,$start){
			$orCheck = false;
			$andCheck=false;
			//The first call of the function will skip the limit since we will be using it to compute for the total rows
			//this condition will be used later when we are fetching the actual data.
			if($limit>0){	//checks the limit if it is set to greater than 0.
				$this->db->limit($limit, $start);
			}
			//querry for the data fetching
			//As long as the $data['str'] is not an empty string, it will dominate over the advance search forms,
			$query='call_number, title, year_of_pub, type, no_of_available
				FROM book
				WHERE ';
			if($data['str'] !== "")
				$query=$query.'title LIKE \'%'.$data['str'].'%\'
				or call_number LIKE \'%'.$data['str'].'%\'
				or year_of_pub LIKE \'%'.$data['str'].'%\'
				or call_number in
					(SELECT call_number
					FROM book_author
					WHERE author LIKE \'%'.$data['str'].'%\')
				or call_number in
					(SELECT call_number
					FROM book_subject
					WHERE subject LIKE \'%'.$data['str'].'%\')';
			else{	//if $data['str'] is an empty string move to advance search inputs. This will call addOr to add an 'or' phrase if there are multiple inputs from the form, which is determined using orCheck variable
				
				if(isSet($data['title'])){
					$query=$query.'title LIKE \'%'.$data['title'].'%\'';
					$andCheck=true;
				}
				if(isSet($data['book_number'])){
					$query=$this->model_search->addAnd($query,$andCheck);
					$andCheck=false;
					$query=$query.'call_number LIKE \'%'.$data['book_number'].'%\'';
					$andCheck=true;
				}
				if(isSet($data['publication'])){
					$query=$this->model_search->addAnd($query,$andCheck);
					$andCheck=false;
					$query=$query.'year_of_pub LIKE \'%'.$data['publication'].'%\'';
					$andCheck=true;
				}
				if(isSet($data['author'])){
					$query=$this->model_search->addAnd($query,$andCheck);
					$andCheck=false;
					$query=$query.'call_number in
					(SELECT call_number
					FROM book_author
					WHERE author LIKE \'%'.$data['author'].'%\')';
					$andCheck=true;
				}
				if(isSet($data['subject'])){
					$query=$this->model_search->addAnd($query,$andCheck);
					$andCheck=false;
					$query=$query.'call_number in
					(SELECT call_number
					FROM book_subject
					WHERE subject LIKE \'%'.$data['subject'].'%\')';
					$andCheck=true;
				}
			}
			//execute query
			$this->db->select($query,FALSE);
			
			return $this->db->get();
		}

		function fetch_book_author($call_number){
			$query="author
			FROM book_author
			WHERE call_number LIKE '".$call_number."'";
			//execute query
			$this->db->select($query,FALSE);
			
			return $this->db->get();
		}
		
		function fetch_book($call_number){
			$query="title, call_number, year_of_pub, type, no_of_available
			FROM book
			WHERE call_number LIKE '".$call_number."'";
			//execute query
			$this->db->select($query,FALSE);
			
			return $this->db->get();
		}

		function getCurrentDate(){
			// set default timezone
			date_default_timezone_set('Asia/Manila'); // CDT

			$info = getdate();
			$date = $info['mday'];
			$month = $info['mon'];
			$year = $info['year'];
			$wday = $info['wday'];

			$current_date = array(
				'mday' => "$date",
				'mon' => "$month",
				'year' => "$year",
				'wday' => "$wday"
				);
			return $current_date;
		}

		function getExpiration($date_reserved){
			$span = 3;
			if($date_reserved['wday'] == 3 || $date_reserved['wday'] == 4 || $date_reserved['wday'] == 5){
				$span += 2;
			}
			else if($date_reserved['wday'] == 6){
				$span++;
			}
			$date2 = $date_reserved['year']."-".$date_reserved['mon']."-".$date_reserved['mday'];
			$date2 = date("Y-m-d", strtotime($date2 ."+".$span." days"));
			$date = date('d', strtotime($date2));
			$month = date('m', strtotime($date2));
			$year = date('Y', strtotime($date2));
			$wday = (($date_reserved['wday']+$span)%8)+1;
			$expired_date = array(
				'mday' => "$date",
				'mon' => "$month",
				'year' => "$year",
				'wday' => "$wday"
				);
			return $expired_date;
		}

		function add_reservation($data){
			
			$row = $this->model_search->fetch_user($data['borrower']);
			$account_number = "";
			if($row->num_rows() == 1){
				foreach($row->result() as $value){
					$account_number = $value->account_number;
				}
			}
			else if($row->num_rows() > 1){
				echo "Invalid number of result";
			}
			
			$date_reserved = getdate();
			$date_expired = $this->model_search->getExpiration($date_reserved);
			$due_date = $date_expired['year']."-".$date_expired['mon']."-".$date_expired['mday'];
			$due_date = date("Y-m-d", strtotime($due_date));
			
			$row = $this->model_search->fetch_book($data['call_number']);
			if($row->num_rows() == 1){
				foreach($row->result() as $value){
					$no_of_available = $value->no_of_available;
				}
			}
			else if($row->num_rows() > 1){
				echo "Invalid number of result";
			}

			if($no_of_available <= 0){
				$row = $this->model_search->fetch_breservation_rank($data['call_number']);
				$rank = $row->num_rows();
				$status = "waitlist";
				$rank++;
			}
			else{
				$status = "reserved";
				$rank = NULL;
			}
			$call_number = $data['call_number'];
			$newdata = array(
				'rank' => $rank,
				'status' => $status,
				'due_date' => $due_date,
				'date_borrowed' => NULL,
				'date_returned' => NULL,
				'call_number' => $call_number,
				'account_number' => $account_number
				);
			$this->db->insert('book_reservation', $newdata);
		}

		function fetch_user($username){
			$query="account_number
			FROM user_account
			WHERE username LIKE '".$username."'";
			//execute query
			$this->db->select($query,FALSE);
			
			return $this->db->get();
		}

		function fetch_breservation_rank($call_number){
			$query="status
			FROM book_reservation
			WHERE call_number LIKE '".$call_number."'
			AND status LIKE 'waitlist'";
			//execute query
			$this->db->select($query,FALSE);
			
			return $this->db->get();
		}

		function search_user($str){
			$query="account_number, username, CONCAT(first_name, ' ', middle_initial, '. ', last_name) as name, classification, college, course, status
			FROM user_account
			WHERE username LIKE '".$str."'
			or account_number LIKE '".$str."'";
			//execute query
			$this->db->select($query,FALSE);
			
			return $this->db->get();
		}

	}


/*End of model_search.php*/