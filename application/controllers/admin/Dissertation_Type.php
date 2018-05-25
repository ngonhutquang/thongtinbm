<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dissertation_Type extends MY_Controller {


  public function __construct (){
    parent::__construct();     
      
    $this->load->model('DissertationType_Model') ; 

  if ($this->session->userdata('admin_data')== null) {    
       redirect(base_url()."Authorization/login");
  }
 
  }



  public function index (){
    $datas = $this->DissertationType_Model->get_list();

    $variables = array('datas'=>$datas);       
    $content = "admin/dissertation_type/dissertation_type";   

    $data = array ('content'=>$content,'variable'=>$variables);     

    $this->load->view ('admin/pages/index',$data);
    
  }



 public function add_type () {


    $variables = array();       

  $content = "admin/dissertation_type/add_type";   


    $data = array ('content'=>$content);      


    return $this->load->view ('admin/pages/index',$data);
 }


 public function do_add_type ()  {
  $name = $this->input->post ('name');
  $description = $this->input->post ('description');
  $data = array ('name'=>$name,'description'=>$description);
  if ($this->DissertationType_Model->create ($data)) {
        $result = '<script> 
                      //$(".loadersmall").show(); 

              $(".notification_add").show();  




              window.setTimeout(function() {
                $(".notification_add").fadeOut("slow");
              }, 3000);  

           window.location.href="'.admin_url().'Dissertation_Type/add_type"; </script>';

            $this->session->set_userdata('notification_data',$result);
             redirect(admin_url().'Dissertation_Type');

 }
}


public function edit_type (){


 $id = $this->input->post('id');
 $type = $this->DissertationType_Model->get_info($id);
  
 
 $content = "admin/dissertation_type/edit_type";   



 $data = array ('content'=>$content,'variable'=>$type);



  return $this->load->view ('admin/pages/index',$data);


}

public function editing_type (){


  $id = $this->input->post('id');

    $name = $this->input->post('name'); 
    $description = $this->input->post('description');
    $data_update = array('name'=>$name,'description'=>$description);

    if ($this->DissertationType_Model->update ($id,$data_update)) {
         redirect(admin_url().'Dissertation_Type');         

    } 

 

}


        }

        ?>