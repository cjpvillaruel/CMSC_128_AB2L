<?php
class Controller_reservation extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		//$this->load->view('view_admin_home');
		$this->get_All();
		$this->send_email();
	}//END OF index()

	/*Function to show all borrowed book information stored in the database */
	public function get_All(){
		$this->load->model('model_reservation');
		$data['query'] = $this->model_reservation->show_all_user_book_reservation('borrowed');
		$data['overdue'] = $this->model_reservation->show_all_user_book_reservation('overdue');
		$data['parent'] = "Books";
    	$data['current'] = "View Borrowed Books";

        if($this->session->userdata('logged_in')){
    		 $this->load->helper(array('form','html'));
	        $this->load->view("admin/view_header",$data);
	        $this->load->view("admin/view_aside");
	        $this->load->view('admin/view_reserved_books', $data);	
	        $this->load->view("admin/view_footer");
    	}else{
	        redirect('index.php/admin/controller_admin_login', 'refresh');
    	}
		
	}//END OF get_All()
	
	/*The function send_email is to send the email to the borrower with overdue materials*/
	public function send_email(){
		if(isset($_POST['notify'])){
			if(isset($_POST['email'])){
				$config = array(
				'protocol'  => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,	//25
				'smtp_user' => 'samplemail128@gmail.com',
				'smtp_pass' => 'cmsc128ab2l',
				'mailtype'  => 'html', 
				'charset'   => 'utf-8',
				'wordwrap'	=> true,
				'newline'	=> "\r\n",
				'crlf'		=> "\n"
				);//config for the email
				$account_number=$_POST['account_number'];
				$to=$_POST['email'];
				$subject='Re: Overdue Materials';
				$from_email='samplemail128@gmail.com';
				$from_name='Sample ICS Library';
				
				//Get user account in database
				$data['query'] = $this->model_reservation->get_overdue_user_info($to);
				foreach($data['query'] as $row){
					$first_name = $row->first_name;
					$middle_initial = $row->middle_initial;
					$last_name = $row->last_name;
				}
				//This will construct the body of the message to be sent to the borrower with overdue materials.
				$message = "Dear {$first_name} {$middle_initial} {$last_name},<br /><br />Please settle your library accountabilities as soon as possible.<br />Overdue Materials<br />";
				foreach($data['query'] as $row){
					$message .= "Title: {$row->title}<br />";
					$data['query1'] = $this->model_reservation->get_book_authors($row->call_number);
					$authors ="";
					foreach($data['query1'] as $authors_list){
						$authors .= "{$authors_list->author}; ";
					}
					$message .= "Author(s): {$authors}<br />";
					$message .= "Call Number: {$row->call_number}<br />";
					$message .= "Date Borrowed: {$row->date_borrowed}<br />";
					$message .= "Due Date: {$row->due_date}<br /><br />";
				}
				$message .= "If you've already settled your accountabilities, please ignore this message.<br />";
				$message .= "For inquiries, please contact the ICS Library librarian.<br /><br />";
				$message .= "Thank you!<br />ICS Library Administrator<br />";
				
				//Composing the email
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from($from_email, $from_name);
				$this->email->to($to); 
				$this->email->subject($subject);
				$this->email->message($message);
				//Send the email
				if($this->email->send()){
					unset($_POST['notify']);
					$this->model_reservation->update_user_date_notif($account_number);
					header("refresh:0;url=");
				}else{
					echo $this->email->print_debugger();
				}
				
			}//END OF if(isset($_POST['email']))
		}//END OF notify
		else if(isset($_POST['notify_all'])){
			$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,	//25
			'smtp_user' => 'samplemail128@gmail.com',
			'smtp_pass' => 'cmsc128ab2l',
			'mailtype'  => 'html', 
			'charset'   => 'utf-8',
			'wordwrap'	=> true,
			'newline'	=> "\r\n",
			'crlf'		=> "\n"
			);//config for the email
			//$account_number=$_POST['account_number'];
			//$to=$_POST['email'];
			$subject='Re: Overdue Materials';
			$from_email='samplemail128@gmail.com';
			$from_name='Sample ICS Library';
			
			//Get user account in database
			$data['result'] = $this->model_reservation->get_overdue_accounts();
			foreach($data['result'] as $recipients){
				$to = $recipients->email;
				$account_number = $recipients->account_number;
				$data['query'] = $this->model_reservation->get_overdue_user_info($to);
				foreach($data['query'] as $row){
					$first_name = $row->first_name;
					$middle_initial = $row->middle_initial;
					$last_name = $row->last_name;
				}
				
				//This will construct the body of the message to be sent to the borrower with overdue materials.
				$message = "Dear {$first_name} {$middle_initial} {$last_name},<br /><br />Please settle your library accountabilities as soon as possible.<br />Overdue Materials<br />";
				foreach($data['query'] as $row){
					$message .= "Title: {$row->title}<br />";
					$data['query1'] = $this->model_reservation->get_book_authors($row->call_number);
					$authors ="";
					foreach($data['query1'] as $authors_list){
						$authors .= "{$authors_list->author}; ";
					}
					$message .= "Author(s): {$authors}<br />";
					$message .= "Call Number: {$row->call_number}<br />";
					$message .= "Date Borrowed: {$row->date_borrowed}<br />";
					$message .= "Due Date: {$row->due_date}<br /><br />";
				}
				$message .= "If you've already settled your accountabilities, please ignore this message.<br />";
				$message .= "For inquiries, please contact the ICS Library librarian.<br /><br />";
				$message .= "Thank you!<br />ICS Library Administrator<br />";

				//Composing the email
				
				//$this->load->library('email');
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from($from_email, $from_name);
				$this->email->to($to); 
				$this->email->subject($subject);
				$this->email->message($message);
				//Send the email
				if($this->email->send()){
					unset($_POST['notify_all']);
					$this->model_reservation->update_user_date_notif($account_number);
					header("refresh:0;url=");
				}else{
					echo $this->email->print_debugger();
				}
			}
		}//END OF notify_all
		
	}//END OF send_email()

	public function extend(){
        $res_number=$_POST['res_number'];
        $this->load->model('model_reservation');
        $this->model_reservation->update_book_reservation($res_number, "extend");
        redirect('index.php/admin/controller_reservation/get_All','refresh');
    }//END OF extend()


}
?>
