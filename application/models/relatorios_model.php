<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class relatorios_model extends CI_Model {

    public function setconta($obj) {

          $this->db->insert('conta',obj);
   
          }
       

    public function getall() {
    $this->db->order_by("id", "desc");
        $query = $this->db->get('log_usuario');
        return $query->result();
    }

   

}

?>