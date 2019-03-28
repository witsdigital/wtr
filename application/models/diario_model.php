

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class um3um_model extends CI_Model {

    public function getall() {

        $this->db->group_by('competencia');
        $query = $this->db->get('dados_131');
        return $query->result();
    }

    public function getalldetalhe($competencia) {
        $this->db->where('competencia', $competencia);

        $query = $this->db->get('dados_131');
        return $query->result();
    }

    public function getid($id, $tipo) {

        if ($tipo == "RECEITA") {
            $this->db->where('cod_dados_131', $id);

            $query = $this->db->get('131_receita_dados');
        }
        if ($tipo == "DESPESA") {
            $this->db->where('cod_dados_131', $id);

            $query = $this->db->get('131_despesa_dados');
        }



        return $query->result();
    }

}
?>