<?php
class Model_book extends CI_Model {
	public function select_all_book_info(){
		$query = $this->db->get('book');
		return $query->result();
	}
	/*All BOOKS Table*/
	public function get_book_authors($call_number){
		$query = $this->db->get_where('book_author', array('call_number' => $call_number));
		return $query->result();
	}
	
	public function get_book_subjects($call_number){
		$query = $this->db->get_where('book_subject', array('call_number' => $call_number));
		return $query->result();
	}
	
	/*ADD Book*/
	public function insert_book_info($call_number, $title, $year_of_pub, $type, $no_of_available, $quantity, $book_stat, $author, $subject){
		$this->db->query("INSERT INTO book values('$call_number', '$title', '$year_of_pub', '$type', $no_of_available, $quantity, $book_stat)");
		foreach ($author as $value) {
			$this->db->query("INSERT INTO book_author values('$call_number', '$value')");
		}
		foreach ($subject as $value2) {
			$this->db->query("INSERT INTO book_subject values('$call_number', '$value2')");
		}
		
	}
	
	/*UPDATE Book*/
	public function edit_book($call_number, $book){
		$query = $this->db->where('call_number', $call_number);
		$this->db->update('book', $book);
	}

	public function delete_book($call_number){
		$this->db->where('call_number', $call_number);
		$this->db->delete('book');
	}

	public function view_all($call_number){
		$query = $this->db->get_where('book', array('call_number' => $call_number));
		return $query;
	}

	function get_by_id($id){
		$this->db->where('call_number', $id);
<<<<<<< HEAD
		$query = $this->db->get('book');
		return $query->result();

=======
		return $this->db->get('book');
>>>>>>> 268f0ee5f26cb862545418d097590d4589baf09e
	}

}
?>