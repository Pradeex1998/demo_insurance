<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	class Insurance extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/appuser_model', 'appuser_model');
			$this->load->model('admin/user_model', 'adminuser_model');
			$this->load->model('common_model', 'common_model');
			$this->load->model('insurance/insurance_model', 'insurance_model');
			$this->load->model('insurance/master_model', 'master_model');
		}

		public function upload_pdf() {
			$uploadDir = './uploads/pdfs/';
			if (!file_exists($uploadDir)) {
				mkdir($uploadDir, 0777, true);
			}

			$config['upload_path'] = $uploadDir;
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 10240; // 10MB
			$config['encrypt_name'] = TRUE; // 🔥 Encrypt file names to avoid conflicts
			$this->load->library('upload');

			$uploaded_files = []; // 🔥 Collect file names
			$response = [];

			

			if (!empty($_FILES['files']['name'][0])) {
				$file_count = count($_FILES['files']['name']);
				for ($i = 0; $i < $file_count; $i++) {
					$_FILES['file']['name'] = $_FILES['files']['name'][$i];
					$_FILES['file']['type'] = $_FILES['files']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['files']['error'][$i];
					$_FILES['file']['size'] = $_FILES['files']['size'][$i];

					$this->upload->initialize($config);
					if ($this->upload->do_upload('file')) {
						$data = $this->upload->data();
						$uploaded_files[] = $data['file_name'];
					} else {
						$response[] = ['status' => 'error', 'message' => $this->upload->display_errors()];
					}
				}

				if (!empty($uploaded_files)) {
					$this->session->set_userdata('inspdfnames', $uploaded_files);

					echo json_encode(['status' => 'success', 'fileNames' => $uploaded_files]);
				} else {
					echo json_encode(['status' => 'error', 'message' => 'Upload failed for all files.', 'errors' => $response]);
				}
			} else {
				echo json_encode(['status' => 'error', 'message' => 'No files uploaded.']);
			}
		}

		public function insurance_list() {
			$data['title'] = 'Insurance record List';
			$data['loginids'] = $this->common_model->get_data_array('ins_loginid');
			$data['agencies'] = $this->common_model->get_data_array('ins_agency');
			$data['branch_data'] = $this->master_model->active_branch();
			$data['view'] = 'insurance/insurance_list';
			$this->load->view('layout',$data);
		}

		function insurance_form($mode, $id=null) {
			$title = '';
			if($mode=='e')
				$title = 'Edit Insurance';
			else if($mode=='v')
				$title = 'View Insurance';
			else
				$title = 'Add Insurance';

			$postdata = array();
			$postdata['title'] = $title;
			$postdata['mode'] = $mode;


			$data['id'] = $id;
			$data['loginid'] = $this->common_model->get_data_array('ins_loginid');
			$data['agencies'] = $this->agency_model->get_agency_by_branch();
			$data['staffs'] = $this->master_model->active_staff_list();
			
			$data['mode'] = $mode;
			$data['view'] = 'insurance/insurance_form';
			$data['postdata'] = $postdata;
			$this->load->view('layout',$data);
		}

		public function submit_insurance($mode) {
			$data = $_POST;
			$data['received_account'] = $this->input->post('received_account');
			$data['received_date'] = $this->input->post('received_date');
			
			$res_status = '';
			if($mode == 'a') {
				$res_status = $this->insurance_model->add_insurance($data);
			} else {
				$res_status = $this->insurance_model->edit_insurance($data);
			}
		
			$response = [];
			if ($res_status) {
				$response['status'] = '1';
				$response['message'] = 'Insurance addition/update successful.';
			} else {
				$response['status'] = '0';
				$response['message'] = 'Insurance addition/update failed.';
			}
		
			
			echo json_encode($response);
		}

		public function insurance_list_datatable_json() {
			$requestData = $_POST;
			$draw = $requestData['draw'];

			$userdata = $this->session->userdata('userdata');
			// echo '<pre>';
			// print_r($userdata);
			// exit;
			// Role-based agency filtering
			$user_role = $userdata['role_id'];
			if ($user_role == 3) { // Agent role - use their agency_id
				$agency_id = $userdata['agency_id']; // Use the user's agency_id
			} else { // Admin/Manager - use request agency_id or empty
				$agency_id = $requestData['agency_id'] ?? '';
			}
			
			$loginid = $requestData['loginid'] ?? '';
			$upload_status = $requestData['upload_status'] ?? '';
			$datepicker = $requestData['datepicker'] ?? '';
			$branch_id = $requestData['branch_id'] ?? $userdata['branch_id'];	
		
			$columns = array(
				// S.No, Staff Name, Insured Name, Policy Number, Registration No, Login ID, Agent Name, Contact No, Mail Id, Date, Company, Product Type, Pro Code, GVW Range, New, Vehicle Age, GVW, Year, Model, Start Date, End Date, Brokerage Name, Login Code, Carrying Capacity
				0 => 'iir.id',
				1 => 'isf.name',
				2 => 'iir.insured_name',
				3 => 'iir.policy_number',
				4 => 'iir.registration_no',
				5 => 'il.name', // Login ID
				6 => 'ag.name', // Agent Name
				7 => 'ag.mobile_no', // Contact No
				8 => 'ag.email', // Mail Id
				9 => 'iir.date',
				10 => 'iir.company',
				11 => 'iir.product_type',
				12 => 'iir.pro_code',
				13 => 'iir.gvw_range',
				14 => 'iir.new',
				15 => 'iir.vehicle_age',
				16 => 'iir.gvw',
				17 => 'iir.year',
				18 => 'iir.model',
				19 => 'iir.start_date',
				20 => 'iir.end_date',
				21 => 'iir.brokerage_name',
				22 => 'iir.login_code',
				23 => 'iir.carrying_capacity',
				// OD Premium, TP Premium, Net Premium, Gross Premium
				24 => 'iir.od_premium',
				25 => 'iir.tp_premium',
				26 => 'iir.net_premium',
				27 => 'iir.gross_premium',
				// In Payout % - OD%, TP%, Net%
				28 => 'iir.company_od',
				29 => 'iir.company_tp',
				30 => 'iir.company_net',
				// In Payout - OD Payout, TP Payout, Net Payout, Total Company Payout, Payment Mode
				31 => 'v.company_odpayout',
				32 => 'v.company_tppayout',
				33 => 'v.company_netpayout',
				34 => 'v.company_totpayout',
				35 => 'iir.company_paymentmode',
				// Out Payout % - OD%, TP%, Net%
				36 => 'iir.agent_od',
				37 => 'iir.agent_tp',
				38 => 'iir.agent_net',
				// Out Payout - OD Payout, TP Payout, Net Payout, Agent Commission
				39 => 'v.agent_odpayout',
				40 => 'v.agent_tppayout',
				41 => 'v.agent_netpayout',
				42 => 'v.agent_commission',
				// Payment Type, Agent Paid, Balance To Agent, Company Payment Amount, Agent Payable, Amt.From Agent, Balance, Net
				43 => 'v.payment_type',
				44 => 'v.agent_paid',
				45 => 'v.balance_to_agent',
				46 => 'v.company_payment_amount',
				47 => 'v.agent_payable',
				48 => 'v.amount_from_agent',
				49 => 'v.balance',
				50 => 'v.net',
				// Updated Date, Status, Action
				51 => 'iir.updated_date',
				52 => 'iir.status',
				53 => 'iir.updated_date', // Action column
				54 => 'sort_order', // Sort order for null dates
				55 => 'sort_date' // Sort date field
			);
		
			$limit = $requestData['length'];
			$start = $requestData['start'];
			$order_column_index = $requestData['order'][0]['column'];
			$order = $columns[$order_column_index];
			$dir = $requestData['order'][0]['dir'];
			$search = trim($requestData['search']['value']);
		
			// Get dynamic parameters from request
			$date_from = $requestData['date_from'] ?? '2025-10-01';
			$date_to = $requestData['date_to'] ?? '2025-10-31';
			
			// Build dynamic WHERE conditions
			$where_conditions = [];
			
			// Agent filtering - role-based
			if (!empty($agency_id)) {
				if (is_array($agency_id)) {
					$agency_ids = array_map('intval', $agency_id);
					$where_conditions[] = "iir.agency_id IN (" . implode(',', $agency_ids) . ")";
				} else {
					$where_conditions[] = "iir.agency_id = '" . intval($agency_id) . "'";
				}
			}
			
			// Branch filtering
			if (!empty($branch_id)) {
				if (is_array($branch_id)) {
					$branch_ids = array_map('intval', $branch_id);
					$where_conditions[] = "ag.branch_id IN (" . implode(',', $branch_ids) . ")";
				} else {
					$where_conditions[] = "ag.branch_id = '" . intval($branch_id) . "'";
				}
			}
			
			
			// Login ID filtering
			if (!empty($loginid)) {
				if (is_array($loginid)) {
					$login_ids = array_map('intval', $loginid);
					$where_conditions[] = "iir.login_id IN (" . implode(',', $login_ids) . ")";
				} else {
					$where_conditions[] = "iir.login_id = '" . intval($loginid) . "'";
				}
			}
			
			// Upload status filtering
			if ($upload_status != '') {
				$where_conditions[] = "iir.upload_status = '" . $this->db->escape_str($upload_status) . "'";
			}
			
			// Date picker filtering (overrides date_from/date_to if provided)
			if (!empty($datepicker)) {
				$dates = explode(' - ', $datepicker);
				if (count($dates) == 2) {
					$start_datetime = DateTime::createFromFormat('d/m/Y', trim($dates[0]))->setTime(0, 0, 0)->format('Y-m-d H:i:s');
					$end_datetime = DateTime::createFromFormat('d/m/Y', trim($dates[1]))->setTime(23, 59, 59)->format('Y-m-d H:i:s');
					$date_from = $start_datetime;
					$date_to = $end_datetime;
				}
			}
			
			// Search filtering
			$search_condition = '';
			if (!empty($search)) {
				$search_condition = "AND (iir.name LIKE '%" . $this->db->escape_str($search) . "%' 
					OR ag.name LIKE '%" . $this->db->escape_str($search) . "%' 
					OR iir.company LIKE '%" . $this->db->escape_str($search) . "%' 
					OR iir.insured_name LIKE '%" . $this->db->escape_str($search) . "%' 
					OR iir.product_type LIKE '%" . $this->db->escape_str($search) . "%' 
					OR iir.policy_number LIKE '%" . $this->db->escape_str($search) . "%' 
					OR iir.registration_no LIKE '%" . $this->db->escape_str($search) . "%' 
					OR ag.mobile_no LIKE '%" . $this->db->escape_str($search) . "%' 
					OR ag.email LIKE '%" . $this->db->escape_str($search) . "%' 
					OR iir.year LIKE '%" . $this->db->escape_str($search) . "%' 
					OR iir.model LIKE '%" . $this->db->escape_str($search) . "%' 
					OR iir.status LIKE '%" . $this->db->escape_str($search) . "%' 
					OR DATE_FORMAT(iir.date, '%d/%m/%Y') LIKE '%" . $this->db->escape_str($search) . "%' 
					OR DATE_FORMAT(iir.updated_date, '%d/%m/%Y %h:%i') LIKE '%" . $this->db->escape_str($search) . "%')";
			}
			
			// Build WHERE clause
			$where_clause = '';
			if (!empty($where_conditions)) {
				$where_clause = 'AND ' . implode(' AND ', $where_conditions);
			}
			
			$sql = "SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					COALESCE(isf.name, iir.staff_id) AS staff_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					1 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN ins_staff isf ON iir.staff_id = isf.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '" . $this->db->escape_str($date_from) . "' AND '" . $this->db->escape_str($date_to) . "'
					AND iir.is_delete = 0
					$where_clause
					$search_condition";
			
			// $where = array(); // Commented out - filtering now built into UNION query
		
			if (!empty($search)) {
				
				$where[] = "(iir.staff_name LIKE '%$search%' 
							OR ag.name LIKE '%$search%' 
							OR iir.company LIKE '%$search%' 
							OR iir.insured_name LIKE '%$search%' 
							OR iir.product_type LIKE '%$search%' 
							OR iir.policy_number LIKE '%$search%' 
							OR iir.registration_no LIKE '%$search%' 
							OR ag.mobile_no LIKE '%$search%' 
							OR ag.email LIKE '%$search%' 
							OR iir.year LIKE '%$search%' 
							OR iir.model LIKE '%$search%' 
							OR iir.status LIKE '%$search%' 
							OR DATE_FORMAT(iir.date, '%d/%m/%Y') LIKE '%$search%' 
							OR DATE_FORMAT(iir.updated_date, '%d/%m/%Y %h:%i') LIKE '%$search%')";
			}

			if (!empty($agency_id)) {
				if (is_array($agency_id)) {
					$agency_ids = array_map('intval', $agency_id);
					$where[] = "iir.agency_id IN (" . implode(',', $agency_ids) . ")";
				} else {
					$where[] = "iir.agency_id = '" . intval($agency_id) . "'";
				}
			}

			$userdata = $this->session->userdata('userdata');
			// if($userdata['user_role'] != 'admin') {
			// 	$where[] = "ag.branch_id = " . (int)$userdata['branch_id'];
			// }

			if (!empty($loginid)) {
				if (is_array($loginid)) {
					$login_ids = array_map('intval', $loginid);
					$where[] = "iir.login_id IN (" . implode(',', $login_ids) . ")";
				} else {
					$where[] = "iir.login_id = '" . intval($loginid) . "'";
				}
			}

			if (!empty($branch_id)) {
				if (is_array($branch_id)) {
					$branch_ids = array_map('intval', $branch_id);
					$where[] = "ag.branch_id IN (" . implode(',', $branch_ids) . ")";
				} else {
					$where[] = "ag.branch_id = '" . intval($branch_id) . "'";
				}
			}

			if ($upload_status != '') {
				$where[] = "iir.upload_status = '$upload_status'";
			}
			
			if (!empty($datepicker)) {
				$dates = explode(' - ', $datepicker);
				if (count($dates) == 2) {
					$start_datetime = DateTime::createFromFormat('d/m/Y', trim($dates[0]))->setTime(0, 0, 0)->format('Y-m-d H:i:s');
					$end_datetime = DateTime::createFromFormat('d/m/Y', trim($dates[1]))->setTime(23, 59, 59)->format('Y-m-d H:i:s');
					$where[] = "iir.date BETWEEN '$start_datetime' AND '$end_datetime'";
				}	
			}

			$where[] = "iir.is_delete = 0";
		
			// Note: WHERE conditions are now built into the UNION query
			// Additional filtering can be added here if needed
			$sql .= " ORDER BY $order $dir";
			if ($limit != -1) {
				$sql .= " LIMIT $start, $limit";
			}
			// echo "<pre>";print_r($sql);exit();
			$query_filtered = $this->db->query($sql);
			
			$totalFiltered = $query_filtered->num_rows();
		
		
			$query = $this->db->query($sql);
			$data = array();
			$index = $start + 1;
			$dataObj = $query->result();
		
			$this->session->set_userdata('insurance_list', $dataObj);
		
			foreach ($dataObj as $row) {
				$status = '';
				if ($row->status == 'active') {
					$status = '<span style="color:#228B22;text-align:center;font-weight:bold">Active</span>';
				} elseif ($row->status == 'inactive') {
					$status = '<span style="color:orange;text-align:center;font-weight:bold">Inactive</span>';
				} elseif ($row->status == 'Blocked') {
					$status = '<span style="color:red;text-align:center;font-weight:bold">Blocked</span>';
				}

				// $approve = $this->insurance_model->is_approved($row->id);
				$nameStyle = 'border-bottom: 1px solid #222222; text-decoration: none; color: #222222;';
				$companyName = $row->company;

				$grosspremium 	 	= $row->gross_premium;
				$agentcommission 	= $row->agent_commission;
				$commission		 	= $grosspremium - $agentcommission;

				$agentamount = (float)$commission;

				if ($row->paid_type == "Company Paid") {
					$balance = $agentamount - (float)$row->amount_from_agent;
					$balance = number_format($balance, 2);
				} else {
					$balance =  number_format((float)$row->agent_commission, 2);
				}
				if ($balance < 0) $balance = '<span style="color:red;white-space: nowrap;">'.$balance.'</span>';
				
				
				if ($row->paid_type == "Company Paid") {
					$net = $agentamount - (float)$row->amount_from_agent;
					$net = number_format($net, 2);
					if ($net < 0) {
						$net = '<span style="color:red;white-space: nowrap;">' . $net . '</span>';
					}
				} else {
					$net =  number_format((float)$row->agent_commission, 2);
				}
				if ($net < 0) $net = '<span style="color:red;white-space: nowrap;">' . $net . '</span>';

				$data[] = array(
					// S.No, Staff Name, Insured Name, Policy Number, Registration No, Login ID, Agent Name, Contact No, Mail Id, Date, Company, Product Type, Pro Code, GVW Range, New, Vehicle Age, GVW, Year, Model, Start Date, End Date, Brokerage Name, Login Code, Carrying Capacity
					$index,
					$row->staff_name,
					$row->insured_name,
					'<a href="' . base_url('admin/insurance/insurance_form/v/' . $row->id) . '" style="' . $nameStyle . '">' . $row->policy_number . '</a>',
					$row->registration_no,
					$row->login_name, // Login ID
					$row->agency_name, // Agent Name
					$row->agent_mobile_no, // Contact No
					$row->agent_email, // Mail Id
					$row->date != '0000-00-00' && $row->date != null ? date('d/m/Y', strtotime($row->date)) : "",
					'<a href="' . base_url('admin/insurance/insurance_form/v/' . $row->id) . '" style="' . $nameStyle . '">' . $companyName . '</a>',
					$row->product_type,
					$row->pro_code ?? '',
					$row->gvw_range ?? '',
					$row->new ?? '',
					$row->vehicle_age ?? '',
					$row->gvw,
					$row->year,
					$row->model,
					$row->start_date != '0000-00-00' && $row->start_date != null ? date('d-m-Y', strtotime($row->start_date)) : "",
					$row->end_date != '0000-00-00' && $row->end_date != null ? date('d-m-Y', strtotime($row->end_date)) : "",
					$row->brokerage_name ?? '',
					$row->login_code ?? '',
					$row->carrying_capacity ?? '',
					// OD Premium, TP Premium, Net Premium, Gross Premium
					$row->od_premium,
					$row->tp_premium,
					$row->net_premium,
					$row->gross_premium,
					// In Payout % - OD%, TP%, Net%
					$row->company_od . " %",
					$row->company_tp . " %",
					$row->company_net . " %",
					// In Payout - OD Payout, TP Payout, Net Payout, Total Company Payout, Payment Mode
					$row->company_odpayout ?? '0.00',
					$row->company_tppayout ?? '0.00',
					$row->company_netpayout ?? '0.00',
					$row->company_totpayout ?? '0.00',
					$row->company_paymentmode ?? '',
					// Out Payout % - OD%, TP%, Net%
					$row->agent_od . " %",
					$row->agent_tp . " %",
					$row->agent_net . " %",
					// Out Payout - OD Payout, TP Payout, Net Payout, Agent Commission
					$row->agent_odpayout ?? '0.00',
					$row->agent_tppayout ?? '0.00',
					$row->agent_netpayout ?? '0.00',
					$row->agent_commission ?? '0.00',
					// Payment Type, Agent Paid, Balance To Agent, Company Payment Amount, Agent Payable, Amt.From Agent, Balance, Net
					$row->payment_type ?? '',
					$row->agent_paid ?? '0.00',
					$row->balance_to_agent ?? '0.00',
					$row->company_payment_amount ?? '0.00',
					$row->agent_payable ?? '0.00',
					$row->amount_from_agent ?? '0.00',
					$row->balance ?? '0.00',
					$row->net ?? '0.00',
					// Updated Date, Status, Action
					$row->formatted_updated_date,
					$status,
					'<a href="' . base_url('admin/insurance/insurance_form/e/' . $row->id) . '" class="waves-effect"><i class="material-icons md-18">edit</i></a>',
					$row->file_name ?? '',
				);
				$index++;
			}

			// Returning JSON data
			$json_data = array(
				"draw" => $draw,
				"recordsTotal" => $totalFiltered,
				"recordsFiltered" => $totalFiltered,
				"data" => $data
			);
		
			echo json_encode($json_data);
		}

		public function insurance_list_export() {
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
		
			// Set the sheet title and header style
			$sheet->setTitle('Insurance Record List');
			$styleArray = [
				'font' => ['bold' => true],
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
					'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
				],
				'borders' => [
					'bottom' => [
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
						'color' => ['rgb' => '333333'],
					],
				],
				'fill' => [
					'type'       => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
					'rotation'   => 90,
					'startcolor' => ['rgb' => '0d0d0d'],
					'endColor'   => ['rgb' => 'f2f2f2'],
				],
			];
			
			// Apply column widths
			foreach (range('A', 'AL') as $columnID) {
				$spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
			}

			$userRole = $this->session->userdata('user_role');

			if($userRole == 'staff' || $userRole == 'agency') {

				$headers = [
					"S.No", "Staff Name", "Insured Name", "Policy Number",  "Registration No", 
					"Login ID", "Agent Name", "Contact No", "Mail Id", "Date", "Company", 
					"Product Type", "Type", "GVW", "Year", "Model", "OD Premium", "TP Premium", 
					"Net Premium", "Gross Premium", "Updated Date", "Status"
				];
			} else {
				$headers = [
					"S.No", "Staff Name", "Insured Name", "Policy Number",  "Registration No", 
					"Login ID", "Agent Name", "Contact No", "Mail Id", "Date", "Company", 
					"Product Type", "Type", "GVW", "Year", "Model", "OD Premium", "TP Premium", 
					"Net Premium", "Gross Premium",
					"OD%", "TP%", "Net%", "OD Payout", "TP Payout", "Net Payout", 
					"Total Company Payout", "Payment Mode", "OD%", "TP%", "Net%", 
					"OD Payout", "TP Payout", "Net Payout", "Agent Commission", 
					"Payment Type", "Agent Paid", "Balance To Agent", "Company Payment Amount", 
					"Agent Payable", "Amt.From Agent", "Balance", "Net", "Updated Date", 
					"Status"
				];

			}
		
			// Set header columns
			
			$column = 'A';
			foreach ($headers as $header) {
				$sheet->setCellValue($column . '1', $header);
				$column++;
			}

			
			
			
			// Fetch filtered data based on selected IDs
			$data = $this->session->userdata('insurance_list');
			
			// Populate data rows
			$rowNumber = 2;
			$index = 1;
			foreach ($data as $row) {
				// Determine the status
				if($userRole == 'staff' || $userRole == 'agency') {

					$status = '';
					if ($row->status == 'active') {
						$status = 'Active';
					} elseif ($row->status == 'inactive') {
						$status = 'Inactive';
					} elseif ($row->status == 'Blocked') {
						$status = 'Blocked';
					}
				
					// Calculate agent amounts and balance
					$grosspremium = $row->gross_premium;
					$agentcommission = $row->agent_commission;
					$commission = $grosspremium - $agentcommission;
				
					$agentamount = (float)$commission;
				
					if ($row->paid_type == "Company Paid") {
						$balance = $agentamount - (float)$row->amount_from_agent;
						$balance = number_format($balance, 2);
					} else {
						$balance = number_format((float)$row->agent_commission, 2);
					}
				
					// Apply color for negative values
					$balanceValue = (float)$balance;
					if ($balanceValue < 0) {
						$sheet->getStyle('AL' . $rowNumber)->getFont()->getColor()->setRGB('FF0000');  // Red color for negative balance
					}
				
					if ($row->paid_type == "Company Paid") {
						$net = $agentamount - (float)$row->amount_from_agent;
						$net = number_format($net, 2);
						$netValue = (float)$net;
						if ($netValue < 0) {
							$sheet->getStyle('AM' . $rowNumber)->getFont()->getColor()->setRGB('FF0000');  // Red color for negative net
						}
					} else {
						$net = number_format((float)$row->agent_commission, 2);
					}
				
					// Populate data for each row
					$sheet->setCellValue('A' . $rowNumber, $index++);
					$sheet->setCellValue('B' . $rowNumber, $row->staff_name);
					$sheet->setCellValue('C' . $rowNumber, $row->insured_name);
					$sheet->setCellValue('D' . $rowNumber, $row->policy_number);
					$sheet->setCellValue('E' . $rowNumber, $row->registration_no);
					$sheet->setCellValue('F' . $rowNumber, $row->login_name);
					$sheet->setCellValue('G' . $rowNumber, $row->agency_name);
					$sheet->setCellValue('H' . $rowNumber, $row->agent_mobile_no);
					$sheet->setCellValue('I' . $rowNumber, $row->agent_email);
					$sheet->setCellValue('J' . $rowNumber, date('d/m/Y', strtotime($row->date)));
					$sheet->setCellValue('K' . $rowNumber, $row->company);
					$sheet->setCellValue('L' . $rowNumber, $row->product_type);
					$sheet->setCellValue('M' . $rowNumber, $row->type);
					$sheet->setCellValue('N' . $rowNumber, $row->gvw);
					$sheet->setCellValue('O' . $rowNumber, $row->year);
					$sheet->setCellValue('P' . $rowNumber, $row->model);
					$sheet->setCellValue('Q' . $rowNumber, $row->od_premium);
					$sheet->setCellValue('R' . $rowNumber, $row->tp_premium);
					$sheet->setCellValue('S' . $rowNumber, $row->net_premium);
					$sheet->setCellValue('T' . $rowNumber, $row->gross_premium);
					$sheet->setCellValue('U' . $rowNumber, $row->formatted_updated_date);
					$sheet->setCellValue('V' . $rowNumber, $status);
				
					$rowNumber++;
				} else {
					$status = '';
					if ($row->status == 'active') {
						$status = 'Active';
					} elseif ($row->status == 'inactive') {
						$status = 'Inactive';
					} elseif ($row->status == 'Blocked') {
						$status = 'Blocked';
					}
				
					// Calculate agent amounts and balance
					$grosspremium = $row->gross_premium;
					$agentcommission = $row->agent_commission;
					$commission = $grosspremium - $agentcommission;
				
					$agentamount = (float)$commission;
				
					if ($row->paid_type == "Company Paid") {
						$balance = $agentamount - (float)$row->amount_from_agent;
						$balance = number_format($balance, 2);
					} else {
						$balance = number_format((float)$row->agent_commission, 2);
					}
				
					// Apply color for negative values
					$balanceValue = (float)$balance;
					if ($balanceValue < 0) {
						$sheet->getStyle('AL' . $rowNumber)->getFont()->getColor()->setRGB('FF0000');  // Red color for negative balance
					}
				
					if ($row->paid_type == "Company Paid") {
						$net = $agentamount - (float)$row->amount_from_agent;
						$net = number_format($net, 2);
						$netValue = (float)$net;
						if ($netValue < 0) {
							$sheet->getStyle('AM' . $rowNumber)->getFont()->getColor()->setRGB('FF0000');  // Red color for negative net
						}
					} else {
						$net = number_format((float)$row->agent_commission, 2);
					}
				
					// Populate data for each row
					$sheet->setCellValue('A' . $rowNumber, $index++);
					$sheet->setCellValue('B' . $rowNumber, $row->staff_name);
					$sheet->setCellValue('C' . $rowNumber, $row->insured_name);
					$sheet->setCellValue('D' . $rowNumber, $row->policy_number);
					$sheet->setCellValue('E' . $rowNumber, $row->registration_no);
					$sheet->setCellValue('F' . $rowNumber, $row->login_name);
					$sheet->setCellValue('G' . $rowNumber, $row->agency_name);
					$sheet->setCellValue('H' . $rowNumber, $row->agent_mobile_no);
					$sheet->setCellValue('I' . $rowNumber, $row->agent_email);
					$sheet->setCellValue('J' . $rowNumber, date('d/m/Y', strtotime($row->date)));
					$sheet->setCellValue('K' . $rowNumber, $row->company);
					$sheet->setCellValue('L' . $rowNumber, $row->product_type);
					$sheet->setCellValue('M' . $rowNumber, $row->type);
					$sheet->setCellValue('N' . $rowNumber, $row->gvw);
					$sheet->setCellValue('O' . $rowNumber, $row->year);
					$sheet->setCellValue('P' . $rowNumber, $row->model);
					$sheet->setCellValue('Q' . $rowNumber, $row->od_premium);
					$sheet->setCellValue('R' . $rowNumber, $row->tp_premium);
					$sheet->setCellValue('S' . $rowNumber, $row->net_premium);
					$sheet->setCellValue('T' . $rowNumber, $row->gross_premium);
					$sheet->setCellValue('U' . $rowNumber, $row->company_od . '%');
					$sheet->setCellValue('V' . $rowNumber, $row->company_tp . '%');
					$sheet->setCellValue('W' . $rowNumber, $row->company_net . '%');
					$sheet->setCellValue('X' . $rowNumber, $row->company_odpayout);
					$sheet->setCellValue('Y' . $rowNumber, $row->company_tppayout);
					$sheet->setCellValue('Z' . $rowNumber, $row->company_netpayout);
					$sheet->setCellValue('AA' . $rowNumber, $row->company_totpayout);
					$sheet->setCellValue('AB' . $rowNumber, $row->company_paymentmode);
					$sheet->setCellValue('AC' . $rowNumber, $row->agent_od . '%');
					$sheet->setCellValue('AD' . $rowNumber, $row->agent_tp . '%');
					$sheet->setCellValue('AE' . $rowNumber, $row->agent_net . '%');
					$sheet->setCellValue('AF' . $rowNumber, $row->agent_odpayout);
					$sheet->setCellValue('AG' . $rowNumber, $row->agent_tppayout);
					$sheet->setCellValue('AH' . $rowNumber, $row->agent_netpayout);
					$sheet->setCellValue('AI' . $rowNumber, $row->agent_commission);
					$sheet->setCellValue('AJ' . $rowNumber, $row->paid_type);
	
					if ($row->paid_type == "Agent Paid") {
						$agencyPaidGross = number_format($row->gross_premium, 2);
						$agencyPaidCommission = number_format($row->agent_commission, 2);
	
						$sheet->setCellValue('AK' . $rowNumber, $agencyPaidGross);
						$sheet->setCellValue('AL' . $rowNumber, $agencyPaidCommission);
						$sheet->setCellValue('AM' . $rowNumber, "0.00");
						$sheet->setCellValue('AN' . $rowNumber, "0.00");
						$sheet->setCellValue('AO' . $rowNumber, "0.00");
					} elseif ($row->paid_type == "Company Paid") {
						$companyPaidGross = number_format($row->gross_premium, 2);
						$companyPaidAgentAmount = $agentamount;
						$companyPaidFromAgent = number_format($row->amount_from_agent, 2);
	
						$sheet->setCellValue('AK' . $rowNumber, "0.00");
						$sheet->setCellValue('AL' . $rowNumber, "0.00");
						$sheet->setCellValue('AM' . $rowNumber, $companyPaidGross);
						$sheet->setCellValue('AN' . $rowNumber, $companyPaidAgentAmount);
						$sheet->setCellValue('AO' . $rowNumber, $companyPaidFromAgent);
					}
	
					$sheet->setCellValue('AP' . $rowNumber, $balance);
					$sheet->setCellValue('AQ' . $rowNumber, $net);
					$sheet->setCellValue('AR' . $rowNumber, $row->formatted_updated_date);
					$sheet->setCellValue('AS' . $rowNumber, $status);
				
					$rowNumber++;

				}
			}
			
		
			// Export and download the file
			$filename = 'insurance_record_list_' . date('Y_m_d_H_i_s') . '.xlsx';
			$writer = new Xlsx($spreadsheet);
			$writer->save($filename);
		
			header('Content-Disposition: attachment; filename=' . $filename);
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Length: ' . filesize($filename));
			header('Content-Transfer-Encoding: binary');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			ob_clean();
			flush();
		
			readfile($filename);
			unlink($filename);
		}
		
		

		public function delete_insurance($id) {
			$res_status = $this->insurance_model->delete_insurance_record('ins_insurance_record', $id);

			$postdata['id'] = $id;
			$postdata['is_delete'] = 1;
		
			$res_status = $this->insurance_model->save_insurance_record($postdata);
		
			$response = [];
			if ($res_status) {
				$response['status'] = '1';
				$response['message'] = 'Insurance deleted successfully.';
			} else {
				$response['status'] = '0';
				$response['message'] = 'Insurance deletion failed.';
			}
			echo json_encode($response);
		}
		
		// public function upload_photos() {
		// 	$upload_path = './uploads/agency_images/';
		// 	if (!is_dir($output_dir)) {
		// 		mkdir($output_dir, 0777, true);
		// 	}
		// 	$uploaded_files = $this->common_model->upload_files($upload_path, 'photos');
		// 	echo json_encode($uploaded_files);
		// }

		public function insurance_changeuploadstatus($id, $uploadstatus) {
			$postdata = array();

			$postdata['id'] = $id;
			$postdata['upload_status'] = $uploadstatus;
		
			$res_status = $this->insurance_model->save_insurance_record($postdata);

			if ($res_status) {
				$response['status'] = '1';
				$response['message'] = 'Insurance approved successfully.';
			} else {
				$response['status'] = '0';
				$response['message'] = 'Insurance approved failed.';
			}
			echo json_encode($response);
		}
	}
?>