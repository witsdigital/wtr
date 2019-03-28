


<script type="text/javascript">
    $(document).ready(function() {
        $(".confirma").click(function() {
            $("#myModal").modal('show');
        });
    });
</script>

<script type="text/javascript">

    function confirma(id) {


        location.href = "<?= base_url() ?>entidade/apagar/" + id;

    }



</script>
<script type="text/javascript">
    $(function() {
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

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Usuários
            <small>Usuários Cadastrados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url() ?>usuario">Usuarios</a></li>
            <li class="active">Cadastrados</li>
        </ol>
    </section>

    <!-- Main content -->

    <div class="box-body">
        <div class="box">
            <div class="box-header">
                 <div align="right"><input  onclick="window.location.href='<?= base_url()?>entidade/cadastro'" type="button" value="Nova Entidade" class="btn btn-success"></button></div>
               
                <!--                  <h3 class="box-title">Data Table With Full Features</h3>-->
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 90px;">Brasao</th>
                            <th>Entidade</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                       <th >Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($entidade as $row) { 
                             if ($row->img == "") {
                                        $caminho = 'uploads/temp/no_img.jpg';
                                    } else {
                                        $caminho = 'uploads/entidades/' . $row->img;
                                    }
                            
                            
                            ?>
                            <tr>
                            
                               

                                <td style="width: 90px;"> <img src="<?= base_url() ?><?php echo $caminho?>" class="user-image  user user-menu" alt="User Image" width="40px" height="40px" /></td>

                                <td><?php echo $row->nome ?></td>
                                <td><?php echo $row->tipo ?></td>
                                <td><?php echo $row->estado ?></td>
                                

                                <td style="width: 70px;"><button class="btn confirma  btn-danger btn-flat" >Apagar</button></td>

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
                        <p>Deseja mesmo apagar esta entidade?</p>
                        <p class="text-warning"><small>Após esta operação todos os dados serão apgados referente a esta entidade.</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="confirma(<?php echo $row->id; ?>);"class="btn btn-primary">Apagar</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.box-footer-->
</div><!-- /.box -->

</section><!-- /.content -->


