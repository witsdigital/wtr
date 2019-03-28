<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tv_camara extends CI_Controller {

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

        $this->load->model('tv_camara_model');
        $dados['data'] = $this->tv_camara_model->getall();

        $this->load->view('tv_camara/view', $dados);
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
        $this->load->view('tv_camara/cadastro');
        $this->load->view('includes/footer');
    }

    public function salvar() {
        if (isset($_POST['destaque'])) {
            $d = "1";
        } else {
            $d = "0";
        }


        $data['titulo'] = $this->input->post('titulo');
        $data['link_video'] = $this->input->post('video');
		
		

        $string1 = str_replace('www', 'img', $data['link_video']);
        $string1 = str_replace('watch?v=', 'vi/', $string1 );
        $string1 = str_replace('embed', 'vi', $string1);
		$string1 = str_replace('//m.', '//img.', $string1);
        $string1 = $string1."/hqdefault.jpg";
        $data['link_img'] = $string1;
        $data['entidade'] = 7;


        $this->load->model('tv_camara_model');
        if ($this->tv_camara_model->set($data)) {

            redirect('tv_camara/');
        } else {
            redirect('tv_camara/');
        }
    }

    public function apagar($id) {
        $cat = "tv_camara";
        $query = $this->db->get_where($cat, array('id' => $id));
        foreach ($query->result() as $row) {
            $file = "uploads/$cat/" . $row->img;
            if (is_file($file)) {
                if (is_readable($file) && unlink($file)) {
                    if ($this->db->delete($cat, array('id' => $id))) {
                        redirect('tv_camara/');
                    }
                } else {
                    redirect('tv_camara/');
                }
            } else {
                if ($this->db->delete($cat, array('id' => $id))) {
                    redirect('tv_camara/');
                }
            }
        }
    }

    public function alterar($id) {
        $this->load->model('tv_camara_model');
        $data['video'] = $this->tv_camara_model->getid($id);


        $this->load->view('includes/import');
           if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
      }else{
              $this->load->view('includes/menu'); 
        }
        $this->load->view('includes/header');
        $this->load->view('tv_camara/alterar', $data);
        $this->load->view('includes/footer');
    }

    public function update() {
        if (isset($_POST['destaque'])) {
            $d = "1";
        } else {
            $d = "0";
        }
        $data['titulo'] = $this->input->post('titulo');
        $data['link_video'] = $this->input->post('video');

        $string1 = str_replace('www', 'img', $data['link_video']);
        $string1 = str_replace('watch?v=', 'vi/', $string1 );
        $string1 = str_replace('embed', 'vi', $string1);
        $string1 = $string1."/hqdefault.jpg";
        $data['link_img'] = $string1;
        $data['entidade'] = 7;
        

        $this->load->model('tv_camara_model');
        if ($this->tv_camara_model->update($data, $this->input->post('iduser'))) {
            redirect('tv_camara/');
        } else {
            echo $this->input->post('iduser');
        }
    }

    public function updateimg() {



        $this->load->model('noticia_model');
        if ($this->noticia_model->update_img($this->input->post('iduser'))) {
            redirect('noticia/2');
        } else {
            echo $this->input->post('iduser');
        }
    }

}
