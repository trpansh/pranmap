<?php  
	class Filters extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('search_m');
			$this->load->helper('form');
		}

		function index() {
			if ($this->input->post()) {
				$batch = ($this->input->post('batch') === '') ? FALSE : $this->input->post('batch');
				$tool = ($this->input->post('tool') === '') ? FALSE : $this->input->post('tool');
				$district = ($this->input->post('district') === '') ? FALSE : $this->input->post('district');
				$sector = ($this->input->post('sector') === '') ? FALSE : $this->input->post('sector');
				$theme = ($this->input->post('theme') === '') ? FALSE : $this->input->post('theme');
				$funding = ($this->input->post('funding') === '') ? FALSE : $this->input->post('funding');
				$status = ($this->input->post('status') === '') ? FALSE : $this->input->post('status');
				if ($batch == FALSE && $tool == FALSE && $district == FALSE && $sector == FALSE && $theme == FALSE && $funding == FALSE && $status == FALSE) {
					$data['error'] = 'No filter selected.';
				} else {
					$data = $this->search_m->filter($batch, $tool, $district, $sector, $theme, $funding, $status);
					foreach ($data as $value) {
						foreach ($value->result() as $output) {
							$data['filter'][] = $output;
						}
					}
				}
				$data['subview'] = 'filter';
				$this->load->view('map', $data);
			} else {
				redirect('map');
			}
		}
	}
?>