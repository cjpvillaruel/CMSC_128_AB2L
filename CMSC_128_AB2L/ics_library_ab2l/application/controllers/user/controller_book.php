<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_book extends CI_Controller {
	
	public function index()
	{
		$this->user_reserved_list();
		
	}
	public function user_reserved_list(){
		$this->load->helper(array('form','html'));
		if($this->session->userdata('logged_in')){
		
		$session_data = $this->session->userdata('logged_in');
		$acc = $session_data['username'];						
		$data['title'] = $acc." :: Reserved Books";
		$this->load->model("model_get_list");
		
		$data['result'] = $this->model_get_list->book_reserve($acc);
        $this->load->view("user/view_header");
        $this->load->view("user/view_reserved_books",$data);
        $this->load->view("user/view_navigation");
        if($this->session->userdata('logged_in')){
            $this->load->view("user/view_logged_in");
        }
        else{
             $this->load->view("user/view_not_logged");
        }  
        $this->load->view("/user/view_footer");
        }else{
        //If no session, redirect to login page
            redirect('index.php/user/controller_login', 'refresh');
        }
	}
		public function user_borrowed_list(){
		
		if($this->session->userdata('logged_in')){
		
		$session_data = $this->session->userdata('logged_in');
		$acc = $session_data['username'];						
		$data['title'] = $acc." :: Borrowed Books";
		$this->load->model("model_get_list");
		
		$data['result'] = $this->model_get_list->book_borrowed($acc);
		$this->load->view("user/view_header");
        $this->load->view("user/view_borrowed_books",$data);
        $this->load->view("user/view_navigation");
        if($this->session->userdata('logged_in')){
            $this->load->view("user/view_logged_in");
        }
        else{
             $this->load->view("user/view_not_logged");
        }  
        $this->load->view("/user/view_footer");
		}else{
        //If no session, redirect to login page
            redirect('index.php/user/controller_login', 'refresh');
        }
	}
}
?>