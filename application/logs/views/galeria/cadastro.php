





<!-- Custom styles for this template -->
<link href="<?= base_url() ?>assets/css/main.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/css/croppic.css" rel="stylesheet">

<!-- Fonts from Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Mrs+Sheppards&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

<script>
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
            <li><a href="<?= base_url() ?><?php echo $this->uri->segment(1); ?>"><?php echo $this->uri->segment(1); ?></a></li>
            <li class="active"><?php echo $this->uri->segment(2); ?></li>
        </ol>
    </section>



    <!-- Main content -->
    <section class="content">
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>
        <!-- Default bo<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>x -->
        <div class="box">

            <div class="box-body">
                <form action="<?= base_url($this->uri->segment(1)); ?>/salvar"  onsubmit="return validarSenha(this)" enctype="multipart/form-data" method="post">
                    <div class="col-md-12">

                        <div class="box-body">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Nome do Evento </label>
                                <input type="text" name="titulo"  class="form-control" required placeholder="Nome da especialidade">
                            </div>


<div class="form-group col-md-4">
                         
                          

                                <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Selecione o arquivo</label>
                                    <input type="file" multiple="multiple" id="ar[]" name="ar[]"  />


                                </div>



                        </div>


                            <div class="form-group col-md-2">
                                <label for="exampleInputEmail1">ativo?</label><br>
                                <input type="checkbox" name="destaque" class="flat-red"  /> Sim         
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Descrição</label>
                                    <textarea id="editor" name="descricao" rows="10" class="form-group col-md-12"></textarea>
                                    <div  >
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box-body -->


                    </div>
                    <div class="col-md-6">


                        






                    </div><!-- /.box-body -->
                    <div class="col-md-12">








                    </div><!-- /.box-body -->


            </div>

            <div class=" col-md-12">

                <br><button type="submit" class="btn btn-primary">Enviar</button> <button type="button" onclick="window.location.href = '<?= base_url($this->uri->segment(1)) ?>'" class="btn btn-danger">Cancelar</button>
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
