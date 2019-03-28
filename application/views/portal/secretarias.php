<div class="main-container container" id="main-container">

      <!-- Content -->
      <div class="row">
            
        <!-- post content -->
        <div class="col-lg-8 blog__content mb-30">

          <h2 class="mb-20">Secretarias</h1>
         
		<?php if($secretarias){
			foreach ($secretarias as $row){ 
		?>
          <article class="entry post-list">
 

            <div class="entry__body post-list__body"> 
              <div class="entry__header">
             
                <h1 class="entry__title">
                  <a href="<?= base_url('portal/view_secretaria') ?>/<?php echo $row->id_secretaria;?>"><?php echo $row->titulo;?></a>
                </h1>
                <ul class="entry__meta">
                  <li class="entry__meta-author">
                    <i class="ui-author"></i>
                    <a href="#"><?php echo $row->secretario;?></a>
                  </li>
               
                  
                </ul>
              </div>
              <div class="entry__excerpt">
                <p><?php echo substr($row->descricao, 0, 250).'...'; ?></p>
              </div>
            </div>
          </article>
		<?php }
				} else {
					echo "<h5>Nenhuma secretaria encontrada</h5>";
				}
		?>
     

          <!-- Pagination -->
		
          

        </div> <!-- end col -->