<?php
	class Model_get_list extends CI_Model{
		public function book_reserve($account){
			$sqlQuery = "SELECT GROUP_CONCAT(DISTINCT s.subject SEPARATOR ',') as subject,
							GROUP_CONCAT(DISTINCT a.author SEPARATOR 'and ') as author,
							i.title,i.type,o.status 
							FROM user_account u, book i,book_reservation o, book_author a, book_subject s 
							WHERE u.username = '".$account."'
							AND u.account_number=o.account_number 
							AND o.call_number=i.call_number 
							AND i.call_number=a.call_number 
							AND i.call_number=s.call_number 
							AND o.status = 'reserved' 
							GROUP BY i.call_number";
			$query = $this->db->query($sqlQuery);
			
			return $query->result();
		}
		public function book_borrowed($account){
			$sqlQuery = "SELECT GROUP_CONCAT(DISTINCT s.subject SEPARATOR ',') as subject,
							GROUP_CONCAT(DISTINCT a.author SEPARATOR 'and ') as author,
							i.title,i.type,o.date_borrowed,o.due_date,o.status 
							FROM user_account u, book i,book_reservation o, book_author a, book_subject s 
							WHERE u.username = '".$account."' 
							AND u.account_number=o.account_number 
							AND i.call_number=o.call_number 
							AND o.call_number=a.call_number 
							AND o.call_number=s.call_number 
							AND date_borrowed IS NOT NULL
							GROUP BY i.call_number";
			$query = $this->db->query($sqlQuery);
			
			return $query->result();
		}
	}
?> 