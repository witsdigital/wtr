
<?php
$query = $this->db->get('configuracoes')->result();
?>
<html lang="en-US">

    <head>
    
        <link rel="icon" type="image/png" href="<?= base_url() ?>uploads/favicon.png" />
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-46117675-3"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-46117675-3');
        </script>


        <style>
            .imgcalendar{
                width: 40%;
            }
        </style>
        <meta charset="UTF-8"/>
        <?php if (isset($noticia)) { ?>


           


        <?php } else { ?>
            <title><?= $query[0]->entidade ?> </title>
            <meta property="og:image" content="<?= $query[0]->logo ?>">
            <meta property="og:title" content="<?= $query[0]->entidade ?>">
            <meta property="og:description" content="<?= $query[0]->entidade ?>">
            <meta property="og:type" content="website">
            <meta property="og:url" content="<?php echo base_url() ?>">
        <?php } ?>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


    </head>


    <body class="home page">

        <div style="background-color: #f2f2f3;" class="boxed-container">
            <div  class="">
                <div  class="container">
                    <div class="row">
                       
                        <div class="col-xs-12 col-md-2">
                            <div class="top__left"> <a style="font-size: 12px; color: green" href="#footer" accesskey="b">Ir para Rodapé [Alt+b]</a></div>

                        </div>
                        <div class="col-xs-12 col-md-2">
                            <div class="top__left"> <a style="font-size: 12px; color: green" href="#menu1" accesskey="a">Ir para Menu 1 [Alt+a]</a></div>

                        </div>
                        <div class="col-xs-12 col-md-2">
                            <div class="top__left"> <a style="font-size: 12px; color: green" onclick="window.toggleContrast()" accesskey="h">Alto contraste [Alt+h]</a></div>

                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="top__right">
                                <ul id="menu-top-menu" class="navigation--top">
                                    <li class="menu-item-has-children"><a href="extras.html">Utilidades</a>
                                        <ul class="sub-menu">
                                            <li><a href="#">FAQ</a></li>
                                            <li><a href="#">Transparência</a></li>
                                            <li><a href="#">Telefones úteis</a></li>

                                        </ul>
                                    </li>

                                    <li>FONE/FAX: <?= $query[0]->telefone ?> </li>
                                </ul>	

                            </div>
                        </div>
                    </div>
                </div>
            </div>

          <header class="header">
		<div class="container">
			<div class="logo">
				<a href="index.html">
                                    <img  src="<?= base_url() ?>assets/images/logo.png" alt="BuildPress" class="img-responsive"/>
				</a>
			</div>
			<div class="header-widgets  header-widgets-desktop">
				<div class="widget  widget-icon-box">	
					<div class="icon-box">
						<i class="fa  fa-phone  fa-3x"></i>
						<div class="icon-box__text">
							<h4 class="icon-box__title"><?= $query[0]->telefone ?> </h4>
							<!--<span class="icon-box__subtitle"><?= $query[0]->email ?> </span>-->
						</div>
					</div>
				</div>
				<div class="widget  widget-icon-box">	
					<div class="icon-box">
						<i class="fa fa-home fa-3x"></i>
						<div class="icon-box__text">
							<h4 class="icon-box__title"><?= $query[0]->endereco ?> </h4>
							<span class="icon-box__subtitle"><?= $query[0]->cidade ?> </span>
						</div>
					</div>
				</div>
				<div class="widget  widget-icon-box">	
					<div class="icon-box">
						<i class="fa  fa-clock-o  fa-3x"></i>
						<div class="icon-box__text">
							<h4 class="icon-box__title">Seg - Sex 8:00 - 17:00</h4>
							<!--<span class="icon-box__subtitle">Sunday CLOSED</span>-->
						</div>
					</div>
				</div>
				<div class="widget  widget-social-icons">	
					<a class="social-icons__link" href="#" target="_blank"><i class="fa  fa-facebook"></i></a>
					<a class="social-icons__link" href="#" target="_blank"><i class="fa  fa-twitter"></i></a>
					<a class="social-icons__link" href="#" target="_blank"><i class="fa  fa-youtube"></i></a>
				</div>	
			</div>
			<!-- Toggle Button for Mobile Navigation -->
                        
                        <button  class="navbar-toggle" data-target="#buildpress-navbar-collapse" data-toggle="collapse"><span style="color:#fff;">MENU</span></button>
                                   
			
		</div>
		<div class="sticky-offset js-sticky-offset"></div>
		
		<div class="container">
                    <div class="navigation">
                        <div class="collapse  navbar-collapse" id="buildpress-navbar-collapse">
                            <ul id="menu-main-menu" class="navigation--main">
							 
                                <li><a href="<?= site_url() ?>">TRANSPARÊNCIA</a></li>
                                 <li class="menu-item-has-children">
                                    <a href="#">DESPESA</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?= site_url('transparencia/diarias') ?>">DIÁRIAS</a></li>
                                        <li><a href="<?= site_url('transparencia/despesas') ?>">PAGAMENTOS</a></li>
                                       

                                    </ul>
                                </li>
                                 <li class="menu-item-has-children">
                                    <a href="#">RECEITA</a>
                                    <ul class="sub-menu">
                                          <li><a href="<?= site_url('transparencia/receitas') ?>">ARRECADAÇÃO</a></li>
                                     
                                       
                                       

                                    </ul>
                                </li>
                                	  <li class="menu-item-has-children">
                                    <a href="#">GESTÃO FISCAL</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?= site_url('portal/get/leis') ?>">LEIS</a></li>
                                        <li><a href="<?= site_url('portal/get/PPA') ?>">PPA</a></li>
                                        <li><a href="<?= site_url('portal/get/loa') ?>">LOA</a></li>
                                        <li><a href="<?= site_url('portal/get/ldo') ?>">LDO</a></li>
                                        <li><a href="<?= site_url('portal/get/rgf') ?>">RGF</a></li>
                                        <li><a href="<?= site_url('portal/get/rreo') ?>">RREO</a></li>
                                        <li><a href="<?= site_url('portal/get/contratos') ?>">CONTRATOS</a></li>
                                        <li><a href="<?= site_url('portal/get/licitacao') ?>">LICITAÇÃO</a></li>
                                       

                                    </ul>
                                </li>
								
								<li><a href="<?= site_url('transparencia/licitacao') ?>">LICITAÇÕES</a></li>
								<li><a href="<?= site_url('transparencia/diario') ?>">DIÁRIO OFICIAL</a></li>
								<li><a href="<?= site_url('transparencia/sic') ?>">SIC | E-Sic</a></li>
                            </ul>	
                        </div>
                    </div>
                </div>
	</header>