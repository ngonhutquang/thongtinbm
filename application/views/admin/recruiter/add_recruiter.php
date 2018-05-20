 
 <div class="">
    <div class=" content">
      <div class=" header">
          
        <h4 class="title title_add">Add Recruiter</h4>
      </div>
      <div class=" body">
		  <div class="form-error">   <?php echo validation_errors(); ?> </div> 

         <form id="add_form" name='add_master_category' action='<?php echo admin_url();?>recruiter/do_add_recruiter' method='POST'>   
          <span id="error">   </span>

          <div class="form-group">
            <label for="name"></span>Name</label> 

            <input type="text" class="form-control" id="add_title"  name="name"  value="<?php echo set_value('name'); ?>"  placeholder="Enter Name">            
             <div class="form-error"> <?php echo form_error('name')?> </div> 
          </div>
              

         
          
          <div class="form-group">
            <label for="sel1">Country:</label>
            <select class="form-control" id="add_status" name="country">
              <?php foreach ($country as $key => $value) { ?>
                     <option value="<?=$value->id?>"><?=$value->name?></option>
              <?php } ?>
                                  
            </select>
          </div>

           <div class="form-group">
            <label for="code"></span>Address</label>
            <input type="num" class="form-control" id="add_description"  name="address"  placeholder="Enter Address">
               <div class="form-error"> <?php echo form_error('value_max_length')?> </div> 
          </div>

           <div class="form-group">
            <label for="code"></span>Contact Name</label>
            <input type="text" class="form-control" id="add_description"  name="contact_name"  placeholder="Enter Contact Name">
               <div class="form-error"> <?php echo form_error('option_keyvalue_pair')?> </div> 
          </div>

              <div class="form-group">
            <label for="code"></span>Contact Email</label>
            <input type="text" class="form-control"   name="contact_email" placeholder="Enter Contact Email" >
               <div class="form-error"> <?php echo form_error('image_url')?> </div> 
          </div>

            <div class="form-group">
            <label for="code"></span>Contact Phone</label>
            <input type="text" class="form-control"   name="contact_phone" placeholder="Enter Contact Phone" >
               <div class="form-error"> <?php echo form_error('image_url')?> </div> 
          </div>

          <!-- <div class="form-group">
            <label for="code"></span>Password</label>
            <input type="password" class="form-control" id="Image_url"  name="password" placeholder="Enter Password" value="<?php echo set_value('image_url'); ?>">
               <div class="form-error"> <?php echo form_error('image_url')?> </div> 
          </div>

           <div class="form-group">
            <label for="code"></span>Repass</label>
            <input type="password" class="form-control" id="Image_url"   placeholder="Enter RePassword" value="<?php echo set_value('image_url'); ?>">
               <div class="form-error"> <?php echo form_error('image_url')?> </div> 
          </div>  -->     
        
          
         
      <button type="submit" class="btn btn-default btn-success btn-block" id="btnAdd" ></span>Add</button>
        </form>
      </div>
     
     
    </div>
  </div>
</div>
