<script>



function acessar(){
	
	var cidade = document.getElementById('cidade').value;
	
	
	
		if(cidade == ""){
			alert("escolha uma cidade");
		}
		else{		
			window.open('../camaras/'+cidade , 'new');		
		
		}
	
	}
			

</script>




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
                        <?php foreach ($entidades as $row) { ?>

                    <option value="<?php echo strtolower( $row->nome )?>"><?php echo $row->nome ?></option>

                <?php } ?>
            </select>



        </div>
    </div>







    <br>
    <button type="buttom" class="btn btn-success" onclick="javascript:acessar()" >Consultar</button>
    <button class="btn btn-danger">Cancel</button>
</div>