
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Controller_logout extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('admin_model','',TRUE);
        $this->load->helper('url');
        $this->load->library(array('form_validation','session'));
    }

 
    function index() {
        $this->logout();
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