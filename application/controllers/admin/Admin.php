<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin  extends MY_Controller {

      public function __construct()
    {
        parent::__construct();
 
        // load Pagination library
        $this->load->library('pagination');
         
        // load URL helper
        $this->load->helper('url');      

         $this->load->model('Country_Model');
         $this->load->model('Master_Category_Model');

         $this->load->model('Job_Model');
    
    }
    

    public function login () {
      return $this->load->view('login');
    }

	
    public function Product (){
      ///  echo "asdasdasD";
          // load db and model
        $this->load->database();
        $this->load->model('Users');
 
        // init params
        $params = array();
        $limit_per_page = 10;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->Users->get_total();
 
        if ($total_records > 0) 
        {
            // get current page records
            $params["results"] = $this->Users->get_current_page_records($limit_per_page, $start_index);
             
            $config['base_url'] ='admin/product';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
             
            // build paging links
            $params["links"] = $this->pagination->create_links();
        }
         
     //   $this->load->view('user_listing', $params);

           $paging = array('links'=> $this->pagination->create_links(),'results'=>$this->Users->get_current_page_records($limit_per_page, $start_index)) ;

    	   $data = array('content' => 'user_listing','paging'=>$paging);
           return $this->load->view ('admin/pages/index',$data);
    }

    
   
     public function Country (){
        // load db and model

          
        $this->load->database();
       
     
        // init params
        $params = array();
        $limit_per_page = 5;
        if ($this->input->post('number')){
             $number = $this->input->post('number');
             $limit_per_page = $number;
        }

        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
        $total_records = $this->Country_Model->get_total();
     
        if ($total_records > 0)
        {
            // get current page records
            $params["variable"]["results"] = $this->Country_Model->get_current_page_records($limit_per_page, $page*$limit_per_page);
                 
            $config['base_url'] ='http://192.168.0.113/nlssearch/admin/country';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
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

            $config['attributes'] = array('class' => 'myclass');
             
            $this->pagination->initialize($config);
                 
            // build paging links
            $params["variable"]["links"] = $this->pagination->create_links();
            $params["content"] = 'admin/country_listing';
        }
      
      //   $paging =  $this->load->view('admin/country_listing', $params,TRUE);
        // $data  = array('paging' =>$paging );
       //  $this->load->view('admin/pages/index',$data);

           $this->load->view('admin/pages/index',$params);
    }  
    


  
    public function T () {
           $variables = array();
           $data = array ('content'=>'Testing','variable'=>$variables);
           return $this->load->view ('admin/pages/index',$data);
            


     
    }



    public function Page () {
     
        $arr  = array('link' =>  base_url().'/admin/data' );
        $js = json_encode($this->Country_Model->get_list());
        

        return $this->load->view ('Testing',$arr);

     
    }



    public function Demo () {
        $country = $this->Country_Model->get_list();

        $arr  = array('country'=>$country);
        $js = json_encode($this->Country_Model->get_list());
        
        

        return $this->load->view ('Demo',$arr);

     
    }


    public function country_manager () {
        $country = $this->Country_Model->get_list();
        $variables = array('country'=>$country);       

       
      
        $data = array ('content'=>'Demo','variable'=>$variables);
        
        

        return $this->load->view ('admin/pages/index',$data);

     
    }

   




      public function data () {
         // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


     
        $country = $this->Country_Model->get_list();
       
        foreach($country as $r) {

        $data[] = array(
            $r->id,
            $r->name,
            $r->code,         
       );
 }

        $output = array(
               "draw" => $draw,
                "recordsTotal" => count($country),
                "recordsFiltered" =>  count($country),
                "data" => $data
            );


          echo json_encode($output);

          exit();     


     
    }


   public function manager (){

        $job = $this->Job_Model->get_list();
        $variables = array('job'=>$job);       
        $content = "job_view";

       
      
        $data = array ('content'=>$content,'variable'=>$variables);
        
        

        return $this->load->view ('admin/pages/index',$data);
   }



     public function category (){

        $job = $this->Master_Category_Model->get_list();
        $variables = array('job'=>$job);       
        $content = "admin/category";       
      
        $data = array ('content'=>$content,'variable'=>$variables);
               

        return $this->load->view ('admin/pages/index',$data);
   }



   public function testvalidate () {

        $job = $this->Job_Model->get_list();
        $variables = array('job'=>$job);       
        $content = "job_view";

        $data = array ('content'=>$content,'variable'=>$variables);

  
   
        return $this->load->view ('admin/pages/index',$data);

   }


   public function AddJob () {   


    if ($this->form_validation->run() == FALSE)
        {
           $this->load->view('validate_form');
        }
        else
        {
            // load success template...
            $data = $this->input->post();
            echo "It's all Good!";



        }



   }


   public function viewadd (){       
        $content = "addjob";
        $data = array ('content'=>$content);
        return $this->load->view ('admin/pages/index',$data);
    

   }

   public function view_edit_job (){ 

   //  $id = $this->input->post('id');
     $id = $this->input->post('id');
    $job = $this->Job_Model->get_info($id);
     $content = "edit_job";
     $data = array ('content'=>$content,'variable'=>$job);
     return $this->load->view ('admin/pages/index',$data);

   

    

   }












  public function test () {
    echo "asdasd";
  }


      
}
    







