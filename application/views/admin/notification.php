<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->


<div class ="col-md-5 col-md-offset-3 notification_delete"  style = "position: absolute;">  
  <div class="alert alert-success " style = "border-radius: 5px;
    background-color: #dff0d8; color: #3c763d; font-weight: bold;
    height: 40px; width: 200px;   margin: auto;     text-align: center;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               Delete success!
  </div>
</div>

<div class ="col-md-5 col-md-offset-3 notification_update"  style = "position: absolute;">  
  <div class="alert alert-success " style = "border-radius: 5px;
    background-color: #dff0d8; color: #3c763d; font-weight: bold;
    height: 40px; width: 200px;   margin: auto;     text-align: center;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               Update success!
  </div>
</div>


<div class ="col-md-5 col-md-offset-3 notification_add"  style = "position: absolute;">  
  <div class="alert alert-success " style = "border-radius: 5px;
    background-color: #dff0d8; color: #3c763d; font-weight: bold;
    height: 40px; width: 200px;   margin: auto;     text-align: center;">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               Add success!
  </div>
</div>







<!-- <div class="loader"></div> -->

<div style = "position: relative;">
  

 <div style="position: absolute;" class="col-md-1 col-md-offset-5 loadersmall">
 </div>
</div>


<div class="notification_show">
  
</div>

<?php if ($this->session->userdata('notification_data') != null)
        {

          $show_notification = $this->session->userdata('notification_data');

            echo $show_notification;

         
             $this->session->unset_userdata('notification_data');


        }




 ?>