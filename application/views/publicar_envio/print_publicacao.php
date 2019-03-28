
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript">
    $(document).ready(function() {
        $(".viewpdf").click(function() {
            $("#myModal").modal('show');
        });
    });
</script>
<body onload="window.print();">


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
                <small>#<?php echo substr($row->keyarquivo,  -11,11);?></small>
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
                    <strong>Local da publicação</strong><br>
                   <?php 
                    $local = $row->local;
                                
                                
                                if ($local == "1") {
                                    $local = "Diário do Estado";
                                }
                                if ($local == "2") {
                                    $local = "Diário do Município";
                                }
                                if ($local == "3") {
                                    $local = "Diário da União";
                                }
                                if ($local == "4") {
                                    $local = "Diário Estado"." | "."Diário Município";
                                }
                                if ($local == "5") {
                                  $local = "Diário Estado"." | "."Diário Município"." | "."Diário União";
                                } echo $local?>
                   
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                
                <address>
                    <strong>Objeto</strong><br>
                    7<?php echo $row->objeto ?>
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b> Código</b>
                <br/>
               
                <small>#<?php echo substr($row->keyarquivo,  -11,11);?></small>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome do arquivo</th>
                           

                        </tr>
                    </thead>
                    <tbody>
<?php
$query = $this->db->get_where('upload_arquivo', array('key' => $row->keyarquivo));
$dados = $query->result();
foreach ($dados as $rowa) {
    ?>  
                            <tr>
                                <td><?php echo $rowa->arquivo ?></td>
                                <td style="width: 200px;"> </td>
<?php } ?>  
                        </tr>


                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->



        <!-- this row will not appear when printing -->
     
        </div>
    </section><!-- /.content -->
    <div class="clearfix"></div>
</div><!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-user bg-yellow"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                            <p>New phone +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                            <p>Execution time 5 seconds</p>
                        </div>
                    </a>
                </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul><!-- /.control-sidebar-menu -->

        </div><!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked />
                    </label>
                    <p>
                        Some information about this general settings option
                    </p>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked />
                    </label>
                    <p>
                        Other sets of options are available
                    </p>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked />
                    </label>
                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div><!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked />
                    </label>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right" />
                    </label>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div><!-- /.form-group -->
            </form>
        </div><!-- /.tab-pane -->
    </div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</body>


