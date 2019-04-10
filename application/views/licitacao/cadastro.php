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
            Licitação
            <small>cadastro de Licitação</small>
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
                <form action="<?= site_url(); ?>licitacao/salvar"  onsubmit="return validarSenha(this)" enctype="multipart/form-data" method="post">
                    <div class="col-md-6">

                        <div class="box-body">
                             <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Número Licitação</label>
                                <input type="text" name="cod_licitacao"  class="form-control" required placeholder="ABC-2030">
                            </div>
                            
                           <div class="form-group col-md-8">
                                <label for="exampleInputEmail1">Unidade Gestora</label>
                                <select name="cod_unidade" class="form-control" >
                                 
                                    <?php 
                                    $md = $this->db->get('unidade_gestora')->result();
                                    foreach ($md as $row){ ?>
                                    
                                   <option value="<?= $row->id_unidade_gestora?>"><?= $row->secretaria?></option>
                                    <?php 
                                      }
                                      ?>
                                
                        
                                </select>
                            </div>
                            
                               <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Data Homologação</label>



                                <input type="text" name="data_limite"  id="reservation" class="form-control  " placeholder="Data">

                            </div>
                               <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Data Publicação</label>



                                <input type="text" name="data_publicacao" required id="reservation" class="form-control  " placeholder="Data">

                            </div>
                               <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Data Abertura</label>



                                <input type="text" name="data_abertura" required id="reservation" class="form-control  " placeholder="Data">

                            </div>
                           <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Modalidade</label>
                                <select name="modalidade" class="form-control" >
                                 
                                    <?php 
                                    $md = $this->db->get('modalidade_licitacao')->result();
                                    foreach ($md as $row){ ?>
                                    
                                     <option value="<?= $row->id_modalidade_licitacao?>"><?= $row->descricao?></option>
                                    <?php 
                                      }
                                      ?>
                                
                        
                                </select>
                            </div>
                             <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Processo Administrativo</label>
                                <input type="text" name="numero_processo_adm"  class="form-control" required placeholder="ABC-2030">
                            </div>
                          
                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Número Edital</label>
                                <input type="text" name="numero_edital"  class="form-control" required placeholder="abca-2000">
                            </div>
                               <div class="form-group col-md-8">
                                <label for="exampleInputEmail1">URL Edital</label>
                                <input type="text" name="url_edital"  class="form-control"  placeholder="http://....">
                            </div>
                               <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Horário abertura</label>
                                <input type="text" name="horario"  class="form-control" required placeholder="00:00">
                            </div>
                            
                            
                               <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control" >
                                    <option value="1">Concluído</option>
                                    <option selected="true" value="2">Em andamento</option>
                                    <option value="3">Cancelada</option>
                                    <option value="4">Suspensa</option>
                                    
                        
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Valor</label>
                                <input type="text" name="valor"  class="form-control" required placeholder="1.234,56">
                            </div>
                            
                          <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Objeto</label>
                                   <textarea id="editor" name="objeto" rows="10" class="form-group col-md-12"></textarea>            
                            </div>
                          
                            
                        </div><!-- /.box-body -->
                    </div>
                    <div class="col-md-6">

                        <div class="box-body">
                            <div class="form-group col-md-9">
                                <label for="exampleInputEmail1">Razão Social Vencedor</label>
                                <input type="text" name="razao_social_vencedor"  class="form-control"  placeholder="Jose da silva">
                            </div>
                              <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Número Contrato</label>
                                <input type="text" name="numero_contrato"  class="form-control" required placeholder="abca-2000">
                            </div>
                              <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Url Contrato</label>
                                <input type="text" name="url_contrato"  class="form-control" required placeholder="http://.....">
                            </div>

                             <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">CPF/CNPJ Vencedor</label>
                                <input type="text" name="cnpj_vencedor"  class="form-control"  placeholder="0000000000">
                            </div>
<div class="form-group col-md-12">
                                <label for="exampleInputEmail1">informe Homologação</label>
                                   <textarea id="editorw" name="informe_homologacao" rows="10" class="form-group col-md-12"></textarea>            
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

