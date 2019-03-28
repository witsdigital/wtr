<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class relatorios extends CI_Controller {

    public function index($indice = NULL) {

        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            $this->load->view('includes/menu');
        }
        if ($indice == 1) {
            $data['msg'] = "Dados cadastrados com sucesso!";
            $this->load->view('includes/msg_success', $data);
        }
        if ($indice == 2) {
            $data['msg'] = "Dados Alterados com sucesso!";
            $this->load->view('includes/msg_success', $data);
        }

        if ($indice == 3) {
            $data['msg'] = "Dados Apagados com sucesso!";
            $this->load->view('includes/msg_success', $data);
        }
        if ($indice == 6) {
            $data['msg'] = "usuario ja existe!";
            $this->load->view('includes/msg_danger', $data);
        }

        $this->load->model('financeiro_model');
        $dados['lancamentos'] = $this->financeiro_model->getall();

        $this->load->view('relatorios/log', $dados);
        $this->load->view('includes/footer');
    }

   public function log(){
       
         $this->load->model('relatorios_model');
        $dados['log'] = $this->relatorios_model->getall();
        
           $this->load->view('includes/import');
        $this->load->view('includes/header');
         if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            $this->load->view('includes/menu');
        }
         $this->load->view('relatorios/log', $dados);
        $this->load->view('includes/footer');
       
   }
    
    

    

}
