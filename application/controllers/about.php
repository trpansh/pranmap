<?php  
	class About extends CI_Controller {
		function __construct() {
			parent::__construct();
		}

		function index() {
			$data['title'] = 'About - Program for Accountability in Nepal';
			$this->load->view('about', $data);
		}

		function download($file_name="") {
		    $file_path = site_url() . 'assets/download/' . $file_name;
		    header('Content-Type: application/octet-stream');
		    header("Content-Disposition: attachment; filename=" . $file_name);
		    ob_clean();
		    flush();
		    readfile($file_path);
		    exit();
		}
	}
?>