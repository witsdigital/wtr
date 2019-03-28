<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

    public function index($indice = NULL) {
		$this->load->model('validalogin');
        $this->validalogin->valida();



        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } if ($this->session->userdata('permissao') == 'editor') {
            $this->load->view('includes/menu');
        } if ($this->session->userdata('permissao') == 'colaborador') {
            redirect(site_url('home'));
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
            $data['msg'] = "Não foi possivel deletar a categoria, tente novamente mais tarde!";
            $this->load->view('includes/msg_danger', $data);
        }

       
        $dados['data'] = $this->db->query('select * from categorias')->result();

        $this->load->view('categorias/view', $dados);
       
        $this->load->view('includes/footer');
    }

    public function cadastro() {
		$this->load->model('validalogin');
        $this->validalogin->valida();

        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if($this->session->userdata('permissao') == 'administrador'){
            $this->load->view('includes/menu_admin');  
		}if ($this->session->userdata('permissao') == 'editor') {
            $this->load->view('includes/menu');
        } if ($this->session->userdata('permissao') == 'colaborador') {
            redirect(site_url('home'));
        }
        $this->load->view('categorias/cadastro');
        $this->load->view('includes/footer');
    }

    public function salvar() {
		$this->load->model('validalogin');
        $this->validalogin->valida();
		
        $data['nomecategoria'] = $this->input->post('nome');

        if ($this->db->insert('categorias', $data)) {

            redirect(site_url('categorias/1'));
        } else {
            redirect(site_url('categorias/6'));
        }
    }

    public function apagar($id) {
		
		$this->load->model('validalogin');
        $this->validalogin->valida();

		if ($this->session->userdata('permissao')) {
        $this->db->trans_begin();
        $this->db->query('delete from categorias where id_categoria = '. $id);
      

       if ($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
		   redirect(site_url('categorias/6'));
       } else {
        $this->db->trans_commit();
          redirect(site_url('categorias/3'));

       }
		}
    }

    public function alterar($id) {
		$this->load->model('validalogin');
        $this->validalogin->valida();


       
        $data['categoria'] = $this->db->query('select * from categorias where id_categoria ='.$id)->result();


        $this->load->view('includes/import');
			if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
			}if ($this->session->userdata('permissao') == 'editor') {
				$this->load->view('includes/menu');
			} if ($this->session->userdata('permissao') == 'colaborador') {
				redirect(site_url('home'));
			}
        $this->load->view('includes/header');
        $this->load->view('categorias/alterar', $data);
        $this->load->view('includes/footer');
    }

    public function update() {
		$this->load->model('validalogin');
        $this->validalogin->valida();

        $data['nomecategoria'] = $this->input->post('nome');
			$this->db->where('id_categoria', $this->input->post('iduser'));
        if ($this->db->update('categorias', $data)) {
            redirect(site_url('categorias/2'));
        } else {
            echo $this->input->post('iduser');
        }
    }



}
