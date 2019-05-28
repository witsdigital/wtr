
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php $entidade = 'condeuba';

$mes[1] = 'Janeiro';
$mes[2] = 'Fevereiro';
$mes[3] = 'Março';
$mes[4] = 'Abril';
$mes[5] = 'Maio';
$mes[6] = 'Junho';
$mes[7] = 'Julho';
$mes[8] = 'Agosto';
$mes[9] = 'Setembro';
$mes[10] = 'Outubro';
$mes[11] = 'Novembro';
$mes[12] = 'Dezembro';


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
            
            <a href="<?= base_url('transparencia/urlDetRec')?>">
                 <button type="buttom" data-toggle="modal" style="float:right"  type="button" class="btn btn-sm btn-warning" >DETALHAMENTO DE RECEITA TEMPO REAL</button>
            </a>
            <div class="row">
                <div class="col-md-3">
				
                     <?php $this->load->view('transparencia/includes/menuFiltroReceitas'); ?> 
                </div>

                <div class="col-md-9">
                    <?php
                    if (count($despesas) == 0) {
                        echo '<br><br><br><br><div align="center"><h3 style="color: #00a65a">Sem Resultados para esta consulta</h></div>';
                    } else {


                        foreach ($despesas as $row) {
                            ?>
                            <div class="row">
                                <div class="col-md-4">
                                <span><strong><i class="icon-list-alt"></i> Natureza:</strong><br> <a  href="#"><?php echo $row->natureza ?></a></span>
                                
                                
                                
                                </div>
                                 <div class="col-md-2">
                                <span><strong><i class="icon-list-alt"></i> ANO:</strong><br> <a  href="#"><?php echo $row->ano ?></a></span>
                                
                                
                                
                                </div>
                                <div class="col-md-2">
                                <span><strong><i class="icon-list-alt"></i> Mês:</strong><br> <a  href="#"><?php echo $mes[$row->competencia] ?></a></span>
                                
                                
                                
                                </div>
                                <div class="col-md-2">
                                <span><strong><i class="icon-list-alt"></i> Valor:</strong><br> <a  href="#"><?php echo $row->valor ?></a></span>
                                
                                
                                
                                </div>
                                <div style="padding:4px" class="col-md-2"><button type="buttom" data-toggle="modal" data-target="#<?php echo $row->id ?>" type="button" class="btn btn-sm btn-primary" >Consultar</button></div>
                            </div>
                            <div class="modal fade" id="<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Natureza:  <?php echo $row->natureza ?></h5>
                                    
                                    </div>
                                    <div class="modal-body">
                                        <p><b>Unidade Gestora:</b> <?php echo $row->unidade_gestora ?> - <?php echo $row->secretaria ?></p>
                                    
                                        <p><b>Ano:</b> <?php echo $row->ano ?></p>
                                        <p><b>Data: </b> <?php echo $row->data_registro ?></p>
                                        <p><b>Valor: </b> <?php echo $row->valor ?></p>
                                        <p><b>Competência: </b> <?php echo $mes[$row->competencia]; ?></p>
                                        <p><b>Descrisção: </b><br> <?php echo $row->descricao ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                                    </div>
                                </div>
                            </div>
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





