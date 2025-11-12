<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	class Insurance_policy extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('insurance/Insurance_policy_model', 'insurance_policy_model');
			$this->load->model('admin/appuser_model', 'appuser_model');
			$this->load->model('admin/user_model', 'adminuser_model');
			$this->load->model('common_model', 'common_model');
			$this->load->model('insurance/Loginid_model', 'loginid_model');
			$this->load->model('insurance/master_model', 'master_model');
		}

		/**
		 * Minimal list page for insurance_policy
		 */
		public function insurance_policy_list() {
			$data['title'] = 'Insurance Policy List';
			// Reuse existing sources for filters if available
			$data['loginids'] = $this->common_model->get_data_array('ins_loginid');
			$data['agencies'] = $this->common_model->get_data_array('ins_agency');
			$data['branch_data'] = $this->master_model->active_branch();
			$data['view'] = 'insurance/insurance_policy_list';
			$this->load->view('layout',$data);
		}

		/**
		 * Datatable JSON for insurance_policy in the exact requested column order.
		 */
	public function insurance_policy_list_json() {
		$this->output->set_content_type('application/json');
		$draw  = intval($this->input->post('draw')) ?: 1;
		$start = intval($this->input->post('start')) ?: 0;
		$length = intval($this->input->post('length')) ?: 10;
		$search = $this->input->post('search')['value'] ?? '';
		$columns = $this->input->post('columns') ?? [];
		$order = $this->input->post('order') ?? [];

		// Column mapping: DataTable column index => database column
		$columnMap = [
			0 => 'ip.id',
			1 => 'ip.created_at',
			2 => 'ip.policy_no',
			3 => 'ip.vehicle_no',
			4 => 'ip.customer_name',
			5 => 'ip.make',
			6 => 'ip.model',
			7 => 'ip.vehicle_type',
			8 => 'irc.name',
			9 => 'ip.mfg_year',
			10 => 'ip.age',
			11 => 'ip.gvw',
			12 => 'ip.ncb',
			13 => 'ip.policy_type',
			14 => 'ip.start_date',
			15 => 'ip.end_date',
			16 => 'ip.company_name',
			17 => 'iac.name',
			18 => 'ip.payment_mode',
			19 => 'ip.od',
			20 => 'ip.tp',
			21 => 'ip.net',
			22 => 'ip.premium',
			23 => 'ip.reward',
			24 => 'ia.name',
			25 => 'ia.mobile_no',
			26 => 'ip.company_grid',
			27 => 'ip.company_grid2',
			28 => 'ip.tds',
			29 => 'ist.name',
			30 => 'ip.verified_status',
			31 => 'ip.status',
			32 => 'cu1.name',
			33 => 'cu2.name',
			34 => 'ip.created_at',
			35 => 'ip.updated_at'
		];

		// Get datepicker filter
		$datepicker = $this->input->post('datepicker') ?? '';
		
		// Build WHERE clause conditions array
		$whereConditions = array("ip.is_delete = 0");
		
		// Datepicker filtering
		if (!empty($datepicker)) {
			$dates = explode(' - ', $datepicker);
			if (count($dates) == 2) {
				$startDate = DateTime::createFromFormat('d/m/Y', trim($dates[0]));
				$endDate = DateTime::createFromFormat('d/m/Y', trim($dates[1]));
				if ($startDate && $endDate) {
					$startDatetime = $startDate->setTime(0, 0, 0)->format('Y-m-d H:i:s');
					$endDatetime = $endDate->setTime(23, 59, 59)->format('Y-m-d H:i:s');
					$whereConditions[] = "ip.created_at BETWEEN '" . $this->db->escape_str($startDatetime) . "' AND '" . $this->db->escape_str($endDatetime) . "'";
				}
			}
		}
		
		if (!empty($search)) {
			$escapedSearch = $this->db->escape_like_str($search);
			$searchCondition = "(
				ip.id LIKE '%" . $escapedSearch . "%' OR
				ip.created_at LIKE '%" . $escapedSearch . "%' OR
				ip.policy_no LIKE '%" . $escapedSearch . "%' OR
				ip.vehicle_no LIKE '%" . $escapedSearch . "%' OR
				ip.customer_name LIKE '%" . $escapedSearch . "%' OR
				ip.make LIKE '%" . $escapedSearch . "%' OR
				ip.model LIKE '%" . $escapedSearch . "%' OR
				ip.vehicle_type LIKE '%" . $escapedSearch . "%' OR
				irc.name LIKE '%" . $escapedSearch . "%' OR
				ip.mfg_year LIKE '%" . $escapedSearch . "%' OR
				ip.age LIKE '%" . $escapedSearch . "%' OR
				ip.gvw LIKE '%" . $escapedSearch . "%' OR
				ip.ncb LIKE '%" . $escapedSearch . "%' OR
				ip.policy_type LIKE '%" . $escapedSearch . "%' OR
				ip.start_date LIKE '%" . $escapedSearch . "%' OR
				ip.end_date LIKE '%" . $escapedSearch . "%' OR
				ip.company_name LIKE '%" . $escapedSearch . "%' OR
				iac.name LIKE '%" . $escapedSearch . "%' OR
				ip.payment_mode LIKE '%" . $escapedSearch . "%' OR
				ip.od LIKE '%" . $escapedSearch . "%' OR
				ip.tp LIKE '%" . $escapedSearch . "%' OR
				ip.net LIKE '%" . $escapedSearch . "%' OR
				ip.premium LIKE '%" . $escapedSearch . "%' OR
				ip.reward LIKE '%" . $escapedSearch . "%' OR
				ia.name LIKE '%" . $escapedSearch . "%' OR
				ia.mobile_no LIKE '%" . $escapedSearch . "%' OR
				ip.company_grid LIKE '%" . $escapedSearch . "%' OR
				ip.company_grid2 LIKE '%" . $escapedSearch . "%' OR
				ip.tds LIKE '%" . $escapedSearch . "%' OR
				ist.name LIKE '%" . $escapedSearch . "%' OR
				ip.verified_status LIKE '%" . $escapedSearch . "%' OR
				ip.status LIKE '%" . $escapedSearch . "%' OR
				cu1.name LIKE '%" . $escapedSearch . "%' OR
				cu2.name LIKE '%" . $escapedSearch . "%' OR
				ip.updated_at LIKE '%" . $escapedSearch . "%'
			)";
			$whereConditions[] = $searchCondition;
		}
		
		// Build final WHERE clause
		$whereClause = "";
		if (!empty($whereConditions)) {
			$whereClause = " WHERE " . implode(" AND ", $whereConditions);
		}

		// Build ORDER BY clause
		$orderBy = "ORDER BY ip.created_at DESC";
		if (!empty($order) && isset($order[0])) {
			$orderColumnIndex = intval($order[0]['column']);
			$orderDir = strtoupper($order[0]['dir']) === 'ASC' ? 'ASC' : 'DESC';
			
			if (isset($columnMap[$orderColumnIndex])) {
				$orderBy = "ORDER BY " . $columnMap[$orderColumnIndex] . " " . $orderDir;
			}
		}

		// Count total records
		$totalQuery = $this->db->query("SELECT COUNT(*) AS cnt FROM insurance_policy WHERE is_delete = 0");
		$total = (int)$totalQuery->row()->cnt;

		// Get filtered count using raw query
		$filteredSql = "SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			" . $whereClause;
		
		$filteredQuery = $this->db->query($filteredSql);
		$filtered = (int)$filteredQuery->row()->cnt;

		// Build main data query using raw SQL
		$dataSql = "SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			" . $whereClause . "
			" . $orderBy . "
			LIMIT " . (int)$start . ", " . (int)$length;
		
		$q = $this->db->query($dataSql);
		$rows = $q->result_array();

			// Helper function to format date
			$formatDate = function($date) {
				if (empty($date) || $date === '0000-00-00' || $date === '0000-00-00 00:00:00') {
					return '';
				}
				$timestamp = strtotime($date);
				return $timestamp ? date('d-m-Y', $timestamp) : '';
			};

			// Helper function to format status with color
			$formatStatus = function($status) {
				$status = strtolower(trim($status ?? ''));
				if ($status === 'active' || $status === '1') {
					return '<span class="label bg-green">Active</span>';
				} elseif ($status === 'inactive' || $status === '0') {
					return '<span class="label bg-red">Inactive</span>';
				}
				return '<span class="label bg-grey">' . ucfirst($status) . '</span>';
			};

			// Helper function to format verified status with color
			$formatVerifiedStatus = function($status) {
				$status = strtolower(trim($status ?? ''));
				if ($status === 'done' || $status === '1') {
					return '<span class="label bg-green">Done</span>';
				} elseif ($status === 'missing' || $status === '0') {
					return '<span class="label bg-orange">Missing</span>';
				} elseif ($status === 'shortfall' || $status === '2') {
					return '<span class="label bg-red">Shortfall</span>';
				}
				return '<span class="label bg-grey">' . ucfirst($status) . '</span>';
			};

			$data = array();
			foreach ($rows as $r) {
				$actionHtml = '<a href="' . base_url('admin/insurance_policy/insurance_policy_form/e/' . ($r['id'] ?? '')) . '" class="btn btn-xs bg-blue waves-effect" title="Edit"><i class="material-icons">edit</i></a>';
				$policyLink = $r['id']
					? '<a href="' . base_url('admin/insurance_policy/insurance_policy_form/v/' . $r['id']) . '" class="policy-view-link">' . ($r['policy_no'] ?? '') . '</a>'
					: ($r['policy_no'] ?? '');
				$rtoCombined = trim(($r['rto_company_name'] ?? '') . ' / ' . ($r['login_name'] ?? ''));
				$data[] = array(
					count($data) + 1,
					$formatDate($r['created_at'] ?? ''),
					$policyLink,
					$r['vehicle_no'] ?? '',
					$r['customer_name'] ?? '',
					$r['make'] ?? '',
					$r['model'] ?? '',
					$r['vehicle_type'] ?? '',
					$rtoCombined,
					$r['mfg_year'] ?? '',
					$r['age'] ?? '',
					$r['gvw'] ?? '',
					$r['ncb'] ?? '',
					$r['policy_type'] ?? '',
					$formatDate($r['start_date'] ?? ''),
					$formatDate($r['end_date'] ?? ''),
					$r['company_name'] ?? '',
					$r['agent_code_name'] ?? '',
					$r['payment_mode'] ?? '',
					$r['od'] ?? '',
					$r['tp'] ?? '',
					$r['net'] ?? '',
					$r['premium'] ?? '',
					$r['reward'] ?? '',
					$r['agent_name'] ?? '',
					$r['agent_mobile_no'] ?? '',
					$r['company_grid'] ?? '',
					$r['company_grid2'] ?? '',
					$r['tds'] ?? '',
					$r['staff_name'] ?? '',
					$formatVerifiedStatus($r['verified_status'] ?? ''),
					$formatStatus($r['status'] ?? ''),
					$r['created_by_name'] ?? '',
					$r['updated_by_name'] ?? '',
					isset($r['created_at']) && $r['created_at'] ? date('d/m/Y h:i A', strtotime($r['created_at'])) : '',
					isset($r['updated_at']) && $r['updated_at'] ? date('d/m/Y h:i A', strtotime($r['updated_at'])) : '',
					$actionHtml
				);
			}

			echo json_encode(array(
				'draw' => $draw,
				'recordsTotal' => $total,
				'recordsFiltered' => $filtered,
				'data' => $data
			));
		}

		/**
		 * Render Insurance Policy Form
		 * URL: /admin/insurance_policy/insurance_policy_form/{mode}/{id}
		 */
		public function insurance_policy_form($mode = 'a', $id = null)
		{
			$data['title'] = ($mode === 'a' ? 'Add' : ($mode === 'e' ? 'Edit' : 'View')) . ' Insurance Policy';
			$data['mode'] = $mode;
			$data['id'] = $id;
			
			$data['staffs'] = $this->common_model->get_data_array('ins_staff');
			$data['agents'] = $this->common_model->get_data_array('ins_agency');
			$data['login_ids'] = $this->common_model->get_data_array('ins_loginid');
			$data['agent_codes'] = $this->common_model->get_data_array('ins_agent_code');
			$data['rto_companies'] = $this->common_model->get_data_array('ins_rto_company');
			$data['view'] = 'insurance/insurance_policy_form';
			$this->load->view('layout', $data);
		}

		/**
		 * Return single insurance_policy row as JSON by ID.
		 */
		public function get_policy_json($id = null) {
			$this->output->set_content_type('application/json');
			if (empty($id)) {
				echo json_encode(array('status' => '0', 'message' => 'Invalid id'));
				return;
			}
			$q = $this->db->get_where('insurance_policy', array('id' => $id, 'is_delete' => 0), 1);
			if (!$q || $q->num_rows() === 0) {
				echo json_encode(array('status' => '0', 'message' => 'Not found'));
				return;
			}
			echo json_encode(array('status' => '1', 'data' => $q->row_array()));
		}

		/**
		 * Update insurance_policy by ID using posted fields.
		 */
		public function update_policy() {
			$this->output->set_content_type('application/json');
			$id = $this->input->post('id');
			if (!$id) {
				echo json_encode(array('status' => '0', 'message' => 'Missing id'));
				return;
			}
			$allowed = array(
				'policy_no','vehicle_no','customer_name','make','model','vehicle_type','rto_company_id',
				'mfg_year','age','gvw','ncb','policy_type','start_date','end_date','company_name',
				'agent_code_id','payment_mode','credit_card_id','od','tp','net','premium','reward','agent_id',
				'login_id','file_path','company_grid','company_grid2','tds','staff_id','verified_status','status'
			);
			$update = array();
			foreach ($allowed as $key) {
				$val = $this->input->post($key);
				if ($val !== null) $update[$key] = $val;
			}
			if (empty($update)) {
				echo json_encode(array('status' => '0', 'message' => 'Nothing to update'));
				return;
			}
			$update['updated_at'] = date('Y-m-d H:i:s');
			$update['updated_by'] = $this->session->userdata('user_id') ?? null;
			$this->db->where('id', $id);
			$this->db->where('is_delete', 0);
			$ok = $this->db->update('insurance_policy', $update);
			echo json_encode(array('status' => $ok ? '1' : '0', 'message' => $ok ? 'Updated' : 'Update failed'));
		}

		/**
		 * Resolve and open PDF by insurance_policy ID.
		 * Tries to match policy_no with ins_insurance_record.policy_number to get file_name.
		 * Redirects to the PDF URL if found; otherwise shows a simple message.
		 */
		public function open_pdf_by_id($id = null) {
			if (empty($id)) {
				show_error('Invalid ID', 400);
				return;
			}
			$q = $this->db->get_where('insurance_policy', array('id' => $id, 'is_delete' => 0), 1);
			if (!$q || $q->num_rows() === 0) {
				show_error('Policy not found', 404);
				return;
			}
			$policy = $q->row_array();
			if (!empty($policy['file_path'])) {
				$path = ltrim($policy['file_path'], '/\\');
				if (file_exists(FCPATH . $path)) {
					redirect(base_url($path));
					return;
				}
			}
			show_error('PDF not found', 404);
		}

		/**
		 * Upload PDFs, run Python extractor, and upsert into insurance_policy.
		 */
		public function upload_policy_pdfs() {
			$this->output->set_content_type('application/json');
			try {
				$uploadDir = './uploads/pdfs/';
				if (!file_exists($uploadDir)) {
					mkdir($uploadDir, 0777, true);
				}

				$config['upload_path'] = $uploadDir;
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = 10240;
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload');

				if (empty($_FILES['files']['name'][0])) {
					echo json_encode(array('status' => '0', 'message' => 'No files uploaded.'));
					return;
				}

				// Get form data (dropdown values and other fields)
				$formData = array(
					'staff_id' => $this->input->post('staff_id'),
					'agent_id' => $this->input->post('agent_id'),
					'login_id' => $this->input->post('login_id'),
					'agent_code_id' => $this->input->post('agent_code_id'),
					'payment_mode' => $this->input->post('payment_mode'),
					'paid_type' => $this->input->post('paid_type'),
					'credit_card_id' => $this->input->post('credit_card_id'),
					'rto_company_id' => $this->input->post('rto_company_id'),
				);

				$file_count = count($_FILES['files']['name']);
				$results = array('success' => array(), 'duplicates' => array(), 'errors' => array());
				for ($i = 0; $i < $file_count; $i++) {
					$_FILES['file']['name'] = $_FILES['files']['name'][$i];
					$_FILES['file']['type'] = $_FILES['files']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['files']['error'][$i];
					$_FILES['file']['size'] = $_FILES['files']['size'][$i];

					$this->upload->initialize($config);
					if (!$this->upload->do_upload('file')) {
						$results['errors'][] = array(
							'file' => $_FILES['file']['name'],
							'message' => strip_tags($this->upload->display_errors())
						);
						continue;
					}

					$data = $this->upload->data();
					$storedPath = $data['full_path'];
					$storedFileName = $data['file_name'];
					$origName = $data['client_name'];

					$extract = $this->_extract_policy_with_python($storedPath);
					// echo json_encode($extract);exit();
					
					if ($extract['error']) {
						$results['errors'][] = array('file' => $origName, 'message' => $extract['message']);
						continue;	
					}

					$payload = $this->_normalize_policy_payload_from_python($extract['data'], $formData);
					if (empty($payload['policy_no'])) {
						$results['errors'][] = array('file' => $origName, 'message' => 'Missing required field: policy_no');
						continue;
					}

					// Do not rename; rely on encrypt_name to generate unique name
					$payload['file_path'] = 'uploads/pdfs/' . $storedFileName;
					$payload['is_delete'] = 0;

					$upsert = $this->insurance_policy_model->upsert_policy($payload);
					if (!$upsert['ok']) {
						$dbError = $this->db->error();
						$results['errors'][] = array(
							'file' => $origName,
							'message' => 'Database operation failed' . (!empty($dbError['message']) ? (': ' . $dbError['message']) : '')
						);
					} else {
						if ($upsert['action'] === 'insert') {
							$results['success'][] = array('policy_no' => $payload['policy_no']);
						} else {
							$results['duplicates'][] = array('policy_no' => $payload['policy_no']);
						}
					}
				}

				$status = (count($results['success']) > 0) ? '1' : '0';
				$message = (count($results['success']) > 0) ? 'Processed with some results.' : 'No policies added.';
				echo json_encode(array('status' => $status, 'message' => $message, 'result' => $results));
			} catch (\Throwable $e) {
				echo json_encode(array('status' => '0', 'message' => 'Server error: ' . $e->getMessage()));
			}
		}

		public function delete_insurance_policy($id = null) {
			$this->output->set_content_type('application/json');
			if (empty($id) || !is_numeric($id)) {
				echo json_encode(array('status' => '0', 'message' => 'Invalid policy id'));
				return;
			}
			$id = (int)$id;
			$this->db->trans_start();
			$this->db->select('file_path');
			$query = $this->db->get_where('insurance_policy', array('id' => $id, 'is_delete' => 0), 1);
			if (!$query || $query->num_rows() === 0) {
				$this->db->trans_complete();
				echo json_encode(array('status' => '0', 'message' => 'Policy not found'));
				return;
			}
			$row = $query->row_array();
			$filePath = isset($row['file_path']) ? trim($row['file_path']) : '';

			$updateData = array(
				'is_delete' => 1,
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $this->session->userdata('user_id') ?? null
			);
			$this->db->where('id', $id);
			$this->db->where('is_delete', 0);
			$this->db->update('insurance_policy', $updateData);
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				echo json_encode(array('status' => '0', 'message' => 'Delete failed, please try again.'));
				return;
			}

			// if (!empty($filePath)) {
			// 	$fullPath = FCPATH . ltrim($filePath, '/\\');
			// 	if (is_file($fullPath) && file_exists($fullPath)) {
			// 		@unlink($fullPath);
			// 	}
			// }

			echo json_encode(array('status' => '1', 'message' => 'Policy deleted successfully'));
		}

		private function _extract_policy_with_python($pdfPath) {
			if (!file_exists($pdfPath)) {
				return array('error' => true, 'message' => 'PDF not found');
			}
			$script = FCPATH . 'py_script.py';
			if (!file_exists($script)) {
				return array('error' => true, 'message' => 'Python script not found');
			}

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
			$command = escapeshellcmd($python_command) . ' ' . escapeshellarg($script) . ' ' . escapeshellarg($pdfPath);

			// Execute the command and capture only stdout (stderr is separated)
			// Use platform-specific null device
			$null_device = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? 'NUL' : '/dev/null';
			$output = shell_exec($command . ' 2>' . $null_device);

			// Handle empty output
			if (empty($output)) {
				log_message('error', 'Python script returned empty output | Cmd: ' . $command);
				return array('error' => true, 'message' => 'Python script returned no output. Check if Python and required packages are installed.');
			}

			// Trim output to remove any whitespace
			$output = trim($output);

			// Decode JSON output
			$resp = json_decode($output, true);
			// echo json_encode($resp);exit();

			if (json_last_error() !== JSON_ERROR_NONE) {
				log_message('error', 'Python script returned invalid JSON: ' . json_last_error_msg() . ' | Cmd: ' . $command . ' | Output: ' . substr($output, 0, 500));
				return array(
					'error' => true,
					'message' => 'Invalid JSON from Python script: ' . json_last_error_msg()
				);
			}

			if (isset($resp['error'])) {
				return array('error' => true, 'message' => $resp['error']);
			}

			return array('error' => false, 'data' => $resp);
		}


		private function _normalize_policy_payload_from_python($py, $formData = array()) {
			$fields = isset($py['fields']) ? $py['fields'] : array();
			$text = isset($py['text']) ? $py['text'] : '';

			$get = function($key) use ($fields) { return isset($fields[$key]) ? $fields[$key] : null; };
			$toDate = function($val) {
				if (!$val) return null;
				$ts = strtotime($val);
				return $ts ? date('Y-m-d', $ts) : null;
			};
			$toNum = function($val) {
				if ($val === null || $val === '') return null;
				if (is_numeric($val)) return $val + 0;
				$clean = preg_replace('/[^\d\.\-]/', '', (string)$val);
				return is_numeric($clean) ? $clean + 0 : null;
			};

			$make = $get('make');
			$model = $get('model');

			$company_name = null;
			$companies = $this->insurance_policy_model->company_list();
			if ($text && is_array($companies)) {
				foreach ($companies as $c) {
					if (stripos($text, $c) !== false) { $company_name = $c; break; }
				}
			}

			$staffId = !empty($formData['staff_id']) ? $formData['staff_id'] : null;
			$login_id = !empty($formData['login_id']) ? $formData['login_id'] : null;
			$agentId = !empty($formData['agent_id']) ? $formData['agent_id'] : null;
			$agentCodeId = !empty($formData['agent_code_id']) ? $formData['agent_code_id'] : null;
			$paymentMode = !empty($formData['payment_mode']) ? $formData['payment_mode'] : null;
			$creditCardId = !empty($formData['credit_card_id']) ? $formData['credit_card_id'] : null;
			
			$loginIdData = $this->loginid_model->get_loginid_by_id($login_id);
			if ($loginIdData) {
				$rtoCompanyId = $loginIdData['rto_company_id'];
				$companyGrid = $loginIdData['net_premium'];
				$reward = $loginIdData['agent_netpremium'];
			} else {
				$rtoCompanyId = null;
				$companyGrid = null;
				$reward = null;
			}

			
			$od = $toNum($get('total_od_premium'));
			$tp = $toNum($get('total_tp_premium'));
			$net = $toNum($get('net_premium'));
			if ($net !== null ) {
				$net = $net;
			} else {
				$net = $od + $tp;
			}

			$payload = array(
				'policy_no' => $get('policy_number'),
				'vehicle_no' => $get('registration_number'),
				'customer_name' => $get('insured_name'),
				'make' => $make,
				'model' => $model,
				'vehicle_type' => $get('type'),
				'rto_company_id' => $rtoCompanyId,
				'mfg_year' => $get('year_of_manufacture'),
				'age' => ($get('year_of_manufacture') && is_numeric($get('year_of_manufacture'))) ? (date('Y') - intval($get('year_of_manufacture'))) : null,
				'gvw' => $toNum($get('weight')),
				'ncb' => $get('ncb'),
				'policy_type' => $get('product_type'),
				'start_date' => $toDate($get('start_date')),
				'end_date' => $toDate($get('end_date')),
				'company_name' => $company_name,
				'agent_code_id' => $agentCodeId,
				'payment_mode' => $paymentMode,
				'credit_card_id' => $creditCardId,
				'od' => $od,
				'tp' => $tp,
				'net' => $net,
				'premium' => $toNum($get('gross_premium')),
				'reward' => $reward,
				'agent_id' => $agentId,
				'login_id' => $login_id,
				'file_path' => null,
				'company_grid' => $companyGrid,
				'company_grid2' => null,
				'tds' => null,
				'staff_id' => $staffId,
				'login_id' => $login_id,
				'verified_status' => 'missing',
				'status' => 'active',
				'created_by' => $this->session->userdata('admin_id') ?? null,
			);

			return $payload;
		}
	}
?>