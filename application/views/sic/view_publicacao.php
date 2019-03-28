

<script type="text/javascript">

    $(document).ready(function () {

        $(".delete").click(function () {

            $("#myModal").modal('show');

        });

    });

</script>

<script type="text/javascript">



    function confirma(id) {





        location.href = "<?= site_url() ?>publicacoes/apagar/" + id;



    }







</script>



<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            <?php foreach ($sic as $row) { ?>


                Código

                <small>#<?php echo substr($row->id_sic, -11, 11); ?></small>

            </h1>

            <ol class="breadcrumb">

                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

                <li><a href="#">sic</a></li>

                <li class="active">view</li>

            </ol>

        </section>







        <!-- Main content -->

        <section class="invoice"> 

            <!-- title row -->

            <div class="row">

                <div class="col-xs-12">

                    <h2 class="page-header">

                        <i class="fa fa-globe"></i> <?php echo $row->assunto ?>

                    <?php } ?>

                    <small class="pull-right"></small>

                </h2>

            </div><!-- /.col -->

        </div>

        <!-- info row -->

        <div class="row invoice-info">
		
		<div class="col-sm-12 invoice-col">



               <h3>Informações do Solicitante</h3>

		</div>

			
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>Nome</strong><br>

                    <?= $row->nome ?>



                </address>

            </div><!-- /.col -->

            <div class="col-sm-6 invoice-col">



                <address>

                    <strong>Email: </strong><br>

                   <?php echo $row->email; ?>

                </address>

            </div><!-- /.col -->
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>CPF</strong><br>

                   <?php echo $row->cpf; ?>

                </address>

            </div><!-- /.col -->
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>Sexo:</strong><br>

                   <?php echo $row->sexo; ?>

                </address>

            </div><!-- /.col -->
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>Telefone residencial:</strong><br>

                   <?php echo $row->tel1; ?>

                </address>

            </div><!-- /.col -->
			
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>Telefone comercial:</strong><br>

                   <?php echo $row->tel2; ?>

                </address>

            </div><!-- /.col -->
			
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>Telefone celular:</strong><br>

                   <?php echo $row->tel3; ?>

                </address>

            </div><!-- /.col -->
			
			<div class="col-sm-12 invoice-col">



               <h3>Endereço</h3>

			</div>
			
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>Pais:</strong><br>

                   <?php echo 'Brasil'; ?>

                </address>

            </div><!-- /.col -->
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>Cep:</strong><br>

                   <?php echo $row->cep; ?>

                </address>

            </div><!-- /.col -->
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>Logradouro:</strong><br>

                   <?php echo $row->logradouro; ?>

                </address>

            </div><!-- /.col -->
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>Número:</strong><br>

                   <?php echo $row->numero; ?>

                </address>

            </div><!-- /.col -->
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>Complemento:</strong><br>

                   <?php echo $row->complemento; ?>

                </address>

            </div><!-- /.col -->
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>Referência:</strong><br>

                   <?php echo $row->referencia; ?>

                </address>

            </div><!-- /.col -->
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>Bairro:</strong><br>

                   <?php echo $row->bairro; ?>

                </address>

            </div><!-- /.col -->
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>Município:</strong><br>

                   <?php echo $row->nome_cidade; ?>

                </address>

            </div><!-- /.col -->
			
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>Estado:</strong><br>

                   <?php echo $row->nome_estado; ?>

                </address>

            </div><!-- /.col -->
			
			<div class="col-sm-12 invoice-col">



               <h3>Informações da solicitação</h3>

			</div>
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>Departamento/setor:</strong><br>

                   <?php echo $row->titulo; ?>

                </address>

            </div><!-- /.col -->
			<div class="col-sm-6 invoice-col">



                <address>

                    <strong>Forma de resposta:</strong><br>

                   <?php echo $row->tp_resposta; ?>

                </address>

            </div><!-- /.col -->
			            <div class="col-sm-6 invoice-col">



                <address>

                    <strong>Assunto</strong><br>

                    <?= $row->assunto ?>



                </address>

            </div><!-- /.col -->
			
			 <div class="col-sm-6 invoice-col">



                <address>

                    <strong>Descrição da solicitação</strong><br>

                    <?= $row->descricao ?>



                </address>

            </div><!-- /.col -->
			
			<div class="col-sm-12 invoice-col">


			<?php $i = 1;
			foreach ($arquivos as $linha){ ?>
             <?php echo 'Arquivo '.$i.'<br><br>'; ?>   <a href="<?php echo  $linha->url; ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Ver arquivo</a>
			<?php
			echo '<br><br>';
			$i++;
			} ?>
            </div><!-- /.col -->

		<div class="row no-print" style="float: right;">

            <div class="col-xs-12">

              <!--  <a href="<?php echo $row->file ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Ver arquivo</a> -->

                <a href="<?= site_url('sic') ?>" class="btn btn-primary"><i class="fa "></i> voltar</a>



            </div>

        </div>

        </div><!-- /.row -->



        <!-- Table row -->









        <!-- this row will not appear when printing -->

        

    </section><!-- /.content -->







<!-- Control Sidebar -->



<!-- Add the sidebar's background. This div must be placed

     immediately after the control sidebar -->

<div class="control-sidebar-bg"></div>

<div id="myModal" class="modal fade">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title">Confirmação de operação</h4>

            </div>

            <div class="modal-body">

                <p>Deseja mesmo apagar esta publicação?</p>

                <p class="text-warning"><small>Após esta operação todos os dados serão apgados referente a esta publicação.</small></p>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                <button type="button" onclick="window.location.href = '<?= site_url('publicar/delete_file') ?>/<?php echo $rowa->id ?>'"class="btn btn-primary">Apagar</button>

            </div>

        </div>

    </div>

</div>











