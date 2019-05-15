
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
                              <img  style="width: 100%;" src="<?= base_url()?>/uploads/icp.png" alt=""> 

                        </div>
                    </div>
                </div>
                <div class="col-xs-12  col-md-3">
                    <div class="widget  widget_nav_menu  push-down-30">
                        <h6 class="footer__headings">LINKS ÚTEIS</h6>
                        <div class="menu-top-menu-container">
                            <ul id="menu-top-menu-1" class="menu">
                                <li><a target="_blank" href="http://www.tcm.ba.gov.br">TCM</a></li>
                                <li><a target="_blank" href="<?= site_url('portal/publicacoes') ?>">Transparência</a></li>
                                <li><a target="_blank" href="http://servicos.receita.fazenda.gov.br/Servicos/certidao/CndConjuntaInter/InformaNICertidao.asp?Tipo=1">Certidão Federal</a></li>
                                 <li><a target="_blank" href="https://sistemas.sefaz.ba.gov.br/sistemas/sigat/Default.Aspx?Modulo=CREDITO&Tela=DocEmissaoCertidaoInternet&limparSessao=1&sts_link_externo=2">Certidão Estadual</a></li>
                                <li><a target="_blank" href="http://www.tst.jus.br/certidao">Certidão Trabalhista</a></li>
                                <li><a href="<?= base_url('transparencia/solicitar_sic')?>">Fale conosco</a></li>
                              
                                

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
          
           
           
        </div>
        <div class="container">
            
            <div class="row">
                <div class="col-xs-12  col-md-4">
                     <a href="https://transparencyreport.google.com/safe-browsing/search?url=<?= base_url()?>" target="_blank"><img  style="width: 100%;" src="<?= base_url()?>/uploads/selo.png" alt=""> </a>
          
                </div>
                <div class=" col-xs-12 col-md-4">
                  
                </div>
                <div class=" col-xs-12 col-md-4">
                 
                </div>
                
            </div>
            
            
            
        </div>
        <div class="container">
          
            <div class="footer-bottom__left">
                Desenvolvido por <a href="http://witsdigital.com.br" target="_blank">WitsDigital</a>	
            </div>
            <div class="footer-bottom__right">
                &copy; 20<?php echo date('y'); ?><strong> <?= $query[0]->entidade ?>
            </div>
        </div>
    </div>

</footer>




</body>
</html>