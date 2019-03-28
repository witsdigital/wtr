

<script type="text/javascript">
    $(document).ready(function () {
        $(".confirma").click(function () {
            $("#myModal").modal('show');
        });
    });
</script>
<script type="text/javascript">

    function confirma(id) {
        document.getElementById('id').value = id;
        $("#myModal").modal('show');
    }
    function cadastro() {

       window.location.href = '<?= site_url('galeria/cadastro') ?>' ;

    }
    function alterar(id) {

       window.location.href = '<?= site_url('galeria/alterar') ?>'+'/'+id ;

    }


    function deleta() {
        window.location.href = '<?= site_url('galeria/apagar') ?>' + '/' + document.getElementById('id').value;

    }



</script>
<script type="text/javascript">
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo ucfirst($this->uri->segment(1)); ?>
            <small><?php echo ucfirst($this->uri->segment(1)); ?> Cadastradas</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= site_url() ?>especialidade"><?php echo $this->uri->segment(1); ?></a></li>
            <li class="active">Cadastradas</li>
        </ol>
    </section>

    <!-- Main content -->

    <div class="box-body">
        <div class="box">
            <div class="box-header">
                <div align="right"><input  onclick="cadastro();"  value="Novo Evento" class="btn btn-success"></button></div>

                <!--                  <h3 class="box-title">Data Table With Full Features</h3>-->
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 20px;">Id</th>
                            
                            <th>Evento</th>
                            <th>data</th>

                            <th >Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) { ?>
                            <tr>




                                <td><?php echo $row->id ?></td>
                                <td style="width: 60px;"><?php echo $row->titulo ?></td>
                                <td><?php echo $row->data ?></td>



                                <td align='center' style="width: 140px; ">
                                    
                                    <button onclick="alterar(<?php echo $row->id ?>);" class="btn confirma  btn-primary btn-flat" >Alterar</button>
                                    <button onclick="confirma(<?php echo $row->id ?>);" class="btn confirma  btn-danger btn-flat" >Apagar</button></td>

                            </tr><?php } ?>                       


                    </tbody>

                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Confirmação de operação</h4>
                    </div>
                    <div class="modal-body">
                        <p>Deseja mesmo apagar este evento?<input type="hidden" id="id" value=""></p>
                        <p class="text-warning"><small>Após esta operação todos os dados serão apagados referente a esta operação.</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="deleta();"class="btn btn-primary">Apagar</button>
                    </div>
                </div>
            </div>
        </div>

        




</div><!-- /.box-footer-->
</div><!-- /.box -->

</section><!-- /.content -->



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

<link href="<?= base_url() ?>assets/css/main.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/css/croppic.css" rel="stylesheet">

<!-- Fonts from Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Mrs+Sheppards&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.js"></script>