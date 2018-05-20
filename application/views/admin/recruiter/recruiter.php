<style type="text/css" media="screen">


</style>  

 <?php $this->load->view('admin/notification');   ?> 
 
<h3 class="title-page"> Recruiter Manager  </h3>
<table id="job_table" class="table table-striped table-bordered hover"  cellspacing="0" width="100%">   


<div class="box">
  

    <form method="post" id="import_csv" enctype="multipart/form-data">
      <div class="form-group">
        <label>Select CSV File</label>
        <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
      </div>
       <div class="download-link" style = "color: #007a00 !important; font-weight: bold; margin-top:9px;"> <a href="<?php echo admin_url()?>support/download_template/<?php  echo $this->uri->segment(2) ?> ">Download csv template</a></div>
        
      <br />
      <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Import CSV</button>
    </form>
    <br />
   
  </div>

   

  <div class = "row">
    <div class="col-md-1 col-md-offset-10">      
      <a class= "btn btn-success btn-sm btnAddCountry" href="<?php echo admin_url();?>recruiter/add_recruiter"><i class="fa fa-plus"></i>Add</a>
    </div>
  </div>
  <thead>
    <tr>
      <th style="display: none;">ID</th>               
      <th>ID</th>                     
      <th>Name</th>
      <th>Country</th>
      <th>Adderss</th>   
      <th>Contact Email</th>
      <th style = "text-align: center;" width="18%">Action</th>

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
      <td><?php
            $qr =  $this->db->where('id',$values->country)->get('country');
            $row = $qr->row_array();   
            echo $row['name'];  ?></td>
      <td><?=$values->address?></td>      
      <td><?=$values->contact_email?></td>
      <td style ="text-align: center;">

       <!--  <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle btn-sm " type="button" data-toggle="dropdown">Action
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <button class='btn btn-success view view_supplier' data-toggle='modal' data-target='#viewModal'><i class="fa fa-bullseye"> View </i></button> 
              <form action ="<?php echo admin_url()?>recruiter/edit_recruiter" method ='POST' >
              <input type="hidden" name="id" value='<?=$values->id?>' >
              <button type="submit" class='btn btn-defaults edit edit_job' data-toggle='modal' data-target='#myModal'><i class="fa fa-edit"> Edit </i></button> 
            </form> -->
               
              <!--  <a class='btn btn-defaults edit edit_job' href="<?php echo admin_url()?>admin/view_edit_job"><i class="fa fa-edit"> Edit </i></a> -->
       <!--        <button class='btn btn-danger delete delete_recruiter'><i class="fa fa-trash-o"> Delete</i></button>
              <select class="selectpicker" id="sel1">
               <option>Active</option>   
               <option>Inactive</option>
             </select>
         </ul>
       </div> -->

       <div style="display: inline-flex;">
               <button class='btn btn-success view view_supplier' data-toggle='modal' data-target='#viewModal'><i class="fa fa-bullseye"> View </i></button> 
              <form action ="<?php echo admin_url()?>recruiter/edit_recruiter" method ='POST' >
              <input type="hidden" name="id" value='<?=$values->id?>' >
              <button type="submit" class='btn btn-defaults edit edit_job' data-toggle='modal' data-target='#myModal'><i class="fa fa-edit"> Edit </i></button> 
            </form> 

            <button row_id='<?=$values->id?>' class='btn btn-danger delete delete_recruiter'><i class="fa fa-trash-o"> Delete</i></button>

             <select class="selectpicker recruiter_status" id="sel1" style= "margin-left: 5px;
            background-color: green;
            border-radius: 5px;
            color: black;
            font-weight: 500;">
           <!--  <option <?php if($values->status == 1 ) echo "selected" ?>  value="1">In progress</option>    -->
            <option <?php if($values->status == 1 ) echo "selected" ?> value="1">Active</option>   
            <option <?php if($values->status == 2 ) echo "selected" ?>  value="2">Inactive</option>
          </select>

        </div>


     </td>
   </tr>



   <?php  } }?>
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
        
        <h5> Do you want delete this recruiter? </h5>

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
        <h4 class="modal-title">Recruiter Detail</h4>
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






