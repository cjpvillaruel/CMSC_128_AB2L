<?php

	class Controller_log extends CI_Controller{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('model_log');
		}

		function index(){
			$this->load->view("view_admin_home");
			$this->show_all_log();
		}

		function show_all_log(){
			$data['log'] = $this->model_log->get_log();
			$this->load->view("view_log", $data);
		}

		function add_log($message, $type){
			$this->model_log->add_log($message, $type);
		}
	}
?>