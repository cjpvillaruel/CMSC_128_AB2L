<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_faq extends CI_Controller {
 
    function index() {
        $this->load->helper(array('form','html'));
        $this->load->view("user/view_header");
        $this->load->view("user/view_faq");
        $this->load->view("user/view_navigation");
        if($this->session->userdata('logged_in')){
            $this->load->view("user/view_logged_in");
        }
        else{
             $this->load->view("user/view_not_logged");
        }  
        $this->load->view("user/view_footer");
    }
}
/* End of file home_controller.php */
/* Location: ./application/controllers/user/controller_home.php */