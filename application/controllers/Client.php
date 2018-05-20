<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Xu ly controller
        $controller = $this->uri->segment(1);
        $controller = strtolower($controller);
        $this->load->helper(array(
            'form',
            'url'
        ));
        // load form_validation library
        $this->load->library('form_validation');
        $this->load->library('csvimport');
      
        $this->load->model ('News_Model');

        $this->load->model ('Static_Pages_Model');
        $this->load->model ('Dissertation_Model');
        $this->load->model ('Teacher_Model');
        $this->load->model ('Student_Model');

        $this->load->helper(array(
            'form',
            'url'
        ));
    }
    public function validation_category()
    {
        $this->form_validation->set_rules('name', '', 'required');
        $this->form_validation->set_rules('email', '', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('description');
        $this->form_validation->set_rules('contact_email', '', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('title', '', 'required');
        $this->form_validation->set_rules('contact_phone', '', 'required');
    }

    public function get_config(){    

        $meta_title  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'meta-title'));
        $meta_keyword  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'meta-keyword'));
        $meta_description  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'meta-description'));
        $admin_username  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'admin_username'));
        $admin_password  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'admin_password'));
        $smtp_username  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_username'));
        $smtp_password  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'smtp_password'));
        $contact_email  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'contact_email'));
        // $code_change_pass  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'code_change_pass'));
        // $date_change_pass  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'date_change_pass'));
        // $code_login  = $this->Site_Config_Model->get_info_rule(array('config_name'=>'code_login'));

        $configArr = array('meta_title' => $meta_title,'meta_keyword'=>$meta_keyword, 'meta_description'=>$meta_description, 'admin_username'=>$admin_username, 'admin_password'=>$admin_password );

        return $configArr;


    }


    public function index()

    {  $content_value  = $this->Static_Pages_Model->get_list(array('where'=>array('name_url'=>'trangchu')));
    $content = "user/home";   

    $data = array ('content'=>$content,'content_value'=>$content_value);     

    $this->load->view ('user/master_page',$data);





    }


        public function introduce()
    {

    $content_value  = $this->Static_Pages_Model->get_list(array('where'=>array('name_url'=>'gioithieu')));
    $content = "user/introduce";   

    $data = array ('content'=>$content,'content_value'=>$content_value);     

    $this->load->view ('user/master_page',$data);


    }



    public function view_dissertation_detail (){


  $id = $this->input->get('id');


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

 $content = "admin/dissertation_manager/dissertation_detail";


 $data = array ('content'=>$content,'variable'=>$dissertation,'teacher_list'=>$teacher_arr,'student_list'=>$student_arr);




 return $this->load->view ('admin/pages/index',$data);


}




        public function dissertation_lv()
    {

    $this->load->library('pagination');
       
        // load URL helper
       $this->load->helper('url');

       $this->load->database();
      
       
        // init params
       $params = array();
       $limit_per_page = 5;
       $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;
       $total_records = $this->Dissertation_Model->get_total(array ('where'=> array('type' =>  1 )));

       
       if ($total_records > 0)
       {
            // get current page records
        $params["results"] = $this->Dissertation_Model->get_current_page_records_where($limit_per_page, $page*$limit_per_page,array('type'=>1));
        
        $config['base_url'] = base_url() . 'lv/';
        $config['total_rows'] = $total_records;
        $config['per_page'] = $limit_per_page;
        $config["uri_segment"] = 2;
        
            // custom paging configuration
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        
        $config['first_link'] = 'First Page';
        $config['first_tag_open'] = '<span class="firstlink">';
        $config['first_tag_close'] = '</span>';
        
        $config['last_link'] = 'Last Page';
        $config['last_tag_open'] = '<span class="lastlink">';
        $config['last_tag_close'] = '</span>';
        
        $config['next_link'] = 'Next Page';
        $config['next_tag_open'] = '<span class="nextlink">';
        $config['next_tag_close'] = '</span>';
        
        $config['prev_link'] = 'Prev Page';
        $config['prev_tag_open'] = '<span class="prevlink">';
        $config['prev_tag_close'] = '</span>';
        
        $config['cur_tag_open'] = '<span class="curlink">';
        $config['cur_tag_close'] = '</span>';
        
        $config['num_tag_open'] = '<span class="numlink">';
        $config['num_tag_close'] = '</span>';
        
        $this->pagination->initialize($config);
        
            // build paging links
        $params["links"] = $this->pagination->create_links();
    }

    $page_content              = 'user/dissertation_lv';
   
    $data = array('content' => $page_content,'links'=>$params["links"],'results'=>$params['results'] 
);


    $this->load->view('user/master_page', $data);



    }


          public function dissertation_tl()
    {
 $this->load->library('pagination');
       
        // load URL helper
       $this->load->helper('url');

       $this->load->database();
      
       
        // init params
       $params = array();
       $limit_per_page = 5;
       $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;
       $total_records = $this->Dissertation_Model->get_total(array ('where'=> array('type' =>  2 )));

       
       if ($total_records > 0)
       {
            // get current page records
        $params["results"] = $this->Dissertation_Model->get_current_page_records_where($limit_per_page, $page*$limit_per_page,array('type'=>2));
        
        $config['base_url'] = base_url() . 'tl/';
        $config['total_rows'] = $total_records;
        $config['per_page'] = $limit_per_page;
        $config["uri_segment"] = 2;
        
            // custom paging configuration
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        
        $config['first_link'] = 'First Page';
        $config['first_tag_open'] = '<span class="firstlink">';
        $config['first_tag_close'] = '</span>';
        
        $config['last_link'] = 'Last Page';
        $config['last_tag_open'] = '<span class="lastlink">';
        $config['last_tag_close'] = '</span>';
        
        $config['next_link'] = 'Next Page';
        $config['next_tag_open'] = '<span class="nextlink">';
        $config['next_tag_close'] = '</span>';
        
        $config['prev_link'] = 'Prev Page';
        $config['prev_tag_open'] = '<span class="prevlink">';
        $config['prev_tag_close'] = '</span>';
        
        $config['cur_tag_open'] = '<span class="curlink">';
        $config['cur_tag_close'] = '</span>';
        
        $config['num_tag_open'] = '<span class="numlink">';
        $config['num_tag_close'] = '</span>';
        
        $this->pagination->initialize($config);
        
            // build paging links
        $params["links"] = $this->pagination->create_links();
    }

        $page_content     = 'user/dissertation_tl';
   
    $data = array('content' => $page_content,'links'=>$params["links"],'results'=>$params['results'] 
);


    $this->load->view('user/master_page', $data);



    }


        public function news( $page = 1 )
    {

    $this->load->model('News_Model');
    

    $this->load->library('pagination');
       
        // load URL helper
       $this->load->helper('url');

       $this->load->database();
      
       
        // init params
       $params = array();
       $limit_per_page = 5;
       $page = ($this->uri->segment(2)) ? ($this->uri->segment(2) - 1) : 0;
       $total_records = $this->News_Model->get_total(array ('where'=> array('status' =>  1 )));

       
       if ($total_records > 0)
       {
            // get current page records
        $params["results"] = $this->News_Model->get_current_page_records_where($limit_per_page, $page*$limit_per_page,array('status'=>1));
        
        $config['base_url'] = base_url() . 'news/';
        $config['total_rows'] = $total_records;
        $config['per_page'] = $limit_per_page;
        $config["uri_segment"] = 2;
        
            // custom paging configuration
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        
        $config['first_link'] = 'First Page';
        $config['first_tag_open'] = '<span class="firstlink">';
        $config['first_tag_close'] = '</span>';
        
        $config['last_link'] = 'Last Page';
        $config['last_tag_open'] = '<span class="lastlink">';
        $config['last_tag_close'] = '</span>';
        
        $config['next_link'] = 'Next Page';
        $config['next_tag_open'] = '<span class="nextlink">';
        $config['next_tag_close'] = '</span>';
        
        $config['prev_link'] = 'Prev Page';
        $config['prev_tag_open'] = '<span class="prevlink">';
        $config['prev_tag_close'] = '</span>';
        
        $config['cur_tag_open'] = '<span class="curlink">';
        $config['cur_tag_close'] = '</span>';
        
        $config['num_tag_open'] = '<span class="numlink">';
        $config['num_tag_close'] = '</span>';
        
        $this->pagination->initialize($config);
        
            // build paging links
        $params["links"] = $this->pagination->create_links();
    }

    $page_content              = 'user/news';
   
    $data = array('content' => $page_content,'links'=>$params["links"],'results'=>$params['results'] 
);


    $this->load->view('user/master_page', $data);

       }




public function  dissertation_detail ($id){


 


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



 



        $content = 'user/dissertation_detail';

       $data = array ('content'=>$content,'variable'=>$dissertation,'teacher_list'=>$teacher_arr,'student_list'=>$student_arr);

       
        $this->load->view('user/master_page',$data);



}


 


   

public function get_news_detail ($id) {

    $news_detail = $this->News_Model->get_info($id);

        // pre($news_detail);

        $content = 'user/news_detail';

        $data = array ('content' => $content,'news_detail'=>$news_detail);
       
        $this->load->view('user/master_page',$data);


    // $this->load->view('customer/main_page', $data);

}



        



    }