<?php
	class Agency_model extends CI_Model {

		public function save_agency($data) {
			// echo "<pre>";print_r($data);exit();
			if (isset($data['id']) && !empty($data['id'])) {
				$data['updated_by'] = $this->session->userdata('admin_id');
				$data['updated_date'] = date('Y-m-d H:i:s');
				$this->db->where('id', $data['id']);
				$this->db->update('ins_agency', $data);
				return $data['id'];
			} else {
				unset($data['id']);
				$data['created_by'] = $this->session->userdata('admin_id');
				$data['updated_date'] = date('Y-m-d H:i:s');
				$this->db->insert('ins_agency', $data);
				return $this->db->insert_id();
			}
		}
		
	   public function save_agencycommission($data) {
		
		   if (!empty($data['id'])) {
			   $old = $this->db->get_where('ins_agencycommission', ['id' => $data['id']])->row_array();
			   $this->log_agencycommission_history($data, $old);
			   $this->db->where('id', $data['id']);
			   $this->db->update('ins_agencycommission', $data);
			   return $data['id']; 
		   } else {
			   $this->db->insert('ins_agencycommission', $data);
			   return $this->db->insert_id();
		   }
	   }

	   public function log_agencycommission_history($new, $old) {
		   $fields = [
			   'od_premium' => 'OD Premium',
			   'tp_premium' => 'TP Premium',
			   'net_premium' => 'Net Premium'
		   ];
		   $admin_id = $this->session->userdata('admin_id');
		   foreach ($fields as $field => $friendly_name) {
			   if (isset($new[$field]) && isset($old[$field]) && $old[$field] != $new[$field]) {
				   $history = [
					   'agencycommission_id' => $new['id'],
					   'agency_id' => $new['agency_id'],
					   'login_id' => $new['login_id'],
					   'field_name' => $friendly_name,
					   'old_value' => $old[$field],
					   'new_value' => $new[$field],
					   'updated_by' => $admin_id,
					   'updated_at' => date('Y-m-d H:i:s')
				   ];
				   $this->db->insert('ins_agencycommission_history', $history);
			   }
		   }
	   }

		// public function get_agency_with_loginid($agency_id = null) {
		// 	$sql = "SELECT a.*, l.name AS name
		// 			FROM ins_agencycommission a
		// 			LEFT JOIN ins_loginid l ON l.id = a.login_id";
		
		// 	if (!empty($agency_id)) {
		// 		$sql .= " WHERE a.agency_id = ?";
		// 	}
		
		// 	$query = $this->db->query($sql, array($agency_id));
			
		// 	return $query->result_array();
		// }

	public function get_agency_with_loginid($agency_id = null) {
		$sql = "SELECT 
					l.id AS login_id,
					l.name,
					IFNULL(a.id, '') AS comm_id,
					IFNULL(a.od_premium, 0.00) AS od_premium,
					IFNULL(a.tp_premium, 0.00) AS tp_premium,
					IFNULL(a.net_premium, 0.00) AS net_premium,
					IFNULL(l.agent_odpremium, 0.00) AS agent_odpremium,
					IFNULL(l.agent_tppremium, 0.00) AS agent_tppremium,
					IFNULL(l.agent_netpremium, 0.00) AS agent_netpremium
				FROM ins_loginid l 
				LEFT JOIN ins_agencycommission a 
					ON l.id = a.login_id AND a.agency_id = ?
				WHERE l.status = 'active'
				ORDER BY l.id";

		$query = $this->db->query($sql, array($agency_id));
		return $query->result_array();
	}





		public function get_agencyidlist() {
			$this->db->select('id');
			$query = $this->db->get('ins_agency');
			return $query->result_array();
		}

		public function get_agencycommission_by_login($agency_id, $login_id) {
			$this->db->where('agency_id', $agency_id);
			$this->db->where('login_id', $login_id);
			$query = $this->db->get('ins_agencycommission'); 
			return $query->row_array(); 
		}

		public function update_agencycommission($id, $data) {
			$this->db->where('id', $id);
			return $this->db->update('ins_agencycommission', $data); 
		}

		public function get_agency_by_branch() {
			$userdata = $this->session->userdata('userdata');
			$role = $this->session->userdata('role');
			
			// If user is admin, show all agencies
			if ($role === 1) {
				$this->db->where('status', 'active');  // Add condition
    			$query = $this->db->get('ins_agency');

			} else {
				// For non-admin users, show only branch-wise agencies
				$this->db->where('branch_id', $userdata['branch_id']);
				$this->db->where('status', 'active');
				$query = $this->db->get('ins_agency');
			}
			
			return $query->result_array();
		}

		public function get_agency_history($agency_id) {
			$this->db->where('agency_id', $agency_id);
			$this->db->order_by('updated_at', 'DESC');
			return $this->db->get('ins_agencycommission_history')->result_array();
		}

		public function get_agency_history_datatable($agency_id, $params = []) {
			$columns = ['updated_at', 'field_name', 'old_value', 'new_value', 'updated_by'];

			// Get total count
			$this->db->where('agency_id', $agency_id);
			$total = $this->db->count_all_results('ins_agencycommission_history');

			// Data query
			$this->db->where('agency_id', $agency_id);
			if (!empty($params['order']) && isset($columns[$params['order']])) {
				$this->db->order_by($columns[$params['order']], $params['dir'] ?? 'desc');
			} else {
				$this->db->order_by('id', 'desc');
			}
			if (isset($params['length']) && $params['length'] != -1) {
				$this->db->limit($params['length'], $params['start'] ?? 0);
			}
			$query = $this->db->get('ins_agencycommission_history');
			$data = $query->result_array();

			return [
				'recordsTotal' => $total,
				'recordsFiltered' => $total,
				'data' => $data
			];
		}
	}
?>