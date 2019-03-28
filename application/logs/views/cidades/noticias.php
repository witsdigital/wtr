
<div style="background-color:  #FFFFFF;">
<br><br>
<br>
<div class="master-container">
	<div class="container">
	
	<div class="col-md-7">
	
					<?php

				foreach ($noticias as $rownot) {
				   
					?>
								<a href="<?=  base_url('camaras/condeuba')?>/noticia/<?php echo $rownot->id?>">
									<img width="600" height="400" src="<?=  base_url()?>uploads/noticias/7/<?php echo $rownot->img?>" alt="Content Image"/>
								</a>
								<div class="page-box__content">
									<h5 class="page-box__title  text-uppercase">
																		<a href="<?=  base_url('camaras/condeuba')?>/noticia/<?php echo $rownot->id?>"><?php echo $rownot->titulo?></span></a>
									</h5>
									<?php echo  substr($rownot->conteudo, 0,500) ?>	...
																	   </span><p style="text-align: justify;">
										<a href="<?=  base_url('camaras/') ?>7/noticia/<?php echo $rownot->id?>" class="read-more read-more--page-box">Saiba Mais</a>
									</p>
								</div>
								
						
				<br>
				<br>		
					
					
				<?php }
				?>
	</div>

	

<div class="col-xs-12  col-md-5">
    <div class="sidebar">
        <div class="widget  widget_search  push-down-30">
            <form role="search" method="get" class="search-form">
                <label>
                    <span class="screen-reader-text">Buscar por:</span>
                    <input type="search" class="search-field" placeholder="Digite a busca..." value="" name="s" title="Search for:"/>
                </label>
                <input type="submit" class="search-submit" value="Buscar"/>
            </form>
        </div>		
    </div>
</div>
				
</div>
    <center><?php echo $pagination; ?></center>
   
				</div>
												
	</div>
												
</div>
											