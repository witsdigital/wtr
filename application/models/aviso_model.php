<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class aviso_model extends CI_Model {

    public function set($obj) {

      
        if ($this->db->insert('avisos', $obj)) {
            return true;
        }
    }
    public function getall(){
        $query = $this->db->get('avisos');
        return $query->result();
    }
      public function drop($id){
        if($this->db->delete('avisos', array('id' => $id))) {
            return true;
                        
                    }
        
    }
    
    

    
   
   

}

