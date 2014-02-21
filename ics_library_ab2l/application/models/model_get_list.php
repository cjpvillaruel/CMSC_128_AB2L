<?php
	class Model_get_list extends CI_Model{

	public function select_all_book_info(){
		$query = $this->db->get('book');
		return $query->result();
	}
	
	public function get_book_authors($id){
		$query = $this->db->get_where('book_author', array('id' => $id));
		return $query->result();
	}
	
	public function get_book_subjects($id){
		$query = $this->db->get_where('book_subject', array('id' => $id));
		return $query->result();
	}

	public function get_list($account,$status){
		$query= $this->db->query("SELECT b.id, b.title, b.type, br.call_number, br.res_number, br.rank,br.due_date,br.date_returned,br.date_borrowed
		FROM book_reservation br, book b, user_account u, book_call_number cn
		WHERE u.username='".$account."' 
		AND br.call_number = cn.call_number
		AND u.account_number = br.account_number
		AND cn.id = b.id
		AND br.status='".$status."'
		GROUP BY br.call_number
		ORDER BY br.due_date");

		return $query->result();
	}

	public function cancel_reservation($res_number){
		$this->db->where('res_number', $res_number);
		$this->db->delete('book_reservation');
	}

	public function update_rank($call_number){
		$this->db->query("UPDATE book_reservation SET  rank = rank-1 WHERE call_number = '".$call_number."' AND rank > 1 AND status = 'reserved' ");
	}

}
	
?> 