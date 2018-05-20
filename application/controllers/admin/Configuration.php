<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Configuration extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('Site_Config_Model');
		$this->load->library('upload');
	}


	public function index (){

		$content = "admin/configuration/Configuration";    

		// $config =  $this->db->get('site_config')->result();

		$data = array ('content'=>$content,'config'=>$this->get_config());      


		return $this->load->view ('admin/pages/index',$data);

	}

		public function admin_password (){

		$content = "admin/configuration/admin_password";    

		// $config =  $this->db->get('site_config')->result();

		$data = array ('content'=>$content,'config'=>$this->get_config());      


		return $this->load->view ('admin/pages/index',$data);

	}

		public function change_admin_password (){

			$admin_username = $this->input->post('admin_username');
			$admin_old_password =  md5($this->input->post('admin_old_password'));
			$admin_password = $this->input->post('admin_password');
			$admin_password = md5($admin_password);

			$password  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'admin_password'))->config_value;

			if ($admin_old_password == $password ) {

			if ($this->Site_Config_Model->update_rule(array('config_name' =>'admin_password'),array('config_value' =>$admin_password))) {

				$result ="<script> alert ('Update admin password success!'); </script>";
		$content = "admin/configuration/admin_password";    

		// $config =  $this->db->get('site_config')->result();

		$data = array ('content'=>$content,'config'=>$this->get_config(),'result'=>$result);      


		return $this->load->view ('admin/pages/index',$data);

			}
			} else {
				$result ="<script> alert ('Password incorrect!'); </script>";
		$content = "admin/configuration/admin_password";    

		// $config =  $this->db->get('site_config')->result();

		$data = array ('content'=>$content,'config'=>$this->get_config(),'result'=>$result);      


		return $this->load->view ('admin/pages/index',$data);
			}
	

	}

	public function get_config(){    

		$meta_title  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'meta-title'));
		$meta_keyword  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'meta-keyword'));
		$meta_description  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'meta-description'));
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


		public function update_config () {
		$data = $this->input->post();
		$admin_username = $this->input->post('admin_username');
		$admin_password = $this->input->post('admin_password');
		$contact_email = $this->input->post('contact_email');
		$smtp_url = $this->input->post('smtp_url');
		$smtp_username = $this->input->post('smtp_username');
		$smtp_password = $this->input->post('smtp_password');

		// echo $smtp_username ;



	
		$this->Site_Config_Model->update_rule(array('config_name' =>'admin_username'),array('config_value' =>$admin_username));

		$this->Site_Config_Model->update_rule(array('config_name' =>'contact_email'),array('config_value' =>$contact_email));

		$this->Site_Config_Model->update_rule(array('config_name' =>'smtp_url'),array('config_value' =>$smtp_url));		

		$this->Site_Config_Model->update_rule(array('config_name' =>'smtp_username'),array('config_value' =>$smtp_username));

		$this->Site_Config_Model->update_rule(array('config_name' =>'smtp_password'),array('config_value' =>$smtp_password));


		$content = "admin/configuration/Configuration";    

		// $config =  $this->db->get('site_config')->result();

		$data = array ('content'=>$content,'config'=>$this->get_config());


		$this->load->view ('admin/pages/index',$data);	

	}


	public function seo_on_page () {
		$error = array();
		$data = $this->input->post();
		$meta_title = $this->input->post('meta_title');
		$meta_keyword = $this->input->post('meta_keyword');
		$meta_description = $this->input->post('meta_description');
		$page_title = $this->input->post('page_title');

		// echo $meta_title.$meta_title.$meta_description;
        // Upload Image
		$config['upload_path'] = './public/Upload/site_image/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif|ico|svg';
		$config['max_size'] = '2048';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		 // $config['file_name'] = $file_id."_".$cv_id."_".date('Y-m-d h:i:sa')."_".$_FILES['attach_resume']['name'];
		

		$result_upload = array();

		
		if (isset($_FILES['meta_image']['name']) && $_FILES['meta_image']['name'] != '') {

			$config['file_name'] = "meta_image_".date('Y-m-d h:i:sa')."_".$_FILES['meta_image']['name'];
			$rs = $this->upload_file('meta_image',$config);

			if (!isset($rs['error'])) {	

				if ($this->Site_Config_Model->update_rule(array('config_name' =>'meta_image'),array('config_value' =>$rs['data']['file_name']))) {					
			}
				
			} else 
			{
				$result_upload['meta_image']= $rs['error'];
			}
		} 

		if (isset($_FILES['logo']['name']) && $_FILES['logo']['name'] != '') {

			$config['file_name'] = "logo".date('Y-m-d h:i:sa')."_".$_FILES['meta_image']['name'];
			$rs = $this->upload_file('logo',$config);

			if (!isset($rs['error'])) {	

				if ($this->Site_Config_Model->update_rule(array('config_name' =>'logo'),array('config_value' =>$rs['data']['file_name']))) {					
			}
				
			} else 
						{
				$result_upload['logo']= $rs['error'];
			}
		} 

		if (isset($_FILES['favicon']['name']) && $_FILES['favicon']['name'] != '') {

			$config['file_name'] = "favicon".date('Y-m-d h:i:sa')."_".$_FILES['favicon']['name'];
			$rs = $this->upload_file('favicon',$config);

			if (!isset($rs['error'])) {	

				if ($this->Site_Config_Model->update_rule(array('config_name' =>'favicon'),array('config_value' =>$rs['data']['file_name']))) {
					
			}
				
			} else 
			{
				$result_upload['favicon']= $rs['error'];
			}
		} 



		// pre($result_upload);	

		try {
			$this->Site_Config_Model->update_rule(array('config_name' =>'meta-title'),array('config_value' =>$meta_title));
			$this->Site_Config_Model->update_rule(array('config_name' =>'meta-keyword'),array('config_value' =>$meta_keyword));
			$this->Site_Config_Model->update_rule(array('config_name' =>'meta-description'),array('config_value' =>$meta_description));
			$this->Site_Config_Model->update_rule(array('config_name' =>'page_title'),array('config_value' =>$page_title));
		} catch (Exception $ex) {
			pre($ex);	
		}	
		$content = "admin/configuration/Configuration";  
		$config =  $this->db->get('site_config')->result();
		$data = array ('content'=>$content,'config'=>$this->get_config(),'result_upload'=>$result_upload);
		$this->load->view ('admin/pages/index',$data);
	}





	public function upload_file ($file,$config) {
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$result  = array();

		if (!$this->upload->do_upload($file)) {
				$error  = array('error_attach' => $this->upload->display_errors());				

				$result['error'] = $error;
			} else {

				$dataUpload =$this->upload->data();
				$result['data'] = $dataUpload;				
			}

		return $result;	

	}	

}

?>