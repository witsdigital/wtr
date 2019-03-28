<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mesadiretora extends CI_Controller {

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

        $this->load->model('mesadiretora_model');
        $dados['data'] = $this->mesadiretora_model->getall();

        $this->load->view('mesadiretora/view', $dados);
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
        $this->load->view('mesadiretora/cadastro');
        $this->load->view('includes/footer');
    }

    public function salvar() {
       

        $data['nome'] = $this->input->post('nome');
        $data['tipo'] = "mesadiretora";
        $data['email'] = $this->input->post('email');
        $data['sala'] = $this->input->post('sala');
        $data['entidade'] = 7;


        $this->load->model('mesadiretora_model');
        if ($this->mesadiretora_model->set($data)) {

            redirect('mesadiretora/1');
        } else {
            redirect('mesadiretora/6');
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
                        redirect('mesadiretora/3');
                    }
                } else {
                    redirect('mesadiretora/3');
                }
            } else {
                if ($this->db->delete($cat, array('id' => $id))) {
                    redirect('mesadiretora/3');
                }
            }
        }
    }

    public function alterar($id) {

        $this->load->model('mesadiretora_model');
        $data['Vereadores'] = $this->mesadiretora_model->getid($id);


        $this->load->view('includes/import');
           if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
      }else{
              $this->load->view('includes/menu'); 
        }
        $this->load->view('includes/header');
        $this->load->view('mesadiretora/alterar', $data);
        $this->load->view('includes/footer');
    }

    public function update() {
        $data['nome'] = $this->input->post('nome');
        $data['tipo'] = "mesadiretora";
        $data['email'] = $this->input->post('email');
        $data['sala'] = $this->input->post('sala');
        $data['entidade'] = 7;

        $this->load->model('mesadiretora_model');
        if ($this->mesadiretora_model->update($data, $this->input->post('iduser'))) {
            redirect('mesadiretora/2');
        } else {
            echo $this->input->post('iduser');
        }
    }

    public function updateimg() {



        $this->load->model('mesadiretora_model');
        if ($this->mesadiretora_model->update_img($this->input->post('iduser'))) {
            redirect('mesadiretora/2');
        } else {
            echo $this->input->post('iduser');
        }
    }

}
