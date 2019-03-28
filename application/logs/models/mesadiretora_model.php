<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class mesadiretora_model extends CI_Model {

    public function set($obj) {
        $entidade = $this->session->userdata('entidade');

        $this->load->model('Imagem');
        $upload = new Imagem();
        $img = $upload->upload('funcionarios',$entidade);
        if ($img == null) {
            $img = "";
        }
        $obj['img'] = $img;
        if ($this->db->insert('funcionarios', $obj)) {
            return true;
        }
    }
    public function getid($id){
        $query = $this->db->query('select * from funcionarios WHERE id ='.$id.' AND entidade = '.$this->session->userdata('entidade'));
        return $query->result();
        }
        
        public function mesadiretora($id) {
            echo $id;
       $query = $this->db->query('select * from funcionarios WHERE id ='.$id.' AND entidade = '.$this->session->userdata('entidade'));
       echo count($query); 
       return $query->result();
    }

    public function getall() {
        $query = $this->db->query("select * from funcionarios where tipo = 'mesadiretora'");
        return $query->result();
    }
    public function update($obj,$id) {
        $this->db->where('id', $id);
         $this->db->where('entidade',  $this->session->userdata('entidade'));
        if($this->db->update('funcionarios', $obj)){
             return true;
        }
       
    }
    public function update_img($id){
		$entidade = 7;
         $this->load->model('Imagem');
        $upload = new Imagem();
        $img = $upload->upload('funcionarios',$entidade);
        if ($img == null) {
            $img = "";
        }
        $obj['img'] = $img;
         $this->db->where('id', $id);
          $this->db->where('entidade',  $entidade);
         
         if($this->db->update('funcionarios', $obj)){
             return true;
        }
    }

}

?>