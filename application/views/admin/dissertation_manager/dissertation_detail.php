<!--Model add country -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous"> 

<!-- Modal -->
<style>
  #view_detail {
    text-align: justify;                
  }
</style>

<div class="content-detail">
   <div class=" content">
      <div class=" header">
         <h4 class="title title_add">Thông Tin Luận Văn, Tiểu Luận</h4>
      </div>
      <div class=" body">
         <div class>
            <div class="form-error">  <?php //echo validation_errors(); ?> </div>
            <?php if (isset ($variable)) { ?>
            <form role="form">
               <div class="form-group">
                  <label for="name"></span>Mã đề tài:</label>           
                  <div <span id="view_name"> <?php echo $variable->dissertation_code ?> </span> </div>       
               </div>
                 <div class="form-group">
                  <label for="name"></span>Tên đề tài:</label>           
                  <div <span id="view_name"> <?php echo $variable->title ?> </span> </div>       
               </div>
              
                 <div class="form-group">
                  <label for="name"></span>Sinh viên thực hiện:</label>           
                  <ul>
                    <?php foreach ($student_list as $key => $sd) {
                    ?>
                        <li><?php echo $sd->name ?></li>
                   <?php } ?>
                  </ul>    
               </div>
                 <div class="form-group">
                  <label for="name"></span>Giáo viên hướng dẫn:</label>           
                  <ul>
                    <?php foreach ($teacher_list as $key => $tc) {
                    ?>
                        <li><?php echo $tc->name ?></li>
                   <?php } ?>
                  </ul>    
               </div>



               <div class="form-group">
                  <label for="name"></span></label>           
                  <?php if ($variable->status == 1) { ?>
                     <div style ="margin-left: 20px; margin-top: 0px;"> <span id="view_name_url">

                      <a href="<?php echo base_url('admin/Dissertation_Manager/download_dissertation/').$dissertation_detail[0]->file_url?> "><i class="fas fa-download"></i></a> </span> </div>
            <?php          
                  } ?>
 
               </div>

                <div class="form-group">
                  <label for="name"></span>Tóm tắt đề tài:</label>           
                  <div class="col-md-12" id="view_detail">
                    <?php echo $variable->summary ?> 
                  </div>       
               </div>
                
               </form>
              
             
         <?php } ?>
    <div class="come-back">
      
    
    <a  href="<?php echo admin_url('dissertation-manager/') ?>"><i style="font-size: 40px;" class="  fa fa-arrow-circle-left"></i></a>
   </div>

   </div>
</div>
</div>
