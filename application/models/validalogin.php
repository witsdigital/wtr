<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class validalogin extends CI_Model {

    public function valida() {
        if (!$this->session->userdata('loginuser') == true) {
            
             $this->session->sess_destroy();
         redirect('login/index');
            
        }else{
             
//          
        }
       
    }
  

}

?>