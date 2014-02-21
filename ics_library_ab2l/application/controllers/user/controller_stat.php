<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_stat extends CI_Controller {
 
    function index() {
        $this->load->model("model_stat");
        $data['results'] = $this->model_stat->get_stat();
        $data['titlepage']= "Statistics";
        $this->load->helper(array('form','html'));
        
        $data['titlepage']= "Book Statistics";
        $this->load->view("user/view_header", $data);
        $this->load->view("user/view_stat",$data);
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