





<div style="background-color:  #FFFFFF;">
<br><br>

<br>
<div class="master-container">
	<div class="container">
	<h3>TV CÂMARA</h3><br>
	<?php foreach ($video as $row) {

	?>

	<div class="col-md-4 col-sm-4">
	<h4><?php echo $row->titulo ?></h4>
	<a data-fancybox="group" href="<?php echo 'https://www.youtube.com/watch?v='.$row->link_video ?>">
	<img src="<?php echo $row->link_img ?>">
	<br>
	<br>
	</a>
	
	</div>

	<?php } ?>
      
	<div class="spacer">  </div>

										
	</div>
    <div align="center"> <?=$pagination?></div>	
	</div>
	
												
</div>
											