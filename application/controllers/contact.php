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
								'smtp_host' => 'ssl://smtp.gmail.com',
								'smtp_port' => 465,
								'smtp_timeout' => 7,
								'smtp_user' => 'pranmap@gmail.com',
								'smtp_pass' => 'pranmap12345',
								'wordwrap' => TRUE,
								'wrapchars' => 95,
								'mailtype' => 'text',
								'charset' => 'iso-8859-1',
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
					$this->email->to('pran@worldbank.org');
					$this->email->subject('Message from pranmap.org');
					$this->email->message($message);	

					if($this->email->send()) {
						$data['success'] = 'Your message has been recieved.';
					}
					else {
						show_error($this->email->print_debugger());
					}
				} else {
					$data['error'] = 'Not a valid email.';
				}
			}

			$data['title'] = 'Contact - Program for Accountability in Nepal';
			$this->load->view('contact', $data);
			
		}
	}
?>