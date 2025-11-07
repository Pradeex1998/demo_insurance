<?php
	class User_model extends CI_Model
	{
		//ADMIN USER MODEL
		
		public function __construct()
		{
			parent::__construct();
			$this->load->library('datatable');
		}

		// public function add_user($data)
		// {
		// 	$this->db->insert('ci_users', $data);

		// 	if ($this->db->affected_rows() > 0)
		// 		return $this->db->insert_id();
		// 	else 
		// 		return false;
		// }

		
		public function get_user_agency_ids($user_id) {
			$this->db->select('agency_id');
			$this->db->from('ins_user_agency');
			$this->db->where('user_id', $user_id);
			$query = $this->db->get();
			$result = $query->result_array();
			$ids = array();
			foreach ($result as $row) {
				$ids[] = $row['agency_id'];
			}
			return $ids;
		}

		public function delete_user_agencies($user_id) {
			$this->db->where('user_id', $user_id);
			$this->db->delete('ins_user_agency');
		}

		public function add_user_agency($user_id, $agency_id) {
			$data = array(
				'user_id' => $user_id,
				'agency_id' => $agency_id
			);
			return $this->db->insert('ins_user_agency', $data);
		}
		//---------------------------------------------------
		// // get all users for server-side datatable processing (ajax based)
		// public function get_all_users(){
		// 	$wh =array();
		// 	$SQL ='SELECT * FROM ci_users';
		// 	$wh[] = " is_admin = 0";
		// 	if(count($wh)>0)
		// 	{
		// 		$WHERE = implode(' and ',$wh);
		// 		return $this->datatable->LoadJson($SQL,$WHERE);
		// 	}
		// 	else
		// 	{
		// 		return $this->datatable->LoadJson($SQL);
		// 	}
		// }

		// //---------------------------------------------------
		// // get all user records
		// public function get_all_simple_users(){
		// 	$this->db->where('is_admin', 0);
		// 	$this->db->order_by('created_at', 'desc');
		// 	$query = $this->db->get('ci_users');
		// 	return $result = $query->result_array();
		// }

		//---------------------------------------------------
		// Count total user for pagination
		public function count_all_users(){
			return $this->db->count_all('ci_users');
		}

		public function get_all_adminuser()
		{
			$wh =array();
			$SQL ='SELECT ci_users.*, ins_branch.branch_name FROM ci_users LEFT JOIN ins_branch ON ci_users.branch_id = ins_branch.id';
			if($this->session->userdata('user_search_from')!='')
				$wh[]=" ci_users.created_at >= '".date('Y-m-d', strtotime($this->session->userdata('user_search_from')))."'";
			if($this->session->userdata('user_search_to')!='')
				$wh[]=" ci_users.created_at <= '".date('Y-m-d', strtotime($this->session->userdata('user_search_to')))."'";

			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}
		}

		//---------------------------------------------------
		// Get all users for pagination
		public function get_all_users_for_pagination($limit, $offset){
			$wh =array();	
			$this->db->order_by('created_at', 'desc');
			$this->db->limit($limit, $offset);

			if(count($wh)>0){
				$WHERE = implode(' and ',$wh);
				$query = $this->db->get_where('ci_users', $WHERE);
			}
			else{
				$query = $this->db->get('ci_users');
			}
			return $query->result_array();
			//echo $this->db->last_query();
		}


		//---------------------------------------------------
		// get all users for server-side datatable with advanced search
		public function get_all_users_by_advance_search(){
			$wh =array();
			$SQL ='SELECT * FROM ci_users';
			if($this->session->userdata('user_search_type')!='')
			$wh[]="is_active = '".$this->session->userdata('user_search_type')."'";
			if($this->session->userdata('user_search_from')!='')
			$wh[]=" `created_at` >= '".date('Y-m-d', strtotime($this->session->userdata('user_search_from')))."'";
			if($this->session->userdata('user_search_to')!='')
			$wh[]=" `created_at` <= '".date('Y-m-d', strtotime($this->session->userdata('user_search_to')))."'";

			$wh[] = " is_admin = 0";
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}
		}

		//---------------------------------------------------
		// Get user detial by ID
		public function get_user_by_id($id){
			$query = $this->db->get_where('ci_users', array('id' => $id));
			return $result = $query->row_array();
		}

		//---------------------------------------------------
		// Edit user Record
		public function edit_user($data, $id){
			$this->db->where('id', $id);
			$this->db->update('ci_users', $data);
			return $id;
		}

		//---------------------------------------------------
		// Get User Role/Group
		public function get_user_groups(){
			$query = $this->db->get('ci_user_groups');
			return $result = $query->result_array();
		}

		public function get_user_details($id) {
			$query	=	'SELECT * FROM ezpay_users WHERE id = '.$id;
			$query	=	$this->db->query($query);
			if($query->num_rows()) {
				$result = $query->result_array();
				return $result[0];	
			} else {
				return array();	
			}  
		}


		public function get_userdata_by_id($id){
			$this->db->where('id', $id);
			$query = $this->db->get('ci_users');
			return $query->row_array();
		}
		
		public function get_user_permissions($id) {
			$this->db->where('user_id', $id);
			$query = $this->db->get('user_permission');
			return $query->result_array();
		}
		
		public function delete_permissions_by_user($user_id) {
			$this->db->where('user_id', $user_id);
			$this->db->delete('user_permission');
		}
		
		public function insert_permission($data) {
			return $this->db->insert('user_permission', $data);
		}

		public function has_permission($menu, $submenu) {
			$user_id =  $this->session->userdata('admin_id');
			$this->db->where('user_id', $user_id);
			$this->db->where('menu', $menu);
			$this->db->where('submenu', $submenu);
			$query = $this->db->get('user_permission');
			$result = $query->row_array();
	
			return isset($result['permission']) && $result['permission'] == 1;
		}

		public function get_allroles() {
			$query = $this->db->select('id, role')->from('ins_roles')->get();
		
			if ($query->num_rows() > 0) {
				return $query->result_array(); // returns array of roles
			} else {
				return []; // return empty array if no roles found
			}
		}

		// Save or update user
		public function save_user($data) {
			$id = isset($data['id']) ? $data['id'] : null;
			unset($data['id']); // Remove id from data array
			
			if ($id) {
				// Update existing user
				$this->db->where('id', $id);
				$this->db->update('ci_users', $data);
				return $id;
			} else {
				// Insert new user
				$data['created_at'] = date('Y-m-d H:i:s');
				$data['updated_at'] = date('Y-m-d H:i:s');
				$this->db->insert('ci_users', $data);
				return $this->db->insert_id();
			}
		}

		// Check if user has specific permission (enhanced version)
		public function has_permission_enhanced($user_id, $menu, $submenu, $action = 'permission') {
			$this->db->where('user_id', $user_id);
			$this->db->where('menu', $menu);
			$this->db->where('submenu', $submenu);
			$query = $this->db->get('user_permission');
			$result = $query->row_array();
	
			return isset($result[$action]) && $result[$action] == 1;
		}

		// Get all menu permissions for a user
		public function get_user_menu_permissions($user_id) {
			$this->db->where('user_id', $user_id);
			$this->db->where('permission', 1);
			$query = $this->db->get('user_permission');
			return $query->result_array();
		}
	}

?>