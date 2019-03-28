    <div class="main-container container" id="main-container">

      <!-- Content -->
      <div class="row">
            
        <!-- post content -->
        <div class="col-lg-12 blog__content mb-30">          
          <div class="row justify-content-md-center">
            <div class="col-lg-8">
				
              <h3>Contato</h3>
              <p>Sugestões, melhorias, dúvidas e reclamações.</p>
			  
			  <p>
				<?php echo $resposta; ?>
			  </p>

              <!-- Contact Form --> 
              <form  action="<?= base_url(); ?>portal/salvarcontato" enctype="multipart/form-data" method="post">
                <div class="contact-name">
                  <label for="name">Nome <abbr title="required" class="required">*</abbr></label>
                  <input name="nome" type="text" required="">
                </div>
                <div class="contact-email">
                  <label for="email">Email <abbr title="required" class="required">*</abbr></label>
                  <input name="email" type="email" required="">
                </div>
                <div class="contact-subject">
                  <label for="email">Telefone</label>
                  <input name="telefone" type="text">
                </div>
				<div class="contact-subject">
                  <label for="name">Assunto <abbr title="required" class="required">*</abbr></label>
                  <input name="assunto"  type="text" required="">
                </div>
                <div class="contact-message">
                  <label for="message">Mensagem <abbr title="required" class="required">*</abbr></label>
                  <textarea name="mensagem" rows="7" required=""></textarea>
                </div>

                <input type="submit" class="btn btn-lg btn-color btn-button" value="Enviar mensagem" >
                
              </form>

            </div>
          </div>
        </div> <!-- end col -->
	</div>
</div>