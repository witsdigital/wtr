

<?php
$query = $this->db->get('configuracoes')->result();
?>

<div style="background-color:  #FFFFFF;">
  <br>  <br><div class="master-container">
         <iframe style=" width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;" src="<?= $query[0]->url_detalhemento_receita_temp_real?>" ></iframe>
        </div>
    </div><!-- /container -->
</div>