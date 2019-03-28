<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Entidade extends CI_Controller {

    public function index($indice = NULL) {

        $this->load->view('includes/import');
        $this->load->view('includes/header');
           if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
      }else{
              $this->load->view('includes/menu'); 
        }
        if ($indice == 1) {
            $data['msg'] = "Dados cadastrados com sucesso!";
            $this->load->view('includes/msg_success', $data);
        }
        if ($indice == 5) {
            $data['msg'] = "Existem dados associado a esta entidade!";
            $this->load->view('includes/msg_danger', $data);
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

        $this->load->model('entidade_model');
        $dados['entidade'] = $this->entidade_model->getentidade();

        $this->load->view('entidade/view', $dados);
        $this->load->view('includes/footer');
    }

    public function cadastro() {
           $this->load->view('includes/import');
        $this->load->view('includes/header');
           if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
      }else{
              $this->load->view('includes/menu'); 
        }
        $this->load->view('entidade/cadastro');
        $this->load->view('includes/footer');
        
    }

    public function salvar() {
        $data['nome'] = $this->input->post('nome');
        $data['tipo'] = $this->input->post('tipo');
        $data['estado'] = $this->input->post('estado');
        $this->load->model('entidade_model');
        if ( $this->entidade_model->setentidade($data)) {
            
            redirect('entidade/1');
        } else {
            redirect('entidade/6');
        }
    }
    
    public function apagar($id){
        $this->load->model('entidade_model');
        if ( $this->entidade_model->apagaentidade($id)) {
            
         redirect('entidade/3');
        } else {
            redirect('usuario/6');
        }
        
        
        
         
    }

}
