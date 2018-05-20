

	<form name='register' action='' method='POST'>
         Tên đăng nhập: <input type="text" name="username"  value="<?php echo set_value('username')?>">
         <div class="error" id="username_error"><?php echo form_error('username')?></div>
 
         Mật khẩu: <input type="password" name="password">
        <div class="error" id="password_error"><?php echo form_error('password')?></div>
 
         Nhập lại mật khẩu: <input type="password" name="re_password">
         <div class="error" id="re_password_error"><?php echo form_error('re_password')?></div>
         Họ tên: <input type="text" name="name"  value="<?php echo set_value('name')?>">
         <div class="error" id="name_error"><?php echo form_error('name')?></div>
 
         Số điện thoại: <input type="text" name="phone"  value="<?php echo set_value('phone')?>">
         <div class="error" id="phone_error"><?php echo form_error('phone')?></div>
 
         Email: <input type="text" name="email"  value="<?php echo set_value('email')?>">
         <div class="error" id="email_error"><?php echo form_error('email')?></div>
 
        <input type="submit" value="Đăng ký">
</form>


