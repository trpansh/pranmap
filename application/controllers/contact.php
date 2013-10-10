<?php
	class Contact extends CI_Controller {
		function __construct() {
			parent::__construct();
		}

		function index() {
			if ($this->input->post()) {
				// Email Validation
				$this->load->library('form_validation');
				$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email');				
				if ($this->form_validation->run() == TRUE) {
					// Email SMTP
					$config = array(
								'protocol' => 'smtp',
								'smtp_host' => 'smtp.wlink.com.np',
								'wordwrap' => TRUE,
								'wrapchars' => 95,
								'mailtype' => 'text',
								'charset' => 'utf-8',
								'validate' => TRUE,
								'crlf' => "\r\n",
								'newline' => "\r\n"
							);
					
					$this->load->library('email');
					$this->email->initialize($config);

					$name = $this->input->post('name');
					$email = $this->input->post('email');
					$message = $this->input->post('message');

					$this->email->from($email, $name);
					$this->email->to('acharya_saugat@hotmail.com');
					$this->email->subject('PRAN Map Contact Message');
					$this->email->message($message);	

					$this->email->send();

					$data['success'] = 'Your message has been recieved.';
				} else {
					$data['error'] = 'Not a valid email.';
				}
			} 
			$data['title'] = 'Contact - Program for Accountability in Nepal';
			$this->load->view('contact', $data);
			
		}
	}
?>