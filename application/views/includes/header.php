<?php
                    if ($this->session->userdata('permissao')) {
                        
                    } else {
                        redirect('login/index');
                    }
                    ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

       
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
                           
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">




                                    <?php
                                    $qimg = $this->db->get_where('entidade', array('id' => $this->session->userdata('entidade')));
                                    $img = $qimg->result();
                                    ?>



                                    <img src="<?= base_url() ?>uploads/usuario/default.png" class="user-image" alt="User Image" />
                                    <span class="hidden-xs">Bem vindo, <?= $this->session->userdata('nome'); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">




                                        <img src="<?= base_url() ?>uploads/entidades/default.png" class="img-circle" alt="User Image" />
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
         
                        </ul>
                    </div>
                </nav>

            </header>


