<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
 
		<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#example').DataTable({
             "order": [ 0, 'asc' ],
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });
    });
</script>

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

        window.open('<?= site_url('camaras/' . $entidade) ?>/documento/' + id, '_blank');

    }
</script>


<div style="background-color:  #FFFFFF;">
    <br><br><br><br><div class="master-container">
        <div class="container">
            <div class="row">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Cod#</th>
                            <th>Credor</th>
                            <th>Valor</th>
                            <th>Data</th>
                            <th>Ação</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>  <th>Cod#</th>
                            <th>Credor</th>
                            <th>Valor despesa</th>
                            <th>Data</th>
                            <th>Ação</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($data as $row) {
                            ?>
                            <tr>
                                <td><?= $row->id ?></td>
                                <td><?= $row->credor ?></td>
                                <td><?= $row->valor ?></td>
                                <td><?= $row->data_mov ?></td>
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" type="button" class="btn btn-sm btn-primary">  <span class="glyphicon glyphicon-search"></span> Detalhes</button></td>

                            </tr>


                            <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Credor:  <?php echo $row->credor ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><b>CPF/CNPJ:</b> <?php echo $row->doc ?></p>
                                        <p><b>Fonte: </b> <?php echo $row->fonte ?></p>
                                        <p><b>Valor: </b> <?php echo $row->valor ?></p>
                                        <p><b>Empenho: </b>  <?php echo $row->empenho ?></p>
                                        <p><b>Data Movimentação: </b>  <?php echo $row->data_mov ?></p>
                                        <p><b>Função: </b> <?php echo $row->funcao ?></p>
                                        <p><b>Descrição: </b><br> <?php echo $row->bem_servico ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>


                    </tbody>
                </table>
                <br><Br><br><Br>

            </div>
        </div>
    </div><!-- /container -->
</div>



<?php

function tirarAcentos($string) {
    return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(Ç|ç)/"), explode(" ", "a A e E i I o O u U n N c"), $string);
}
?>





