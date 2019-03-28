<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class vereador_model extends CI_Model {

    public function setvereador($obj) {

        $this->load->model('Imagem');
        $upload = new Imagem();
        $img = $upload->upload('funcionarios');
        if($img == null){
            $img = "";
        }
        $obj['img'] = $img;
       if( $this->db->insert('funcionarios', $obj)){
            return true;
       }
       
    }


    public function deleteusuario($obj) {
        foreach ($obj as $row) {
            $key = $row->id;
        }
        $this->db->delete('usuario', array('id' => $key));
    }

    public function apaga($id) {
        $this->db->delete('funcionarios', array('id' => $id));
        return $id;
    }

    public function update($obj, $id) {
        $this->db->where('id', $id);
        $this->db->update('usuario', $obj);
        return true;
    }

}

?>