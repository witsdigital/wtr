    <div class="main-container container" id="main-container">

            <div class="row">
			<?php if($galerias) {
				foreach($galerias as $row){ ?>
            <div class="col-md-3">
              <article class="entry">
                <div class="entry__img-holder">
                  <a href="<?= base_url('portal/view_galeria') ?>/<?php echo $row->key; ?>">
					<?php if($row->arquivo){
						foreach($row->arquivo as $linha){ ?>
                   
                      <img data-src="<?=  base_url()?>uploads/galeria/<?php echo $linha->arquivo;?>" src="<?=  base_url()?>uploads/galeria/<?php echo $linha->arquivo;?>" class="entry__img lazyload" alt="">
                   
						<?php } } ?>
                  </a>
                </div>

                <div class="entry__body">
                  <div class="entry__header">
                    <h2 class="entry__title">
                      <a href="<?=  base_url()?>uploads/galeria/<?php echo $linha->arquivo;?>"><?php echo $row->titulo; ?></a>
                    </h2>
                
                  </div>
                  <div class="entry__excerpt">
                    <p><?php echo $row->conteudo; ?></p>
                  </div>
                </div>
              </article>
            </div>
			<?php } 
				} else {
				
			} ?>
        
      
          </div>
</div>