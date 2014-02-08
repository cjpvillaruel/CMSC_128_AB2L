
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_admin_home extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('admin_model','',TRUE);
        $this->load->helper('url');
        $this->load->library(array('form_validation','session'));
    }

 
    function index() {
        $this->load->helper(array('form','html'));
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];   
            

            $this->form_validation->set_rules('new_user_name', 'username', 'callback_new_username_check');
            $this->load->view("admin/view_admin_header");
            $this->load->view("admin/view_admin_home", $data);    
      
        } else {
        //If no session, redirect to login page
            redirect('admin/controller_admin_login', 'refresh');
        }
    }
 
   
    function logout() {
         //remove all session data
         $this->session->unset_userdata('logged_in');
         $this->session->sess_destroy();
         redirect('admin/controller_admin_home', 'refresh');
     }
 
}
/* End of file controller_admin_home.php */
/* Location: ./application/controllers/admin/controller_admin_home.php */