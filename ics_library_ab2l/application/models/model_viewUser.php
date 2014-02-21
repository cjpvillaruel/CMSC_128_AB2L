<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Model_viewUser extends CI_Model {
		
		public function get_user(){
			$this->db->select('first_name,middle_initial,last_name,account_number');
			$this->db->from('user_account');
			
			$query = $this->db->get();
			return $query->result();
		}
		
		public function get_info($username){
			$this->db->select('username,first_name, middle_initial,last_name,account_number,status,classification, college, course,email');
			$this->db->from('user_account');
			$this->db->where('username',$username);
			$this->db->limit(1);
			
			$query = $this->db->get();
			
			if($query->num_rows() == 1) { 
				return $query->result(); //if data is true
			} 
			else {
				return false; //if data is wrong
			}
			
		}
	}
?>