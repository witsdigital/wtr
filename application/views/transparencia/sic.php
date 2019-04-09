<?php
$query = $this->db->get('configuracoes')->result();
?>


<div style="background-color:  #FFFFFF;"  >
    <br><br><br><div class="master-container" >

    <div class="container">
            <div class="row" style="margin: 20px;">
			
<div  class="row" >
<?php echo $mensagem; ?>
<div class="col-md-8">	
<div class="col-md-12">	
<h4>O que é o Sic?</h4> <br>	


<p>1.	Para fazer um requerimento presencial, dirija-se à Sede da <?= $query[0]->entidade ?>, situada em  <?= $query[0]->endereco ?>, no horário de 8:00 às 13:00 h, e preencha o formulário que será fornecido pelo servidor(a) responsável no setor de Protocolo;
</p>

<p>2.	Para sua comodidade, este formulário se encontra também disponível no link: Formulário 
</p>
<p>3.	Entregue o formulário preenchido ao servidor responsável para ele possa inserir as informações no sistema e gerar o seu n° de protocolo
</p>
<p>
4.	Para acompanhar o andamento de seu pedido entre em contato pelo telefone <?= $query[0]->telefone ?>, ou dirija-se a sede da Prefeitura e informe seu nº de protocolo.
</p>	
				</div>					
</div>

<div class="col-md-4">		
<br><br>			
<a target="_blank" href="<?= base_url().'uploads/sic/for_sic.pdf'?>">
<button  class="btn btn-primary btn-lg" style="width: 100%;">Baixar Formulário</button></a><br><br>						
		</div>



            </div>
			<br><br>
        </div>
    </div><!-- /container -->
        <div class="container">
            <div class="row" style="margin: 20px;">
			
               <div  class="row" >
		
			   				<div class="col-md-8">								<div class="col-md-12">						<h4>O que é o e-sic?</h4> <br>						<p>O e-SIC (Sistema Eletrônico do Serviço de Informações ao Cidadão) permite que qualquer pessoa, física ou jurídica, encaminhe pedidos de acesso a informação para órgãos e entidades do Poder Executivo do Estado.</p>						<p>Por meio do sistema, além de fazer o pedido, é possível acompanhar o prazo pelo número de protocolo gerado e receber a resposta da solicitação por e-mail; entrar com recursos, apresentar reclamações e consultar as respostas recebidas. </p>					</div>					
			   </div>

								<div class="col-md-4">						<br><br>						<button onclick="window.location.href = '<?= site_url('transparencia/solicitar_sic') ?>'" class="btn btn-primary btn-lg" style="width: 100%;">Solicitar</button><br><br>						<button onclick="window.location.href = '<?= site_url('transparencia/consultar_sic') ?>'" class="btn btn-primary btn-lg" style="width: 100%;">Consultar</button>				</div>
					 
			
			   
            </div>
			<br><br>
        </div>
    </div><!-- /container -->
</div>






