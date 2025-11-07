<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	class User extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/appuser_model', 'appuser_model');
			$this->load->model('admin/user_model', 'adminuser_model');
			$this->load->model('insurance/agency_model', 'agency_model');
			$this->load->model('common_model', 'common_model');
		}

		//---------------------------------------------------------------
		//  Export Users PDF 
		public function create_users_pdf(){
			$this->load->helper('pdf_helper'); // loaded pdf helper
			$data['all_users'] = $this->ci_example_model->get_all_simple_users();
			$this->load->view('admin/ci_examples/users_pdf', $data);
		}	
		//---------------------------------------------------------------	
		// Export data in CSV format 
		public function export_csv(){ 
		   // file name 
		   $filename = 'users_'.date('Y-m-d').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   
		   // get data 
		   $user_data = $this->ci_example_model->get_users_for_csv();

		   // file creation 
		   $file = fopen('php://output', 'w');
		 
		   $header = array("ID", "Username", "First Name", "Last Name", "Email", "Mobile_no", "Created Date"); 
		   fputcsv($file, $header);
		   foreach ($user_data as $key=>$line){ 
		     fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
		}

		//---------------------------------------------------
		public function user_list($mode){

			$data = array();
			
			$data['mode'] = $mode;
			if($mode=='a')
			{
				$data['title'] = 'App';
				$data['view'] = 'admin/appuser_list';
			}			
			else if($mode=='w')
			{
				$data['title'] = 'Admin';
				$data['view'] = 'admin/adminuser_list';
			}			

			$this->load->view('layout',$data);
		}

		//-------------------------------------------------------
		public function search(){
			$this->session->set_userdata('user_search_status',$this->input->post('user_search_status'));
			$this->session->set_userdata('user_search_from',$this->input->post('user_search_from'));
			$this->session->set_userdata('user_search_to',$this->input->post('user_search_to'));

			echo json_encode($this->contacts_model->get_all_contacts_by_advance_search());
		}

		//---------------------------------------------------
		// Server-side processing Datatable Example with Advance Search
		public function appuser_datatable_json()
		{	
			$records = $this->appuser_model->get_all_appuser();
			//print_r($records);
			$data = array();
			$i=$records['offset'];
			foreach ($records['data']  as $row) 
			{  
				$updated_date = $row['updated_date'];
				$date = date('Y-m-d H:i:s', strtotime($updated_date));
				$status = ($row['is_active']==1)?'Active' : 'Inactive';
				// $updated_date = $date->format('d-m-Y H:i');
				$data[]= array(
					++$i,
					'<a href="'.base_url().'admin/user/appuser_view/v/'.$row['id'].'">'.$row['name'].'</a>',
					$row['email'].'<br>'.$row['mobile'],
					$row['address'],
					$row['os'],
					$updated_date,
					'<span style="color:#228B22;text-align:center;font-weight:bold">'.$status.'</span>',
					'<a href="'.base_url().'admin/user/appuser_view/e/'.$row['id'].'"><i class="material-icons md-18">edit</i>Edit . </a>',
				);
			}
			$records['data']=$data;
			echo json_encode($records);						   
		}

		public function adminuser_datatable_json()
		{	
			$records = $this->adminuser_model->get_all_adminuser();
			// echo "<pre>";print_r($records);
			$data = array();
			$i=$records['offset'];
			foreach ($records['data']  as $row) 
			{  
				$updated_date = $row['updated_at'];
				$date = date('d-m-Y h:i A', strtotime($updated_date));

				$status = '';
				if ($row['status'] == 'active') {
					$status = '<span style="color:#228B22;text-align:center;font-weight:bold">Active</span>';
				} elseif ($row['status'] == 'inactive') {
					$status = '<span style="color:orange;text-align:center;font-weight:bold">Inactive</span>';
				} elseif ($row['status'] == 'block') {
					$status = '<span style="color:red;text-align:center;font-weight:bold">Blocked</span>';
				}

				$data[]= array(
					++$i,
					'<a href="'.base_url().'admin/user/adminuser_view/v/'.$row['id'].'">'.$row['name'].'</a>',
					$row['branch_name'],
					$row['email'].' | '.$row['mobile_no'],
					$row['address'],
					$date,
					'<span style="color:#228B22;text-align:center;font-weight:bold">'.$status.'</span>',
					// '<a href="' . base_url('admin/user/user_permission/' . $row['id']) . '"class="btn btn-warning waves-effect"><i class="material-icons md-18">lock</i></a> '.
					'<a href="' . base_url('admin/user/adminuser_view/e/'.$row['id']) . '"class="btn btn-primary waves-effect"><i class="material-icons md-18">edit</i></a> ',
				);
			}
			$records['data']=$data;
			echo json_encode($records);						   
		}

		function appuser_view($mode) //add-edit-view event
		{
			$title = '';
			if($mode=='e')
				$title = 'Edit App User';
			else if($mode=='c' || $mode=='a')
				$title = 'Add App User';
			else if($mode=='v')
				$title = 'View App User';
			
			$postdata = array();
			$postdata['title'] = $title;
			$postdata['mode'] = $mode;

			$user_details = array();
			//print_r($contact_details);

			//$contact_types = $this->common_model->get_master_data_array('event_type_master');
			//$branch_types = $this->common_model->get_table_array('cont_branch_master');
			//$department_types = $this->common_model->get_table_array('cont_department_master');
			//$status = $this->common_model->get_master_data_array('publish_status_master');
			$countries = $this->common_model->get_master_data_array('ci_countries');
			//$cities = $this->common_model->get_master_data_array('ci_cities');
			//$states = $this->common_model->get_master_data_array('ci_states');

			if($mode=='a')
			{	
				
			}
			else
			{
				$id = $this->uri->segment(5);
				
				if(isset($id) && $id!='')
				{
					$user_details = $this->appuser_model->get_appuser_by_id($id);
				}
			}

			// echo "<pre>"; print_r($user_details);exit();
			$id = $this->uri->segment(5);
			$donation_amount = $this->appuser_model->getdonationamtByUserId($id);
			$sub_count = $this->appuser_model->getSubCountByUserId($id);
			$rooms_count = $this->appuser_model->getRoomCountByUserId($id);
			$donation_data  = $this->appuser_model->getDonationData($id);
			$subscription_data  = $this->appuser_model->getSubscriptionData($id);
			$room_data  = $this->appuser_model->getRoomData($id);
			$accessdata = $this->appuser_model->getAccessData($id);
			//print_r($contact_details);
			$postdata['donation_amount'] = $donation_amount;
			$postdata['sub_count'] = $sub_count;
			$postdata['rooms_count'] = $rooms_count;
			$postdata['donation_data'] = $donation_data;
			$postdata['subscription_data'] = $subscription_data;
			$postdata['room_data'] = $room_data;
			$postdata['accessdata'] = $accessdata;
			//$postdata['department_types'] = $department_types;
			$postdata['countries'] = $countries;
			//$postdata['cities'] = $cities;
			//$postdata['states'] = $states;
			$postdata['user_details'] = $user_details;

			$data['title'] = 'Add App User';
			if($mode=='v')
			{
				$data['view'] = 'admin/appuser_view';
			} 
			else
			{
				$data['view'] = 'admin/appuser_item';
			}
			$data['postdata'] = $postdata;
			//print_r($data);
			$this->load->view('layout',$data);
		}

		

		function adminuser_view($mode) //add-edit-view event
		{
			$title = '';
			if($mode=='e')
				$title = 'Edit Admin User';
			else if($mode=='c' || $mode=='a')
				$title = 'Add Admin User';
			else if($mode=='v')
				$title = 'View Admin User';
			
			$postdata = array();
			$postdata['title'] = $title;
			$postdata['mode'] = $mode;

			$user_details = array();
			$user_permissions = array();

			if($mode=='a')
			{	
				$userid = '';
			}
			else
			{
				$id = $this->uri->segment(5);
				$userid = $id;
				
				if(isset($id) && $id!='')
				{
					$user_details = $this->adminuser_model->get_user_by_id($id);
					$user_permissions = $this->adminuser_model->get_user_permissions($id);
				}
			}
			
			$postdata['user_details'] = $user_details;

            $data['branches'] = $this->common_model->get_active_branches();
            $data['roles'] = $this->adminuser_model->get_allroles();
            
           
			$this->db->where('status', 'active');
			$data['agencies'] = $this->db->get('ins_agency')->result_array();
			
			$data['selected_agency_ids'] = isset($userid) && $userid !== '' ? $this->adminuser_model->get_user_agency_ids($userid) : array();
			$data['user_permissions'] = $this->format_user_permissions($user_permissions);
			$data['user_details'] = $user_details; 
			$data['id'] = $userid;
			$data['view'] = 'admin/adminuser_item';
			$data['postdata'] = $postdata;
			$this->load->view('layout',$data);
		}

		function load_states($countryid)
		{
			$states_dtls = $this->common_model->get_table_col_array('ci_states','country_id',$countryid);
			//print_r($states_dtls);
			$states = array();
			/*$i=0;
            
            if($states_dtls->num_rows()>0)
            {                                    
                foreach($states_dtls->result_array() as $row)
                {
                    $comp_title_id = $row['comp_title_id'];
                    $comp_title = $this->trans_model->get_name_fromid($comp_title_id,'cam_complaint_title');
                    $comp_details.=$comp_title.', ';
                }
            }*/

            //	$states[$i]['state_details'] = $states_dtls;

            print_r(json_encode($states_dtls));
		}

		function load_cities($state_id)
		{
			$city_dtls = $this->common_model->get_table_col_array('ci_cities','state_id',$state_id);
			print_r(json_encode($city_dtls));
		}

		function upload_photos()
		{
			$output_dir = "uploads/contacts/kudil/";
			$ret = $this->common_model->upload_files($output_dir, 'photos');
			echo $ret;
		}

		function submit_appuser($mode) {
			
			$id = '';
			
			foreach($_POST as $key => $val) {  
				if($key != 'country_id' && $key != 'state_id' && $key != 'city_id') {
					$postdata[$key] = $this->input->post($key);	

					if($key=='id') {
						$id = $this->input->post($key);
					}
				}
			}

			$postdata['country']  			= $this->input->post('country_id');
			$postdata['state']  			= $this->input->post('state_id');
			$postdata['city']  				= $this->input->post('city');
			$postdata['is_active']			= $this->input->post('is_active') == 1?1:0;
			$postdata['is_admin']=0;

			unset($postdata['id']);
			unset($postdata['is_admin']);

			if($this->input->post('password')!=''){
				$hashed_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				$postdata['password'] = $hashed_password;
			}
			
			// echo "<pre>"; print_r($postdata);exit();

			$response = NULL;
			$message = '';

			$status = $this->appuser_model->update_appuser($postdata, $id);
			if($status)
			{
				$message	=	'User addition/update successful.';
				$this->session->set_userdata('message',$message);
				$response['status']='1';
			}
			else
			{
				$message	=	'User addition/update failed.'.$status;
				$this->session->set_userdata('message',$message);
				$response['status']='0';
			}

			$response['message'] = $message;

			echo json_encode($response);
		}

		public function submit_adminuser($mode = '') {
			
			$postdata = array();
			$column_names = $this->common_model->get_column_names('ci_users');
			$column_names = array_diff($column_names, ['id']);
			
			foreach ($_POST as $key => $val) {
				if (in_array($key, $column_names) || $key === 'id') {
		
					if ($key == 'password') {
						if (!empty($this->input->post('password'))) {
							$hashed_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
							$postdata['password'] = $hashed_password;
						}
					} else {
						$postdata[$key] = $this->input->post($key);
					}
				}
			}

			// echo "<pre>"; print_r($postdata);exit();

			
			$insert_or_upate_id = $this->adminuser_model->save_user($postdata);

			// Save user-agency mappings: always reset then insert selected (if any)
			$agency_ids = $this->input->post('agency_ids');
			// echo "<pre>"; print_r($agency_ids);exit();
			if ($insert_or_upate_id) {
				$this->adminuser_model->delete_user_agencies($insert_or_upate_id);
				if (is_array($agency_ids)) {
					foreach ($agency_ids as $agency_id) {
						if ($agency_id !== '') {
							$this->adminuser_model->add_user_agency($insert_or_upate_id, $agency_id);
						}
					}
				}

				// Save user permissions (with error handling)
				try {
					$this->save_user_permissions($insert_or_upate_id);
				} catch (Exception $e) {
					// Log the error but don't fail the user save
					log_message('error', 'Permission save failed: ' . $e->getMessage());
				}
			}
			
			$response = array();
			// echo "<pre>"; print_r($insert_or_upate_id);exit();
			if ($insert_or_upate_id) {
				$response['insert_id'] = $insert_or_upate_id;
				$response['status'] = '1';
				$response['message'] = 'User addition/update successful.';
			} else {
				$response['insert_id'] = $insert_or_upate_id;
				$response['status'] = '0';
				$response['message'] = 'User addition/update failed.';
			}
			
			$this->session->set_userdata('message', $response['message']);
			echo json_encode($response);
		}

		// Helper function to format user permissions for display
		private function format_user_permissions($permissions) {
			$formatted = array();
			if (is_array($permissions)) {
				foreach ($permissions as $permission) {
					$formatted[$permission['menu']][$permission['submenu']] = array(
						'permission' => $permission['permission'],
						'view' => isset($permission['view']) ? $permission['view'] : 0,
						'edit' => isset($permission['edit']) ? $permission['edit'] : 0,
						'delete' => isset($permission['delete']) ? $permission['delete'] : 0
					);
				}
			}
			return $formatted;
		}

		// Save user permissions
		private function save_user_permissions($user_id) {
			// Check if user_permission table exists
			if (!$this->db->table_exists('user_permission')) {
				log_message('info', 'user_permission table does not exist. Skipping permission save.');
				return;
			}
			
			// Delete existing permissions
			$this->adminuser_model->delete_permissions_by_user($user_id);
			
			// Get permissions from POST data
			$permissions = $this->input->post('permissions');
			
			// Debug: Log the permissions data
			log_message('debug', 'Permissions data: ' . print_r($permissions, true));
			
			if (is_array($permissions)) {
				foreach ($permissions as $permissionKey => $permission) {
					// Check if permission array has required keys
					if (isset($permission['menu']) && isset($permission['submenu'])) {
						$permission_data = array(
							'user_id' => $user_id,
							'menu' => $permission['menu'],
							'submenu' => $permission['submenu'],
							'permission' => isset($permission['permission']) ? 1 : 0
						);
						
						$this->adminuser_model->insert_permission($permission_data);
					} else {
						log_message('error', 'Invalid permission data structure: ' . print_r($permission, true));
					}
				}
			} else {
				log_message('info', 'No permissions data received or data is not an array.');
			}
		}


		


		
	}
?>