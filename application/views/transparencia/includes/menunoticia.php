

<div class="col-xs-12  col-md-3">
    <div class="sidebar">
        <div class="widget  widget_search  push-down-30">
            <form role="search" method="get" action="<?=  base_url('portal/pesquisanoticias')?>" class="search-form">
                <label>
                    <span class="screen-reader-text">Buscar por:</span>
                    <input type="search" class="search-field" placeholder="Digite a busca..." value="" name="txt_busca" title="Search for:"/>
                </label>
                <input type="submit" class="search-submit" value="Buscar"/>
            </form>
        </div>	
        <div class="widget widget_recent_entries push-down-30">	
            <h4 class="sidebar__headings">Noticias Recentes</h4>	
            <ul>
                <?php
                $entidade ='condeuba';
                $this->db->where('nome', $entidade);
                $query = $this->db->get('entidade');
                $query = $query->result();
                $identidade = $query[0]->id;



                $this->db->where('entidade', $identidade);
                $query = $this->db->get('noticias',5);
                $query = $query->result();
                foreach ($query as $row) {
                    
               
                ?>
               
                <li><a href="<?=  base_url('camaras/'.$entidade)?>/noticia/<?php echo $row->id?>"><?php echo $row->titulo?></a></li>
                <?php  }?>
            </ul>
        </div>

        <div class="widget widget_tag_cloud push-down-30">
            <h4 class="sidebar__headings">Nuvem de tags</h4>
            <div class="tagcloud">
                <a href="#" title="4 topics" style="font-size: 8pt;">Cidade</a>
               
            </div>
        </div>	
    </div>
</div>