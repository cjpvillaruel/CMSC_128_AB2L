<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_contact extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('user_model','',TRUE);
        $this->load->helper('url');
        $this->load->library(array('form_validation','session'));
    }

 
    function index() {
        $this->load->helper(array('form','html'));
       
        $data['titlepage']= "Contact Us";
        $this->load->view("user/view_header", $data);
        $this->load->view("user/view_contact");
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