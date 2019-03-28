<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <meta http-equiv="content-type" content="text/html;charset=utf-8" />


        <title>TED - Transferência Eletrônica Digital</title>
        <!-- Tell the browser to be responsive to screen width -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>


    <body class="skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="<?= base_url('login') ?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>TED</b>Transferência Eletrônica</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>TED</b>Transfer</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">4</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">Voê possui 4 mensagens</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li><!-- start message -->
                                                <a href="#">
                                                    <div class="pull-left">

                                                        <img src="<?= base_url() ?>uploads/usuario/<" class="img-circle" alt="User Image" />
                                                    </div>
                                                    <h4>
                                                        Entidade: Condeuba
                                                        <small><i class="fa fa-clock-o"></i>  em 20/09/2015</small>
                                                    </h4>
                                                    <p>Mensagem de teste</p>
                                                </a>
                                            </li><!-- end message -->
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">Ver todas as mensagens</a></li>
                                </ul>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>

                                    <?php
                                    if ($this->session->userdata('permissao') == 'administrador') {
                                        $query = $this->db->get('avisos');
                                    } else {

                                        $this->db->where('entidade', $this->session->userdata('entidade'));
                                        $query = $this->db->get('avisos');
                                    }


                                    $query = $this->db->get('avisos');

                                    $avisos = $query->result();
                                    $tal = $query->num_rows();
                                    ?>
                                    <span class="label label-warning"><?php echo $tal ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">Você tem <?php echo $tal ?> avisos</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <?php for ($i = 0; $i < $tal; $i++) {
                                                ?>
                                                <li>
                                                    <a onclick="confirma(<?php echo $avisos[0]->id ?>);">
                                                        <i class="fa fa-users aviso text-aqua"></i> <?php
                                                        $variavelphp = "<script>document.write(variaveljs)</script>";
                                                        echo $variavelphp;


                                                        echo $avisos[0]->titulo
                                                        ?>
                                                    </a>
                                                </li>

                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">Ver todos</a></li>
                                </ul>
                            </li>
                            <!-- Tasks: style can be found in dropdown.less -->
                            
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">




                                    <?php
                                    $qimg = $this->db->get_where('entidade', array('id' => $this->session->userdata('entidade')));
                                    $img = $qimg->result();
                                    ?>



                                    <img src="<?= base_url() ?>uploads/entidades/<?php echo $img[0]->img; ?>" class="user-image" alt="User Image" />
                                    <span class="hidden-xs">Bem vindo <?= $this->session->userdata('nome'); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">




                                        <img src="<?= base_url() ?>uploads/entidades/<?php echo $img[0]->img; ?>" class="img-circle" alt="User Image" />
                                        <p>
                                            <?= $this->session->userdata('nome'); ?>
                                            <small><?= $this->session->userdata('permissao'); ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <!--                                    <li class="user-body">
                                                                            <div class="col-xs-4 text-center">
                                                                                <a href="#">Followers</a>
                                                                            </div>
                                                                            <div class="col-xs-4 text-center">
                                                                                <a href="#">Sales</a>
                                                                            </div>
                                                                            <div class="col-xs-4 text-center">
                                                                                <a href="#">Friends</a>
                                                                            </div>
                                                                        </li>-->
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?= base_url('login/logout') ?>" class="btn btn-default btn-flat">Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>

            </header>


