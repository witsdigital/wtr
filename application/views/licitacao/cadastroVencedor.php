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
           Vencedor Licitação
            <small>cadastro do vencedor da Licitação</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= site_url('licitacao') ?>">Licitação</a></li>
            <li class="active">Cadastro</li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
        <!-- Default bo<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>x -->
        <div class="box">

            <div class="box-body">
                <form action="<?= site_url(); ?>licitacao/salvarVencedor"  onsubmit="return validarSenha(this)" enctype="multipart/form-data" method="post">
                    <div class="col-md-6">

                        <div class="box-body">
                           
                            
                           <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nº da Licitação</label>
                                <select name="cod_licitacao" class="form-control" >
                                 
                                    <?php 
                                    $md = $this->db->get('licitacao')->result();
                                    foreach ($md as $row){ ?>
                                    
                                   <option value="<?= $row->id_licitacao?>"><?= $row->cod_licitacao?></option>
                                    <?php 
                                      }
                                      ?>
                                
                        
                                </select>
                            </div>
                            
                             
                        
                             <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Nº Contrato</label>
                                <input type="text" name="cod_contrato"  class="form-control" required placeholder="ABC-2030">
                            </div>
                             <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Valor Contrato</label>
                                <input type="number" name="valor_contrato"  class="form-control" required placeholder="ABC-2030">
                            </div>
                             <div class="form-group col-md-7">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" name="nome"  class="form-control" required placeholder="Joao da Silva">
                            </div>
                             <div class="form-group col-md-5">
                                <label for="exampleInputEmail1">CPF|CNPJ</label>
                                <input type="text" name="doc"  class="form-control" required placeholder="Joao da Silva">
                            </div>
                          
                          
                        </div><!-- /.box-body -->
                    </div>
                   
                    <div class=" col-md-12">
                        <br><button type="submit" class="btn btn-primary">Cadastrar</button> <button type="button" onclick="window.location.href='<?=  site_url('usuario')?>'" class="btn btn-danger">Cancelar</button>
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

