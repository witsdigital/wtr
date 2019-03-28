<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Publicar

            <small>envio de publicações</small>

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

                    <form action="<?= site_url(); ?>publicar/salvarenvio" enctype="multipart/form-data" method="post">

                        <div class="box-body">





                            <div class="form-group col-md-6">

                                <label for="exampleInputEmail1">Data</label>







                                <input type="text" name="data" required id="reservation" class="form-control  " placeholder="Data">



                            </div>











                            <div class="form-group col-md-6">

                                <label for="exampleInputEmail1">Título</label>

                                <input type="text" required name="titulo" class="form-control " id="exampleInputEmail1" placeholder="Título">

                            </div>





                            <div class="form-group col-md-6">

                                <label for="exampleInputEmail1">Tipo</label>

                                <select  class="form-control"  name="tipo">

                                   <?php $query = $this->db->get('tp_publi')->result();

                                    foreach($query as $row){

                                    ?>

                                    <option ><?= $row->nome?></option>

                                   <?php }?>



                                </select>

                            </div>



                            <div class="form-group col-md-6">

                                <label for="exampleInputFile">Selecione o arquivo</label>

                                <input type="file" multiple="multiple" id="ar[]" name="ar[]"  />





                            </div>









                            <div class=" col-md-12">

                                <label for="exampleInputFile">Observação</label>

                                <form>

                                    <textarea class="textarea" required name="observacao" placeholder="" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

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



<?php



//phpinfo();



?>