<?php 
	$banner_2 = $this->db->query('select * from slides where id = 8')->result(); 
?>


<header>
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
           <?php foreach ($ultima_slide as $row) { ?>
          <div onclick="location.href='<?= base_url() ?>portal/view_noticia/<?php echo $row->id;?>'" class="carousel-item active" style="background-image: url('<?=  base_url()?>uploads/noticias/7/<?php echo $row->img; ?>')">
              <a href="<?= base_url() ?>portal/view_noticia/<?php echo $row->id;?>">
            <div class="carousel-caption d-none d-md-block" style="background: #e76006de;">
              <h3><?php echo $row->titulo;?></h3>
        
            </div>
            </a>
          </div>
          <?php  } ?>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <?php foreach ($ultimas_slide as $row) { ?>
          
          <div onclick="location.href='<?= base_url() ?>portal/view_noticia/<?php echo $row->id;?>'" class="carousel-item" style="background-image: url('<?=  base_url()?>uploads/noticias/7/<?php echo $row->img; ?>')">
              <a href="<?= base_url() ?>portal/view_noticia/<?php echo $row->id;?>">
            <div class="carousel-caption d-none d-md-block" style="background: #e76006de;">
              <h3><?php echo $row->titulo;?></h3>
            
            </div>
             </a>
          </div>
         
          <?php  } ?>
          
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      
    </header>


    <div class="main-container container mt-40" id="main-container">         

      <!-- Content -->
      <div class="row">

        <!-- Posts -->
        <div class="col-lg-8 blog__content mb-30">
          
          <!-- Hot News -->
          <section class="section tab-post mb-10">
            <div class="title-wrap">
                <h3 class="section-title">&Uacute;ltimas Not&iacute;cias</h3>

            </div>

            <!-- tab content -->
            <div class="tabs__content tabs__content-trigger tab-post__tabs-content">
              
              <div class="tabs__content-pane tabs__content-pane--active" id="tab-all">
                <div class="row">
				<?php if($ultimas_noticias){
				  foreach($ultimas_noticias as $row) { ?>
                  <div class="col-md-6">
                    <article class="entry">
                      <div class="entry__img-holder">
                        <a href="<?= base_url() ?>portal/view_noticia/<?php echo $row->id;?>">
                          <div class="thumb-container thumb-75">
                            <img data-src="<?=  base_url()?>uploads/noticias/7/<?php echo $row->img;?>" src="<?=  base_url()?>uploads/noticias/7/<?php echo $row->img;?>" class="entry__img lazyload" style="" alt="" />
                          </div>
                        </a>
                      </div>

                      <div class="entry__body">
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
                              <?php echo date('d/m/Y',strtotime($row->data));?>
                            </li>
                            
                          </ul>
                        </div>
                        <div class="entry__excerpt">
                          <p><?php echo substr($row->subtitulo, 0,  250).'...'; ?></p>
                        </div>
                      </div>
                    </article>
                  </div>
				  <?php } 
					} ?>
                  
                  </div>
          
              </div> <!-- end pane 1 -->
             
            </div> <!-- end tab content -->            
          </section> <!-- end hot news -->

          

          <!-- Ad Banner 728 -->
          <div class="text-center pb-40">
            <a href="#">
              <img src="<?=  base_url()?>uploads/slides/7/<?php echo $banner_2[0]->img; ?>" alt="">
            </a>
          </div>

          
          <!-- Posts from categories -->
          <section class="section mb-0">
            <div class="row">

              <!-- World -->
			  <?php if($ultimas_categorias){
				  foreach($ultimas_categorias as $row) { ?>
              <div class="col-md-6 mb-40">
                <div class="title-wrap bottom-line bottom-line--orange">
                  <h3 class="section-title section-title--sm"><?php echo $row->nomecategoria; ?></h3>
                </div>
				<?php if( $row->noticia) {
					foreach($row->noticia as $linha){ ?>
                <article class="entry">
                  <div class="entry__img-holder">
                    <a href="<?= base_url('portal/view_noticia') ?>/<?php echo $linha->id;?>">
                      <div class="thumb-container thumb-75">
                        <img data-src="<?=  base_url()?>uploads/noticias/7/<?php echo $linha->img;?>" src="<?=  base_url()?>uploads/noticias/7/<?php echo $linha->img;?>" class="entry__img lazyload" alt="" />
                      </div>
                    </a>
                  </div>
 
                  <div class="entry__body">
                    <div class="entry__header">
                      <h2 class="entry__title">
                        <a href="<?= base_url('portal/view_noticia') ?>/<?php echo $linha->id;?>"><?php echo $linha->titulo; ?></a>
                      </h2>
                      <ul class="entry__meta">
                        <li class="entry__meta-author">
                          <i class="ui-author"></i>
                          <a href="#"><?php echo $linha->autor; ?></a>
                        </li>
                        <li class="entry__meta-date">
                          <i class="ui-date"></i>
                          <?php echo date('d/m/Y',strtotime($linha->data)) ; ?>
                        </li>
                       
                      </ul>
                    </div>
                    <div class="entry__excerpt">
                      <p><?php echo substr($linha->subtitulo, 0,  250).'...'; ?></p>
                    </div>
                  </div>
                </article>
					<?php } 
					} ?>
				
                <ul class="post-list-small post-list-small--border-top">
				<?php if($row->noticias) { 
						foreach ($row->noticias as $linha){ ?>
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="<?= base_url('portal/view_noticia') ?>/<?php echo $linha->id;?>"><?php echo $linha->titulo; ?></a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-date">
                            <i class="ui-date"></i>
                            <?php echo date('d/m/Y',strtotime($linha->data))  ; ?>
                          </li>
                        </ul>
                      </div>                  
                    </article>
                  </li>
				<?php } 
				} ?>
                  
                </ul>
              </div> <!-- end world -->

			<?php } 
			  }
			 ?>
            </div>                
          </section> <!-- end posts from categories -->

          <!-- Carousel posts -->
          <section class="section mb-20">
            

          </section>

        </div> <!-- end posts -->


