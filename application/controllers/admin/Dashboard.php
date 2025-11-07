<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once('vendor/razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
class Dashboard extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/dashboard_model','dashboard_model');
	}

	public function index(){

		// var_dump($this->general_settings); exit();
		// $data['all_users']      = $this->dashboard_model->get_all_users();
		// $data['active_users']   = $this->dashboard_model->get_active_users();
		// $data['deactive_users'] = $this->dashboard_model->get_deactive_users();
		// $data['events']         = $this->dashboard_model->get_events();
		// $data['room_req']         = $this->dashboard_model->get_activeroomrequest();
		// $data['suvadi']         = $this->dashboard_model->get_suvadi();
		// $data['blessingtime']   = $this->dashboard_model->get_blessingtime();
		// $data['pend_donweb']   = $this->dashboard_model->get_pend_donation_web();
		// $data['announcement']   = $this->dashboard_model->get_announcements();
		// $data['todaydonation']                = $this->dashboard_model->get_todaydon();
        // $data['thisweekdonation']             = $this->dashboard_model->get_thisweekdon();
        // $data['thismonthdonation']            = $this->dashboard_model->get_thismondon();
        // $data['thisquarterdonation']          = $this->dashboard_model->get_thisquatdon();
        // $data['lastsixmonthsdonation']        = $this->dashboard_model->get_lastsixdon();
        // $data['thisyeardonation']             = $this->dashboard_model->get_thisyeardon();

        // $data['todaysubscription']            = $this->dashboard_model->get_todaysub();
        // $data['thisweeksubscription']         = $this->dashboard_model->get_thisweeksub();
        // $data['thismonthsubscription']        = $this->dashboard_model->get_thismonsub();
        // $data['thisquartersubscription']      = $this->dashboard_model->get_thisquatsub();
        // $data['lastsixmonthssubscription']    = $this->dashboard_model->get_lastsixsub();
        // $data['thisyearsubscription']         = $this->dashboard_model->get_thisyearsub();
		// $data['donation_list'] 	= $this->dashboard_model->get_donationdata();
		// $data['subscription_list'] 	= $this->dashboard_model->get_subscriptiondata();
		// $data['razorpaydon_list'] 	= $this->get_razdon();
		// $data['title'] = 'Dashboard';
		// $data['view'] = 'admin/dashboard/index';
		// $this->load->view('layout', $data);
		redirect('auth/login');
	}
	
	public function get_razdon()
	{
		$api = new Api('rzp_live_Dnj2s8jO5xgtnU', '5zWx2dSeojY4KMvKJ6UAwGob');
		try {
					$collection = $api->payment->all(array(
			    'count' => 10,

			));
				$payments = $collection->items;
				
		}
		catch(Exception $e)
		{
			
			$payments =[];

		}
		$paymentData = [];
		foreach ($payments as $payment) 
		{
			
			
			$notes = $payment->notes;
			$name = '';
			$arr = $notes->toArray();
			if(isset($arr['name']))
			{
				$name = $arr['name'];
			}

		    $paymentData[] = [
		        'id' => $payment->id,
		        'entity' => $payment->entity,
		        'date'=>date('d-m-Y H:i', $payment->created_at),
		        'amount' => $payment->amount,
		        'currency' => $payment->currency,
		        'status' => $payment->status,
		        'name' => $name,
		        'mobile' =>  $payment->contact,
		        'email' =>  $payment->email,
		        'order_id' =>$payment->order_id,
		        // ... other properties you want to extract
		    ];
			
			
		}
		return $paymentData;
	}


	public function settings()
	{
		
		$postdata = array();
		$postdata['title'] = 'Settings';
		
		$app_details = array();
		
		$app_details = $this->dashboard_model->get_settings();	

		$data['title'] = 'Settings';
		$data['view'] = 'admin/settings';
		$data['app_details'] = $app_details;
		
		$this->load->view('layout',$data);
	}
	function submit_settings()
	{
		$id = '';

		foreach($_POST as $key => $val)  
		{  
			if($key !='submit')
			{
				$postdata[$key] = $this->input->post($key);
			}
			

			if($key=='id')
			{
				$id = $this->input->post($key);
			}
			
		}

		$response = NULL;
		$message = '';

		$status = $this->dashboard_model->add_settings($postdata,$id);
		if($status)
		{
			$message	=	'Settings addition/update successful.';
			
		}
		else
		{
			$message	=	'Settings addition/update failed.'.$status;
			
		}

		$this->session->set_flashdata('msg', $message);
			redirect(base_url('admin/dashboard/settings'));
	}
}
?>