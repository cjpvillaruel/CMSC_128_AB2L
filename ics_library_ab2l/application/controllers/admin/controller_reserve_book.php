<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_reserve_book extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('model_reserve_book');
	}

	function index(){
		$data['page_title'] = 'Reservation Page';
		$data['id'] = urldecode($this->session->userdata('id'));
		$row=$this->model_reserve_book->fetch_book($data['id']);
		if($row->num_rows()>0){
			foreach($row->result() as $book_details){
				$data['title'] = $book_details->title;
				$data['year_of_pub'] = $book_details->year_of_pub;
				$data['type'] = $book_details->type;
				$newdata = array();
				$arow = $this->model_reserve_book->fetch_book_author($data['id']);
				//display data from database
				if($arow->num_rows()>0){
					foreach($arow->result() as $abook_details){
						array_push($newdata, $abook_details->author);
					}
				}
				else{}
				$data['author'] = $newdata;	
			}
		}
		$data['borrower'] = $this->session->userdata('borrower');
		date_default_timezone_set('Asia/Manila'); // CDT
		$data['date_reserved'] = getdate();
		$data['date_expire'] = $this->model_reserve_book->getExpiration($data['date_reserved']);
		$data['parent'] = "Books";
    	$data['current'] = "Reserve";

        $this->load->helper(array('form','html'));
        $this->load->view("admin/view_header",$data);
        $this->load->view("admin/view_aside");
        $this->load->view("admin/view_reserve_book", $data);
        $this->load->view("admin/view_footer");
	}

	function verify_login($id){
		if($this->session->userdata('logged_in') == FALSE){
			echo "This should redirect to login page";
		}
		else{
			$id = urldecode($id);
			$newdata = array(
				'id' => $id
				);
			$this->session->set_userdata($newdata);
			redirect('index.php/admin/controller_reserve_book');
		}
	}

	function confirm_reservation(){
		if($this->session->userdata('id') != FALSE && $this->session->userdata('borrower') != FALSE){
			$data['id'] = $this->session->userdata('id');
			$data['borrower'] = $this->session->userdata('borrower');
			$row = $this->model_reserve_book->fetch_book($data['id']);
			if($row->num_rows() == 1){
				foreach ($row->result() as $value) {
					$no_of_available = $value->no_of_available;
				}
			}
			if($no_of_available > 0){
				$this->model_reserve_book->add_reservation($data);
				$this->session->unset_userdata('call_number');
				if($this->session->userdata('logged_as_admin')){
					$this->session->unset_userdata('borrower');
				}
				redirect('index.php/admin/controller_reserve_book/success');
			}
			else{
				echo "kulang na";
			}
		}
		else{
			if($this->session->userdata('logged_as_admin')){
				$this->session->unset_userdata('call_number');
				$this->session->unset_userdata('borrower');
				redirect('controller_search_book/logged_as_admin');
			}
			else if($this->session->userdata('logged_as_user')){
				$this->session->unset_userdata('call_number');
				redirect('controller_search_book/logged_as_user');
			}
			else{
				$this->session->unset_userdata('call_number');
				$this->session->unset_userdata('borrower');
				redirect('controller_search_book');
			}
		}
		
	}

	function success(){
		echo "Success!";
	}
}