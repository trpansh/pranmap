<?php 
	class Map extends CI_Controller {
	
		public function __construct() {
			parent::__construct();
		}
	
		public function index() {
			$this->load->helper('form');
			$data['title'] = 'Program for Accountability in Nepal';
			$this->output->cache(2);
			$this->load->view('map', $data);
		}
	
	}
?>