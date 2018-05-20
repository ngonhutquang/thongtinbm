<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Authorization extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Student_Model');
		$this->load->model('Teacher_Model');
		$this->load->model('Account_Model');
		



	}


	public function validation_category () {

		$this->form_validation->set_rules('username', '', 'required');
		$this->form_validation->set_rules('password', '', 'required');


		//$this->form_validation->set_rules('password', '', 'required|min_length[8]');	


	}

	public  function login  () {

		return $this->load->view('login');

	}

	public function author () {
		$data = $this->input->post();
		$input_account = $this->input->post('account');
		$password_submit = $this->input->post('password');
		$error = null;
		$flag = false;
		

		 $account = $this->Account_Model->get_info_rule (array('account'=>$input_account));


		 	if ($account!= NULL) {
		 		$password = $account->password;
		 		$result = password_verify($password_submit,$password);
		 		if ($result) {
		 			$account_status = $account->status;

		 		if ($account_status == 1 ){		 
		 				  
				 $student = $this->Student_Model->get_info_rule (array('code'=>$input_account));
				 $this->unset_session();
		 		 $this->session->set_userdata('student_data',$student);
		 		 redirect (base_url()."Student");
		 		}
		 		if ($account_status == 2 ){	 
		 			  
				 $teacher = $this->Teacher_Model->get_info_rule (array('code'=>$input_account));
				  $this->unset_session();	
				 $this->session->set_userdata('teacher_data',$teacher);
				 	 redirect (base_url()."Teacher");
		 		}
		 		if ($account_status == 3 ){		
		 				  
				 $admin ="admin";
				  $this->unset_session();	
		 		 $this->session->set_userdata('admin_data',$admin);
		 		 redirect (base_url()."admin/teacher-manager");
		 		}
		 		
			 } else {
			 	$error = "Tai khoan hoac mat khau khong dung";
			 	 redirect (base_url()."Authorization/login");
			 }

		 	} else {

		 			$error = "Tai khoan hoac mat khau khong dung";
		 			redirect (base_url()."Authorization/login");

		 	}





	
		


		


	}

	public function unset_session () {
		
		$this->session->unset_userdata('student_data');
		$this->session->unset_userdata('teacher_data');
		$this->session->unset_userdata('admin_data');


	}

	public function logout () {
		$this->session->sess_destroy();

		redirect(base_url(), 'refresh');


	}


	public function forgot_password () {
		$this->load->view ('forgot_password');

	}

	public function get_password () {
		$this->form_validation->set_rules('admin_username', '', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			return $this->load->view ('forgot_password');
		} else {

			$input_admin_username = $this->input->post('admin_username');
			
			$admin_username  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'admin_username'))->config_value;

			if ($input_admin_username != $admin_username ) {

				$data = array('result'=>"This email has not register.");
				return $this->load->view ('forgot_password',$data);

			} else {
				$code = rtrim(base64_encode(md5(microtime())),"=");

				if ($this->Site_Config_Model->update_rule(array('config_name' =>'code_change_pass'),array('config_value' =>$code))){

					$url = base_url("authorization/set_new_password/".$code);
					$content = array('userName'=>$admin_username,'url'=>$url);

					$rs = $this->send_email($admin_username,$content);			
					
					$data = array('result'=>"We have e-mailed your password reset link!");
					return $this->load->view ('forgot_password',$data);	
				}

			}			

		}


	}

	public function set_new_password ($code){
		
		$code_change_pass = $this->Site_Config_Model->get_info_rule(array('config_name'=>'code_change_pass'))->config_value;



		if ($code == $code_change_pass ) {
			$this->session->set_userdata('token_code',$code);
			$this->load->view('change_password');	


		} else {
			$this->load->view ("forgot_password");
		}


	}


	public function do_create_pass () {
		$token_code = $this->session->userdata('token_code');
		$code_change_pass = $this->Site_Config_Model->get_info_rule(array('config_name'=>'code_change_pass'))->config_value;
		if ($token_code == $code_change_pass){
			$newpass = md5($this->input->post('new_password'));
			if ($this->Site_Config_Model->update_rule(array('config_name' =>'admin_password'),array('config_value' =>$newpass))){

				$this->Site_Config_Model->update_rule(array('config_name' =>'date_change_pass'),array('config_value' =>date('yyyy-mm-dd')));							

				$data = array('result_change'=>"<script> alert ('Changed password successfully!') </script>");
				 $this->load->view ('login',$data);	
			}
		}
	}

	public function send_email ($admin_email,$body_data){
		$this->load->model("Site_Config_Model");
		$smtp_host = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_url'))->config_value;
		$smtp_username = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_username'))->config_value;
		$smtp_password = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_password'))->config_value;
			 //$email = $this->input->post('email');
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => $smtp_host,
			'smtp_port' => 587,
			'smtp_user' => $smtp_username,
			'smtp_pass' => $smtp_password,
			'smtp_crypto' => 'tls', 
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
		    $this->email->from($smtp_username, "NLSTECH support");
		    $this->email->to($admin_email);
		    $this->email->subject("Get password when forgot");

		    $body = $this->load->view('email/template',$body_data ,TRUE);

		    $this->email->message($body); 
		   // $message = "<p>Your Account ************</p>";
		    //$this->email->message($message);
		    $result = $this->email->send();
		    // return $result;
		}
		public function get_config(){    

			$admin_username  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'admin_username'));
			$admin_password  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'admin_password'));
			$smtp_username  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_username'));
			$smtp_password  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_password'));
			$logo  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'logo'));
			$favicon  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'favicon'));
			$meta_image  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'meta_image'));
			$page_title  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'page_title'));
			$smtp_url  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_url'));
			$contact_email  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'contact_email'));
			$page_title  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'page_title'));
	    // $code_change_pass  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'code_change_pass'));
	    // $date_change_pass  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'date_change_pass'));
	    // $code_login  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'code_login'));
			$configArr = array('meta_title' => $meta_title,'meta_keyword'=>$meta_keyword, 'meta_description'=>$meta_description, 'admin_username'=>$admin_username, 'admin_password'=>$admin_password,'smtp_username'=>$smtp_username,'smtp_password'=>$smtp_password,'logo'=>$logo,'favicon'=>$favicon,'page_title'=>$page_title,'meta_image'=>$meta_image,'contact_email'=>$contact_email,'smtp_url'=>$smtp_url);
			return $configArr;
		}



		// public function  test_email () {
		// 	$email = "phulong95@gmail.com";
		// 	$body = array ('userName' => "Long");
		// 	$this->send_email($email,$body);

		// 	//echo  "hello";


		// }
	}


	
	?>