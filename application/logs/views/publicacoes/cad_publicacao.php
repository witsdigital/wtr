<div class="content-wrapper ">
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
    <section class="content col-md-8">
        
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
        <!-- Default bo<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>x -->
        <div class="box ">

            <div class="box-body">
                <div class="col-md-12">
                    <form action="<?= base_url(); ?>publicacoes/salvar" enctype="multipart/form-data" method="post">
                        <div class="box-body">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Data</label>



                                <input type="text" name="data" required id="reservation" class="form-control  " placeholder="Data">

                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Título</label>
                                <input type="text" required name="titulo" class="form-control " id="exampleInputEmail1" placeholder="Título da publicação">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tipo</label>
                                <select name="tipo" class="form-control select2 ">
                                    <option selected="selected">Selecione...</option>
                                    <?php foreach ($tppublicacao as $row) { ?> 
                                        <option value="<?php echo $row->nome ?>"><?php echo $row->nome ?></option>
                                    <?php } ?>
                                </select>
                            </div><!-- /.box-body -->


                            <div class="form-group col-md-6">
                                <label for="exampleInputFile">Selecione o arquivo</label>
                                <input type="file" multiple="multiple" id="ar[]" name="ar[]"  />


                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputFile">Local da publicação:</label><br>
                                <label>
                                    <input type="checkbox" name="de" class="flat-red"  /> Diario Oficial do Estado
                                </label>
                                <label>
                                    <input type="checkbox" name="dm" class="flat-red" checked /> Diario Oficial do Muncípio
                                </label>
                                <label>
                                    <input type="checkbox" name="du" class="flat-red" /> Diario Oficial da União
                                </label>

                            </div>




                            <div class=" col-md-12">
                                <label for="exampleInputFile">Objeto:</label>
                                <form>
                                    <textarea class="textarea" required name="objeto" placeholder="Entre com o objeto da publicação" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </form>

                            </div>
                            <div class=" col-md-12">
                                <br><button type="submit" class="btn btn-primary">Enviar</button>       <button  onclick="window.location.href='<?= base_url()?>publicacoes'" type="button" value="Cancelar" class="btn btn-danger">Cancelar</button>
                            </div>
                            <!-- tools box -->

                        </div><!-- /.box-body -->

                    </form>
                </div>
            </div><!-- /.box-body -->
           
        </div><!-- /.box -->

    </section><!-- /.content -->
    <section class="content col-md-4">
        
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
        <!-- Default bo<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>x -->
        <div class="box ">
            <div class="box-header with-border">
                <h3 class="box-title">IMPORTANTE</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="col-md-12">
                    <justify>
                        <h2 class="alert-danger">ATENÇÃO</h2>
                        <p align="justify">
                       
                            Lorem ipsum dolor sit amet, pri at illud erant epicurei, vis lorem impetus inimicus te. Lorem assum vivendum vel no, labores delectus qui cu. Veritus definitionem an est, eam ei minimum maiestatis deseruisse, vero elit nec at. Ex ius eius atomorum pericula. An est appetere incorrupte repudiandae.

An noster iisque duo, cum inani causae elaboraret ea, mea ne feugiat meliore albucius. At atqui congue salutatus quo. Primis salutandi scribentur id quo. Id est minimum noluisse sententiae. Prompta pericula cum in. Erant offendit per ne, ei pro equidem abhorreant, ex vix tantas melius blandit.

Nihil ponderum ei usu, nec no omnis postea, posse harum consetetur ius eu. Ne qui corpora intellegat scripserit. Ea vim essent atomorum, duo et maluisset conceptam, equidem intellegam cum ea. At tale copiosae fabellas sed, quo eu stet debet nostrum.

Sit equidem minimum ea, duo in meis luptatum. Impetus appareat sit ut. Usu ex alia summo offendit, timeam albucius senserit mea ne. Justo deseruisse id vel.

Usu ut debet volup     
                        </p>
                    </justify>
                </div>
            </div><!-- /.box-body -->
            
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

