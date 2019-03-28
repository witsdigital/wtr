<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Secretarias extends CI_Controller {

    public function index($indice = NULL) {


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
		if ($indice == 5) {
            $data['msg'] = "Erro ao cadastrar/alterar secretaria";
            $this->load->view('includes/msg_danger', $data);
        }
        if ($indice == 6) {
            $data['msg'] = "A secretaria não pode ser apagada";
            $this->load->view('includes/msg_danger', $data);
        }

   
        $dados['data'] = $this->db->query('select * from secretarias')->result();

        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('secretarias/view', $dados);
        } else {
            $this->load->view('secretarias/view', $dados);
        }
        
        $this->load->view('includes/footer');
    }
	
	
    public function cadastro() {		
        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } if ($this->session->userdata('permissao') == 'editor') {
				$this->load->view('includes/menu');
			} if ($this->session->userdata('permissao') == 'colaborador') {
				redirect(site_url('home'));
			}
        $this->load->view('secretarias/cadastro');
        $this->load->view('includes/footer');
    }
	
	public function salvar() {


        $data['titulo'] = $this->input->post('titulo');
        $data['descricao'] =  $this->input->post('descricao');
        $data['secretario'] = $this->input->post('secretario');

        if ($this->db->insert('secretarias', $data)) {
            redirect(site_url('secretarias/1'));
        } else {
            redirect(site_url('secretarias/5'));
        }
    }
	
	public function apagar($id) {
		
		 if ($this->session->userdata('permissao')) {
		$this->db->trans_begin();
        $this->db->query('delete from secretarias where id_secretaria = '. $id);
      

		   if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			 redirect(site_url('secretarias/6')); 
		   } else {
			$this->db->trans_commit();
			redirect(site_url('secretarias/3'));

		   }
		 }
	}
	
	 public function alterar($id) {
  
        $data['secretaria'] = $this->db->query('select * from secretarias where id_secretaria = '.$id)->result();


        $this->load->view('includes/import');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } if ($this->session->userdata('permissao') == 'editor') {
				$this->load->view('includes/menu');
			} if ($this->session->userdata('permissao') == 'colaborador') {
				redirect(site_url('home'));
			}
        $this->load->view('includes/header');
        $this->load->view('secretarias/alterar', $data);
        $this->load->view('includes/footer');
    }
	
	public function update() {

        $data['titulo'] = $this->input->post('titulo');
        $data['descricao'] =  $this->input->post('descricao');
        $data['secretario'] = $this->input->post('secretario');

		$this->db->where('id_secretaria', $this->input->post('iduser'));
        if ($this->db->update('secretarias', $data)) {
            redirect(site_url('secretarias/2'));
        } else {
            echo $this->input->post('iduser');
        }
    }

	

}
