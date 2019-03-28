

<div style="background-color:  #FFFFFF;"  >
    <br><br><br><div class="master-container" >
        <div class="container">
            <div class="row" style="margin: 20px;">
			<form id="frm" name="frm" action="<?= site_url(); ?>transparencia/salvarsic"  enctype="multipart/form-data" method="post">
               <div  class="row" >
			   <?php echo $mensagem; ?>
			   <h3>Informações do Solicitante</h3>
					  <div class="col-md-6">
						<label for="cpf">CPF</label>
						<input onkeypress="formatar(this,'000.000.000-00')" required="required" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$" type="text"  maxlength="14" class="form-control" id="cpf" name="cpf" placeholder="">
					  </div>
					  <div class="col-md-6">
						<label for="data">Data de nascimento:</label>
						<input  type="text"  required="required" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" size="20" onkeypress="formatardata()"  maxlength="10" class="form-control" id="dta" name="data" placeholder="">
					  </div>
					  <div class="col-md-6">
						<label for="data">Sexo:</label>
						<select class="form-control" name="sexo">
							  <option value='' >Selecione uma opção</option>
							  <option value='Masculino'>Masculino</option>
							  <option value='Feminino'>Feminino</option>
							</select>
				
					  </div>
					  <div class="col-md-12">
						<label for="data">Nome:</label>
						<input type="text" class="form-control" id="nome" name="nome" placeholder="">
					  </div>
					  <div class="col-md-12">
						<label for="data">Email:</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="">
					  </div>
					  <div class="col-md-4">
						<label for="data">Telefone residencial:</label>
						<input type="tel" class="form-control" id="telefone" name="telefone1" onkeypress="fone()" required="required" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" maxlength="14" placeholder="">
					  </div>
					  <div class="col-md-4">
						<label for="data">Telefone comercial:</label>
						<input type="tel" class="form-control" id="telefone2" name="telefone2" onkeypress="fone2()" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$"  maxlength="14" placeholder="">
					  </div>
					  <div class="col-md-4">
						<label for="data">Celular:</label>
						<input type="tel" class="form-control"  id="telefone3" name="telefone3" onkeypress="fone3()" required="required" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" maxlength="15" placeholder="">
					  </div>
					  
			   </div>
			
			   <div class="row">
			    <h3>Endereço</h3>
					<div class="col-md-6">
						<label for="pais">Pais:</label>
							<select class="form-control" name="pais" id="exampleFormControlSelect1">
							  <option value="1">Brasil</option>
						

							</select>
				
					 </div>
					<div class="col-md-6">
						<label for="cep">Cep:</label>
						<input type="text" class="form-control" required="required" maxlength="9" onkeypress="validarcep()" pattern="[0-9]{5}-[0-9]{3}$" id="cep" name="cep" placeholder="">
					 </div>
					<div class="col-md-8">
						<label for="lagradouro">Logradouro:</label>
						<input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="">
					 </div>
					 <div class="col-md-4">
						<label for="numero">Numero:</label>
						<input type="text" class="form-control" id="numero" name="numero" placeholder="">
					 </div>
					 <div class="col-md-4">
						<label for="bairro">Bairro:</label>
						<input type="text" class="form-control" id="bairro" name="bairro" placeholder="">
					 </div>
					 <div class="col-md-4">
						<label for="estado">Estado:</label>
						<select class="form-control" name="estado" id="estado">
							<option >Selecione uma opção</option>
							<?php foreach ($estados as $row){ ?>
								  <option value="<?php echo $row->id;?>"><?php echo $row->uf;?></option>
							<?php } ?>
							</select>
					 </div>
					 <div class="col-md-4">
						<label for="municipio">Municipio:</label>
						<select class="form-control" name="municipio" id="municipio">
						 <option value="">Selecione o estado</option>
                        </select>
					 </div>
					 <div class="col-md-6">
						<label for="complemento">Complemento:</label>
						<input type="text" class="form-control" id="complemento" name="complemento" placeholder="">
					 </div>
					 <div class="col-md-6">
						<label for="ref">Ponto de Referência:</label>
						<input type="text" class="form-control" id="ref" name="ref" placeholder="">
					 </div>
			   </div>
			   <div class="row">
					 <h3>Informações da solicitação</h3>
					 <div class="col-md-6">
						<label for="data">Departamento/Setor:</label>
							<select class="form-control" name="departamento" id="exampleFormControlSelect1">
							  <option value='' >Selecione uma opção</option>
								<?php foreach ($secretarias as $row){ ?>
									  <option value="<?php echo $row->id_secretaria;?>"><?php echo $row->titulo;?></option>
								<?php } ?>

							</select>
				
					 </div>
					 <div class="col-md-6">
						<label for="data">Forma de resposta:</label>
							<select name="forma" class="form-control" id="exampleFormControlSelect1">
							  <option value="digital">Digital</option>
							  <option value="fisica">Fisica</option>
							</select>
				
					 </div>
					 <div class="col-md-6">
						<label for="data">Assunto:</label>
						<input type="text" name="assunto" class="form-control" id="data" name="data" placeholder="">
					 </div>
					  <div class="col-md-6">
						  <label class="custom-file-label" for="customFile">Selecione os arquivos:</label>
						  <input type="file" class="custom-file-input" id="customFile" multiple="" name="ar[]">
						
					 </div>
					  <div class="col-md-12">
						<label for="exampleFormControlTextarea1">Descrição da solicitação</label>
						<textarea name="solicitacao" class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
					  </div>
			   </div>
				<div class="row" style="float: right; margin: 20px;">
					<button type="submit" class="btn btn-primary btn-lg">Enviar</button>
				</div>
				</form>
			   
            </div>
			<br><br>
        </div>
    </div><!-- /container -->
