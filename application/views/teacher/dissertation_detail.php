<!--Model add country -->

<!-- Modal -->


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
                  <label for="name"></span>Tóm tắt:</label>           
                  <div  id="view_detail">
                    <?php echo $variable->summary ?> 
                  </div>       
               </div>

            <?php   if (isset ($dissertation_detail) && $dissertation_detail[0] != null ) { ?>
               <div class="form-group">
                  <label for="name"></span>Tải luận văn:</label>           
                  <div style = "margin-left : 20px; ">
                    <a href="<?php echo base_url('Teacher/download_dissertation/').$dissertation_detail[0]->file_url?> ">Tải luận văn</a>
                  </div>       
               </div>
  <?php } ?>

                
               
              
             
         <?php } ?>
    <div class="come-back">
      
    
    <a  href="<?php echo base_url('teacher') ?>"><i style="font-size: 40px;" class="  fa fa-arrow-circle-left"></i></a>
   </div>

   </div>
</div>
</div>
