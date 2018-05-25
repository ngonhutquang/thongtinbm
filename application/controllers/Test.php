<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Controller {

   public function __construct()
   {
    parent::__construct();
    
}


public function index () {
 $this->load->view('customer/css_url');
}


  public function get_password () {
    $pass_word = "123456";
     echo password_hash ($pass_word,PASSWORD_DEFAULT,['cost'=>10]);
  }




  public function Test_HTML () {
  	/*$html = <<<EOD       
  	<div class="form-group">
    <label for="name"></span>Tên đề tài</label> 

    <input type="text" class="form-control" id="dissertation_title"  name="title"  value=""  placeholder="Enter Dissertation Name">            
   
  </div>

  <div class="form-group">
    <label for="name"></span>Loại</label> 
    <select name="type" id="type">
      <option value="1">Luận văn</option>
      <option value="2">Tiểu luận</option>
    </select> 
  </div>
EOD;*/
$a = 1;
$b=2;
$arr = array ('name'=>'long','age'=>'12');
echo  <<<html

<div class="form-group">
    <label for="name"></span> Tên đề tài</label> 

    <input type="text" class="form-control" id="dissertation_title"  name="title"  value=""  placeholder="Enter Dissertation Name">            
   
  </div>

  <div class="form-group">
    <label for="name"></span>Loại</label> 
    <select name="type" id="type">
      <option value="1">Luận văn</option>
      <option value="2">Tiểu luận</option>
    </select> 
  </div>
 
html;
 
  }



}

?>