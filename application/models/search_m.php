<?php  
	class Search_m extends CI_Model {
		function search($match) {
			$tables = $this->db->list_tables();
			$index = 0;
			foreach ($tables as $table) {
				// $this->db->cache_on();
				$this->db->like('Organization', $match);
				$this->db->or_like('Contact_Person', $match);
				$this->db->or_like('District', $match);
				$this->db->or_like('Tool', $match);
				$query[$index] = $this->db->get($table);
				$index++;
			}
			return $query;
		}

		function filter($batch, $tool, $title, $district, $sector, $theme, $funding, $ethnicity, $status) {
			if ($batch != FALSE) {
				// $this->db->cache_on();
				$this->_tool($tool);
				$this->_district($district);
				$this->_sector($sector);
				$this->_theme($theme);
				$this->_ethnicity($ethnicity);
				$this->_funding($funding);
				$this->_title($title);
				$this->_status($status);
				$query[] = $this->db->get($batch);
				return $query;
			} else {
				$tables = $this->db->list_tables();
				$index = 0;
				// $this->db->cache_on();
				foreach ($tables as $table) {
					$this->_tool($tool);
					$this->_district($district);
					$this->_sector($sector);
					$this->_theme($theme);
					$this->_ethnicity($ethnicity);
					$this->_funding($funding);
					$this->_title($title);
					$this->_status($status);
					$query[$index] = $this->db->get($table);
					$index++;
				}
				return $query;
			}
		}

		function ajax_call($district) {
			// $this->db->cache_on();
			$data = $this->filter(FALSE, FALSE, FALSE, $district, FALSE, FALSE, FALSE, FALSE, FALSE);
			foreach ($data as $value) {
				foreach ($value->result() as $output) {
					$filter[] = $output;
				}
			}
			if (isset($filter)) {
				return $filter;
			}
		}
 
		private function _tool($tool) {
			if ($tool != FALSE) {
				$this->db->like('Tool', $tool);
			}
		}

		private function _district($district) {
			if ($district != FALSE) {
				$this->db->like('District', $district);
			}
		}

		private function _sector($sector) {
			if ($sector != FALSE) {
				$this->db->like('Sector', $sector);
			}
		}

		private function _theme($theme) {
			if ($theme != FALSE) {
				$this->db->like('Theme', $theme);
			}
		}

		private function _ethnicity($ethnicity) {
			if ($ethnicity != FALSE) {
				$this->db->like('Ethnicity', $ethnicity);
			}
		}

		private function _funding($funding) {
			if ($funding != FALSE && $funding == 'both') {
				$this->db->like('Funding', '');
			} elseif ($funding != FALSE) {
				$this->db->like('Funding', $funding);
			}
		}

		private function _title($title) {
			if ($title != FALSE && $title == 'both') {
				$this->db->like('Title', '');
			} elseif ($title != FALSE) {
				$this->db->like('Title', $title);
			}
		}

		private function _status($status) {
			if ($status != FALSE && $status == 'both') {
				$this->db->like('Project_Status', '');
			} elseif ($status != FALSE) {
				$this->db->like('Project_Status', $status);
			}
		}
	}
?>