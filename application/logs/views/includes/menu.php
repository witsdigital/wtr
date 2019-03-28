<!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">  
                            <?php
                                    $qimg = $this->db->get_where('entidade', array('id' => $this->session->userdata('entidade')));
                            $img = $qimg->result();
                            ?>
                            <img src="<?= base_url() ?>uploads/entidades/<?php echo $img[0]->img; ?>" height="20px" width="20px" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">

                            <p>

                                <?php echo $img[0]->nome; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..." />
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">Menu</li>





                        <li class="treeview">
                            <a href="#">
                                <i class="fa  fa-file-text-o"></i> <span>Publicações</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">

                                <li><a href="<?= base_url() ?>publicacoes/cadastro"><i class="fa fa-circle-o"></i> Publicar</a></li>
                                <li><a href="<?= base_url() ?>publicacoes"><i class="fa fa-circle-o"></i>Visualizar</a></li>
                            </ul>
                        </li>

                            <li class="treeview">
                            <a href="#">
                                <i class="fa  fa-file-text-o"></i> <span>131</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">

                                <li><a href="<?= base_url() ?>publicacoes/cadastro"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
                                <li><a href="<?= base_url() ?>publicacoes"><i class="fa fa-circle-o"></i>Visualizar</a></li>
                            </ul>
                        </li>

                    
                        <li class="treeview">
                            <a href="#">
                                <i class="fa  fa-file-text-o"></i> <span>Utilidades</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">

                                <li><a href="<?= base_url() ?>noticia"><i class="fa fa-circle-o"></i> Notícias</a></li>
                                <li><a href="<?= base_url() ?>vereador"><i class="fa fa-circle-o"></i>Veradores</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Minha conta</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url() ?>publicacoes/cadastro"><i class="fa fa-circle-o"></i> Editar Perfil</a></li>
                                <li><a href="<?= base_url() ?>publicacoes"><i class="fa fa-circle-o"></i> Mudar Senha</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bars"></i><span>Utilitários</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Cadastro</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Ver publicações</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i><span>Relatórios</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url() ?>publicacoes/cadastro"><i class="fa fa-circle-o"></i> Publicações</a></li>
                                <li><a href="<?= base_url() ?>publicacoes"><i class="fa fa-circle-o"></i>Usuários</a></li>
                            </ul>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>