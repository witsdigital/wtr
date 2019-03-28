


<script type="text/javascript">
    $(document).ready(function () {
        $(".confirma").click(function () {
            $("#myModal").modal('show');
        });
    });
</script>
<script type="text/javascript">

    function confirma(id) {
        document.getElementById('id').value = id;
        $("#myModal").modal('show');
    }
    function deleta() {
        window.location.href = '<?= site_url('aviso/apagar') ?>' + '/' + document.getElementById('id').value;

    }



</script>
<script type="text/javascript">
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Receitas
            <small>Receitas Cadastradas</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= site_url() ?>usuario">Receitas</a></li>
            <li class="active">Cadastradas</li>
        </ol>
    </section>

    <!-- Main content -->

    <div class="box-body">
        <div class="box">
            <div class="box-header">
                <div align="right"><input  onclick="window.location.href = '<?= site_url() ?>Um3Um/cadastro'" type="button" value="Novo Envio" class="btn btn-success"></button></div>

                <!--                  <h3 class="box-title">Data Table With Full Features</h3>-->
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 20px;">Id</th>

                            <th>Natureza</th>


                          
                            <th>Valor Despesa</th>
                            <th>Data</th>
                            <th>Ação</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) { ?>

                            <tr>




                                <td><?php echo $row->id ?></td>

                                <td><?php echo $row->natureza ?></td>
                                
                                <td>R$ <?php echo $row->valor ?></td>
                                <td><?php echo date("d/m/Y", strtotime($row->data_registro)) ?>  </td>
                                <td>  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#<?php echo $row->id ?>">
                                       <i class="fa  fa-search"></i>  Detalhes
                                    </button></td>

                        <div class="modal fade" id="<?php echo $row->id ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Natureza:  <?php echo $row->natureza ?></h4>
                                    </div>
                                    <div class="modal-body">

                                      
                                        <p><b>Valor: </b> <?php echo $row->valor ?></p>
                                        
                                        <p><b>Descrição: </b><br> <?php echo $row->descricao ?></p>

                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>



                        </tr><?php } ?>                       


                    </tbody>

                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Confirmação de operação</h4>
                    </div>
                    <div class="modal-body">
                        <p>Deseja mesmo apagar esta notícia?<input type="hidden" id="id" value=""></p>
                        <p class="text-warning"><small>Após esta operação todos os dados serão apagados referente a esta operação.</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="deleta();"class="btn btn-primary">Apagar</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.box-footer-->
</div><!-- /.box -->

</section><!-- /.content -->




