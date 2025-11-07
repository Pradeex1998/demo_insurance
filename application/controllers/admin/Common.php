<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Common extends MY_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('admin/appuser_model', 'appuser_model');
			$this->load->model('admin/user_model', 'adminuser_model');
			$this->load->model('common_model', 'common_model');
			$this->load->model('insurance/agency_model', 'agency_model');
		}

		public function get_data_from_id() {
			$table_name = $this->input->get('table_name');
			$id = $this->input->get('id');
			
			// if (!in_array($table_name, ['ins_agency'])) {
			// 	echo json_encode(['success' => false, 'message' => 'Invalid table name']);
			// 	return;
			// }
			
			$records = $this->common_model->get_table_col_array($table_name, 'id', $id);
			
			if (!empty($records)) {
				echo json_encode(['success' => true, 'data' => $records[0]]);
			} else {
				echo json_encode(['success' => false, 'message' => 'No data found']);
			}
		}

		
		
	}
?>