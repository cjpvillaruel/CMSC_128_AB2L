<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_view_books extends CI_Controller {
 
    function index() {
    	$data['parent'] = "Books";
    	$data['current'] = "View Books";

        $this->load->helper(array('form','html'));
        $this->load->view("admin/view_header",$data);
        $this->load->view("admin/view_aside");
        $this->load->view("admin/view_books");
        $this->load->view("admin/view_footer");
    }
}
/* End of file home_controller.php */
/* Location: ./application/controllers/user/controller_home.php */