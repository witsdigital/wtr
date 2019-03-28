<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Slides extends CI_Controller {

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

       
        $dados['data'] = $this->slides_model->getall();

        $this->load->view('slides/view', $dados);
        $this->load->view('includes/footer');
    }



    public function salvar() {
  
		$data['id'] = $this->input->post('id');
     
        $this->load->model('Imagem');
        $upload = new Imagem();
        $img = $upload->upload('slides', 7);
        if ($img == null) {
            $img = "";
        }
        $data['img'] = $img;
		$this->db->where( 'id', $data['id']);
        if ($this->db->update( 'slides', $data)) {
            redirect(site_url('slides/1'));
        } else {
            redirect(site_url('slides/6'));
        }
    }

}
