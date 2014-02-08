<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controller_search_book extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_search');
		$this->load->library('Jquery_pagination');
	}

	function index(){
		$data['title'] = 'Search Page';
		$data['borrower'] = $this->session->userdata('borrower');
		$this->load->helper(array('form','html'));
        $this->load->view("user/view_header");
        $this->load->view("user/view_search");
        $this->load->view("user/view_navigation");
        if($this->session->userdata('logged_in')){
            $this->load->view("user/view_logged_in");
        }
        else{
             $this->load->view("user/view_not_logged");
        }  
        $this->load->view("user/view_footer");
	}

	//AJAX. DO NOT TOUCH IF YOU ARE NOT FAMILIAR WITH IT. Nah.
	//autosuggest function. Fetches data from server and loads it using AJAX.
	public function autosuggest(){
		//for escape characters
		$str = addslashes($this->input->post('str'));
		$row = $this->model_search->find_suggestion($str);
		// echo a list where each li has a set_activity function bound to its onclick() event
		
		foreach ($row->result() as $activity) {
			echo '<li onclick="set_activity(\''.addslashes($activity->title).'\'';
			echo ');" class="suggested_list">'.$activity->title.'</li>'; 
		}
	}

	//fetches the data of the books matching $data
	public function get_book_data(){
		//add slashes for escape characters
		//scans all of the inputs form the form
		$this->input->post('serialised_form');
		//input declaration using POST in form
		$data['str'] = addslashes($this->input->post('search_input'));
		//since input from the form are passed as an empty string, there is no good in using isSet() function
		if($this->input->post('title')!=="") $data['title'] = addslashes($this->input->post('title'));
		if($this->input->post('author')!=="") $data['author'] = addslashes($this->input->post('author'));
		if($this->input->post('book_number')!=="") $data['book_number'] = addslashes($this->input->post('book_number'));
		if($this->input->post('publication')!=="") $data['publication'] = addslashes($this->input->post('publication'));
		if($this->input->post('subject')!=="") $data['subject'] = addslashes($this->input->post('subject'));
		// getting the number of rows for of a query for computing the total row
		$row_number=$this->model_search->fetch_book_data($data,0,0);
		//configuration of the ajax pagination  library.
		$config['base_url'] = base_url() + 'index.php/user/controller_search_book/get_book_data';//http://localhost/zurbano_module/index.php/controller_search_book/get_book_data';		//EDIT THIS BASE_URL IF YOU ARE USING A DIFFERENT URL. 
		$config['total_rows'] = $row_number->num_rows();
		$config['per_page'] = '5';
		$config['div'] = '#list_area';
		$config['additional_param']  = 'serialize_form()';
		$page=$this->uri->segment(3);		// splits the URI segment by /
		//fetches data from database.
		$row = $this->model_search->fetch_book_data($data,$config['per_page'],$page);
		//display data from database
		if($row->num_rows()>0){
			foreach($row->result() as $book_details){
				echo "<div class='book_details'>
				<li><h3>Title: $book_details->title</h3></li>
				<li>Call Number: $book_details->call_number</li>
				<li>Author/s:<br/>";
				$arow = $this->model_search->fetch_book_author($book_details->call_number);
				//display data from database
				if($arow->num_rows()>0){
					foreach($arow->result() as $abook_details){
						echo "$abook_details->author<br/>";
					}
				}
				else{}
				echo "</li>
				<li>Year of Publication: $book_details->year_of_pub</li>
				<li>Type: $book_details->type</li>";
				if($book_details->no_of_available == 0){	//if book is not available
					//put the transaction code here
					//WAITLIST TRANSACTION CODE HERE
					echo"<li>THIS IS BOOK IS NOT AVAILABLE</li>";
				}else{	
					//and if book is available
					//RESERVE TRANSACTION CODE HERE
					echo "<a href='/zurbano_module/index.php/controller_reserve_book/verify_login/$book_details->call_number'><input type='button' name='reservebutton' id='reservebutton' value='Reserve Book'></a>";
				}
				echo "</div>";
			}
		}else{
			echo "Book does not exist in out library";
		}
		//initialize the configuration of the ajax_pagination
		$this->jquery_pagination->initialize($config);
		//create links for pagination
		echo $this->jquery_pagination->create_links();
	}
}