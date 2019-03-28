<div class="main-container container" id="main-container">

      <!-- Content -->
      <div class="row">
            
        <!-- post content -->
        <div class="col-lg-8 blog__content mb-30">


          <!-- standard post -->
          <article class="entry">
            
            <div class="single-post__entry-header entry__header">
              <h1 class="single-post__entry-title">
                <?php echo $secretaria[0]->titulo; ?>
              </h1>

              <ul class="entry__meta"><br>
                <h4>
                  Secretário: 
                  <?php echo $secretaria[0]->secretario; ?>
                </h4>
              
              </ul>
            </div>


            <div class="entry__article" style="text-align: justify;">
              <?php echo $secretaria[0]->descricao; ?>

            </div> <!-- end entry article -->

              

          </article> <!-- end standard post -->
		  


        </div> <!-- end col -->