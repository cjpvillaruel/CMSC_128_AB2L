<?php
	class Model_stat extends CI_Model{
		public function get_stat(){
			$sqlQuery = "(SELECT * FROM book ORDER BY book_stat DESC LIMIT 10) ORDER BY book_stat DESC;";
			$query = $this->db->query($sqlQuery);
			
			return $query->result();
		}
		
	}
?> 