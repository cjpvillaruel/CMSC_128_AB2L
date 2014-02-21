<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_stat extends CI_Controller {
 
    function index() {
    	$this->load->helper(array('form','html'));
        $this->load->model("model_stat");
        $data['results'] = $this->model_stat->get_stat();
        $data['parent'] = "Admin";
        $data['current'] = "View Statistics";

        $this->load->view("admin/view_header",$data);
        $this->load->view("admin/view_aside");
        $this->load->view("admin/view_stat",$data);
        $this->load->view("admin/view_footer");
    }
        
    
}
/* End of file home_controller.php */
/* Location: ./application/controllers/user/controller_home.php */