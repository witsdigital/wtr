<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class imagens_model extends CI_Model {

    public function set($obj) {
        

       
        if ($this->db->insert('imagens', $obj)) {
            return true;
        }
    }
    public function getid($id) {
        $this->db->where('id', $id);
         $this->db->or_where('key', $id);
        $query = $this->db->get('imagens');
        return $query->result();
    }
     public function getimgid($id) {
        $this->db->where('id', $id);

       
        $query = $this->db->get('img_empresa');
        return $query->result();
    }

    public function getall() {
         $this->db->order_by("id", "desc"); 
           $query = $this->db->get('imagens');
          
        return $query->result();
    }
    
    public function getallimg() {
         $this->db->order_by("id", "desc"); 
           $query = $this->db->get('img_empresa');
          
        return $query->result();
    }
   

   
    public function update($obj,$id) {
        $this->db->where('id', $id);
        if($this->db->update('imagens', $obj)){
             return true;
        }
       
    }
   

}

?>