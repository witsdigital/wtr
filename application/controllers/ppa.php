<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ppa extends CI_Controller {

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

       
        $dados['data'] = $this->db->query('select * from ppa')->result();


            $this->load->view('ppa/view', $dados);
        
        $this->load->view('includes/footer');
    }
	
	
    public function view_publicacao($indice = NULL) {
		

        $this->load->model('validalogin');
        $this->validalogin->valida();

        $data['ppa'] = $this->db->query('select * from ppa where id_ppa = '.$indice)->result();


        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            redirect (site_url('home'));
        }
        $this->load->view('ppa/view_publicacao', $data);
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
        $this->load->view('ppa/cadastro');
        $this->load->view('includes/footer');
    }

    public function salvar() {
       
$this->load->model('validalogin');
        $this->validalogin->valida();

        
		
		if (is_dir("uploads/ppa")) {
               $dir = 'uploads/ppa';
        } else {
            mkdir("uploads/ppa", 0777, true);
			$dir = 'uploads/ppa' ;
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

        if ($this->db->insert('ppa', $data)) {

            redirect(site_url('ppa/1'));
        } else {
            redirect(site_url('ppa/6'));
        }
    }

    public function apagar($id) {
		$this->load->model('validalogin');
        $this->validalogin->valida();

		if ($this->session->userdata('permissao') == 'administrador') {
        $this->db->trans_begin();
        $this->db->query('delete from ppa where id_ppa = '. $id);
      

       if ($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
		   redirect(site_url('ppa/6'));
       } else {
        $this->db->trans_commit();
          redirect(site_url('ppa/3'));

       }
		}
    }

    public function alterar($id) {
$this->load->model('validalogin');
        $this->validalogin->valida();

       
        $data['ppa'] = $this->db->query('select * from ppa where id_ppa ='.$id)->result();


        $this->load->view('includes/import');
			if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
			}else {
            redirect (site_url('home'));
        }
        $this->load->view('includes/header');
        $this->load->view('ppa/alterar', $data);
        $this->load->view('includes/footer');
    }

    public function update() {
       $data['descricao'] = $this->input->post('descricao');
		$data['ano'] = $this->input->post('ano');
			$this->db->where('id_ppa', $this->input->post('iduser'));
        if ($this->db->update('ppa', $data)) {
            redirect(site_url('ppa/2'));
        } else {
            echo $this->input->post('iduser');
        }
    }



}
