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
			$file_path = FCPATH . 'assets/download/PRAN_Brochure_English.pdf';
			if (file_exists($file_path)) {
				header('Content-Description: File Transfer');
				header('Content-Type: application/pdf');
				header('Content-Disposition: attachment; filename=PRAN_Brochure_English.pdf');
				ob_clean();		// erase the output buffer
        		flush();		// flushes the write buffers of PHP, attempts to push current output all the way to the browser
       			readfile($file_path);	// output the file - download
       			exit();
			}
		}
	}
?>