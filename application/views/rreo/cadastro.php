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
            Comissão
            <small>cadastro</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?=  site_url() ?><?php echo $this->uri->segment(1); ?>"><?php echo $this->uri->segment(1); ?></a></li>
            <li class="active"><?php echo $this->uri->segment(2); ?></li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
        <!-- Default bo<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>x -->
        <div class="box">

            <div class="box-body">
                <form action="<?= site_url(); ?>rreo/salvar"  onsubmit="return validarSenha(this)" enctype="multipart/form-data" method="post">
                    <div class="col-md-12">

                        <div class="box-body">
                            <div class="form-group col-md-7">
                                <label for="exampleInputEmail1">Descrição</label>
                                <input type="text" name="descricao"  class="form-control" required placeholder="">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="exampleInputEmail1">Ano</label>
                                <input type="tel" name="ano"  class="form-control" required placeholder="">
                            </div>
							<div class="form-group col-md-7">
                                <label for="exampleInputEmail1">Orgão de publicação</label>
                                <input type="text" name="orgao_publicacao"  class="form-control" required placeholder="">
                            </div>
                             <div class="form-group col-md-7">
                                <label for="exampleInputEmail1">Arquivo</label>
                                <input type="file" name="userfile"  />  
                            </div>
                            
                            
                                 
							</div>
                                
                    </div>
                            
                           
                           
                            
                        </div><!-- /.box-body -->
                    </div>
                    
                    <div class=" col-md-12">
                        <br><button type="submit" class="btn btn-primary">Enviar</button> <button type="button" onclick="window.location.href='<?=  site_url('rreo')?>'" class="btn btn-danger">Cancelar</button>
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


<script>
	initSample();
</script>