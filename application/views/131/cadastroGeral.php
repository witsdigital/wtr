<script type="text/javascript">
function validaSenha(input) {
if (input.value != document.getElementById('txtSenha').value) {
input.setCustomValidity('Senha não confere,preencha corretamente');
} else {
input.setCustomValidity('');
}
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
131
<small>cadastro 131 geral</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="<?=site_url()?><?php echo $this->uri->segment(1); ?>"><?php echo $this->uri->segment(1); ?></a></li>
<li class="active"><?php echo $this->uri->segment(2); ?></li>
</ol>
</section>



<!-- Main content -->
<section class="content">
<script src="<?=base_url()?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
<!-- Default bo<script src="<?=base_url()?>assets/bootstrap/js/bootstrap-datepicker.js"></script>x -->
<div class="box">

<div class="box-body">
<form action="<?=site_url();?>Um3Um/salvar"  onsubmit="return validarSenha(this)" enctype="multipart/form-data" method="post">
<h1>Arquivo da 131</h1>




<div class="row">

    <div class="col-md-4 offset-md-8">
        <div class="form-group ">
            <label for="exampleInputEmail1">Arquivo</label>
            <select  class="form-control" required  name="tp_file">
            <option value="">Selecione um tipo</option>
            <option value="1">Receita</option>
            <option value="2">Despesa</option>
            
           </select>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-4 offset-md-8">
        <div class="form-group ">
            <label for="exampleInputEmail1">Unidade Gestora</label>
            <select  class="form-control"  name="unidade_gestora">
                <?php 
                $query = $this->db->get('unidade_gestora')->result();
 foreach ($query as $row){?>
            <option value="<?= $row->id_unidade_gestora ?>"><?= $row->secretaria ?></option>
 <?php }?>
            <option value="99999" selected="true">Consolidado</option>
            </select>
        </div>
    </div>
   

</div>


    <div class="row">
        <div class="col-md-4 offset-md-8">
            <div class="form-group ">
                <label for="exampleInputEmail1">Arquivo</label>
                <input  class="form-control" type="file" name="arquivo" id="arquivo">
            </div>
        </div>
    </div>


</div>



<div class=" col-md-12">
<br><button type="submit" class="btn btn-primary">Enviar</button> <button type="button" onclick="window.location.href = '<?=site_url('Um3Um')?>'" class="btn btn-danger">Cancelar</button>

</div>



</div><!-- /.box-body -->
</div>
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