<?php
$mais_vistas = $this->db->query('select * from noticias order by visualizacoes desc limit 5')->result();
$ldos = $this->db->query('select * from lei_diretrizes_orcamentaria')->result();
$ppa = $this->db->query('select * from ppa')->result();
$loa = $this->db->query('select * from loa')->result();
?>
<!-- Sidebar -->
<aside class="col-lg-4 sidebar sidebar--right">
    
      <div class="widget widget-gallery-sm">
        <ul class="widget-gallery-sm__list">
            <li class="widget-gallery-sm__item">
                <a href="<?= base_url('portal/esictemp')?>"><img src="<?= base_url() ?>assets/images/esics.png" alt=""></a>
            </li>
            <li class="widget-gallery-sm__item">
            <a href="http://nfe.governodeguajeru.ba.gov.br/" ><img src="<?= base_url() ?>assets/images/nfe.png" alt=""></a>   </li>
            <li class="widget-gallery-sm__item">
            <a href="<?= base_url('transparencia')?>" ><img src="<?= base_url() ?>assets/images/pdt.png" alt=""></a>   </li>
           </li>
            <li class="widget-gallery-sm__item">
            <a href="<?= base_url('diariooficial')?>" ><img src="<?= base_url() ?>assets/images/do.png" alt=""></a>   </li>
           </li>
        </ul>
    </div> <!-- end widget ad 300 -->

    <!-- Widget Social Subscribers -->
    <!-- <div class="widget widget-social-subscribers">
        <ul class="widget-social-subscribers__list">
            <li class="widget-social-subscribers__item">
                <img style="width: 100%" src="<?= base_url()?>assets/images/nf.png" width="83" height="36" alt="nf"/>
            </li>
             <li class="widget-social-subscribers__item">
                <img style="width: 100%" src="<?= base_url()?>assets/images/trans.png" width="83" height="36" alt="nf"/>
            </li>
          
           
          
        </ul>
         <ul class="widget-social-subscribers__list">
            <li class="widget-social-subscribers__item">
                <img style="width: 100%" src="<?= base_url()?>assets/images/esic.png" width="83" height="36" alt="nf"/>
            </li>
             <li class="widget-social-subscribers__item">
                <img style="width: 100%" src="<?= base_url()?>assets/images/nf.png" width="83" height="36" alt="nf"/>
            </li>
          
           
          
        </ul>
         <ul class="widget-social-subscribers__list">
            <li class="widget-social-subscribers__item">
                <img style="width: 100%" src="<?= base_url()?>assets/images/nf.png" width="83" height="36" alt="nf"/>
            </li>
             <li class="widget-social-subscribers__item">
                <img style="width: 100%" src="<?= base_url()?>assets/images/nf.png" width="83" height="36" alt="nf"/>
            </li>
          
           
          
        </ul>
    </div> -->

    <!-- Widget Newsletter -->
    <div class="widget widget_mc4wp_form_widget">
        <h4 class="widget-title">Receba nossas novidades</h4>
        <form class="mc4wp-form" method="post">
            <div class="mc4wp-form-fields">
                <p>
                    <input type="email" name="EMAIL" placeholder="seu email" required="">
                </p>
                <p>
                    <input type="submit" class="btn btn-lg btn-color" value="Assinar">
                </p>
            </div>
        </form>
    </div> <!-- end widget newsletter -->

 <div class="widget">
        <h4 class="widget-title">Lei de Diretrizes Or&ccedil;ament&aacute;ria
            (LDO)</h4>
        <div class="tweets-container">
            <?php foreach ($ldos as $row) { ?>
                <div id="tweets">
                    <a href="<?= base_url() ?><?php echo $row->file; ?>" target="_blank"><?php echo $row->descricao; ?></a>
                </div> <br>
            <?php } ?>			  
        </div>
    </div>

    <!-- Widget Ad 300 -->
    <div class="widget widget_media_image">
        <div class="fb-page" data-href="https://www.facebook.com/governodeguajeru/"  data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/governodeguajeru/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/governodeguajeru/">Governo de Guajeru</a></blockquote></div>
    </div> <!-- end widget ad 300 -->          

    <!-- Widget Socials -->
    <div class="widget widget-socials">
        <h4 class="widget-title">Siga as nossas redes</h4>
        <div class="socials">
            <a class="social social-facebook social--large" href="https://www.facebook.com/governodeguajeru/" title="facebook" target="_blank" aria-label="facebook">
                <i class="ui-facebook"></i>
            </a><!--
            --><a class="social social-twitter social--large" href="#" title="twitter" target="_blank" aria-label="twitter">
                <i class="ui-twitter"></i>
            </a><!--
            --><a class="social social-google-plus social--large" href="#" title="google" target="_blank" aria-label="google">
                <i class="ui-google"></i>
            </a><!--
            --><a class="social social-instagram social--large" href="#" title="instagram" target="_blank" aria-label="instagram">
                <i class="ui-instagram"></i>
            </a><!--
            --><a class="social social-youtube social--large" href="#" title="youtube" target="_blank" aria-label="youtube">
                <i class="ui-youtube"></i>
            </a><!--
            --><a class="social social-rss social--large" href="#" title="rss" target="_blank" aria-label="rss">
                <i class="ui-rss"></i>
            </a>
        </div>
    </div> <!-- end widget socials -->

    <!-- Widget Twitter -->
    <div class="widget">
        <h4 class="widget-title">Plano Plurianual - PPA</h4>
        <div class="tweets-container">
            <?php foreach ($ppa as $row) { ?>
                <div id="tweets">
                    <a href="<?php echo $row->file; ?>" target="_blank"><?php echo $row->descricao; ?></a>
                </div> <br>
            <?php } ?>			  
        </div>
    </div>
        <div class="widget">
        <h4 class="widget-title">Lei Or&ccedil;ament&aacute;ria Anual - LOA</h4>
        <div class="tweets-container">
            <?php foreach ($loa as $row) { ?>
                <div id="tweets">
                    <a href="<?= base_url() ?><?php echo $row->file; ?>" target="_blank"><?php echo $row->descricao; ?></a>
                </div> <br>
            <?php } ?>			  
        </div>
    </div>
    <div class="widget">
        <h4 class="widget-title">Mais vistas</h4>
        <div class="tweets-container">
            <?php foreach ($mais_vistas as $row) { ?>
                <div id="tweets">
                    <a href="<?= base_url('portal/view_noticia') ?>/<?php echo $row->id; ?>"><?php echo $row->titulo; ?></a>
                </div> <br>
            <?php } ?>			  
        </div>
    </div>

    <!-- Widget Ad 125 -->
    <!-- <div class="widget widget-gallery-sm">
        <ul class="widget-gallery-sm__list">
            <li class="widget-gallery-sm__item">
                <a href="#"><img src="<?= base_url() ?>assets_portal/img/blog/placeholder_125.jpg" alt=""></a>
            </li>
            <li class="widget-gallery-sm__item">
                <a href="#"><img src="<?= base_url() ?>assets_portal/img/blog/placeholder_125.jpg" alt=""></a>
            </li>
            <li class="widget-gallery-sm__item">
                <a href="#"><img src="<?= base_url() ?>assets_portal/img/blog/placeholder_125.jpg" alt=""></a>
            </li>
            <li class="widget-gallery-sm__item">
                <a href="#"><img src="<?= base_url() ?>assets_portal/img/blog/placeholder_125.jpg" alt=""></a>
            </li>
        </ul>
    </div> end widget ad 300 -->



</aside> <!-- end sidebar -->



</div> <!-- end content -->
</div> <!-- end main container -->
