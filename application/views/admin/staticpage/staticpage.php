<style type="text/css" media="screen">


</style>  

 <?php $this->load->view('admin/notification');   ?> 
 
<h3 class="title-page">Quản Lý Trang Tĩnh</h3>
<table id="job_table" class="table table-striped table-bordered hover"  cellspacing="0" width="100%">   





<!-- 
  <div class = "row">
     <div class="col-md-1 col-md-offset-10">      
      <a class= "btn btn-success btn-sm btnAddCountry" href="<?php echo admin_url();?>staticpage/add_staticpage"><i class="fa fa-plus"></i>Add</a>
    </div>

  </div> -->
  <thead>
    <tr>

      <th>STT</th>               
      <th>Tên trang</th>
      <th>Tên Đường dẫn</th>     
     <!--  <th>Status </th> -->
      <th>Đường dẫn</th>
      <th style = "text-align: center;" width="18%">Hành động</th>

    </tr>
  </thead>
  <tbody>
    <?php
    if (isset($datas)) {
      foreach ($datas as $key => $values) {  ?>
      <tr>
        <td><?=$values->id?></td> 
        <td><?=$values->title?></td>
        <td><?=$values->name_url?></td>
      <!--   <td><?=$values->content?></td> -->
      <!--   <td><?=$values->status?></td>       -->
        <td><a style="color: blue;
        font-weight: 500;font-size: medium;" target="_blank" href="<?='../'.$values->name_url?>">/<?=$values->name_url?></a></td>
        <td style ="text-align: center;">
          <div style="display: inline-flex;">

            <form action ="<?php echo admin_url()?>staticpage/edit_staticpage" method ='POST' >
              <input type="hidden" name="id" value='<?=$values->id?>' >
              <button type="submit" class='btn btn-defaults edit edit_job' data-toggle='modal' data-target='#myModal'><i class="fa fa-edit">Cập nhật </i></button> 
            </form>

            <select class="selectpicker" id="sel1" style= "margin-left: 5px;
            background-color: green;
            border-radius: 5px;
            color: black;
            font-weight: 500;">
            <option>Hoạt động</option>   
            <option>Không hoạt động</option>
          </select>

        </div>


        



      </td>
    </tr>



    <?php  } }?>
    
  </tbody>



</table>








