<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vereador extends CI_Controller {

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

        $this->load->model('vereador_model');
        $dados['vereadores'] = $this->vereador_model->getall();

        $this->load->view('vereador/view', $dados);
        $this->load->view('includes/footer');
    }

    public function cadastro() {
        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            $this->load->view('includes/menu');
        }
        $this->load->view('vereador/cadastro');
        $this->load->view('includes/footer');
    }

    public function salvar() {



        $data['nome'] = $this->input->post('nome');
        $data['descricao'] = $this->input->post('descricao');
        $data['entidade'] = $this->session->userdata('entidade');


        $this->load->model('vereador_model');
        if ($this->vereador_model->setvereador($data)) {

            redirect('vereador/1');
        } else {
            redirect('entidade/6');
        }
    }

    public function apagar($id) {
        $query = $this->db->get_where('vereadores', array('id' => $id));
        foreach ($query->result() as $row) {
            $file = "uploads/vereadores/" . $row->img;
            if (is_file($file)) {
                if (is_readable($file) && unlink($file)) {
                    if ($this->db->delete('vereadores', array('id' => $id))) {
                        redirect('vereador/3');
                    }
                } else {
                    redirect('vereador/3');
                }
            } else {
                if ($this->db->delete('vereadores', array('id' => $id))) {
                    redirect('vereador/3');
                }
            }
        }
    }

}
