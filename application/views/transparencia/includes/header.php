
<?php
$query = $this->db->get('configuracoes')->result();
?>
<html lang="en-US">
    <style>
        .contrast,
        .contrast nav,
        .contrast div,
        .contrast li,
        .contrast ol,
        .contrast header,
        .contrast footer,
        .contrast section,
        .contrast main,
        .contrast aside,
        .contrast article {
            background: black !important;
            color: white !important;
        }
        .contrast h1,
        .contrast h2,
        .contrast h3,
        .contrast h4,
        .contrast h5,
        .contrast h6,
        .contrast p,
        .contrast label,
        .contrast strong,
        .contrast em,
        .contrast cite,
        .contrast q,
        .contrast i,
        .contrast b,
        .contrast u,
        .contrast span {
            color: white !important;
        }
        .contrast a{
            color: yellow !important;
        }

        .contrast button,
        .contrast input[type=button],
        .contrast input[type=reset],
        .contrast input[type=submit] {
            background: black !important;
            color: yellow !important;
            border: none !important;
        }
        .contrast img.on-contrast-force-gray {
            filter: grayscale(100%) contrast(120%);
        }

        .contrast img.on-contrast-force-white {
            filter: brightness(0) invert(1);
        }
        .contrast input[type=text],
        .contrast input[type=password],
        .contrast input[type=url],
        .contrast input[type=search],
        .contrast input[type=email],
        .contrast input[type=tel],
        .contrast input[type=date],
        .contrast input[type=month],
        .contrast input[type=week],
        .contrast input[type=datetime],
        .contrast input[type=datetime-local],
        .contrast textarea,
        .contrast input[type=number] {
            background: black !important;
            border: 1px solid white !important;
            color: white !important;
        }
    </style>
    <head>
        <script>
            (function () {
                var Contrast = {
                    storage: 'contrastState',
                    cssClass: 'contrast',
                    currentState: null,
                    check: checkContrast,
                    getState: getContrastState,
                    setState: setContrastState,
                    toogle: toogleContrast,
                    updateView: updateViewContrast
                };

                window.toggleContrast = function () {
                    Contrast.toogle();
                };

                Contrast.check();

                function checkContrast() {
                    this.updateView();
                }

                function getContrastState() {
                    return localStorage.getItem(this.storage) === 'true';
                }

                function setContrastState(state) {
                    localStorage.setItem(this.storage, '' + state);
                    this.currentState = state;
                    this.updateView();
                }

                function updateViewContrast() {
                    var body = document.body;

                    if (this.currentState === null)
                        this.currentState = this.getState();

                    if (this.currentState)
                        body.classList.add(this.cssClass);
                    else
                        body.classList.remove(this.cssClass);
                }

                function toogleContrast() {
                    this.setState(!this.currentState);
                }
            })();</script>
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
                        <br>
                        <a href="<?= site_url() ?>">
                            <img src="<?= $query[0]->logo ?> " alt="Transparência" class="img-responsive"/>
                        </a>
                        <br>

                    </div>
                    <div class="header-widgets  header-widgets-desktop">

                        <div class="widget  widget-social-icons">	
                            <a class="social-icons__link" href="#" target="_blank"><i class="fa  fa-facebook"></i></a>
                            <a class="social-icons__link" href="#" target="_blank"><i class="fa  fa-twitter"></i></a>
                            <a class="social-icons__link" href="#" target="_blank"><i class="fa  fa-youtube"></i></a>
                        </div>	
                    </div>
                    <!-- Toggle Button for Mobile Navigation -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#buildpress-navbar-collapse">
                        <span class="navbar-toggle__text">MENU</span>
                        <span class="navbar-toggle__icon-bar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </span>
                    </button>
                </div>
                <div class="sticky-offset js-sticky-offset"></div>
                <div class="container">
                    <div class="navigation">
                        <div class="collapse  navbar-collapse" id="buildpress-navbar-collapse">
                            <ul id="menu-main-menu" class="navigation--main">
							 <li class="current-menu-item"><a href="<?= site_url() ?>">INÍCIO</a></li>
							 
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
                                	<li><a href="#">PESSOAL</a></li>
								
								<li><a href="<?= site_url('transparencia/diario') ?>">DIÁRIO OFICIAL</a></li>
								<li><a href="<?= site_url('transparencia/sic') ?>">SIC | E-Sic</a></li>
                            </ul>	
                        </div>
                    </div>
                </div>