<!--Model add country -->
<!-- Modal -->
<div class="">
  <div class=" content">
    <div class=" header">


      <h4 class="title title_add">Cập Nhật Luận Văn, Tiểu Luận</h4>
       <div class="come-back">
      
    
    <a  href="<?php echo admin_url('dissertation-manager') ?>"><i style="font-size: 40px;" class="  fa fa-arrow-circle-left"></i></a>
   </div>

    </div>
    <div class=" body">
      <div class="form-error">  <?php //echo validation_errors(); ?> </div> 
      <?php if (isset ($variable)) { ?>
      <form name='edit_job' action='<?php echo admin_url();?>Dissertation_Manager/editing_dissertation' method='POST' id="add_form" enctype="multipart/form-data">   
        <span id="error">  </span>

        <div class="form-group">
          <label for="name"></span>ID</label> 
          <input  type="hidden" class="form-control" id="dissertation_id"  name="id"  value="<?=$variable->id ?>"  > 

          <input  disabled type="text" class="form-control" id="editid"  value="<?=$variable->id ?>"  placeholder="Enter Country Name">            
          <div class="form-error"> <?php echo form_error('title')?> </div> 
        </div>
        

        <div class="form-group">
          <label for="name">Mã đề tài</span></label>
          <!--   <input type="hidden" class="form-control" id="id" name="id" > -->
          <input  type="text" class="form-control" id ="dissertation_code" name="title"

          value="<?=$variable->dissertation_code ?>" placeholder="Enter title">  

          <div class="form-error"> <?php echo form_error('title_url')?> </div>           
        </div>




        <div class="form-group">
          <label for="name"></span>Tên đề tài</label>
          <!--   <input type="hidden" class="form-control" id="id" name="id" > -->
          <input  type="text" class="form-control" name="title" id="dissertation_title"

          value="<?=$variable->title ?>" placeholder="Enter title">  

          <div class="form-error"> <?php echo form_error('title_url')?> </div>           
        </div>


         <div class="form-group">
    <label for="name"></span>Loại</label> 
    <select name="type" id="type">
      <option <?php if ($variable->type == 1) echo "selected"; ?> value="1">Luan Van</option>
      <option  <?php if ($variable->type == 2) echo "selected"; ?> value="2">Tieu luan</option>
    </select>
 
  </div>

          <div class="form-group">
      <label for="name"></span>Năm học</label> 

          <select class="form-control" name ="course">
      <?php foreach ($school_year as $key => $value) { ?>
          <option  <?php if ($variable->school_year == $value->course)  echo "selected"; ?>  value="<?php echo $value->course?> "><?php echo $value->course ?></option>
      <?php } ?>
    </select>
    </div>


           <div class="form-group">
            <label for="name"></span>Tóm tắt </label> 
           <textarea name ="summary" id="summary">
                    <?=$variable->summary ?>
           </textarea>        
            <div class="form-error"> <?php echo form_error('summary')?> </div> 
          </div>




        
         <div class="form-group">

    <label for="name"></span>Sinh viên</label> 
    <div class="row">
       <div class="col-md-6">
        <input type="text" class="form-control" id="student_code"  name="student_code"  placeholder="Nhập mã số sinh viên">

    </div >

    <div class="col-md-6">
       <input type="button" class ="btn btn-success add_student_list" value = "Thêm">

   </div>  


</div>

<div class = "student_list" >        
     <?php foreach ($student_list as $key => $student) { ?> 
     <input type="checkbox" name="list_student" checked value="<?php echo $student->id ?>"><?php echo $student->name ?><br>  
          <?php   }  ?> 

</div>


</div>
        
      
   
  </div>


  <!-- Add GV -->

  <div class="form-group">

    <label for="name"></span>Giảng Viên</label> 
    <div class="row">
       <div class="col-md-6">
        <input type="text" class="form-control" id="teacher_code"  name="teacher_code"  placeholder="Nhập mã số sinh viên">

    </div >

    <div class="col-md-6">
       <input type="button" class ="btn btn-success add_teacher_list" value = "Thêm">

   </div>  


</div>

<div class = "teacher_list" >  

         <?php foreach ($teacher_list as $key => $teacher) { ?> 
     <input type="checkbox" name="list_teacher" checked value="<?php echo $teacher->id ?>"><?php echo $teacher->name ?><br>  
          <?php   }  ?> 


 </div>

 <button type="button" class="btn btn-default btn-success btn-block" id="btnSave_Dissertation" ></span>Lưu</button>
</form>
<?php }?>
</div>


</div>
</div>
</div>

