<?php
	class Contact extends CI_Controller {
		function __construct() {
			parent::__construct();
		}

		function index() {
			$data['title'] = 'Contact - Program for Accountability in Nepal';
			$this->load->view('contact', $data);
		}
	}
?>