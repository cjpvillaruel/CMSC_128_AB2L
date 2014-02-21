

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_login extends CI_Controller {
	//http://imron02.wordpress.com/2013/06/01/simple-login-using-codeigniter-database/
	function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(array('form_validation','session'));
    }


    function index(){

        $this->login();
    }
    function login() {
    	if($this->session->userdata('logged_in')){
    		redirect(base_url(), 'refresh');
    	}else{
	        $this->load->helper(array('form','html'));
	        $data['user'] = $this->session->userdata('logged_in');
           
            $data['titlepage']= "ICS Library";
            $this->load->view("user/view_header", $data);
            $this->load->view('user/view_login'); //load view for login
            $this->load->view('user/view_navigation');
            $this->load->view("user/view_not_logged"); 
            $this->load->view('user/view_footer');
    	}
        
       
    }
}
/* End of file login_controller.php */
/* Location: ./application/controllers/user/controller_login.php */