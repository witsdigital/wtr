
<div style="background-color:  #FFFFFF;">

    <br><br><br>




    <div class="master-container">
        <div class="container">
            <div class="row">
                <main class="col-xs-12  col-md-9" role="main">
                    <div class="row">
                        <?php
						if (count($noticias) == 0) {
							echo '<br><br><br><br><div align="center"><h3 style="color: #00a65a">Nenhuma noticia encontrada</h></div>';
						} else {
						
                        foreach ($noticias as $rownot) {
                            ?>
                            <div class="col-xs-12">
                                <article class="post sticky hentry post-inner">
                                    <a href="<?= base_url('camaras/condeuba') ?>/noticia/<?php echo $rownot->id ?>">
                                        <img style="width: 100%;" src="<?= base_url() ?>uploads/noticias/7/<?php echo $rownot->img ?>" alt="<?php echo $rownot->titulo ?>"/>
                                    </a>
                                    <div class="meta-data">
                                        <time datetime="2014-10-13T13:59:35+00:00" class="meta-data__date"><?= $rownot->data ?></time>
                                        <span class="meta-data__author"><?= $rownot->autor ?></span>
                                        <!--<span class="meta-data__categories"><a href="blog-single.html">Construction</a> &bull; <a href="blog-single.html">General Information</a></span>-->	
                                        <span class="meta-data__comments"><a href="blog-single.html"><?= $rownot->categoria ?></a></span>
                                    </div>
                                    <h2 class="hentry__title">
                                         <!--<a href="<?= base_url('camaras/condeuba') ?>/noticia/<?php echo $rownot->id ?>"><?php echo $rownot->titulo ?></span></a>-->
                                        <a href="<?= base_url('camaras/condeuba') ?>/noticia/<?php echo $rownot->id ?>"><?php echo $rownot->titulo ?></a>
                                    </h2>
                                    <div class="hentry__content">
                                        <p> <?php echo substr($row->conteudo, 0, 500) ?>	...</p>
                                        <p><a href="<?= base_url('camaras/condeuba') ?>/noticia/<?php echo $rownot->id ?>" class="more-link"><span class="read-more read-more--post">Ler mais</span></a></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </article>
                            </div><!-- /blogpost -->
                            <?php
                        }
						}
                        ?>

                        <div class="col-xs-12">
                            <nav class="pagination  text-center">
                                <ul class="page-numbers">
                                    <?= $pagination ?>

                                </ul>
                            </nav>	
                        </div>
                    </div>
                </main>
                <?php $this->load->view('cidades/includes/menunoticia') ?>
            </div>
        </div><!-- /container -->
    </div>

</div>