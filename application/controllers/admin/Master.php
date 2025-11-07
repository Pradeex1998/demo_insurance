<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Master extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('insurance/master_model', 'master_model');
			$this->load->model('common_model');
		}

		//  ============ end =========

		public function branch_list(){
			$data['title'] = 'Branch List';
			$data['view'] = 'insurance/branch_list';
			$this->load->view('layout',$data);
		}

		

		public function get_branch_byid($id) {
			$branch = $this->master_model->get_branch($id);
			if ($branch && count($branch) > 0) {
				$response = array(
					'status' => '1',
					'data' => $branch
				);
			} else {
				$response = array(
					'status' => '0',
					'data' => []
				);
			}
			echo json_encode($response);
		}	

		

		public function submit_branch() {

			$postdata = array();
			$column_names = $this->common_model->get_column_names('ins_branch');
			$column_names = array_diff($column_names, ['id']);
			
			foreach ($_POST as $key => $val) {
				if (in_array($key, $column_names) || $key === 'id') {
					$postdata[$key] = $this->input->post($key);
				}
			}
			

			$recordid = $this->master_model->save_branch($postdata);
			
			$response = array();
			if ($recordid) {
				$response['status'] = '1';
				$response['message'] = 'Branch addition/update successful.';
			} else {
				$response['status'] = '0';
				$response['message'] = 'Branch addition/update failed.';
			}
			
			$this->session->set_userdata('message', $response['message']);
			echo json_encode($response);
		}

		

		public function branch_datatable_json() {
			$requestData = $_POST;
			$draw = $requestData['draw'];
		
			$columns = array(
				0 => 'ib.updated_date',
				1 => 'ib.branch_name',
				2 => 'ib.status',
				3 => 'cu.name',
				4 => 'ib.updated_date',
			);
		
			$limit = $requestData['length'];
			$start = $requestData['start'];
			$order_column_index = $requestData['order'][0]['column'];
			$order = $columns[$order_column_index];
			$dir = $requestData['order'][0]['dir'];
			$search = $requestData['search']['value'];

			$sql = "SELECT ib.*, 
						   DATE_FORMAT(ib.updated_date, '%d/%m/%Y %h:%i') AS formated_updated_date, 
						   cu.name AS updated_by_name 
					FROM ins_branch ib
					LEFT JOIN ci_users cu ON ib.updated_by = cu.id
					WHERE ib.is_delete = 0";

			if (!empty($search)) {
				$sql .= " AND (ib.branch_name LIKE '%$search%' 
							OR ib.status LIKE '%$search%' 
							OR cu.name LIKE '%$search%' 
							OR DATE_FORMAT(ib.updated_date, '%d/%m/%Y %h:%i') LIKE '%$search%')";
			}
		
			$totalFiltered = $this->db->query($sql)->num_rows();
		
			$sql .= " ORDER BY $order $dir";
			if ($limit != -1) {
				$sql .= " LIMIT $start, $limit";
			}
			$query = $this->db->query($sql);
			$data = [];
			$index = $start + 1;


			foreach ($query->result() as $row) {
				$status = '<span style="color:' . ($row->status === 'active' ? '#228B22' : ($row->status === 'inactive' ? 'orange' : 'red')) . '; font-weight:bold;">' . ucfirst($row->status) . '</span>';
		
				$data[] = [
					$index++,
					$row->branch_name,
					$status,
					$row->updated_by_name . " " . $row->formated_updated_date, 
					// <button class="btn btn-danger btn-sm deleteBtn" data-id="'.$row->id.'"><i class="material-icons">delete</i></button>
					'
					<button class="btn btn-primary btn-sm editBtn" data-id="'.$row->id.'"><i class="material-icons">edit</i></button>'
				];
			}
		
			echo json_encode([
				"draw" => $draw,
				"recordsTotal" => $this->db->where('is_delete', 0)->count_all_results('ins_branch'),
				"recordsFiltered" => $totalFiltered,
				"data" => $data
			]);
		}

		public function delete_branch() {
			$id = $this->input->post('id');
			$this->db->update('ins_branch', ['is_delete' => 1], ['id' => $id]);
			echo 'deleted';
		}

		// RTO: start

		public function rto_list(){
			$data['title'] = 'RTO List';
			$data['view'] = 'insurance/rto_list';
			$this->load->view('layout',$data);
		}

		public function get_rto_byid($id) {
			$rto = $this->master_model->get_rto($id);
			if ($rto && count($rto) > 0) {
				$response = array(
					'status' => '1',
					'data' => $rto
				);
			} else {
				$response = array(
					'status' => '0',
					'data' => []
				);
			}
			echo json_encode($response);
		}

		public function submit_rto() {
			$postdata = array();
			$column_names = $this->common_model->get_column_names('ins_rto');
			$column_names = array_diff($column_names, ['id']);

			foreach ($_POST as $key => $val) {
				if (in_array($key, $column_names) || $key === 'id') {
					$postdata[$key] = $this->input->post($key);
				}
			}

			$recordid = $this->master_model->save_rto($postdata);

			$response = array();
			if ($recordid) {
				$response['status'] = '1';
				$response['message'] = 'RTO addition/update successful.';
			} else {
				$response['status'] = '0';
				$response['message'] = 'RTO addition/update failed.';
			}

			$this->session->set_userdata('message', $response['message']);
			echo json_encode($response);
		}

		public function rto_datatable_json() {
			$requestData = $_POST;
			$draw = $requestData['draw'];

			$columns = array(
				0 => 'ir.created_at',
				1 => 'ir.loc_name',
				2 => 'ir.rto_code',
				3 => 'cu.name',
				4 => 'ir.created_at',
				5 => 'ir.status'
			);

			$limit = $requestData['length'];
			$start = $requestData['start'];
			$order_column_index = $requestData['order'][0]['column'];
			$order = $columns[$order_column_index];
			$dir = $requestData['order'][0]['dir'];
			$search = $requestData['search']['value'];

			$sql = "SELECT ir.*, 
					DATE_FORMAT(ir.created_at, '%d/%m/%Y %h:%i') AS formated_created_at, 
					cu.name AS created_by_name,
					ist.name AS state_name,
					idc.name AS district_name
				FROM ins_rto ir
				LEFT JOIN ci_users cu ON ir.created_by = cu.id
				LEFT JOIN ins_state ist ON ir.state_id = ist.id
				LEFT JOIN ins_district idc ON ir.district_id = idc.id
				WHERE 1 = 1";

			if (!empty($search)) {
				$sql .= " AND (ir.loc_name LIKE '%$search%' 
						OR ir.rto_code LIKE '%$search%' 
						OR ist.name LIKE '%$search%'
						OR idc.name LIKE '%$search%'
						OR cu.name LIKE '%$search%' 
						OR ir.status LIKE '%$search%' 
						OR DATE_FORMAT(ir.created_at, '%d/%m/%Y %h:%i') LIKE '%$search%')";
			}

			$totalFiltered = $this->db->query($sql)->num_rows();

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
					$row->loc_name,
					$row->rto_code,
					$row->created_by_name,
					$row->formated_created_at,
					'<span style="color:' . ($row->status === 'active' ? '#228B22' : ($row->status === 'inactive' ? 'orange' : 'red')) . '; font-weight:bold;">' . ucfirst($row->status) . '</span>',
					'<button class="btn btn-primary btn-sm editBtn" data-id="'.$row->id.'"><i class="material-icons">edit</i></button>'
				];
			}

			echo json_encode([
				"draw" => $draw,
				"recordsTotal" => $this->db->count_all_results('ins_rto'),
				"recordsFiltered" => $totalFiltered,
				"data" => $data
			]);
		}


		// Email Settings: start
		public function emailtosend_report_list(){
			$data['title'] = 'Email to send Report List';
			$data['view'] = 'insurance/emailsend_report_list';
			$this->load->view('layout',$data);
		}

		// Insurance Company: start

		public function insurance_company_list(){
			$data['title'] = 'Insurance Company List';
			$data['view'] = 'insurance/insurance_company_list';
			$this->load->view('layout',$data);
		}

		public function get_company_byid($id) {
			$company = $this->master_model->get_company($id);
			if ($company && count($company) > 0) {
				$response = array(
					'status' => '1',
					'data' => $company
				);
			} else {
				$response = array(
					'status' => '0',
					'data' => []
				);
			}
			echo json_encode($response);
		}

		public function submit_company() {
			$postdata = array();
			$column_names = $this->common_model->get_column_names('ins_insurance_company');
			$column_names = array_diff($column_names, ['id']);

			foreach ($_POST as $key => $val) {
				if (in_array($key, $column_names) || $key === 'id') {
					$postdata[$key] = $this->input->post($key);
				}
			}

			$recordid = $this->master_model->save_company($postdata);

			$response = array();
			if ($recordid) {
				$response['status'] = '1';
				$response['message'] = 'Company addition/update successful.';
			} else {
				$response['status'] = '0';
				$response['message'] = 'Company addition/update failed.';
			}

			$this->session->set_userdata('message', $response['message']);
			echo json_encode($response);
		}

		public function insurance_company_datatable_json() {
			$requestData = $_POST;
			$draw = $requestData['draw'];

			$columns = array(
				0 => 'ic.id',
				1 => 'ic.name',
				2 => 'ic.status',
				3 => 'cu1.name',
				4 => 'cu2.name',
				5 => 'ic.created_at',
				6 => 'ic.updated_at',
			);

			$limit = $requestData['length'];
			$start = $requestData['start'];
			$order_column_index = $requestData['order'][0]['column'];
			$order = $columns[$order_column_index];
			$dir = $requestData['order'][0]['dir'];
			$search = $requestData['search']['value'];

			$sql = "SELECT ic.*, 
						DATE_FORMAT(ic.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
						DATE_FORMAT(ic.updated_at, '%d/%m/%Y %h:%i') AS formated_updated_at,
						cu1.name AS created_by_name,
						cu2.name AS updated_by_name
				FROM ins_insurance_company ic
				LEFT JOIN ci_users cu1 ON ic.created_by = cu1.id
				LEFT JOIN ci_users cu2 ON ic.updated_by = cu2.id
				WHERE 1 = 1";

			if (!empty($search)) {
				$sql .= " AND (ic.id LIKE '%$search%' 
						OR ic.name LIKE '%$search%' 
						OR ic.status LIKE '%$search%'
						OR cu1.name LIKE '%$search%'
						OR cu2.name LIKE '%$search%'
						OR DATE_FORMAT(ic.created_at, '%d/%m/%Y %h:%i') LIKE '%$search%'
						OR DATE_FORMAT(ic.updated_at, '%d/%m/%Y %h:%i') LIKE '%$search%')";
			}

			$totalFiltered = $this->db->query($sql)->num_rows();

			$sql .= " ORDER BY $order $dir";
			if ($limit != -1) {
				$sql .= " LIMIT $start, $limit";
			}
			$query = $this->db->query($sql);
			$data = [];
			$index = $start + 1;

			foreach ($query->result() as $row) {
				$statusHtml = '<span style="color:' . ($row->status === 'active' ? '#228B22' : ($row->status === 'inactive' ? 'orange' : 'red')) . '; font-weight:bold;">' . ucfirst($row->status) . '</span>';
				$data[] = [
					$index++,
					$row->name,
					$statusHtml,
					$row->created_by_name,
					$row->updated_by_name,
					$row->formated_created_at,
					$row->formated_updated_at,
					'<button class="btn btn-primary btn-sm editBtn" data-id="'.$row->id.'"><i class="material-icons">edit</i></button>'
				];
			}

			echo json_encode([
				"draw" => $draw,
				"recordsTotal" => $this->db->count_all_results('ins_insurance_company'),
				"recordsFiltered" => $totalFiltered,
				"data" => $data
			]);
		}

		// Insurance Company: end

		// RTO Company: start

		public function rto_company_list(){
			$data['title'] = 'RTO Company List';
			$rto_list = $this->master_model->active_rto_list();
			$insurance_company_list = $this->common_model->get_data_array('ins_insurance_company');
			// pass active states for dependent selects
			$state_list = $this->master_model->active_state_list();
			$data['rto_list'] = $rto_list;
			$data['insurance_company_list'] = $insurance_company_list;
			$data['states'] = $state_list;
			$data['view'] = 'insurance/rto_company_list';
			$this->load->view('layout',$data);
		}

		public function rto_company_datatable_json() {
			$requestData = $_POST;
			$draw = $requestData['draw'];

            $columns = array(
                0 => 'irc.id',
                1 => 'irc.name',
                2 => 'company_name',
                3 => 'irc.status',
                4 => 'cu1.name',
                5 => 'cu2.name',
                6 => 'irc.created_at',
                7 => 'irc.updated_at',
            );

			$limit = $requestData['length'];
			$start = $requestData['start'];
			$order_column_index = $requestData['order'][0]['column'];
			$order = $columns[$order_column_index];
			$dir = $requestData['order'][0]['dir'];
			$search = $requestData['search']['value'];

            $sql = "SELECT irc.*, 
					DATE_FORMAT(irc.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					DATE_FORMAT(irc.updated_at, '%d/%m/%Y %h:%i') AS formated_updated_at,
                        irc.name AS login_name,
					ic.name AS company_name,
					cu1.name AS created_by_name,
					cu2.name AS updated_by_name
				FROM ins_rto_company irc
				LEFT JOIN ins_insurance_company ic ON irc.inscompany_id = ic.id
				LEFT JOIN ci_users cu1 ON irc.created_by = cu1.id
				LEFT JOIN ci_users cu2 ON irc.updated_by = cu2.id
				WHERE 1 = 1";

            if (!empty($search)) {
                $sql .= " AND (irc.id LIKE '%$search%' 
                        OR irc.name LIKE '%$search%'
						OR ic.name LIKE '%$search%'
						OR irc.status LIKE '%$search%'
						OR cu1.name LIKE '%$search%'
						OR cu2.name LIKE '%$search%'
						OR DATE_FORMAT(irc.created_at, '%d/%m/%Y %h:%i') LIKE '%$search%'
						OR DATE_FORMAT(irc.updated_at, '%d/%m/%Y %h:%i') LIKE '%$search%')";
			}

			$totalFiltered = $this->db->query($sql)->num_rows();

			$sql .= " ORDER BY $order $dir";
			if ($limit != -1) {
				$sql .= " LIMIT $start, $limit";
			}
			$query = $this->db->query($sql);
			$data = [];
			$index = $start + 1;

			foreach ($query->result() as $row) {
				$statusHtml = '<span style="color:' . ($row->status === 'active' ? '#228B22' : ($row->status === 'inactive' ? 'orange' : 'red')) . '; font-weight:bold;">' . ucfirst($row->status) . '</span>';
				$data[] = [
					$index++,
					$row->name,
					$row->company_name,
					$statusHtml,
					$row->created_by_name,
					$row->updated_by_name,
					$row->formated_created_at,
					$row->formated_updated_at,
					'<button class="btn btn-primary btn-sm editBtn" data-id="'.$row->id.'"><i class="material-icons">edit</i></button>'
				];
			}

			echo json_encode([
				"draw" => $draw,
				"recordsTotal" => $this->db->count_all_results('ins_rto_company'),
				"recordsFiltered" => $totalFiltered,
				"data" => $data
			]);
		}

		public function get_rto_company_byid($id) {
			$data = $this->master_model->get_rto_company($id);
			if ($data && count($data) > 0) {
				echo json_encode(['status' => '1', 'data' => $data]);
			} else {
				echo json_encode(['status' => '0', 'data' => []]);
			}
		}

		public function submit_rto_company() {
			$postdata = array();
			$column_names = $this->common_model->get_column_names('ins_rto_company');
			$column_names = array_diff($column_names, ['id']);

			foreach ($_POST as $key => $val) {
				if (in_array($key, $column_names) || $key === 'id') {
					$postdata[$key] = $this->input->post($key);
				}
			}

			// Basic validation: name and insurance company mandatory
			if (empty($postdata['name']) || empty($postdata['inscompany_id'])) {
				echo json_encode(['status' => '0', 'message' => 'Name and Insurance Company are required.']);
				return;
			}

			$recordid = $this->master_model->save_rto_company($postdata);

			$response = array();
			if ($recordid) {
				$response['status'] = '1';
				$response['message'] = 'RTO Company mapping saved.';
			} else {
				$response['status'] = '0';
				$response['message'] = 'Save failed.';
			}

			$this->session->set_userdata('message', $response['message']);
			echo json_encode($response);
		}

		// RTO Company: end

		// Dependent data endpoints for State -> District -> RTO
		public function active_states() {
			// returns active states for forms
			$list = $this->db->select('id, name')
				->from('ins_state')
				->where('status', 'active')
				->order_by('name', 'asc')
				->get()->result_array();
			echo json_encode(['status' => '1', 'data' => $list]);
		}

		public function districts_by_state($stateId) {
			$stateId = (int)$stateId;
			$list = $this->db->select('id, name')
				->from('ins_district')
				->where('status', 'active')
				->where('state_id', $stateId)
				->order_by('name', 'asc')
				->get()->result_array();
			echo json_encode(['status' => '1', 'data' => $list]);
		}

		public function rtos_by_location() {
			$stateId = $this->input->post('state_id');
			$districtId = $this->input->post('district_id');

			$this->db->select('ir.id, ir.rto_code, ir.loc_name, ir.state_id, ir.district_id, ist.name AS state_name, idc.name AS district_name')
				->from('ins_rto ir')
				->join('ins_state ist', 'ir.state_id = ist.id', 'left')
				->join('ins_district idc', 'ir.district_id = idc.id', 'left')
				->order_by('ir.rto_code', 'asc');

			if (!empty($stateId)) {
				$this->db->where('ir.state_id', (int)$stateId);
			}
			if (!empty($districtId)) {
				$this->db->where('ir.district_id', (int)$districtId);
			}

			$list = $this->db->get()->result_array();
			echo json_encode(['status' => '1', 'data' => $list]);
		}

		public function rto_meta($id) {
			$id = (int)$id;
			$row = $this->db->select('id, state_id, district_id')
				->from('ins_rto')
				->where('id', $id)
				->get()->row_array();
			if ($row) {
				echo json_encode(['status' => '1', 'data' => $row]);
			} else {
				echo json_encode(['status' => '0', 'data' => []]);
			}
		}
		
		public function emailtosend_datatable_json() {
			$requestData = $_POST;
			$draw = $requestData['draw'];
		
			$columns = array(
				0 => 'ie.updated_date',
				1 => 'ie.email',
				2 => 'ie.status',
				3 => 'cu.name', 
				4 => 'ie.updated_date',
			);
		
			$limit = $requestData['length'];
			$start = $requestData['start'];
			$order_column_index = $requestData['order'][0]['column'];
			$order = $columns[$order_column_index];
			$dir = $requestData['order'][0]['dir'];
			$search = $requestData['search']['value'];
		
			$sql = "SELECT ie.*, 
						   DATE_FORMAT(ie.updated_date, '%d/%m/%Y %h:%i') AS formated_updated_date, 
						   cu.name AS updated_by_name 
					FROM ins_emailsend ie
					LEFT JOIN ci_users cu ON ie.updated_by = cu.id
					WHERE ie.is_delete = 0";
		
			if (!empty($search)) {
				$sql .= " AND (ie.email LIKE '%$search%' 
							OR ie.status LIKE '%$search%' 
							OR cu.name LIKE '%$search%' 
							OR DATE_FORMAT(ie.updated_date, '%d/%m/%Y %h:%i') LIKE '%$search%')";
			}
		
			$totalFiltered = $this->db->query($sql)->num_rows();
		
			$sql .= " ORDER BY $order $dir";
			if ($limit != -1) {
				$sql .= " LIMIT $start, $limit";
			}
			$query = $this->db->query($sql);
			$data = [];
			$index = $start + 1;

			
		
			foreach ($query->result() as $row) {
				$status = '<span style="color:' . ($row->status === 'active' ? '#228B22' : ($row->status === 'inactive' ? 'orange' : 'red')) . '; font-weight:bold;">' . ucfirst($row->status) . '</span>';
		
				$data[] = [
					$index++,
					$row->email,
					$status,
					$row->updated_by_name . " " . $row->formated_updated_date, 
					'<button class="btn btn-danger btn-sm deleteBtn" data-id="'.$row->id.'"><i class="material-icons">delete</i></button>'
				];
			}
		
			echo json_encode([
				"draw" => $draw,
				"recordsTotal" => $this->db->where('is_delete', 0)->count_all_results('ins_emailsend'),
				"recordsFiltered" => $totalFiltered,
				"data" => $data
			]);
		}
		

		public function save_email() {
			$data = [
				'email' => $this->input->post('email'),
				'status' => $this->input->post('status'),
				'created_by' => $this->session->userdata('admin_id'),
				'updated_by' => $this->session->userdata('admin_id'),
			];
			$this->db->insert('ins_emailsend', $data);
			echo 'success';
		}
		
		public function delete_email() {
			$id = $this->input->post('id');
			$this->db->update('ins_emailsend', ['is_delete' => 1], ['id' => $id]);
			echo 'deleted';
		}

		// Credit Card: start

		public function credit_card_list(){
			$data['title'] = 'Credit Card List';
			$data['view'] = 'insurance/credit_card_list';
			$this->load->view('layout',$data);
		}

		public function get_credit_card_byid($id) {
			$card = $this->master_model->get_credit_card($id);
			if ($card && count($card) > 0) {
				echo json_encode(['status' => '1', 'data' => $card]);
			} else {
				echo json_encode(['status' => '0', 'data' => []]);
			}
		}

		public function submit_credit_card() {
			$postdata = array();
			$column_names = $this->common_model->get_column_names('ins_credit_card');
			$column_names = array_diff($column_names, ['id']);

			foreach ($_POST as $key => $val) {
				if (in_array($key, $column_names) || $key === 'id') {
					$postdata[$key] = $this->input->post($key);
				}
			}

			// minimal validation
			if (empty($postdata['bank']) || empty($postdata['name_on_card'])) {
				echo json_encode(['status' => '0', 'message' => 'Bank, Name on Card are required.']);
				return;
			}

			$recordid = $this->master_model->save_credit_card($postdata);

			$response = array();
			if ($recordid) {
				$response['status'] = '1';
				$response['message'] = 'Credit Card saved.';
			} else {
				$response['status'] = '0';
				$response['message'] = 'Save failed.';
			}

			$this->session->set_userdata('message', $response['message']);
			echo json_encode($response);
		}

		public function credit_card_datatable_json() {
			$requestData = $_POST;
			$draw = $requestData['draw'];

			$columns = array(
				0 => 'icc.updated_at',
				1 => 'icc.name',
				2 => 'icc.bank',
				3 => 'icc.name_on_card',
				4 => 'icc.last4',
				5 => 'icc.status',
				6 => 'cu1.name',
				7 => 'cu2.name',
				8 => 'icc.created_at',
				9 => 'icc.updated_at',
				10 => 'icc.ID',
			);

			$limit = $requestData['length'];
			$start = $requestData['start'];
			$order_column_index = $requestData['order'][0]['column'];
			$order = $columns[$order_column_index];
			$dir = $requestData['order'][0]['dir'];
			$search = $requestData['search']['value'];

			$sql = "SELECT icc.*, 
					DATE_FORMAT(icc.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					DATE_FORMAT(icc.updated_at, '%d/%m/%Y %h:%i') AS formated_updated_at,
					cu1.name AS created_by_name,
					cu2.name AS updated_by_name
				FROM ins_credit_card icc
				LEFT JOIN ci_users cu1 ON icc.created_by = cu1.id
				LEFT JOIN ci_users cu2 ON icc.updated_by = cu2.id
				WHERE 1 = 1";

			if (!empty($search)) {
				$sql .= " AND (icc.bank LIKE '%$search%' 
					OR icc.name LIKE '%$search%'
					OR icc.name_on_card LIKE '%$search%'
					OR icc.last4 LIKE '%$search%'
					OR icc.status LIKE '%$search%'
					OR cu1.name LIKE '%$search%'
					OR cu2.name LIKE '%$search%'
					OR DATE_FORMAT(icc.created_at, '%d/%m/%Y %h:%i') LIKE '%$search%'
					OR DATE_FORMAT(icc.updated_at, '%d/%m/%Y %h:%i') LIKE '%$search%')";
			}

			$totalFiltered = $this->db->query($sql)->num_rows();

			$sql .= " ORDER BY $order $dir";
			if ($limit != -1) {
				$sql .= " LIMIT $start, $limit";
			}
			$query = $this->db->query($sql);
			$data = [];
			$index = $start + 1;

			foreach ($query->result() as $row) {
				$statusHtml = '<span style="color:' . ($row->status === 'active' ? '#228B22' : ($row->status === 'inactive' ? 'orange' : 'red')) . '; font-weight:bold;">' . ucfirst($row->status) . '</span>';
				$data[] = [
					$index++,
					$row->name,
					$row->bank,
					$row->name_on_card,
					$row->last4,
					$statusHtml,
					$row->created_by_name,
					$row->updated_by_name,
					$row->formated_created_at,
					$row->formated_updated_at,
					'<button class="btn btn-primary btn-sm editBtn" data-id="'.$row->id.'"><i class="material-icons">edit</i></button>'
				];
			}

			echo json_encode([
				"draw" => $draw,
				"recordsTotal" => $this->db->count_all_results('ins_credit_card'),
				"recordsFiltered" => $totalFiltered,
				"data" => $data
			]);
		}

		// Credit Card: end

		// Common: active credit card list (for forms)
		public function active_credit_cards() {
			$list = $this->master_model->active_credit_card_list();
			echo json_encode(['status' => '1', 'data' => $list]);
		}

		// =====================
		// State Master: start
		public function state_list(){
			$data['title'] = 'State List';
			$data['view'] = 'insurance/rto_state_list';
			$this->load->view('layout',$data);
		}

		public function get_state_byid($id) {
			$state = $this->master_model->get_state($id);
			if ($state && count($state) > 0) {
				$response = array(
					'status' => '1',
					'data' => $state
				);
			} else {
				$response = array(
					'status' => '0',
					'data' => []
				);
			}
			echo json_encode($response);
		}

		public function submit_state() {
			$postdata = array();
			$column_names = $this->common_model->get_column_names('ins_state');
			$column_names = array_diff($column_names, ['id']);

			foreach ($_POST as $key => $val) {
				if (in_array($key, $column_names) || $key === 'id') {
					$postdata[$key] = $this->input->post($key);
				}
			}

			// minimal validation
			if (empty($postdata['name'])) {
				echo json_encode(['status' => '0', 'message' => 'State name is required.']);
				return;
			}

			// duplicate validation (case-insensitive, excluding current id when updating)
			$excludeId = isset($_POST['id']) && $_POST['id'] !== '' ? (int)$_POST['id'] : null;
			if ($this->master_model->state_exists($postdata['name'], $excludeId)) {
				echo json_encode(['status' => '0', 'message' => 'State already exists.']);
				return;
			}

			$recordid = $this->master_model->save_state($postdata);

			$response = array();
			if ($recordid) {
				$response['status'] = '1';
				$response['message'] = 'State saved successfully.';
			} else {
				$response['status'] = '0';
				$response['message'] = 'Save failed.';
			}

			$this->session->set_userdata('message', $response['message']);
			echo json_encode($response);
		}

		public function state_datatable_json() {
			$requestData = $_POST;
			$draw = $requestData['draw'];

			$columns = array(
				0 => 'ist.created_at',
				1 => 'ist.name',
				2 => 'ist.status',
				3 => 'cu1.name',
				4 => 'ist.created_at',
			);

			$limit = $requestData['length'];
			$start = $requestData['start'];
			$order_column_index = $requestData['order'][0]['column'];
			$order = $columns[$order_column_index];
			$dir = $requestData['order'][0]['dir'];
			$search = $requestData['search']['value'];

			$sql = "SELECT ist.*, 
					DATE_FORMAT(ist.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state ist
				LEFT JOIN ci_users cu1 ON ist.created_by = cu1.id
				WHERE 1 = 1";

			if (!empty($search)) {
				$sql .= " AND (ist.name LIKE '%$search%' 
					OR ist.status LIKE '%$search%'
					OR cu1.name LIKE '%$search%'
					OR DATE_FORMAT(ist.created_at, '%d/%m/%Y %h:%i') LIKE '%$search%')";
			}

			$totalFiltered = $this->db->query($sql)->num_rows();

			$sql .= " ORDER BY $order $dir";
			if ($limit != -1) {
				$sql .= " LIMIT $start, $limit";
			}
			$query = $this->db->query($sql);
			$data = [];
			$index = $start + 1;

			foreach ($query->result() as $row) {
				$statusHtml = '<span style="color:' . ($row->status === 'active' ? '#228B22' : ($row->status === 'inactive' ? 'orange' : 'red')) . '; font-weight:bold;">' . ucfirst($row->status) . '</span>';
				$data[] = [
					$index++,
					$row->name,
					$row->created_by_name,
					$row->formated_created_at,
					$statusHtml,
					'<button class="btn btn-primary btn-sm editBtn" data-id="'.$row->id.'"><i class="material-icons">edit</i></button>'
				];
			}

			echo json_encode([
				"draw" => $draw,
				"recordsTotal" => $this->db->count_all_results('ins_state'),
				"recordsFiltered" => $totalFiltered,
				"data" => $data
			]);
		}
		// State Master: end

		// =====================
		// District Master: start
		public function district_list(){
			$data['title'] = 'District List';
			$data['states'] = $this->master_model->active_state_list();
			$data['view'] = 'insurance/rto_district_list';
			$this->load->view('layout',$data);
		}

		public function get_district_byid($id) {
			$district = $this->master_model->get_district($id);
			if ($district && count($district) > 0) {
				echo json_encode(['status' => '1', 'data' => $district]);
			} else {
				echo json_encode(['status' => '0', 'data' => []]);
			}
		}

		public function submit_district() {
			$postdata = array();
			$column_names = $this->common_model->get_column_names('ins_district');
			$column_names = array_diff($column_names, ['id']);

			foreach ($_POST as $key => $val) {
				if (in_array($key, $column_names) || $key === 'id') {
					$postdata[$key] = $this->input->post($key);
				}
			}

			if (empty($postdata['name']) || empty($postdata['state_id'])) {
				echo json_encode(['status' => '0', 'message' => 'District and State are required.']);
				return;
			}

			$excludeId = isset($_POST['id']) && $_POST['id'] !== '' ? (int)$_POST['id'] : null;
			if ($this->master_model->district_exists($postdata['name'], $postdata['state_id'], $excludeId)) {
				echo json_encode(['status' => '0', 'message' => 'District already exists for this State.']);
				return;
			}

			$recordid = $this->master_model->save_district($postdata);

			$response = array();
			if ($recordid) {
				$response['status'] = '1';
				$response['message'] = 'District saved successfully.';
			} else {
				$response['status'] = '0';
				$response['message'] = 'Save failed.';
			}

			$this->session->set_userdata('message', $response['message']);
			echo json_encode($response);
		}

		public function district_datatable_json() {
			$requestData = $_POST;
			$draw = $requestData['draw'];

			$columns = array(
				0 => 'idc.created_at',
				1 => 'idc.name',
				2 => 'ist.name',
				3 => 'idc.status',
				4 => 'cu1.name',
				5 => 'idc.created_at',
			);

			$limit = $requestData['length'];
			$start = $requestData['start'];
			$order_column_index = $requestData['order'][0]['column'];
			$order = $columns[$order_column_index];
			$dir = $requestData['order'][0]['dir'];
			$search = $requestData['search']['value'];

			$sql = "SELECT idc.*, 
					DATE_FORMAT(idc.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					ist.name AS state_name,
					cu1.name AS created_by_name
				FROM ins_district idc
				LEFT JOIN ins_state ist ON idc.state_id = ist.id
				LEFT JOIN ci_users cu1 ON idc.created_by = cu1.id
				WHERE 1 = 1";

			if (!empty($search)) {
				$sql .= " AND (idc.name LIKE '%$search%' 
					OR ist.name LIKE '%$search%'
					OR idc.status LIKE '%$search%'
					OR cu1.name LIKE '%$search%'
					OR DATE_FORMAT(idc.created_at, '%d/%m/%Y %h:%i') LIKE '%$search%')";
			}

			$totalFiltered = $this->db->query($sql)->num_rows();

			$sql .= " ORDER BY $order $dir";
			if ($limit != -1) {
				$sql .= " LIMIT $start, $limit";
			}
			$query = $this->db->query($sql);
			$data = [];
			$index = $start + 1;

			foreach ($query->result() as $row) {
				$statusHtml = '<span style="color:' . ($row->status === 'active' ? '#228B22' : ($row->status === 'inactive' ? 'orange' : 'red')) . '; font-weight:bold;">' . ucfirst($row->status) . '</span>';
				$data[] = [
					$index++,
					$row->name,
					$row->state_name,
					$statusHtml,
					$row->created_by_name,
					$row->formated_created_at,
					'<button class="btn btn-primary btn-sm editBtn" data-id="'.$row->id.'"><i class="material-icons">edit</i></button>'
				];
			}

			echo json_encode([
				"draw" => $draw,
				"recordsTotal" => $this->db->count_all_results('ins_district'),
				"recordsFiltered" => $totalFiltered,
				"data" => $data
			]);
		}
		// District Master: end

		// =====================
		// Agent Code Master: start
		public function agent_code_list(){
			$data['title'] = 'Agent Code List';
			$data['view'] = 'insurance/agent_code_list';
			$this->load->view('layout',$data);
		}

		public function get_agent_code_byid($id) {
			$code = $this->master_model->get_agent_code($id);
			if ($code && count($code) > 0) {
				echo json_encode(['status' => '1', 'data' => $code]);
			} else {
				echo json_encode(['status' => '0', 'data' => []]);
			}
		}

		public function submit_agent_code() {
			$postdata = array();
			$column_names = $this->common_model->get_column_names('ins_agent_code');
			$column_names = array_diff($column_names, ['id']);

			foreach ($_POST as $key => $val) {
				if (in_array($key, $column_names) || $key === 'id') {
					$postdata[$key] = $this->input->post($key);
				}
			}

			if (empty($postdata['name'])) {
				echo json_encode(['status' => '0', 'message' => 'Agent Code name is required.']);
				return;
			}

			$recordid = $this->master_model->save_agent_code($postdata);

			$response = array();
			if ($recordid) {
				$response['status'] = '1';
				$response['message'] = 'Agent Code saved successfully.';
			} else {
				$response['status'] = '0';
				$response['message'] = 'Save failed.';
			}

			$this->session->set_userdata('message', $response['message']);
			echo json_encode($response);
		}

		public function agent_code_datatable_json() {
			$requestData = $_POST;
			$draw = $requestData['draw'];

			$columns = array(
				0 => 'iac.id',
				1 => 'iac.name',
				2 => 'iac.status',
				3 => 'cu1.name',
				4 => 'cu2.name',
				5 => 'iac.created_at',
				6 => 'iac.updated_at',
			);

			$limit = $requestData['length'];
			$start = $requestData['start'];
			$order_column_index = $requestData['order'][0]['column'];
			$order = $columns[$order_column_index];
			$dir = $requestData['order'][0]['dir'];
			$search = $requestData['search']['value'];

			$sql = "SELECT iac.*,
					DATE_FORMAT(iac.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					DATE_FORMAT(iac.updated_at, '%d/%m/%Y %h:%i') AS formated_updated_at,
					cu1.name AS created_by_name,
					cu2.name AS updated_by_name
				FROM ins_agent_code iac
				LEFT JOIN ci_users cu1 ON iac.created_by = cu1.id
				LEFT JOIN ci_users cu2 ON iac.updated_by = cu2.id
				WHERE 1 = 1";

			if (!empty($search)) {
				$sql .= " AND (iac.id LIKE '%$search%'
					OR iac.name LIKE '%$search%'
					OR iac.status LIKE '%$search%'
					OR cu1.name LIKE '%$search%'
					OR cu2.name LIKE '%$search%'
					OR DATE_FORMAT(iac.created_at, '%d/%m/%Y %h:%i') LIKE '%$search%'
					OR DATE_FORMAT(iac.updated_at, '%d/%m/%Y %h:%i') LIKE '%$search%')";
			}

			$totalFiltered = $this->db->query($sql)->num_rows();

			$sql .= " ORDER BY $order $dir";
			if ($limit != -1) {
				$sql .= " LIMIT $start, $limit";
			}
			$query = $this->db->query($sql);
			$data = [];
			$index = $start + 1;

			foreach ($query->result() as $row) {
				$statusHtml = '<span style="color:' . ($row->status === 'active' ? '#228B22' : ($row->status === 'inactive' ? 'orange' : 'red')) . '; font-weight:bold;">' . ucfirst($row->status) . '</span>';
				$data[] = [
					$index++,
					$row->name,
					$statusHtml,
					$row->created_by_name,
					$row->updated_by_name,
					$row->formated_created_at,
					$row->formated_updated_at,
					'<button class="btn btn-primary btn-sm editBtn" data-id="'.$row->id.'"><i class="material-icons">edit</i></button>'
				];
			}

			echo json_encode([
				"draw" => $draw,
				"recordsTotal" => $this->db->count_all_results('ins_agent_code'),
				"recordsFiltered" => $totalFiltered,
				"data" => $data
			]);
		}
		// Agent Code Master: end
	}
?>