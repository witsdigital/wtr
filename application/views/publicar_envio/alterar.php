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
                <div class="col-md-6">
                    <form action="<?= site_url(); ?>publicar/update" enctype="multipart/form-data" method="post">
                        <div class="box-body">


                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Data</label>

                                <input type="hidden" name="id" value="<?= $publicacao[0]->id ?>">

                                <input disabled type="text" name="data" value="<?= date('d/m/Y', strtotime($publicacao[0]->data)); ?>" required id="reservation" class="form-control  " placeholder="Data">

                            </div>





                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Título</label>
                                <input type="text" required name="titulo" value="<?= $publicacao[0]->titulo ?>" class="form-control " id="exampleInputEmail1" placeholder="Título">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tipo</label>
                                <select  class="form-control"  name="tipo">
                                    <option selected ><?= $publicacao[0]->tipo ?></option>
                                    <option  >Pregão</option>
                                    <option >Leis</option>
                                    <option >Licitação</option>
                                    <option >contrato</option>

                                </select>
                            </div>

                           



                            <div class=" col-md-12">
                                <label for="exampleInputFile">Objeto:</label>
                                <form>
                                    <textarea class="textarea" required name="objeto" placeholder="Entre com o objeto da publicação" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $publicacao[0]->objeto ?></textarea>
                                </form>

                            </div>
                            <div class=" col-md-12">
                                <br><button type="submit" class="btn btn-primary">Enviar</button>       <button  onclick="window.location.href = '<?= site_url() ?>publicar'" type="button" value="Cancelar" class="btn btn-danger">Cancelar</button>
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

