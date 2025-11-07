<?php
#[\AllowDynamicProperties]
class Datatable 
{	
	function __construct()
	{
		$this->obj =& get_instance();
	}
	//--------------------------------------------
	function LoadJson($SQL,$EXTRA_WHERE='',$GROUP_BY='')
	{		
		if(!empty($EXTRA_WHERE))
		{
			$SQL.= " WHERE ( $EXTRA_WHERE )";
		}
		else
		{
			$SQL.= " WHERE (1)";
		}
		// print_r($SQL);
		$query = $this->obj->db->query($SQL);
		$total = $query->num_rows();
		//------------------------------------------------
		if(!empty($_GET['search']['value']))
		{
			$qry = array();
			foreach($_GET['columns'] as $cl)
			{
				if($cl['searchable']=='true' && $cl['name'] !='' )
				{	
					$column_name = $cl['name'];
					if (strpos($column_name, '*') !== false) {
						$arr_cols = explode('*',$column_name);
						// print_r($column_name);exit();
						foreach($arr_cols as $clname)						
						{
							$qry[] =" ".$clname." like '%".$_GET['search']['value']."%' ";
						}
					}
					else{
						$qry[] =" ".$cl['name']." like '%".$_GET['search']['value']."%' ";
					}					
				}
			}
			
			$SQL.= "AND ( ";
			$SQL.= implode("OR",$qry);
			$SQL.= " ) ";	
		}
        //------------------------------------------------
		if(!empty($GROUP_BY))
		{
			$SQL.= $GROUP_BY;
		}
		// echo "string - ".$SQL;
	 	//------------------------------------------------
		$query = $this->obj->db->query($SQL);
		$filtered = $query->num_rows();

		// print_r($_GET); exit();

		$SQL.= " ORDER BY id desc";
		// $SQL.= $_GET['columns'][$_GET['order'][0]['column']]['name']." ";
		// $SQL.= $_GET['order'][0]['dir'];
		$SQL.= " LIMIT ".$_GET['length']." OFFSET ".$_GET['start']." ";

		// echo "string - ".$SQL;
		$query = $this->obj->db->query($SQL);		
		$data = $query->result_array();

		$offset = $_GET['start'];
		
		return array("recordsTotal"=>$total,"recordsFiltered"=>$filtered,'data' => $data, 'offset'=> $offset);
	}	
}
?>