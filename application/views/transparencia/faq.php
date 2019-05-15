<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    
    
    <div class="main-title" style="background-color: #f2f2f2; ">
    <div class="container">
        <h1 class="main-title__primary">Perguntas frequentes</h1>
        <h3 class="main-title__secondary">Tire suas dúvidas de forma mais ágil em nosso FAQ. </h3>


    </div>
</div>


</body>
</html>
<?php 

$query = $this->db->get('faq')->result();
?>

<div style="background-color:  #FFFFFF;">
  <br><div class="master-container">
        <div class="container">
            <?php 
 foreach ($query as $row){?>
            <div class="row " style="margin:10px;">
               
 <div type="button" class="btn btn-info" data-toggle="collapse" data-target="#<?= $row->id_faq?>"><?=  $row->pergunta?></div>
  <div id="<?= $row->id_faq?>" class="collapse">
   <?=  $row->resposta?>
  </div>
            </div>
 <?php }?>
            <br><Br><Br>

        </div>
    </div><!-- /container -->
</div>
