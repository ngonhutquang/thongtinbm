<!DOCTYPE html>
<html lang="en" >


<head>
  <meta charset="UTF-8">
  <title>NLSTECH LOGIN</title>        
      <link rel="stylesheet" href="<?php echo public_url(); ?>templates/css/login.css">

       <script src="<?php echo public_url(); ?>templates/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>

         <script type="text/javascript" src="<?php echo public_url(); ?>templates/assets/js/jquery.validate.min.js"></script>


  
</head>
<style type="text/css" media="screen">
    body {
      background-color: #FFF;
    }
    .form-error {
      color: red;
      margin-left:20px;
    }    
    .error {
      color: red;
    }
</style>
<body>





<form id ="validate_form" style=" margin-top: -200px;" action = "<?php echo base_url();?>authorization/do_create_pass" method = "POST">
  <!--   <?php echo validation_errors(); ?>  --></div> 
  <!-- <input type="hidden" name="_token" value="csrf_token()"> -->


   <input type="hidden" name="reset_code" value="<?php $this->uri->segment(2)?>">
     <input type="hidden" name="reset_code" value="<?php $this->input->get()?>">

  <header style ="background-color: green;">Create password</header>
  <?php if (isset($result)) { ?>
       <div style ="margin-top : 10px; text-align: center ;" class="form-error"> <?php echo $result ?> </div> 
  <?php }?>

  
  <div>
  <label>New password </label>
  <input placeholder="Enter admin email" type="password" id="new_password" name="new_password"/>
 
  <div class="form-error"> <?php echo form_error('admin_username')?> </div> 
  </div>


  <div>
  <label>Re-password </label>
  <input placeholder="Enter admin email" type="password" id="re-password" name="re_password"/>
 
  <div class="form-error"> <?php echo form_error('admin_username')?> </div> 
  </div>


  <button style="color:#FFF; background-color: green;"> Get password</button>
</form>
    

  
  <script type="text/javascript" src="<?php echo public_url(); ?>templates/client/js/validation.js"></script>



</body>

</html>
