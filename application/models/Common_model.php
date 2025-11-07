<?php
	class Common_model extends CI_Model{

		public function get_name_from_id($id, $table_name)
		{
			$query	=	'SELECT name FROM '.$table_name.' WHERE id='.$id;
			$result	=	$this->db->query($query);

			if($result->num_rows()> 0)
			{
				foreach($result->result_array() as $row)
				{
					$name = $row['name'];
				}	
			}

			if(isset($name))
			{
				return $name;
			}
			else
			{
				return '';
			}
		}
		
		public function get_master_data_array($table_name)
		{
			$query	=	'SELECT * FROM '.$table_name.' WHERE status = 1';
			$result	=	$this->db->query($query);

			$response = array();
			$i=0;
			if($result->num_rows()>0)
			{
				foreach($result->result_array() as $row)
				{
					$response[$i] = $row;
					$i++;
				}	
			}

			return $response;
		}

		public function get_table_array($table_name) {
		 	$query	=	'SELECT * FROM '.$table_name;
		 	$result	=	$this->db->query($query);

		 	$response = array();
		 	$i=0;
		 	if($result->num_rows()>0)
		 	{
		 		foreach($result->result_array() as $row)
		 		{
		 			$response[$i] = $row;
		 			$i++;
		 		}
		 	}

		 	return $response;
		}

		 public function get_table_col_array($table_name,$colname,$colval)	
		{
		 	$query	=	'SELECT * FROM '.$table_name.' WHERE '.$colname.' = '.$colval;
		 	$result	=	$this->db->query($query);

		 	$response = array();
		 	$i=0;
		 	if($result->num_rows()>0)
		 	{
		 		foreach($result->result_array() as $row)
		 		{
		 			$response[$i] = $row;
		 			$i++;
		 		}	
		 	}

		 	return $response;
		 }

		function upload_files($path, $param_name) {
			$ret = array();
			
			if(isset($_FILES[$param_name]))
			{				
				$error =$_FILES[$param_name]["error"];
				//You need to handle  both cases
				//If Any browser does not support serializing of multiple files using FormData() 
				if(!is_array($_FILES[$param_name]["name"])) //single file
				{
			 	 	$fileName = $_FILES[$param_name]["name"];
			 		move_uploaded_file($_FILES[$param_name]["tmp_name"],$path.$fileName);
			    	$ret[0]= $fileName;
				}
				else  //Multiple files, file[]
				{
				  $fileCount = count($_FILES[$param_name]["name"]);
				  for($i=0; $i < $fileCount; $i++)
				  {
				  	$fileName = $_FILES[$param_name]["name"][$i];
					move_uploaded_file($_FILES[$param_name]["tmp_name"][$i],$path.$fileName);
				  	$ret[$i]= $fileName;
				  }
				
				}
			    return json_encode($ret);
			}
			else
			{
				return json_encode($ret);
			}
		}

		public function upload_dir($path) {
			if (!is_dir($path)) {
				if (mkdir($path, 0777, true)) {
					return "Directory created successfully.";
				} else {
					return "Failed to create directory.";
				}
			} else {
				return "Directory already exists.";
			}
		}
		

		public function generate_id($prefix, $table_name, $column_name, $length) {
			$this->db->select_max($column_name);
			$query = $this->db->get($table_name);
			$result = $query->row_array();
			$max_id = $result[$column_name];
			if ($max_id === null) {
				$max_id = 0;
			}
			$max_id++;
			$formatted_id = $prefix . str_pad($max_id, $length - strlen($prefix), '0', STR_PAD_LEFT);
			return $formatted_id;
		}

		public function get_column_names($table_name) {
			return $this->db->list_fields($table_name);
		}

		public function get_data_array($table_name) {
			$this->db->where('status', 'active');
			$this->db->order_by('name', 'ASC');
			$query = $this->db->get($table_name);
			return $query->result_array();
		}

		public function get_active_branches() {
			$this->db->where('status', 'active');
			$this->db->order_by('branch_name', 'ASC');
			$query = $this->db->get('ins_branch');
			return $query->result_array();
		}
	}
?>