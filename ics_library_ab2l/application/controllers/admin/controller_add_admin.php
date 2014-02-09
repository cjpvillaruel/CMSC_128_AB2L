<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
<<<<<<< HEAD

/*
from Aristotle Martinez Register Module
*/
include_once("controller_log.php");
class Controller_add_admin extends Controller_log{
    public function __construct(){
        parent::__construct();
        $this->load->model('model_add_admin');
    }

    function index(){
        $data['parent'] = "Users";
        $data['current'] = "Add Admin";

        if($this->session->userdata('logged_in')){
            $this->load->helper(array('form','html'));
            $this->load->view("admin/view_header",$data);
            $this->load->view("admin/view_aside");
            $this->load->view("admin/view_add_admin");
            $this->load->view("admin/view_footer");
        }else{
            redirect('index.php/admin/controller_admin_login', 'refresh');
        }
    }
    
    function registration(){
        $this->load->library('form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('admin_key', 'Administrator Key', 'trim|required|alpha|xss_clean');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|xss_clean');
        $this->form_validation->set_rules('minit', 'Middle Initial', 'trim|required|xss_clean');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|xss_clean');
        $this->form_validation->set_rules('eadd', 'Your Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('uname', 'Username', 'trim|required|min_length[4]|alpha_dash|xss_clean');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[5]|max_length[32]|alpha_numeric');
        $this->form_validation->set_rules('cpass', 'Password Confirmation', 'trim|required|matches[pass]');
        $this->form_validation->set_rules('parent_key', 'Parent Key', 'trim|required|alpha|xss_clean');

        if($this->form_validation->run() == FALSE){
            echo "<script>alert('ERROR! $msg')</script>";
            header('refresh:0;url=');
        }
        else{
            $this->model_add_admin->add_admin();
            echo "<script>alert('You have successfully added another admin account');</script>";
            redirect('index.php/admin/controller_book', 'refresh');
        }
    }
    function redirectPage(){
        if(isset($_POST['cancelAdd'])){
            header("refresh:0;url='controller_admin_login'");
        }
    }
}
?>
=======
class Controller_add_admin extends CI_Controller {
 
    function index() {
    	$data['parent'] = "Users";
    	$data['current'] = "Add Admin";

        if($this->session->userdata('logged_in')){
    		$this->load->helper(array('form','html'));
	        $this->load->view("admin/view_header",$data);
	        $this->load->view("admin/view_aside");
	        $this->load->view("admin/view_add_admin");
	        $this->load->view("admin/view_footer");
    	}else{
	        redirect('index.php/admin/controller_admin_login', 'refresh');
    	}
    }
}
/* End of file home_controller.php */
/* Location: ./application/controllers/user/controller_home.php */
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
