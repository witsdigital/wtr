

<div style="background-color:  #FFFFFF;"  >
    <br><br><br><div class="master-container" >
        <div class="container">
            <div class="row" style="margin: 20px;">
			
               <div  class="row" >
			  
			   <form action="<?= site_url(); ?>transparencia/consultar_sic"  onsubmit="return validarSenha(this)" enctype="multipart/form-data" method="post">				<div class="col-md-8">								<div class="col-md-12">						<div class="form-group col-md-6">                               	<label for="cpf">CPF</label>								<input onkeypress="formatar(this,'000.000.000-00')" required="required" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$" type="text"  maxlength="14" class="form-control" id="cpf" name="cpf" placeholder="">                            </div>							<div class="form-group col-md-6">                                <label for="chave">Chave de segurança</label>                                <input type="text" name="chave"  class="form-control" required placeholder="">                            </div>					</div>					
			   </div>

								<div class="col-md-4">						<br>						<button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">Consultar</button><br><br>										</div>				</form>
				<div class="col-md-12">					<h5><?php echo $mensagem; ?></h5>										</div>				<?php foreach ($dados as $row){ ?>				<div class="col-md-12">					<div class="col-md-6">						Nome: <?php echo $row->nome; ?>					</div>						<div class="col-md-6">						Código da solicitação: <?php echo $row->id_sic; ?>					</div>										<div class="col-md-6">						CPF: <?php echo $row->cpf; ?>					</div>					<div class="col-md-6">						Tipo de resposta: <?php echo $row->tp_resposta; ?>					</div>					<div class="col-md-6">						Sexo: <?php echo $row->sexo; ?>					</div>										<div class="col-md-6">						Data de nascimento: <?php echo $row->data_nascimento; ?>					</div>						<div class="col-md-6">						Data da solicitação: <?php echo date('d/m/Y',strtotime($row->data_solicitacao)); ?>					</div>						<div class="col-md-6">						Assunto: <?php echo $row->assunto; ?>					</div>					<div class="col-md-12">						Descrição da solicitação: <?php echo $row->descricao; ?>					</div>					<div class="col-md-6">						Status da solicitação: 						<?php if ($row->status==1) {								echo 'Não respondido';							} if ($row->status==2) {								echo 'Respondido';							}						?>					</div>															</div>				<?php } ?>
			
			   
            </div>
			<br><br>
        </div>
    </div><!-- /container -->
</div><script>	$(document).ready(function(){    		$('#estado').on('change',function(){        var id = $(this).val();        if(id){            $.ajax({                type:'POST',                url:'<?php echo site_url('home/getmunicipios'); ?>',                data:'id='+id,                success:function(data){                    $('#municipio').html('<option value="">Selecione o estado</option>');                     var dataObj = jQuery.parseJSON(data);					var option = '';                    if(dataObj){                        $(dataObj).each(function(){                            var option = $('<option />');                            option.attr('value', this.id).text(this.nome);                                       $('#municipio').append(option);                        });                    }else{                        $('#municipio').html('<option value="">Nenhum municipio</option>');                    }                }            });         }else{            $('#subcategoria').html('<option value="">Selecione a empresa</option>');               }    });		});	function formatar(src, mask)	{	  var i = src.value.length;	  var saida = mask.substring(0,1);	  var texto = mask.substring(i)	if (texto.substring(0,1) != saida)	  {					src.value += texto.substring(0,1);	  }	}	function fone(){		if (document.frm.telefone.value.length == 0){			document.frm.telefone.value = "(" + document.frm.telefone.value; }		if (document.frm.telefone.value.length == 3){			document.frm.telefone.value = document.frm.telefone.value + ") "; }		if (document.frm.telefone.value.length == 9){			document.frm.telefone.value = document.frm.telefone.value + "-";}	}		function fone2(){		if (document.frm.telefone2.value.length == 0){			document.frm.telefone2.value = "(" + document.frm.telefone2.value; }		if (document.frm.telefone2.value.length == 3){			document.frm.telefone2.value = document.frm.telefone2.value + ") "; }		if (document.frm.telefone2.value.length == 9){			document.frm.telefone2.value = document.frm.telefone2.value + "-";}	}		function fone3(){		if (document.frm.telefone3.value.length == 0){			document.frm.telefone3.value = "(" + document.frm.telefone3.value; }		if (document.frm.telefone3.value.length == 3){			document.frm.telefone3.value = document.frm.telefone3.value + ") "; }		if (document.frm.telefone3.value.length == 10){			document.frm.telefone3.value = document.frm.telefone3.value + "-";}	} 	function formatardata(){		if (document.frm.dta.value.length == 2){			document.frm.dta.value = document.frm.dta.value + "/"; }		if (document.frm.dta.value.length == 5){			document.frm.dta.value = document.frm.dta.value + "/"; }	}	function validarcep(){		if (document.frm.cep.value.length == 5){			document.frm.cep.value = document.frm.cep.value + "-"; }			}</script>






