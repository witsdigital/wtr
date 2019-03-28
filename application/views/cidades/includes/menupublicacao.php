<div class="sidebar">
    <div class="widget widget_nav_menu  push-down-30">
        <div class="menu-services-menu-container">
            <ul id="menu-services-menu" class="menu">

                <?php
                $tipo = $this->db->get('tp_publi');
                $entidade = $this->uri->segment(2);
                $ent = $this->db->query('SELECT id FROM entidade WHERE nome ="' . $entidade . '"');
                $ent2 = $ent->result();
                print_r($ent2);

                foreach ($tipo->result() as $rowtipo) {
                    $query = $this->db->query('SELECT * FROM publicacao WHERE tipo ="' . $rowtipo->nome . '" ');
                    $total = $query->num_rows();
                    ?>

                    <li><a href="<?php echo base_url() . 'portal/get/' . tirarAcentos($rowtipo->nome) ?>"><?php echo $rowtipo->nome; ?><div><span  >    <?php echo "( " . $total . " ) "; ?></span><a href="#" title="4 topics" style="font-size: 8pt;">Arquivos</a></div></a></li>

                    <?php
                }
                ?>


            </ul>
        </div>
    </div>
    <div class="widget widget-brochure-box  push-down-30">
        <h4 class="sidebar__headings">LEI 131</h4>
        <a class="brochure-box" href="<?= base_url('portal/recdesp') ?>">
            <i class="fa  fa-file-pdf-o"></i>
            <h5 class="brochure-box__text">RECEITA/DESPESA</h5>
        </a>
    </div>

</div>