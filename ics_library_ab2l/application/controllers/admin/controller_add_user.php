<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_add_user extends CI_Controller {
 
    function index() {
    	$data['parent'] = "Users";
    	$data['current'] = "Add Users";

        $this->load->helper(array('form','html'));
        $this->load->view("admin/view_header",$data);
        $this->load->view("admin/view_aside");
        $this->load->view("admin/view_add_user");
        $this->load->view("admin/view_footer");
    }
}
/* End of file home_controller.php */
/* Location: ./application/controllers/user/controller_home.php */