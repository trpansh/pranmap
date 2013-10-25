<?php  
	class Error extends CI_Controller {
		function __construct() {
			parent::__construct();
		}

		function index() {
			$data['title'] = '404 - Program for Accountability in Nepal';
			$this->load->view('error', $data);
		}
	}
?>