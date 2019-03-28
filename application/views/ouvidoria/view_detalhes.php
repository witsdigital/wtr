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
            Conto do site
            <small></small>
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
                    <div class="col-md-12">

                        <?php foreach ($data as $row) { ?>
						
							<h4>Assunto: <?php echo $row->assunto; ?></h4>
							
							<b> Nome: </b><?php echo $row->nome; ?><br>
							<b> Email: </b><?php echo $row->email; ?><br>
							<b> Telefone: </b><?php echo $row->telefone; ?><br><br>
							
							<b> Descrição: </b><?php echo $row->descricao; ?><br>
							
						<?php }?>
                                 
					</div>
                                
            </div>
                            
                           
                           
                            
        </div><!-- /.box-body -->
                <button onclick="window.location.href = '<?= site_url('contato/index') ?>'" class="btn btn-primary btn-flat">Voltar</button>
							

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