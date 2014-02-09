<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once("controller_log.php");
class Controller_announcement extends Controller_log {

	public function index()
	{
		$data['parent'] = "Admin";
    	$data['current'] = "View Announcement";
		if($this->session->userdata('logged_in')){
    		$this->load->helper(array('form','html'));
	        $this->load->view("admin/view_header",$data);
	        $this->load->view("admin/view_aside");
	        $this->load->view("admin/view_announcements.php");
	        $this->load->view("admin/view_footer");
    	}else{
	        redirect('index.php/admin/controller_admin_login', 'refresh');
    	}
	}
	
	public function viewForm(){
		//$this->load->view("admin/view_add_announcement.php");

		if(isset($_POST["add"]))
		{
			$this->writeToFile();
		}

		$data['parent'] = "Admin";
    	$data['current'] = "Add Announcement";
    	$data['user'] = $this->session->userdata('logged_in');

        if($this->session->userdata('logged_in')){
    		$this->load->helper(array('form','html'));
	        $this->load->view("admin/view_header",$data);
	        $this->load->view("admin/view_aside");
	        $this->load->view("admin/view_add_announcement.php");
	        $this->load->view("admin/view_footer");
    	}else{
	        redirect('index.php/admin/controller_admin_login', 'refresh');
    	}
	}
	
	public function deleteAll(){
		if(isset($_POST["delete_all"]))
		{
			//procedure to delete all announcements
			//just empty the texy file
		}
	}
	
	public function writeToFile(){
		$status = 1;

		if(isset($_POST["add"]))
		{
			$title = htmlspecialchars($_POST["title"]);	
			$content = nl2br(htmlspecialchars($_POST["content"]));
			$date = date('M-d-Y');
			$time = date("G:i:s");
				
			if(trim($content) == '')
			{
				$status = 0;
				echo "You did not fill out the required fields.";
			}

			//save content to string
			//overwrite the text file with the new announcement

			if($status == 1){
				$txt_file = file_get_contents('./application/announcements.txt');
				$fp = fopen('./application/announcements.txt', "w");
				$savestring = "*" . $date ."-". $time . "^" . $title . "#" . $content;
				fwrite($fp, $savestring);
				fwrite($fp, $txt_file);
				fclose($fp);
				echo "<p>Your data has been saved in a text file!</p>";
				//$counter++;
				$this->add_log("Admin 1 added a new announcement", "Add Announcement");
				unset($_POST["add"]);
				header("refresh:0;url=");
			}
			
		}
	}
	
	public function find(){
		if(isset($_POST["edit"]))
		{
			$id = htmlspecialchars($_POST["date"]);
			$flag = 0;
			$txt_file = file_get_contents('./application/announcements.txt');
			$rows = explode("*", $txt_file);
			array_shift($rows);
			echo $id;
			foreach($rows as $row => $data)
			{
				$data1 = explode("^",$data);
				$info[$row]['date'] = $data1[0];
				$info[$row]['tc'] = $data1[1];

				if($data1[0] == $id){
					$flag = 1;
				}

				array_shift($data1);

				foreach($data1 as $row => $data2)
				{
					$row_data = explode('#', $data2);
					$info[$row]['title'] = $row_data[0];
					$info[$row]['content'] = $row_data[1];
					if($flag == 1){
						$title = $row_data[0];
						$content = $row_data[1];
					}
				}

				if($flag == 1){
					break;
				}
			}

			/*
			Saves the id, title, and content to an array and pass it to the view.
			*/

			$entry['id'] = $id;
			$entry['title'] = $title;
			$entry['content'] = $content;
		
			$this->load->view("view_edit_announcement", $entry);
		}else if(isset($_POST["delete"])){
			echo "Put the function for deleting announcement here";
		}
	}
	
	public function saveChanges(){
		$status = 1;

		if(isset($_POST["save"]))
		{
			$new_title = htmlspecialchars($_POST["title"]);	
			$new_content = nl2br(htmlspecialchars($_POST["content"]));
			$new_date = date('M-d-Y');
			$new_time = date("G:i:s");
				
			if(trim($new_content) == '')
			{
				$status = 0;
				echo "You did not fill out the required fields.";
			}

			if($status == 1){
				$fp = fopen('./application/announcements.txt', "a");
				$savestring = "*" . $new_date ."-". $new_time . "^" . $new_title . "#" . $new_content;
				fwrite($fp, $savestring);
				fclose($fp);
			//	echo "<p>Your data has been updated!</p>";
				$this->add_log("Admin 1 updated an announcement", "Update Announcement");
				header("refresh:0;url=../controller_announcement/");
			}
		}
	}
}
