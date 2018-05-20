 
 <div class="">
    <div class=" content">
      <div class=" header">
          
        <h4 class="title title_add">Add Attribute</h4>
      </div>
      <div class=" body">
	<!-- 	  <div class="form-error">   <?php echo validation_errors(); ?> </div>  -->

         <form id="add_form" name='add_master_category' action='<?php echo admin_url();?>/attribute/do_add_attribute' method='POST'>   
          <span id="error">   </span>

          <div class="form-group">
            <label for="name"></span>Name</label> 

            <input type="text" class="form-control" id="add_title"  name="name"  value="<?php echo set_value('name'); ?>"  placeholder="Enter Name">            
             <div class="form-error"> <?php echo form_error('name')?> </div> 
          </div>
              

           <div class="form-group">
            <label for="code"></span>Description</label>
            <input type="text" class="form-control" id="add_description"  name="description"  placeholder="Enter Description">
               <div class="form-error"> <?php echo form_error('description')?> </div> 
          </div>
          
          <div class="form-group">
            <label for="sel1">Data-Type:</label>
            <select class="form-control" id="add_status" name="data_type">
              <?php foreach ($data_type as $key => $value) { ?>
                     <option value="<?=$value->id?>"><?=$value->name?></option>
              <?php } ?>
                                  
            </select>
          </div>


          <div class="form-group">
            <label for="sel1">Category:</label>
            <select class="form-control" id="add_status" name="category">
              <?php foreach ($category as $key => $value) { ?>
                     <option value="<?=$value->id?>"><?=$value->name?></option>
              <?php } ?>
                                  
            </select>
          </div>

          <!--  <div class="form-group">
            <label for="code"></span>Max-Value-Length</label>
            <input type="num" class="form-control" id="add_description"  name="value_max_length" value="<?php echo set_value('value_max_length'); ?>" placeholder="Enter number">
               <div class="form-error"> <?php echo form_error('value_max_length')?> </div> 
          </div> -->
<!-- 
           <div class="form-group">
            <label for="code"></span>Option Key Value Pair</label>
            <input type="text" class="form-control" id="add_description"  name="option_keyvalue_pair" value="<?php echo set_value('option_keyvalue_pair'); ?>" placeholder="Enter Country Code">
               <div class="form-error"> <?php echo form_error('option_keyvalue_pair')?> </div> 
          </div> -->

           
          <div class="form-group">
            <label for="sel1">Display-Mode:</label>
            <select class="form-control" id="add_status" name="display_mode">
            <?php foreach ($attribute_display_mode as $key => $value) { ?>
                  <option value="<?=$value->id?>"> <?=$value->name?></option>

            <?php } ?>             
                          
            </select>
          </div>

          
          <div class="form-group">
            <label for="sel1">Type:</label>
            <select class="form-control" id="add_status" name="type">
            <?php foreach ($attribute_type as $key => $value) { ?>
                  <option value="<?=$value->id?>"> <?=$value->name?></option>

            <?php } ?>             
                          
            </select>
          </div>



            <div class="form-group">
            <label for="code"></span>Image-Url</label>
            <input type="text" class="form-control" id="Image_url"  name="image_url" placeholder="Enter Image-Url" value="<?php echo set_value('image_url'); ?>">
               <div class="form-error"> <?php echo form_error('image_url')?> </div> 
          </div>   

           <div class="form-group">
            <label for="code"></span>Alt-text</label>
            <input type="text" class="form-control" id="add_code"  name="alt_text" placeholder="Enter Alt-text" value="<?php echo set_value('alt_text'); ?>">
               <div class="form-error"> <?php echo form_error('alt_text')?> </div> 
          </div>
         <!--   <div class="form-group">
            <label for="code"></span>Is Filterable</label>
            <input type="text" class="form-control" id="add_code"  name="is_filterable" placeholder="Enter Country Code" value="<?php echo set_value('is_filterable'); ?>">
               <div class="form-error"> <?php echo form_error('is_filterable')?> </div> 
          </div> -->
         
          <div class="form-group">
            <label for="sel1">Status:</label>
            <select class="form-control" id="add_status" name="status">
              <option>1</option>
              <option>2</option>            
            </select>
          </div>
      <button type="submit" class="btn btn-default btn-success btn-block" id="btnAdd" ></span>Add</button>
        </form>
      </div>
     
     
    </div>
  </div>
</div>
