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
            131
            <small>Alterar dados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= site_url('usuario') ?>">Usuários</a></li>
            <li class="active">Cadastro</li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="col-md-6">
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
        <!-- Default bo<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>x -->
        <div class="box">

            <div class="box-body">
                <form action="<?= site_url(); ?>Um3Um/updatereceita"  onsubmit="return validarSenha(this)" enctype="multipart/form-data" method="post">
                    <div class="col-md-12">

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Unidade</label>
                                <input type="text" name="nome" disabled value="<?php echo $dados[0]->unidade_gestora?>"  class="form-control" required placeholder="Nome">
                                <input type="hidden" name="id" value="<?php echo $dados[0]->id?>" >
                                  <input type="hidden" name="cod" value="<?php echo $dados[0]->cod?>" >
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Modalidade</label>
                                <input type="text" name="sobrenome" disabled value="<?php echo $dados[0]->modalidade?>" class="form-control" required placeholder="sobrenome">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Data</label>
                                <input type="text" name="data"  value="<?php echo $dados[0]->data_registro?>" class="form-control" required placeholder="Login">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Valor</label>
                                <input id="txtSenha" type="text" name="valor" value="<?php echo trim($dados[0]->valor)?>"  class="form-control" required placeholder="Senha">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Natureza</label>
                                <input type="text" name="natureza"  class="form-control" value="<?php echo $dados[0]->natureza?>" required  placeholder="Nome">
                            </div>
                            
                        </div><!-- /.box-body -->
                    </div>
                    
                    <div class=" col-md-12">
                        <br><button type="submit" class="btn btn-primary">Enviar</button><button type="button" onclick="window.location.href='<?=  site_url('usuario')?>'" class="btn btn-danger">Cancelar</button>
                    </div>
                </form>
            </div><!-- /.box-body -->
            <div class="box-footer">

            </div><!-- /.box-footer-->
        </div><!-- /.box -->

    </section><!-- /.content -->
    <section class="col-md-6">
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
        <!-- Default bo<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>x -->
        <div class="box">

            <div class="box-body">
                dsdsd
            </div><!-- /.box-body -->
            <div class="box-footer">

            </div><!-- /.box-footer-->
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<!-- InputMask -->

<script type="text/javascript">
    $(function() {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy

        //iCheck for checkbox and radio inputs

    });
</script>

