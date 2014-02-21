<?php
	
class Model_reservation extends CI_Model {
	/*Return all from book reservation*/
	public function show_all_book_reservation(){
		$query = $this->db->get('book_reservation');
		return $query->result();
	}
	
	/*Return necessary data from user and their conrresponding book reservations */
	public function show_all_user_book_reservation($status){
		$query= $this->db->query("SELECT ua.account_number, ua.first_name, ua.middle_initial, ua.last_name, ua.date_notif, br.res_number,br.call_number, br.date_borrowed, br.due_date, br.date_returned, br.status, ua.email 
		FROM book_reservation br, user_account ua 
		WHERE br.account_number=ua.account_number
		AND br.status='$status'");
		return $query->result();
		return $query->result();
	}
	
	/*return user account and reservation details*/
	public function get_overdue_user_info($email){
		$query= $this->db->query("SELECT ua.first_name, ua.middle_initial, ua.last_name, 
		br.call_number, br.date_borrowed, br.due_date,
		bo.title 
		FROM book_reservation br, user_account ua, book bo
		WHERE (br.account_number=ua.account_number
		AND ua.email='{$email}'
		AND bo.call_number=br.call_number
		AND br.status='overdue')");
		
		return $query->result();
	}
	
	public function get_book_authors($id){
		$query = $this->db->get_where('book_author', array('id' => $id));
		return $query->result();
	}
	public function update_user_date_notif($account_number){
		$date = date("Y-m-d");
		$data = array(
		'date_notif'=>$date
		);
		$this->db->where('account_number', $account_number);
		$this->db->update('user_account', $data); 
	}

	public function get_all_overdue_info(){
		$query = $this->db->query("SELECT ua.first_name, ua.middle_initial, ua.last_name, ua.email, bo.title, br.call_number, br.date_borrowed, br.due_date, br.status
		FROM book_reservation br, user_account ua, book bo
		WHERE (br.account_number=ua.account_number
		AND bo.call_number=br.call_number
		AND br.status='overdue')");
		
		return $query->result();
	}
	
	public function get_overdue_accounts(){
		$query = $this->db->query("SELECT ua.email, ua.account_number
		FROM book_reservation br, user_account ua
		WHERE (br.account_number=ua.account_number
		AND br.status='overdue')
		GROUP BY ua.account_number");
		
		return $query->result();
	}
	public function change_book_status($call_number, $action){
		$this->db->select('id');
		$this->db->where('call_number', $call_number);
		$id = $this->db->get('book_call_number')->result();
		$id = $id[0]->id;
		$this->db->select('no_of_available');
		$this->db->where('id', $id);
		$status = $this->db->get('book')->result();
		$status = $status[0]->no_of_available;
		if($action == "returned"){
			$status += 1;
			$data = array(
			'no_of_available' => "$status"
			);
		}elseif($action == "reserved"){
			$status -= 1;
			$data = array(
			'no_of_available' => "$status"
			);
		}
		$this->db->where('id', $id);
		$this->db->update('book', $data);
	}
	
	public function update_book_reservation($res_number, $action){
		$now = date("Y-m-d");
		$date = new DateTime($now);
		$date->add(new DateInterval('P14D'));
		$date = $date->format('Y-m-d');
		
		if($action == "extend"){
			$data = array(
				'status' => "borrowed",
				'due_date' => "$date"
			);
		}else if($action == "reserved"){
			$data = array(
				'status' => "borrowed",
				'due_date' => "$date",
				'date_borrowed' => "$now"
			);
		}else if($action == "returned"){
			$data = array(
				'status' => "$action",
				'date_returned' => "$now"
			);
		}
		$this->db->where('res_number', $res_number);
		$this->db->update('book_reservation', $data);
		
		if($action !== "extend"){
			$this->db->select('call_number');
			$this->db->where('res_number', $res_number);
			$call_number = $this->db->get('book_reservation')->result();
			$this->model_reservation->change_book_status($call_number[0]->call_number, $action);
		}
	}
	
	public function remove_pending(){
		//automatic removal of 1 month pending requests
		$query = $this->db->query("DELETE 
			FROM book_reservation
			WHERE (status = 'waitlist') AND (datediff(curdate(), due_date) >= 3)");
	}
	
	public function delete_book_reservation($res_number){
		$this->db->where('res_number', $res_number);
		$this->db->delete('book_reservation');
	}
}

?>
