<?php
class Model_users extends CI_Model{

/*
Model for viewing all users existing in the db.
Query used was SELECT from the table 'user_account'.
*/

function getAllUsers(){
	$sqlQuery = "SELECT account_number, first_name, middle_initial, last_name, 
					course, email,classification, status FROM user_account
					ORDER BY status desc";
	$query = $this->db->query($sqlQuery);
	return $query->result();
	}

function userSearch($s_user){
	$sqlQuery = "SELECT account_number, first_name, middle_initial, last_name, 
					course, email,classification, status FROM user_account
					WHERE account_number LIKE '".$s_user."'
					or email LIKE '".$s_user."'";
	$query = $this->db->query($sqlQuery);

	return $query->result();
}
}

?>