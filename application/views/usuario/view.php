


<script type="text/javascript">
    $(document).ready(function() {
        $(".confirma").click(function() {
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
        window.location.href = '<?= site_url('usuario/apagar') ?>' + '/' + document.getElementById('id').value;

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
            <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= site_url() ?>usuario">Usuarios</a></li>
            <li class="active">Cadastrados</li>
        </ol>
    </section>

    <!-- Main content -->

    <div class="box-body">
        <div class="box">
            <div class="box-header">
                <div align="right"><input  onclick="window.location.href = '<?= site_url() ?>usuario/cadastro'" type="button" value="Novo Usuário" class="btn btn-success"></button></div>
                <!--                  <h3 class="box-title">Data Table With Full Features</h3>-->
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>

                            <th>Imagem</th>
                            <th>Nome</th>

                            <th>Login</th>
                            <th>Email</th>
                            <th >Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($usuarios as $row) { ?>
                            <tr>




                                <td>
                                    <?php
                                    $selimg = $this->db->get_where('entidade', array('id' => $row->entidade));

                                    $img = $selimg->result();

                                    if ($img[0]->img == "") {
                                        $caminho = 'uploads/temp/no_img.jpg';
                                    } else {
                                        $caminho = 'uploads/entidades/' . $img[0]->img;
                                    }
                                    ?>



                                    <img src="<?= base_url() ?><?php echo $caminho; ?>" class="user-image  user user-menu" alt="User Image" width="40px" height="40px" />


                                </td>

                                <td><?php echo $row->nome ?></td>
                                <td><?php echo $row->login ?></td>
                                <td><?php echo $row->email ?></td>
               

                                <td style="width: 135px;"><button onclick="window.location.href = '<?= site_url() ?>usuario/alterar/<?php echo $row->idusuario; ?>'" class="btn btn-warning btn-flat">Alterar</button><button onclick="confirma(<?php echo $row->idusuario ?>);" class="btn confirma  btn-danger btn-flat" >Apagar</button></td>

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
                        <p>Deseja mesmo apagar este usuário?<input type="hidden" id="id" value=""></p>
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


