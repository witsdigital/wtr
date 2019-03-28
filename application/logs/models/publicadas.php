<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class publicadas extends CI_Model {

    public function setpublicacao($obj) {
     if( $this->db->insert('publicadas', $obj)){
         return TRUE; 
     }
     
      
    }
    public function getPublicacao($ent) {
       
         $query = $this->db->get_where('publicacoes', array('entidade' => $ent));
       return $query->result();
    }
    public function getPublicacaosuper() {
       
         $query = $this->db->query("select * from publicadas");
        return $query->result();
    }
    public function getpublicacao_key($id){
       $query = $this->db->get_where('publicadas', array('id' => $id));
       return $query->result();
    }
   public function update($obj,$id) {
        $this->db->where('id', $id);
        $this->db->update('publicadas', $obj);
        return true;
    }
    
    public function delete_file($id){
        $this->db->where('id',$id);
        $this->db->delete('upload_arquivo_publicado');
        return true;
    }
    public function status($indice) {
         $query = $this->db->get_where('publicadas', array('id' => $indice));
        $data = $query->result();
       $status =  $data[0]->status;
        if($status == '1'){
            
            $this->db->where('id', $indice);
        $data = array('status' => '0');
        $this->db->update('publicadas', $data);
           redirect('index.php/publicar/1');
        }  else {
             $this->db->where('id', $indice);
        $data = array('status' => '1');
        $this->db->update('publicadas', $data);
          redirect('index.php/publicar/1');
    }

}
}
