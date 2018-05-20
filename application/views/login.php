<!DOCTYPE html>
<html lang="en" >


<head>
  <meta charset="UTF-8">
  <title>Login</title>        
      <link rel="stylesheet" href="<?php echo public_url(); ?>templates/css/login.css">

       <script src="<?php echo public_url(); ?>templates/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>

         <script type="text/javascript" src="<?php echo public_url(); ?>templates/assets/js/jquery.validate.min.js"></script>

  
</head>
<style type="text/css" media="screen">
    body {
      background-color:#FFF;
    }
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
    .login-header {
        background-color: #2a2e9e;
    }
    .btn-login {
      background-color: green;
    }
</style>
<body>
           
<!-- <?php if (isset ($result)) echo $result; ?> -->
  
<form  id = "validate_form" action = "<?php echo base_url();?>authorization/author" method = "POST">
 

  <header class="login-header">Login</header>
  <?php if (isset($result)) { ?>
       <div style ="margin-top : 10px; text-align: center ;" class="form-error"> <?php echo $result ?> </div> 
  <?php }?>
  <label>Username <span>*</span></label>
  <input type="text" name="account"/>
  <!-- <div class="help">At least 6 character</div> -->
  <div class="form-error"> <?php echo form_error('username')?> </div> 
  <label>Password <span>*</span></label>
  <input type ="password" name="password" />
  <div class="help">Use upper and lowercase lettes as well</div>
   <div class="form-error"> <?php echo form_error('password')?> </div> 
    <div class="forget"> <a href="<?php echo base_url('authorization/forgot_password') ?>"> Forgot password</a> </div>
  <button class="btn-login">Login</button>
</form>
  
  


</body>
 <script type="text/javascript" src="<?php echo public_url(); ?>templates/client/js/validation.js"></script>

</html>
