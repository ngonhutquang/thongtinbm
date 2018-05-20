
<div class="">
  <div class=" content">
    <div class=" header">

      <h4 class="title title_add">Cập Nhật Trang Tĩnh</h4>
    </div>
    <div class=" body">
      <div class="form-error">   <?php echo validation_errors(); ?> </div> 

      <form name='add_master_category' action='<?php echo admin_url();?>staticpage/editing_staticpage' id="add_form" method='POST'>   
        <span id="error">   </span>

        <div class="form-group">

          <label for="name"></span>Tiêu đề</label> 
          <input type='hidden' name="id" value='<?=$variable->id?>' >  
          <input type="text" class="form-control" id="add_title"  name="title"  value="<?=$variable->title ?>"  placeholder="Enter Country Name">            
          <div class="form-error"> <?php echo form_error('name')?> </div> 
        </div>     
        <div class="form-group">
          <label for="name">Đường dẫn</label> 


            <input type="text" class="form-control"  name="name_url"  value="<?=$variable->name_url ?>"  placeholder="Enter Country Name">            
            <div class="form-error"> <?php echo form_error('name')?> </div> 
          </div>

        


           <div class="form-group">
            <label for="name"></span>Nội dung</label> 

           <textarea name ="content" id="content">
                     <?=$variable->content?>
           </textarea>        
            <div class="form-error"> <?php echo form_error('content')?> </div> 
          </div>
          
        <button type="submit" class="btn btn-default btn-success btn-block" id="btnEdit" ></span>Lưu</button>
      </form>
    </div>


  </div>
</div>
</div>


<!-- <script>
  $("#content").html('<?=$variable->status?>');

</script> -->
 
<script> 
  tinymce.init({
    selector: 'textarea',
     mode : "textareas",
        theme : "advanced",
    height: 500,
    theme: 'modern',
    plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
    toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
    image_advtab: true,
    templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
    ],
    content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
    ]
  });

</script>