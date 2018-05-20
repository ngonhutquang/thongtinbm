edit_recruiter 
 <div class="">
    <div class=" content">
      <div class=" header">
        
        <h4 class="title title_add">Edit Recruiter</h4>
      </div>
      <div class=" body">
      <div class="form-error">   <?php echo validation_errors(); ?> </div> 

         <form name='add_master_category' action='<?php echo admin_url();?>recruiter/editing_recruiter' id="add_form" method='POST'>   
          <span id="error">   </span>

          <div class="form-group">
            <label for="name"></span>Name</label> 
            <input type='hidden' name="id" value='<?=$variable->id?>'' >  
            <input type="text" class="form-control" id="add_title"  name="name"  value="<?=$variable->name ?>"  placeholder="Enter Country Name">            
             <div class="form-error"> <?php echo form_error('name')?> </div> 
          </div>

              

          
          

          <div class="form-group">
            <label for="sel1">Country:</label>
               

            <select class="form-control" id="add_status" name="country">
               <?php foreach ($countrys as $key => $value) { ?>
                     <option <?php if ( $variable->country == $value->id) echo 'selected'; ?>  value="<?=$value->id?>"><?=$value->name?></option>
              <?php } ?>
        

                                  
            </select>
          </div>

          <div class="form-group">
            <label for="name"></span>Contact Name</label> 
          
            <input type="text" class="form-control"  name="contact_name"  value="<?=$variable->contact_name ?>"  placeholder="Enter Country Name">            
             <div class="form-error"> <?php echo form_error('name')?> </div> 
          </div>

        
         <div class="form-group">
            <label for="name"></span>Contact Email</label> 
           
            <input type="text" class="form-control"  name="contact_email"  value="<?=$variable->contact_email ?>"  placeholder="Enter Country Name">            
             <div class="form-error"> <?php echo form_error('name')?> </div> 
          </div>
        

          <div class="form-group">
            <label for="name"></span>Address</label> 
        
            <input type="text" class="form-control"   name="address"  value="<?=$variable->address ?>"  placeholder="Enter Country Name">            
             <div class="form-error"> <?php echo form_error('name')?> </div> 
          </div>

           <div class="form-group">
            <label for="name"></span>PassWord</label> 
        
            <input type="password" class="form-control"  name="password"  value="<?=$variable->password ?>"  placeholder="Enter PassWord">            
             <div class="form-error"> <?php echo form_error('name')?> </div> 
          </div>

         

       <button type="submit" class="btn btn-default btn-success btn-block" id="btnEdit" ></span>Save</button>
        </form>
      </div>
     
     
    </div>
  </div>
</div>
