
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php $entidade = 'condeuba' ?>
<script>
    function enviardados() {
        if (document.getElementById('data').value != "") {
            var data = document.getElementById('data').value;
            document.location.href = "<?= site_url() ?>portal/buscadata/" + data;
        }

        if (document.getElementById('edicao').value != "") {
            var edicao = document.getElementById('edicao').value;
            document.location.href = "<?= site_url() ?>portal/getbusca/edicao/" + edicao;
        }
        if (document.getElementById('titulo').value != "") {
            var titulo = document.getElementById('titulo').value;
            document.location.href = "<?= site_url() ?>portal/buscatitulo/" + titulo;
        }
        if (document.getElementById('chave').value != "") {
            var chave = document.getElementById('chave').value;
            document.location.href = "<?= site_url() ?>portal/busca/" + chave;
        }



    }
    function confirma(id) {

      window.open('<?= site_url('prefeitura/diario') ?>/' + id, '_blank');

    }
</script>


<div style="background-color:  #FFFFFF;">
    <br><br><br><br><div class="master-container">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
				 <div class="widget  widget_search  push-down-30">
            <!-- <form role="search" action="<?=  site_url('portal/pesquisapublicacoes')?>" method="get" class="search-form">
                <label>
                    <span class="screen-reader-text">Buscar por:</span>
                    <input type="search" class="search-field" placeholder="Pesquisar por:" value="" name="txt_busca" title="Pesquisar por:"/>
                </label>
                <input type="submit" class="search-submit" value="Buscar"/>
            </form> -->
        </div>
                    <!-- <?php $this->load->view('transparencia/includes/menupublicacao'); ?> -->
                </div>

                <div class="col-md-12">
                    <?php
                    if (count($diario_oficial) == 0) {
                        echo '<br><br><br><br><div align="center"><h3 style="color: #00a65a">Sem Resultados para esta consulta</h></div>';
                    } else {


                        foreach ($diario_oficial as $row) {
                            ?>
                            <div class="row" style="margin-bottom: 20px; padding: 20px; ">
                                <div class="col-md-2">
                                <span><strong><i class="icon-list-alt"></i> Titulo:</strong><br> <a  href="#"><?php echo $row->titulo ?></a></span>
                                
                                
                                
                                </div>
                                <div class="col-md-4">
                                <span><strong><i class="icon-list-alt"></i> Descrição:</strong><br> <a  href="#"><?php echo $row->descricao ?></a></span>
                                
                                
                                
                                </div>
								<div class="col-md-2">
                                <span><strong><i class="icon-list-alt"></i> Data:</strong><br> <a  href="#"><?php echo date('d/m/Y',strtotime($row->data)); ?></a></span>
                                
                                
                                
                                </div>
								 <div class="col-md-2">
                                <span><strong><i class="icon-list-alt"></i> Edição:</strong><br> <a  href="#"><?php echo $row->edicao ?></a></span>
                                
                                
                                
                                </div>
                                <div class="col-md-2"><button type="buttom" class="btn btn-success" onclick="javascript:confirma(<?php echo $row->id_diario_oficial ?>);" >Consultar</button></div>
                            </div>
                        
                            <?php
                        }
                    }
                    ?>
                    <br>
                    <main class="col-xs-12  col-md-9  col-md-push-3" role="main">



                        <div class="spacer">       <?= $pagination ?></div>

                    </main>
                    <br>
                    <br>

                    <br>
                    <br>
                </div>


                <br>
                <br>
                <br>

            </div>
        </div>
    </div><!-- /container -->
</div>

<?php

function tirarAcentos($string) {
    return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(Ç|ç)/"), explode(" ", "a A e E i I o O u U n N c"), $string);
}
?>





