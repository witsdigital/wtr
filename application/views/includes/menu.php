<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel --> 
        <div class="user-panel">
            <div class="pull-left image">
                <?php
                $query = $this->db->get_where('usuario', array('entidade' => $this->session->userdata('entidade')));
                $user = $query->result();
                ?>
                <img src="uploads/usuario/<?php echo $user[0]->img; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">

                <p>

                    <?php
                    if ($this->session->userdata('permissao') == "administrador") {
                        $entidade = "Administrador";
                    } else {
                        $entidade = $this->session->userdata('nome');
                    }echo $entidade;
                    ?></p>
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
					
                    <li><a href="<?= site_url() ?>publicar/enviarpub"><i class="fa fa-circle-o"></i>Enviar</a></li>
                    <li><a href="<?= site_url() ?>publicar/verpub"><i class="fa fa-circle-o"></i> Publicações enviadas</a></li>
                   


                </ul>
            
            </li>
            <li class="treeview">
			<a href="#">
				<i class="fa  fa-file-text-o"></i> <span>131</span> <i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">

			
				<li><a href="<?= site_url() ?>Um3Um/reportPdf"><i class="fa fa-circle-o"></i>Exportar</a></li>
			</ul>
		</li>
			<li class="treeview">
			<a href="#">
			<i class="fa  fa-file-text-o"></i>
			<span>E-sic</span>			<i class="fa fa-angle-left pull-right"></i>                </a> 
			<ul class="treeview-menu">
			<li><a href="<?= site_url() ?>sic"><i class="fa fa-circle-o"></i>Visualizar</a></li> 
			</ul>            
			</li>

			



            <!--                        <li class="treeview">
                                        <a href="#">
                                            <i class="fa  fa-file-text-o"></i> <span>Publicações</span> <i class="fa fa-angle-left pull-right"></i>
                                        </a>
                                        <ul class="treeview-menu">
            
                                            <li><a href="<?= site_url() ?>/publicacoes/cadastro"><i class="fa fa-circle-o"></i> Publicar</a></li>
                                            <li><a href="<?= site_url() ?>/publicacoes"><i class="fa fa-circle-o"></i>Visualizar</a></li>
                                        </ul>
                                    </li>

             <li class="treeview">
                <a href="#">
                    <i class="fa  fa-file-text-o"></i> <span>131</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">

                    <li><a href="<?= site_url() ?>/Um3Um/cadastro"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
                    <li><a href="<?= site_url() ?>/Um3Um"><i class="fa fa-circle-o"></i>Visualizar</a></li>
                </ul>
            </li> -->


            <!--            <li class="treeview">
                            <a href="#">
                                <i class="fa fa-share"></i> <span>Cadastro</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
            
            
                            <ul class="treeview-menu">
            
                                <li>
                                    <a href="#"><i class="fa fa-circle-o"></i> Usuarios<i class="fa fa-angle-left pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?= site_url('usuario/cadastro') ?>"><i class="fa fa-circle-o"></i>Cadastrar</a></li>
                                        <li>
                                            <a href="<?= site_url('usuario') ?>"><i class="fa fa-circle-o"></i> Visualizar</a>
            
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-circle-o"></i> Entidade<i class="fa fa-angle-left pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="<?= site_url('entidade/cadastro') ?>"><i class="fa fa-circle-o"></i>Cadastrar</a></li>
                                        <li>
                                            <a href="<?= site_url('entidade') ?>"><i class="fa fa-circle-o"></i> Visualizar</a>
            
                                        </li>
                                    </ul>
                                </li>
            
                            </ul>
                        </li>-->

		
						
						
						
            <li class="treeview">
                <a href="#">
                    <i class="fa  fa-file-text-o"></i> <span>Prefeitura</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
			
                <ul class="treeview-menu">

        
					<li><a href="<?= site_url() ?>secretarias"><i class="fa fa-circle-o"></i>Secretarias</a></li>
                    <!--<li><a href="<?= site_url() ?>/tv_camara"><i class="fa fa-circle-o"></i> TV Camara</a></li> -->
                    <!-- <li><a href="<?= site_url() ?>/aviso"><i class="fa fa-circle-o"></i> Avisos</a></li> -->
                   


                </ul>
            </li>
<!--            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Minha conta</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= site_url() ?>/publicacoes/cadastro"><i class="fa fa-circle-o"></i> Editar Perfil</a></li>
                    <li><a href="<?= site_url() ?>/publicacoes"><i class="fa fa-circle-o"></i> Mudar Senha</a></li>
                </ul>
            </li>-->
<!--            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bars"></i><span>Utilitários</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= site_url() ?>/publicacoes/cadastro"><i class="fa fa-circle-o"></i> Cadastro</a></li>
                    <li><a href="<?= site_url() ?>/publicacoes"><i class="fa fa-circle-o"></i> Ver publicações</a></li>
                </ul>
            </li>-->
<!--            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calculator"></i><span>Financeiro</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= site_url() ?>/financeiro"><i class="fa fa-circle-o"></i> Deposito</a></li>
                    <li><a href="<?= site_url() ?>/publicacoes"><i class="fa fa-circle-o"></i>Saque</a></li>
                    <li><a href="<?= site_url() ?>/publicacoes"><i class="fa fa-circle-o"></i>Contas à Pagar</a></li>
                    <li><a href="<?= site_url() ?>/publicacoes"><i class="fa fa-circle-o"></i>Contas à Receber</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i><span>Relatórios</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= site_url() ?>/relatorios/log"><i class="fa fa-circle-o"></i> Log de usuários</a></li>
                    <li><a href="<?= site_url() ?>/publicacoes/cadastro"><i class="fa fa-circle-o"></i> Publicações</a></li>
                    <li><a href="<?= site_url() ?>/publicacoes"><i class="fa fa-circle-o"></i>Usuários</a></li>
                </ul>
            </li>-->

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>