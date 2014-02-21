<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_books extends CI_Controller {
 
    function index() {
        $this->load->helper(array('form','html'));
        $data['titlepage'] = "View all books";
        $this->load->view("user/view_header",$data);
        $this->load->model("model_get_list");
        $data['result'] = $this->model_get_list->select_all_book_info();
        $this->load->view("user/view_all_books",$data);
        $this->load->view("user/view_navigation");
    

        if($this->session->userdata('logged_in')){
            $this->load->view("user/view_logged_in");
        }
        else{
             $this->load->view("user/view_not_logged");
        }  
        // $this->load->view("user/view_all_books",$data);

        $this->load->view("user/view_footer");
    }
}
/* End of file home_controller.php */
/* Location: ./application/controllers/user/controller_home.php */