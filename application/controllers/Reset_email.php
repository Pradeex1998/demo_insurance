<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reset_email extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model', 'auth_model');
		
	}
	public function reset($id=0){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$result = false;
				$data['reset_code'] = $id;
				$data['title'] = 'Reset Password';
				$this->load->view('appforgot',$data);
			}   
			else{
				
				
				$new_password = sha1($this->input->post('password'));
				$upquery	=	'UPDATE app_user set  password = \''.$new_password.'\',password_reset_code = "" WHERE password_reset_code = \''.$id.'\'';
				$exsequery	=	$this->db->query($upquery);
				if($id != 'expired' && $id != 'success' )
				{
					$this->session->set_flashdata('success', 'New password has been Updated successfully');	
					redirect(base_url('reset_email/reset/1'));
				}
				else
				{
					$this->session->set_flashdata('error','Password Reset Code is either invalid or expired.');
					redirect(base_url('reset_email/reset/2'));
				}
				
			}
		}
		else{
			if($id == 1)
			{
				$data['reset_code'] = 'success';
				$data['title'] = 'Reset Password';
				$this->load->view('appforgot',$data);
			}
			else if($id == 2)
			{
				$data['msg'] = 'Password Reset Code is either invalid or expired.';
				$data['reset_code'] = 'expired';
				$data['title'] = 'Reset Password';
				$this->load->view('appforgot',$data);
			}
			
			else
			{
				$result = $this->auth_model->check_password_reset_codeapp($id);
				if($result){
					$data['reset_code'] = $id;
					$data['title'] = 'Reset Password';
					$this->load->view('appforgot',$data);
				}
				else{
					$this->session->set_flashdata('error','Password Reset Code is either invalid or expired.');
					redirect(base_url('reset_email/reset/2'));
				}
			}
			
		}
	
	}
	//-------------------------------------------------------------------------
	public function index(){


		

		
	}
	//-------------------------------------------------------------------------	
	public function login(){
		if($this->input->post('submit')){
		    
		    // for google recaptcha
    		if ($this->auth_model->check_recaptcha_status() == true) {
                if (!$this->recaptcha_verify_request()) {
                    $this->session->set_flashdata('form_data', $this->input->post());
                    $this->session->set_flashdata('warning', 'reCaptcha Error');
                    redirect(base_url('auth/login'));
                    exit();
                }
            }
        
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('auth/login');
			}
			else {
				$data = array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
				);
				$data = $this->security->xss_clean($data);
				$result = $this->auth_model->login($data);
				if($result){
					if($result['is_verify'] == 0){
			    		$this->session->set_flashdata('warning', 'Please verify your email address!');
						redirect(base_url('auth/login'));
						exit;
			    	}
					if($result['is_admin'] == 1){
						$admin_data = array(
							'admin_id' => $result['id'],
							'name' => $result['firstname'],
							'is_admin_login' => TRUE
						);
						$this->session->set_userdata($admin_data);

						// Add User Activity
						$this->activity_model->add(4);

						redirect(base_url('admin/dashboard'), 'refresh');
					}
					else if ($result['is_admin'] == 0)
					{
						$admin_data = array(
							'admin_id' => $result['id'],
							'name' => $result['firstname'],
							'is_admin_login' => FALSE
						);
						$this->session->set_userdata($admin_data);

						// Add User Activity
						$this->activity_model->add(4);

						redirect(base_url('admin/dashboard'), 'refresh');

						// $user_data = array(
						// 	'user_id' => $result['id'],
						// 	'name' => $result['firstname'],
						// 	'is_user_login' => TRUE
						// );
						// $this->session->set_userdata($user_data);

						// // Add User Activity
						// $this->activity_model->add(4);

						// redirect(base_url('user/profile'), 'refresh');
					}
				}
				else{
					$data['msg'] = 'Invalid Email or Password!';
					$this->load->view('auth/login', $data);
				}
			}
		}
		else{
			$data['title'] = 'Login';
			$this->load->view('auth/login');
		}
	}	

	//-------------------------------------------------------------------------
	public function register(){
		if($this->input->post('submit')){
		    
		    // for google recaptcha
    		if ($this->auth_model->check_recaptcha_status() == true) {
                if (!$this->recaptcha_verify_request()) {
                    $this->session->set_flashdata('form_data', $this->input->post());
                    $this->session->set_flashdata('warning', 'reCaptcha Error');
                    redirect(base_url('auth/register'));
                    exit();
                }
            }
            
			$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[ci_users.username]');
			$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[ci_users.email]|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$data['title'] = 'Create an Account';
				$this->load->view('auth/register', $data);
			}
			else{
				$data = array(
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
					'is_active' => 1,
					'is_verify' => 0,
					'token' => md5(rand(0,1000)),    
					'last_ip' => '',
					'created_at' => date('Y-m-d : h:m:s'),
					'updated_at' => date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->auth_model->register($data);
				if($result){
					//sending welcome email to user
					$name = $data['firstname'].' '.$data['lastname'];
					$email_verification_link = base_url('auth/verify/').'/'.$data['token'];
					$body = $this->mailer->Tpl_Registration($name, $email_verification_link);
					$this->load->helper('email_helper');
					$to = $data['email'];
					$subject = 'Activate your account';
					$message =  $body ;
					$email = sendEmail($to, $subject, $message, $file = '' , $cc = '');
					$email = true;
					if($email){
						$this->session->set_flashdata('success', 'Your Account has been made, please verify it by clicking the activation link that has been send to your email.');	
						redirect(base_url('auth/login'));
					}	
					else{
						echo 'Email Error';
					}
				}
			}
		}
		else{
			$data['title'] = 'Create an Account';
			$this->load->view('auth/register', $data);
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
	public function forgot_password(){
		if($this->input->post('submit')){
		    
		    // for google recaptcha
    		if ($this->auth_model->check_recaptcha_status() == true) {
                if (!$this->recaptcha_verify_request()) {
                    $this->session->set_flashdata('form_data', $this->input->post());
                    $this->session->set_flashdata('warning', 'reCaptcha Error');
                    redirect(base_url('auth/forgot_password'));
                    exit();
                }
            }
            
			//checking server side validation
			$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('auth/forget_password');
				return;
			}
			$email = $this->input->post('email');
			$response = $this->auth_model->check_user_mail($email);
			if($response){
				$rand_no = rand(0,1000);
				$pwd_reset_code = md5($rand_no.$response['id']);
				$this->auth_model->update_reset_code($pwd_reset_code, $response['id']);
				// --- sending email
				$name = $response['firstname'].' '.$response['lastname'];
				$email = $response['email'];
				$reset_link = base_url('auth/reset-password/'.$pwd_reset_code);
				$body = $this->mailer->Tpl_PwdResetLink($name,$reset_link);

				$this->load->helper('email_helper');
				$to = $email;
				$subject = 'Reset your password';
				$message =  $body ;
				$email = sendEmail($to, $subject, $message, $file = '' , $cc = '');
				if($email){
					$this->session->set_flashdata('success', 'We have sent instructions for resetting your password to your email');

					redirect(base_url('auth/forgot-password'));
				}
				else{
					$this->session->set_flashdata('error', 'There is the problem on your email');
					redirect(base_url('auth/forgot-password'));
				}
			}
			else{
				$this->session->set_flashdata('error', 'The Email that you provided are invalid');
				redirect(base_url('auth/forgot-password'));
			}
		}
		else{
			$data['title'] = 'Forget Password';
			$this->load->view('auth/forget_password',$data);	
		}
	}

	//--------------------------------------------------		
	public function reset_password($id=0){
		// check the activation code in database
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$result = false;
				$data['reset_code'] = $id;
				$data['title'] = 'Reseat Password';
				$this->load->view('auth/reset_password',$data);
			}   
			else{
				$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				$this->auth_model->reset_password($id, $new_password);
				$this->session->set_flashdata('success','New password has been Updated successfully.Please login below');
				redirect(base_url('auth/login'));
			}
		}
		else{
			$result = $this->auth_model->check_password_reset_code($id);
			if($result){
				$data['reset_code'] = $id;
				$data['title'] = 'Reseat Password';
				$this->load->view('auth/reset_password',$data);
			}
			else{
				$this->session->set_flashdata('error','Password Reset Code is either invalid or expired.');
				redirect(base_url('auth/forgot-password'));
			}
		}
	}

	//-------------------------------------------------------------------------
	public function profile(){
		if($this->input->post('submit')){
			$data = array(
				'username' => $this->input->post('username'),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'mobile_no' => $this->input->post('mobile_no'),
				'updated_at' => date('Y-m-d : h:m:s'),
			);
			$data = $this->security->xss_clean($data);
			$result = $this->auth_model->update_admin($data);
			if($result){

				// Add User Activity
				$this->activity_model->add(6);

				$this->session->set_flashdata('msg', 'Profile has been Updated Successfully!');
				redirect(base_url('auth/profile'), 'refresh');
			}
		}
		else{
			$data['admin'] = $this->auth_model->get_admin_detail();
			$data['title'] = 'User Profile';
			$data['view'] = 'auth/profile';
			$this->load->view('layout', $data);
		}
	}
	//-------------------------------------------------------------------------
	public function change_pwd(){
		$id = $this->session->userdata('admin_id');
		if($this->input->post('submit')){
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');
			if ($this->form_validation->run() == FALSE) {
				$data['admin'] = $this->auth_model->get_admin_detail();
				$data['view'] = 'auth/profile';
				$this->load->view('layout', $data);
			}
			else{
				$data = array(
					'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
				);
				$data = $this->security->xss_clean($data);
				$result = $this->auth_model->change_pwd($data, $id);
				if($result){

					// Add User Activity
					$this->activity_model->add(7);

					$this->session->set_flashdata('msg', 'Password has been changed successfully!');
					redirect(base_url('auth/profile'));
				}
			}
		}
		else{
			$data['title'] = 'Change Password';
			$data['view'] = 'auth/change_pwd';
			$this->load->view('layout', $data);
		}
	}
	//-------------------------------------------------------------------------
	public function logout(){
		// Add User Activity
		$this->activity_model->add(5);

		$this->session->sess_destroy();
		redirect(base_url('auth/login'), 'refresh');
	}
	
	//verify recaptcha
    public function recaptcha_verify_request()
    {
        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) && $response['success'] === true) {
                return true;
            }
        }
        return false;
    }

}  // end class


?>