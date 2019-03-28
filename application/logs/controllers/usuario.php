<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function index($indice = null) {
        $this->load->model('validalogin');
        $this->validalogin->valida();

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
            if ($indice == 2) {
            $data['msg'] = "Dados Alterados com sucesso!";
            $this->load->view('includes/msg_success', $data);
        }

        if ($indice == 3) {
            $data['msg'] = "Dados Apagados com sucesso!";
            $this->load->view('includes/msg_success', $data);
        }
        if ($indice == 5) {
            $data['msg'] = "Existe tabelas associadas!";
            $this->load->view('includes/msg_danger', $data);
        }
        if ($indice == 6) {
            $data['msg'] = "usuario ja existe!";
            $this->load->view('includes/msg_danger', $data);
        }

        $this->load->model('usuario_model');
        $dados['usuarios'] = $this->usuario_model->getusuarios();

        $this->load->view('usuario/view', $dados);
        $this->load->view('includes/footer');
    }

    public function cadastro($indice = NULL) {

     $this->load->model('entidade_model');
        $dados['entidade'] = $this->entidade_model->getentidade();

        $this->load->view('includes/import');
        $this->load->view('includes/header');
           if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
      }else{
              $this->load->view('includes/menu'); 
        }
        $this->load->view('usuario/cadastro',$dados);
        $this->load->view('includes/footer');
    }

    public function salvar() {

        $data['nome'] = $this->input->post('nome');
        $data['sobrenome'] = $this->input->post('sobrenome');
        $data['login'] = $this->input->post('login');
        $data['senha'] = $this->input->post('senha');
        $data['email'] = $this->input->post('email');
        $data['endereco'] = $this->input->post('endereco');
        $data['cidade'] = $this->input->post('cidade');
        $data['estado'] = $this->input->post('estado');
        $data['entidade'] = $this->input->post('entidade');

        $this->load->model('usuario_model');
        if ($this->usuario_model->setusuario($data)) {
            if ($this->usuario_model->setusuario($data)) {
                redirect('usuario/1');
            } else {
                redirect('entidade/6');
            }
        }
    }

    public function alterar($id) {
        $this->load->model('entidade_model');
        $dados['entidade'] = $this->entidade_model->getentidade();
        $this->db->where('id', $id);
        $data['usuarios'] = $this->db->get('usuario')->result();
        $this->load->view('includes/import');
        $this->load->view('includes/header');
           if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
      }else{
              $this->load->view('includes/menu'); 
        }
        $this->load->view('usuario/alterar', $data,$dados);
        $this->load->view('includes/footer');
    }

    public function update() {
        
        $data['nome'] = $this->input->post('nome');
        $data['sobrenome'] = $this->input->post('sobrenome');
        $this->load->model('entidade_model');
        $dados['entidade'] = $this->entidade_model->getentidade();
       
        $data['email'] = $this->input->post('email');
        $data['endereco'] = $this->input->post('endereco');
        $data['cidade'] = $this->input->post('cidade');
        $data['estado'] = $this->input->post('estado');
        $data['entidade'] = $this->input->post('entidade');
        $this->load->model('usuario_model');
        if ($this->usuario_model->update($data,$this->input->post('iduser'))) {
              redirect('usuario/2');
            
        }else{
            echo $this->input->post('iduser');
        }
    }

    public function apagar($id) {

        if ($this->db->delete('usuario', array('idusuario' => $id))) {
            redirect('usuario/3', 'refresh');
        } else {
            echo 'error';
        }
    }
    
    
     public function updateimg() {



        $this->load->model('usuario_model');
        if ($this->usuario_model->update_img($this->input->post('iduser'))) {
            redirect('usuario/2');
        } else {
            echo $this->input->post('iduser');
        }
    }

}
