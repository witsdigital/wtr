
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
            Painel do Administrador
            <small>Controle total</small>
        </h1>

    </section>

    <!-- Main content -->
<!--    <section class="content">
         Small boxes (Stat box) 
        
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Média de publicação Mensal</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <div class="btn-group">
                                <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Ação</a></li>

                                    <li><a href="#">Mudar filtro</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Fechar</a></li>
                                </ul>
                            </div>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div> /.box-header 
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="text-center">
                                    <strong>Publicações desde </strong>
                                </p>
                                <div class="chart">
                                     Sales Chart Canvas 
                                    <canvas id="salesChart" style="height: 180px;"></canvas>
                                </div> /.chart-responsive 
                            </div> /.col 
                            <div class="col-md-4">
                                <p class="text-center">
                                    <strong>Status do servidor</strong>
                                </p>
                                <div class="progress-group">
                                    <span class="progress-text">Arquivos Enviados p/ publicar</span>
                                    <?php
                                    $query = $this->db->get('upload_arquivo');
                                    $t_publicacoes = $query->num_rows();
                                    ?>
                                    <span class="progress-number"><b><?php echo $t_publicacoes ?></b>/500</span>
                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-aqua" style="width: <?php echo $t_publicacoes ?>%"></div>
                                    </div>
                                </div> /.progress-group 
                                <div class="progress-group">
                                    <span class="progress-text">Arquivos publicados</span>
                                    <?php
                                    $publicado = $this->db->get('upload_arquivo_publicado');
                                    $t_publicados = $publicado->num_rows();
                                    ?>
                                    <span class="progress-number"><b><?php echo $t_publicados ?></b>/400</span>
                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-red" style="width: <?php echo $t_publicados ?>%"></div>
                                    </div>
                                </div> /.progress-group 
                                <div class="progress-group">
                                    <span class="progress-text">Acessos ao site p/Mês</span>
                                    <span class="progress-number"><b>0</b>/800</span>
                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-green" style="width: 0%"></div>
                                    </div>
                                </div> /.progress-group 
                                <div class="progress-group">
                                    <span class="progress-text">Erros do site </span>
                                    <span class="progress-number"><b>0</b>/500</span>
                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-yellow" style="width: 0%"></div>
                                    </div>
                                </div> /.progress-group 
                            </div> /.col 
                        </div> /.row 
                    </div> ./box-body 
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                                    <?php
                                    $this->db->select('saldo');
                                    $saldoconta = $this->db->get('conta');
                                    $saldoconta = $saldoconta->result();
                                    $saldoconta = $saldoconta[0]->saldo;

                                    $this->db->select_sum('valor');
                                    $sum = $this->db->get('financeiro_deposito');
                                    $sum = $sum->result();
                                    $saldo2 = $sum[0]->valor;

                                    $saldototal = number_format($saldo2 + $saldoconta, 2, '.', '');
                                    ?>
                                    <h5 class="description-header">R$ <?php echo $saldototal ?></h5>

                                    <span class="description-text">TOTAL RECEITA</span>
                                </div> /.description-block 
                            </div> /.col 
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                                    <h5 class="description-header">R$ 00,00</h5>
                                    <span class="description-text">TOTAL DESPESA</span>
                                </div> /.description-block 
                            </div> /.col 
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                                    <h5 class="description-header">R$3.000,00</h5>
                                    <span class="description-text">TOTAL A PAGAR</span>
                                </div> /.description-block 
                            </div> /.col 
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block">
                                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                                    <h5 class="description-header">R$ 350,00</h5>
                                    <span class="description-text">TOTAL A RECEBER</span>
                                </div> /.description-block 
                            </div>
                        </div> /.row 
                    </div> /.box-footer 
                </div> /.box 
            </div> /.col 
        </div> /.row 

         Main row 
        

    </section> /.content -->
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