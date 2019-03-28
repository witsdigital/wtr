<div class="main-container container" id="main-container">

      <!-- Content -->
      <div class="row">
            
        <!-- post content -->
        <div class="col-lg-12 blog__content mb-30">

          <h2 class="mb-20">Resultados da pesquisa</h1>
         
		<?php if($noticias){
			foreach ($noticias as $row){ 
		?>
          <article class="entry post-list">
            <div class="entry__img-holder post-list__img-holder">
              <a href="<?= base_url('portal/view_noticia') ?>/<?php echo $row->id;?>">
                <div class="thumb-container thumb-75">
                  <img data-src="<?=  base_url()?>uploads/noticias/7/<?php echo $row->img;?>" src="<?=  base_url()?>uploads/noticias/7/<?php echo $row->img;?>" class="entry__img lazyload" alt="">
                </div>
              </a>
            </div>

            <div class="entry__body post-list__body">
              <div class="entry__header">
                <a href="#" class="entry__meta-category"><?php echo $row->nomecategoria;?></a>
                <h2 class="entry__title">
                  <a href="<?= base_url('portal/view_noticia') ?>/<?php echo $row->id;?>"><?php echo $row->titulo;?></a>
                </h2>
                <ul class="entry__meta">
                  <li class="entry__meta-author">
                    <i class="ui-author"></i>
                    <a href="#"><?php echo $row->autor;?></a>
                  </li>
                  <li class="entry__meta-date">
                    <i class="ui-date"></i>
                    <?php echo $row->data;?>
                  </li>
                  
                </ul>
              </div>
              <div class="entry__excerpt">
                <p><?php echo substr($row->subtitulo, 0, 250).'...'; ?></p>
              </div>
            </div>
          </article>
		<?php }
				} else {
					echo "<h5>Nenhuma noticia encontrada</h5>";
				}
		?>
     

          <!-- Pagination -->
		  <div  class="col-lg-12 blog__content mb-30" >
			  <nav aria-label="Page navigation example">
					<?php echo $pagination; ?>
			  </nav>
		  </div>
		  
		  </div>
		  </div>
		   </div>
          

        </div> <!-- end col -->