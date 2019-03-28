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
    <section class="content">
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
        <!-- Default bo<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>x -->
        <div class="box">

            <div class="box-body">
                <form action="<?= site_url(); ?>usuario/salvar"  onsubmit="return validarSenha(this)" enctype="multipart/form-data" method="post">
                    <div class="col-md-6">

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" name="nome"  class="form-control" required placeholder="Nome">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Sobrenome</label>
                                <input type="text" name="sobrenome"  class="form-control" required placeholder="sobrenome">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">login</label>
                                <input type="text" name="login"  class="form-control" required placeholder="Login">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Senha</label>
                                <input id="txtSenha" type="password" name="senha"  class="form-control" required placeholder="Senha">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Confirma Senha</label>
                                <input type="password" name="confirmasenha"  class="form-control" required oninput="validaSenha(this)" placeholder="Nome">
                            </div>
                            
                        </div><!-- /.box-body -->
                    </div>
                    <div class="col-md-6">

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="email" name="email"  class="form-control" required placeholder="Email">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Tipo de Usuario</label>
                                <select name="permissao" class="form-control" >
                                    <option value="administrador">Administrador</option>
                                    <option value="editor">Editor</option>
                        
                                </select>
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

