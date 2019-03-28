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

<script type="text/javascript">
    function validaSenha(input) {
        if (input.value != document.getElementById('txtSenha').value) {
            input.setCustomValidity('Senha não confere,preencha corretamente');
        } else {
            input.setCustomValidity('');
        }
    }
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Usuários
            <small>cadastro de Usuário</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= site_url('usuario') ?>">Usuários</a></li>
            <li class="active">Cadastro</li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content col-md-4">
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
        <!-- Default bo<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>x -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Operação</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
                <form action="<?= site_url(); ?>financeiro/deposito"  onsubmit="return validarSenha(this)" enctype="multipart/form-data" method="post">
                    <div class="col-md-12">

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Conta</label>
                                <select class="form-control select2 " name="conta">
                                    <option class="form-control">Escolha uma conta...</option>
                                    <?php
                                    $query = $this->db->get('conta');
                                    $contas = $query->result();
                                    foreach ($contas as $c) {
                                        ?>
                                        <option class="form-control" value="<?php echo $c->id_conta ?>"><?php echo $c->id_conta ?> - <?php echo $c->titulo ?></option>

                                    <?php } ?>

                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Data</label>
                                <input type="text" name="data"  class="form-control" required placeholder="Data">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Descricao</label>
                                <input type="text" name="descricao"  class="form-control" required placeholder="Descricao">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Quantia</label>
                                <input id="txtSenha" type="text" name="quantia"  class="form-control" required placeholder="Quantia">
                            </div>


                        </div><!-- /.box-body -->
                    </div>

                    <div class=" col-md-12">
                        <br><button type="submit" class="btn btn-primary">Enviar</button> <button type="button" onclick="window.location.href = '<?= site_url('usuario') ?>'" class="btn btn-danger">Cancelar</button>
                    </div>
                </form>
            </div><!-- /.box-body -->
            <div class="box-footer">

            </div><!-- /.box-footer-->
        </div><!-- /.box -->

    </section><!-- /.content -->
    <section class="content col-md-8">

        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
        <!-- Default bo<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>x -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Extrato</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 20px;">Conta</th>

                            <th>Descricao</th>
                            <th>Valor</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lancamentos as $row) { ?>
                            <tr>



                               </td>
                                <td>
                                    <?php
                                    $query = $this->db->get_where('conta', array('id_conta' => $row->conta));

                                    foreach ($query->result() as $cc) {
                                        ?>   

                                    <?php echo $cc->titulo; ?></td>
                                <?php }
                                ?>
                                <td><?php echo $row->descricao ?></td>
                                <td><?php echo  str_replace(".",",",$row->valor ) ?></td>



                            </tr><?php } ?>                       


                    </tbody>

                </table>
            </div><!-- /.box-body -->
            <div class="box-footer">

            </div><!-- /.box-footer-->
        </div><!-- /.box -->

    </section><!-- /.content -->

</div><!-- /.content-wrapper -->


<!-- InputMask -->

<script type="text/javascript">
                            $(function () {
                                //Initialize Select2 Elements
                                $(".select2").select2();

                                //Datemask dd/mm/yyyy

                                //iCheck for checkbox and radio inputs

                            });
</script>