<?php  
	class About extends CI_Controller {
		function __construct() {
			parent::__construct();
		}

		function index() {
			$data['title'] = 'About - Program for Accountability in Nepal';
			$this->load->view('about', $data);
		}

		function download_brochure() {
			$this->load->helper('download');
			$file_name = 'PRAN_Brochure_English.pdf';
			$file_path = FCPATH . 'assets/download/PRAN_Brochure_English.pdf';
			$data = file_get_contents($file_path);
			force_download($file_name, $data);
		}
	}
?>