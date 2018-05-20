<?php  
  $this->load->model('Data_Type_Model');
  $this->load->model('Attribute_Type_Model');
  
 
 
?>
 <?php $this->load->view('admin/notification');   ?> 
<h3 class="title-page"> Attribute Manager  </h3>
<table id="job_table" class="table table-striped table-bordered hover"  cellspacing="0" width="100%">    

  <div class = "row">
    <div class="col-md-1 col-md-offset-10">      
      <a class= "btn btn-success btn-sm btnAddCountry" href="<?php echo admin_url();?>attribute/add_attribute"><i class="fa fa-plus"></i>Add</a>
    </div>
  </div>
  <thead>
    <tr>

      <th>ID</th>               
      <th>name</th>
      <th>Description</th>
      <th>Data_Type</th>   
      <th>status</th>
      <th style = "text-align: center;" width="18%">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php
   
    foreach ($job as $key => $values) {  ?>
    <tr>
      <td><?=$values->id?></td> 
      <td><?=$values->name?></td>
      <td><?=$values->description?></td>
      <td><?php $data_type_row = $this->Data_Type_Model->get_data_type_info($values->data_type); echo $data_type_row->name ?></td>      
      <td><?php $attribute_type = $this->Attribute_Type_Model->get_attribute_type_info($values->status); echo $attribute_type->name ?></td>
      <td style ="text-align: center;">

        <!-- <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle btn-sm " type="button" data-toggle="dropdown">Action
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <button class='btn btn-success view view_attribute' data-toggle='modal' data-target='#viewModal'><i class="fa fa-bullseye"> View </i></button> 
              <form action ="<?php echo admin_url()?>attribute/edit_attribute" method ='POST' >
              <input type="hidden" name="id" value='<?=$values->id?>' >
              <button type="submit" class='btn btn-defaults edit edit_job' data-toggle='modal' data-target='#myModal'><i class="fa fa-edit"> Edit </i></button> 
            </form> -->
               
              <!--  <a class='btn btn-defaults edit edit_job' href="<?php echo admin_url()?>admin/view_edit_job"><i class="fa fa-edit"> Edit </i></a> -->
        <!--       <button class='btn btn-danger delete delete_job'><i class="fa fa-trash-o"> Delete</i></button>
              <select class="selectpicker" id="sel1">
               <option>Active</option>   
               <option>Inactive</option>
             </select>
         </ul>
       </div> -->

      
       <div style="display: inline-flex;">
          <button class='btn btn-success view view_attribute' data-toggle='modal' data-target='#viewModal'><i class="fa fa-bullseye"> View </i></button> 
              <form action ="<?php echo admin_url()?>attribute/edit_attribute" method ='POST' >
              <input type="hidden" name="id" value='<?=$values->id?>' >
              <button type="submit" class='btn btn-defaults edit edit_job' data-toggle='modal' data-target='#myModal'><i class="fa fa-edit"> Edit </i></button> 
            </form>
            
           <button row_id="<?=$values->id?>" class='btn btn-danger delete delete_attribute'><i class="fa fa-trash-o"> Delete</i></button>
          <select class="selectpicker attribute_status" id="sel1" style= "margin-left: 5px;
            background-color: green;
            border-radius: 5px;
            color: #ffffff;
            font-weight: 500;">             
            <option <?php if($values->status == 1 ) echo "selected" ?> value="1">Active</option>   
            <option <?php if($values->status == 2 ) echo "selected" ?>  value="2">Inactive</option>
          </select>

        </div>




     </td>
   </tr>



   <?php  } ?>
 </tbody>



</table>


<!-- Delete Confirm -->
<div class="modal fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style = "     background-color: unset;">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="frm_title">Delete</h4>
      </div>
      <div class="modal-body" id="frm_body">
        
        <h5> Do you want delete this attribute? </h5>

      </div>
      <div class="modal-footer" style ="background-color: unset;">
        <button style ="background-color: #73060d; border-color: #73060d; color: #FFF;"    type="button" class="btn btn-primary col-sm-2 pull-right" id="frm_submit">Yes</button>

        <button style='margin-right: 10px; background-color: #337ab7; color: #FFF; border-color: #337ab7' type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>
      </div>
    </div>
  </div>
</div>







<!--Model View  country -->
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Attribute Detail</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          

          <div class="form-group">
            <label for="name"></span>Name:</label>           
            <h5 <span id="view_name"> </span> </h5>       
          </div>
            

       
           <div class="form-group">
            <label for="code"></span>Description</label>
            <h5 <span id="view_description"> </span> </h5>       
           </div>
            
           <div class="form-group">
            <label for="code"></span>Image URL</label>
            <h5 <span id="view_image_url"> </span> </h5>       
           </div>

            <div class="form-group">
            <label for="code">Alt Text</span></label>
            <h5 <span id="view_alt_text"> </span> </h5>
          </div>


          <div class="form-group">
            <label for="code"></span>Data Type</label>
            <h5 <span id="view_data_type"> </span> </h5>
          </div>


          <div class="form-group">
            <label for="code"></span>Display Mode</label>
           <h5 <span id="view_display_mode"> </span> </h5>
          </div>

          <div class="form-group">
            <label for="code"></span>Type</label>
            <h5 <span id="view_type"> </span> </h5>
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






