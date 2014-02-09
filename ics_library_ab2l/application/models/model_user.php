<!-- for database use only. -->

<?php
class Model_user extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_acct($account_number=FALSE)	//select statements
	{
		if ($account_number === FALSE)
		{
			$query = $this->db->get('user_account');
			$this->db->order_by("status", "desc");
			return $query->result();
		}
		// may value na account number
		$query = $this->db->get_where('user_account', array('account_number' => $account_number));
		$this->db->order_by("status", "desc");
		return $query->result();
	}
	
	public function remove_pending(){
		//automatic removal of 1 month pending requests
		$query = $this->db->query("DELETE 
			FROM user_account
			WHERE (status = 'pending') AND (datediff(curdate(), date_notif) >= 30)");
	}

	public function approve_user($account_number){
		$query = $this->db->query("UPDATE user_account 
			SET status='approve', date_notif=curdate() 
			WHERE account_number='{$account_number}'");
	}

	public function remove_user($account_number){
		$query = $this->db->query("DELETE 
			FROM user_account
			WHERE account_number='{$account_number}'");
	}

}
?>