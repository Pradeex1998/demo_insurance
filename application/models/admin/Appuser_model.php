<?php
	class appUser_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('datatable');
		}
		
		// public function add_user($data)
		// {
		// 	$this->db->insert('ci_users', $data);
		// 	return true;
		// }
		//---------------------------------------------------
		// get all users for server-side datatable processing (ajax based)		

		//---------------------------------------------------
		// get all users for server-side datatable with advanced search
		public function get_all_appuser(){
			$wh =array();
			$SQL ='SELECT * FROM app_user';
			if($this->session->userdata('user_search_type')!='')
			$wh[]="is_active = '".$this->session->userdata('user_search_type')."'";
			if($this->session->userdata('user_search_from')!='')
			$wh[]=" `created_at` >= '".date('Y-m-d', strtotime($this->session->userdata('user_search_from')))."'";
			if($this->session->userdata('user_search_to')!='')
			$wh[]=" `created_at` <= '".date('Y-m-d', strtotime($this->session->userdata('user_search_to')))."'";

			//$wh[] = " is_admin = 0";
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
		public function get_appuser_by_id($id){
			$query = $this->db->get_where('app_user', array('id' => $id));
			return $result = $query->row_array();
		}
		public function getdonationamtByUserId($user_id) {
	        $this->db->select_sum('amount');
	        $this->db->where('user_id', $user_id);
	        $query = $this->db->get('donation_master');

	        return $query->row()->amount;
	    }
	    public function getDonationData($user_id) {
	        $sql = 'SELECT dm.*, dd.donation_id, dd.address, dd.city, dd.email, dd.mobile_no, dd.district, dd.donor_name, dd.pin, dd.panaadhar, dd.occassion, dd.occassion_date, dd.state
	                FROM donation_master dm
	                LEFT JOIN donation_detail dd ON (dd.donation_id = dm.id) WHERE dm.user_id = "'.$user_id.'" order by dm.id desc';
	        
	        $query = $this->db->query($sql);
	        return $query->result_array();
	    }
	    public function getSubscriptionData($user_id) {
	        $sql = 'SELECT  sm.*,sd.subscription_id,sd.address,sd.city,sd.email,sd.mobile_no,sd.district,sd.pin,sd.state,sd.name FROM subscription_master sm LEFT JOIN subscription_detail sd ON (sd.subscription_id = sm.id) WHERE sm.user_id = "'.$user_id.'" order by sm.id desc ';
	        
	        $query = $this->db->query($sql);
	        return $query->result_array();
	    }
	    public function getRoomData($user_id) {
	    	$sql = 'SELECT rq.*,au.address,au.city,au.district,au.state,au.pin FROM room_request rq LEFT JOIN app_user au ON (au.id = rq.user_id) WHERE   rq.user_id = "'.$user_id.'" order by rq.id desc';
	        
	        $query = $this->db->query($sql);
	        return $query->result_array();
	    }
	    public function getAccessData($user_id) {
	    	$sql = 'SELECT ap.* FROM app_user_accesshistory ap Where ap.userid ="'.$user_id.'" order by ap.id desc';
	        
	        $query = $this->db->query($sql);
	        return $query->result_array();
	    }
	    public function getSubCountByUserId($user_id) {
	        $this->db->where('user_id', $user_id);
	        $query = $this->db->get('subscription_master');
	        return $query->num_rows();
	    }
	    public function getRoomCountByUserId($user_id) {
	        $this->db->where('user_id', $user_id);
	        $query = $this->db->get('room_request');

	        return $query->num_rows();
	    }

		// //---------------------------------------------------
		// // Edit user Record
		// public function edit_user($data, $id){
		// 	$this->db->where('id', $id);
		// 	$this->db->update('ci_users', $data);
		// 	return true;
		// }

		//---------------------------------------------------
		// Get User Role/Group
		public function get_user_groups(){
			$query = $this->db->get('ci_user_groups');
			return $result = $query->result_array();
		}

		function update_appuser($data, $id)
		{
			//unset($data['id']); // remove a key and value from array
			$this->db->where('id', $id);
			$this->db->update('app_user', $data);
			return ($this->db->affected_rows() != 1) ? false : true;
		}

	}

?>