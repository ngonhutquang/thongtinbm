<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Email extends MY_Controller {
		public function __construct(){
			parent::__construct();




		}


		public function send_email	 (){
			 //$email = $this->input->post('email');

		    $config = Array(
		        'protocol' => 'smtp',
		        'smtp_host' => 'mail.how2qa.com',
		        'smtp_port' => 587,
		        'smtp_user' => 'nlstech@mail.how2qa.com',
		        'smtp_pass' => '123456',
		        'mailtype'  => 'html', 
		        'charset' => 'utf-8',
		        'wordwrap' => TRUE
		    );            

		    /* 
		    *
		    * Send email with #temp_pass as a link
		    *
		    */

		    $this->load->library('email', $config);
		    $this->email->set_newline("\r\n");
		    $this->email->from('nlstech@mail.how2qa.com', "LYLY");
		    $this->email->to('phulong95@gmail.com');
		    $this->email->subject("VIP");
		    $data = array ("userName"=>'Mr.Long');

		    $body = $this->load->view('email/template',$data,TRUE);

 			 $this->email->message($body); 

		   // $message = "<p>Your Account ************</p>";
		    //$this->email->message($message);
		    $result = $this->email->send();
		    pre($result);
			
		}


		public function send_email2 (){
			 //$email = $this->input->post('email');

		    $config = Array(
		        'protocol' => 'smtp',
		        'smtp_host' => 'smtp.gmail.com',
		        'smtp_port' => 587,
		        'smtp_user' => 'dathuynh.tech@gmail.com',
		        'smtp_pass' => 'nlstech888',
		        'mailtype'  => 'html', 
		        'smtp_crypto' => 'tls', 
		        'charset' => 'utf-8',
		        'wordwrap' => TRUE
		    );            

		    /* 
		    *
		    * Send email with #temp_pass as a link
		    *
		    */

		    $this->load->library('email', $config);
		    $this->email->set_newline("\r\n");
		    $this->email->from('phulong9517@gmail.com', "LYLY");
		    $this->email->to('phulong95@gmail.com');
		    $this->email->subject("VIP");
		    $data = array ("userName"=>'Mr.Long');

		    $body = $this->load->view('email/template',$data,TRUE);

 			 $this->email->message($body); 

		   // $message = "<p>Your Account ************</p>";
		    //$this->email->message($message);
		    $result = $this->email->send();
		    pre ($result);
			
		}
		
		

		
	}
?>