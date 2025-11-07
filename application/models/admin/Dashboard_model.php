<?php
	class Dashboard_model extends CI_Model{

		public function get_all_users(){

			$month = date('F Y');
	        
	        // set start of month
	        $date = new DateTime($month);
	        $start_date = $date->format('Y-m-d G:i:s');
	        
	        // set end of month and time to last second of month 
	        $date->modify('last day of this month')->setTime(23,59,59);
	        $end_date = $date->format('Y-m-d G:i:s');
	        
	        //  do a search with dates
	        $count = $this->db->from('app_user')
            ->where('created_date >=', $start_date)
            ->where('created_date <=', $end_date)
            ->count_all_results();
        
        	return $count; 
		}
		public function get_active_users(){

			$count = $this->db->from('app_user')
            ->where('date(updated_date) BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()')
            ->count_all_results();
     
        	return $count; 
		}
		public function get_deactive_users(){

			$count = $this->db->from('app_user')
            ->where('date(updated_date) < date_sub(now(), interval 1 month)')
            ->count_all_results();
     
        	return $count; 
		}
		public function get_events(){

			$count = $this->db->from('event')
          
            ->count_all_results();
     
        	return $count; 
		}
		public function get_blessingtime(){

			$count = $this->db->from('visit_timing')
         
            ->count_all_results();
     
        	return $count; 
		}
		public function get_suvadi(){

			$count = $this->db->from('suvadi')
          
            ->count_all_results();
     
        	return $count; 
		}
		public function get_announcements(){
			
			$count = $this->db->from('announcement')
          
            ->count_all_results();
     
        	return $count; 
		}
		public function get_pend_donation_web()
		{
			$count = $this->db->from('donation_webhook_entry')
                  ->where('status', 0)
                  ->count_all_results();

			return $count;
		}
		public function get_activeroomrequest()
		{
			$this->update_roomreq_status();
			$count = $this->db->from('room_request')
                  ->where('status', '1')
                  ->count_all_results();

			return $count;

		}
		function update_roomreq_status()
		{

			$query	=	"UPDATE room_request
			SET status = 2
			WHERE DATEDIFF(NOW(), STR_TO_DATE(fromdatetime, '%d-%m-%Y %h:%i:%p')) >= no_of_days
			      AND status != 0";
			
			$query	=	$this->db->query($query);	
			

		}
		public function get_todaydon()
		{
			$this->db->select('*');
	        $this->db->from('donation_master');  // Replace 'your_table' with your actual table name
	        $this->db->where('DATE(created_datetime)', date('Y-m-d'));

	        // Execute the query
	        $query = $this->db->get();
	        $result = $query->result_array();
	        $todaycount = count($result);
			$todaytotal = 0;
		   foreach (  $result as $key => $value ) {
		      
		       $todaytotal += $value['amount'];
		    }
			
			$todaydonation = ['todaycount'=>$todaycount,'todaytotal'=>$todaytotal];
			return $todaydonation;
		}
		public function get_thisweekdon()
		{
			$this->db->select('*');
	        $this->db->from('donation_master');  // Replace 'donation_master' with your actual table name
	        $this->db->where("YEAR(created_datetime) = YEAR(NOW()) AND WEEK(created_datetime, 1) = WEEK(NOW(), 1)", null, false);

			

	        // Execute the query
	        $query = $this->db->get();

	        // Return the result as an array
	        $thisweekorders =  $query->result_array();
	        $thisweekcount = count($thisweekorders);
		    $thisweektotal = 0;
		   foreach ( $thisweekorders as $key => $value ) {
		       	
		        $thisweektotal +=  $value['amount'];
		    }
			$thisweekdonation = ['thisweekcount'=>$thisweekcount,'thisweektotal'=>$thisweektotal];
			return $thisweekdonation;

		}
		public function get_thismondon()
		{
			$this->db->select('*');
	        $this->db->from('donation_master');  // Replace 'donation_master' with your actual table name
	        $this->db->where("MONTH(created_datetime) = MONTH(NOW())", null, false);
	        $this->db->where("YEAR(created_datetime) = YEAR(NOW())", null, false);

	        // Execute the query
	        $query = $this->db->get();
	        $thismonthorders = $query->result_array();
		    $thismonthcount = count($thismonthorders);
		    $thismonthtotal = 0;
		   foreach ( $thismonthorders as $key => $value ) {
		       	
		        $thismonthtotal += $value['amount'];
		    }
		    $thismonthdonation = ['thismonthcount'=>$thismonthcount,'thismonthtotal'=>$thismonthtotal];
		    return $thismonthdonation;
		}
		public function get_thisquatdon()
		{
			 $this->db->select('*');
	        $this->db->from('donation_master');  // Replace 'donation_master' with your actual table name
	        $this->db->where("QUARTER(created_datetime) = QUARTER(NOW())", null, false);
	        $this->db->where("YEAR(created_datetime) = YEAR(NOW())", null, false);

	        // Execute the query
	        $query = $this->db->get();
	        $thisquarterorders = $query->result_array();
	        $thisquartercount = count($thisquarterorders);
		    $thisquartertotal = 0;
		   foreach ( $thisquarterorders as $key => $value ) {
		       
		        $thisquartertotal += $value['amount'];
		    }

			$thisquarterdonation = ['thisquartercount'=>$thisquartercount,'thisquartertotal'=>$thisquartertotal];
			return $thisquarterdonation;
		}
		public function get_lastsixdon()
		{
			$this->db->select('*');
			$this->db->from('donation_master');  // Replace 'donation_master' with your actual table name

			// Get the current month and year
			$currentMonth = date('m');
			$currentYear = date('Y');

			// Calculate the last month and year
			$lastMonth = ($currentMonth == 1) ? 12 : $currentMonth - 1;
			$lastYear = ($lastMonth == 12) ? $currentYear - 1 : $currentYear;

			// Build the WHERE clause for last month's data
			$this->db->where('MONTH(created_datetime)', $lastMonth);
			$this->db->where('YEAR(created_datetime)', $lastYear);

			// Execute the query
			$query = $this->db->get();
	        // Return the result as an array
	        
	         $lastsixmonthsorders =  $query->result_array();
		    $lastsixmonthscount = count($lastsixmonthsorders);
		    $lastsixmonthstotal = 0;
		   foreach ( $lastsixmonthsorders as $key => $value ) {
		       
		        $lastsixmonthstotal +=  $value['amount'];
		    }
		    $lastsixmonthsdonation = ['lastsixmonthscount'=>$lastsixmonthscount,'lastsixmonthstotal'=>$lastsixmonthstotal];
		    return $lastsixmonthsdonation;
		}
		public function get_thisyeardon()
		{
			$this->db->select('*');
	        $this->db->from('donation_master');  // Replace 'donation_master' with your actual table name
	        $this->db->where("YEAR(created_datetime) = YEAR(NOW())", null, false);

	        // Execute the query
	        $query = $this->db->get();

	        // Return the result as an array
	         
	         $thisyearorders =$query->result_array();
		    $thisyearcount = count($thisyearorders);
		    $thisyeartotal = 0;
		   foreach ( $thisyearorders as $key => $value ) {
		        $thisyeartotal +=  $value['amount'];
		    }
		    $thisyeardonation = ['thisyearcount'=>$thisyearcount,'thisyeartotal'=>$thisyeartotal];
			return $thisyeardonation;
		}
		




		public function get_todaysub()
		{
			$this->db->select('*');
	        $this->db->from('subscription_master');  // Replace 'your_table' with your actual table name
	        $this->db->where('DATE(created_datetime)', date('Y-m-d'));

	        // Execute the query
	        $query = $this->db->get();
	        $result = $query->result_array();
	        $todaycount = count($result);
			$todaytotal = 0;
		   foreach (  $result as $key => $value ) {
		      
		       $todaytotal += $value['amount'];
		    }
			
			$todaydonation = ['todaysubcount'=>$todaycount,'todaysubtotal'=>$todaytotal];
			return $todaydonation;
		}
		public function get_thisweeksub()
		{
			$this->db->select('*');
	        $this->db->from('subscription_master');  // Replace 'donation_master' with your actual table name
	        $this->db->where("WEEK(created_datetime, 1) = WEEK(NOW(), 1)", null, false);

	        // Execute the query
	        $query = $this->db->get();

	        // Return the result as an array
	        $thisweekorders =  $query->result_array();
	        $thisweekcount = count($thisweekorders);
		    $thisweektotal = 0;
		   foreach ( $thisweekorders as $key => $value ) {
		       	
		        $thisweektotal +=  $value['amount'];
		    }
			$thisweekdonation = ['thisweeksubcount'=>$thisweekcount,'thisweeksubtotal'=>$thisweektotal];
			return $thisweekdonation;

		}
		public function get_thismonsub()
		{
			$this->db->select('*');
	        $this->db->from('subscription_master');  // Replace 'donation_master' with your actual table name
	        $this->db->where("MONTH(created_datetime) = MONTH(NOW())", null, false);
	        $this->db->where("YEAR(created_datetime) = YEAR(NOW())", null, false);

	        // Execute the query
	        $query = $this->db->get();
	        $thismonthorders = $query->result_array();
		    $thismonthcount = count($thismonthorders);
		    $thismonthtotal = 0;
		   foreach ( $thismonthorders as $key => $value ) {
		       	
		        $thismonthtotal += $value['amount'];
		    }
		    $thismonthdonation = ['thismonthsubcount'=>$thismonthcount,'thismonthsubtotal'=>$thismonthtotal];
		    return $thismonthdonation;
		}
		public function get_thisquatsub()
		{
			 $this->db->select('*');
	        $this->db->from('subscription_master');  // Replace 'donation_master' with your actual table name
	        $this->db->where("QUARTER(created_datetime) = QUARTER(NOW())", null, false);
	        $this->db->where("YEAR(created_datetime) = YEAR(NOW())", null, false);

	        // Execute the query
	        $query = $this->db->get();
	        $thisquarterorders = $query->result_array();
	        $thisquartercount = count($thisquarterorders);
		    $thisquartertotal = 0;
		   foreach ( $thisquarterorders as $key => $value ) {
		       
		        $thisquartertotal += $value['amount'];
		    }

			$thisquarterdonation = ['thisquartersubcount'=>$thisquartercount,'thisquartersubtotal'=>$thisquartertotal];
			return $thisquarterdonation;
		}
		public function get_lastsixsub()
		{
			$this->db->select('*');
			$this->db->from('subscription_master');  // Replace 'donation_master' with your actual table name

			// Get the current month and year
			$currentMonth = date('m');
			$currentYear = date('Y');

			// Calculate the last month and year
			$lastMonth = ($currentMonth == 1) ? 12 : $currentMonth - 1;
			$lastYear = ($lastMonth == 12) ? $currentYear - 1 : $currentYear;

			// Build the WHERE clause for last month's data
			$this->db->where('MONTH(created_datetime)', $lastMonth);
			$this->db->where('YEAR(created_datetime)', $lastYear);

			// Execute the query
			$query = $this->db->get();

	        // Return the result as an array
	        
	         $lastsixmonthsorders =  $query->result_array();
		    $lastsixmonthscount = count($lastsixmonthsorders);
		    $lastsixmonthstotal = 0;
		   foreach ( $lastsixmonthsorders as $key => $value ) {
		       
		        $lastsixmonthstotal +=  $value['amount'];
		    }
		    $lastsixmonthsdonation = ['lastsixmonthssubcount'=>$lastsixmonthscount,'lastsixmonthssubtotal'=>$lastsixmonthstotal];
		    return $lastsixmonthsdonation;
		}
		public function get_thisyearsub()
		{
			$this->db->select('*');
	        $this->db->from('subscription_master');  // Replace 'donation_master' with your actual table name
	        $this->db->where("YEAR(created_datetime) = YEAR(NOW())", null, false);

	        // Execute the query
	        $query = $this->db->get();

	        // Return the result as an array
	         
	         $thisyearorders =$query->result_array();
		    $thisyearcount = count($thisyearorders);
		    $thisyeartotal = 0;
		   foreach ( $thisyearorders as $key => $value ) {
		        $thisyeartotal +=  $value['amount'];
		    }
		    $thisyeardonation = ['thisyearsubcount'=>$thisyearcount,'thisyearsubtotal'=>$thisyeartotal];
			return $thisyeardonation;
		}
		public function get_settings()
		{
			$sql = "SELECT * FROM app_settings WHERE id = 1 ";
			$query = $this->db->query($sql);
			if($query->num_rows())
			{
				$result = $query->result_array();
				return $result[0];	
			}
			else
			{
				return array();	
			}  
			
		
		}
		function add_settings($data, $id)
		{
			if($id=='') //add
			{
				//print_r($data);exit();
				$this->db->insert('app_settings',$data);
				return ($this->db->affected_rows() != 1) ? false : true;
			}
			else //edit-submit
			{
				//unset($data['id']); // remove a key and value from array
				$this->db->where('id', $id);
				$this->db->update('app_settings', $data);
				return ($this->db->affected_rows() != 1) ? false : true;
			}
		}
		public function get_donationdata()
		{
			$sql ='SELECT  dm.*,dd.donation_id,dd.address,dd.city,dd.email,dd.mobile_no,dd.district,dd.donor_name,dd.pin,dd.panaadhar,dd.occassion,dd.occassion_date ,dd.state FROM donation_master dm LEFT JOIN donation_detail dd ON (dd.donation_id = dm.id)  ';
			$sql .= ' GROUP BY dm.id order by dm.id desc Limit 10 ';
			$query = $this->db->query($sql);
			if($query->num_rows())
			{
				$result = $query->result_array();
				return $result;	
			}
			else
			{
				return array();	
			}  
			
		}
		public function get_subscriptiondata()
		{
			$sql =' SELECT  sm.*,sd.subscription_id,sd.address,sd.city,sd.email,sd.mobile_no,sd.district,sd.pin,sd.state,sd.name FROM subscription_master sm LEFT JOIN subscription_detail sd ON (sd.subscription_id = sm.id)  ';
			$sql .= ' WHERE 1= 1 AND sm.is_renewal != 1 AND sm.status = 1 ';
			
			$sql .= '  GROUP BY sm.id ORDER BY sm.id desc Limit 10 ';
			$query = $this->db->query($sql);
			if($query->num_rows())
			{
				$result = $query->result_array();
				return $result;	
			}
			else
			{
				return array();	
			}  
		}
		
	}

?>
