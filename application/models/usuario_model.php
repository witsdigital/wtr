<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class usuario_model extends CI_Model {

    public function setusuario($obj) {

        $query = $this->db->query("select * from usuario");
        $i = 0;
        foreach ($query->result() as $row) {
            if ($row->login == $obj['login']) {
                $i = 1;
            }
        }
        if ($i == 0) {
           
            $this->db->insert('usuario', $obj);
            return true;
        } else {
            return $i;
        }
    }

    public function getusuarios() {
        $query = $this->db->query("select * from usuario WHERE chave != 1");
        return $query->result();
    }

    public function deleteusuario($obj) {
        foreach ($obj as $row) {
            $key = $row->id;
        }
        $this->db->delete('usuario', array('id' => $key));
    }

    public function update($obj, $id) {
        $this->db->where('idusuario', $id);
        $this->db->update('usuario', $obj);
        return true;
    }
    public function update_img($id){
         $this->load->model('Imagem');
        $upload = new Imagem();
        $img = $upload->upload('usuario');
        if ($img == null) {
            $img = "";
        }
        $obj['img'] = $img;
         $this->db->where('idusuario', $id);
       
         
         if($this->db->update('usuario', $obj)){
             return true;
        }
    }

}

?>