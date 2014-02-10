<?php

	class Controller_log extends CI_Controller{
		
		public function __construct()
		{
			parent::__construct();
		}

		function index(){
			$this->show_all_log();
		}

		function show_all_log(){
			$this->load->model('model_log');
			$data['log'] = $this->model_log->get_log();
			$data['parent'] = "Admin";
    		$data['current'] = "View Logs";

    	if($this->session->userdata('logged_in')){
    		$this->load->helper(array('form','html'));
	        $this->load->view("admin/view_header",$data);
	        $this->load->view("admin/view_aside");
	        $this->load->view("admin/view_log",$data);
	        $this->load->view("admin/view_footer");
    	}else{
	        redirect('index.php/admin/controller_admin_login', 'refresh');
    	}
		
		}

		function add_log($message, $type){
			$this->load->model('model_log');
			$this->model_log->add_log($message, $type);
		}
	}
?>