
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php $entidade = 'condeuba' ?>
<?php
$status[1] = 'Concluído';
$status[2] = 'Em Andamento';
$status[3] = 'Cancelada';
$status[4] = 'Suspensa';
$status[5] = 'Outro';
?>
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

        window.open('<?= site_url('camaras/prefeitura/documento') ?>/' + id, '_blank');

    }
</script>


<div style="background-color:  #FFFFFF;">
    <br><br><br><br><div class="master-container">
        <div class="container">
            <div class="row">


                <div class="col-md-12">
                    <?php
                    if (count($diario_oficial) == 0) {
                        echo '<br><br><br><br><div align="center"><h3 style="color: #00a65a">Sem Resultados para esta consulta</h></div>';
                    } else {


                        foreach ($diario_oficial as $row) {
                            ?>
                            <div class="row">
                                <div class="col-md-2">
                                    <span><strong><i class="icon-list-alt"></i> Modalidade:</strong><br> <a  href="#"><?php echo $row->descricao ?></a></span>
                                </div>
                                <div class="col-md-4">
                                    <span><strong><i class="icon-list-alt"></i> Unid. Gestora:</strong><br> <a  href="#"><?php echo $row->secretaria ?></a></span>
                                </div>
                                <div class="col-md-2">
                                    <span><strong><i class="icon-list-alt"></i> Valor:</strong><br> <a  href="#">R$ <?php echo $row->valor ?></a></span>
                                </div>
                                <div class="col-md-2">
                                    <span><strong><i class="icon-list-alt"></i> Data Publicação:</strong><br> <a  href="#"><?php echo date('d/m/Y', strtotime($row->data_publicacao)); ?></a></span>
                                </div>
                                <br><div class="col-md-2"><button type="buttom" data-toggle="modal" data-target="#<?php echo $row->id_licitacao ?>" type="button" class="btn btn-sm btn-primary" >Consultar</button></div>

                                <div class="col-md-10">
                                    <span><strong><i class="icon-list-alt"></i> Objeto:</strong><br> <a  href="#"><?php echo $row->objeto ?></a></span>
                                </div>
                                <div class="col-md-2"><br>
                                    <span><strong><i class="icon-list-alt"></i> Status:</strong><br> <a  href="#"><?php echo $status[$row->status_licitacao] ?></a></span>
                                </div>
                            </div>
                            <div class="modal fade" id="<?php echo $row->id_licitacao ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Licitação Nº:  <?php echo $row->cod_licitacao ?></h4>

                                        </div>
                                          <div class="modal-body">

                                              <h4> <p><b>Status: </b><?php echo $status[$row->status_licitacao] ?></p></h4>
                                        <p><b>Unidade Gestora:</b> <?php echo $row->secretaria ?></p>
                                        <p><b>Modalidade: </b> <?php echo $row->descricao ?></p>
                                        <p><b>Valor: </b> <?php echo number_format($row->valor , 2, ',', '.'); ?></p>
                                        <p><b>Data Abertura: </b>  <?php echo date('d/m/Y',strtotime($row->data_abertura))  ?></p>
                                        <p><b>Data Publicação: </b>  <?php echo date('d/m/Y',strtotime($row->data_publicacao))  ?></p>
                                        <p><b>Nº Edital: </b> <a target="_blank"  href="<?php echo $row->url_edital ?>"><?php echo $row->numero_edital ?></a></p>
                                        <p><b>Nº Contrato: </b> <a target="_blank"  href="<?php echo $row->url_contrato ?>"><?php echo $row->numero_contrato ?></a></p>
                                          <p><b>Objeto: </b> <?php echo $row->objeto ?></p> 

                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    <hr>
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





