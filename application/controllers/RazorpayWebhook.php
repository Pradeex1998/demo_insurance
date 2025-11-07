<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('vendor/razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
class RazorpayWebhook extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary libraries or models if required
    }

    public function handleWebhook() {
        // Retrieve the raw POST data from Razorpay
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        // Your custom webhook handling logic here
        // Example: Log data to a file
        $account_id = $data['account_id'];
        $event = $data['event'];
        $amount = $data['payload']['payment']['entity']['amount'];
        $status = $data['payload']['payment']['entity']['status'];
        $payment_id = $data['payload']['payment']['entity']['id'];
        $order_id = $data['payload']['payment']['entity']['order_id'];
        $method = $data['payload']['payment']['entity']['method'];
        $email = $data['payload']['payment']['entity']['email'];
        $contact = $data['payload']['payment']['entity']['contact'];
        $name = $data['payload']['payment']['entity']['notes']['name'];
        if($event == 'payment.captured' && $order_id !='')
        {
            $this->db->where('order_id', $order_id);
            $query = $this->db->get('donation_webhook_entry');

            // Check if there are rows with status 0
            if ($query->num_rows() == 0) {
        	// Insert data into the 'payments' table
    	        $insert_data = array(
    	            'account_id' => $account_id,
    	            'amount' => $amount,
    	            'payment_id'=>$payment_id,
    	            'order_id' => $order_id,
    	            'email' => $email,
    	            'mobile' => $contact,
    	            'method' => $method,
    	            'name' => $name
    	        );

    	        $this->db->insert('donation_webhook_entry', $insert_data);
                $this->processdonations();
            }
        }
        

        // Respond with a 200 OK status
        //http_response_code(200);
    }
     public function processdonations() {
        // Select entries with status 0
        $this->db->where('status', 0);
        $query = $this->db->get('donation_webhook_entry');

        // Check if there are rows with status 0
        if ($query->num_rows() > 0) {
            $entries = $query->result();

            // Loop through the entries and update the status to 1
            foreach ($entries as $entry) {
                
                $data = array(
                'transaction_id'     => $entry->order_id,'payment_id'=>$entry->payment_id,);
                $url = 'https://www.agathiar.in/agathiar_staging/wp-json/generatepress/v1/check_transaction?' . http_build_query($data);
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_HTTPGET, true);

                curl_setopt($curl, CURLOPT_RETURNTRANSFER,
                 
                true);
                curl_setopt($curl, CURLOPT_VERBOSE, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));


                $response = curl_exec($curl);

                $response_data = json_decode($response, true);


                curl_close($curl); // Close the curl handle after successful processing
                if (isset($response_data['success'])) {
                    if ($response_data['is_donation'])
                    {
                         $this->db->where('id', $entry->id); // Assuming 'id' is the primary key
                        $this->db->update('donation_webhook_entry', array('status' => 1));
                        
                    }
                    else {
                        
                        
                    }
                    
                } else {
                   
                }

                
            }

            echo "Entries processed successfully.";
        } else {
            echo "No entries with status 0 found.";
        }
    }
    
    public function update_authtocap_donation()
    {
        $date_time1 = strtotime(date('Y-m-01'));
        $givenDate = date('Y-m-d');
        $nextDate = date("Y-m-d", strtotime("+1 day", strtotime($givenDate)));
        $date_time2 = strtotime($nextDate);
            
            
        $api = new Api('rzp_live_Dnj2s8jO5xgtnU', '5zWx2dSeojY4KMvKJ6UAwGob');
        try {
                    $collection = $api->payment->all(array(
                'count' => 100,
                'from' =>$date_time1,
                'to' => $date_time2,

            ));
                $payments = $collection->items;
                
        }
        catch(Exception $e)
        {
            
            $payments =[];

        }
        foreach ($payments as $payment) {
            if($payment->status == 'authorized' && $payment->order_id == '')
            {
                $api = new Api('rzp_live_Dnj2s8jO5xgtnU', '5zWx2dSeojY4KMvKJ6UAwGob');

                try {
                    $don_capture = $api->payment->fetch($payment->id)->capture(array('amount' => $payment->amount, 'currency' => 'INR'));
                } catch (Exception $e) {
                    
                }
            }

        }
    }

    
}
