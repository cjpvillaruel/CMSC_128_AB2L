<?php
	
class Model_reservation extends CI_Model {
	/*Return all from book reservation*/
	public function show_all_book_reservation(){
		$query = $this->db->get('book_reservation');
		return $query->result();
	}
	
	/*Return necessary data from user and their conrresponding book reservations */
	public function show_all_user_book_reservation(){
		$query= $this->db->query("SELECT ua.account_number, ua.first_name, ua.middle_initial, ua.last_name, ua.date_notif, br.call_number, br.date_borrowed, br.due_date, br.date_returned, br.status, ua.email 
		FROM book_reservation br, user_account ua 
		WHERE br.account_number=ua.account_number
		AND br.status='overdue'");
		return $query->result();
	}
	
	/*return user account and reservation details*/
	public function get_overdue_user_info($email){
		$query= $this->db->query("SELECT ua.first_name, ua.middle_initial, ua.last_name, bo.title, br.call_number, br.date_borrowed, br.due_date
		FROM book_reservation br, user_account ua, book bo
		WHERE (br.account_number=ua.account_number
		AND ua.email='{$email}'
		AND bo.call_number=br.call_number
		AND br.status='overdue')");
		
		return $query->result();
	}
	
	public function get_book_authors($call_number){
		$query = $this->db->get_where('book_author', array('call_number' => $call_number));
		return $query->result();
	}
	public function update_user_date_notif($account_number){
		$date = date("Y-m-d");
		$data = array(
		'date_notif'=>$date
		);
		$this->db->where('account_number', $account_number);
		$this->db->update('user_account', $data); 
		
		//header("refresh:0;url=index");
	}

	public function get_all_overdue_info(){
		$query = $this->db->query("SELECT ua.first_name, ua.middle_initial, ua.last_name, ua.email, bo.title, br.call_number, br.date_borrowed, br.due_date, br.status
		FROM book_reservation br, user_account ua, book bo
		WHERE (br.account_number=ua.account_number
		AND bo.call_number=br.call_number
		AND br.status='overdue')");
		
		return $query->result();
	}
	
	public function get_overdue_accounts(){
		$query = $this->db->query("SELECT ua.email, ua.account_number
		FROM book_reservation br, user_account ua
		WHERE (br.account_number=ua.account_number
		AND br.status='overdue')
		GROUP BY ua.account_number");
		
		return $query->result();
	}
	
}

?>
