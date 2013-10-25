<?php 
	class Search extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->model('search_m');
			$this->load->helper('form');
		}

		function index() {
			if ($this->input->post()) {
				$match = trim(preg_replace('/\s+/', ' ', $this->input->post('search')));
				$this->load->library('form_validation');
				$config = array(
	               array(
	                     'field'   => 'search', 
	                     'label'   => 'Search', 
	                     'rules'   => 'trim|xss_clean|min_length[3]|required|callback__remove_whitespace'
	                  )
	            );
	           	$this->form_validation->set_rules($config);		
				if ($this->form_validation->run() == TRUE) {
					$data = $this->search_m->search($match);
					foreach ($data as $value) {
						foreach ($value->result() as $output) {
							$data['result'][] = $output;
						}
					}
					$data['subview'] = 'filter';
					$this->load->view('map', $data);
				} else {
					$data['subview'] = 'filter';
					$data['error'] = strip_tags(validation_errors());
					$this->load->view('map', $data);
				}
			} else {
				redirect('map');
			}
		}

		public function _remove_whitespace($string) {
			$string = preg_replace('/\s+/', ' ', $string);
			return $string;
		}

		function map_ajax() {
			if ($this->input->is_ajax_request()) {
				$district = $this->input->post('district');
				$data['filter'] = $this->search_m->ajax_call($district);
				$this->load->view('filter', $data);
			}
		} 

		function column_chart() {
			if ($this->input->is_ajax_request()) {
				$district = $this->input->post('district');

				if ($district != FALSE) {
					$cso_array = array();
					$funding_array = array();
					$data = $this->search_m->filter(FALSE, FALSE, FALSE, $district, FALSE, FALSE, FALSE, FALSE, FALSE);
					foreach ($data as $value) {
						foreach ($value->result() as $output) {
							$result[] = $output;
						}
					}
					
					if (isset($result)) {
						foreach ($result as $value) {
							array_push($cso_array, $value->Organization);
							if (preg_match("*SAP*", $value->Designation) || preg_match("*SA Practitioner*", $value->Designation)) {
								array_push($funding_array, $value->Funding);
							}
						}
						$cso_array = array_unique($cso_array);
						$funding_count = array_count_values($funding_array);
						if (sizeof($funding_count) == 1) {
							$count = array("CSO" => count($cso_array), current(array_keys($funding_count)) => $funding_count[current(array_keys($funding_count))]);
						} elseif (sizeof($funding_count) == 2) {
							$count = array("CSO" => count($cso_array), "MDTF" => $funding_count['MDTF / PFM'], "SPBF" => $funding_count['SPBF']);
						}
						$json = array();
						foreach ($count as $key => $value) {
							$temp[0] = $key;
							$temp[1] = $value;
							array_push($json, $temp);
						}
						echo json_encode($json);
					}
				}
			} else {
				redirect('map');
			}
		}

		function pie_chart() {
			if ($this->input->is_ajax_request()) {
			 	$district = $this->input->post('district');
				if ($district != FALSE) {
					$sector_array = array();
					$sector_trim = array();
					$data = $this->search_m->filter(FALSE, FALSE, FALSE, $district, FALSE, FALSE, FALSE, FALSE, FALSE);
					foreach ($data as $value) {
						foreach ($value->result() as $output) {
							$result[] = $output;
						}
					}

					if (isset($result)) {
						foreach ($result as $value) {
							if (preg_match("*SAP*", $value->Designation) || preg_match("*SA Practitioner*", $value->Designation)) {
								array_push($sector_array, $value->Sector);
							}
						}
						foreach ($sector_array as $value) {
							$array = array_map("trim",explode(",", $value));
							foreach ($array as $key => $value) {
								array_push($sector_trim, $value);
							}
						}
						$sector_count = array_count_values($sector_trim);
						$json = array();
						foreach ($sector_count as $key => $value) {
							$temp[0] = $key;
							$temp[1] = $value;
							array_push($json, $temp);
						}
						echo json_encode($json);
					}
				} 
			} else {
				redirect('map');
			}
		}

		private function _create_json() {
			$districts = array (
                'achham' => 'Achham',
                'arghakhanchi' => 'Arghakhanchi',
                'baglung' => 'Baglung', 
                'baitadi' => 'Baitadi',
                'bajhang' => 'Bajhang',
                'bajura' => 'Bajura',
                'banke' => 'Banke',
                'bara' => 'Bara',
                'bardiya' => 'Bardiya',
                'bhaktapur' => 'Bhaktapur',
                'bhojpur' => 'Bhojpur',
                'chitwan' => 'Chitwan',
                'dadeldhura' => 'Dadeldhura', 
                'dailekh' => 'Dailekh',
                'dang' => 'Dang', 
                'darchula' => 'Darchula',
                'dhading' => 'Dhading',
                'dhankuta' => 'Dhankuta',
                'dhanusha' => 'Dhanusha',
                'dolakha' => 'Dolakha',
                'dolpa' => 'Dolpa',
                'doti' => 'Doti',
                'gorkha' => 'Gorkha',
                'gulmi' => 'Gulmi',
                'humla' => 'Humla',
                'illam' => 'Illam',
                'jajarkot' => 'Jajarkot',
                'jhapa' => 'Jhapa',
                'jumla' => 'Jumla',
                'kailali' => 'Kailali',
                'kalikot' => 'Kalikot',
                'kanchanpur' => 'Kanchanpur',
                'kapilvastu' => 'Kapilvastu',
                'kaski' => 'Kaski',
                'kathmandu' => 'Kathmandu',
                'kavrepalanchok' => 'Kavrepalanchok',
                'khotang' => 'Khotang',
                'lalitpur' => 'Lalitpur',
                'lamjung' => 'Lamjung',
                'mahottari' => 'Mahottari',
                'makwanpur' => 'Makwanpur',
                'manang' => 'Manang',
                'morang' => 'Morang',
                'mugu' => 'Mugu',
                'mustang' => 'Mustang',
                'myagdi' => 'Myagdi',
                'nawalparasi' => 'Nawalparasi',
                'nuwakot' => 'Nuwakot',
                'okhaldhunga' => 'Okhaldhunga',
                'palpa' => 'Palpa',
                'panchthar' => 'Panchthar',
                'parbat' => 'Parbat',
                'parsa' => 'Parsa',
                'pyuthan' => 'Pyuthan',
                'ramechhap' => 'Ramechhap',
                'rasuwa' => 'Rasuwa',
                'rautahat' => 'Rautahat',
                'rolpa' => 'Rolpa',
                'rukum' => 'Rukum',
                'rupandehi' => 'Rupandehi',
                'salyan' => 'Salyan',
                'sankhuwasabha' => 'Sankhuwasabha',
                'saptari' => 'Saptari',
                'sarlahi' => 'Sarlahi',
                'sindhuli' => 'Sindhuli',
                'sindhupalchok' => 'Sindhupalchok',
                'siraha' => 'Siraha',
                'solukhumbu' => 'Solukhumbu',
                'sunsari' => 'Sunsari',
                'surkhet' => 'Surkhet',
                'syangja' => 'Syangja',
                'tanahu' => 'Tanahu',
                'taplejung' => 'Taplejung',
                'terhathum' => 'Terhathum',
                'udayapur' => 'Udayapur'
            );
			
			foreach ($districts as $district) {
				$data = $this->search_m->filter(FALSE, FALSE, FALSE, $district, FALSE, FALSE, FALSE, FALSE, FALSE);

				foreach ($data as $value) {
					foreach ($value->result() as $output) {
						$result[] = $output;
					}
				}
				if (isset($result)) {
					$cso_array = array();
					$funding_array = array();
					foreach ($result as $value) {
						array_push($cso_array, $value->Organization);
						if (preg_match("*SAP*", $value->Designation) || preg_match("*SA Practitioner*", $value->Designation)) {
							array_push($funding_array, $value->Funding);
						}
					}
					$cso_array = array_unique($cso_array);
					$funding_count = array_count_values($funding_array);

					if (sizeof($funding_count) == 1) {
						$count = array("CSO" => count($cso_array), current(array_keys($funding_count)) => $funding_count[current(array_keys($funding_count))]);
					} elseif (sizeof($funding_count) == 2) {
						$count = array("CSO" => count($cso_array), "MDTF" => $funding_count['MDTF / PFM'], "SPBF" => $funding_count
							['SPBF']);
					}
					$final_array[$district] = $count;
					
					unset($cso_array);
					unset($funding_array);
					unset($cso_count);
					unset($funding_count);
					unset($result);
				} else {
					$final_array[$district] = array('CSO' => 0);
				}
			}
			// Create JSON
			$json = json_encode($final_array, JSON_PRETTY_PRINT);
			$file_path = 'assets/json/district-info.json';
			$handle = fopen($file_path, 'w');
			fwrite($handle, $json);
			fclose($handle);
		}

	}
?>