<div id="result"></div>

    <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
    <script src="<?php echo public_url('templates/js/jquery.caret.min.js')?> "></script>
    <script src="<?php echo public_url('templates/js/jquery.tag-editor.js')?> "></script>
   
    <script>
        // jQuery UI autocomplete extension - suggest labels may contain HTML tags
        // github.com/scottgonzalez/jquery-ui-extensions/blob/master/src/autocomplete/jquery.ui.autocomplete.html.js
        (function($){var proto=$.ui.autocomplete.prototype,initSource=proto._initSource;function filter(array,term){var matcher=new RegExp($.ui.autocomplete.escapeRegex(term),"i");return $.grep(array,function(value){return matcher.test($("<div>").html(value.label||value.value||value).text());});}$.extend(proto,{_initSource:function(){if(this.options.html&&$.isArray(this.options.source)){this.source=function(request,response){response(filter(this.options.source,request.term));};}else{initSource.call(this);}},_renderItem:function(ul,item){return $("<li></li>").data("item.autocomplete",item).append($("<a></a>")[this.options.html?"html":"text"](item.label)).appendTo(ul);}});})(jQuery);

        var cache = {};
        function googleSuggest(request, response) {
            var term = request.term;
            if (term in cache) { response(cache[term]); return; }
            $.ajax({
                url: 'https://query.yahooapis.com/v1/public/yql',
                dataType: 'JSONP',
                data: { format: 'json', q: 'select * from xml where url="http://google.com/complete/search?output=toolbar&q='+term+'"' },
                success: function(data) {
                    var suggestions = [];
                    try { var results = data.query.results.toplevel.CompleteSuggestion; } catch(e) { var results = []; }
                    $.each(results, function() {
                        try {
                            var s = this.suggestion.data.toLowerCase();
                            suggestions.push({label: s.replace(term, '<b>'+term+'</b>'), value: s});
                        } catch(e){}
                    });
                    cache[term] = suggestions;
                    response(suggestions);
                }
            });
        }

        $(function() {
          

            // $('#tags').tagEditor({ initialTags: ['Hello', 'World', 'Example', 'Tags'], delimiter: ', ', placeholder: 'Enter tags ...' }).css('display', 'block').attr('readonly', true);
            $('#tags').tagEditor({ delimiter: ', ', placeholder: 'Enter tags ...' }).css('display', 'block').attr('readonly', true);

       
           

            function tag_classes(field, editor, tags) {
                $('li', editor).each(function(){
                    var li = $(this);
                    if (li.find('.tag-editor-tag').html() == 'red') li.addClass('red-tag');
                    else if (li.find('.tag-editor-tag').html() == 'green') li.addClass('green-tag')
                    else li.removeClass('red-tag green-tag');
                });
            }
            $('#demo6').tagEditor({ initialTags: ['custom', 'class', 'red', 'green', 'demo'], onChange: tag_classes });
            tag_classes(null, $('#demo6').tagEditor('getTags')[0].editor); // or editor == $('#demo6').next()
        });

        if (~window.location.href.indexOf('http')) {
            (function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();
            (function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=114593902037957";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
            $('#github_social').html('\
                <iframe style="float:left;margin-right:15px" src="//ghbtns.com/github-btn.html?user=Pixabay&repo=jQuery-tagEditor&type=watch&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="110" height="20"></iframe>\
                <iframe style="float:left;margin-right:15px" src="//ghbtns.com/github-btn.html?user=Pixabay&repo=jQuery-tagEditor&type=fork&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="110" height="20"></iframe>\
            ');
        }
    </script>





  <script type="text/javascript">

    $( document ).ready(function() {

          var canUpLoadDescription = true;
      $( "input[name='attach_position_description'").change (function(){
        var fileExtension = ['jpeg', 'jpg', 'png','pdf','csv','doc','docx','ppt', 'pptx'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {     
            $(".result_upload_file").addClass('form-error')
            $(".result_upload_file").html("Only formats are allowed : "+fileExtension.join(', '));
            canUpLoadDescription =false;
        }else {
            canUpLoadDescription = true;
            $(".result_upload_file").html("");
        }
            CheckUpload();
      })

     
       function CheckUpload () {
          if (canUpLoadDescription){
            $(".btn-success.btn-block").removeAttr('disabled');
           
            
         } else {
            $(".btn-success.btn-block").attr( 'disabled', true)
         }
    }
       
});    
 
  </script>
<script> 
  tinymce.init({
    selector: '#summary',
     mode : "textareas",
        theme : "advanced",
    height: 400,
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