<style type="text/css" media="screen">


</style>  
 <?php $this->load->view('admin/notification');   ?> 
 
<h3 class="title-page">Quản Lý Bản Tin </h3>
<table id="job_table" class="table table-striped table-bordered hover"  cellspacing="0" width="100%">   






  <div class = "row">
     <div class="col-md-1 col-md-offset-10">      
      <a class= "btn btn-success btn-sm btnAddCountry" href="<?php echo admin_url();?>News/add_News"><i class="fa fa-plus"></i>Add</a>
    </div>

  </div>
  <thead>
    <tr>

      <th>STT</th>               
      <th>TIÊU ĐỀ</th>
      <th>TÓM TẮT</th>
    <!--   <th>Content</th>   -->
     <!--  <th>Category</th>      -->
     <!--  <th>Status </th> -->
     
      <th style = "text-align: center;" width="18%">Thêm Tin</th>

    </tr>
  </thead>
  <tbody>
    <?php
    if (isset($datas)) {
      foreach ($datas as $key => $values) {  ?>
      <tr>
        <td><?=$values->id?></td> 
        <td><?=$values->title?></td>
        <td><?=$values->description?></td>
       <!--  <td><?=$values->content?></td> -->
      
      <!--   <td><?=$values->status?></td>       -->
       <!--  <td><a style="color: blue;
        font-weight: 500;font-size: medium;" target="_blank" href="<?php echo base_url().$values->name_url ?>">nlsearch/<?=$values->name_url?></a></td> -->
        <td style ="text-align: center;">
          <div style="display: inline-flex;">

            <form action ="<?php echo admin_url()?>News/edit_news" method ='POST' >
              <input type="hidden" name="id" value='<?=$values->id?>' >
              <button type="submit" class='btn btn-defaults edit edit_job' data-toggle='modal' data-target='#myModal'><i class="fa fa-edit"> Cập Nhật </i></button> 
            </form>

            <select class="selectpicker blog_status" id="sel1" style= "margin-left: 5px;
            background-color: green;
            border-radius: 5px;
            color: #ffffff;
            font-weight: 500;">
            <option value ="1" >Hoạt động </option>
            <option value = "0" >Không hoạt động </option>
          </select>

        </div>        



      </td>
    </tr>



    <?php  } }?>
  </tbody>



</table>



<!--Model View  country -->
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">blog Detail</h4>
      </div>
      <div class="modal-body">
        <form role="form">


          <div class="form-group">
            <label for="name"></span>Name:</label>           
            <h5 <span id="view_name"> </span> </h5>       
          </div>


          <div class="form-group">
            <label for="name"></span>Contact Name:</label>           
            <h5 <span id="view_contact_name"> </span> </h5>       
          </div>





          <div class="form-group">
            <label for="name"></span>Address</label>
            <h5 <span id="view_address"> </span> </h5>
          </div>                  


          
          <div class="form-group">
            <label for="name"></span>Email</label>
            <h5 <span id="view_contact_email"> </span> </h5>
          </div>                  

          <div class="form-group">
            <label for="name"></span>Phone</label>
            <h5 <span id="view_contact_phone"> </span> </h5>
          </div>        


          <div class="form-group">
            <label for="job_detail"></span>Job Detail</label>          

            <div >
             <table class="table table-bordered" >

               <thead>
                 <tr>
                   <th>Id</th> <th>Name</th>  <th>Decription</th> <th>Link</th>
                 </tr>
               </thead>
               <tbody  id="view_link_job">

               </tbody>
             </table>

           </div>      
         </div>          



       </form>
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
</div>






