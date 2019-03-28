
<?php
$query = $this->db->get('configuracoes')->result();
?>

<footer>
    <div id="footer" class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <div class="widget  widget_text  push-down-30">
                        <h6 class="footer__headings"><?= $query[0]->entidade ?></h6>	
                        <div class="textwidget">
                            <img src="<?= $query[0]->logo ?>" alt="Footer Logo" width="218" height="45" />
                            <br><br>
                            <p style="text-align: justify;"> <?= $query[0]->infopm ?></p>
                            <br><br>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12  col-md-3">
                    <div class="widget  widget_nav_menu  push-down-30">
                        <h6 class="footer__headings">LINKS ÚTEIS</h6>
                        <div class="menu-top-menu-container">
                            <ul id="menu-top-menu-1" class="menu">
                                <li><a target="_blank" href="http://www.tcm.ba.gov.br">TCM</a></li>
                                <li><a target="_blank" href="<?= base_url('portal/publicacoes') ?>">Transparência</a></li>
                                <li><a target="_blank" href="https://camarapocoes.ba.gov.br"> Câmara de Poções</a></li>


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12  col-md-5">
                    <div class="widget  widget_text  push-down-30">
                        <h6 class="footer__headings">ADMINISTRAÇÃO</h6>	
                        <div class="textwidget">
                            <h4> Prefeito Municipal:<br> <?= $query[0]->prefeito ?></h4>
                              <h4> Vice-Prefeito Municipal:<br> <?= $query[0]->viceprefeito ?></h4>
                          
                     <br>
                          
                            <br><br>
                          
                        </div>
                    </div>
                </div>	
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom__left">
                Desenvolvido por <a href="http://witsdigital.com.br" target="_blank">WitsDigital</a>	
            </div>
            <div class="footer-bottom__right">
                &copy; 20<?php echo date('y'); ?><strong> <?= $query[0]->entidade ?></strong> 
            </div>
        </div>
    </div>

</footer>




</body>
</html>