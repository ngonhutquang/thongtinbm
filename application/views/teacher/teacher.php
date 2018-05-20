

<?php  $this->load->view('admin/notification');  ?>
<style>
      .dissertation_list {

         margin-top: 50px;
      }
</style>
<div class="">
<div class=" content">
<div class=" header">
   <h4 class="title title_add">Thông Tin Giang Vien</h4>
</div>
<div class=" body">
  
      <div class="form-group">
         <label for="name"></span>Mã GV</label>
         <div> <span id="view_name_url"><?php echo $teacher->code ?></span> </div>
      </div>
      <div class="form-group">
         <label for="name"></span>Họ Tên Giảng Viên</label>           
         <div> <span id="view_name"> <?php echo $teacher->name ?></span> </div>
       </div>

<!-- 
       <div class="form-group">
         <label for="name"></span>:</label>           
         <div> <span id="view_name"> <?php echo $teacher->name ?></span> </div>
       </div> -->



         <?php if ($dissertation!= null) { ?>
         <div class="form-group">
            <div class = "row dissertation_list">
               <div class="col-md-12"> 

               
               <table id="job_table" class="table table-striped table-bordered hover" style="text-align: center;"  cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th style="display: none;">ID</th>
                        <th>STT</th>
                        <th>Tên Đề Tài</th>
                        <th>Năm Học</th>
                        <th style = "text-align: center;" width="18%">Hoạt động</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        if (isset($dissertation)) {
                        foreach ($dissertation as $key => $values) {  ?>
                     <tr>
                        <td style="display: none;"><?=$values->id?></td>
                        <td><?=++$key?></td>
                        <td><?=$values->title?></td>
                        <td><?=$values->school_year?>-<?=++$values->school_year?></td>
                        <td style ="text-align: center;">
            
             <form action ="<?php echo base_url()?>Teacher/view_dissertation_detail" method ='POST' >
              <input type="hidden" name="id" value='<?=$values->id?>' >
              <button type="submit" class='btn btn-defaults view view_job' data-toggle='modal' data-target='#myModal'><i class="fa fa-bullseye"> <span> <i class="fas fa-download"></i> </span> </i></button> 
            </form>  

                 
                           
                        </td>
                     </tr>
                     <?php } } }?>
                  </tbody>
               </table>
               </div>
 
   </div>
   </div>
   </div>
</div>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
