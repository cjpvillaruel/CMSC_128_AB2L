<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once("controller_log.php");
class Controller_book extends Controller_log {

	public function index()
	{
		$this->load->model('model_book');
		$data['query'] = $this->model_book->select_all_book_info();
		$data['parent'] = "Books";
    	$data['current'] = "View Books";
    	$data['user'] = $this->session->userdata('logged_in');

        if($this->session->userdata('logged_in')){
    		$this->load->helper(array('form','html'));
	        $this->load->view("admin/view_header",$data);
	        $this->load->view("admin/view_aside");
	        $this->load->view('admin/view_books', $data);
	        $this->load->view("admin/view_footer");
    	}else{
	        redirect('index.php/admin/controller_admin_login', 'refresh');
    	}
		
	}
	/*ADD BOOK FUNCTIONS*/
	function add_book(){
		$this->load->view("view_add_book");
	}
	
	public function call_add(){
		if(isset($_POST['submit'])){
			$call_number = htmlspecialchars($_POST['call_number']);
			$title = htmlspecialchars($_POST['title1']);
			$author = $_POST['author'];
			$subject = $_POST['subject'];
			$year_of_pub = htmlspecialchars($_POST['year_of_pub']);
			$type = htmlspecialchars($_POST['type1']);
			$no_of_available = htmlspecialchars($_POST['quantity']);
			$quantity = htmlspecialchars($_POST['quantity']);
			$book_stat = 0;
			$this->load->model("model_book");
			$this->model_book->insert_book_info($call_number, $title, $year_of_pub, $type, $no_of_available, $quantity, $book_stat, $author, $subject);
			
			$this->add_log("Admin 1 added a new book: $call_number", "Add Book");
			header("refresh:0;url=call_success");
		}
	}

	public function call_success(){
			echo "<script>
				alert('You have successfully add a book');
			</script>";
			redirect('index.php/admin/controller_add_books', 'refresh');
	}
	
	/*UPDATE book*/
	/*UPDATE book*/
	//EDIT
	function edit(){
		$call_number = $_POST['call_number'];
		//$call_number = str_replace("%20", " ", $call_number);
		$this->load->model('model_book');
		$book = $this->model_book->get_by_id($call_number);
		$data['book'] = $book;

		$data['query'] = $this->model_book->select_all_book_info();
		$data['parent'] = "Books";
    	$data['current'] = " Books";
    	$data['user'] = $this->session->userdata('logged_in');

        if($this->session->userdata('logged_in')){
    		$this->load->helper(array('form','html'));
	        $this->load->view("admin/view_header",$data);
	        $this->load->view("admin/view_aside");
	        $this->load->view('admin/view_edit_book', $data);
	        $this->load->view("admin/view_footer");
    	}else{
	        redirect('index.php/admin/controller_admin_login', 'refresh');
    	}
	}

	function edit_book(){
		$session_user=$this->session->userdata('username');
		$this->load->model('model_book');
		$call_number = $this->input->post('call_number1');
		$book = array(
			'title' => $this->input->post('title'),
			'year_of_pub' => $this->input->post('year_of_pub'),
			'no_of_available' => $this->input->post('no_of_available'),
			'type' => $this->input->post('type'),
			'quantity' => $this->input->post('quantity'),
		);
		
		$book_authors = $this->input->post('author');
		$book_subjects = $this->input->post('subject');
		$this->model_book->edit_book($call_number, $book, $book_authors, $book_subjects);
		$this->add_log("$session_user updated book with Call Number: $call_number", "Updated Book");
		var_dump($book);
		header("refresh:0;url=edit_success");

	}

	function edit_success(){
		echo "<script>
				alert('You have successfully edit a book');
			</script>";
			header("refresh:0;url=../controller_book");	}
	
	//DELETE
	function delete(){
		$session_user = $this->checklogin();
		$call_number = $_POST['call_number'];
		$this->model_book->delete_book($call_number);
		$this->add_log("$session_user deleted book with Call Number: $call_number", "Delete Book");
		header("refresh:0;url=../");

		
	}


}
 ?>