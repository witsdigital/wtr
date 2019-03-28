
<div style="background-color:  #FFFFFF;">
<br><br>
<br>
<div class="master-container">

<div class="container">

<h4><?php 
	echo $enviado;

?></h4>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="feature">
                           
                            <figure>
                                <h3>Endereço</h3>
                                <p>Câmara Municipal de Condeúba - BA</p>
								<p>Rua Afonso Batista, nº 135, Centro, CEP: 37.560-900</p>
                            </figure>

                            <figure>
                                <h3>Horario de funcionamento</h3>
								<p>Segunda a Sexta das 07h às 13h</p>
                            </figure>

                            <figure>
                                <h3>Telefone</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum luctus posuere mattis.
                                    Donec id nulla nisl.
                                </p>
                            </figure>

                        </div>
                        <!--end feature-->
                    </div>
                    <!--end col-md-4-->
                    <div class="col-md-8">
                <form class="labels-uppercase clearfix" form method="POST" action="<?= base_url('portal/enviarcontato')?>">
                
                <div class="row" style="margin: 10px;">
                <h2>Fomulário de contato</h2>
                    <div >
                        <div class="form-group">
                            <label for="form-contact-name">Nome Completo<em>*</em></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome" required=""><br>
                            <label for="form-contact-name">Assunto<em>*</em></label>
                            <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto" required="">
                        </div>
                    </div>
                    <!--end col-md-6-->
                    <div>
                        <div class="form-group">
							<label for="form-contact-telefone">Telefone<em>*</em></label>
                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required=""><br>
                            <label for="form-contact-email">E-mail<em>*</em></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                        </div>
                    </div>
                    <!--end col-md-6-->
                <div class="form-group">
                    <label for="form-contact-message">Mensagem<em>*</em></label>
                    <textarea class="form-control" id="mensagem" rows="8" name="mensagem" required="" placeholder="Envie sua mensagem"></textarea>
                </div>
                <!--end form-group-->
                <div id="form-status" class="pull-left"></div>
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-primary btn-rounded">Enviar</button>
                </div>
                <!--end form-group-->
            </form>
            </div>
                <!--end row-->
            </div>
       
                </div>
                <!--end row-->
                </div>
            <!--end container-->
            <div class="space"></div>


													
	</div>
												
</div>
											