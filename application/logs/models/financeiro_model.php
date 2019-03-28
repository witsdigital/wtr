<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class financeiro_model extends CI_Model {

    public function setconta($obj) {

          $this->db->insert('conta',obj);
   
          }
          public function setdeposito($obj) {

         if( $this->db->insert('financeiro_deposito',$obj)){
             return true;
         }else{
             return false;
         }
         
   
          }

    public function getall() {
        $query = $this->db->get('financeiro_deposito');
        return $query->result();
    }

   

}

?>