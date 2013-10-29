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
			$file_path = FCPATH . 'assets/download/WB_PRAN_Brochure_English_Final_May_2013.pdf';
			if (file_exists($file_path)) {
				$this->output->set_header('Content-Description: File Transfer');
				$this->output->set_content_type('application/pdf');
				header('Content-Disposition: attachment; filename=WB_PRAN_Brochure_English_Final_May_2013.pdf');
				ob_clean();		// erase the output buffer
        		flush();		// flushes the write buffers of PHP, attempts to push current output all the way to the browser
       			readfile($file_path);	// output the file - download
       			exit();
			}
		}
	}
?>