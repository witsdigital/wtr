<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    //get the username & password from tbl_usrs
    function get_user($usr, $pwd) {
        $sql = "select * from usuario where login = '" . $usr . "' and senha = '" . $pwd . "'";
        $query = $this->db->query($sql);
        $total = $query->num_rows();
        if($total > 0){
            foreach ($query->result() as $row) {
            $data['nome'] = $row->nome;
            $data['user'] = $row->login;
            $data['permissao'] = $row->permissao;
            $data['entidade'] = $row->entidade;
            $data['tipo'] = $row->tipo;
            $data['total'] = $query->num_rows();
        }
        return $data;
            
        }else{
             $data['total'] =$query->num_rows();
             return $data;
            
        }
        

        
    }

}

?>