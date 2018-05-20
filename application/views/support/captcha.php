
<style type="text/css">
.captcha-wrapper {
  width: 62%;
  background-color: white;
  border: 1px solid #E5E5E5;
  height: 30px;
}
.span5 {
  width: 30%;
  float: left;
}
.captcha_field .captcha-wrapper .captcha-image img {
  height: 40px;
}
.captcha_field .captcha-wrapper .captcha-input {
  padding-bottom: 0;
  padding-top: 4px;
  margin-left: 10px;
}
.captcha-input input {
  width: 125px;
  padding-left: 4px;
  margin-bottom: 0;
  border-radius: 0;
  height: 25px;
}
.icon-refresh {
  margin-top: 6px;
  display: inline-block;
  width: 20px;
  height: 18px;
  margin-top: 1px;
  margin-left: 15px;
  line-height: 14px;
  vertical-align: text-top;
  background-image: url("<?php echo base_url('pub/img/form/icon-refresh.png'); ?>");
  background-repeat: no-repeat;
}
</style>  
<div class="big-captcha-wrapper captcha-wrapper">
 <div class="captcha-image span5 image"></div> <!-- < echo $image_ch['image']; -->
 <div class="captcha-input span7">
  <input placeholder="Nhập mã bên trái" name="captcha" id="captcha" type="text">  
        <a class="refresh" href="javascript:void(0)" title="Lấy mã mới"><i class="icon-refresh"></i></a>        
 </div>
</div> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function()
{
// Load captcha image.    
    $( ".captcha-image" ).load( "<?php echo base_url('captcha/created'); ?>" );    
// Ajax post for refresh captcha image.
    $("a.refresh").click(function() {
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url('captcha/created'); ?>",
            success: function(res) {
            if (res)
                {
                    jQuery("div.image").html(res);
                }
            }
        });
    });            
});
</script>   

<?php pre ($this->session->userdata('captcha')); ?>