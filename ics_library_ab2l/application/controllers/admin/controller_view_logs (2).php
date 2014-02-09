<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_view_logs extends CI_Controller {
 
    function index() {
    	$data['parent'] = "Admin";
    	$data['current'] = "Logs";

        if($this->session->userdata('logged_in')){
    		$this->load->helper(array('form','html'));
	        $this->load->view("admin/view_header");
	        $this->load->view("admin/view_aside");
	        $this->load->view("admin/view_logs");
	        $this->load->view("admin/view_footer");
    	}else{
	        redirect('index.php/admin/controller_admin_login', 'refresh');
    	}
    }
}
/* End of file home_controller.php */
/* Location: ./application/controllers/user/controller_home.php */