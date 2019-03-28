
<script type="text/javascript">
    $(document).ready(function() {
        $(".arquivo").click(function() {
            $("#myModal").modal('show');
        });
    });
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Publicações
            <small>cadastro de publicações</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Publicações</a></li>
            <li class="active">Cadastro</li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">

        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
        <!-- Default bo<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>x -->
        <div class="box">

            <div class="box-body">
                <div class="col-md-12">
                    <form action="<?= base_url(); ?>publicacoes/update" enctype="multipart/form-data" method="post">
                        <div class="box-body">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Data</label>



                                <input type="text" name="data" required id="reservation" class="form-control  "  value="<?php echo date("d/m/Y", strtotime($publicacao[0]->data)) ?>"placeholder="Data">
                                <input type="hidden" name="id" value="<?php echo $publicacao[0]->id ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Título</label>
                                <input type="text" required name="titulo" value="<?php echo $publicacao[0]->titulo ?>" class="form-control " id="exampleInputEmail1" placeholder="Título da publicação">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tipo</label>
                                <select name="tipo" class="form-control select2 ">
                                    <option selected="selected">Selecione...</option>
                                    <option selected><?php echo $publicacao[0]->tipo ?></option>
                                    <?php foreach ($tppublicacao as $row) { ?> 
                                        <option value="<?php echo $row->nome ?>"><?php echo $row->nome ?></option>
                                    <?php } ?>
                                </select>
                            </div><!-- /.box-body -->


                            <div class="form-group col-md-6">
                                <label for="exampleInputFile">Selecione o arquivo</label><br>
                                 <button type="button" class="arquivo btn btn-primary">Enviar arquivos</button>
                               


                            </div>
                            <div class="form-group col-md-12">



                                <?php
                                if ( $publicacao[0]->local =="1" || $publicacao[0]->local =="4"|| $publicacao[0]->local =="5"
                                        || $publicacao[0]->local =="7") {
                                    $local0 = "checked";
                                }else{
                                    $local0 = "";
                                }
                                if ($publicacao[0]->local =="2" || $publicacao[0]->local =="4"|| $publicacao[0]->local =="5"|| $publicacao[0]->local =="6" ) {
                                    $local1 = "checked";
                                }else{
                                    $local1 = "";
                                }
                                if ($publicacao[0]->local =="3" || $publicacao[0]->local =="5"|| $publicacao[0]->local =="6" || $publicacao[0]->local =="7") {
                                   $local2 = "checked";
                                }else{
                                    $local2 = "";
                                }
                               
                                
                                
                                ?>
                                <label for="exampleInputFile">Local da publicação:</label><br>
                                <label>
                                    <input type="checkbox" name="de" class="flat-red" <?php echo $local0 ?>  /> Diario Oficial do Estado
                                </label>
                                <label>
                                    <input type="checkbox" name="dm" class="flat-red" <?php echo $local1 ?> /> Diario Oficial do Muncípio
                                </label>
                                <label>
                                    <input type="checkbox" name="du" class="flat-red" <?php echo $local2 ?> /> Diario Oficial da União
                                </label>

                            </div>




                            <div class=" col-md-12">
                                <label for="exampleInputFile">Objeto:</label>
                                <form>
                                    <textarea class="textarea" required name="objeto" placeholder="Entre com o objeto da publicação" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $publicacao[0]->objeto?></textarea>
                                </form>

                            </div>
                            <div class=" col-md-12">
                                <br><button type="submit" class="btn btn-primary">Salvar</button>       <button  onclick="window.location.href = '<?= base_url() ?>publicacoes'" type="button" value="Cancelar" class="btn btn-danger">Cancelar</button>
                            </div>
                            <!-- tools box -->

                        </div><!-- /.box-body -->

                    </form>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">

            </div><!-- /.box-footer-->
        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Confirmação de operação</h4>
                    </div>
                    <div class="modal-body">
                        <p>Envio de arquivos extras</p>
                        <form action="<?= base_url(); ?>publicacoes/upfile/<?php echo $publicacao[0]->id ?>" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="keyfile" value="<?php echo $publicacao[0]->keyarquivo ?>">
                            <p class="text-warning"><small> <input  type="file" multiple="multiple" id="ar[]" name="ar[]"  /></small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Enviar</button>
                   </form> </div>
                </div>
            </div>
        </div>

<!-- InputMask -->

<script type="text/javascript">
    $(function() {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy

        //iCheck for checkbox and radio inputs

    });
</script>

