<div class="row">
  <div class="col-md-8">
   

		<h2><?php echo $news_detail->title ?> </h2>

    <div class="tool-bar" style="color:#cacaca; margin-bottom: 5px; ">
        <span class="date"><?php echo $news_detail->datetime ?></span>
     </div>

		<div>
			<?php echo	$news_detail->content ?>
		</div>

  </div>
  <div class="col-md-4">
    
  </div>

</div>


  <div class="come-back">
      
     
    <a id = "back_link" href="#"><i style="font-size: 40px;" class="  fa fa-arrow-circle-left"></i></a>
   </div>

   <script type="text/javascript">
  var refer = document.referrer;
  $("#back_link").attr('href',refer);
</script>


	