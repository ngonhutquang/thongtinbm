<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Staticpage extends MY_Controller {
	

	public function __construct (){
		parent::__construct();		
		$this->load->model('Static_Pages_Model');
	
		$this->validation_category();

		 if ($this->session->userdata('admin_data')== null) {
      
     
 
       redirect(base_url()."Authorization/login");
  }

	}


	public function validation_category () {
		$this->form_validation->set_rules('name', '', 'required');

		

	}

	public function index (){
		$datas = $this->Static_Pages_Model->get_list();
		$variables = array('datas'=>$datas);       
		$content = "admin/staticpage/staticpage";      

		$data = array ('content'=>$content,'variable'=>$variables);      


		return $this->load->view ('admin/pages/index',$data);

		
	}






	// add Employee
	public function add_employee () {
		$this->load->model('Country_Model');       

		$country = $this->Country_Model->get_list();        

		$content = "admin/staticpage/add_employee";
		$data = array ('content'=>$content,'country'=>$country);
		return $this->load->view ('admin/pages/index',$data);
	}


	public function do_add_employee  () {	

		if ($this->form_validation->run() == FALSE)
		{
			$content = "admin/staticpage/add_employee";
			$data = array ('content'=>$content);
			return $this->load->view ('admin/pages/index',$data);
		}
		else
		{
			$result = '';	
			$value = $this->input->post();
			$value['status'] = 1;           
			unset($value['profile']);
			unset($value['banner']);   
			$employee_next_id = $this->Employee_Model->next_id();
			$banner__image_name = null;
			$profile_image_name = null;

			$check_add = true;


			if (isset($_FILES['banner']['name'])&&$_FILES['banner']['name']!= null){
				$banner__image_name =clean_string($employee_next_id."_"."banner"."_".date('Y-m-d')."_".$_FILES['banner']['name']);

			} 

			if (isset($_FILES['profile']['name'])&&$_FILES['profile']['name']!= null) {
				$profile_image_name =clean_string($employee_next_id."_"."profile"."_".date('Y-m-d')."_".$_FILES['profile']['name']);
			}

			$check_add =  $this->Employee_Model->create($value);

			$config['upload_path']   = upload_file('employee');
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size']      = '4444';
			$last_job_id = $this->db->insert_id();    
			$file_id = $this->db->insert_id();

			if ($profile_image_name!=null) {
				$value['profile_image'] = $profile_image_name;
				$config['file_name'] = $profile_image_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('profile')){
					$check_add = $this->Employee_Model->update($file_id,$value);
				}
			}
			if ($banner__image_name!=null) {
				$value['banner_image'] = $banner__image_name;
				$config['file_name'] = $banner__image_name;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('banner')){
					$check_add = $this->Employee_Model->update($file_id,$value);
				}
			}
			if ($check_add) {
				$result = '<script> alert ("Add deployee success");
				window.location.href ="'.base_url().'admin/staticpage/employee";
				</script>';
				$content = "admin/staticpage/employee";
				$data = array ('content'=>$content,'result'=>$result);
				return $this->load->view ('admin/pages/index',$data);
			}         
		}
	}
	// end add employee



	public function editing_staticpage () {
		$result = '';	
		$value = $this->input->post();           
		$id = $value['id'];
		unset($value['id']);         
		
		if ($this->Static_Pages_Model->update($id,$value)) {

			 $result = '<script> 
                      //$(".loadersmall").show(); 

              $(".notification_update").show();        


              window.setTimeout(function() {
                $(".notification_update").fadeOut("slow");
              }, 3000);  

                    //  window.location.href="'.base_url().'admin/student/"; </script>';
            $content = "admin/student_manager/student";
            $this->session->set_userdata('notification_data',$result);
            redirect(admin_url().'staticpage');


		}
		
		
		
	}

	public function edit_staticpage (){
		
		
		$id = $this->input->post('id');
		

		$staticpage = $this->Static_Pages_Model->get_info($id);

		$content = "admin/staticpage/edit_staticpage";


		$data = array ('content'=>$content,'variable'=>$staticpage);

		

		
		return $this->load->view ('admin/pages/index',$data);

		
	}


	public function employee (){
		
		$datas = $this->Employee_Model->get_list();
		$variables = array('datas'=>$datas);       
		$content = "admin/staticpage/employee";      

		$data = array ('content'=>$content,'variable'=>$variables);      


		return $this->load->view ('admin/pages/index',$data);


	}


	


	public function delete_staticpage () {
		if ($this->input->post('id')) {
			$id = $this->input->post('id');
			if ($this->Supplier_Model->delete($id)){
				echo "Delete Success";
			}

		}
		
		
	}

    
    public function add_staticpage () {

    	$datas = null;
		// $variables = array('datas'=>$datas);       
		$content = "admin/staticpage/add_staticpage";      

		$data = array ('content'=>$content,'variable'=>$variables);      


		return $this->load->view ('admin/pages/index',$data);

    }

	public function show_list_job () {

		$join_job =  $this->db->select('product.id , product.name');
		$this->db->distinct();
		$this->db->from('product');                  
		$this->db->join('supplier', 'product.supplier = supplier.id');                    
		$this->db->where('supplier.id', $id);
		$query = $this->db->get()->result_array();
		
	}

// Set employee status
	  public function set_employee_status () {

            $result = '';	
            $value = $this->input->post('id');           
            $value = $this->input->post();           

            $id = $value['id'];
            unset($value['id']);         

            if ($this->Employee_Model->update($id,$value)) {
           	// 	$result = '<script> alert ("Update job success");
           	// 	window.location.href ="'.base_url().'admin/job";
           	// 	</script>';
           	// 	$content = "admin/job/job";
      		    // $data = array ('content'=>$content,'result'=>$result);
        	   //  return $this->load->view ('admin/pages/index',$data);
            }

          }



}

?>