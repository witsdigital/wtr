<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Publicar
            <small>cadastro de publicações</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Publicar</a></li>
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
                    <form action="<?= base_url(); ?>publicar/salvar" enctype="multipart/form-data" method="post">
                        <div class="box-body">
                            

                           

                           
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Publicação relacionada</label>
                                <select name="idpublicacao" class="form-control select2 ">
                                    <option selected="selected">Selecione...</option>
                                    <?php
                                    $query = $this->db->query("select * from publicacoes where status = 0");
                                   $data = $query->result();

                                    foreach ($data as $dados) {
                                        ?> 
                                    <option value="<?php echo $dados->id ?>"><strong>Entidade:</strong> <?php echo $dados->entidade ?> - Titulo: <?php echo $dados->titulo ?></option>
<?php } ?>
                                </select>
                            </div><!-- /.box-body -->


                            
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Edição</label>
                                <input type="text" required name="edicao" class="form-control " id="exampleInputEmail1" placeholder="Edição">
                            </div>
                             <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Caderno</label>
                                <input type="text" required name="caderno" class="form-control " id="exampleInputEmail1" placeholder="Caderno">
                            </div>
                             <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">ementa</label>
                                <input type="text" required name="ementa" class="form-control " id="exampleInputEmail1" placeholder="Caderno">
                            </div>
                             <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Orgão</label>
                                <input type="text" required name="orgao" class="form-control " id="exampleInputEmail1" placeholder="Caderno">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputFile">Selecione o arquivo</label>
                                <input type="file" multiple="multiple" id="ar[]" name="ar[]"  />


                            </div>




                            <div class=" col-md-12">
                                <label for="exampleInputFile">Objeto:</label>
                                <form>
                                    <textarea class="textarea" required name="objeto" placeholder="Entre com o objeto da publicação" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </form>

                            </div>
                            <div class=" col-md-12">
                                <br><button type="submit" class="btn btn-primary">Enviar</button>       <button  onclick="window.location.href = '<?= base_url() ?>publicar'" type="button" value="Cancelar" class="btn btn-danger">Cancelar</button>
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


<!-- InputMask -->

<script type="text/javascript">
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy

        //iCheck for checkbox and radio inputs

    });
</script>

