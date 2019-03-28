<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class entidade_model extends CI_Model {

    public function setentidade($obj) {

        $query = $this->db->query("select * from entidade");
        $i = 0;
        foreach ($query->result() as $row) {
            if ($row->nome == $obj['nome']) {
                $i = 1;
            } 
        }
        if ($i == 0) {
             $this->load->model('Imagem');
            $upload = new Imagem();
            $img = $upload->upload('entidades');
            if ($img == null) {
                $img = "";
            }
            $obj['img'] = $img;
            $this->db->insert('entidade', $obj);
            return true;
        } else {
            return $i;
        }
    }

    public function getentidade() {
        $query = $this->db->query("select * from entidade");
        return $query->result();
    }

    public function deleteusuario($obj) {
        foreach ($obj as $row) {
            $key = $row->id;
        }
        $this->db->delete('usuario', array('id' => $key));
    }
    public function apagaentidade($id){
        if($this->db->delete('entidade', array('id' => $id))){
           return true;
        }else{
           if ($this->db->_error_number() == 1451){
                redirect('entidade/5');
           }
           
        }
        
    }

    public function update($obj,$id) {
        $this->db->where('id', $id);
        $this->db->update('usuario', $obj);
        return true;
    }

}

?>