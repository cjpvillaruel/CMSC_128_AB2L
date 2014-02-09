<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_search extends CI_Controller {
 
    function index() {
    	$data['parent'] = "Books";
    	$data['current'] = "Search";

<<<<<<< HEAD
=======

>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
    	if($this->session->userdata('logged_in')){
    		$this->load->helper(array('form','html'));
	        $this->load->view("admin/view_header",$data);
	        $this->load->view("admin/view_aside");
	        $this->load->view("admin/view_search");
	        $this->load->view("admin/view_footer");
    	}else{
	        redirect('index.php/admin/controller_admin_login', 'refresh');
    	}
        
    }
}
/* End of file home_controller.php */
/* Location: ./application/controllers/user/controller_home.php */