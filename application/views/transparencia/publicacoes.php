
<?php $entidade = 'condeuba' ?>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

        window.open('<?= site_url('prefeitura/documento') ?>/' + id, '_blank');

    }
</script>

<div class="main-title" style="background-color: #f2f2f2; ">
    <div class="container">
        <h1 class="main-title__primary">Publicações</h1>
        <h3 class="main-title__secondary">Consulte as publicações Oficiais do município </h3>
    </div>
</div>
<div style="background-color:  #FFFFFF;">
    <br><div class="master-container">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget  widget_search  push-down-30">
                        <form role="search" action="<?= site_url('portal/pesquisapublicacoes') ?>" method="get" class="search-form">
                            <label>
                                <span class="screen-reader-text">Buscar por:</span>
                                <input type="search" class="search-field" placeholder="Pesquisar por:" value="" name="txt_busca" title="Pesquisar por:"/>
                            </label>
                            <input type="submit" class="search-submit" value="Buscar"/>
                        </form>
                    </div>
                    <?php $this->load->view('transparencia/includes/menupublicacao'); ?>
                </div>

                <div class="col-md-9">
                    <?php
                    if (count($publicadas) == 0) {
                        echo '<br><br><br><br><div align="center"><h3 style="color: #00a65a">Sem Resultados para esta consulta</h></div>';
                    } else {


                        foreach ($publicadas as $row) {
                            ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <span><strong>
                                            <i class="icon-list-alt"></i> Titulo:</strong><br>
                                        <a style="font-size:13px"  data-toggle="modal" data-target="#<?php echo $row->id ?>"><?php echo $row->titulo ?></a></span>

                                    <div class="container">


                                        <!-- Modal -->
                                        <div class="modal fade" id="<?php echo $row->id ?>" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><?php echo $row->titulo ?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><?php echo $row->objeto ?>.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                </div>
                                <div class="col-md-2">     <span><strong>
                                            <i class="icon-list-alt"></i> Data Publicação:</strong><br>
                                        <a style="font-size:13px" > <?php echo date('d/m/Y', strtotime($row->data)) ?></a></span></div>
                                <div class="col-md-2"><button type="buttom" class="btn btn-sm btn-primary btn-block" onclick="javascript:confirma(<?php echo $row->id ?>);" >Consultar</button></div>
                            </div>
                    <br>
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





