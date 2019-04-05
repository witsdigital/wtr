   
   <?php
$query = $this->db->get('configuracoes')->result();
?>

   <?php $entidade = $this->uri->segment(2);
   
       ?>

   
   <?php
$query = $this->db->get('configuracoes')->result();
?>

<?php $entidade = $this->uri->segment(2);?>
<html lang="en-US">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
	
	<title><?= $query[0]->entidade ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        
         <title><?= $query[0]->entidade ?> </title>
            <meta property="og:image" content="<?= $query[0]->logo ?>">
            <meta property="og:title" content=" <?php echo $publicadas[0]->titulo ?>">
            <meta property="og:description" content="<?= $query[0]->entidade ?>">
            <meta property="og:type" content="website">
            <meta property="og:url" content="<?php echo $publicadas[0]->file ?>">
	
</head>
<body class="home page">

<div class="boxed-container">
	
	<header class="header">
		<div class="container">
			<div class="logo">
				<a href="<?=  base_url()?>">
					<img src="<?= $query[0]->logo ?>" alt="BuildPress" class="img-responsive"/>
				</a>
			</div>
                   
		
			<!-- Toggle Button for Mobile Navigation -->
		
		</div>
		
		
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



    <div style="background-color: #ffffff" align="center"><iframe name="interno" width="800" height="700" src="<?php echo $publicadas[0]->file ?>"></iframe></div>
</div>