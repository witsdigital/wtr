<?php 
	$noticia_menu = $this->db->query('select * from categorias')->result(); 
	$secretaria_menu = $this->db->query('select * from secretarias')->result(); 
	$logo = $this->db->query('select * from slides where id = 9')->result(); 
	$banner_1 = $this->db->query('select * from slides where id = 6')->result(); 
	$mobile = $this->db->query('select * from slides where id = 11')->result(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Prefeitura Municipal de Guajeru Bahia</title>
<meta http-equiv=�Content-Type� content=�text/html; charset=iso-8859-1?>


  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet'>

  <!-- Css -->
  <link rel="stylesheet" href="<?=  base_url()?>assets_portal/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?=  base_url()?>assets_portal/css/font-icons.css" />
  <link rel="stylesheet" href="<?=  base_url()?>assets_portal/css/style.css" />
  <link rel="stylesheet" href="<?=  base_url()?>assets_portal/fancybox/jquery.fancybox.min.css" />

  <!-- Favicons -->
  <link rel="shortcut icon" href="<?=  base_url()?>assets_portal/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?=  base_url()?>assets_portal/img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?=  base_url()?>assets_portal/img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?=  base_url()?>assets_portal/img/apple-touch-icon-114x114.png">

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/full-slider.css" rel="stylesheet">
</head>

<body class="bg-light">



<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


  <!-- Bg Overlay -->
  <div class="content-overlay"></div>

  <!-- Sidenav -->    
  <header class="sidenav" id="sidenav">

    <!-- close -->
    <div class="sidenav__close">
      <button class="sidenav__close-button" id="sidenav__close-button" aria-label="close sidenav">
        <i class="ui-close sidenav__close-icon"></i>
      </button>
    </div>
    
    <!-- Nav -->
    <nav class="sidenav__menu-container">
      <ul class="sidenav__menu" role="menubar">
        <!-- Categories -->
        <li>
          <a href="<?= base_url('portal/') ?>" class="sidenav__menu-link sidenav__menu-link-category sidenav__menu-link--orange">Home</a>
        </li>
         <li>
          <a href="#" class="sidenav__menu-link">Noticias</a>
          <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i class="ui-arrow-down"></i></button>
          <ul class="sidenav__menu-dropdown">
		 	<?php foreach($noticia_menu as $linha) { ?>
              <li><a class="sidenav__menu-link" href="<?=  base_url('portal/noticias_categoria/')?>/<?php echo $linha->id_categoria; ?>"><?php echo $linha->nomecategoria; ?></a></li>
            <?php } ?>
          </ul>
        </li>
        <li>
          <a href="#" class="sidenav__menu-link">Secretarias</a>
          <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i class="ui-arrow-down"></i></button>
          <ul class="sidenav__menu-dropdown">
		  <?php foreach($secretaria_menu as $row) { ?>
            <li><a href="<?= base_url('portal/view_secretaria') ?>/<?php echo $row->id_secretaria; ?>" class="sidenav__menu-link"><?php echo $row->titulo; ?></a></li>
		  <?php } ?>
          </ul>
        </li>
		 <li>
          <a href="<?= base_url('portal/galerias') ?>" class="sidenav__menu-link sidenav__menu-link-category sidenav__menu-link--salad">Galerias</a>
        </li>
        <li>
          <a href="<?= base_url('portal/transparencia') ?>" class="sidenav__menu-link sidenav__menu-link-category sidenav__menu-link--salad">Transparência</a>
        </li>
        
	

        <!-- <li>
          <a href="#" class="sidenav__menu-link">Pages</a>
          <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown"><i class="ui-arrow-down"></i></button>
          <ul class="sidenav__menu-dropdown">
            <li><a href="about.html" class="sidenav__menu-link">About</a></li>
            <li><a href="contact.html" class="sidenav__menu-link">Contact</a></li>
            <li><a href="search-results.html" class="sidenav__menu-link">Search Results</a></li>
            <li><a href="categories.html" class="sidenav__menu-link">Categories</a></li>
            <li><a href="shortcodes.html" class="sidenav__menu-link">Shortcodes</a></li>
            <li><a href="lazyload.html" class="sidenav__menu-link">Lazyload</a></li>
            <li><a href="404.html" class="sidenav__menu-link">404</a></li>
          </ul>
        </li> -->

        <li>
          <a href="<?= base_url('portal/contato') ?>" class="sidenav__menu-link">Contato</a>
        </li>

      </ul>
    </nav>

    <div class="socials sidenav__socials"> 
      <a class="social social-facebook" href="#" target="_blank" aria-label="facebook">
        <i class="ui-facebook"></i>
      </a>
      <a class="social social-twitter" href="#" target="_blank" aria-label="twitter">
        <i class="ui-twitter"></i>
      </a>
      <a class="social social-google-plus" href="#" target="_blank" aria-label="google">
        <i class="ui-google"></i>
      </a>
      <a class="social social-youtube" href="#" target="_blank" aria-label="youtube">
        <i class="ui-youtube"></i>
      </a>
      <a class="social social-instagram" href="#" target="_blank" aria-label="instagram">
        <i class="ui-instagram"></i>
      </a>
    </div>
  </header> <!-- end sidenav -->

  <main class="main oh" id="main">

    <!-- Navigation -->
    <header class="nav">

      <div class="nav__holder nav--sticky">
        <div class="container relative">
          <div class="flex-parent">

            <!-- Side Menu Button -->
            <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
              <span class="nav-icon-toggle__box">
                <span class="nav-icon-toggle__inner"></span>
              </span>
            </button> <!-- end Side menu button -->

            <!-- Mobile logo -->
            <a href="<?=  base_url()?>" class="logo logo--mobile d-lg-none">
              <img style=" width: 90%;"  class="logo__img" src="<?= base_url()?>assets_portal/img/logo_mob.png" alt="logo">
            </a>

            <!-- Nav-wrap -->
            <nav class="flex-child nav__wrap d-none d-lg-block">              
              <ul class="nav__menu">

                <li class="active"> 
                  <a href="<?=  base_url()?>">Home</a>
                </li>

                <li class="nav__dropdown">
                  <a href="<?=  base_url('portal/noticias')?>">Noticias</a>
                  <ul class="nav__dropdown-menu">
				  <?php foreach($noticia_menu as $linha) { ?>
                    <li><a href="<?=  base_url('portal/noticias_categoria/')?>/<?php echo $linha->id_categoria; ?>"><?php echo $linha->nomecategoria; ?></a></li>
                  <?php } ?>
                  </ul>
                </li>

                <li class="nav__dropdown">
                  <a href="<?= base_url('portal/secretarias') ?>">Secretarias</a>
                  <ul class="nav__dropdown-menu">
                   <?php foreach($secretaria_menu as $row) { ?>
					<li><a href="<?= base_url('portal/view_secretaria') ?>/<?php echo $row->id_secretaria; ?>" class="sidenav__menu-link"><?php echo $row->titulo; ?></a></li>
				  <?php } ?>
                  </ul>
                </li>

                <li class="nav__dropdown">
                  <a href="<?= base_url('portal-transparencia')?>">Transparência</a>
                 
                </li>
				
				<li class="nav__dropdown">
                  <a href="<?= base_url('portal/galerias') ?>">Galerias</a>
                 
                </li>

                <li>
                  <a href="<?= base_url('portal/contato') ?>">Contato</a>
                </li>


              </ul> <!-- end menu -->
            </nav> <!-- end nav-wrap -->

            <!-- Nav Right -->
            <div class="nav__right nav--align-right d-lg-flex">

              <!-- Socials -->
              <div class="nav__right-item socials nav__socials d-none d-lg-flex"> 
                <a class="social social-facebook social--nobase" href="#" target="_blank" aria-label="facebook">
                  <i class="ui-facebook"></i>
                </a>
                <a class="social social-twitter social--nobase" href="#" target="_blank" aria-label="twitter">
                  <i class="ui-twitter"></i>
                </a>
                <a class="social social-google social--nobase" href="#" target="_blank" aria-label="google">
                  <i class="ui-google"></i>
                </a>
                <a class="social social-youtube social--nobase" href="#" target="_blank" aria-label="youtube">
                  <i class="ui-youtube"></i>
                </a>
                <a class="social social-instagram social--nobase" href="#" target="_blank" aria-label="instagram">
                  <i class="ui-instagram"></i>
                </a>
              </div>

              <!-- Search -->
              <div class="nav__right-item nav__search">
                <a href="#" class="nav__search-trigger" id="nav__search-trigger">
                  <i class="ui-search nav__search-trigger-icon"></i>
                </a>
                <div class="nav__search-box" id="nav__search-box">
                  <form class="nav__search-form" action="<?= base_url(); ?>portal/pesquisa" method="post">
                    <input type="text" name="txt_busca" placeholder="Pesquisar noticia" class="nav__search-input">
                    <button type="submit" class="search-button btn btn-lg btn-color btn-button">
                      <i class="ui-search nav__search-icon"></i>
                    </button>
                  </form>
                </div>
                
              </div>

            </div> <!-- end nav right -->  
        
          </div> <!-- end flex-parent -->
        </div> <!-- end container -->

      </div>
    </header> <!-- end navigation -->
	
	
    <!-- Header -->
    <div class="header">
      <div class="container">
        <div class="flex-parent align-items-center">
          
          <!-- Logo -->
          

          <!-- Ad Banner 728 -->
         

        </div>
      </div>
    </div> <!-- end header -->

    <!-- Trending Now -->
    
	

  