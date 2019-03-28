
<!-- FastClick -->

<!-- jvectormap -->
<script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?= base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?= base_url() ?>assets/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Painel Central
            <small>Controle da entidade</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <?php
                        $publicacoes = $this->db->query("select * from publicacoes where status = 0");
                        $rowcount = $publicacoes->num_rows();

                        $user = $this->db->query("select * from usuario");
                        $rowcountuser = $user->num_rows();

                        $noti = $this->db->get('noticias');
                        $noti = $noti->num_rows();

                        $enti = $this->db->get('entidade');
                        $totalenti = $enti->num_rows();

                        $publicadas = $this->db->query("select * from publicadas where status = 1");
                        $rowcountpublicada = $publicadas->num_rows();
                        ?>
                        <h3><?php echo $rowcount ?></h3>
                        <p>Publicações pendentes</p>
                    </div>
                    <div class="icon">
                        <i class=" fa fa-file-text-o"></i>
                    </div>
                    <a href="<?= base_url('publicacoes') ?>" class="small-box-footer">Publicações <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $rowcountpublicada; ?></h3>
                        <p>Publicações publicadas</p>
                    </div>
                    <div class="icon">
                        <i class=" fa fa-file-text-o"></i>
                    </div>
                    <a href="<?= base_url('publicar') ?>" class="small-box-footer">Publicadas <i class="fa fa-arrow-circle-right"></i></a>

                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">

                        <h3><?php echo $rowcountuser ?></h3>
                        <p>Usuários registrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?= base_url('usuario') ?>" class="small-box-footer">Usuarios <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $totalenti ?></h3>
                        <p>Clientes Cadastrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="<?= base_url('entidade') ?>" class="small-box-footer">Clientes <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->
        

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
                <!-- MAP & BOX PANE -->

                <div class="row">
                    <div class="col-md-6">
                        <!-- DIRECT CHAT -->
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Estatística de uso</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="chart-responsive">
                                            <canvas id="pieChart" height="190"></canvas>
                                        </div><!-- ./chart-responsive -->
                                    </div><!-- /.col -->
                                    <div class="col-md-4">
                                        <ul class="chart-legend clearfix">
                                            <li><i class="fa fa-circle-o text-red"></i> Câmaras</li>
                                            <li><i class="fa fa-circle-o text-green"></i> Prefeituras</li>
                                            <li><i class="fa fa-circle-o text-yellow"></i> Autarquias</li>

                                        </ul>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- /.box-body -->
                            <div class="box-footer no-padding">
                                <!--                                <ul class="nav nav-pills nav-stacked">
                                                                    <li><a href="#">United States of America <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                                                                    <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a></li>
                                                                    <li><a href="#">China <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                                                                </ul>-->
                            </div><!-- /.footer -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->

                    <div class="col-md-6">
                        <!-- USERS LIST -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Clientes cadastrados</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <ul class="products-list product-list-in-box">
<?php
$query = $this->db->query('SELECT * FROM entidade LIMIT 3');
$cliente = $query->result();


foreach ($cliente as $rowcliente) {
    $query0 = $this->db->get_where('publicacoes', array('entidade' => $rowcliente->id));
    $totalpublica = $query0->num_rows();

    if ($rowcliente->img == "") {
        $caminho = 'uploads/temp/no_img.jpg';
    } else {
        $caminho = 'uploads/entidades/' . $rowcliente->img;
    }
    ?>
                                        <li class="item">
                                            <div class="product-img">

                                                <img src="<?= base_url() ?><?php echo $caminho ?>" alt="Product Image" width="30px" height="30px">
                                            </div>
                                            <div class="product-info">
                                                <a href="" class="product-title"><?php echo $rowcliente->nome ?> <span class="label label-warning pull-right"><?php echo $totalpublica; ?> publicações</span></a>

                                            </div>
                                        </li><!-- /.item -->

<?php } ?>

                                </ul>
                            </div><!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="<?= base_url('entidade') ?>" class="uppercase">Mais clientes</a>
                            </div><!-- /.box-footer -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <!-- TABLE: LATEST ORDERS -->

            </div><!-- /.col -->

            <div class="col-md-4">
                <!-- Info Boxes Style 2 -->
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Mensagem de clientes</span>
                        <span class="info-box-number">2</span>
                        <div class="progress">
                            <div class="progress-bar" style="width:2%"></div>
                        </div>
                        <span class="progress-description">
                            Veja mais
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Downloads de Publicações</span>
                        <span class="info-box-number">0</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 0%"></div>
                        </div>
                        <span class="progress-description">
                            <a href='<?= base_url('noticia') ?>'>Veja Mais</a>
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Notícias Cadastradas</span>
                        <span class="info-box-number"><?php echo $noti ?></span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 0%"></div>
                        </div>
                        <span class="progress-description">
                            <a href='<?= base_url('noticia') ?>'>Veja Mais</a>
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->



                <!-- PRODUCT LIST -->

            </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Main row -->


    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
        {
            value: 100,
            color: "#f56954",
            highlight: "#f56954",
            label: "Câmaras"
        },
        {
            value: 500,
            color: "#00a65a",
            highlight: "#00a65a",
            label: "Prefeituras"
        },
        {
            value: 400,
            color: "#f39c12",
            highlight: "#f39c12",
            label: "Autarquias"
        }


    ];
</script>