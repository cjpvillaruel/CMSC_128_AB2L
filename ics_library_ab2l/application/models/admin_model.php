<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Includes the User_Model class as well as the required sub-classes
 * @package codeigniter.application.models
 */

class Admin_Model extends CI_Model
{
	/*
	* A private variable to represent each column in the database
	*/
	private $id;
	private $username;
	private $password;

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/*
	* SET's & GET's
	* Set's and get's allow you to retrieve or set a private variable on an object
	*/


	/**
		ID
	**/

	/**
	* @return int [$this->_id] Return this objects ID
	*/
	public function getId()
	{
		return $this->id;
	}

	/**
	* @param int Integer to set this objects ID to
	*/
	public function setId($value)
	{
		$this->id = $value;
	}

	/**
		USERNAME
	**/

	/**
	* @return string [$this->_username] Return this objects username
	*/
	public function getUsername()
	{
		return $this->username;
	}

	/**
	* @param string String to set this objects username to
	*/
	public function setUsername($value)
	{
		$this->username = $value;
	}

	/**
		PASSWORD
	**/

	/**
	* @return string [$this->_password] Return this objects password
	*/
	public function getPassword()
	{
		return $this->password;
	}

	/**
	* @param string String to set this objects password to
	*/
	public function setPassword($value)
	{
		$this->password = $value;
	}

	/*
	* Class Methods
	*/

	
	public function login($username, $password)
	{
		$data = array(
			'username' => $this->username,
			'password' => $this->password
		);

		//create query to connect user login database
        $this->db->select('username, password');
        $this->db->from('admin_account');
        $this->db->where('username', $username);
        $this->db->where('password', sha1($password));
        $this->db->limit(1);
         
        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) { 
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }

	}
}

