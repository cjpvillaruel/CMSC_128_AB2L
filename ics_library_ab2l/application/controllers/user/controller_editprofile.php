<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class controller_editprofile extends CI_Controller {
 

    public function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('model_viewUser');
        }

    function index() {
        $this->load->helper(array('form','html'));
        if($this->session->userdata('logged_in')){
               $data['username']= $this->session->userdata('logged_in')['username'];
                //get the details of the user
               $user_details = $this->model_viewUser->get_info($data['username']);
             //  var_dump($user_details[0]['classification']);

               foreach ($user_details as $user) {
                  $data['user_details']=$user;
                  break;
               }

            $data['name']= $data['user_details']->first_name." ".$data['user_details']->middle_initial.". ". $data['user_details']->last_name;
              $data['titlepage']= $data['name'];
        }
        else
             redirect('index.php/user/controller_login', 'refresh');
       

      
        $this->load->view("user/view_header",$data);
        if($this->session->userdata('logged_in')){
                $this->load->view("user/view_profile",$data);
        }
        else
             redirect('index.php/user/controller_login', 'refresh');
        $this->load->view("user/view_navigation");
        $this->load->view("user/view_logged_in");
         
        

      
        $this->load->view("user/view_footer");
    }

    public function viewInfo($number){
            //$data['title']= 'Home';
           
            $value['info'] = $this->modelviewUser->getInfo($number);
            $this->load->view('viewAccount',$value);
        }
}
/* End of file controller_editprofile.php */
/* Location: ./application/controllers/user/controller_editprofile.php */