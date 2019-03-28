

<div class="main-container container" id="main-container">

      <!-- Content -->
      <div class="row">
            
        <!-- post content -->
        <div class="col-lg-12 blog__content mb-30">


          <!-- standard post -->
          <article class="entry">
            
            <div class="single-post__entry-header entry__header">
              <a href="#" class="entry__meta-category"><?php echo $noticia[0]->nomecategoria; ?></a>
              <h1 class="single-post__entry-title">
                <?php echo $noticia[0]->titulo; ?>
              </h1>
			  <div class="entry__article" >
              <?php echo '<h5>'.$noticia[0]->subtitulo.'</h5><br>'; ?>

            </div>

              <ul class="entry__meta">
                <li class="entry__meta-author">
                  <i class="ui-author"></i>
                  <a href="#"><?php echo $noticia[0]->autor; ?></a>
                </li>
                <li class="entry__meta-date">
                  <i class="ui-date"></i>
                 <?php echo $noticia[0]->data; ?>
                </li>
              
              </ul>
            </div>

      <div class="entry__img-holder">
          
              <img src="<?=  base_url()?>uploads/noticias/7/<?php echo $noticia[0]->img ?>" alt="" class="entry__img">
            </div>


            <div class="entry__article" >
              <?php echo $noticia[0]->conteudo; ?>

            </div> <!-- end entry article -->

            <!-- Related Posts -->
            <div class="related-posts">
              <div class="title-wrap mt-40">
                <h5 class="uppercase">Notícias relacionadas</h5>
              </div>
              <div class="row row-20">
			  <?php foreach ($noticias_relacionadas as $row){ ?>
                <div class="col-md-4">
                  <article class="entry">
                    <div class="entry__img-holder">
                      <a href="<?= base_url('portal/view_noticia') ?>/<?php echo $row->id;?>">
                        <div class="thumb-container thumb-75">
                          <img data-src="<?=  base_url()?>uploads/noticias/7/<?php echo $row->img; ?>" src="<?=  base_url()?>uploads/noticias/7/<?php echo $row->img; ?>" class="entry__img lazyload" alt="">
                        </div>
                      </a>
                    </div>

                    <div class="entry__body">
                      <div class="entry__header">
                        <h2 class="entry__title entry__title--sm">
                          <a href="<?= base_url('portal/view_noticia') ?>/<?php echo $row->id;?>"><?php echo $row->titulo; ?></a>
                        </h2>
                      </div>
                    </div>
                  </article>
                </div>
			  <?php } ?>
                
              </div>
            </div> <!-- end related posts -->                

          </article> <!-- end standard post -->
		  
		  
        <div class="entry-comments mt-30">
            <div class="title-wrap mt-40">
              <h5 class="uppercase">Comentarios</h5>
            </div>
            <div class="fb-comments" data-width="100%" data-href="<?= base_url('portal/view_noticia') ?>/<?php echo $noticia[0]->id;?>" data-numposts="7"></div>

               
          </div> 
		  <br><br><br>


          <!-- Comment Form 
          <div id="respond" class="comment-respond">
            <div class="title-wrap">
              <h5 class="comment-respond__title uppercase">Leave a Reply</h5>
            </div>
            <form id="form" class="comment-form" method="post" action="#">
              <p class="comment-form-comment">
                 <label for="comment">Comment</label> 
                <textarea id="comment" name="comment" rows="5" required="required" placeholder="Comment*"></textarea>
              </p>

              <div class="row row-20">
                <div class="col-lg-4">
                  <input name="name" id="name" type="text" placeholder="Name*">
                </div>
                <div class="col-lg-4">
                  <input name="email" id="email" type="email" placeholder="Email*">
                </div>
                <div class="col-lg-4">
                  <input name="website" id="website" type="text" placeholder="Website">
                </div>
              </div>

              <p class="comment-form-submit">
                <input type="submit" class="btn btn-lg btn-color btn-button" value="Post Comment" id="submit-message">
              </p>
              
            </form>
          </div>  -->

        </div> <!-- end col -->
		
        </div>
		
        </div>