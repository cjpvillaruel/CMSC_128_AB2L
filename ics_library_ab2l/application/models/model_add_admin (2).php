<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_add_admin extends CI_Model {

 public function __construct(){
    $this->load->database();
 }

 public function add_admin()
 {
  $data=array(
	  'admin_key'=>$this->input->post('admin_key'),
    'first_name'=>$this->input->post('fname'),
    'middle_initial'=>$this->input->post('minit'),
    'last_name'=>$this->input->post('lname'),
   
    'email'=>$this->input->post('eadd'),
    'username'=>$this->input->post('uname'),

    'password'=>sha1($this->input->post('pass')),	
	  'parent_key'=>$this->input->post('parent_key')
  );
  
  $this->db->insert('admin_account',$data);
  echo "ADDED!";
 }
}
?>