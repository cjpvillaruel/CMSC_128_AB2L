

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_admin_login extends CI_Controller {
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
    		redirect('index.php/admin/controller_book', 'refresh');
    	}else{
	        $this->load->helper(array('form','html'));
	        $this->load->view('admin/view_login'); //load view for login
    	}
        
       
    }
}
/* End of file controller_admin_login.php */
/* Location: ./application/controllers/admin/controller_admin_login.php */