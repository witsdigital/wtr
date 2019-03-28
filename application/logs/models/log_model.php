<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class log_model extends CI_Model {
    public function log($operacao){
        
        
       
            date_default_timezone_set('America/Sao_Paulo');
            $log['usuario '] = $this->session->userdata('nome');
            $log['entidade '] = $this->session->userdata('entidade');
            $log['acao'] = $operacao; 
            $log['data']=date("Y/m/d");
            $log['hora']=date("H:i:s", time());
           if( $this->db->insert('log_usuario',$log)){
            return TRUE;  
           }
            
             
    }
}