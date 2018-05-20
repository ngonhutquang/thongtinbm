 
 <div class="">
    <div class=" content">
      <div class=" header">
        
        <h4 class="title title_add">Edit Attribute</h4>
      </div>
      <div class=" body">
      <div class="form-error">   <?php echo validation_errors(); ?> </div> 

         <form name='add_master_category' action='<?php echo admin_url();?>attribute/editing_attribute' id="add_form" method='POST'>   
          <span id="error">   </span>

          <div class="form-group">
            <label for="name"></span>Name</label> 
            <input type='hidden' name="id" value='<?=$variable->id?>'' >  
            <input type="text" class="form-control" id="add_title"  name="name"  value="<?=$variable->name ?>"  placeholder="Enter Country Name">            
             <div class="form-error"> <?php echo form_error('name')?> </div> 
          </div>
              

           <div class="form-group">
            <label for="code"></span>Description</label>
            <input type="text" class="form-control" id="add_description"  name="description" value="<?=$variable->description?>" placeholder="Enter Country Code">
               <div class="form-error"> <?php echo form_error('description')?> </div> 
          </div>
          

          <div class="form-group">
            <label for="sel1">Data-Type:</label>
               

            <select class="form-control" id="add_status" name="data_type">
               <?php foreach ($datatype as $key => $value) { ?>
                     <option <?php if ( $variable->data_type == $value->id) echo 'selected'; ?>  value="<?=$value->id?>"><?=$value->name?></option>
              <?php } ?>
        

                                  
            </select>
          </div>

            <div class="form-group">
            <label for="sel1">Category:</label>
               

            <select class="form-control" id="add_status" name="data_type">
               <?php foreach ($category as $key => $value) { ?>
                     <option <?php if ( $variable->data_type == $value->id) echo 'selected'; ?>  value="<?=$value->id?>"><?=$value->name?></option>
              <?php } ?>
        

                                  
            </select>
          </div>


           <div class="form-group">
            <label for="code"></span>Max-Value-Length</label>
            <input type="num" class="form-control" id="add_description"  name="value_max_length" value="<?=$variable->value_max_length?>" placeholder="Enter number">
               <div class="form-error"> <?php echo form_error('value_max_length')?> </div> 
          </div>

           <div class="form-group">
            <label for="code"></span>Option Key Value Pair</label>
            <input type="text" class="form-control" id="add_description"  name="option_keyvalue_pair" value="<?=$variable->option_keyvalue_pair?>" placeholder="Enter Country Code">
               <div class="form-error"> <?php echo form_error('option_keyvalue_pair')?> </div> 
          </div>

           
          <div class="form-group">
            <label for="sel1">Display-Mode:</label>
            <?=$variable->display_mode ?>
            <select class="form-control" id="add_status" name="display_mode">
            <?php foreach ($attribute_display_mode as $key => $value) { ?>
                  <option <?php if ( $variable->display_mode == $value->id) echo 'selected'; ?>  value="<?=$value->id?>"> <?=$value->name?></option>

            <?php } ?>             
                          
            </select>
          </div>

         
          <div class="form-group">
            <label for="sel1">Type:</label>
            <select class="form-control" id="add_status" name="type">
            <?php foreach ($attribute_type as $key => $value) { ?>
                  <option <?php if ( $variable->type == $value->id) echo 'selected'; ?>  value="<?=$value->id?>"> <?=$value->name?></option>

            <?php } ?>             
                          
            </select>
          </div>



            <div class="form-group">
            <label for="code"></span>Image-Url</label>
            <input type="text" class="form-control" id="Image_url"  name="image_url" placeholder="Enter Country Code" value="<?=$variable->image_url?>">
               <div class="form-error"> <?php echo form_error('image_url')?> </div> 
          </div>   

           <div class="form-group">
            <label for="code"></span>Alt-text</label>
            <input type="text" class="form-control" id="add_code"  name="alt_text" placeholder="Enter Country Code" value="<?=$variable->image_url?>">
               <div class="form-error"> <?php echo form_error('alt_text')?> </div> 
          </div>
           <div class="form-group">
            <label for="code"></span>Is Filterable</label>
            <input type="text" class="form-control" id="add_code"  name="is_filterable" placeholder="Enter Country Code" value="<?=$variable->is_filterable?>">
               <div class="form-error"> <?php echo form_error('is_filterable')?> </div> 
          </div>
         
          <div class="form-group">
            <label for="sel1">Status:</label>
            <select class="form-control" id="add_status" name="status">
              <option>1</option>
              <option>2</option>            
            </select>
          </div>
       <button type="submit" class="btn btn-default btn-success btn-block" id="btnEdit" ></span>Save</button>
        </form>
      </div>
     
     
    </div>
  </div>
</div>
