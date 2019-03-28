<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Loa extends CI_Controller {

    public function index($indice = NULL) {
		
		$this->load->model('validalogin');
        $this->validalogin->valida();



        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            redirect (site_url('home'));
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

       
        $dados['data'] = $this->db->query('select * from loa')->result();


            $this->load->view('loa/view', $dados);
        
        $this->load->view('includes/footer');
    }
	
	
    public function view_publicacao($indice = NULL) {
		
		$this->load->model('validalogin');
        $this->validalogin->valida();


        $this->load->model('validalogin');
        $this->validalogin->valida();

        $data['loa'] = $this->db->query('select * from loa where id_loa = '.$indice)->result();


        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            redirect (site_url('home'));
        }
        $this->load->view('loa/view_publicacao', $data);
        $this->load->view('includes/footer');
    }

    public function cadastro() {
		$this->load->model('validalogin');
        $this->validalogin->valida();

        $this->load->view('includes/import');
        $this->load->view('includes/header');
           if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
      }else {
            redirect (site_url('home'));
        }
        $this->load->view('loa/cadastro');
        $this->load->view('includes/footer');
    }

    public function salvar() {
       
		$this->load->model('validalogin');
        $this->validalogin->valida();

        
		
		if (is_dir("uploads/loa")) {
               $dir = 'uploads/loa';
        } else {
            mkdir("uploads/loa", 0777, true);
			$dir = 'uploads/loa' ;
        }
        
        
        $config["upload_path"] = $dir;
        $config["allowed_types"] = "pdf";
        $config["overwrite"] = TRUE;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;

        
        $this->load->library("upload", $config);
        //em caso de sucesso no upload     
        if ($this->upload->do_upload()) {

            //renomeia a foto   
            $arquivo = rand(5, 9999).md5($this->upload->file_name);
            $nomeorig = $config["upload_path"] . "/" . $this->upload->file_name;
            $nomedestino = $config["upload_path"] . "/" . $arquivo . $this->upload->file_ext;
            rename($nomeorig, $nomedestino);
            //define opções de crop        
            $config["image_library"] = "gd2";
            $config["source_image"] = $nomedestino;

            $this->load->library("image_lib", $config);

         
		$data['file'] = base_url(). $nomedestino;

		}
		
		$data['descricao'] = $this->input->post('descricao');
		$data['ano'] = $this->input->post('ano');

        if ($this->db->insert('loa', $data)) {

            redirect(site_url('loa/1'));
        } else {
            redirect(site_url('loa/6'));
        }
    }

    public function apagar($id) {
		$this->load->model('validalogin');
        $this->validalogin->valida();

		if ($this->session->userdata('permissao') == 'administrador') {
        $this->db->trans_begin();
        $this->db->query('delete from loa where id_loa = '. $id);
      

       if ($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
		   redirect(site_url('loa/6'));
       } else {
        $this->db->trans_commit();
          redirect(site_url('loa/3'));

       }
		}
    }

    public function alterar($id) {
		$this->load->model('validalogin');
        $this->validalogin->valida();


       
        $data['loa'] = $this->db->query('select * from loa where id_loa ='.$id)->result();


        $this->load->view('includes/import');
			if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
			}else {
            redirect (site_url('home'));
        }
        $this->load->view('includes/header');
        $this->load->view('loa/alterar', $data);
        $this->load->view('includes/footer');
    }

    public function update() {
		$this->load->model('validalogin');
        $this->validalogin->valida();

       $data['descricao'] = $this->input->post('descricao');
		$data['ano'] = $this->input->post('ano');
			$this->db->where('id_loa', $this->input->post('iduser'));
        if ($this->db->update('loa', $data)) {
            redirect(site_url('loa/2'));
        } else {
            echo $this->input->post('iduser');
        }
    }



}
