<script type="text/javascript">
   function validaSenha (input){ 
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
            Publicações
            <small>cadastro de Usuário</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?=  base_url('usuario')?>">Usuários</a></li>
            <li class="active">Cadastro</li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
        <!-- Default bo<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>x -->
        <div class="box">

            <div class="box-body">
                <form action="<?= base_url(); ?>entidade/salvar"  onsubmit="return validarSenha(this)" enctype="multipart/form-data" method="post">
                    <div class="col-md-12">

                        <div class="box-body">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">cidade</label>
                                <input type="text" name="nome"  class="form-control" required placeholder="cidade">
                            </div>
                             <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Tipo</label>
                                <select required name="tipo" class="form-control">
                                    <option value="" selected="selected" disabled> Selecione...</option>
                                    <option>Prefeitura</option>
                                    <option>Câmara</option>
                                    <option>Autarquias</option>
                                    
                                </select>
                            </div>
                             <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Estado</label>
                                <select name="estado" class="form-control">
                                   
                    <option value="" selected="selected">Selecione...</option>
                    <option >BAHIA</option>
                    <option >ACRE</option>
                    <option >ALAGOAS</option>
                    <option >AMAPÁ</option>
                    <option >AMAZONAS</option>
                    <option >CEARÁ</option>
                    <option >DISTRITO FEDERAL</option>
                    <option >ESPIRITO SANTO</option>
                    <option >GOIÁS</option>
                    <option >MARANHÃO</option>
                    <option >MATO GROSSO</option>
                    <option >MATO GROSSO DO SUL</option>
                    <option >MINAS GERAIS</option>
                    <option >PARÁ</option>
                    <option >PARAÍBA</option>
                    <option >PARANÁ</option>
                    <option >PERNANBUCO</option>
                    <option >PIAUÍ</option>
                    <option >RIO DE JANEIRO</option>
                    <option >RIO GRANDE DO NORTE</option>
                    <option >RIO GRANDE DO SUL</option>
                    <option >RONDÔNIA</option>
                    <option >RORAIMA</option>
                    <option >SANTA CATARINA</option>
                    <option >SÃO PAULO</option>
                    <option >SERGIPE</option>
                    <option >TOCANTINS</option>
                  
                                    
                                </select>
                            </div>
                             <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Brasão</label>
                                <input type="file" name="userfile"  />  
                            </div>
                           
                            
                        </div><!-- /.box-body -->
                    </div>
                    
                    <div class=" col-md-12">
                        <br><button type="submit" class="btn btn-primary">Enviar</button> <button type="button" onclick="window.location.href='<?=  base_url('entidade')?>'" class="btn btn-danger">Cancelar</button>
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
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy

        //iCheck for checkbox and radio inputs

    });
</script>

