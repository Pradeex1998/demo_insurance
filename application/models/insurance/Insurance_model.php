<?php
	class Insurance_model extends CI_Model {
		

		public function __construct()
		{
			parent::__construct();
			$this->load->model('insurance/agency_model', 'agency_model');
		}

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

		public function found_company($pdf_text, $search_terms) {
			$search_result = []; 
			foreach ($search_terms as $term) {
				if (stripos($pdf_text, strtolower($term)) !== false) { 
					$search_result[] = $term;
				}
			}
			return !empty($search_result) ? $search_result : null; 
		}

		public function fount_packagepolicy($text, $search_terms) {
			if (strpos($text, $search_terms) !== false) {
				return 1;
			}
			return 0;
		}
		
		
		public function destructured_fields($fields = []) {
			// echo "<pre>";print_r($data);exit();
			try {
				$data = $fields;
				$data['gvw_range']   = $this->get_gvw_range($data['weight']);
				$data['net_premium'] = $this->netCalculation($data['total_od_premium'], $data['total_tp_premium'], $data['net_premium']);
				$data['vehicle_age'] = $this->get_vehicle_age($data['year_of_manufacture']);
				return $data;
			} catch (Exception $e) {
				print_r($e->getMessage());exit();
				log_message('error', 'Error in company data extraction: ' . $e->getMessage());
				redirect('insurance/insurance_list', 'refresh');
			}
		}

		
		public function add_insurance($data) {
			$login_id = $data['login_id'];
			$com_paymentmode = $data['company_paymentmode'];
			$paid_type = $data['paid_type'];
			$amountfrom_agent = $data['amount_from_agent'];
			$credit_card_id = $data['credit_card_id'];
			
			$userdata = $this->session->userdata('userdata');
			// echo "<pre>";print_r($userdata);exit();
			$agency_id =  $_POST['agency_id'];
			
			$result = [
				'success' => [],
				'duplicates' => [],
				'errors' => []
			];
			$fileNames = $this->session->userdata('inspdfnames');

			if (!is_array($fileNames)) {
				$fileNames = !empty($fileNames) ? [$fileNames] : [];
			}
			
			foreach ($fileNames as $file_name) {
				$pdfpath = FCPATH . 'uploads/pdfs/' . $file_name;
				$pdfobject = $this->run_pythonscript($pdfpath);

                // Debugging previously printed raw python output and exited; remove for production
				// echo "<pre>";print_r($pdfobject);exit();

				if (!is_array($pdfobject) || !isset($pdfobject['text']) || !isset($pdfobject['fields'])) {
					$result['errors'][] = [
						'file' => $file_name,
						'message' => isset($pdfobject['error']) ? $pdfobject['error'] : 'PDF parsing failed or returned incomplete data.'
					];
					continue;
				}

				$pdf_text = $pdfobject['text'];
				$pdf_fields = $pdfobject['fields'];

				if (strtolower(trim($pdf_fields['registration_number'])) == 'new') {
					$pdf_fields['chassis_number'] = $pdf_fields['chassis_number'];
				} else {
					$pdf_fields['chassis_number'] = null;
				}

				if (isset($pdf_fields['start_date'])) {
					$pdf_fields['start_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $pdf_fields['start_date'])));
				}
				if (isset($pdf_fields['end_date'])) {
					$pdf_fields['end_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $pdf_fields['end_date'])));
				}

				
				$search_terms = $this->company_list();
				$found_companies = $this->found_company($pdf_text, $search_terms);

				if (!$found_companies) {
					$result['errors'][] = [
						'file' => $file_name,
						'message' => 'No matching company found. Please contact the admin.'
					];
					continue;
				}

				$company = $found_companies[0];
				$arraydata = $this->destructured_fields($pdf_fields);

				$agencydatalist = $this->agency_model->get_agencycommission_by_login($agency_id, $login_id);
				$agencydata = $agencydatalist;

				$loginiddata = $this->issuedatewise_loginidcommission($arraydata['date_of_issue'], $login_id);
				$company_commission = !empty($loginiddata) ? $loginiddata : $this->get_last_update_commission_data($login_id);

				$calc_data = $this->autocalculate_insurance_commission('a', $arraydata, $company_commission, $agencydata);
				$dataMerged = array_merge($arraydata, $calc_data);

				if (!empty($dataMerged['policy_number'])) {
					$dataMerged['policy_number'] = trim($dataMerged['policy_number']);
					$is_exist = $this->exist_policynumber($dataMerged['policy_number']);

					if ($is_exist) {
						$this->delete_pdf_by_filename($file_name);
						$result['duplicates'][] = [
							'file' => $file_name,
							'policy_number' => $dataMerged['policy_number']
						];
						continue;
					}
				}

				// Format numeric fields
				$od_premium = isset($dataMerged['od_premium']) ? (float)str_replace(',', '', $dataMerged['od_premium']) : 0.00;
				$tp_premium = isset($dataMerged['tp_premium']) ? (float)str_replace(',', '', $dataMerged['tp_premium']) : 0.00;
				$net_premium = isset($dataMerged['net_premium']) ? (float)str_replace(',', '', $dataMerged['net_premium']) : 0.00;
				$gross_premium = isset($dataMerged['gross_premium']) ? (float)str_replace(',', '', $dataMerged['gross_premium']) : 0.00;

				$ins_data = [
					'staff_id' => $this->input->post('staff_id') ?: null,
					'agency_id' => $agency_id,
					'login_id' => $login_id,
					'credit_card_id' => $credit_card_id,
					'child_id' => "",
					'date' => !empty($dataMerged['date_of_issue']) ? date('Y-m-d', strtotime(str_replace('/', '-', $dataMerged['date_of_issue']))) : null,
					'company' => $company,
					'insured_name' => $dataMerged['insured_name'] ?? '',
					'product_type' => $dataMerged['product_type'] ?? '',
					'policy_number' => $dataMerged['policy_number'] ?? '',
					'type' => $dataMerged['type'] ?? '',
					'registration_no' => $dataMerged['registration_number'] ?? '',
					'gvw' => isset($dataMerged['weight']) ? $this->convertToDecimal($dataMerged['weight']) : 0,
					'year' => $dataMerged['year_of_manufacture'] ?? '',
					'model' => $dataMerged['make_model'] ?? '',
					'contact_no' => $dataMerged['contact_number'] ?? '',
					'mail_id' => $dataMerged['email'] ?? '',
					'start_date' => $dataMerged['start_date'] ?? '',
					'end_date' => $dataMerged['end_date'] ?? '',
					'brokerage_name' => $dataMerged['brokerage_name'] ?? '',
					'login_code' => $dataMerged['login_code'] ?? '',
					'carrying_capacity' => $dataMerged['carrying_capacity'] ?? '',
					'pro_code' => $this->determine_pro_code($dataMerged),
					'new' => $dataMerged['chasis_number'] ?? '',
					'note' => $dataMerged['note'] ?? '',
					'gvw_range' => $dataMerged['gvw_range'] ?? '',
					'vehicle_age' => $dataMerged['vehicle_age'] ?? '',
					'od_premium' => $od_premium,
					'tp_premium' => $tp_premium,
					'net_premium' => $net_premium,
					'gross_premium' => $gross_premium,
					'company_od' => $dataMerged['company_od'],
					'company_tp' => $dataMerged['company_tp'],
					'company_net' => $dataMerged['company_net'],
					'company_paymentmode' => $com_paymentmode,
					'agent_od' => $dataMerged['agent_od'],
					'agent_tp' => $dataMerged['agent_tp'],
					'agent_net' => $dataMerged['agent_net'],
					'agent_paymentmode' => '',
					'paid_type' => $paid_type,
					'amount_from_agent' => $amountfrom_agent,
					'upload_status' => 1,
					'file_name' => $file_name,
					'status' => 'active',
					'received_account' => $data['received_account'] ?? '',
					'received_date' => $data['received_date'] ?? null,
				];

				$save_result = $this->save_insurance_record($ins_data);
				if ($save_result) {
					$result['success'][] = [
						'file' => $file_name,
						'policy_number' => $dataMerged['policy_number']
					];
				} else {
					$result['errors'][] = [
						'file' => $file_name,
						'message' => 'Failed to save insurance record.'
					];
				}
			}

			// Final response
			echo json_encode([
				'status' => !empty($result['success']) ? '1' : '0',
				'message' => 'Processing complete.',
				'result' => $result
			]);
			exit;
		}
		
		public function edit_insurance($data) {
			
			$postdata = array();
			$column_names = $this->common_model->get_column_names('ins_insurance_record');
			$column_names = array_diff($column_names, ['id']);
		
			foreach ($data as $key => $val) {
				if (in_array($key, $column_names) || $key === 'id') {
					$postdata[$key] = $this->input->post($key);
				}
			}
		
			if (empty($postdata['id'])) {
				return ['status' => '0', 'message' => 'ID is required for editing.'];
			}

			// Handle new columns
			// $postdata['start_date'] = $this->input->post('start_date') ? date('Y-m-d', strtotime($this->input->post('start_date'))) : null;
			// $postdata['end_date'] = $this->input->post('end_date') ? date('Y-m-d', strtotime($this->input->post('end_date'))) : null;
			// $postdata['brokerage_name'] = $this->input->post('brokerage_name');
			// $postdata['login_code'] = $this->input->post('login_code');
			// $postdata['carrying_capacity'] = $this->input->post('carrying_capacity');
			
			$userdata = $this->session->userdata('userdata');	
			$postdata['upload_status'] = 1;
			
			
			$login_id  = $postdata['login_id'];
			// $agency_id = $userdata['user_role'] == 'agency'? $userdata['agency_id'] :$postdata['agency_id'];
			$agency_id = $postdata['agency_id'];
			
			// echo "<pre>";print_r($agency_id);exit();
			$loginiddata = $this->issuedatewise_loginidcommission($postdata['date'], $login_id);
			
			$company_commision = [];
			if (!empty($loginiddata)) {
				$company_commision = $loginiddata;
			} else {
				$company_commision = $this->get_last_update_commission_data($login_id);
			}
			
			$agencydatalist = $this->agency_model->get_agencycommission_by_login($agency_id, $login_id);
			
			$agencydata = $agencydatalist;
			
			$calc_data = $this->autocalculate_insurance_commission('e', $postdata, $company_commision, $agencydata);
			// echo "<pre>";print_r($postdata);exit();
			$mergedata = array_merge($postdata, $calc_data);

			$status = $this->save_insurance_record($mergedata);
			return $status;
		}

		public function autocalculate_insurance_commission($mode, $data, $company_commision, $agencydata) {

			$comm 					= $company_commision;
			$company_od_percent 	= $comm['od_premium'] ?? 0.00;  
			$company_tp_percent 	= $comm['tp_premium'] ?? 0.00;  
			$company_net_percent 	= $comm['net_premium'] ?? 0.00;


			if($mode == 'e') {
				$company_od_percent 	= $data['company_od'] ?? 0.00;  
				$company_tp_percent 	= $data['company_tp'] ?? 0.00;  
				$company_net_percent 	= $data['company_net'] ?? 0.00;
			}

			$total_od_premium 	= 	$mode == 'a'? $data['total_od_premium']:$data['od_premium'];
			$total_tp_premium 	= 	$mode == 'a'? $data['total_tp_premium']:$data['tp_premium'];
			$total_net_premium 	= 	$data['net_premium'];
			$total_gross_premium= 	$data['gross_premium'];
			// Perform premium and gross premium calculations
			$od_premium 			= $this->convertToDecimal($total_od_premium ?? 0);
			$tp_premium 			= $this->convertToDecimal($total_tp_premium ?? 0);
			$net_premium 			= $this->convertToDecimal($total_net_premium ?? 0);
			$gross_premium 			= $this->convertToDecimal($total_gross_premium ?? 0);

			// Add null checks for agencydata
			// $agent_od_percent 		= $agencydata['od_premium'] ?? 0.00;
			// $agent_tp_percent 		= $agencydata['tp_premium'] ?? 0.00;
			// $agent_net_percent 		= $agencydata['net_premium'] ?? 0.00;
			if($mode == 'e') {
				$agent_od_percent 		= $data['agent_od'] ?? 0.00;
				$agent_tp_percent 		= $data['agent_tp'] ?? 0.00;
				$agent_net_percent 		= $data['agent_net'] ?? 0.00;
			} else {
				$agent_od_percent 		= $agencydata['od_premium'] ?? 0.00;
				$agent_tp_percent 		= $agencydata['tp_premium'] ?? 0.00;
				$agent_net_percent 		= $agencydata['net_premium'] ?? 0.00;
			}

			return [
				'company_od'    		=> $company_od_percent,
				'company_tp'    		=> $company_tp_percent,
				'company_net'   		=> $company_net_percent,
				'od_premium'            => $od_premium,
				'tp_premium'            => $tp_premium,
				'net_premium'           => $net_premium,
				'gross_premium'         => $gross_premium,
				'agent_od'      		=> $agent_od_percent,
				'agent_tp'      		=> $agent_tp_percent,
				'agent_net'     		=> $agent_net_percent,
			];
		}
		
		public function save_insurance_record($data) {
			if (isset($data['id']) && !empty($data['id'])) {
				$data['updated_by'] = $this->session->userdata('admin_id'); 
				$this->db->where('id', $data['id']);
				$this->db->update('ins_insurance_record', $data); 
				return $data['id']; 
			} else {
				unset($data['id']); 
				$data['created_by'] = $this->session->userdata('admin_id'); 
				$this->db->insert('ins_insurance_record', $data); 
				return $this->db->insert_id();
			}	
		}

		public function save_company_commission($data) {
			$this->db->insert('ins_company_commission', $data); 
			return $this->db->insert_id(); 
		}
		

		

		public function issuedatewise_loginidcommission($date, $id) {
			$monthStart = date('Y-m-01', strtotime($date));
			$monthEnd = date('Y-m-t', strtotime($date));
		
			$sql = "SELECT * FROM ins_loginid WHERE updated_date BETWEEN ? AND ? AND id = ? ORDER BY updated_date DESC LIMIT 1";
			$query = $this->db->query($sql, array($monthStart, $monthEnd, $id));
		
			if ($query->num_rows() > 0) {
				return $query->row_array();
			} else {
				return null;
			}
		}
		
		public function get_last_update_commission_data($id) {
			$this->db->where('id', $id);
			$this->db->order_by('updated_date', 'DESC');
			$query = $this->db->get('ins_loginid', 1); 
		
			if ($query->num_rows() > 0) {
				return $query->row_array();
			} else {
				return false;
			}
		}

		public function is_approved($id) {
			$this->db->select('COUNT(*) as count'); 
			$this->db->from('ins_insurance_record iir'); 
		
			if (!empty($id)) {
				$this->db->where('iir.upload_status', 1); 
				$this->db->where('iir.id', $id); 
			}
		
			$query = $this->db->get(); 
			$result = $query->row();
			return ($result->count > 0);
		}

		public function exist_policynumber($policy_number) {
			$this->db->select('id');
			$this->db->from('ins_insurance_record');
			$this->db->where('policy_number', $policy_number);
			$this->db->where('is_delete !=', 1);
			$query = $this->db->get();
			
			return $query->num_rows() > 0;
		}

		// public function run_pythonscript($pdfpath) {
		// 	$python_script = FCPATH . 'py_script.py';

		// 	$python_command = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? 'python' : 'python3';
			
		// 	$command = escapeshellcmd("$python_command " . escapeshellarg($python_script) . " " . escapeshellarg($pdfpath));
		// 	$output = shell_exec($command);

		// 	// echo "<pre>"; print_r($output); exit();

		// 	return json_decode($output, true);
		// }

        public function run_pythonscript($pdfpath) {
            $python_script = FCPATH . 'py_script.py';

            // Choose Python executable (env > venv > python3 > python)
            $envPython = getenv('PYTHON_BIN');
            $venvPython = '/home/myrrainsurance/venv/bin/python';
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                $candidates = [$envPython ?: null, 'python'];
            } else {
                $candidates = [$envPython ?: null, is_file($venvPython) ? $venvPython : null, 'python3', 'python'];
            }
            $candidates = array_values(array_filter($candidates));
            $python_command = reset($candidates);
            if (!$python_command) { $python_command = 'python3'; }

            // Build the command safely
            $command = escapeshellcmd($python_command) . ' ' . escapeshellarg($python_script) . ' ' . escapeshellarg($pdfpath);

            // Execute the command and capture only stdout (stderr is separated)
            // Use platform-specific null device
            $null_device = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? 'NUL' : '/dev/null';
            $output = shell_exec($command . ' 2>' . $null_device);

            // Handle empty output
            if (empty($output)) {
                log_message('error', 'Python script returned empty output | Cmd: ' . $command);
                return [ 'error' => 'Python script returned no output. Check if Python and required packages are installed.' ];
            }

            // Trim output to remove any whitespace
            $output = trim($output);

            // Decode JSON output
            $data = json_decode($output, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                log_message('error', 'Python script returned invalid JSON: ' . json_last_error_msg() . ' | Cmd: ' . $command . ' | Output: ' . substr($output, 0, 500));
                return [ 
                    'error' => 'Invalid JSON from Python script', 
                    'json_error' => json_last_error_msg(),
                    'output_preview' => substr($output, 0, 500)
                ];
            }

            return $data;
        }
		

		
		



		// public function delete_insurance_record($table, $id) {
		// 	$this->db->select('file_name');
		// 	$this->db->where('id', $id);
		// 	$query = $this->db->get($table);
		
		// 	if ($query->num_rows() > 0) {
		// 		$record = $query->row();
		// 		$file_name = $record->file_name;
		// 		$file_path = FCPATH . 'uploads/pdfs/' . $file_name;

		// 		$this->db->where('id', $id);
		// 		$this->db->delete($table);
		
		// 		if ($this->db->affected_rows() > 0) {
		// 			if (!empty($file_path) && file_exists($file_path)) {
		// 				unlink($file_path);
		// 			}
		// 			return true;
		// 		}
		// 	}
		
		// 	return false;
		// }

		public function clean_array_strings($array) {
			foreach ($array as $key => $value) {
				if (is_array($value)) {
					$array[$key] = $this->clean_array_strings($value);
				} elseif (is_string($value)) {
					$array[$key] = $this->clean_string($value);
				}
			}
			return $array;
		}

		public function clean_string($string) {
			return trim(preg_replace('/[\r\n]+/', ' ', $string));
		}

		public function netCalculation($od, $tp, $net) {
			$od = floatval(str_replace(',', '', $od ?? '0'));
			$tp = floatval(str_replace(',', '', $tp ?? '0'));
			$net = floatval(str_replace(',', '', $net ?? '0'));

			if ($net > 0) {
				return $net;
			}

			if ($od > 0 && $tp <= 0) {
				return $od;
			}

			if ($tp > 0 && $od <= 0) {
				return $tp;
			}

			return $od + $tp;
		}



		public function delete_insurance_record($table, $id) {
			$this->db->select('file_name');
			$this->db->where('id', $id);
			$query = $this->db->get($table);
		
			if ($query->num_rows() > 0) {
				$record = $query->row();
				$file_name = $record->file_name;
				$file_path = FCPATH . 'uploads/pdfs/' . $file_name;
		
				if (!empty($file_path) && file_exists($file_path)) {
					unlink($file_path);
				}
		
				return true; 
			}
		
			return false; 
		}

		public function delete_pdf_by_filename($file_name) {
			$file_path = FCPATH . 'uploads/pdfs/' . $file_name;
			if (!empty($file_name) && file_exists($file_path)) {
				unlink($file_path);
				return true;
			}
			return false;
		}

		public function convertToDecimal($value) {
			return !empty($value) ? number_format((float)str_replace(',', '', $value), 2, '.', '') : '0.00';
		}

		

		// Helper to map GVW to range string
		private function get_gvw_range($weight) {
			// Ensure $weight is a string or numeric; default to 0 if null or invalid
			if (is_null($weight) || $weight === '') {
				$weight = 0;
			}

			$weight = floatval(str_replace(',', '', $weight));

			if ($weight <= 2000) {
				return 'O - 2000 GVW';
			} elseif ($weight > 2000 && $weight <= 3500) {
				return '2000 - 3500 GVW';
			} elseif ($weight > 3500 && $weight <= 7500) {
				return '3500 - 7500 GVW';
			} elseif ($weight > 7500 && $weight <= 12000) {
				return '7500 - 12000 GVW';
			} elseif ($weight > 12000 && $weight <= 20000) {
				return '12000 - 20000 GVW';
			} elseif ($weight > 20000 && $weight <= 25000) {
				return '20000 - 25000 GVW';
			} elseif ($weight > 25000 && $weight <= 40000) {
				return '25000 - 40000 GVW';
			} elseif ($weight > 40000 && $weight <= 45000) {
				return '40000 - 45000 GVW';
			} elseif ($weight > 45000) {
				return 'MORE THAN 45000 GVW';
			}

			return '';
		}


		public function get_vehicle_age($manufacture_year) {
			$current_year = date('Y');
			if (is_numeric($manufacture_year) && $manufacture_year > 1900 && $manufacture_year <= $current_year) {
				return $current_year - intval($manufacture_year);
			}
			return null;
		}

		private function determine_pro_code($data) {
			$seating = isset($data['carrying_capacity']) ? strtolower(trim($data['carrying_capacity'])) : '';
			$gvw = isset($data['weight']) ? floatval(str_replace(',', '', $data['weight'])) : 0;
			$od_premium = isset($data['total_od_premium']) ? floatval(str_replace(',', '', $data['total_od_premium'])) : 0;
			$type = isset($data['type']) ? strtolower($data['type']) : '';
			$make_model = isset($data['make_model']) ? strtolower($data['make_model']) : '';
			$insured_name = isset($data['insured_name']) ? strtolower($data['insured_name']) : '';

			// School/Institute/College Bus
			if (
				(strpos($make_model, 'school') !== false || strpos($make_model, 'institute') !== false || strpos($make_model, 'college') !== false ||
				 strpos($type, 'school') !== false || strpos($type, 'institute') !== false || strpos($type, 'college') !== false ||
				 strpos($insured_name, 'school') !== false || strpos($insured_name, 'institute') !== false || strpos($insured_name, 'college') !== false)
			) {
				return $od_premium > 0 ? 'SCHOOL BUS PACKAGE POLICY' : 'SCHOOL BUS ACT POLICY';
			}

			// 3W Passenger Auto
			if (
				(strpos($make_model, '3w') !== false || strpos($make_model, 'auto') !== false || strpos($type, '3w') !== false || strpos($type, 'auto') !== false)
				&& ($seating === '4' || $seating === '<4' || $seating === 'less than 4' || $seating === '4 or less than 4')
			) {
				return $od_premium > 0 ? '3W PASSENGER AUTO - PACKAGE POLICY' : '3W PASSENGER AUTO - ACT POLICY';
			}

			// Taxi (Cab)
			if (
				(strpos($make_model, 'cab') !== false || strpos($make_model, 'taxi') !== false || strpos($type, 'cab') !== false || strpos($type, 'taxi') !== false)
				|| ($seating !== '' && is_numeric($seating) && intval($seating) > 4 && intval($seating) < 6)
			) {
				return $od_premium > 0 ? 'TAXI PACKAGE POLICY' : 'TAXI - ACT POLICY';
			}

			// Staff Bus
			if ($seating !== '' && is_numeric($seating) && intval($seating) > 6) {
				return $od_premium > 0 ? 'STAFF BUS PACKAGE POLICY' : 'TAXI - ACT POLICY';
			}

			// GCV (Goods Carrying Vehicle) by GVW
			if ($gvw > 0 && $gvw <= 2000) {
				return $od_premium > 0 ? 'GCV PACKAGE POLICY' : 'GCV - ACT POLICY';
			}

			// Default fallback
			return 'GCV';
		}
	}
?>