</div>



<script>

	$(document).ready(function(){
    
	
	$('#estado').on('change',function(){
        var id = $(this).val();
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo site_url('home/getmunicipios'); ?>',
                data:'id='+id,
                success:function(data){
                    $('#municipio').html('<option value="">Selecione o estado</option>'); 
                    var dataObj = jQuery.parseJSON(data);
					var option = '';
                    if(dataObj){
                        $(dataObj).each(function(){
                            var option = $('<option />');
                            option.attr('value', this.id).text(this.nome);           
                            $('#municipio').append(option);
                        });
                    }else{
                        $('#municipio').html('<option value="">Nenhum municipio</option>');
                    }
                }
            }); 
        }else{
            $('#subcategoria').html('<option value="">Selecione a empresa</option>');
       
        }
    });
	
	});

	function formatar(src, mask)
	{
	  var i = src.value.length;
	  var saida = mask.substring(0,1);
	  var texto = mask.substring(i)
	if (texto.substring(0,1) != saida)
	  {
					src.value += texto.substring(0,1);
	  }
	}


	function fone(){
		if (document.frm.telefone.value.length == 0){
			document.frm.telefone.value = "(" + document.frm.telefone.value; }
		if (document.frm.telefone.value.length == 3){
			document.frm.telefone.value = document.frm.telefone.value + ") "; }
		if (document.frm.telefone.value.length == 9){
			document.frm.telefone.value = document.frm.telefone.value + "-";}
	}
	
	function fone2(){
		if (document.frm.telefone2.value.length == 0){
			document.frm.telefone2.value = "(" + document.frm.telefone2.value; }
		if (document.frm.telefone2.value.length == 3){
			document.frm.telefone2.value = document.frm.telefone2.value + ") "; }
		if (document.frm.telefone2.value.length == 9){
			document.frm.telefone2.value = document.frm.telefone2.value + "-";}
	}
	
	function fone3(){
		if (document.frm.telefone3.value.length == 0){
			document.frm.telefone3.value = "(" + document.frm.telefone3.value; }
		if (document.frm.telefone3.value.length == 3){
			document.frm.telefone3.value = document.frm.telefone3.value + ") "; }
		if (document.frm.telefone3.value.length == 10){
			document.frm.telefone3.value = document.frm.telefone3.value + "-";}
	} 
	function formatardata(){
		if (document.frm.dta.value.length == 2){
			document.frm.dta.value = document.frm.dta.value + "/"; }
		if (document.frm.dta.value.length == 5){
			document.frm.dta.value = document.frm.dta.value + "/"; }
	}
	function validarcep(){
		if (document.frm.cep.value.length == 5){
			document.frm.cep.value = document.frm.cep.value + "-"; }
		
	}
</script>






