<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class md_tppublicacao extends CI_Model {

    public function gettppublica() {
        $query = $this->db->query("select * from tp_publi");
        return $query->result();
    }

    
}

?>