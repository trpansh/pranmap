<?php
	class Contact extends CI_Controller {
		function __construct() {
			parent::__construct();
		}

		function index() {
			if ($this->input->post()) {
				$this->load->library('form_validation');
				$config = array(
	               array(
	                     'field'   => 'email', 
	                     'label'   => 'Email', 
	                     'rules'   => 'trim|xss_clean|valid_email|required'
	                  ),
	               array(
	                     'field'   => 'name', 
	                     'label'   => 'Name', 
	                     'rules'   => 'required|xss_clean'
	                  ),
	               array(
	                     'field'   => 'message', 
	                     'label'   => 'Message', 
	                     'rules'   => 'required|xss_clean'
	                  )
	            );
	            $this->form_validation->set_rules($config);			
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
					$this->email->subject('Message from pranmap.org.np');
					$this->email->message($message);	

					if($this->email->send()) {
						$data['success'] = 'Your message has been recieved.';
					}
					// else {
					// 	show_error($this->email->print_debugger());
					// }
				} else {
					$data['error'] = 'Invalid credentials.';
				}
			}

			$data['title'] = 'Contact - Program for Accountability in Nepal';
			$this->load->view('contact', $data);
			
		}
	}
?>