





<div style="background-color:  #FFFFFF;">
<br><br>

<br>
<div class="master-container">
	<div class="container">
	<center>
	<?php foreach ($eventos as $row) {

	?>

		

	<a href="<?= base_url() ?>uploads/galeria/<?php echo $row->arquivo ?>" data-fancybox="group" >
	<img style="margin: 10px; width: 150px; height: 125px; " src="<?= base_url() ?>uploads/galeria/<?php echo $row->arquivo ?>" alt="" />
	</a>
	

	<?php } ?>
	</center>
	<div class="spacer"></div>

												
	</div>
	</div>
	
												
</div>
											