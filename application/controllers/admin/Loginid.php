<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Loginid extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/appuser_model', 'appuser_model');
			$this->load->model('admin/user_model', 'adminuser_model');
			$this->load->model('common_model', 'common_model');
			$this->load->model('insurance/loginid_model', 'loginid_model');
			$this->load->model('insurance/agency_model', 'agency_model');
			$this->load->model('insurance/master_model', 'master_model');
		}

		public function loginid_list(){
			$data['title'] = 'Login Id List';
			$data['view'] = 'insurance/loginid_list';
			$this->load->view('layout',$data);
		}

		function loginid_form($mode, $id=null) {
			$title = '';
			if($mode=='e')
				$title = 'Edit Login Id';
			else if($mode=='v')
				$title = 'View Login Id';
			else
				$title = 'Add Login Id';

			$postdata = array();
			$postdata['title'] = $title;
			$postdata['mode'] = $mode;

			// print_r($id);exit();

			$data['id'] = $id;
			$data['rto_companies'] = $this->master_model->active_rto_company_list();
			// Option lists for new fields
			$data['vehicle_types'] = ['Gcv','Pcv','School Bus','Staff Bus','Tractor','Misc-D','Car','2W','T-Taxi'];
			$data['fuel_types'] = ['All','Petrol','Diesel','Electric','Lpg','Cng'];
			$data['policy_types'] = ['Package','OD','TP', 'Package & TP'];
			$data['code_types'] = ['Broking','Individual'];	
			$data['agent_code'] = $this->common_model->get_data_array('ins_agent_code');
			$data['view'] = 'insurance/loginid_form';
			$data['postdata'] = $postdata;
			$this->load->view('layout',$data);
		}

		public function submit_loginid($mode) {
			$postdata = array();
			$column_names = $this->common_model->get_column_names('ins_loginid');
			$column_names = array_diff($column_names, ['id']);

			foreach ($_POST as $key => $val) {
				if (in_array($key, $column_names) || $key === 'id') {
					$postdata[$key] = $this->input->post($key);
				}
			}

			if (empty($postdata['id'])) {
				$postdata['gen_id'] = $this->common_model->generate_id("L", "ins_loginid", "id", 5);
			}

			$old_data = [];
			if (!empty($postdata['id'])) {
				$old_data = $this->loginid_model->get_loginid_by_id($postdata['id']);
			}

			// Server-side validation: rto_company_id required
			if (empty($postdata['rto_company_id'])) {
				$response = array('status' => '0', 'message' => 'RTO Company is required.');
				$this->session->set_userdata('message', $response['message']);
				echo json_encode($response);
				return;
			}

			$loginid = $this->loginid_model->save_loginid($postdata);
			$status = $loginid;

			
			if (!empty($postdata)) {
				$user_id = $this->session->userdata('admin_id');
				$this->loginid_model->log_loginid_changes($postdata['id'], $old_data, $postdata, $user_id);
			}

			$response = array();
			if ($status) {
				$response['status'] = '1';
				$response['message'] = 'Login ID addition/update successful.';
			} else {
				$response['status'] = '0';
				$response['message'] = 'Login ID addition/update failed.';
			}

			$this->session->set_userdata('message', $response['message']);
			echo json_encode($response);
		}

		public function loginid_list_datatable_json() {
			$requestData = $_POST;
			$draw = $requestData['draw'];
		
			$columns = array(
				0 => 'il.updated_date',
				1 => 'il.gen_id',
				2 => 'il.name',
				3 => 'iic.name', // RTO company name
				4 => 'il.vehicle_type',
				5 => 'il.fuel_type',
				6 => 'il.policy_type',
				7 => 'il.seating_capacity_from',
				8 => 'il.agent_code',
				9 => 'il.vehicle_make',
				10 => 'il.vehicle_model',
				11 => 'il.od_premium',
				12 => 'il.tp_premium',
				13 => 'il.net_premium',
				14 => 'il.agent_odpremium',
				15 => 'il.agent_tppremium',
				16 => 'il.agent_netpremium',
				17 => 'il.updated_date',
				18 => 'il.status',
				19 => 'il.updated_date',
			);
		
			$limit = $requestData['length'];
			$start = $requestData['start'];
			$order_column_index = $requestData['order'][0]['column'];
			$order = $columns[$order_column_index];
			$dir = $requestData['order'][0]['dir'];
			$search = $requestData['search']['value'];
		
			$sql = "SELECT il.*, irc.name AS rto_company_name, iac.name AS agent_code_name, DATE_FORMAT(il.updated_date, '%d/%m/%Y %h:%i') AS formated_updated_date
					FROM ins_loginid il
					LEFT JOIN ins_rto_company irc ON irc.id = il.rto_company_id
					LEFT JOIN ins_agent_code iac ON iac.id = il.agent_code_id
					LEFT JOIN ins_insurance_company iic ON iic.id = irc.inscompany_id";
			$clone_sql = $sql;
			$fetch_tot_data = $this->db->query($clone_sql);
			$totalData = $fetch_tot_data->num_rows();
		
			$where = array();
		
			if (!empty($search)) {
				$where[] = "(il.name LIKE '%$search%' 
							OR il.gen_id LIKE '%$search%' 
							OR irc.name LIKE '%$search%'
							OR il.vehicle_type LIKE '%$search%'
							OR il.fuel_type LIKE '%$search%'
							OR il.policy_type LIKE '%$search%'
							OR il.seating_capacity_from LIKE '%$search%'
							OR iac.name LIKE '%$search%'
							OR il.vehicle_make LIKE '%$search%'
							OR il.vehicle_model LIKE '%$search%'
							OR il.od_premium LIKE '%$search%' 
							OR il.tp_premium LIKE '%$search%' 
							OR il.net_premium LIKE '%$search%' 
							OR il.agent_odpremium LIKE '%$search%' 
							OR il.agent_tppremium LIKE '%$search%' 
							OR il.agent_netpremium LIKE '%$search%' 
							OR DATE_FORMAT(il.updated_date, '%d/%m/%Y %h:%i') LIKE '%$search%' 
							OR il.status LIKE '%$search%')";
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
			$data = array();
			$index = $start + 1;
			$dataObj = $query->result();
		
			$this->session->set_userdata('loginid_list', $dataObj);
		
			foreach ($dataObj as $row) {
				$status = '';
				if ($row->status == 'active') {
					$status = '<span style="color:#228B22;text-align:center;font-weight:bold">Active</span>';
				} elseif ($row->status == 'inactive') {
					$status = '<span style="color:orange;text-align:center;font-weight:bold">Inactive</span>';
				} elseif ($row->status == 'block') {
					$status = '<span style="color:red;text-align:center;font-weight:bold">Blocked</span>';
				}
		
				$nameStyle = 'border-bottom: 1px solid #222222; color: #222222; text-decoration:none;';
				if ($row->status == 'block') {
					$nameStyle = 'border-bottom: 1px solid red; color: red; text-decoration:none;';
				}
		
				$data[] = array(
					$index,
					$row->gen_id,
					'<a href="' . base_url('admin/loginid/loginid_form/v/' . $row->id) . '" style="' . $nameStyle . '">' . $row->name . '</a>',
					isset($row->rto_company_name) ? $row->rto_company_name : '',
					isset($row->vehicle_type) ? $row->vehicle_type : '',
					isset($row->fuel_type) ? $row->fuel_type : '',
					isset($row->policy_type) ? $row->policy_type : '',
					(isset($row->seating_capacity_from) && isset($row->seating_capacity_to) && 
						$row->seating_capacity_from > 0 && $row->seating_capacity_to > 0)
						? "{$row->seating_capacity_from} - {$row->seating_capacity_to}"
						: "",
					isset($row->agent_code_name) ? $row->agent_code_name : '',
					isset($row->vehicle_make) ? $row->vehicle_make : '',
					isset($row->vehicle_model) ? $row->vehicle_model : '',
					$row->od_premium." %",
					$row->tp_premium." %",
					$row->net_premium." %",
					isset($row->agent_odpremium) ? $row->agent_odpremium." %" : "0.00 %",
					isset($row->agent_tppremium) ? $row->agent_tppremium." %" : "0.00 %",
					isset($row->agent_netpremium) ? $row->agent_netpremium." %" : "0.00 %",
					$row->formated_updated_date,
					$status,
					'<a href="' . base_url('admin/loginid/loginid_form/e/' . $row->id) . '" class="btn btn-info waves-effect"><i class="material-icons md-18">edit</i></a>'
				);
				$index++;
			}
		
			$json_data = array(
				"draw" => $draw,
				"recordsTotal" => $totalData,
				"recordsFiltered" => $totalFiltered,
				"data" => $data
			);
		
			echo json_encode($json_data);
		}

		function upload_photos() {
			$output_dir = "uploads/agency_images/";
			if (!is_dir($output_dir)) {
				mkdir($output_dir, 0777, true);
			}
			$ret = $this->common_model->upload_files($output_dir, 'photos');
			echo $ret;
		}

		public function loginid_history_datatable_json($loginid_id) {
			$requestData = $_POST;
			$draw = isset($requestData['draw']) ? $requestData['draw'] : 1;
			$columns = [
				0 => 'id',
				1 => 'updated_date',
				2 => 'field_name',
				3 => 'old_value',
				4 => 'new_value',
				5 => 'updated_by',
			];
			$limit = isset($requestData['length']) ? $requestData['length'] : 10;
			$start = isset($requestData['start']) ? $requestData['start'] : 0;
			// Default order: id DESC if no order specified
			if (isset($requestData['order'][0]['column'])) {
				$order_column_index = $requestData['order'][0]['column'];
				$order = $columns[$order_column_index];
				$dir = isset($requestData['order'][0]['dir']) ? $requestData['order'][0]['dir'] : 'desc';
			} else {
				$order = 'id';
				$dir = 'desc';
			}

			// Get total count
			$this->db->where('loginid_id', $loginid_id);
			$totalData = $this->db->count_all_results('ins_loginid_history');

			// Get filtered data
			$this->db->where('loginid_id', $loginid_id);
			$this->db->order_by($order, $dir);
			if ($limit != -1) {
				$this->db->limit($limit, $start);
			}
			$query = $this->db->get('ins_loginid_history');
			$data = [];
			$sno = $start + 1;
			if ($query && $query instanceof CI_DB_result) {
				// Collect user IDs for this page
				$user_ids = [];
				foreach ($query->result() as $row) {
					if (!empty($row->updated_by)) $user_ids[] = $row->updated_by;
				}
				$user_names = [];
				if (!empty($user_ids)) {
					$this->db->select('id, username, name');
					$this->db->where_in('id', $user_ids);
					$users = $this->db->get('ci_users'); // Changed from 'admin' to 'ci_users'
					if ($users && $users instanceof CI_DB_result) {
						foreach ($users->result() as $u) {
							$user_names[$u->id] = $u->name ? $u->name : $u->username;
						}
					}
				}

				// Build data rows
				foreach ($query->result() as $row) {
					$data[] = [
						'sno'           => $sno++,
						'updated_date'  => date('d/m/Y H:i', strtotime($row->updated_date)),
						'field_name'    => $row->field_name,
						'old_value'     => $row->old_value,
						'new_value'     => $row->new_value,
						'updated_by'    => isset($user_names[$row->updated_by]) ? $user_names[$row->updated_by] : $row->updated_by,
					];
				}
			}
			$json_data = [
				"draw" => intval($draw),
				"recordsTotal" => $totalData,
				"recordsFiltered" => $totalData,
				"data" => $data
			];
			echo json_encode($json_data);
		}
	}
?>