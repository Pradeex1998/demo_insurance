<?php
	class Master_model extends CI_Model {

		public function save_branch($data) {
			if (isset($data['id']) && !empty($data['id'])) {
				$data['updated_by'] = $this->session->userdata('admin_id');
				$this->db->where('id', $data['id']);
				$this->db->update('ins_branch', $data);
				return $data['id'];
			} else {
				unset($data['id']);
				$data['created_by'] = $this->session->userdata('admin_id');
				$this->db->insert('ins_branch', $data);
				return $this->db->insert_id();
			}
		}

		// RTO: create or update ins_rto
		public function save_rto($data) {
			if (isset($data['id']) && !empty($data['id'])) {
				$this->db->where('id', $data['id']);
				$this->db->update('ins_rto', $data);
				return $data['id'];
			} else {
				unset($data['id']);
				$data['created_by'] = $this->session->userdata('admin_id');
				// Ensure created_at is set if DB doesn't default it
				if (!isset($data['created_at']) || empty($data['created_at'])) {
					$data['created_at'] = date('Y-m-d H:i:s');
				}
				$this->db->insert('ins_rto', $data);
				return $this->db->insert_id();
			}
		}

		public function get_rto($id = null) {
			if ($id) {
				$this->db->where('id', $id);
			}
			$query = $this->db->get('ins_rto');
			return $query->result_array();
		}

		public function get_branch($id = null) {
			
			if ($id) {
				$this->db->where('id', $id);
			}
			$query = $this->db->get('ins_branch');
			return $query->result_array();
		}

		public function active_branch($id = null) {
			if ($id) {
				$this->db->where('id', $id);
			}
			$this->db->where('status', 'active');
			$query = $this->db->get('ins_branch');
			return $query->result_array();
		}

	// Insurance Company: create or update ins_insurance_company
	public function save_company($data) {
		$now = date('Y-m-d H:i:s');
		if (isset($data['id']) && !empty($data['id'])) {
			$data['updated_by'] = $this->session->userdata('admin_id');
			$data['updated_at'] = $now;
			$this->db->where('id', $data['id']);
			$this->db->update('ins_insurance_company', $data);
			return $data['id'];
		} else {
			unset($data['id']);
			$data['created_by'] = $this->session->userdata('admin_id');
			if (!isset($data['created_at']) || empty($data['created_at'])) {
				$data['created_at'] = $now;
			}
			$this->db->insert('ins_insurance_company', $data);
			return $this->db->insert_id();
		}
	}

	public function get_company($id = null) {
		if ($id) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get('ins_insurance_company');
		return $query->result_array();
	}

    // RTO Company Mapping: create or update ins_rto_company
    public function save_rto_company($data) {
        $now = date('Y-m-d H:i:s');
        if (isset($data['id']) && !empty($data['id'])) {
            $data['updated_by'] = $this->session->userdata('admin_id');
            $data['updated_at'] = $now;
            $this->db->where('id', $data['id']);
            $this->db->update('ins_rto_company', $data);
            return $data['id'];
        } else {
            unset($data['id']);
            $data['created_by'] = $this->session->userdata('admin_id');
            if (!isset($data['created_at']) || empty($data['created_at'])) {
                $data['created_at'] = $now;
            }
            $this->db->insert('ins_rto_company', $data);
            return $this->db->insert_id();
        }
    }

    public function get_rto_company($id = null) {
        if ($id) {
            $this->db->where('id', $id);
			
        }
        $query = $this->db->get('ins_rto_company');
        return $query->result_array();
    }

    public function active_rto_company_list() {
		$this->db->select('irc.id, irc.name AS company_name');
		$this->db->from('ins_rto_company irc');
		$this->db->where('irc.status', 'active');
		$this->db->order_by('irc.name', 'asc');
		$query = $this->db->get();
		if (!$query) { return array(); }
		return $query->result_array();
    }

	public function get_active_rto_company($id = null) {
		if ($id) {
			$this->db->where('id', $id);
		}
		$this->db->where('status', 'active');
		$query = $this->db->get('ins_rto_company');
		return $query->row_array();
	}

    public function active_rto_list() {
        $this->db->where('status', 'active');
        $query = $this->db->get('ins_rto');
        return $query->result_array();
    }

	    // Credit Card Master: create or update ins_credit_card
	    public function save_credit_card($data) {
	    	$now = date('Y-m-d H:i:s');
	        if (isset($data['id']) && !empty($data['id'])) {
	        	$data['updated_by'] = $this->session->userdata('admin_id');
	        	$data['updated_at'] = $now;
	            $this->db->where('id', $data['id']);
	            $this->db->update('ins_credit_card', $data);
	            return $data['id'];
	        } else {
	        	unset($data['id']);
	        	$data['created_by'] = $this->session->userdata('admin_id');
	        	if (!isset($data['created_at']) || empty($data['created_at'])) {
	        		$data['created_at'] = $now;
	        	}
	            $this->db->insert('ins_credit_card', $data);
	            return $this->db->insert_id();
	        }
	    }

	    public function get_credit_card($id = null) {
	        if ($id) {
	            $this->db->where('id', $id);
	        }
	        $query = $this->db->get('ins_credit_card');
	        return $query->result_array();
	    }

	    public function active_credit_card_list() {
	        $this->db->select('id, name, bank, last4');
	        $this->db->from('ins_credit_card');
	        $this->db->where('status', 'active');
	        $this->db->order_by('name', 'asc');
	        $query = $this->db->get();
	        if (!$query) { return array(); }
	        return $query->result_array();
	    }

		// =====================
		// State Master
		public function save_state($data) {
			$now = date('Y-m-d H:i:s');
			if (isset($data['id']) && !empty($data['id'])) {
				$data['updated_by'] = $this->session->userdata('admin_id');
				$data['updated_at'] = $now;
				$this->db->where('id', $data['id']);
				$this->db->update('ins_state', $data);
				return $data['id'];
			} else {
				unset($data['id']);
				$data['created_by'] = $this->session->userdata('admin_id');
				if (!isset($data['created_at']) || empty($data['created_at'])) {
					$data['created_at'] = $now;
				}
				$this->db->insert('ins_state', $data);
				return $this->db->insert_id();
			}
		}

		public function state_exists($name, $excludeId = null) {
			if ($name === null || $name === '') { return false; }
			$this->db->from('ins_state');
			$this->db->where('LOWER(name) =', strtolower(trim($name)));
			if ($excludeId) {
				$this->db->where('id !=', $excludeId);
			}
			$query = $this->db->get();
			return $query && $query->num_rows() > 0;
		}

		public function get_state($id = null) {
			if ($id) {
				$this->db->where('id', $id);
			}
			$query = $this->db->get('ins_state');
			return $query->result_array();
		}

		public function active_state_list() {
			$this->db->select('id, name');
			$this->db->from('ins_state');
			$this->db->where('status', 'active');
			$this->db->order_by('name', 'asc');
			$query = $this->db->get();
			if (!$query) { return array(); }
			return $query->result_array();
		}

		// District Master
		public function save_district($data) {
			$now = date('Y-m-d H:i:s');
			if (isset($data['id']) && !empty($data['id'])) {
				$data['updated_by'] = $this->session->userdata('admin_id');
				$data['updated_at'] = $now;
				$this->db->where('id', $data['id']);
				$this->db->update('ins_district', $data);
				return $data['id'];
			} else {
				unset($data['id']);
				$data['created_by'] = $this->session->userdata('admin_id');
				if (!isset($data['created_at']) || empty($data['created_at'])) {
					$data['created_at'] = $now;
				}
				$this->db->insert('ins_district', $data);
				return $this->db->insert_id();
			}
		}

		public function district_exists($name, $stateId, $excludeId = null) {
			if ($name === null || $name === '' || !$stateId) { return false; }
			$this->db->from('ins_district');
			$this->db->where('LOWER(name) =', strtolower(trim($name)));
			$this->db->where('state_id', (int)$stateId);
			if ($excludeId) {
				$this->db->where('id !=', $excludeId);
			}
			$query = $this->db->get();
			return $query && $query->num_rows() > 0;
		}

		public function get_district($id = null) {
			if ($id) {
				$this->db->where('id', $id);
			}
			$query = $this->db->get('ins_district');
			return $query->result_array();
		}

		// =====================
		// Agent Code Master
		public function save_agent_code($data) {
			$now = date('Y-m-d H:i:s');
			if (isset($data['id']) && !empty($data['id'])) {
				$data['updated_by'] = $this->session->userdata('admin_id');
				$data['updated_at'] = $now;
				$this->db->where('id', $data['id']);
				$this->db->update('ins_agent_code', $data);
				return $data['id'];
			} else {
				unset($data['id']);
				$data['created_by'] = $this->session->userdata('admin_id');
				if (!isset($data['created_at']) || empty($data['created_at'])) {
					$data['created_at'] = $now;
				}
				$this->db->insert('ins_agent_code', $data);
				return $this->db->insert_id();
			}
		}

		public function get_agent_code($id = null) {
			if ($id) {
				$this->db->where('id', $id);
			}
			$query = $this->db->get('ins_agent_code');
			return $query->result_array();
		}
}
?>