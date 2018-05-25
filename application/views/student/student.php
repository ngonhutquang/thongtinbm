<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous"> 

<?php  $this->load->view('admin/notification');  ?>





<div style="  border: solid 1px;
    border-radius: 4px;
    padding: 20px; ">

   

 
    


    <div class=" header">

      <h4 class="title title_add">Thông Tin Sinh Viên</h4>
    </div>
    <div   >
     <div class="form-error">   <?php echo validation_errors(); ?> </div> 


    <!--  <?php pre ($student); ?> -->

 

  <span id="error">   </span>

 <?php  echo $this->uri->segment(1) ?>

  

              <div class="form-group">
                  <label for="name"></span>Mã số SV</label>
                  <div> <span id="view_name_url"><?php echo $student->code ?></span> </div>
               </div>
               <div class="form-group">
                  <label for="name"></span>Name:</label>           
                  <div> <span id="view_name"> <?php echo $student->name ?></span> </div>  

               </div>  <div class="form-group">

                  <label for="name"></span>Khóa:</label>           
                  <div> <span id="view_name"> <?php echo $student->course ?></span> </div>       
               </div>

               <?php if ($dissertation!= null) { ?>
               <div class="form-group">
                  <div class = "row">
                    <div class="col-md-6">
                      <label for="name"></span>Tên đề tài</label>            

                           <h4 style ="margin-top:0px;"><?php echo $dissertation->title ?></h4>
                    

                  

                  <?php if ($dissertation->status == 1) { ?>
                     <div style ="margin-left: 20px; margin-top: 0px;"> <span id="view_name_url">

                      <a href="<?php echo base_url('Student/download_dissertation/').$dissertation_detail[0]->file_url?> "><i class="fas fa-download"></i></a> </span> </div>
            <?php          
                  } ?>


                </div>
                  <div class = "col-md-6">
                        <label for="name"></span>Giáo viên hướng dẫn</label>
                        <div> 
                          <ul>
                             
                             <?php foreach ($teacher as $key => $value) {
                               ?>
                                  <li><?php echo $value->name; ?></li>
                             <?php }  }?>
                             
                            
                          </ul>
                        </div>


                          <div class="form-group">

                  <label for="name"></span>Năm học:</label>           
                  <div> <span id="view_name"> <?php echo $dissertation->school_year ?></span> </div>       
               </div>

                  </div>
              




       <div class="col-md-12">


             

                  
   <form name='add_master_category' action='<?php echo base_url();?>Student/upload_dissertation' id="add_form" method='POST'  enctype="multipart/form-data" >   

   <div class="form-group">
    <label for="code"></span>Nhập tập tin luận văn/tiểu luận</label>

    <div style ="margin-bottom: 10px;">
      <span style ="color: #611212; ">File type support:pdf, docx, doc (Maximum file size 4Mb)</span>
    </div>
     <div class="fb-button">

         <input name="dissertation_file" id="item8_file_1" type="file" data-hint="" >

                  </div>
                  <div class= "result_upload_file"></div>
  
  </div>

<div class="col-md-2">
  <button type="submit" class="btn btn-default btn-success btn-block" id="btnAdd" ></span>Upload file</button>
</div>
</form>
                </div>
                </div>
            

     



                  </div>
                  
               </div>
          

   



</div>
</div>

   



  <script type="text/javascript">

    $( document ).ready(function() {

          var canUpLoadDescription = false;
          CheckUpload();
      $( "input[name='dissertation_file'").change (function(){
        var fileExtension = ['pdf','csv','doc','docx','ppt', 'pptx'];
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
