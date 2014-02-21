<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once("controller_log.php");
class Controller_view_books extends Controller_log {
 
    function index() {
    	$data['parent'] = "Books";
    	$data['current'] = "View Books";

        if($this->session->userdata('logged_in')){
    		$this->load->helper(array('form','html'));
	        $this->load->view("admin/view_header",$data);
	        $this->load->view("admin/view_aside");
	        $this->load->view("admin/view_books");
	        $this->load->view("admin/view_footer");
    	}else{
	        redirect('index.php/admin/controller_admin_login', 'refresh');
    	}
    }
}
/* End of file home_controller.php */
/* Location: ./application/controllers/user/controller_home.php */