
<?php $entidade = $this->uri->segment(2); ?>
<script>
    function enviardados() {
         if (document.getElementById('data').value != "") {
            var data = document.getElementById('data').value;
            document.location.href = "<?= base_url() ?>portal/buscadata/" + data;
        }

        if (document.getElementById('edicao').value != "") {
            var edicao = document.getElementById('edicao').value;
            document.location.href = "<?= base_url() ?>portal/getbusca/edicao/" + edicao;
        }
        if (document.getElementById('titulo').value != "") {
            var titulo = document.getElementById('titulo').value;
            document.location.href = "<?= base_url() ?>portal/buscatitulo/" + titulo;
        }
        if (document.getElementById('chave').value != "") {
            var chave = document.getElementById('chave').value;
            document.location.href = "<?= base_url() ?>portal/busca/" + chave;
        }



    }
    function confirma(id) {
   
        window.open('<?= base_url('camaras/' . $entidade) ?>/documento/' + id ,'_blank');
  
    }
</script>


<div style="background-color:  #FFFFFF;">
    <br><br><br><br><div class="master-container">
        <div class="container">
            <div class="row">
                <main class="col-xs-12  col-md-9  col-md-push-3" role="main">

                    <br><div class="col-md-4"><input type="text" name="data" id="data" class=" form-control" placeholder="Data" ></div>
                    <div class="col-md-4"><input type="text" name="edicao" id="edicao"  class=" form-control" placeholder="Edição"></div>
                    <div class="col-md-4"><input type="text" name="titulo"  id="titulo"   class=" form-control"placeholder="Titulo" ></div><br>
                    <br> <br><div class="col-md-8"><input type="text" name="chave" id="chave" class=" form-control" placeholder="Palavra Chave"></div>
                    

                    <div class="col-md-1"><button onclick="enviardados();" class="btn btn-adn">Buscar</button></div>
                    <?php
                    if(count($publicadas)==0){
                        echo '<br><br><br><br><div align="center"><h3 style="color: #00a65a">Sem Resultados para esta consulta</h></div>';
                        
                    }
                    
                   
                    foreach ($publicadas as $row) {
                       
                        ?>
                        <table style=" width:100%;" height="96" border="0" cellpadding="20" >
                            <tr>
                                <td width="194"><div class="ddate">
                                        <h5> Edição:<br />
                                            <strong><?php echo $row->edicao ?></strong></h5>
                                        <div class="firstA"></div>
                                    </div></td>
                                <td width="185"><div class="meta"> <span><strong><i class="icon-list-alt"></i> Titulo:</strong><br> <a href="#"><?php echo $row->titulo ?></a></span> </td>
                                <td width="185"><div class="meta"> <span><strong><i class="icon-list-alt"></i> <span><strong><i class="icon-user"></i>Caderno:</strong> <br><a href="#"><?php echo $row->caderno ?></a></span></div></td>
                                                <td width="185"><div class="meta"><span><strong><i class="icon-calendar"></i> data:</strong> <br><a href="#"><?php echo date("d/m/Y", strtotime($row->data)) ?></a></span></div></td>    
                                                <td width="194"><div class="meta"> <span><strong><i class="icon-list-alt"></i> Portaria:</strong> <br><a href="#"><?php echo $row->titulo ?></a></span>

                                                        <td width="194"><div class="meta"> <span><strong><i class="icon-user"></i>Orgão:</strong> <br><a href="#"><?php echo $row->orgao ?></a></span>
                                                            </div></td>
                                                        <td width="76"><button type="buttom" class="btn btn-success" onclick="javascript:confirma(<?php echo $row->keyarquivo ?>);" >Consultar</button></td>
                                                        <hr />
                                                        </tr>
                                                        </table>
                                                    <?php }
                                                    ?>
                                                    <div class="spacer"></div>

                                                    </main>
                                                    <br><div class="col-xs-12  col-md-3  col-md-pull-9">
                                                        <div class="sidebar">
                                                            <div class="widget widget_nav_menu  push-down-30">
                                                                <div class="menu-services-menu-container">
                                                                    <ul id="menu-services-menu" class="menu">

                                                                        <?php
                                                                        $tipo = $this->db->get('tp_publi');
                                                                        $entidade = $this->uri->segment(2);
                                                                        $ent = $this->db->query('SELECT id FROM entidade WHERE nome ="' . $entidade . '"');
                                                                        $ent2 = $ent->result();

                                                                        foreach ($tipo->result() as $rowtipo) {
                                                                            $query = $this->db->query('SELECT * FROM publicadas WHERE entidade ="7" AND tipo ="' . $rowtipo->nome . '" ');
                                                                            $total = $query->num_rows();
                                                                            ?>

                                                                            <li><a href="<?php echo base_url().'portal/get/'. tirarAcentos($rowtipo->nome) ?>"><?php echo $rowtipo->nome; ?><div><span  >    <?php echo "( " . $total . " ) "; ?></span><a href="#" title="4 topics" style="font-size: 8pt;">Arquivos</a></div></a></li>

                                                                            <?php
                                                                        }
                                                                        ?>


                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="widget widget-brochure-box  push-down-30">
                                                                <h4 class="sidebar__headings">LEI 131</h4>
                                                                <a class="brochure-box" href="#" target="_blank">
                                                                    <i class="fa  fa-file-pdf-o"></i>
                                                                    <h5 class="brochure-box__text">Consultar</h5>
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                </div><!-- /container -->
                                                </div>

                                                <?php

                                                function tirarAcentos($string) {
                                                    return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(Ç|ç)/"), explode(" ", "a A e E i I o O u U n N c"), $string);
                                                }
                                                ?>