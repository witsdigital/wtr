<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class publicacoes_portal extends CI_Model {

    public function getpublicadas($entidade) {
        $query = $this->db->query("select * from publicadas where status = 1 AND entidade = " . $entidade);
        return $query->result();
    }
	
	  public function getpesquisapublicadas( $limit = null, $offset = null, $pesquisa) {
        $this->db->order_by('id', 'desc');
        if ($limit)
        $this->db->limit($limit, $offset);
		$this->db->like('titulo', $pesquisa); 
        $query = $this->db->get("publicacao");

        if ($query->num_rows() > 0) {

            return $query->result();
        } else {

            return null;
        }
    }

    public function getpublicadas_tipo($entidade, $tipo) {
        $this->db->where('tipo', $tipo);
        $this->db->where('entidade', $entidade);
        $query = $this->db->get('publicadas');
        return $query->result();
    }
	
	function CountAllPesquisa($pesquisa) {
        $query = $this->db->query("SELECT count(id) as contagem FROM `publicacao` WHERE `titulo` LIKE '%".$pesquisa."%'")->result();
		return  $query[0]->contagem;
    }

    function CountAll() { 
        $query = $this->db->query("SELECT count(id) as contagem FROM `publicacao` ")->result();
		return  $query[0]->contagem;
    }

    function CountAlltipo($tipo) {
     
		$query = $this->db->query("SELECT count(id) as contagem FROM `publicacao` WHERE `tipo` = '".$tipo."'")->result();
		return  $query[0]->contagem;
    }

    public function getpublicadas_busca($entidade, $tipo, $dado) {
        $this->db->where($tipo, $dado);

        $this->db->where('entidade', $entidade);
        $query = $this->db->get('publicadas');
        return $query->result();
    }

    function Getpublicaportal($sort = 'id', $order = 'desc', $limit = null, $offset = null) {
        $this->db->order_by("data", "DESC");
        if ($limit)
            $this->db->limit($limit, $offset);

        $query = $this->db->get("publicacao");

        if ($query->num_rows() > 0) {

            return $query->result();
        } else {

            return null;
        }
    }

    function Getpublicaportaltipo($sort = 'id', $order = 'desc', $limit , $offset , $tipo) {
        $this->db->order_by($sort, $order);
      $this->db->limit($limit, $offset);
        $this->db->where('tipo', $tipo);
        $query = $this->db->get("publicacao");
        
        if ($query->num_rows() > 0) {

            return $query->result();
        } else {

            return null;
        }
    }

    public function getpublicadas_edicao($entidade, $edicao) {


        $this->db->where('edicao', $edicao);
        $this->db->where('entidade', $entidade);
        $query = $this->db->get('publicadas');
        return $query->result();
    }

    public function getpublicadas_titulo($entidade, $titulo) {

        $this->db->like('titulo', $titulo, 'both');
        $this->db->where('entidade', $entidade);
        $query = $this->db->get('publicadas');
        return $query->result();
    }

    public function getpublicadas_data($entidade, $data) {


        $this->db->where('data', $data);
        $this->db->where('entidade', $entidade);
        $query = $this->db->get('publicadas');
        return $query->result();
    }

    public function getpublicadas_file($entidade, $key) {


        $this->db->where('key', $key);
        $query = $this->db->get('upload_arquivo_publicado');
        return $query->result();
    }

    public function getpublicadas_key($entidade, $key) {

        $this->db->like('titulo', $key, 'both');
        $this->db->or_like('objeto', $key, 'both');
        $this->db->or_like('caderno', $key, 'both');
        $this->db->or_like('orgao', $key, 'both');
        $this->db->where('entidade', $entidade);
        $query = $this->db->get('publicadas');
        return $query->result();
    }

    public function getfiles($chave) {
        $query = $this->db->query("select * from upload_arquivo_publicado where key = " . $chave);
        return $query->result();
    }

    public function deleteusuario($obj) {
        foreach ($obj as $row) {
            $key = $row->id;
        }
        $this->db->delete('usuario', array('id' => $key));
    }

    public function apagaentidade($id) {
        $this->db->delete('entidade', array('id' => $id));
        return $id;
    }

    public function update($obj, $id) {
        $this->db->where('id', $id);
        $this->db->update('usuario', $obj);
        return true;
    }

}

?>