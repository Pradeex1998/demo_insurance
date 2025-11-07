<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Delete_account extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
		$this->load->model('auth_model', 'auth_model');
		$this->load->model('api/webservice_model','ws_model');
	}
	//-------------------------------------------------------------------------
	public function delete_acc(){


		if($this->input->post('submit')){
			
				
				$mob_no		=	$this->input->post('mobile_no');
				$code		=	$this->input->post('code');
				
				$is_otp_exists = $this->ws_model->check_otp_exists($mob_no,$code);
				
				if($is_otp_exists)
				{
					
					$is_otp_notexpiry = $this->ws_model->check_otp_expiry($mob_no,$code);
					if($is_otp_notexpiry)
					{

						$data= array(
						'mobile'		=>	$mob_no,
						
						'is_deleted'		=>	'1',
			            );
						$userdetails	=	$this->ws_model->delete_paneluser($data);
						$this->session->set_flashdata('warning' ,'');
						$this->session->set_flashdata('success','Your Account was Deleted !');
							$data['title'] = 'Delete Account';
							$this->load->view('send_otp',$data);
							
					}
					else
					{
						$this->session->set_flashdata('success' ,'');
						$this->session->set_flashdata('warning','OTP got Expired !.');
						$data['title'] = 'Delete Account';
						$this->load->view('send_otp',$data);
						
					}
				}
				else
				{

					$this->session->set_flashdata('success' ,'');
					$this->session->set_flashdata('warning','Invalid Otp');
					$data['title'] = 'Delete Account';
					$data['mobile_no'] = $mob_no;
					$this->load->view('appdelete',$data);
					
				}
			
		}
		else{
		$this->session->set_flashdata('success' ,'');
		$this->session->set_flashdata('warning' ,'');
		$data['mobile_no'] = '';
			$data['title'] = 'Delete Account';
			$this->load->view('appdelete',$data);
			
		}
	

		
	}
	function check_user()
	{
		$mob_no		=	$this->input->post('mobile_no');
		$isd_code		=	$this->input->post('isd_code');
		$isactive = $this->ws_model->check_useractivemob($mob_no);

		if($isactive && $mob_no !='' && $this->input->post('submit'))
		{

				$is_user_exists = $this->ws_model->check_user_exists($mob_no);
				if($is_user_exists)
				{
					$otpcode = $this->generateNumericOTP(4);
					$time = date("Y-m-d G:i:s", time() + 60);
					$insertotpcode = $this->ws_model->insert_otp($mob_no,$otpcode,$time);
					$sendsms = $this->send_onglappsms($mob_no,$otpcode,$isd_code);
					$this->session->set_flashdata('warning' ,'');
					$this->session->set_flashdata('success','OTP is sent to your Mobile number');
						$data['title'] = 'Delete Account';
						$data['mobile_no'] = $mob_no;
					$this->load->view('appdelete',$data);

				}
				else
				{
					$this->session->set_flashdata('success' ,'');
					$this->session->set_flashdata('warning','Mobile Number not Registered');
						$data['title'] = 'Delete Account';
					$this->load->view('send_otp',$data);
					
				}
		}
		else
		{
			if($mob_no !='')
			{
				$this->session->set_flashdata('success' ,'');
				$this->session->set_flashdata('warning','Account not found!.Please Enter Valid Mobile Number');
			}
			$this->session->set_flashdata('success' ,'');
				$data['title'] = 'Delete Account';
			$this->load->view('send_otp',$data);
				
		}
		

	}
	public function send_onglappsms($mob_no,$otpcode,$isd_code)
	{
		if($isd_code)
		{
			$mob_no = $isd_code.$mob_no;
		}
		else
		{
			$mob_no = '91'.$mob_no;
		}
		$curl = curl_init();

        curl_setopt_array($curl, [
          CURLOPT_URL => "https://api.msg91.com/api/v5/flow/",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\n  \"flow_id\": \"64105001d6fc05249b0c7604\",\n  \"sender\": \"AGATHR\",\n  \"mobiles\": \"91$mob_no\",\n \"code\": \"$otpcode\"\n}",
          CURLOPT_HTTPHEADER => [
            "authkey: 251631A6s3XRvRXhQ5c120807",
            "content-type: application/JSON"
          ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
	}
	function generateNumericOTP($n) {
      
    
	    $generator = "1357902468";
	  
	  
	    $result = "";
	  
	    for ($i = 1; $i <= $n; $i++) {
	        $result .= substr($generator, (rand()%(strlen($generator))), 1);
	    }
	  
	    
	    return $result;
	}
	public function reset()
	{
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$data['title'] = 'Create an Account';
				$this->load->view('appforgot', $data);
			}
			else{
				$new_password = sha1($this->input->post('password'));
					$upquery	=	'UPDATE app_user set  password = \''.$new_password.'\' WHERE id = \''.$data['user_id'].'\'';
					$exsequery	=	$this->db->query($upquery);
					$this->session->set_flashdata('success', 'New password has been Updated successfully');	
						redirect(base_url('reset_email'));
			}
		}
		else{
			$data['title'] = 'Create an Account';
			$this->load->view('appforgot',$data);
		}
	}
	
	
	

	//----------------------------------------------------------	
	public function verify(){
		$verification_id = $this->uri->segment(3);
		$result = $this->auth_model->email_verification($verification_id);
		if($result){
			$this->session->set_flashdata('success', 'Your email has been verified, you can now login.');	
			redirect(base_url('auth/login'));
		}
		else{
			$this->session->set_flashdata('success', 'The url is either invalid or you already have activated your account.');	
			redirect(base_url('auth/login'));
		}	
	}

	//--------------------------------------------------		

}  // end class


?>