<?php
	class Model_log extends CI_Model {

		public function __construct()
		{
			$this->load->database();
		}

		public function get_log($log_number=FALSE)	//select statements
		{
			if ($log_number === FALSE)
			{
				$query = $this->db->get('admin_log'); //table name
				return $query->result_array();
			}
			// may value na account number
			$query = $this->db->get_where('admin_log', array('log_number' => $log_number));
			return $query->row_array();
		}
		public function add_log($message, $type)
		{
			$time = date("G:i:s");
			$sql="INSERT INTO `admin_log` (`date`, `message`, `type`, `time`) VALUES (NOW(), ".$this->db->escape($message).", ".$this->db->escape($type).", '$time')";
			$query = $this->db->query($sql) or die(mysql_error());
		}
	}
?>