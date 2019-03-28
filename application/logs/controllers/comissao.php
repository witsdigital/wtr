<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comissao extends CI_Controller {

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

        $this->load->model('comissao_model');
        $dados['data'] = $this->comissao_model->getall();

        $this->load->view('comissao/view', $dados);
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
        $this->load->view('comissao/cadastro');
        $this->load->view('includes/footer');
    }

    public function salvar() {
        
        $data['nome'] = $this->input->post('nome');
        $data['tipo'] = "comissao";
        $data['cargo'] = $this->input->post('cargo');
        $data['email'] = $this->input->post('email');
        $data['sala'] = $this->input->post('sala');
        $data['entidade'] = 7;


        $this->load->model('comissao_model');
        if ($this->comissao_model->set($data)) {

            redirect('comissao/1');
        } else {
            redirect('comissao/6');
        }
    }

    public function apagar($id) {
        $cat = "funcionarios";
        $query = $this->db->get_where($cat, array('id' => $id));
        foreach ($query->result() as $row) {
            $file = "uploads/$cat/" . $row->img;
            if (is_file($file)) {
                if (is_readable($file) && unlink($file)) {
                    if ($this->db->delete($cat, array('id' => $id))) {
                        redirect('comissao/3');
                    }
                } else {
                    redirect('comissao/3');
                }
            } else {
                if ($this->db->delete($cat, array('id' => $id))) {
                    redirect('comissao/3');
                }
            }
        }
    }

    public function alterar($id) {
        $this->load->model('comissao_model');
        $data['Vereadores'] = $this->comissao_model->getid($id);


        $this->load->view('includes/import');
           if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
      }else{
              $this->load->view('includes/menu'); 
        }
        $this->load->view('includes/header');
        $this->load->view('comissao/alterar', $data);
        $this->load->view('includes/footer');
    }

    public function update() {
  
        $data['nome'] = $this->input->post('nome');
        $data['cargo'] = $this->input->post('cargo');
        $data['email'] = $this->input->post('email');
        $data['sala'] = $this->input->post('sala');
        $this->load->model('comissao_model');
        if ($this->comissao_model->update($data, $this->input->post('iduser'))) {
            redirect('comissao/2');
        } else {
            echo $this->input->post('iduser');
        }
    }

    public function updateimg() {

        $this->load->model('comissao_model');
        if ($this->comissao_model->update_img($this->input->post('iduser'))) {
            redirect('comissao/2');
        } else {
            echo $this->input->post('iduser');
        }
    }

}
