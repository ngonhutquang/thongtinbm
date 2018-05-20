<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Support extends MY_Controller {

	public function __construct () {
		parent::__construct();

	}


  

    function download_template($path){
    $this->load->helper('download');
    //$path =  $this->uri->segment(2); 
    $data = file_get_contents(public_url()."/download/".$path."_template.csv");
    
    $name = $path."_template.csv";

    force_download($name, $data);
}
    

    function download_cv($path){
    $this->load->helper('download');
    //$path =  $this->uri->segment(2); 

    $data = file_get_contents(public_url()."/Upload/cv/".$path);


   
    
     $name = $path;

   force_download($name, $data);
}



    function download_position($path){
    $this->load->helper('download');
    //$path =  $this->uri->segment(2); 

    $data = file_get_contents(public_url()."/Upload/position_description/".$path);


   
    
     $name = $path;

   force_download($name, $data);
}



    function download_post(){
    if ($this->input->post('path') != null){
         $this->load->helper('download');
         $path = $this->input->post('path');
    //$path =  $this->uri->segment(2); 

    $data = file_get_contents(public_url()."/Upload/position_description/".$path);


   
    
     $name = $path;

   force_download($name, $data);

    }
   
}



}

?>