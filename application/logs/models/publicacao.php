<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class publicacao extends CI_Model {

    public function setPublicacao($obj) {
       
        if ( $this->db->insert('publicacoes',$obj)) {
            redirect('index.php/publicacoes/cadastro/1');
        } else {
            redirect('index.php/docente/2');
        }
    }
    public function getPublicacao($ent) {
       
         $query = $this->db->get_where('publicacoes', array('entidade' => $ent));
       return $query->result();
    }
    public function getPublicacaosuper() {
       
         $query = $this->db->query("select * from publicacoes");
        return $query->result();
    }
    public function getpublicacao_key($id){
       $query = $this->db->get_where('publicacoes', array('id' => $id));
       return $query->result();
    }
   public function update($obj,$id) {
        $this->db->where('id', $id);
        $this->db->update('publicacoes', $obj);
        return true;
    }
    
    public function delete_file($id){
        $this->db->where('id',$id);
        $this->db->delete('upload_arquivo');
        return true;
    }
    public function status($indice) {
         $query = $this->db->get_where('publicacoes', array('id' => $indice));
        $data = $query->result();
       $status =  $data[0]->status;
        if($status == '1'){
            
            $this->db->where('id', $indice);
        $data = array('status' => '0');
        $this->db->update('publicacoes', $data);
           redirect('index.php/publicacoes/1');
        }  else {
             $this->db->where('id', $indice);
        $data = array('status' => '1');
        $this->db->update('publicacoes', $data);
          redirect('index.php/publicacoes/1');
    }

}
}
