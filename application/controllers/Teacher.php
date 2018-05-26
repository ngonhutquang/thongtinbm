<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Teacher extends MY_Controller {


  public function __construct (){
    parent::__construct();    
    $this->load->model('Teacher_Model');
    $this->load->model('Dissertation_Model');
    $this->load->model('Student_Model');
         $this->load->model('DissertationDetail_Model');
   if ($this->session->userdata('teacher_data')== null) {
        redirect(base_url()."Authorization/login");
     }   
  }

  public function index (){
    $this->load->model ('Dissertation_Model');
    $this->load->model ('Teacher_Model');
  	$teacher_id = $this->session->userdata('teacher_data')->id;
  	$teacher = $this->Teacher_Model->get_info($teacher_id);

    $dissertation_arr = null;

    $list_dissertation = null;


    $qr = "SELECT * FROM  teacher_manager_student WHERE teacher_id = $teacher_id GROUP BY dissertation_id ";
    $query = $this->db->query($qr);

    foreach ($query->result() as $row)
    {
        $dissertation_arr []  = $row;
       
    }

    
   foreach ($dissertation_arr as $key => $value) {
            $list_dissertation[] = $this->Dissertation_Model->get_info($value->dissertation_id);

   }
       
    $content = "teacher/teacher";   

    $data = array ('content'=>$content,'teacher'=>$teacher,'dissertation'=>$list_dissertation); 


    // pre ($data);    

    $this->load->view ('admin/pages/index',$data);

    
  }


          


              


    function download_dissertation($path){
    $this->load->helper('download');
    //$path =  $this->uri->segment(2); 

    $data = file_get_contents(public_url()."/Upload/dissertation/".$path);


   
    
     $name = $path;

   force_download($name, $data);
}


        

            public function view_teacher_detail (){


            $id = $this->input->post('id');

          
            $Student = $this->Student_Model->get_info($id);



            



            $content = "admin/Student_manager/Student_detail";


            $data = array ('content'=>$content,'variable'=>$Student);




            return $this->load->view ('admin/pages/index',$data);


          }







          public function set_status () {

            $result = ''; 
            $value = $this->input->post('id');           
            $value = $this->input->post();           

            $id = $value['id'];
            unset($value['id']);         

            if ($this->Student_Model->update($id,$value)) {
                  
            }

          }



          public function view_dissertation_detail (){
            $this->load->model('DissertationDetail_Model');

              $id = $this->input->post('id');
  


  $dissertation = $this->Dissertation_Model->get_info($id); 

  $dissertation_detail = $this->DissertationDetail_Model->get_list(array ('where'=>array('dissertation_id'=>$id)));



  $teacher_list = json_decode($dissertation->teacher);
  $student_list = json_decode($dissertation->student);
  $teacher_arr  = array(); 
  $student_arr  = array();

  foreach ($teacher_list as $key => $value) {
   $teacher = $this->Teacher_Model->get_info($value);
   $teacher_arr[] = $teacher;
 }
 foreach ($student_list as $key => $value) {
   $student = $this->Student_Model->get_info($value);
   $student_arr[] = $student;
 }

 $content = "teacher/dissertation_detail";


 $data = array ('content'=>$content,'variable'=>$dissertation,'teacher_list'=>$teacher_arr,'student_list'=>$student_arr);

 if ($dissertation_detail != null) {
     $data['dissertation_detail'] = $dissertation_detail;
  }


 return $this->load->view ('admin/pages/index',$data);






        }

     }