





<!-- Custom styles for this template -->
<link href="<?= base_url() ?>assets/css/main.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/css/croppic.css" rel="stylesheet">

<!-- Fonts from Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Mrs+Sheppards&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

<script>
    function alterarimg(id) {

        window.location.href = '<?= site_url('galeria/alterarimg') ?>' + '/' + id;

    }
    function apaga(id, key) {

        window.location.href = '<?= site_url('galeria/apagarimg') ?>' + '/' + id + '/' + key;

    }
    function voltar(id) {

        window.location.href = '<?= site_url('galeria/alterar') ?>' + '/' + id;

    }



    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-10627690-5', 'auto');
    ga('send', 'pageview');

</script>
<script type="text/javascript">
    function validaSenha(input) {
        if (input.value != document.getElementById('txtSenha').value) {
            input.setCustomValidity('Senha não confere,preencha corretamente');
        } else {
            input.setCustomValidity('');
        }
    }
</script>

<?php
session_start();
$_SESSION['folder'] = $this->uri->segment(1);
$_SESSION['folder2'] = $this->uri->segment(1);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo ucfirst($this->uri->segment(1)); ?>
            <small>cadastro de <?php echo $this->uri->segment(1); ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= site_url() ?><?php echo $this->uri->segment(1); ?>"><?php echo $this->uri->segment(1); ?></a></li>
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
                    <form action="<?= site_url($this->uri->segment(1)); ?>/salvarimg"  onsubmit="return validarSenha(this)" enctype="multipart/form-data" method="post">
                        <div class="col-md-12">

                            <div class="box-body">
                                
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputFile">Selecione o arquivo</label>
                                        <input type="file" multiple="multiple" id="ar[]" name="ar[]"  />
                                        <input type="hidden" name="chave" value="<?= $chave ?>">
                                    </div>
                                <div class=" col-md-6">

                    <br><button type="submit" class="btn btn-primary">Enviar</button> <button type="button" onclick="window.location.href = '<?= site_url($this->uri->segment(1)) ?>/alterar/<?= $chave ?>'" class="btn btn-danger">Cancelar</button>
                </div>
                               


                            </div><!-- /.box-body -->


                        </div>
                        <div class="col-md-6">


                        </div><!-- /.box-body -->



                </div>

                
                </form>
                <div class="box-body">

                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">Id</th>


                                    <th style="width: 80%;">Imagem</th>

                                    <th style="width: 10%;" >Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (empty($imgevento)) {
                                    echo"<div align='center'><h3>Sem resultados</h3><button class='btn btn-primary' onclick='voltar(" . $chave . ");'>Voltar </button></div>";
                                }
                                foreach ($imgevento as $row) {
                                    ?>
                                    <tr>




                                        <td><?php echo $row->id ?></td>
                                        <td style="width: 200px;"><img width="100px" height="100px" src="<?= site_url() ?>uploads/galeria/<?php echo $row->arquivo ?>"></td>




                                        <td align='center' >

                                            <button onclick="apaga(<?php echo $row->id ?>,<?php echo $row->key ?>);" class="btn  btn-danger btn-flat" >Apagar</button></td>

                                    </tr><?php } ?>                       

                            </tbody>

                        </table>
                    </div><!-- /.box-body -->

                </div><!-- /.box-body -->


            </div>
            <div class="col-md-6">









            </div><!-- /.box-body -->
            <div class="col-md-12">








            </div><!-- /.box-body -->


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


<script>
    initSample();
</script>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->



<script src="<?= base_url() ?>assets/js/jquery.mousewheel.min.js"></script>
<script src="<?= base_url() ?>assets/croppic.min.js"></script>
<script src="<?= base_url() ?>assets/js/main.js"></script>
<script>

    var croppicContainerModalOptions = {
        uploadUrl: '<?= base_url('up_croppic') ?>',
        cropUrl: '<?= base_url('crop_up_croppic') ?>',
        modal: true,
        imgEyecandyOpacity: 0.4,
        loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function () {
            console.log('onBeforeImgUpload')
        },
        onAfterImgUpload: function () {
            console.log('onAfterImgUpload')
        },
        onImgDrag: function () {
            console.log('onImgDrag')
        },
        onImgZoom: function () {
            console.log('onImgZoom')
        },
        onBeforeImgCrop: function () {
            console.log('onBeforeImgCrop')
        },
        onAfterImgCrop: function () {
            console.log('onAfterImgCrop')
        },
        onReset: function () {
            console.log('onReset')
        },
        onError: function (errormessage) {
            console.log('onError:' + errormessage)
        }
    }
    var cropContainerModal = new Croppic('cropContainerModal', croppicContainerModalOptions);





</script>
