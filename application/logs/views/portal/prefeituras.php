 <div class="gray_bg">
        <div class="container">
          <div class="row welcome_inner">
            <div class="span12">
                    <h1><span class="colored">///</span> Publicaçõees</h1>
              </div>
            
               
            </div>
        </div>
    </div>
     <div class="bg-separa" style="height:40px">
          
      <div class="container inner_content">
        <span class="txt-bgsepara">Selecione abaixo a entidade desejada.</span>
          
          
      </div>
    </div>
    <!--/WELCOME AREA-->
    <!--MAIN CONTENT AREA-->
    <div class="container inner_content" >
     
      
      <div class="row-fluid ">
        <div class="span4">
    
    	 Cidade : <br>
          <select class="span4" name"cidade" id="cidade">
          
          
    <option selected value "">Selecione...</option>
   <?php include "config/conexao.php";
		$sql = mysql_query("SELECT  DISTINCT * FROM entidade WHERE tipo = 'camara' ");
		while($array = mysql_fetch_array($sql)){


			$cidade= $array['cidade'];
		






		?>
		<option ><?php echo $cidade ?></option>

		<?php } ?>
    </select>
    
    
    
    </div>
  </div>
      
      
       
         
         
      
         
          <br>
         <button type="buttom" class="btn btn-success" onclick="javascript:acessar()" >Consultar</button>
      <button class="btn btn-danger">Cancel</button>
    </div>