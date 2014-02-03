
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*Controller for Model model_reserved.php

function: pass the results from the getAllReserved function stored in result into $data
		  which will be utilized by the view (view_reserved.php) */

class Controller_reserved extends CI_Controller {

	public function index(){
		$this->getValues();
	}

	public function getValues(){
		$this->load->model('model_reserved');
		$data['results']=$this->model_reserved->getAllReserved();
		$this->load->view("admin/view_reserved", $data);
	}
}