<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_view_users extends CI_Controller {
 
    function index() {
    	$this->load->model('model_users');
		$data['results']=$this->model_users->getAllUsers();
    	$data['parent'] = "Users";
    	$data['current'] = "View Users";

        if($this->session->userdata('logged_in')){
            $this->load->helper(array('form','html'));
            $this->load->view("admin/view_header",$data);
            $this->load->view("admin/view_aside");
            $this->load->view("admin/view_users",$data);
            $this->load->view("admin/view_footer");
        }else{
            redirect('index.php/admin/controller_admin_login', 'refresh');
        }
    }
}
/* End of file home_controller.php */
/* Location: ./application/controllers/user/controller_home.php */