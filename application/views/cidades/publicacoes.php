
<?php $entidade = 'prefeitura' ?>
<script>
    function enviardados() {
        if (document.getElementById('data').value != "") {
            var data = document.getElementById('data').value;
            document.location.href = "<?= base_url() ?>portal/buscadata/" + data;
        }

        if (document.getElementById('edicao').value != "") {
            var edicao = document.getElementById('edicao').value;
            document.location.href = "<?= base_url() ?>portal/getbusca/edicao/" + edicao;
        }
        if (document.getElementById('titulo').value != "") {
            var titulo = document.getElementById('titulo').value;
            document.location.href = "<?= base_url() ?>portal/buscatitulo/" + titulo;
        }
        if (document.getElementById('chave').value != "") {
            var chave = document.getElementById('chave').value;
            document.location.href = "<?= base_url() ?>portal/busca/" + chave;
        }



    }
    function confirma(id) {

          window.open('<?= base_url('publicacao-prefeitura') ?>/' + id, '_blank');

    }
</script>


<div style="background-color:  #FFFFFF;">
    <br><br><br><br><div class="master-container">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
				 <div class="widget  widget_search  push-down-30">
            <form role="search" action="<?=  base_url('portal/pesquisapublicacoes')?>" method="get" class="search-form">
                <label>
                    <span class="screen-reader-text">Buscar por:</span>
                    <input type="search" class="search-field" placeholder="Pesquisar por:" value="" name="txt_busca" title="Pesquisar por:"/>
                </label>
                <input type="submit" class="search-submit" value="Buscar"/>
            </form>
        </div>
                    <?php $this->load->view('cidades/includes/menupublicacao'); ?>
                </div>

                <div class="col-md-9">
                    <?php
                    if (count($publicadas) == 0) {
                        echo '<br><br><br><br><div align="center"><h3 style="color: #00a65a">Sem Resultados para esta consulta</h></div>';
                    } else {


                        foreach ($publicadas as $row) {
                            ?>
                            <div class="row">
                                <div class="col-md-10"><span><strong><i class="icon-list-alt"></i> Titulo:</strong><br> <a  href="#"><?php echo $row->titulo ?></a></span></div>
                                <br><div class="col-md-2"><button type="buttom" class="btn btn-success" onclick="javascript:confirma(<?php echo $row->id ?>);" >Consultar</button></div>
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





