<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PanaceaSoft Authentication
 */
class PS_Mail {

	// codeigniter instance
	protected $CI;

	/**
	 * Load CI Instances
	 */
	function __construct()
	{
		// get CI instance
		$this->CI =& get_instance();

		// load mail library
		$this->CI->load->library( 'email', array(
       		'mailtype'  => 'html',
        	'newline'   => '\r\n'
		));
	}

	/**
	 * Sends a from admin.
	 *
	 * @param      <type>  $to       { parameter_description }
	 * @param      <type>  $subject  The subject
	 * @param      <type>  $msg      The message
	 *
	 * @return     <type>  ( description_of_the_return_value )
	 */
	function send_from_admin( $to, $subject, $msg ) 
	{
		
			// get system admin email
			$from = 'abinaya@softcraftsystems.com';

			$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => '465',
		    'smtp_user' => 'abinaya@softcraftsystems.com', //sender@blog.panacea-soft.com //azxcvbnm
		    'smtp_pass' => 'Abinayasoftcraft@123',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
			
			$this->CI->load->library('email', $config);
			$this->CI->email->set_newline("\r\n");

			// Set to, from, message, etc.
			$this->CI->email->from($from,'Ongarakudil');
	        $this->CI->email->to($to); 

	        $this->CI->email->subject($subject);
	        $this->CI->email->message($msg); 
		$this->CI->email->send();
			echo $this->email->print_debugger();
			//return $this->CI->email->send();
		
		
	}

	/**
	 * Send Email
	 *
	 * @param      <type>   $from       The from
	 * @param      <type>   $to         { parameter_description }
	 * @param      <type>   $subject    The subject
	 * @param      <type>   $msg        The message
	 * @param      boolean  $from_name  The from name
	 *
	 * @return     <type>   ( description_of_the_return_value )
	 */
	function send( $to, $subject, $msg, $from, $from_name = false )
	{
		// Sender Information
		$this->CI->email->from( $from, $from_name );
		
		// Receiver Information
		$this->CI->email->to( $to ); 

		// Subject
		$this->CI->email->subject( $subject );

		// msg
		$this->CI->email->message( $msg );	

		// Send Email
		return $this->CI->email->send();
	}
}