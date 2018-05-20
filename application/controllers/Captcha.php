
<?php
class Captcha extends CI_Controller {
function __construct()
    {
        parent::__construct();
    }
function index(){   

         $vals = array(
        'word' => '',
        'word_length' => 5,
        'img_path' => './public/captcha/',
        'img_url' => base_url('public/captcha'),
        // 'font_path' => base_url('pub/font').'/wetpet.ttf',
        'img_width' => '100',
        'img_height' => 30,
        'expiration' => 3600
        );
    $cap = create_captcha($vals);
    $this->session->set_userdata('captcha',$cap);
    //$_SESSION['captchaWord'] = $cap['word'];


    // pre ($_SESSION['captcha'] );
    pre ($cap);

    echo $cap['image'];  


    }
function created(){
   
         $vals = array(
        'word' => '',
        'word_length' => 5,
        'img_path' => './public/captcha/',
        'img_url' => base_url('public/captcha'),
        // 'font_path' => base_url('pub/font').'/wetpet.ttf',
        'img_width' => '120',
        'img_height' => 50,
        'expiration' => 3600
        );
    $cap = create_captcha($vals);
    $this->session->set_userdata('captcha',$cap);
    //$_SESSION['captchaWord'] = $cap['word'];


    // pre ($_SESSION['captcha'] );

    echo $cap['image'];     
}           


 public function show () {
    $this->load->view ('support/captcha');
 }
} 
?>  
