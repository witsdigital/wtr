
<?php 
header('Content-Type: text/html; charset=utf-8');
?>


<script type="text/javascript">
   function validaSenha (input){ 
    if (input.value != document.getElementById('txtSenha').value) {
    input.setCustomValidity('Senha não confere,preencha corretamente');
  } else {
    input.setCustomValidity('');
  }
} 
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            131
            <small>cadastro de Receita</small>
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
                <form  target="_blank"  action="<?= site_url(); ?>Um3Um/printReport"  onsubmit="return validarSenha(this)" enctype="multipart/form-data" method="post">
                      
                      
                <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">Tipo de Arquivo</label>
                        <select  class="form-control"  name="tipo">
                            
                            <option value="1">Despesa</option>
                            <option value="2">Receita</option>



                        </select>
                    </div>
                <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">Tipo de operação</label>
                        <select  class="form-control"  name="operacao">
                            
                            <option value="0">Consolidado</option>
                            <option value="EMP">(despesa) Empenho</option>
                            <option value="LIQ">(despesa) Liquidação</option>
                            <option value="PAG">(despesa) Pagamento</option>
                            <option value="ORC">(Receita) Orçamentário</option>
                            <option value="NORC">(Receita) Extra-Orçamentário</option>



                        </select>
                    </div>
                      <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">Mes inicial</label>
                        <select  class="form-control"  name="competenciaa">
                            <option value="1">Janeiro</option>
                            <option value="2">Fevereiro</option>
                            <option value="3">Março</option>
                            <option value="4">Abril</option>
                            <option value="5">Maio</option>
                            <option value="6">Junho</option>
                            <option value="7">Julho</option>
                            <option value="8">Agosto</option>
                            <option value="9">Setembro</option>
                            <option value="10">Outubro</option>
                            <option value="11">Novembro</option>
                            <option value="12">Dezembro</option>



                        </select>
                    </div>
                   
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">ano</label>
                        <select  class="form-control"  name="ano">
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option selected value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>




                        </select>
                    </div>
                   
                    <div class=" col-md-12">
                        <br><button type="submit" class="btn btn-primary">Gerar</button> 
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