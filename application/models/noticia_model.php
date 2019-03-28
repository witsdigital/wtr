<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class noticia_model extends CI_Model {

    public function set($obj) {
        $entidade = $this->session->userdata('entidade');

        $this->load->model('Imagem');
        $upload = new Imagem();
        $img = $upload->upload('noticias',7);
        if ($img == null) {
            $img = "";
        }
        $obj['img'] = $img;
        if ($this->db->insert('noticias', $obj)) {
            return true;
        }
    }


    function CountAll(){
        return $this->db->count_all("noticias");
    }
	
	function CountAllCategoria($id){
        $query = $this->db->query("select count(id) as total from noticias where categoria = ".$id)->result();
		return $query[0]->total;
    }
	
	function CountAllPesquisa($pesquisa){
        $query = $this->db->query("SELECT count(id) as contagem FROM `noticias` WHERE `titulo` LIKE '%".$pesquisa."%' or  `conteudo` LIKE '%`".$pesquisa."%'")->result();
		return  $query[0]->contagem;
    }


    public function getid($id){
        $query = $this->db->query('select * from noticias WHERE id ='.$id.' AND entidade = '.$this->session->userdata('entidade'));
        return $query->result();
    }
        
    public function getNoticia($id) {
            echo $id;
       $query = $this->db->query('select * from noticias WHERE id ='.$id.' AND entidade = '.$this->session->userdata('entidade'));
       echo count($query); 
       return $query->result();
    }

    public function getall() {
        $query = $this->db->query("select * from noticias order by id desc" )->result();
        return $query;
    }

    function GetNotPortal($sort = 'id', $order = 'desc', $limit = null, $offset = null) {

        $this->db->order_by($sort, $order);


        if($limit)

        $this->db->limit($limit,$offset);

        $query = $this->db->query("select noticias.*, categorias.nomecategoria from noticias left join categorias on categorias.id_categoria = noticias.categoria order by id desc limit ".$limit." offset ".$offset);

    

        if ($query->num_rows() > 0) {

          return $query->result();

        } else {

          return null;

        }

    

      }
	  
	  
	  function GetNotPortalCat($sort = 'id', $order = 'desc', $limit = null, $offset = null) {

        $this->db->order_by($sort, $order);


        if($limit)

        $this->db->limit($limit,$offset);

        $query = $this->db->query("select noticias.*, categorias.nomecategoria from noticias left join categorias on categorias.id_categoria = noticias.categoria where categoria = ".$sort." order by id desc limit ".$limit." offset ".$offset);

    

        if ($query->num_rows() > 0) {

          return $query->result();

        } else {

          return null;

        }

    

      }
	  
	  
	   function GetNotPortalPesquisa($limit = null, $offset = null, $pesquisa) {

        $this->db->order_by('id', 'desc');
		
		$this->db->limit($limit,$offset);
		$this->db->like('conteudo', $pesquisa); 
		$this->db->or_like('titulo', $pesquisa); 
        $this->db->where('entidade', 7);
        $query = $this->db->get("noticias");

    

        if ($query->num_rows() > 0) {

          return $query->result();

        } else {

          return null;

        }

    

      }
	  
	  
    public function update($obj,$id) {
        $this->db->where('id', $id);
         $this->db->where('entidade',  $this->session->userdata('entidade'));
        if($this->db->update('noticias', $obj)){
             return true;
        }
       
    }
    public function update_img($id){
         $this->load->model('Imagem');
        $upload = new Imagem();
        $img = $upload->upload('noticias', 7);
        if ($img == null) {
            $img = "";
        }
        $obj['img'] = $img;
         $this->db->where('id', $id);
          $this->db->where('entidade',  $this->session->userdata('entidade'));
         
         if($this->db->update('noticias', $obj)){
             return true;
        }
    }

}

?>