
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends MY_Controller
{
    
    
    public function __construct()
    {
        parent::__construct();
 
        $this->load->model('News_Model');
        // $this->validation_category();
         if ($this->session->userdata('admin_data')== null) {
      
     
 
       redirect(base_url()."Authorization/login");
  }
        
    }
    
    
    public function validation_category()
    {
        $this->form_validation->set_rules('name', '', 'required');
        $this->form_validation->set_rules('content', '', 'required');
        
        
    }
    
    public function index()
    {
        $datas = $this->News_Model->get_list();
        
        $variables = array(
            'datas' => $datas
        );
        $content   = "admin/news/news";
        
        $data = array(
            'content' => $content,
            'variable' => $variables
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
        
        if ($this->Blog_Model->update($id, $value)) {
            //  $result = '<script> alert ("Update job success");
            //  window.location.href ="'.base_url().'admin/job";
            //  </script>';
            //  $content = "admin/job/job";
            // $data = array ('content'=>$content,'result'=>$result);
            //  return $this->load->view ('admin/pages/index',$data);
        }
        
    }
    
    public function add_news()
     {
    //     $this->load->model('Blog_Category_Model');
    //     $this->load->model('Blog_Status_Model');
        
    //     $blog_category = $this->Blog_Category_Model->get_list();
    //     $blog_status   = $this->Blog_Status_Model->get_list();
        
        $content = "admin/news/add_news";
        $data    = array(
            'content' => $content
            // 'blog_category' => $blog_category,
            // 'blog_status' => $blog_status
        );
        return $this->load->view('admin/pages/index', $data);
    }
    
    public function do_add_news()
    {

       
        $result            = '';
        $value = $this->input->post();
          $value['datetime'] = date('y-m-d h:i:s A');       
        
        if ($this->News_Model->create($value)) {
                 $result = '<script> 
                     
              $(".notification_add").show();        


              window.setTimeout(function() {
                $(".notification_add").fadeOut("slow");
              }, 3000);  

         </script>';
        
        $this->session->set_userdata('notification_data',$result);
            redirect(admin_url().'news');
        }
  
    }
    
    public function get_blog_by_id()
    {
        
        $value  = array(
            'action',
            'id'
        );
        $data   = $this->get_post_data($value);
        $result = array();
        if ($data['action'] == "view") {
            $id             = $data['data']['id'];
        $result['blog'] = $this->Supplier_Model->get_info($id);
            
            $join_job = $this->db->select('product.id , product.name , product.description');
            $this->db->distinct();
            $this->db->from('product');
            $this->db->join('supplier', 'product.supplier = supplier.id');
            $this->db->where('supplier.id', $id);
            $result['job'] = $this->db->get()->result_array();
            
        }
        
        echo json_encode($result);
        
    }
    
    public function editing_news()
    {
        $result = '';
        $value  = $this->input->post();
        $id     = $value['id'];
        unset($value['id']);
        
        if ($this->News_Model->update($id, $value)) {
             $result = '<script> 
                      //$(".loadersmall").show(); 

              $(".notification_update").show();        


              window.setTimeout(function() {
                $(".notification_update").fadeOut("slow");
              }, 3000);  

                    //  window.location.href="'.base_url().'admin/Student/"; </script>';
           
            $this->session->set_userdata('notification_data',$result);
            redirect(admin_url().'news');

        }      
                
    }
    
    public function edit_news()
    {
      
        
        $id = $this->input->post('id');
        
        
        $news = $this->News_Model->get_info($id);
        
        $content = "admin/news/edit_news";
        
        
        $data = array(
            'content' => $content,
            'variable' => $news
           
        );
           
        
        return $this->load->view('admin/pages/index', $data);
        
        
    }
    
    public function delete_blog()
    {
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            if ($this->Supplier_Model->delete($id)) {
                echo "Delete Success";
            }            
        }        
        
    }
    
    
    
    public function show_list_job()
    {
        
        $join_job = $this->db->select('product.id , product.name');
        $this->db->distinct();
        $this->db->from('product');
        $this->db->join('supplier', 'product.supplier = supplier.id');
        $this->db->where('supplier.id', $id);
        $query = $this->db->get()->result_array();
        
    }
    
}

?>
