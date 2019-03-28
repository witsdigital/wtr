<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sic extends CI_Controller {

    public function index($indice = NULL) {        
		$this->load->model('validalogin');        
		$this->validalogin->valida();
		$data['data'] = $this->db->query('select * from sic order by status desc')->result();
		$this->load->view('includes/import');
		$this->load->view('includes/header');
		if ($this->session->userdata('permissao') == 'administrador') {
			$this->load->view('includes/menu_admin');        
		} else { 
			$this->load->view('includes/menu');        
		}        $this->load->view('sic/view', $data);
        $this->load->view('includes/footer');    
	}
	
	
    public function view_publicacao($indice = NULL) {

        $this->load->model('validalogin');
        $this->validalogin->valida();

        $data['sic'] = $this->db->query('select sic.*, cidade.nome as nome_cidade, estado.nome as nome_estado, secretarias.titulo from sic join secretarias on secretarias.id_secretaria = sic.cod_secretarias join estado on estado.id = sic.estado join cidade on cidade.id = sic.cidade where id_sic = '.$indice)->result();		
		$data['arquivos'] = $this->db->query('select * from arquivos_sic where cod_sic = '.$indice)->result();


        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            $this->load->view('includes/menu');
        }
        $this->load->view('sic/view_publicacao', $data);
        $this->load->view('includes/footer');
    }

    public function alterarstatus($id = null, $status = null) {
		$this->load->model('validalogin');
        $this->validalogin->valida();
		$data['status'] = $status;		$this->db->where('id_sic', $id);        
		if ($this->db->update('sic', $data)) {
			redirect(site_url('sic'));
		}
    }

    public function salvar() {
       
	$this->load->model('validalogin');
        $this->validalogin->valida();

        
		
		if (is_dir("uploads/rreo/")) {
               $dir = 'uploads/rreo/';
        } else {
            mkdir("uploads/rreo", 0777, true);
			$dir = 'uploads/rreo' ;
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
		$data['data'] = $this->input->post('ano');
		$data['orgao_publicacao'] = $this->input->post('orgao_publicacao');

        if ($this->db->insert('RREO', $data)) {

            redirect('rreo/1');
        } else {
            redirect('rreo/6');
        }
    }

    public function apagar($id) {
		$this->load->model('validalogin');
        $this->validalogin->valida();

		if ($this->session->userdata('permissao') == 'administrador') {
        $this->db->trans_begin();
        $this->db->query('delete from RREO where id_rreo = '. $id);
      

       if ($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
		   redirect('rreo/6');
       } else {
        $this->db->trans_commit();
          redirect('rreo/3');

       }
		}
    }

    public function alterar($id) {

       
        $data['rreo'] = $this->db->query('select * from RREO where id_rreo ='.$id)->result();


        $this->load->view('includes/import');
			if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
			}else{
              $this->load->view('includes/menu'); 
			}
        $this->load->view('includes/header');
        $this->load->view('rreo/alterar', $data);
        $this->load->view('includes/footer');
    }

    public function update() {
       $data['descricao'] = $this->input->post('descricao');
		$data['data'] = $this->input->post('ano');
		$data['orgao_publicacao'] = $this->input->post('orgao_publicacao');
			$this->db->where('id_rreo', $this->input->post('iduser'));
        if ($this->db->update('RREO', $data)) {
            redirect('rreo/2');
        } else {
            echo $this->input->post('iduser');
        }
    }



}
