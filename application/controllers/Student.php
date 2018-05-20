<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller
{
    
    
    public function __construct()
    {
        parent::__construct();
        
        
        $this->load->model('Student_Model');
        $this->load->model('Dissertation_Model');
        $this->load->model('Teacher_Model');
        $this->load->model('DissertationDetail_Model');
        
        
        if ($this->session->userdata('student_data') == null) {
            
            
            
            redirect(base_url() . "Authorization/login");
        }
        
        // $this->validation_category();
        
        
        
    }
    
    
    // public function validation_category () {
    //   $this->form_validation->set_rules('name', '', 'required');
    
    
    // }
    
    public function index()
    {
        
        $student_id      = $this->session->userdata('student_data')->id;
        $student         = $this->Student_Model->get_info($student_id);
        $dissertation_id = $student->dissertation_id;
        $teacher_arr     = array();
        $dissertation    = null;
        $dissertation_detail = null;
        
        
        if ($dissertation_id != 0) {
            
            
            $dissertation = $this->Dissertation_Model->get_info($dissertation_id);
            
            if ($dissertation->status == 1) {
                
                $dissertation_detail = $this->DissertationDetail_Model->get_list(array(
                    'where' => array(
                        'dissertation_id' => $dissertation_id
                    )
                ));
                
            }
            
            $teacher_list = json_decode($dissertation->teacher);
            
            
            foreach ($teacher_list as $key => $value) {
                $teacher       = $this->Teacher_Model->get_info($value);
                $teacher_arr[] = $teacher;
            }
            
            
        }
        
        
        $content = "student/student";
        
        $data = array(
            'content' => $content,
            'student' => $student,
            'dissertation' => $dissertation,
            'teacher' => $teacher_arr,
            'dissertation_detail' => $dissertation_detail
        );
        
        $this->load->view('admin/pages/index', $data);
        
        
    }
    
    
    public function get_one_Student()
    {
        $id = $this->input->post('id');
        redirect(base_url() . '/Client/submit_vacancy');
        
        $arrayStudent = array();
        
        $arrayStudent[0] = $this->Product_Model->get_info($id);
        
        $datas     = $arrayStudent;
        $variables = array(
            'datas' => $datas
        );
        $content   = "admin/Student/Student";
        
        $data = array(
            'content' => $content,
            'variable' => $variables
        );
        return $this->load->view('admin/pages/index', $data);
        
        
    }
    
    
    public function do_add_Student()
    {
        $result = '';
        
        $value           = $this->input->post();
        $result          = '<script> 

                      //$(".loadersmall").show(); 

              $(".notification_add").show();        


              window.setTimeout(function() {
                $(".notification_add").fadeOut("slow");
              }, 3000);  

         </script>';

        $value['status'] = 1;
        
        if ($this->Student_Model->create($value)) {
            $content = "admin/Student_manager/Student";
            $this->session->set_userdata('notification_data', $result);
            redirect(admin_url() . 'Student_Manager/add_Student');
            
            
        }
        
        
        
        
        
        
        
        
    }
    
    
    public function get_Student_by_id()
    {
        
        $value      = array(
            'action',
            'id'
        );
        $data       = $this->get_post_data($value);
        $product_id = $this->input->post('id');
        $result     = array();
        if ($data['action'] == "view") {
            $result['Student'] = $this->Product_Model->get_info($data['data']['id']);
            
            $position = $this->db->select('*')->where('product', $product_id)->get('product_media')->result_array();
            
            
            if ($position) {
                $result['position'] = $position[0];
            }
            
        }
        echo json_encode($result);
        
    }
    
    
    
    public function upload_dissertation()
    {
        
        // $cv_source                  = $_SERVER['DOCUMENT_ROOT'] . 'dieutra/public/Upload/dissertation/';
        $cv_source                  = '/opt/lampp/htdocs/dieutra/public/Upload/';
        $student                    = $this->session->userdata('student_data');
        $student_code               = $student->code;
        $dissertation_id            = $student->dissertation_id;
        $dissertation_code          = $student->dissertation_code;
        $value['student_code']      = $student_code;
        $value['dissertation_id']   = $dissertation_id;
        $value['dissertation_code'] = $dissertation_code;
        $value['datetime']          = date('Y-m-d H:i:s');
        $value['status']            = 1;
        
        
       
        if (isset($_FILES['dissertation_file']['name']) && $_FILES['dissertation_file']['name'] != '') {
            $config['upload_path']   = upload_file('dissertation');

           
            $config['allowed_types'] = 'pdf|jpg|docx|doc|pdf|ppt|pptx';
            $config['max_size']      = '2048';
            /*$exten = get_mime_by_extension($_FILES['attach_resume']['name']);
            // print_r($exten);*/
            
            // $cv_media_id = $this->Cv_Media_Model->next_id();
            // $cv_file_name = clean_string($cv_media_id."_".$cv_id."_".date('Y-m-d')."_".$_FILES['attach_resume']['name']);
            // $cv_media = $this->Cv_Media_Model->create(array("cv"=>$cv_id,"source_url"=> $cv_file_name,"notes"=>"attach_resume"));
            // $file_id = $this->db->insert_id();
            // $config['file_name'] = clean_string($file_id."_".$cv_id."_".date('Y-m-d')."_".$_FILES['attach_resume']['name']);
            $file_name           = clean_string($dissertation_id . "_" . $dissertation_code . "_" . $student_code . "_" . $_FILES['dissertation_file']['name']);
            $config['file_name'] = $file_name;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('dissertation_file')) {
                // $error                     = array(
                //     'error_attach' => $this->upload->display_errors()
                // );
                // $page_content              = array();
                // $page_content['page_path'] = 'customer/submit_resume';
                // $page_content['data']      = '';
                // $page_content['error']     = $error;
                // $data                      = array(
                //     'page_content' => $page_content
                // );
                // $this->load->view('customer/main_page', $data);
                echo "error";
                pre($this->upload->display_errors());
            } else {
                $value['file_url'] = $file_name;
                
                $this->load->model('DissertationDetail_Model');
                $dissertation_detail = $this->DissertationDetail_Model->get_list(array(
                    'where' => array(
                        'dissertation_id' => $dissertation_id
                    )
                ));
                if ($dissertation_detail != null) {
                    $dissertation_detail_id = $dissertation_detail[0]->id;
                    
                    if ($this->DissertationDetail_Model->update($dissertation_detail_id, $value)) {
                        
                        $result = '<script> 
                      //$(".loadersmall").show(); 

                       $(".notification_update").show();        


                        window.setTimeout(function() {
                   $(".notification_update").fadeOut("slow");
              }, 3000);  

         </script>';
                        $this->session->set_userdata('notification_data', $result);
                        redirect(base_url() . 'Student');
                        
                    }
                }
                
                else {
                    
                    if ($this->DissertationDetail_Model->create($value)) {
                        if ($this->Dissertation_Model->update($dissertation_id, array(
                            'status' => 1
                        ))) {
                            $result = '<script> 
                      //$(".loadersmall").show(); 

                       $(".notification_update").show();        


                        window.setTimeout(function() {
                   $(".notification_update").fadeOut("slow");
              }, 3000);  

         </script>';
                            $this->session->set_userdata('notification_data', $result);
                            redirect(base_url() . 'Student');
                            
                        }
                        
                        
                        
                        
                        
                        
                    }
                    
                    
                    
                    
                }
            }
            
            
        }
        
    }
    
    
    
    
    
    
    
    
    
    
    
    public function edit_Student()
    {
        
        
        $id = $this->input->post('id');
        
        
        $Student = $this->Student_Model->get_info($id);
        
        
        
        
        
        
        
        $content = "admin/Student_manager/edit_Student";
        
        
        $data = array(
            'content' => $content,
            'variable' => $Student
        );
        
        
        
        
        return $this->load->view('admin/pages/index', $data);
        
        
    }
    
    public function view_Student_detail()
    {
        
        
        $id = $this->input->post('id');
        
        
        $Student = $this->Student_Model->get_info($id);
        
        
        
        $content = "admin/Student_manager/Student_detail";
        
        
        $data = array(
            'content' => $content,
            'variable' => $Student
        );
        
        
        
        
        return $this->load->view('admin/pages/index', $data);
        
        
    }
    
    
    
    
    
    public function delete_Student()
    {
        
        if ($this->input->post('id')) {
            $Student_id = $this->input->post('id');
            
            if ($this->Student_Model->delete($Student_id)) {
                
                $result = '<script> 

                      

              $(".notification_delete").show();        


              window.setTimeout(function() {
                $(".notification_delete").fadeOut("slow");
              }, 3000);  

               </script>';

                
                // $this->session->set_userdata('notification_data',$result);
                
                // pre ($result);
                
                // redirect(admin_url().'Student_Manager');
                
                echo $result;
                
                
            }
            
            
        }
        
        
    }
    
    
    public function get_parent_by_master()
    {
        $id          = $this->input->post('id');
        $join_parent = $this->db->select('parent_category.id, parent_category.name');
        $this->db->from('parent_category');
        $this->db->where('master_category', $id);
        $this->db->join('master_category', 'parent_category.master_category = master_category.id');
        $query = $this->db->get()->result_array();
        
        echo json_encode($query);
        
        
    }
    
    
    public function get_category_by_parent()
    {
        $id          = $this->input->post('id');
        $join_parent = $this->db->select('category.id, category.name');
        $this->db->from('category');
        $this->db->where('parent_category', $id);
        $this->db->join('parent_category', 'category.parent_category = parent_category.id');
        $query = $this->db->get()->result_array();
        
        echo json_encode($query);
        
        
    }
    
    
    public function category_attribute()
    {
        $id = $this->input->post('id');
        
        $join_parent = $this->db->select('attribute.id, attribute.name');
        $this->db->distinct();
        $this->db->from('attribute');
        $this->db->join('category_attribute_mapping', 'category_attribute_mapping.attribute = attribute.id');
        $this->db->join('category', 'category_attribute_mapping.category = category.id');
        $this->db->where('category_attribute_mapping.category', $id);
        $query = $this->db->get()->result_array();
        
        echo json_encode($query);
        
        
    }
    
    public function add_Student()
    {
        
        
        
        $variables = array();
        
        $content = "admin/Student_manager/add_Student";
        
        $data = array(
            'content' => $content
        );
        
        
        return $this->load->view('admin/pages/index', $data);
        
    }
    
    
    public function set_status()
    {
        
        $result = '';
        $value  = $this->input->post('id');
        $value  = $this->input->post();
        
        $id = $value['id'];
        unset($value['id']);
        
        if ($this->Student_Model->update($id, $value)) {
            
        }
        
    }
    
    
    
    public function Student_detail($id)
    {
        
        $datas    = array();
        $datas[0] = $this->Product_Model->get_info($id);
        if (!empty($datas[0])) {
            
            $variables = array(
                'datas' => $datas
            );
            $content   = "admin/Student/Student";
            
            $data = array(
                'content' => $content,
                'variable' => $variables
            );
            return $this->load->view('admin/pages/index', $data);
        } else
            echo "Null";
        
        
    }
    
    
    public function test_detail()
    {
        $dissertation_detail = $this->DissertationDetail_Model->get_list(array(
            'where' => array(
                'dissertation_id' => 26
            )
        ));
        
        if ($dissertation_detail == null) {
            echo "null";
        }
        echo $dissertation_detail[0]->student_code;
        
    }



    function download_dissertation($path){
    $this->load->helper('download');
    //$path =  $this->uri->segment(2); 

    $data = file_get_contents(public_url()."/Upload/dissertation/".$path);


   
    
     $name = $path;

   force_download($name, $data);
}



    
}

?>
