<!doctype html>

<?php
$query = $this->db->get('configuracoes')->result();
$mes[0]=null;
$mes[1]="Janeiro";
$mes[2]="Fevereiro";
$mes[3]="Março";
$mes[4]="Abril";
$mes[5]="Maio";
$mes[6]="Junho";
$mes[7]="Julho";
$mes[8]="Agosto";
$mes[9]="Setembro";
$mes[10]="Outubro";
$mes[11]="Novembro";
$mes[12]="Dezembro";


?>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/favicon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>131 - Receita</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <!-- Bootstrap core CSS     -->
        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
        

    </head>

    <body >
	
	
	<table  class="table table-striped">
  <thead>
  
   
  <tr class="header" style="padding:100px;">
      <th  colspan="4"  style=" width: 40%;"  scope="col">
      <table>
    <tr>
    <td>   <img style=" width: 40%;" src="<?= $query[0]->logo ?>" /></td>
    <td style="padding:20px; font-weight: bold; font-size:12px"><b>Portal da Transparência da <?= $query[0]->entidade ?> <Br> Período de <?= $mes[$dados['inicio']]?> de  <?= $dados['ano']?><Br>
    <?= base_url()?></b></td>
    </tr>
    </table>
   
      
      </th>
      
      

    </tr>
  </thead>
  <thead>
  
   
  <tr class="header" style="padding:100px;">
      <th colspan="4" style=" width: 40%;"  scope="col"></th>
      

    </tr>
  </thead>
 <br>
  <thead>
  
   
    <tr class="header" style="margin-top:20%;">
      <th   scope="col">DATA</th>
      <th scope="col">Natureza</th>
      <th scope="col">Tipo</th>
      <th  scope="col">Valor</th>
	 

    </tr>
  </thead>
  <tbody>
  <?php
  $count = 0;
   foreach ($itens as $row) { 
		   ?>
	 

    <tr  style="border-top:1px solid black;">
    <td  style="border-top:1px solid black; width: 10%;  font-size:12px;"><?= $row->data_registro?></td>
      <td  style="border-top:1px solid black;  width: 60%; font-size:12px;"><?= $row->natureza?></td>
    
     
      <td  style="border-top:1px solid black; width: 15%;   font-size:11px;"><?php
      
        if( $row->tipo=='NORC'){
           echo 'Extra-Orçamentário';
        }else{
            echo 'Orçamentário';
        }
      ?></td>
      <td  style="border-top:1px solid black; width: 15%;   font-size:12px;">R$ <?= $row->valor?></td>

	
	</tr>
	
	<?php } ?>  
	
  </tbody>
</table>


     </body>
</html>	 