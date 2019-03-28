





<div style="background-color:  #FFFFFF;">
<br><br>

<br>
<div class="master-container">
	<div class="container">
	<h3 class="widget-title">Comissões</h3>
	<br>
	<div class="textwidget">
	<div class="logo-panel">
		<div class="row">
		<?php  foreach ($funcionarios as $row) { ?>
			<div class="col-sm-3 col-sm-3">
			<img src="<?=  base_url()?>uploads/funcionarios/<?php if($row->img == ""){ $img = "default.png";}else{$img = $row->img;} echo '7'."/". $img; ?> " alt="Client" width="210" height="210">
			<br> <font color="black"><?php echo $row->nome ?></font> <br>
			<?php echo $row->cargo ?> <br>
			<?php echo $row->sala ?> <br>
			Email: <?php echo $row->email ?><br>
			</div>
		<?php } ?>
			</div>
	</div>
</div>

	
	<div class="spacer"></div>

												
	</div>
	</div>
	
												
</div>
											