<?php  
	class About extends CI_Controller {
		function __construct() {
			parent::__construct();
		}

		function index() {
			$data['title'] = 'About - Program for Accountability in Nepal';
			$this->load->view('about', $data);
		}

		function download() {
			$file = FCPATH . 'assets/download/PRAN Brochure_English.pdf';
			$file_name = "PRAN Brochure_English";
		    if (file_exists($file)) {
				header('Content-Description: File Transfer');
				header('Content-Type: text/' . $file_name .'; name=' . $file_name . '.' . pathinfo($file, PATHINFO_EXTENSION));
				header('Content-Disposition: attachment; filename=' . $file_name . '.' . pathinfo($file, PATHINFO_EXTENSION));
				ob_clean();		// erase the output buffer
        		flush();		// flushes the write buffers of PHP, attempts to push current output all the way to the browser
       			readfile($file);	// output the file - download
       			exit();
			}
		}
	}
?>