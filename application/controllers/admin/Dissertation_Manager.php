<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dissertation_Manager extends MY_Controller {


  public function __construct (){
    parent::__construct();    

  // $this->validation_category();

    $this->load->model('Dissertation_Model') ; 
    $this->load->model('Student_Model');
    $this->load->model ('Teacher_Model');
    $this->load->model ('DissertationDetail_Model');
    $this->load->model ('Schoolyear_Model');
    $this->load->model ('DissertationType_Model');


 if ($this->session->userdata('admin_data')== null) {
      
     
 
       redirect(base_url()."Authorization/login");
  }

  }



  public function index (){
    $datas = $this->Dissertation_Model->get_list();
    $Diss_type = $this->DissertationType_Model->get_list();

    $variables = array('datas'=>$datas);       
    $content = "admin/dissertation_manager/dissertation";   

    $data = array ('content'=>$content,'variable'=>$variables,'diss_type'=>$Diss_type);     

    $this->load->view ('admin/pages/index',$data);


  }


  public function get_one_dissertation(){
    $id =  $this->input->post('id');
    redirect(base_url().'/Client/submit_vacancy');

    $arraydissertation = array();

    $arraydissertation[0]= $this->Product_Model->get_info($id);

    $datas = $arraydissertation;
    $variables = array('datas'=>$datas);       
    $content = "admin/dissertation/dissertation";      

    $data = array ('content'=>$content,'variable'=>$variables);      
    return $this->load->view ('admin/pages/index',$data);


  }

  public function do_add_dissertation () {
    $this->load->model('Teacher_Manager_Student_Model');
    $result = '';


    $title = $this->input->post('title'); 
    $summary = $this->input->post('summary'); 
    $dissertation_code = $this->input->post('dissertation_code');

     $type = $this->input->post('type');
     $school_year = $this->input->post('school_year');

    $student_list = $this->input->post('student_code'); 
    $teacher_list = $this->input->post('teacher_code');

    if ($student_list == NULL  || $teacher_list == NULL) {
        
          $result = "<script> alert ('Phải chọn giảng viên và sinh viên'); </script>";
          echo $result;

          exit();

    }else {

    $student = json_encode($student_list);
    $teacher = json_encode($teacher_list);
    $media_file = 0;



   $number = $this->Dissertation_Model->get_total(array('where'=>array('dissertation_code'=>$dissertation_code)));

    $value  = array('title' => $title , 'student' =>$student ,'type'=>$type,'school_year'=>$school_year,'teacher'=>$teacher,'summary'=>$summary,'dissertation_code'=>$dissertation_code,'status' =>   0,'media_file'=>$media_file);

    if ($number > 0) {
    $result = "<script> alert ('Mã đề tài đã tồn tại'); </script>";
          echo $result;

   } else {

    if ($this->Dissertation_Model->create($value)) {
      $dissertation_id =  $this->db->insert_id();

      foreach ($teacher_list as $key => $teacher) {             
        foreach ($student_list as $key => $student) {
          $this->Teacher_Manager_Student_Model->create(array('teacher_id'=>$teacher,'student_id'=>$student,'dissertation_id'=>$dissertation_id));            
          $this->Student_Model->update($student,array('dissertation_id'=>$dissertation_id));            
        }
      }
         $result = '<script> 
                      //$(".loadersmall").show(); 

              $(".notification_add").show();  




              window.setTimeout(function() {
                $(".notification_add").fadeOut("slow");
              }, 3000);  

           window.location.href="'.admin_url().'Dissertation_Manager/add_dissertation"; </script>';

           echo $result;

            
    } else {
      echo "That bai";
    }
  }

    }



 

  }


  public function get_dissertation_by_id (){

    $value = array ('action','id');     
    $data = $this->get_post_data($value);     
    $product_id = $this->input->post('id');
    $result =  array();
    if ($data['action'] == "view") {
     $result['dissertation'] = $this->Product_Model->get_info($data['data']['id']);    

     $position = $this->db->select('*')->where('product',$product_id)->get('product_media')->result_array();   


     if ($position) {         
      $result['position']= $position[0];
    } 

  }
  echo json_encode($result);

}

public function editing_dissertation () {

  $this->load->model('Teacher_Manager_Student_Model');
    $result = '';

    $id = $this->input->post('id');

    $title = $this->input->post('title'); 
    $summary = $this->input->post('summary'); 

    $type = $this->input->post('type'); 
    $school_year = $this->input->post('school_year'); 

    $dissertation_code = $this->input->post('code');
    $student_list = $this->input->post('student_code'); 
    $teacher_list = $this->input->post('teacher_code');
    $student = json_encode($student_list);
    $teacher = json_encode($teacher_list);

    $can_update_tcmanager = $this->Teacher_Manager_Student_Model->update_rule(array('dissertation_id'=>$id),array('status'=>-1));
  

    $value  = array('title' => $title ,'type'=>$type, 'student' =>$student ,'school_year'=>$school_year, 'teacher'=>$teacher,'summary'=>$summary,'dissertation_code'=>$dissertation_code );

    
    $student_old = $this->Student_Model->get_list(array('dissertation_id'=>$id));

    foreach ($student_old as $key => $st) {
          $this->Student_Model->update($st->id,array('dissertation_id'=>0));
    } 
    // pre ($student_old);    

    if ($this->Dissertation_Model->update($id,$value)) {
      $this->Teacher_Manager_Student_Model->del_rule(array('dissertation_id'=>$id));
    
      foreach ($teacher_list as $key => $teacher) {             
        foreach ($student_list as $key => $student) {
          $this->Teacher_Manager_Student_Model->create(array('teacher_id'=>$teacher,'student_id'=>$student,'dissertation_id'=>$id));            
          $this->Student_Model->update($student,array('dissertation_id'=>$id));            
        }
      }
       $result = '<script> 
                      //$(".loadersmall").show(); 

              $(".notification_update").show();        


              window.setTimeout(function() {
                $(".notification_update").fadeOut("slow");
              }, 3000);  

           window.location.href="'.admin_url().'Dissertation_Manager"; </script>';

           echo $result;
         
            // $this->session->set_userdata('notification_data',$result);
            // redirect(admin_url().'Dissertation_Manager');


    }  else {
      echo "That bai";
    }
}

public function edit_dissertation (){


 $id = $this->input->post('id');
 $school_year = $this->Schoolyear_Model->get_list();
  
  $dissertation = $this->Dissertation_Model->get_info($id);

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

  $content = "admin/dissertation_manager/edit_dissertation";



 $data = array ('content'=>$content,'variable'=>$dissertation,'school_year'=>$school_year,'teacher_list'=>$teacher_arr,'student_list'=>$student_arr);



  return $this->load->view ('admin/pages/index',$data);


}

public function view_dissertation_detail (){
  $id = $this->input->post('id');


  


  $dissertation = $this->Dissertation_Model->get_info($id);

  $diss_detail = $this->DissertationDetail_Model->get_list(array('where'=>array('dissertation_id'=>$id)));



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

 $content = "admin/dissertation_manager/dissertation_detail";


 $data = array ('content'=>$content,'variable'=>$dissertation,'teacher_list'=>$teacher_arr,'student_list'=>$student_arr);

  if ($diss_detail != null) {
     $data['dissertation_detail'] = $diss_detail;
  }




 return $this->load->view ('admin/pages/index',$data);


}





public function delete_dissertation () {

  if ($this->input->post('id')) {
    $dissertation_id = $this->input->post('id');

    if ($this->Dissertation_Model->delete($dissertation_id)){             

      $result = '<script> 


      $(".notification_delete").show();        


      window.setTimeout(function() {
        $(".notification_delete").fadeOut("slow");
      }, 3000);  

      </script>';

             // $this->session->set_userdata('notification_data',$result);

             // pre ($result);

             // redirect(admin_url().'dissertation_Manager');

      echo $result;


    }


  }


}



public function add_dissertation () {
    $school_year = $this->Schoolyear_Model->get_list();


    $variables = array();       

    $content = "admin/dissertation_manager/add_dissertation";

    $data = array ('content'=>$content,'school_year'=>$school_year);      


    return $this->load->view ('admin/pages/index',$data);

}


public function set_status () {

  $result = ''; 
  $value = $this->input->post('id');           
  $value = $this->input->post();           

  $id = $value['id'];
  unset($value['id']);         

  if ($this->Dissertation_Model->update($id,$value)) {

  }

}





        //Lấy sinh viên dựa vào mã số 

public function get_student_by_code (){
  $this->load->model('Student_Model');        

  $student_code = $this->input->post('student_code');
  $student = $this->Student_Model->get_info_rule(array('code'=>$student_code));   

  if ($student) {
    echo json_encode($student);
  }  else {
    echo "false";
  }





}


      //Lấy sinh viên dựa vào mã số 

public function get_teacher_by_code (){
  $this->load->model('Teacher_Model');        

  $teacher_code = $this->input->post('teacher_code');
  $teacher = $this->Teacher_Model->get_info_rule(array('code'=>$teacher_code));   

  if ($teacher) {
    echo json_encode($teacher);
  }  else {
    echo "false";
  }





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