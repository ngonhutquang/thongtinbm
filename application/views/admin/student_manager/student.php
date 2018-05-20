
<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
 


   
 <?php $this->load->view('admin/notification');   ?> 

 

<table id="job_table" class="table table-striped table-bordered hover"  cellspacing="0" width="100%">  
  <h3 class="title-page"> Quản Lý Sinh Viên  </h3>





<div class="box">
  

    <form method="post" id="import_csv" enctype="multipart/form-data">
      <div class="form-group">
        <label>Chọn tập tin csv</label>
        <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
        <div class="download-link" style = "color: #007a00 !important; font-weight: bold; margin-top:9px;"> <a href="<?php echo admin_url()?>support/download_template/<?php  echo $this->uri->segment(2) ?> ">Download csv template</a></div>
        
      </div>
      <br />
      <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Nhập dữ liệu CSV</button>
    </form>
    <br />
   
  </div>


   <div class = "row">
    <div class="col-md-1 col-md-offset-10">      
      <a style="margin-bottom: 15px;" class= "btn  btn-sm btnAddCountry" href="<?php echo admin_url();?>Student_Manager/add_student"><i class="fa fa-plus"></i>Thêm</a>
    </div>
  </div>
  <thead>
    <tr>
        <th style="display: none;">ID</th>               
      <th>STT</th>    
      <th>Tên</th>
      
     <!--  <th>Description</th>  -->  
    <!--   <th>Type</th> -->
      <th style = "text-align: center;" width="18%">Hoạt động</th>

    </tr>
  </thead>
  <tbody>
    <?php
    if (isset($datas)) {
    foreach ($datas as $key => $values) {  ?>
    <tr>
      <td style="display: none;"><?=$values->id?></td> 
      <td><?=++$key?></td> 
    
      <td><?=$values->name?></td>
     
      
      <td style ="text-align: center;">


        <div style="display: inline-flex;">
            


             <form action ="<?php echo admin_url()?>Student_Manager/view_student_detail" method ='POST' >
              <input type="hidden" name="id" value='<?=$values->id?>' >
              <button type="submit" class='btn btn-defaults view view_job' data-toggle='modal' data-target='#myModal'><i class="fa fa-bullseye"> Xem </i></button> 
            </form>  


            <form action ="<?php echo admin_url()?>Student_Manager/edit_student" method ='POST' >
              <input type="hidden" name="id" value='<?=$values->id?>' >
              <button type="submit" class='btn btn-defaults edit edit_job' data-toggle='modal' data-target='#myModal'><i class="fa fa-edit"> Cập nhật </i></button> 
            </form> 

             <button class='btn btn-danger delete delete_student' row_id='<?=$values->id?>'><i class="fa fa-trash-o"> Xóa</i></button>

           <select class="selectpicker student_status" id="sel1" style= "margin-left: 5px;
            background-color: green;
            border-radius: 5px;
            color: #ffffff;
            font-weight: 500;">
            <option <?php if($values->status == 1 ) echo "selected" ?> value= 1    >Hoạt động</option>
            <option <?php if($values->status == 0 ) echo "selected" ?> value= 0    >Không hoạt động</option>
          <!--   <option value="1">Active</option>   
            <option <?php if($values->status == 2 ) echo "selected" ?> value="2">Inactive</option>   
             <option <?php if($values->status == 3 ) echo "selected" ?>  value="3">Out of stock</option>
            <option <?php if($values->status == 4 ) echo "selected" ?>  value="4">In progress</option> -->
           
          </select>

        </div>

     </td>
   </tr>



   <?php  } }?>
 </tbody>



</table>





<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Bạn có muốn xóa giảng viên này?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="modal-btn-si">Yes</button>
        <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
      </div>
    </div>
  </div>
</div>

<div class="alert" role="alert" id="result"></div>




<!-- Delete Confirm -->
<div class="modal fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style = "     background-color: unset;">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="frm_title">Delete</h4>
      </div>
      <div class="modal-body" id="frm_body">
        
        <h5> Bạn có muốn xóa giảng viên này? </h5>

      </div>
      <div class="modal-footer" style ="background-color: unset;">
        <button style ="background-color: #73060d; border-color: #73060d; color: #FFF;"   type="button" class="btn btn-primary col-sm-2 pull-right" id="frm_submit">Có</button>

        <button style='margin-right: 10px; background-color: #337ab7; color: #FFF; border-color: #337ab7' type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">Không</button>
      </div>
    </div>
  </div>
</div>


 <!-- <a class = "formConfirm" href="">Delete Ledger</a>
 -->

<script>
  
  
</script>


<script>
$(document).ready(function(){
 
  $('#import_csv').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"<?php echo admin_url(); ?>csv_import/import",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import_csv_btn').html('Importing...');
      },
      success:function(data)
      {
        
        $('#import_csv')[0].reset();
        $('#import_csv_btn').attr('disabled', false);
        $('#import_csv_btn').html('Import Done');
         location.reload();
        //load_data();
      }
    })
  });
  
});
</script>
<!-- 
<?php 
 if  ( $this->session->unset_userdata('notification_data')!= null) {
           $this->session->unset_userdata('notification_data');

 }
 ?> -->