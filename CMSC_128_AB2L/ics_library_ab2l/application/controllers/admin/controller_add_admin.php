<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_add_admin extends CI_Controller {
 
    function index() {
    	$data['parent'] = "Users";
    	$data['current'] = "Add Admin";

        if($this->session->userdata('logged_in')){
    		$this->load->helper(array('form','html'));
	        $this->load->view("admin/view_header",$data);
	        $this->load->view("admin/view_aside");
	        $this->load->view("admin/view_add_admin");
	        $this->load->view("admin/view_footer");
    	}else{
	        redirect('index.php/admin/controller_admin_login', 'refresh');
    	}
    }
}
/* End of file home_controller.php */
/* Location: ./application/controllers/user/controller_home.php */