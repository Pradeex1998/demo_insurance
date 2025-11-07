<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Agency extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/appuser_model', 'appuser_model');
			$this->load->model('admin/user_model', 'adminuser_model');
			$this->load->model('common_model', 'common_model');
			$this->load->model('insurance/agency_model', 'agency_model');
			$this->load->model('insurance/loginid_model', 'loginid_model');
			$this->load->model('insurance/master_model', 'master_model');
		}

		//  ============ end =========

		public function agency_list(){
			$data['title'] = 'Agent List';
			$data['view'] = 'insurance/agency_list';
			$this->load->view('layout',$data);
		}

		function agency_form($mode, $id=null) {
			$title = '';
			if($mode=='e')
				$title = 'Edit Agent';
			else if($mode=='v')
				$title = 'View Agent';
			else
				$title = 'Add Agent';

			$postdata = array();
			$postdata['title'] = $title;
			$postdata['mode'] = $mode;

			$data['loginid_data'] = $this->agency_model->get_agency_with_loginid($id);
			// echo "<pre>";print_r($data['loginid_data']);exit();
			if ($data['loginid_data']) {
				foreach ($data['loginid_data'] as &$agency) {
					if ($agency['net_premium'] == 0.00){
						$agency['id'] = '';
					}
				}
				unset($agency);
			}


			$data['branch_data'] = $this->master_model->active_branch();
			$data['id'] = $id;
			$data['view'] = 'insurance/agency_form';
			$data['postdata'] = $postdata;
			$this->load->view('layout',$data);
		}

		public function submit_agency($mode) {

			// echo "<pre>";print_r($_POST);exit();	
			
			$postdata = array();
			$column_names = $this->common_model->get_column_names('ins_agency');
			$column_names = array_diff($column_names, ['id']);
			
			foreach ($_POST as $key => $val) {
				if (in_array($key, $column_names) || $key === 'id') {
					$postdata[$key] = $this->input->post($key);
				}
			}
			
			if (empty($postdata['id'])) {
				$postdata['gen_id'] = $this->common_model->generate_id("A", "ins_agency", "id", 5);
			}

			if($key == 'image') {
				
			}
			
			if (!empty($this->input->post('image'))) {
				if($this->input->post('image')!='') {
					$postdata['image']	= '/agency_images/'.$postdata['image'];
				}
			}
			$recordid = $this->agency_model->save_agency($postdata);

			$agency_id   = $recordid;
			$comm_ids 	 = $this->input->post('comm_id');
			$login_ids   = $this->input->post('login_id');
			$od_premium  = $this->input->post('od_premium');
			$tp_premium  = $this->input->post('tp_premium');
			$net_premium = $this->input->post('net_premium');

			foreach ($net_premium as $id_key => $np) {
				$data = [
					'id' => isset($comm_ids[$id_key]) ? $comm_ids[$id_key] : null,
					'agency_id' => $agency_id,
					'login_id' => isset($login_ids[$id_key]) ? $login_ids[$id_key] : '',
					'od_premium' => isset($od_premium[$id_key]) ? $od_premium[$id_key] : 0,
					'tp_premium' => isset($tp_premium[$id_key]) ? $tp_premium[$id_key] : 0,
					'net_premium' => $np,
				];

				$this->agency_model->save_agencycommission($data);
			}



			
			$response = array();
			if ($recordid) {
				$response['status'] = '1';
				$response['message'] = 'Agent addition/update successful.';
			} else {
				$response['status'] = '0';
				$response['message'] = 'Agent addition/update failed.';
			}
			
			$this->session->set_userdata('message', $response['message']);
			echo json_encode($response);
		}

		public function agency_list_datatable_json() {
			$requestData = $_POST;
			$draw = $requestData['draw'];
		
			$columns = array(
				0 => 'ia.updated_date',
				1 => 'ia.gen_id',
				2 => 'ia.name',
				3 => 'ia.mobile_no',
				4 => 'ia.whatsapp_no',
				5 => 'ia.email',
				6 => 'ia.city',
				7 => 'ia.address',
				8 => 'ia.updated_date',
				9 => 'ia.status',
				10 => 'ia.updated_date',
			);
		
			$limit = $requestData['length'];
			$start = $requestData['start'];
			$order_column_index = $requestData['order'][0]['column'];
			$order = $columns[$order_column_index];
			$dir = $requestData['order'][0]['dir'];
			$search = $requestData['search']['value'];
		
			$sql = "SELECT ia.*, DATE_FORMAT(ia.updated_date, '%d/%m/%Y %h:%i') AS formated_updated_date FROM ins_agency ia";
			$clone_sql = $sql;
			$fetch_tot_data = $this->db->query($clone_sql);
			$totalData = $fetch_tot_data->num_rows();
		
			$where = array();
		
			if (!empty($search)) {
				$where[] = "(ia.name LIKE '%$search%' 
							OR ia.gen_id LIKE '%$search%' 
							OR ia.mobile_no LIKE '%$search%' 
							OR ia.whatsapp_no LIKE '%$search%' 
							OR ia.email LIKE '%$search%' 
							OR ia.city LIKE '%$search%' 
							OR ia.address LIKE '%$search%' 
							OR DATE_FORMAT(ia.updated_date, '%d/%m/%Y %h:%i') LIKE '%$search%' 
							OR ia.status LIKE '%$search%')";
			}

			$userdata = $this->session->userdata('userdata');
			
			// Role-based branch filtering
			$user_role = $userdata['role_id'];
			if ($user_role == 3) { // Agent role - filter by their branch
				$where[] = "ia.branch_id = " . (int)$userdata['branch_id'];
			}
			// For role 1 or 2 (Admin/Manager), show all agencies - no additional filtering
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
		
			$this->session->set_userdata('agency_list', $dataObj);
		
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
					'<a href="' . base_url('admin/agency/agency_form/v/' . $row->id) . '" style="' . $nameStyle . '">' . $row->name . '</a>',
					$row->mobile_no,
					$row->whatsapp_no,
					$row->email,
					$row->city,
					$row->address,
					$row->formated_updated_date,
					$status,
					'<a href="' . base_url('admin/agency/agency_form/e/' . $row->id) . '" class="btn btn-info waves-effect"><i class="material-icons md-18">edit</i></a>'
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

		public function agency_history($agency_id) {
			$data['history'] = $this->agency_model->get_agency_history($agency_id);
			$data['view'] = 'insurance/agency_history';
			$this->load->view('layout', $data);
		}

		public function agency_history_datatable($agency_id) {
			
			$start = $this->input->get('start');
			$length = $this->input->get('length');
			$order_col = $this->input->get('order')[0]['column'];
			$order_dir = $this->input->get('order')[0]['dir'];

			$params = [
				'start' => $start,
				'length' => $length,
				'order' => $order_col,
				'dir' => $order_dir
			];
			$result = $this->agency_model->get_agency_history_datatable($agency_id, $params);

			$data = [];
			$i = $start + 1;

			// Collect all user IDs to fetch names in one query
			$user_ids = array_column($result['data'], 'updated_by');
			$user_names = [];
			if (!empty($user_ids)) {
				$this->db->select('id, name');
				$this->db->from('ci_users');
				$this->db->where_in('id', $user_ids);
				$query = $this->db->get();
				foreach ($query->result_array() as $user) {
					$user_names[$user['id']] = $user['name'];
				}
			}

			// Collect all login_ids to fetch login names in one query
			$login_ids = array_column($result['data'], 'login_id');
			$login_names = [];
			if (!empty($login_ids)) {
				$this->db->select('id, name');
				$this->db->from('ins_loginid');
				$this->db->where_in('id', $login_ids);
				$query = $this->db->get();
				foreach ($query->result_array() as $login) {
					$login_names[$login['id']] = $login['name'];
				}
			}

			foreach ($result['data'] as $row) {
				$username = isset($user_names[$row['updated_by']]) ? $user_names[$row['updated_by']] : $row['updated_by'];
				$login_name = isset($login_names[$row['login_id']]) ? $login_names[$row['login_id']] : $row['login_id'];
				$data[] = [
					$i++, 
					date('d/m/Y H:i', strtotime($row['updated_at'])),
					$login_name . " - " . $row['field_name'],
					$row['old_value'],
					$row['new_value'],
					$username
				];
			}

			echo json_encode([
				'draw' => intval($this->input->get('draw')),
				'recordsTotal' => $result['recordsTotal'],
				'recordsFiltered' => $result['recordsFiltered'],
				'data' => $data
			]);
		}
	}
?>