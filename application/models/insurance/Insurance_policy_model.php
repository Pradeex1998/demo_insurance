<?php
	class Insurance_policy_model extends CI_Model {
		

		
		public function company_list() {
			$companies = [
				'Digit General Insurance Ltd',
				'THE NEW INDIA ASSURANCE CO. LTD',
				'Zurich Kotak General Insurance Company (India) Limited',
				'SBI General Insurance Company Limited',
				'TATA AIG General Insurance Company Limited',
				'IFFCO-TOKIO General Insurance Co. Ltd',
				'UniversalSompoGeneralInsuranceCompanyLimited',
				'Universal Sompo General Insurance Company Limited',
				'RoyalSundaramGeneralInsuranceCo.Limited',
				'Future Generali India Insurance Company Limited',
				'Reliance General Insurance Company Limited',
				'Magma HDI General Insurance Co. Ltd',
				'Magma General Insurance Limited',
				'RahejaQBEGeneralInsuranceCompanyLimited',
				'SHRIRAM GENERAL INSURANCE COMPANY LIMITED',
				'ICICI Lombard',
				'UNITED INDIA INSURANCE COMPANY LIMITED',
				'Bajaj Allianz General Insurance Company Ltd',
				'Cholamandalam MS General Insurance Company Ltd',
				'Digit General Insurance Ltd',
				'National Insurance Company Limited',
			];

			return $companies;
		}

		/**
		 * Insert a single policy row into insurance_policy table.
		 * $data should be validated and normalized to table columns.
		 * Returns insert_id on success, false on failure.
		 */
		public function insert_policy($data) {
			if (!is_array($data) || empty($data)) return false;
			$allowed = array(
				'policy_no','vehicle_no','customer_name','make','model','vehicle_type','rto_company_id',
				'mfg_year','age','gvw','ncb','policy_type','start_date','end_date','company_name',
				'agent_code_id','od','tp','net','premium','reward','agent_id',
				'login_id','file_path','company_grid','company_grid2','tds','staff_id','verified_status','status','is_delete',
				'created_by','updated_by','created_at','updated_at',
				'paid_type','agent_payment_mode','agent_amount','agent_chequeno',
				'company_payment_mode','company_amount','company_credit_card_id','company_chequeno','company_issuer_name',
				'received_account','received_date'
			);
			$filtered = array();
			foreach ($allowed as $key) {
				if (array_key_exists($key, $data)) $filtered[$key] = $data[$key];
			}
			if (!isset($filtered['created_at'])) $filtered['created_at'] = date('Y-m-d H:i:s');
			if (!isset($filtered['updated_at'])) $filtered['updated_at'] = date('Y-m-d H:i:s');
			if (!isset($filtered['is_delete'])) $filtered['is_delete'] = 0;
			$ok = $this->db->insert('insurance_policy', $filtered);
			return $ok ? $this->db->insert_id() : false;
		}

		public function update_policy_by_policy_no($policy_no, $data) {
			if (!$policy_no || !is_array($data)) return false;
			if (isset($data['created_at'])) unset($data['created_at']);
			$data['updated_at'] = date('Y-m-d H:i:s');
			$this->db->where('policy_no', $policy_no);
			$this->db->where('is_delete', 0);
			return $this->db->update('insurance_policy', $data);
		}

		/**
		 * Check if a policy number already exists.
		 */
		public function exists_by_policy_no($policy_no) {
			if (!$policy_no) return false;
			$q = $this->db->get_where('insurance_policy', array('policy_no' => $policy_no, 'is_delete' => 0), 1);
			return $q->num_rows() > 0;
		}

		/**
		 * Insert or update based on policy_no.
		 * Returns ['action' => 'insert'|'update', 'id' => insert_id|null, 'ok' => bool]
		 */
		public function upsert_policy($data) {
			$result = array('action' => null, 'id' => null, 'ok' => false);
			$policy_no = isset($data['policy_no']) ? $data['policy_no'] : null;
			if (!$policy_no) return $result;
			if ($this->exists_by_policy_no($policy_no)) {
				$result['action'] = 'update';
				$result['ok'] = $this->update_policy_by_policy_no($policy_no, $data);
			} else {
				$result['action'] = 'insert';
				$insert_id = $this->insert_policy($data);
				$result['ok'] = $insert_id !== false;
				$result['id'] = $insert_id ?: null;
			}
			return $result;
		}
	}
?>