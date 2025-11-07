<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Reports extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/appuser_model', 'appuser_model');
		$this->load->model('admin/user_model', 'adminuser_model');
		$this->load->model('common_model', 'common_model');
		$this->load->model('insurance/insurance_model', 'insurance_model');
	}

	// ///////////  PAYOUT REPORT //////////// //

	public function payout_report() {
		$data['title'] = 'Payout Report';
		$data['loginids'] = $this->common_model->get_data_array('ins_loginid');
		
		$data['agencies'] = $this->common_model->get_data_array('ins_agency');
		
		// Get user role from session
		$userdata = $this->session->userdata('userdata');
		$data['user_role'] = $userdata['role_id'];
		
		$data['view'] = 'insurance/payout_report';
		$this->load->view('layout',$data);
	}

	// ///////////  AGENT WISE CONSOLIDATED PAYOUT REPORT //////////// //
	public function agentwise_consolidated_report() {
		$data['title'] = 'Agent wise consolidated report';
		$data['agencies'] = $this->common_model->get_data_array('ins_agency');
		
		// Get user role from session
		$userdata = $this->session->userdata('userdata');
		$data['user_role'] = $userdata['role_id'];
		
		$data['view'] = 'insurance/agentwise_consolidated_report';
		$this->load->view('layout', $data);
	}

	public function agentwise_consolidated_report_datatable_json() {
		$requestData = $_POST;
		$draw = $requestData['draw'] ?? 1;
		$agency_id = $requestData['agency_id'] ?? '';
		$datepicker = $requestData['datepicker'] ?? '';
		$search = $requestData['search']['value'] ?? '';

        $columns = [
            0 => 'agency_name',
            1 => 'sum_net_premium',
            2 => 'sum_gross_premium',
            3 => 'sum_agent_netpayout',
        ];

		$limit = (int)($requestData['length'] ?? 10);
		$start = (int)($requestData['start'] ?? 0);
		$order_column_index = (int)($requestData['order'][0]['column'] ?? 1);
		$order = $columns[$order_column_index] ?? 'company';
		$dir = ($requestData['order'][0]['dir'] ?? 'asc') === 'desc' ? 'DESC' : 'ASC';

        $baseSql = "SELECT 
                    COALESCE(ag.name, 'N/A') AS agency_name,
                    SUM(iir.net_premium) AS sum_net_premium,
                    SUM(iir.gross_premium) AS sum_gross_premium,
                    SUM(vi.agent_netpayout) AS sum_agent_netpayout
                FROM ins_insurance_record iir
                LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
                LEFT JOIN view_insurance_auto_calculation vi ON iir.id = vi.ins_id";

		$where = ["iir.is_delete = 0"];

		// Role-based filtering
		$userdata = $this->session->userdata('userdata');
		$user_role = $userdata['role_id'];
		if ($user_role == 3) { // Agent role - filter by their agency and branch
			$where[] = "iir.agency_id = '" . intval($userdata['agency_id']) . "'";
			$where[] = "ag.branch_id = '" . intval($userdata['branch_id']) . "'";
		} else if (!empty($agency_id)) { // Admin/Manager - use request agency_id
			$where[] = "iir.agency_id = '" . $this->db->escape_str($agency_id) . "'";
		}

		if (!empty($datepicker)) {
			$dates = explode(' - ', $datepicker);
			if (count($dates) == 2) {
				$start_datetime = DateTime::createFromFormat('d/m/Y', trim($dates[0]))->setTime(0, 0, 0)->format('Y-m-d H:i:s');
				$end_datetime = DateTime::createFromFormat('d/m/Y', trim($dates[1]))->setTime(23, 59, 59)->format('Y-m-d H:i:s');
				$where[] = "iir.created_date BETWEEN '" . $this->db->escape_str($start_datetime) . "' AND '" . $this->db->escape_str($end_datetime) . "'";
			}
		}
        if (!empty($search)) {
            $esc = $this->db->escape_like_str($search);
            $where[] = "(ag.name LIKE '%$esc%')";
        }

		$sql = $baseSql;
		if (!empty($where)) {
			$sql .= ' WHERE ' . implode(' AND ', $where);
		}
        $sql .= ' GROUP BY ag.name';

		// Filtered count
		$countSql = "SELECT COUNT(*) AS cnt FROM (" . $sql . ") AS t";
		$queryCnt = $this->db->query($countSql);
		$totalFiltered = (int)$queryCnt->row()->cnt;

		// Ordering and pagination
		$sql .= " ORDER BY $order $dir";
		if ($limit != -1) {
			$sql .= " LIMIT $start, $limit";
		}

		$query = $this->db->query($sql);
		$data = [];
		$index = $start + 1;
		foreach ($query->result() as $row) {
            $data[] = [
                $index++,
                $row->agency_name,
                number_format((float)$row->sum_net_premium, 2),
                number_format((float)$row->sum_gross_premium, 2),
                number_format((float)$row->sum_agent_netpayout, 2),
            ];
		}

		$json_data = [
			"draw" => $draw,
			"recordsTotal" => $totalFiltered,
			"recordsFiltered" => $totalFiltered,
			"data" => $data,
		];

		echo json_encode($json_data);
	}
	
	public function payout_report_datatable_json() {
		$requestData = $_POST;
		$draw = $requestData['draw'];
		$agency_id = $requestData['agency_id'] ?? '';
		$loginid = $requestData['loginid'] ?? '';
		$datepicker = $requestData['datepicker'] ?? '';
		$search = $requestData['search']['value'] ?? '';

		$columns = [
			0 => 'iir.id',
			1 => 'iir.date',
			2 => 'iir.insured_name',
			3 => 'iir.policy_number',
			4 => 'iir.registration_no',
			5 => 'iir.company',
			6 => 'iir.net_premium',
			7 => 'iir.gross_premium',
			8 => 'iir.agent_net',
			9 => 'iir.agent_netpayout',
		];

		$limit = $requestData['length'];
		$start = $requestData['start'];
		$order_column_index = $requestData['order'][0]['column'];
		$order = $columns[$order_column_index];
		$dir = $requestData['order'][0]['dir'];

		$sql = "SELECT iir.*, 
					DATE_FORMAT(iir.date, '%d/%m/%Y') AS formatted_date,
					vi.agent_netpayout
			FROM ins_insurance_record iir 
			LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
			LEFT JOIN ins_loginid il ON iir.login_id = il.id
			LEFT JOIN view_insurance_auto_calculation vi ON iir.id = vi.ins_id";

		$where = ["iir.is_delete = 0"];

		if (!empty($search)) {
			$where[] = "(iir.company LIKE '%$search%' 
						OR iir.insured_name LIKE '%$search%' 
						OR iir.policy_number LIKE '%$search%' 
						OR iir.registration_no LIKE '%$search%' 
						OR iir.net_premium LIKE '%$search%' 
						OR iir.gross_premium LIKE '%$search%' 
						OR vi.agent_netpayout LIKE '%$search%' 
						OR DATE_FORMAT(iir.date, '%d/%m/%Y') LIKE '%$search%')";
		}

		// Role-based filtering
		$userdata = $this->session->userdata('userdata');
		$user_role = $userdata['role_id'];
		if ($user_role == 3) { // Agent role - filter by their agency and branch
			$where[] = "iir.agency_id = '" . intval($userdata['agency_id']) . "'";
			$where[] = "ag.branch_id = '" . intval($userdata['branch_id']) . "'";
		} else if (!empty($agency_id)) { // Admin/Manager - use request agency_id
			$where[] = "iir.agency_id = '$agency_id'";
		}

		if (!empty($loginid)) {
			$where[] = "iir.login_id = '$loginid'";
		}

		if (!empty($datepicker)) {
			$dates = explode(' - ', $datepicker);
			if (count($dates) == 2) {
				$start_datetime = DateTime::createFromFormat('d/m/Y', trim($dates[0]))->setTime(0, 0, 0)->format('Y-m-d H:i:s');
				$end_datetime = DateTime::createFromFormat('d/m/Y', trim($dates[1]))->setTime(23, 59, 59)->format('Y-m-d H:i:s');
				$where[] = "iir.created_date BETWEEN '$start_datetime' AND '$end_datetime'";
			}
		}

		if (!empty($where)) {
			$sql .= ' WHERE ' . implode(' AND ', $where);
		}

		$query_filtered = $this->db->query($sql);
		$totalFiltered = $query_filtered->num_rows();

		$sql .= " ORDER BY $order $dir";
		if ($limit != -1) {
			$sql .= " LIMIT $start, $limit";
		}

		$query = $this->db->query($sql);
		$data = [];
		$index = $start + 1;

		foreach ($query->result() as $row) {
			$data[] = [
				$index++,					
				$row->formatted_date,
				$row->insured_name,
				$row->policy_number,
				$row->registration_no,
				$row->company,
				$row->net_premium,
				$row->gross_premium,
				$row->agent_net. " %",
				$row->agent_netpayout,
			];
		}

		$json_data = [
			"draw" => $draw,
			"recordsTotal" => $totalFiltered,
			"recordsFiltered" => $totalFiltered,
			"data" => $data,
		];

		echo json_encode($json_data);
	}

	public function export_payout_pdf() {
		$agency_id   = $this->input->get('agency_id');
		$datepicker  = $this->input->get('datepicker');
		$login_id    = $this->input->get('login_id');
		$export_type = $this->input->get('export_type');

		
		if (empty($agency_id)) {
			show_error('Missing agency_id parameter.');
		}

		
		$agency = $this->db->get_where('ins_agency', ['id' => $agency_id])->row_array();

		
		$date_from = null;
		$date_to = null;

		if (!empty($datepicker)) {
			$dates = explode(' - ', $datepicker);
			if (count($dates) == 2) {
				$date_from = DateTime::createFromFormat('d/m/Y', trim($dates[0]))->format('Y-m-d');
				$date_to   = DateTime::createFromFormat('d/m/Y', trim($dates[1]))->format('Y-m-d');
			}
		}

		
		$this->db->select("
			iir.*,
			ag.email AS agent_email,
			ag.mobile_no AS agent_mobile_no,
			ag.name AS agency_name,
			il.name AS login_name,
			DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date,
			DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
			v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
			v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
			v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
			v.agent_payable, v.amount_from_agent, v.balance, v.net,
			1 AS sort_order,
			iir.date AS sort_date
		");

		$this->db->from('ins_insurance_record iir');
		$this->db->join('ins_agency ag', 'iir.agency_id = ag.id', 'left');
		$this->db->join('ins_loginid il', 'iir.login_id = il.id', 'left');
		$this->db->join('view_insurance_auto_calculation v', 'iir.id = v.ins_id', 'left');

		
		$this->db->where('iir.is_delete', 0);
		$this->db->where('iir.agency_id', $agency_id);

		if (!empty($date_from) && !empty($date_to)) {
			$this->db->where("iir.created_date BETWEEN '{$date_from}' AND '{$date_to}'");
		}

		if (!empty($login_id)) {
			$this->db->where('iir.login_id', $login_id);
		}

		
		if (isset($where_clause) && !empty($where_clause)) {
			$this->db->where($where_clause);
		}

		if (isset($search_condition) && !empty($search_condition)) {
			$this->db->where($search_condition);
		}

		
		$query = $this->db->get();

		
		if (!$query) {
			$error = $this->db->error();
			log_message('error', 'Export Payout Query Failed: ' . print_r($error, true));
			show_error('Database query failed: ' . $error['message']);
		}

		$payout_data = $query->result_array();

		
	
		
		$this->load->library('pdf');
		$pdf = new Pdf();
	
		
		$pdf->AddPage();
		$logo_path = FCPATH . 'public/images/logo-circle.jpg'; 
		$pdf->Image($logo_path, 10, 10, 30); // (x, y, width) - adjust as needed

		// Company Name
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->SetXY(45, 9); // Position next to the logo
		$pdf->Cell(0, 7, 'Myrra Insurance Promoters Private Limited', 0, 1);

		// Address & Contact Info
		$pdf->SetFont('Arial', '', 10);
		$pdf->SetX(45);
		$pdf->MultiCell(0, 5, "171-A, 1st Floor, Salem Road,\nOpp. LPG Transport Owners Association,\nThulasi Pharmacy, Namakkal - 637 001.\nCell: 97896 77760\nEmail: turningpointnkl@gmail.com");
		$pdf->Ln(6);
		$pdf->SetFont('Arial', 'B', 12);
		// $pdf->Cell(0, 10, $agency['name'], 0, 1, 'C');
		$pdf->SetFont('Arial', '', 10);
	
		// Agent Details
		$label_width = 35;  
		$value_width = 65;  
		$gap_width = 5;    
		$line_height = 6;   
	
		$pdf->Cell($label_width, $line_height, 'Agent Name:', 0, 0);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell($value_width + $label_width + $value_width, $line_height, $agency['name'], 0, 1);
		$pdf->SetFont('Arial', '', 10); // Reset to normal font

		$pdf->Cell($label_width, $line_height, 'Address:', 0, 0);
		$pdf->Cell($value_width + $label_width + $value_width, $line_height, $agency['address'], 0, 1);
	
		$pdf->Cell($label_width, $line_height, 'City:', 0, 0);
		$pdf->Cell($value_width, $line_height, $agency['city'], 0, 0);
		$pdf->Cell($gap_width, $line_height, '', 0, 0);
		$pdf->Cell($label_width, $line_height, 'Mobile No:', 0, 0);
		$pdf->Cell($value_width, $line_height, $agency['mobile_no'], 0, 1);	
	
		$pdf->Cell($label_width, $line_height, 'Account Name:', 0, 0);
		$pdf->Cell($value_width, $line_height, $agency['account_name'], 0, 0);
		$pdf->Cell($gap_width, $line_height, '', 0, 0);
		$pdf->Cell($label_width, $line_height, 'Account No:', 0, 0);
		$pdf->Cell($value_width, $line_height, $agency['account_number'], 0, 1);
	
		$pdf->Cell($label_width, $line_height, 'IFSC Code:', 0, 0);
		$pdf->Cell($value_width, $line_height, $agency['ifsc_code'], 0, 0);
		$pdf->Cell($gap_width, $line_height, '', 0, 0);
		$pdf->Cell($label_width, $line_height, 'Branch:', 0, 0);
		$pdf->Cell($value_width, $line_height, $agency['branch'], 0, 1);
	
		$pdf->Cell($label_width, $line_height, 'GPay Name:', 0, 0);
		$pdf->Cell($value_width, $line_height, $agency['gpay_name'], 0, 0);
		$pdf->Cell($gap_width, $line_height, '', 0, 0);
		$pdf->Cell($label_width, $line_height, 'GPay No:', 0, 0);
		$pdf->Cell($value_width, $line_height, $agency['gpay_number'], 0, 1);
	
		// Payout Report Header
		$pdf->Ln(8);
		$pdf->SetFont('Arial', 'B', 12);
		$pdf->Cell(0, 10, 'Payout Report', 0, 1, 'C');

		// Prepare Headers
		$pdf->SetFont('Arial', 'B', 9);
		$headers = ['S.No', 'Iss.Date', 'Ins.Name', 'Pol.No', 'Reg.No', 'Net', 'Gross', 'Payout%', 'Net.Pay'];
		$col_widths = array_fill(0, count($headers), 0);

		// Calculate max width required for each column
		foreach ($headers as $i => $header) {
			$col_widths[$i] = $pdf->GetStringWidth($header) + 6;
		}

		$pdf->SetFont('Arial', '', 9);
		foreach ($payout_data as $index => $row) {
			$data = [
				$index + 1,
				date('d/m/Y', strtotime($row['date'])),
				$row['insured_name'],
				$row['policy_number'],
				$row['registration_no'],
				$row['net_premium'],
				$row['gross_premium'],
				$row['agent_net'] . ' %',
				$row['agent_netpayout']
			];

			foreach ($data as $i => $value) {
				$width = $pdf->GetStringWidth($value) + 6;
				if ($width > $col_widths[$i]) {
					$col_widths[$i] = $width;
				}
			}
		}

		// Max allowable width (A4 portrait minus margins)
		$max_table_width = 200;
		$actual_width = array_sum($col_widths);
		if ($actual_width > $max_table_width) {
			$scale = $max_table_width / $actual_width;
			foreach ($col_widths as &$width) {
				$width *= $scale;
			}
			unset($width);
		}

		// Recalculate left margin to center
		$total_width = array_sum($col_widths);
		$left_margin = (210 - $total_width) / 2;
		$pdf->SetX($left_margin);

		// Save table start position
		$table_start_y = $pdf->GetY();
		$table_start_x = $left_margin;

		// Table Header
		$pdf->SetFont('Arial', 'B', 9);
		foreach ($headers as $i => $header) {
			$pdf->Cell($col_widths[$i], 9, $header, 1, 0, 'C');
		}
		$pdf->Ln();

		// Table Data
		$pdf->SetFont('Arial', '', 9);
		$index = 1;
		$total_agent_netpayout = 0;

		foreach ($payout_data as $row) {
			$pdf->SetX($left_margin);
			$data = [
				$index++,
				date('d/m/Y', strtotime($row['date'])),
				$row['insured_name'],
				$row['policy_number'],
				$row['registration_no'],
				$row['net_premium'],
				$row['gross_premium'],
				$row['agent_net'] . ' %',
				$row['agent_netpayout']
			];

			foreach ($data as $i => $value) {
				$align = ($i === 2 || $i === 3) ? 'L' : 'C'; // left-align Insured Name and Policy No
				$pdf->Cell($col_widths[$i], 9, $value, 1, 0, $align);
			}
			$pdf->Ln();

			$total_agent_netpayout += $row['agent_netpayout'];
		}

		// Total row
		$pdf->SetX($left_margin);
		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Cell(array_sum(array_slice($col_widths, 0, 8)), 9, 'Total', 1, 0, 'R');
		$pdf->Cell($col_widths[8], 9, number_format($total_agent_netpayout, 2), 1, 1, 'C');

		// Draw thick outer border AFTER the table is fully rendered
		$table_end_y = $pdf->GetY();
		$table_height = $table_end_y - $table_start_y;
		$pdf->SetLineWidth(0.5); // Thick line for outer border
		$pdf->Rect($table_start_x, $table_start_y, $total_width, $table_height);
		$pdf->SetLineWidth(0.2); // Reset line width

		if (ob_get_length()) {
			ob_end_clean(); // Clear output buffer
		}

		if ($export_type === 'download') {
			$pdf->Output('D', $agency['name'] . '_Payout_Report_' . date('d-m-Y_h-i-s~A') . '.pdf');
		} elseif ($export_type === 'share') {
			$reports_dir = FCPATH . 'uploads/pdf_reports/';
		
			if (!is_dir($reports_dir)) {
				mkdir($reports_dir, 0755, true); 
			}
		
			$file_name = $agency['name'] . '_Payout_Report_' . date('d-m-Y_h-i-s~A') . '.pdf';
			$encoded_filename = rawurlencode($file_name); 
			$file_path = $reports_dir . $file_name;
			$pdf->Output('F', $file_path);
			$public_url = base_url('uploads/pdf_reports/' . $encoded_filename);
		
			echo json_encode(['file_path' => $public_url]);
		}
		
		exit;
	}	
	
	public function export_payout_excel()
{
    $agency_id   = $this->input->get('agency_id');
    $datepicker  = $this->input->get('datepicker');
    $login_id    = $this->input->get('login_id');
    $export_type = $this->input->get('export_type');

    if (empty($agency_id)) {
        show_error('Missing agency_id parameter.');
    }

    $agency = $this->db->get_where('ins_agency', ['id' => $agency_id])->row_array();

    $date_from = null;
    $date_to = null;

    if (!empty($datepicker)) {
        $dates = explode(' - ', $datepicker);
        if (count($dates) == 2) {
            $date_from = DateTime::createFromFormat('d/m/Y', trim($dates[0]))->format('Y-m-d');
            $date_to   = DateTime::createFromFormat('d/m/Y', trim($dates[1]))->format('Y-m-d');
        }
    }

    $this->db->select("
        iir.*,
        ag.email AS agent_email,
        ag.mobile_no AS agent_mobile_no,
        ag.name AS agency_name,
        il.name AS login_name,
        DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date,
        DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
        v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
        v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
        v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
        v.agent_payable, v.amount_from_agent, v.balance, v.net,
        1 AS sort_order,
        iir.date AS sort_date
    ");

    $this->db->from('ins_insurance_record iir');
    $this->db->join('ins_agency ag', 'iir.agency_id = ag.id', 'left');
    $this->db->join('ins_loginid il', 'iir.login_id = il.id', 'left');
    $this->db->join('view_insurance_auto_calculation v', 'iir.id = v.ins_id', 'left');

    $this->db->where('iir.is_delete', 0);
    $this->db->where('iir.agency_id', $agency_id);

    if (!empty($date_from) && !empty($date_to)) {
        $this->db->where("iir.created_date BETWEEN '{$date_from}' AND '{$date_to}'");
    }

    if (!empty($login_id)) {
        $this->db->where('iir.login_id', $login_id);
    }

    if (isset($where_clause) && !empty($where_clause)) {
        $this->db->where($where_clause);
    }

    if (isset($search_condition) && !empty($search_condition)) {
        $this->db->where($search_condition);
    }

    $query = $this->db->get();

    if (!$query) {
        $error = $this->db->error();
        log_message('error', 'Export Payout Query Failed: ' . print_r($error, true));
        show_error('Database query failed: ' . $error['message']);
    }

    $payout_data = $query->result_array();

	
		// Create a new spreadsheet
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
	
		// Set the sheet title
		$sheet->setTitle('Payout Report');
	
		// Add company logo
		$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
		$drawing->setName('Logo');
		$drawing->setDescription('Company Logo');
		$drawing->setPath(FCPATH . 'public/images/logo-circle.jpg'); // Path to the logo
		$drawing->setHeight(60);
		$drawing->setCoordinates('A1');
		$drawing->setWorksheet($sheet);
	
		// Add company name and address
		$sheet->setCellValue('B1', 'Myrra Insurance Promoters Private Limited');
		$sheet->mergeCells('B1:E1');
		$sheet->getStyle('B1')->getFont()->setBold(true)->setSize(14);
	
		$sheet->setCellValue('B2', "171-A, 1st Floor, Salem Road,\nOpp. LPG Transport Owners Association,\nThulasi Pharmacy, Namakkal - 637 001.\nCell: 97896 77760 \nEmail: turningpointnkl@gmail.com");
		$sheet->mergeCells('B2:E5');
		$sheet->getStyle('B2')->getAlignment()->setWrapText(true);
	
		// Add agency details with full space for name and address, and split columns for other details
		$startRow = 7;

		// Full space for Agent Name
		$sheet->setCellValue('A' . $startRow, 'Agent Name:');
		$sheet->mergeCells('B' . $startRow . ':E' . $startRow); // Merge columns B to E for full space
		$sheet->setCellValue('B' . $startRow, $agency['name']);
		$sheet->getStyle('B' . $startRow)->getFont()->setBold(true); // Make the agency name bold

		// Full space for Address
		$sheet->setCellValue('A' . ($startRow + 1), 'Address:');
		$sheet->mergeCells('B' . ($startRow + 1) . ':E' . ($startRow + 1)); // Merge columns B to E for full space
		$sheet->setCellValue('B' . ($startRow + 1), $agency['address']);

		// Split columns for remaining details
		$sheet->setCellValue('A' . ($startRow + 2), 'City:');
		$sheet->setCellValue('B' . ($startRow + 2), $agency['city']);
		$sheet->setCellValue('D' . ($startRow + 2), 'Mobile No:');
		$sheet->setCellValue('E' . ($startRow + 2), $agency['mobile_no']);

		$sheet->setCellValue('A' . ($startRow + 3), 'Account Name:');
		$sheet->setCellValue('B' . ($startRow + 3), $agency['account_name']);
		$sheet->setCellValue('D' . ($startRow + 3), 'Account No:');
		$sheet->setCellValue('E' . ($startRow + 3), $agency['account_number']);

		$sheet->setCellValue('A' . ($startRow + 4), 'IFSC Code:');
		$sheet->setCellValue('B' . ($startRow + 4), $agency['ifsc_code']);
		$sheet->setCellValue('D' . ($startRow + 4), 'Branch:');
		$sheet->setCellValue('E' . ($startRow + 4), $agency['branch']);

		$sheet->setCellValue('A' . ($startRow + 5), 'GPay Name:');
		$sheet->setCellValue('B' . ($startRow + 5), $agency['gpay_name']);
		$sheet->setCellValue('D' . ($startRow + 5), 'GPay No:');
		$sheet->setCellValue('E' . ($startRow + 5), $agency['gpay_number']);
	
		// Add payout report table header
		$tableStartRow = $startRow + 7;
		$headers = [
			"S.No", "Issue Date", "Insured Name", "Policy Number", "Registration No",
			"Net Premium", "Gross Premium", "Payout %", "Net Payout"
		];
	
		$column = 'A';
		foreach ($headers as $header) {
			$sheet->setCellValue($column . $tableStartRow, $header);
			$sheet->getStyle($column . $tableStartRow)->getFont()->setBold(true);
			$column++;
		}
	
		// Populate payout data
		$rowNumber = $tableStartRow + 1;
		$index = 1;
		foreach ($payout_data as $row) {
			$sheet->setCellValue('A' . $rowNumber, $index++);
			$sheet->setCellValue('B' . $rowNumber, date('d/m/Y', strtotime($row['date'])));
			$sheet->setCellValue('C' . $rowNumber, $row['insured_name']);
			$sheet->setCellValue('D' . $rowNumber, $row['policy_number']);
			$sheet->setCellValue('E' . $rowNumber, $row['registration_no']);
			$sheet->setCellValue('F' . $rowNumber, $row['net_premium']);
			$sheet->setCellValue('G' . $rowNumber, $row['gross_premium']);
			$sheet->setCellValue('H' . $rowNumber, $row['agent_net'] . ' %');
			$sheet->setCellValue('I' . $rowNumber, $row['agent_netpayout']);
			$rowNumber++;
		}

		// Add total row
		$sheet->setCellValue('A' . $rowNumber, 'Total');
		$sheet->mergeCells('A' . $rowNumber . ':H' . $rowNumber); // Merge cells for the "Total" label
		$sheet->getStyle('A' . $rowNumber)->getFont()->setBold(true);
		$sheet->getStyle('A' . $rowNumber)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

		$total_agent_netpayout = array_sum(array_column($payout_data, 'agent_netpayout'));
		$sheet->setCellValue('I' . $rowNumber, number_format($total_agent_netpayout, 2));
		$sheet->getStyle('I' . $rowNumber)->getFont()->setBold(true);
	
		$filename = $agency['name'] . '_Payout_Report_' . date('d-m-Y_h-i-s~A') . '.xlsx';	

		if ($export_type === 'download') {
			if (ob_get_length()) ob_end_clean();

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="' . $filename . '"');
			header('Cache-Control: max-age=0');

			$writer = new Xlsx($spreadsheet);
			$writer->save('php://output');
			exit;
		}else if ($export_type === 'share') {
			$reports_dir = FCPATH . 'uploads/excel_reports/';
			
			if (!is_dir($reports_dir)) {
				mkdir($reports_dir, 0755, true);
			}
			
			$file_path = $reports_dir . $filename;
			
			$encoded_filename = rawurlencode($filename);  
			
			$writer = new Xlsx($spreadsheet);
			$writer->save($file_path);
			
			echo json_encode(['file_path' => base_url('uploads/excel_reports/' . $encoded_filename)]);
		}
		
	}

	public function share_file() {
		$this->db->where('is_delete', 0);
		$this->db->where('status', 'active');
		$email_data = $this->db->get('ins_emailsend')->result_array();
	
		$file_type = $this->input->post('file_type');
		$file_url  = $this->input->post('file_path'); // Full file URL
		$file_name = basename($file_url);
	
		// Decode URL (for spaces and special characters)
		$file_url = urldecode($file_url);
	
		$base_url  = base_url();   // http://localhost/myrra_insurance/
		$base_path = FCPATH;       // C:/xampp/htdocs/myrra_insurance/
	
		if (strpos($file_url, $base_url) === 0) {
			$relative_path = str_replace($base_url, '', $file_url);
			$file_path     = $base_path . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $relative_path);
		} else {
			$file_path = $file_url;
		}
	
		// Additional file existence check
		if (!file_exists($file_path)) {
			echo json_encode([
				'status'     => 0,
				'info'       => 'File not found on server',
				'error'      => $file_path,
				'base_url'   => $base_url,
				'base_path'  => $base_path,
				'raw_input'  => $this->input->post('file_path'),
				'decoded'    => $file_url,
				'final_path' => $file_path
			]);
			return;
		}
	
		require_once(APPPATH . '../vendor/autoload.php');
	
		$success_count = 0;
		$failed_emails = [];
	
		foreach ($email_data as $row) {
			if (!empty($row['email']) && filter_var($row['email'], FILTER_VALIDATE_EMAIL)) {
				$emailid = $row['email'];
		
				$mail = new PHPMailer(true);
				try {
					$mail->isSMTP();
					$mail->Host       = 'smtp.gmail.com';
					$mail->SMTPAuth   = true;
					$mail->Username   = 'bibleotp.noreply@gmail.com';
					$mail->Password   = 'anqs vktc jtqi ubuc'; // consider loading from ENV for security
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
					$mail->Port       = 587;
		
					$mail->setFrom('bibleotp.noreply@gmail.com', 'Myrra Insurance');
					$mail->addAddress($emailid);
		
					$mail->isHTML(true);
					$mail->Subject = ucfirst($file_type) . ' File from Myrra Insurance';
					$mail->Body    = '<p>Please find the attached ' . $file_type . ' file.</p>';
					$mail->addAttachment($file_path, $file_name);
		
					$mail->send();
					$success_count++;
				} catch (Exception $e) {
					log_message('error', 'Email to ' . $emailid . ' failed: ' . $mail->ErrorInfo);
					$failed_emails[] = $emailid;
				}
			} else {
				$failed_emails[] = $row['email'] ?? '(missing email)';
			}
		}
	
		echo json_encode([
			'status' => 1,
			'success' => $success_count,
			'failed' => $failed_emails,
			'info' => ucfirst($file_type) . ' file sent to ' . $success_count . ' email(s)',
			'email_list' => $email_data,
		]);
	}

	// ///////////  AGENT WISE PAYOUT REPORT //////////// //
	public function agentwise_report() {
		$data['title'] = 'Agent wise report';
		
		$data['agencies'] = $this->common_model->get_data_array('ins_agency');
		
		// Get user role from session
		$userdata = $this->session->userdata('userdata');
		$data['user_role'] = $userdata['role_id'];
		
		$data['view'] = 'insurance/agentwise_report';
		$this->load->view('layout',$data);
	}

	// ///////////  CREDIT CARD WISE REPORT //////////// //
	public function creditcard_wise_report() {
		$data['title'] = 'Credit Card Wise Report';
		$data['agencies'] = $this->common_model->get_data_array('ins_agency');
		$data['credit_cards'] = $this->common_model->get_data_array('ins_credit_card');
		
		// Get user role from session
		$userdata = $this->session->userdata('userdata');
		$data['user_role'] = $userdata['role_id'];
		
		$data['view'] = 'insurance/creditcard_wise_report';
		$this->load->view('layout',$data);
	}

	public function agentwise_report_datatable_json() {
		$requestData = $_POST;
		$draw = $requestData['draw'];
		$agency_id = $requestData['agency_id'] ?? '';
		$loginid = $requestData['loginid'] ?? '';
		$datepicker = $requestData['datepicker'] ?? '';
		$search = $requestData['search']['value'] ?? '';

		$columns = [
			0 => 'iir.id',
			1 => 'iir.date',
			2 => 'iir.insured_name',
			3 => 'iir.policy_number',
			4 => 'iir.registration_no',
			5 => 'iir.company',
			6 => 'iir.net_premium',
			7 => 'iir.gross_premium',
			8 => 'iir.agent_net',
			9 => 'iir.agent_netpayout',
		];

		$limit = $requestData['length'];
		$start = $requestData['start'];
		$order_column_index = $requestData['order'][0]['column'];
		$order = $columns[$order_column_index];
		$dir = $requestData['order'][0]['dir'];

		$sql = "SELECT iir.*, 
					DATE_FORMAT(iir.date, '%d/%m/%Y') AS formatted_date,
					vi.agent_netpayout
			FROM ins_insurance_record iir 
			LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
			LEFT JOIN ins_loginid il ON iir.login_id = il.id
			LEFT JOIN view_insurance_auto_calculation vi ON iir.id = vi.ins_id";

		$where = ["iir.is_delete = 0"];

		if (!empty($search)) {
			$where[] = "(iir.company LIKE '%$search%' 
						OR iir.insured_name LIKE '%$search%' 
						OR iir.policy_number LIKE '%$search%' 
						OR iir.registration_no LIKE '%$search%' 
						OR iir.net_premium LIKE '%$search%' 
						OR iir.gross_premium LIKE '%$search%' 
						OR vi.agent_netpayout LIKE '%$search%' 
						OR DATE_FORMAT(iir.date, '%d/%m/%Y') LIKE '%$search%')";
		}

		// Role-based filtering
		$userdata = $this->session->userdata('userdata');
		$user_role = $userdata['role_id'];
		if ($user_role == 3) { // Agent role - filter by their agency and branch
			$where[] = "iir.agency_id = '" . intval($userdata['agency_id']) . "'";
			$where[] = "ag.branch_id = '" . intval($userdata['branch_id']) . "'";
		} else if (!empty($agency_id)) { // Admin/Manager - use request agency_id
			$where[] = "iir.agency_id = '$agency_id'";
		}

		if (!empty($loginid)) {
			$where[] = "iir.login_id = '$loginid'";
		}

		if (!empty($datepicker)) {
			$dates = explode(' - ', $datepicker);
			if (count($dates) == 2) {
				$start_datetime = DateTime::createFromFormat('d/m/Y', trim($dates[0]))->setTime(0, 0, 0)->format('Y-m-d H:i:s');
				$end_datetime = DateTime::createFromFormat('d/m/Y', trim($dates[1]))->setTime(23, 59, 59)->format('Y-m-d H:i:s');
				$where[] = "iir.created_date BETWEEN '$start_datetime' AND '$end_datetime'";
			}
		}

		if (!empty($where)) {
			$sql .= ' WHERE ' . implode(' AND ', $where);
		}

		$query_filtered = $this->db->query($sql);
		$totalFiltered = $query_filtered->num_rows();

		$sql .= " ORDER BY $order $dir";
		if ($limit != -1) {
			$sql .= " LIMIT $start, $limit";
		}

		$query = $this->db->query($sql);
		$data = [];
		$index = $start + 1;

		foreach ($query->result() as $row) {
			$data[] = [
				$index++,					
				$row->formatted_date,
				$row->insured_name,
				$row->policy_number,
				$row->registration_no,
				$row->company,
				$row->net_premium,
				$row->gross_premium,
				$row->agent_net. " %",
				$row->agent_netpayout,
			];
		}

		$json_data = [
			"draw" => $draw,
			"recordsTotal" => $totalFiltered,
			"recordsFiltered" => $totalFiltered,
			"data" => $data,
		];

		echo json_encode($json_data);
	}
	
	public function creditcard_wise_report_datatable_json() {
		$requestData = $_POST;
		$draw = $requestData['draw'] ?? 1;
		$agency_id = $requestData['agency_id'] ?? '';
		$credit_card_id = $requestData['credit_card_id'] ?? '';
		$datepicker = $requestData['datepicker'] ?? '';
		$search = $requestData['search']['value'] ?? '';

		$columns = [
			0 => 'iir.id',
			1 => 'iir.date',
			2 => 'iir.insured_name',
			3 => 'iir.policy_number',
			4 => 'iir.net_premium',
			5 => 'iir.gross_premium',
			6 => 'iir.agent_net',
			7 => 'iir.agent_netpayout',
		];

		$limit = (int)($requestData['length'] ?? 10);
		$start = (int)($requestData['start'] ?? 0);
		$order_column_index = (int)($requestData['order'][0]['column'] ?? 1);
		$order = $columns[$order_column_index] ?? 'iir.id';
		$dir = ($requestData['order'][0]['dir'] ?? 'asc') === 'desc' ? 'DESC' : 'ASC';

		$sql = "SELECT iir.*, 
					DATE_FORMAT(iir.date, '%d/%m/%Y') AS formatted_date,
					vi.agent_netpayout,
					icc.bank,
					icc.name_on_card,
					icc.last4
			FROM ins_insurance_record iir 
			LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
			LEFT JOIN ins_credit_card icc ON iir.credit_card_id = icc.id
			LEFT JOIN view_insurance_auto_calculation vi ON iir.id = vi.ins_id";

		$where = ["iir.is_delete = 0"];

		if (!empty($search)) {
			$where[] = "(iir.insured_name LIKE '%$search%'  
						OR iir.policy_number LIKE '%$search%' 
						OR iir.net_premium LIKE '%$search%' 
						OR iir.gross_premium LIKE '%$search%' 
						OR vi.agent_netpayout LIKE '%$search%' 
						OR icc.bank LIKE '%$search%'
						OR icc.name_on_card LIKE '%$search%'
						OR icc.last4 LIKE '%$search%'
						OR DATE_FORMAT(iir.date, '%d/%m/%Y') LIKE '%$search%')";
		}

		// Role-based filtering
		$userdata = $this->session->userdata('userdata');
		$user_role = $userdata['role_id'];
		if ($user_role == 3) { // Agent role - filter by their agency and branch
			$where[] = "iir.agency_id = '" . intval($userdata['agency_id']) . "'";
			$where[] = "ag.branch_id = '" . intval($userdata['branch_id']) . "'";
		} else if (!empty($agency_id)) { // Admin/Manager - use request agency_id
			$where[] = "iir.agency_id = '$agency_id'";
		}

		if (!empty($credit_card_id)) {
			$where[] = "iir.credit_card_id = '$credit_card_id'";
		}

		if (!empty($datepicker)) {
			$dates = explode(' - ', $datepicker);
			if (count($dates) == 2) {
				$start_datetime = DateTime::createFromFormat('d/m/Y', trim($dates[0]))->setTime(0, 0, 0)->format('Y-m-d H:i:s');
				$end_datetime = DateTime::createFromFormat('d/m/Y', trim($dates[1]))->setTime(23, 59, 59)->format('Y-m-d H:i:s');
				$where[] = "iir.created_date BETWEEN '$start_datetime' AND '$end_datetime'";
			}
		}

		if (!empty($where)) {
			$sql .= ' WHERE ' . implode(' AND ', $where);
		}

		$query_filtered = $this->db->query($sql);
		$totalFiltered = $query_filtered->num_rows();

		$sql .= " ORDER BY $order $dir";
		if ($limit != -1) {
			$sql .= " LIMIT $start, $limit";
		}

		$query = $this->db->query($sql);
		$data = [];
		$index = $start + 1;

		foreach ($query->result() as $row) {
			$data[] = [
				$index++,
				$row->formatted_date,
				$row->insured_name." / ".$row->policy_number,
				(empty($row->bank) && empty($row->name_on_card) && empty($row->last4))
					? '-'
					: trim(
						($row->bank ? $row->bank : '') .
						(($row->bank && $row->name_on_card) ? ' - ' : '') .
						($row->name_on_card ? $row->name_on_card : '') .
						(
							($row->last4)
								? ' (' . $row->last4 . ')'
								: ''
						)
					),
				$row->net_premium,
				$row->gross_premium,
				$row->agent_net . " %",
				$row->agent_netpayout,
			];
		}

		$json_data = [
			"draw" => $draw,
			"recordsTotal" => $totalFiltered,
			"recordsFiltered" => $totalFiltered,
			"data" => $data,
		];

		echo json_encode($json_data);
	}

	public function export_creditcard_wise_excel() {
		$agency_id = $this->input->get('agency_id');
		$credit_card_id = $this->input->get('credit_card_id');
		$datepicker = $this->input->get('datepicker');
		$export_type = $this->input->get('export_type');

		// Fetch credit card wise report data
		$this->db->select('iir.insured_name, iir.policy_number, iir.registration_no, iir.date, iir.net_premium, iir.gross_premium, iir.agent_net, iir.agent_netpayout, icc.bank, icc.name_on_card, icc.last4');
		$this->db->from('ins_insurance_record iir');
		$this->db->join('ins_credit_card icc', 'iir.credit_card_id = icc.id', 'left');
		$this->db->where('iir.is_delete', 0);

		if (!empty($agency_id)) {
			$this->db->where('iir.agency_id', $agency_id);
		}

		if (!empty($credit_card_id)) {
			$this->db->where('iir.credit_card_id', $credit_card_id);
		}

		if (!empty($datepicker)) {
			$dates = explode(' - ', $datepicker);
			if (count($dates) == 2) {
				$start_date = DateTime::createFromFormat('d/m/Y', trim($dates[0]))->format('Y-m-d');
				$end_date = DateTime::createFromFormat('d/m/Y', trim($dates[1]))->format('Y-m-d');
				$this->db->where("iir.date BETWEEN '$start_date' AND '$end_date'");
			}
		}

		$creditcard_data = $this->db->get()->result_array();

		// Create a new spreadsheet
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		// Set the sheet title
		$sheet->setTitle('Credit Card Wise Report');

		// Add company logo
		$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
		$drawing->setName('Logo');
		$drawing->setDescription('Company Logo');
		$drawing->setPath(FCPATH . 'public/images/logo-circle.png');
		$drawing->setHeight(60);
		$drawing->setCoordinates('A1');
		$drawing->setWorksheet($sheet);

		// Add company name and address
		$sheet->setCellValue('B1', 'Myrra Insurance Promoters Private Limited');
		$sheet->mergeCells('B1:E1');
		$sheet->getStyle('B1')->getFont()->setBold(true)->setSize(14);

		$sheet->setCellValue('B2', "171-A, 1st Floor, Salem Road,\nOpp. LPG Transport Owners Association,\nThulasi Pharmacy, Namakkal - 637 001.\nCell: 97896 77760 \nEmail: turningpointnkl@gmail.com");
		$sheet->mergeCells('B2:E5');
		$sheet->getStyle('B2')->getAlignment()->setWrapText(true);

		// Add report title
		$sheet->setCellValue('A7', 'Credit Card Wise Report');
		$sheet->mergeCells('A7:J7');
		$sheet->getStyle('A7')->getFont()->setBold(true)->setSize(16);
		$sheet->getStyle('A7')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

		// Add table headers
		$tableStartRow = 9;
		$headers = [
			"S.No", "Issue Date", "Insured Name", "Policy Number", "Payment Details",
			"Net Premium", "Gross Premium", "Payout %", "Net Payout"
		];

		$column = 'A';
		foreach ($headers as $header) {
			$sheet->setCellValue($column . $tableStartRow, $header);
			$sheet->getStyle($column . $tableStartRow)->getFont()->setBold(true);
			$column++;
		}

		// Populate data
		$rowNumber = $tableStartRow + 1;
		$index = 1;
		foreach ($creditcard_data as $row) {
			$sheet->setCellValue('A' . $rowNumber, $index++);
			$sheet->setCellValue('B' . $rowNumber, date('d/m/Y', strtotime($row['date'])));
			$sheet->setCellValue('C' . $rowNumber, $row['insured_name']);
			$sheet->setCellValue('D' . $rowNumber, $row['policy_number']);
			$sheet->setCellValue('E' . $rowNumber, $row['bank'] . ' - ' . $row['name_on_card'] . ' (' . $row['last4'] . ')');
			$sheet->setCellValue('F' . $rowNumber, $row['net_premium']);
			$sheet->setCellValue('G' . $rowNumber, $row['gross_premium']);
			$sheet->setCellValue('H' . $rowNumber, $row['agent_net'] . ' %');
			$sheet->setCellValue('I' . $rowNumber, $row['agent_netpayout']);
			$rowNumber++;
		}

		// Add total row
		$sheet->setCellValue('A' . $rowNumber, 'Total');
		$sheet->mergeCells('A' . $rowNumber . ':H' . $rowNumber);
		$sheet->getStyle('A' . $rowNumber)->getFont()->setBold(true);
		$sheet->getStyle('A' . $rowNumber)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

		$total_agent_netpayout = array_sum(array_column($creditcard_data, 'agent_netpayout'));
		$sheet->setCellValue('I' . $rowNumber, number_format($total_agent_netpayout, 2));
		$sheet->getStyle('I' . $rowNumber)->getFont()->setBold(true);

		$filename = 'Credit_Card_Wise_Report_' . date('d-m-Y_h-i-s~A') . '.xlsx';

		if ($export_type === 'download') {
			if (ob_get_length()) ob_end_clean();

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="' . $filename . '"');
			header('Cache-Control: max-age=0');

			$writer = new Xlsx($spreadsheet);
			$writer->save('php://output');
			exit;
		} else if ($export_type === 'share') {
			$reports_dir = FCPATH . 'uploads/excel_reports/';

			if (!is_dir($reports_dir)) {
				mkdir($reports_dir, 0755, true);
			}

			$file_path = $reports_dir . $filename;
			$encoded_filename = rawurlencode($filename);

			$writer = new Xlsx($spreadsheet);
			$writer->save($file_path);

			echo json_encode(['file_path' => base_url('uploads/excel_reports/' . $encoded_filename)]);
		}
	}
	
	
	
}
?>