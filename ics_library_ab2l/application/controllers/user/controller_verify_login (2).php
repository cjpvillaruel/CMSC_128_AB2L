

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Controller_verify_login extends CI_Controller {
    function __construct() {
        parent::__construct();
        //load session and connect to database
        $this->load->model('user_model','login',TRUE);
        $this->load->helper(array('form', 'url','html'));
        $this->load->library(array('form_validation','session'));
    }
 
    function index() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
         $data['i']= "fds";
           

        if($this->form_validation->run() == FALSE) {

            $this->load->view('user/view_header');
            $this->load->view('user/view_login',$data); //load view for login
            $this->load->view('user/view_navigation');
            $this->load->view('user/view_not_logged');
            $this->load->view('user/view_footer');
            } 
        else {
                //Go to private area
            redirect('index.php/user/controller_home', 'refresh');
           }       
     }
 
     function check_database($password) {
         //Field validation succeeded.  Validate against database
         $username = $this->input->post('username');
         //query the database
         $result = $this->login->login($username, $password);
         if($result) {
             $sess_array = array();
             foreach($result as $row) {
                 //create the session
                 $sess_array = array(
                     'username' => $row->username);
                 //set session with value from database
                 $this->session->set_userdata('logged_in', $sess_array);
                 }
          return TRUE;
          } else {
              //if form validate false
              $this->form_validation->set_message('check_database', 'Invalid username or password');
              return FALSE;
          }
      }
}
/* End of file c_verifylogin.php */
/* Location: ./application/controllers/c_verifylogin.php */