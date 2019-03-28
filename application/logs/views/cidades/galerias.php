
<div style="background-color:  #FFFFFF;">
<br><br>
<br>
<div class="master-container">
<div class="content">



<div class="services-content">
	<div class="container">


		<div class="row">
		<?php foreach ($eventos as $ev){?>
			<div class="col-md-4" style="border-right: solid 1px; margin-bottom: 10px;">
					
					
						<div class="product">
							<div class="product-thumb">
<!--                                    <a><img src="images/shop/1.jpg" alt=""></a>-->
							</div>
							<div class="product-description clearfix">
								<h3><a href="<?=  base_url('portal/galeria')?>/<?php echo $ev->key?>"><?php echo $ev->titulo?></a></h3>
								<p class="price"><?php echo date('d/m/Y',  strtotime($ev->data))?></p>
								<span class="double-border"></span>
<!--                                    <a href="#." class="product-cart-btn pull-left"><i class="icon-basket"></i> Add to cart</a>-->
								<a href="<?=  base_url('portal/galeria')?>/<?php echo $ev->key?>" class="product-detail-btn pull-right"><i class="icon-browser"></i> Detalhes</a>
							</div>
						</div>
					
					
			</div>
			<?php }?>
			
		</div>


	</div>
</div>


</div>
				<div class="spacer"></div>

												
	</div>
												
</div>
											