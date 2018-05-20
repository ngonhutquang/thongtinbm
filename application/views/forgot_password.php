<!DOCTYPE html>
<html lang="en" >


<head>
  <meta charset="UTF-8">
  <title>NLSTECH LOGIN</title>        
      <link rel="stylesheet" href="<?php echo public_url(); ?>templates/css/login.css">
         <!--   Core JS Files   -->
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
</style>
<style type="text/css" media="screen">
    .form-error {
      color: red;
      margin-left:20px;
    }    
    a {
      text-decoration:none;
    }
    .forget {
      margin-top: 13px;
    margin-left: 20px;
    }
    .error {
      color:red;
    }
</style>
<body>





<form style="margin-top: -200px;" action = "<?php echo base_url();?>authorization/get_password" id="validate_form" method = "POST">
  <!--   <?php echo validation_errors(); ?>  --></div> 

  <header style ="background-color: green;">Forgot password</header>
  <?php if (isset($result)) { ?>
       <div style ="margin-top : 10px; text-align: center ;" class="form-error"> <?php echo $result ?> </div> 
  <?php }?>

 

  <label>Admin email </label>
  <input placeholder="Enter admin email" type="text" name="admin_username"/>
 
  <div class="form-error"> <?php echo form_error('admin_username')?> </div> 
    <div class="forget"> <a href="<?php echo base_url('authorization/login') ?>">Login to admin</a> </div>
 
  <button style="color:#FFF; background-color: green;"> Get password</button>
</form>
    

  


</body>


  <script type="text/javascript" src="<?php echo public_url(); ?>templates/client/js/validation.js"></script>

</html>
