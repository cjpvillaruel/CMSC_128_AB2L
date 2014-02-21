<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_register extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('model_register');
    }
 
    function index() {
        $this->load->helper(array('form','html'));
       
        $data['titlepage']= "Register";
        $this->load->view("user/view_header", $data);
        $this->load->view("user/view_register");
        $this->load->view("user/view_navigation");
        if($this->session->userdata('logged_in')){
            $this->load->view("user/view_logged_in");
        }
        else{
             $this->load->view("user/view_not_logged");
        }  
        $this->load->view("user/view_footer");
    }

    public function registration()
    {
          $this->load->library('form_validation');
          // field name, error message, validation rules
          $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|xss_clean');
          $this->form_validation->set_rules('minit', 'Middle Initial', 'trim|required|xss_clean');
          $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|xss_clean');

           $this->form_validation->set_rules('stdNum', 'Student Number', 'trim|required|min_length[10]|alpha_dash|xss_clean');
          $this->form_validation->set_rules('college', 'College', 'trim|min_length[3]|alpha|xss_clean');
          $this->form_validation->set_rules('course', 'Course', 'trim|min_length[3]|xss_clean');
          $this->form_validation->set_rules('classi', 'Classification', 'trim|alpha|xss_clean');
          
          $this->form_validation->set_rules('eadd', 'Your Email', 'trim|required|valid_email');

          $this->form_validation->set_rules('uname', 'Username', 'trim|required|min_length[4]|alpha_dash|xss_clean');
          $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[5]|max_length[32]|alpha_numeric');
          $this->form_validation->set_rules('cpass', 'Password Confirmation', 'trim|required|matches[pass]');

          if($this->form_validation->run() == FALSE)
          {
           $data['msg'] = validation_errors();
           $this->success($data); 
          }
          else
          {
            $this->model_register->add_user();
            $data['msg'] = "You successfully registered an account. You may proceed to ICS library to activate it! ";
            $this->success($data);
          }
    }

    function success($data) {
        $data['titlepage']= "Register";
        $this->load->helper(array('form','html'));
        $this->load->view("user/view_header",$data);
        $this->load->view("user/view_register",$data);
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