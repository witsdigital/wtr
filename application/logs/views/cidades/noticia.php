

<?php $entidade = $this->uri->segment(2); ?>
<script>
    function enviardados() {

        if (document.getElementById('edicao').value != "") {
            var edicao = document.getElementById('edicao').value;
            document.location.href = "<?= base_url('camaras/' . $entidade) ?>/getbusca/edicao/" + edicao;
        }
        if (document.getElementById('titulo').value != "") {
            var titulo = document.getElementById('titulo').value;
            document.location.href = "<?= base_url('camaras/' . $entidade) ?>/buscatitulo/" + titulo;
        }
        if (document.getElementById('chave').value != "") {
            var chave = document.getElementById('chave').value;
            document.location.href = "<?= base_url('camaras/' . $entidade) ?>/busca/" + chave;
        }



    }
    function confirma() {
        alert('');
    }
</script>


<div style="background-color:  #FFFFFF;">
   <br><br><br><div class="master-container">

<br>
<br>
	

	<div class="master-container">
		<div class="container">
			<div class="row">
                            
                            <?php echo  $noticia[0]->id ?>sdssd
				<main class="col-xs-12  col-md-9" role="main">
					<article class="post tformat-standard hentry">
                                            
						<a href="#">
                                                    <img width="848" height="480" src="<?=  base_url()?>uploads/noticias/<?php echo  $noticia[0]->entidade ?>/<?php echo  $noticia[0]->img ?>" class="img-responsive wp-post-image" alt="Project Image"/>	
						</a>
						<div class="meta-data">
							<time datetime="2014-10-20T09:36:46+00:00" class="meta-data__date">Data: <?php echo  $noticia[0]->data ?></time>
							<span class="meta-data__author">Autor: <?php echo  $noticia[0]->autor ?></span>
							<span class="meta-data__categories"> <a href="#" rel="category tag">Categoria</a>: <a href="#" rel="category tag"><?php echo  $noticia[0]->categoria ?></a>
							</span>	
							</div>
						<h1 class="hentry__title"><?php echo  $noticia[0]->titulo ?></h1>
						<div class="hentry__content">
							<p>
								<?php echo  $noticia[0]->conteudo ?></p>
							
						</div>
                                              <h1 class="hentry__title"> </h1>
						<div class="clearfix"></div>
						<!-- Multi Page in One Post -->
						
					</article>
				</main>
				<?php $this->load->view('cidades/includes/menunoticia')?>
			</div>
		</div><!-- /container -->
	</div>
	
</div><!-- 
                                    
                                    dsds
                                                </div><!-- /container -->
                                                </div>

<?php

function tirarAcentos($string) {
    return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(Ç|ç)/"), explode(" ", "a A e E i I o O u U n N c"), $string);
}
?>



