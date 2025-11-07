<?php
	class Loginid_model extends CI_Model {

	private $loginid_field_labels = [
		'name'        => 'Name',
		'od_premium'  => 'OD Premium %',
		'tp_premium'  => 'TP Premium %',
		'net_premium' => 'NET Premium %',
		'agent_odpremium' => 'Agent OD Payout %',
		'agent_tppremium' => 'Agent TP Payout %',
		'agent_netpremium' => 'Agent Net Payout %',
		'rto_company_id' => 'RTO Company',
		'vehicle_type' => 'Vehicle Type',
		'fuel_type' => 'Fuel Type',
		'policy_type' => 'Policy Type',
		'seating_capacity' => 'Seating Capacity',
		'code_type' => 'Code Type',
		'code_name' => 'Code Name',
		'vehicle_make' => 'Vehicle Make',
		'vehicle_model' => 'Vehicle Model',
		'status'      => 'Status',
	];

		public function save_loginid($data) {
			if (isset($data['id']) && !empty($data['id'])) {
				$data['updated_by'] = $this->session->userdata('admin_id');
				$this->db->where('id', $data['id']);
				$this->db->update('ins_loginid', $data);
				return $data['id'];
			} else {
				unset($data['id']);
				$data['created_by'] = $this->session->userdata('admin_id');
				$this->db->insert('ins_loginid', $data);
				return $this->db->insert_id();
			}
		}

		public function insert_ins_loginid_history($data) {
			$this->db->insert('ins_loginid_history', $data);
		}

		public function get_loginid_by_id($id) {
			$this->db->where('id', $id);
			$query = $this->db->get('ins_loginid');  
	
			if ($query->num_rows() > 0) {
				return $query->row_array();
			} else {
				return false;
			}
		}

		public function get_last_commission() {
			$this->db->select('*');
			$this->db->order_by('id', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('ins_loginid'); 
		
			if ($query->num_rows() > 0) {
				return $query->row();
			}
		
			return null;
		}
		
		public function log_loginid_changes($loginid_id, $old_data, $new_data, $updated_by) {
		// Only log these fields
		$track_fields = [
			'name', 'od_premium', 'tp_premium', 'net_premium',
			'agent_odpremium', 'agent_tppremium', 'agent_netpremium',
			'rto_company_id',
			'vehicle_type', 'fuel_type', 'policy_type', 'seating_capacity',
			'code_type', 'code_name', 'vehicle_make', 'vehicle_model',
			'status'
		];

		// Friendly labels for history
		$field_labels = [
			'name'            => 'Name',
			'od_premium'      => 'OD Premium %',
			'tp_premium'      => 'TP Premium %',
			'net_premium'     => 'NET Premium %',
			'agent_odpremium' => 'Agent OD Payout %',
			'agent_tppremium' => 'Agent TP Payout %',
			'agent_netpremium' => 'Agent Net Payout %',
			'rto_company_id'  => 'RTO Company',
			'vehicle_type'    => 'Vehicle Type',
			'fuel_type'       => 'Fuel Type',
			'policy_type'     => 'Policy Type',
			'seating_capacity'=> 'Seating Capacity',
			'code_type'       => 'Code Type',
			'code_name'       => 'Code Name',
			'vehicle_make'    => 'Vehicle Make',
			'vehicle_model'   => 'Vehicle Model',
			'status'          => 'Status',
		];

			// Normalize values to avoid false mismatch
			$normalize = function($val) {
				if (is_null($val) || $val === '') return '';
				if (is_numeric($val)) return number_format((float)$val, 2, '.', '');
				if (is_string($val)) return trim($val);
				return $val;
			};

			foreach ($track_fields as $field) {
				$old_val = isset($old_data[$field]) ? $normalize($old_data[$field]) : '';
				$new_val = isset($new_data[$field]) ? $normalize($new_data[$field]) : '';

				// Skip if unchanged
				if ($old_val === $new_val) continue;

				// Log only if changed
				$history = [
					'loginid_id'   => $loginid_id,
					'field_name'   => $field_labels[$field] ?? $field,
					'old_value'    => $old_data[$field] ?? '',
					'new_value'    => $new_data[$field] ?? '',
					'updated_by'   => $updated_by,
					'updated_date' => date('Y-m-d H:i:s')
				];

				$this->insert_ins_loginid_history($history);
			}
		}


		
		
	}
?>