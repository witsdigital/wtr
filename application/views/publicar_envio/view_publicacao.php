

<script type="text/javascript">

    $(document).ready(function () {

        $(".delete").click(function () {

            $("#myModal").modal('show');

        });

    });

</script>

<script type="text/javascript">



    function confirma(id) {





        location.href = "<?= site_url() ?>publicacoes/apagar/" + id;



    }







</script>



<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            <?php foreach ($publicacao as $row) { ?>



                <?php

                $mes = substr($row->data, 5, -3);





                switch ($mes) {

                    case '01':

                        $dirdata = "janeiro";

                        break;

                    case '02':

                        $dirdata = "fevereiro";

                        break;

                    case '03':

                        $dirdata = "marco";

                        break;

                    case '04':

                        $dirdata = "abril";

                        break;

                    case '05':

                        $dirdata = "maio";

                        break;

                    case '06':

                        $dirdata = "junho";

                        break;

                    case '07':

                        $dirdata = "julho";

                        break;

                    case '08':

                        $dirdata = "agosto";



                        break;

                    case '09':

                        $dirdata = "setembro";

                        break;

                    case '10':

                        $dirdata = "outubro";

                        break;

                    case '11':

                        $dirdata = "novembro";

                        break;

                    case '12':

                        $dirdata = "dezembro";

                        break;

                }

                $entidade = $this->session->userdata('entidade');

                ?>  

                Código

                <small>#<?php echo substr($row->id_envio, -11, 11); ?></small>

            </h1>

            <ol class="breadcrumb">

                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

                <li><a href="#">Examples</a></li>

                <li class="active">Invoice</li>

            </ol>

        </section>







        <!-- Main content -->

        <section class="invoice"> 

            <!-- title row -->

            <div class="row">

                <div class="col-xs-12">

                    <h2 class="page-header">



                        <i class="fa fa-globe"></i> <?php echo $row->titulo ?>

                    <?php } ?>

                    <small class="pull-right"><?php echo date("d/m/Y", strtotime($row->data)) ?></small>

                </h2>

            </div><!-- /.col -->

        </div>

        <!-- info row -->

        <div class="row invoice-info">

            <div class="col-sm-4 invoice-col">



                <address>

                    <strong>Título</strong><br>

                    <?= $row->titulo ?>



                </address>

            </div><!-- /.col -->

            <div class="col-sm-4 invoice-col">



                <address>

                    <strong>Observação</strong><br>

                    <?php echo $row->observacao ?>

                </address>

            </div><!-- /.col -->



        </div><!-- /.row -->



        <!-- Table row -->

        <div class="row">

            <div class="col-xs-12 table-responsive">

                <table class="table table-striped">

                    <thead>

                        <tr>

                            <th>Nome do arquivo</th>

                            <th>Ação</th>



                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        $query = $this->db->get_where('upload_arquivo', array('cod_envio' => $row->id_envio));

                        $dados = $query->result();

                      

                        foreach ($dados as $rowa) {

                         

                           

                            ?>  

                            <tr>

                                <td><?php echo $rowa->arquivo ?></td>

                                <td style="width: 200px;"> <?php ?><button onclick="window.open('<?php echo $rowa->arquivo ?>')" class="btn viewpdf btn-primary">Visualizar</button>

                                    

                                </td>

                            <?php } ?>  

                        </tr>





                    </tbody>

                </table>

            </div><!-- /.col -->

        </div><!-- /.row -->







        <!-- this row will not appear when printing -->

        <div class="row no-print">

            <div class="col-xs-12">

             
                <a href="<?= site_url('publicar/verpub') ?>" class="btn btn-primary"><i class="fa "></i> voltar</a>



            </div>

        </div>

    </section><!-- /.content -->

    <div class="clearfix"></div>

</div><!-- /.content-wrapper -->





<!-- Control Sidebar -->



<!-- Add the sidebar's background. This div must be placed

     immediately after the control sidebar -->

<div class="control-sidebar-bg"></div>

<div id="myModal" class="modal fade">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title">Confirmação de operação</h4>

            </div>

            <div class="modal-body">

                <p>Deseja mesmo apagar esta publicação?</p>

                <p class="text-warning"><small>Após esta operação todos os dados serão apgados referente a esta publicação.</small></p>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                <button type="button" onclick="window.location.href = '<?= site_url('publicar/delete_file') ?>/<?php echo $rowa->id_envio ?>'"class="btn btn-primary">Apagar</button>

            </div>

        </div>

    </div>

</div>

</div><!-- ./wrapper -->



