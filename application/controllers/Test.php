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



}

?>