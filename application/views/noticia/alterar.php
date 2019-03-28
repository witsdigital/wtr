
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
            Notícias
            <small>Alterar Notícias</small>
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
                <form action="<?= site_url(); ?>noticia/update"  onsubmit="return validarSenha(this)" enctype="multipart/form-data" method="post">
                    <div class="col-md-12">
                        
                        <div class="box-body">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Titulo</label>
                                <input type="hidden" value="<?php echo $noticia[0]->id?>" name="iduser">
                                <input type="text" name="titulo" value="<?php echo $noticia[0]->titulo?>"  class="form-control" required placeholder="">
                            </div>
							<div class="form-group col-md-4">
                                <label for="exampleInputEmail1">SubTitulo</label>
                                <input type="hidden" value="<?php echo $noticia[0]->id?>" name="iduser">
                                <input type="text" name="subtitulo" value="<?php echo $noticia[0]->subtitulo?>"  class="form-control"  placeholder="">
                            </div>
							<div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Categoria</label>
                                 <select class="form-control" name="categoria">
								 <?php foreach ($cat as $row) { ?>
								  <option <?php if($noticia[0]->categoria == $row->id_categoria){ echo 'selected'; } ?> value="<?php echo $row->id_categoria; ?>"><?php echo $row->nomecategoria; ?></option>
								 <?php } ?> 
								</select> 
                            </div>
                            <div class="form-group col-md-2">
                                <label for="exampleInputEmail1">Destaque?</label><br>
                                
                              <input type="checkbox" name="destaque" class="flat-red" <?php if( $noticia[0]->destaque == '1'){echo 'checked';}?>  /> Sim 
                            </div>
                            <div class="form-group col-md-3">  <label for="exampleInputEmail1">Imagem</label><br>
                                 <button type="button" class=" form-group btn arquivo btn-primary" >alterar imagem</button> 
                            </div>
                            
                             <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Conteudo</label>
                         
                                    <textarea  id="editor"  name="descricao" rows="10" class="form-group col-md-12"><?php echo $noticia[0]->conteudo?></textarea>	
			
                                
                            </div>
                            
                           
                           
                            
                        </div><!-- /.box-body -->
                    </div>
                    
                    <div class=" col-md-12">
                        <br><button type="submit" class="btn btn-primary">Salvar</button> <button type="button" onclick="window.location.href='<?=  site_url('noticia')?>'" class="btn btn-danger">Cancelar</button>
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
                        <form action="<?= site_url(); ?>noticia/updateimg" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="iduser" value="<?php echo $noticia[0]->id ?>">
                            <p class="text-warning"><small>      <input type="file" name="userfile"  />  </small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Enviar</button>
                   </form> </div>
                </div>
            </div>
        </div>