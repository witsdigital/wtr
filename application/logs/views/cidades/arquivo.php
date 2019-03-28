   <?php $entidade = $this->uri->segment(2);?>

<?php $entidade = $this->uri->segment(2);?>
<html lang="en-US">
<head>
	<meta charset="UTF-8"/>
	<title>Câmara de <?php echo $entidade ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
</head>
<body class="home page">

<div class="boxed-container">
	
	<header class="header">
		<div class="container">
			<div class="logo">
				<a href="<?=  base_url()?>camaras/<?php echo $entidade?>">
					<img src="<?=  base_url()?>assets/images/logo.png" alt="BuildPress" class="img-responsive"/>
				</a>
			</div>
			<div class="header-widgets  header-widgets-desktop">
				<div class="widget  widget-icon-box">	
					<div class="icon-box">
						<i class="fa  fa-phone  fa-3x"></i>
						<div class="icon-box__text">
							<h1 class="icon-box__title">CÂMARA MUNICIPAL DE <?php echo strtoupper ( $entidade) ?></h1>
							
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
		
<?php 

 $mes = substr($publicadas[0]->data, 5, -3);


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


?>



               

         <br> <div style="background-color: #ffffff" align="center"><iframe name="interno" width="800" height="700" src="<?= base_url() ?>uploads/publicadas/<?php echo $publicadas[0]->entidade ?>/<?php echo $dirdata ?>/<?php echo $publicadas[0]->arquivo ?>"></iframe></div>
</div>