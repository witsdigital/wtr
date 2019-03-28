
<script type="text/javascript">
    $(document).ready(function() {
        $(".arquivo").click(function() {
            $("#myModal").modal('show');
        });
    });
</script>


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
            Vereadores
            <small>Alterar vereador</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?=  base_url() ?><?php echo $this->uri->segment(1); ?>"><?php echo $this->uri->segment(1); ?></a></li>
            <li class="active"><?php echo $this->uri->segment(2); ?></li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
        <!-- Default bo<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>x -->
        <div class="box">

            <div class="box-body">
                <form action="<?= base_url(); ?>comissao/update"  onsubmit="return validarSenha(this)" enctype="multipart/form-data" method="post">
                    <div class="col-md-12">
                        
                        <div class="box-body">
                            <div class="form-group col-md-7">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="hidden" value="<?php echo $Vereadores[0]->id; ?>" name="iduser">
                                <input type="text" name="nome" value="<?php echo $Vereadores[0]->nome?>"  class="form-control" required placeholder="nome">
                            </div>
                            <div class="form-group col-md-3">  <label for="exampleInputEmail1">Imagem</label><br>
                                 <button type="button" class=" form-group btn arquivo btn-primary" >alterar imagem</button> 
                            </div>
                            <div class="form-group col-md-7">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="email" value="<?php echo $Vereadores[0]->email?>"  class="form-control" required placeholder="email">
                            </div>
                            <div class="form-group col-md-7">
                                <label for="exampleInputEmail1">Sala</label>
                                <input type="text" name="sala" value="<?php echo $Vereadores[0]->sala?>"  class="form-control" required placeholder="sala">
                            </div>
                            <div class="form-group col-md-7">
                            <label for="exampleInputEmail1">Comissão</label>
                            <select  class="form-control"  name="cargo">
                                <option disabled value="<?php echo $Vereadores[0]->cargo?>" selected><?php echo $Vereadores[0]->cargo?></option>
                               
                                    <option value="Legislação, justiça e redação">Legislação, justiça e redação</option>
                                    <option value="Finanças, orçamentos e tomadas de contas">Finanças, orçamentos e tomadas de contas</option>
                                    <option value="Serviços publicos municipais">Serviços publicos municipais</option>
                                    <option value="Temporario">Temporário</option>
                        
                    
                    
                            </select>
                        </div>
                            
                            
                           
                           
                            
                        </div><!-- /.box-body -->
                    </div>
                    
                    <div class=" col-md-12">
                        <br><button type="submit" class="btn btn-primary">Salvar</button> <button type="button" onclick="window.location.href='<?=  base_url('comissao')?>'" class="btn btn-danger">Cancelar</button>
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

<div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Confirmação de operação</h4>
                    </div>
                    <div class="modal-body">
                        <p>Envio de arquivos extras</p>
                        <form action="<?= base_url(); ?>comissao/updateimg" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="iduser" value="<?php echo $Vereadores[0]->id ?>">
                            <p class="text-warning"><small>      <input type="file" name="userfile"  />  </small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Enviar</button>
                   </form> </div>
                </div>
            </div>
        </div>