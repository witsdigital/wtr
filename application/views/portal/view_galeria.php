    <div class="main-container container" id="main-container">
			<h2><?php echo $info[0]->titulo;?></h2>
			<h4><?php echo $info[0]->conteudo;?></h4><br><br>
            <div class="row">
			<?php if($galeria) {
				foreach($galeria as $linha){ ?>
            <div class="col-md-2">
              <article class="entry">
                <div class="entry__img-holder">
				
					

					<a href="<?= base_url() ?>uploads/galeria/<?php echo $linha->arquivo ?>" data-fancybox="group" >
						
						  <img data-src="<?=  base_url()?>uploads/galeria/<?php echo $linha->arquivo;?>" src="<?=  base_url()?>uploads/galeria/<?php echo $linha->arquivo;?>" class="entry__img lazyload" alt="">
						
					</a>
                </div>

             
              </article>
            </div>
			
			  
			<?php } 
				} else {
				
			} ?>
			
			
        
      
          </div>
		  
		  <div class="entry-comments mt-30">
				<div class="title-wrap mt-40">
				  <h5 class="uppercase">Comentarios</h5>
				</div>
				<div class="fb-comments" data-width="100%" data-href="<?= base_url('portal/view_galeria') ?>/<?php echo $key;?>" data-numposts="7"></div>

				   
			</div>
			<br><br><br><br>
</div>