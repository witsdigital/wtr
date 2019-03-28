
<?php $entidade = 'condeuba' ?>
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

        window.open('<?= base_url() ?>portal/recdespview/' + id);

    }
</script>


<div style="background-color:  #FFFFFF;">
    <br><br><br><br><div class="master-container">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <?php $this->load->view('cidades/includes/menupublicacao'); ?>
                </div>
                <div class="col-md-8">
                    <?php
                    foreach ($data as $row) {
                        ?>
                        <div class="col-md-4">


                            <table style=" width:100%;" height="96" border="0" cellpadding="20" >
                                <tr>
                                    <td >
                                        <div align="center">
                                            <a href="<?= base_url() . 'portal/recdespview/' . $row->mes_competencia ?>"><img class="imgcalendar" src="<?= base_url() ?>assets/images/calendario_publica.png" /></a>
                                        </div>
                                        <div align="center" class="ddate">
                                            <h5> 
                                                <strong><?php
                                                    switch ($row->mes_competencia) {
                                                        case 1:
                                                            $mes = 'janeiro';
                                                            break;
                                                        case 2:
                                                            $mes = 'Fevereiro';
                                                            break;
                                                        case 3:
                                                            $mes = 'Março';
                                                            break;
                                                        case 4:
                                                            $mes = 'Abril';
                                                            break;
                                                        case 5:
                                                            $mes = 'Maio';
                                                            break;
                                                        case 6:
                                                            $mes = 'Junho';
                                                            break;
                                                        case 7:
                                                            $mes = 'Julho';
                                                            break;
                                                        case 8:
                                                            $mes = 'Agosto';
                                                            break;
                                                        case 9:
                                                            $mes = 'Setembro';
                                                            break;
                                                        case 10:
                                                            $mes = 'Outubro';
                                                            break;

                                                        case 11:
                                                            $mes = 'Novembro';
                                                            break;
                                                        case 12:
                                                            $mes = 'Dezembro';
                                                            break;
                                                    }

                                                    echo $mes;
                                                    ?></strong></h5>
                                         
                                        </div>


                                       </td>



                                <hr />
                                </tr>
                            </table>
                        </div>
                    <?php }
                    ?>
                </div>






            </div>
        </div>
    </div><!-- /container -->
</div>

<?php

function tirarAcentos($string) {
    return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(Ç|ç)/"), explode(" ", "a A e E i I o O u U n N c"), $string);
}
?>





