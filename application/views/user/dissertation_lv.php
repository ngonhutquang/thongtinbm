<style>
	.content{
		position: relative;

	}
	.paging {
    left: 50px;
    position: absolute;
    bottom: 0px;

	}

</style>

	

<div class="ds-title">
	<h3>Danh Sách Đề Tài Luận Văn</h3>
</div>
<ul>

<?php 
	
	if (isset ($results)) { 

		foreach ($results as $key => $value) {
		?>
		

		
			
			
				<li>

                                    <h4 class="title"><a target="_blank" href="<?=base_url('chi-tiet-de-tai'.'/'. str_replace('+','-',urlencode(htmlspecialchars_decode($value->title))).'/'.$value->id)?>"><?php echo $value->title ?> </a>
                                    </h4>
				</li>
			

	<?php } } ?>

</ul>


	<div class="paging">
		<?php echo $links; ?> 
	</div>
	


