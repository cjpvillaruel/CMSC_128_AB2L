<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once("controller_log.php");
class Controller_book extends Controller_log {

	public function index()
	{
		$this->load->model('model_book');
		$data['query'] = $this->model_book->select_all_book_info();
		$data['parent'] = "Books";
    	$data['current'] = "View Books";

        $this->load->helper(array('form','html'));
        $this->load->view("admin/view_header",$data);
        $this->load->view("admin/view_aside");
        $this->load->view('admin/view_books', $data);
        $this->load->view("admin/view_footer");
		
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
			//header("refresh:0;url=call_success");
		}
	}

	public function call_success(){
			//$this->load->view("view_success_add_book");
	}
	
	/*UPDATE book*/
	
}
 ?>