<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia extends CI_Controller {

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
            $data['msg'] = "usuario ja existe!";
            $this->load->view('includes/msg_danger', $data);
        }

        $this->load->model('noticia_model');
        $dados['data'] = $this->noticia_model->getall();

        $this->load->view('noticia/view', $dados);
        $this->load->view('includes/footer');
    }

    public function cadastro() {
		$this->load->model('validalogin');
        $this->validalogin->valida();
		
		$data['cat']=$this->db->query('select * from categorias')->result();
        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } if ($this->session->userdata('permissao') == 'editor') {
				$this->load->view('includes/menu');
			} if ($this->session->userdata('permissao') == 'colaborador') {
				redirect(site_url('home'));
			}
        $this->load->view('noticia/cadastro', $data);
        $this->load->view('includes/footer');
    }

    public function salvar() {
		$this->load->model('validalogin');
        $this->validalogin->valida();

        if (isset($_POST['destaque'])) {
            $d = "1";
        } else {
            $d = "0";
        }


        $data['titulo'] = $this->input->post('titulo');
		$data['subtitulo'] = $this->input->post('subtitulo');
        $data['conteudo'] = $this->input->post('descricao');
        $data['destaque'] = $d;
        $data['entidade'] = $this->session->userdata('entidade');
        $data['autor'] = 'Prefeitura';
		$data['categoria'] = $this->input->post('categoria');

        date_default_timezone_set('America/Sao_Paulo');

        $data['data'] = date('Y-m-d H:i');
        ;


        $this->load->model('noticia_model');
        if ($this->noticia_model->set($data)) {

            redirect(site_url('noticia/1'));
        } else {
            redirect(site_url('noticia/6'));
        }
    }

    public function apagar($id) {
		$this->load->model('validalogin');
        $this->validalogin->valida();

		if ($this->session->userdata('permissao')) {
        $cat = "noticias";
        $query = $this->db->get_where($cat, array('id' => $id));
        foreach ($query->result() as $row) {
            $file = "uploads/$cat/" . $row->img;
            if (is_file($file)) {
                if (is_readable($file) && unlink($file)) {
                    if ($this->db->delete($cat, array('id' => $id))) {
                        redirect('noticia/3');
                    }
                } else {
                    redirect(site_url('noticia/3'));
                }
            } else {
                if ($this->db->delete($cat, array('id' => $id))) {
                    redirect(site_url('noticia/3'));
                }
            }
        }
		}
    }

    public function alterar($id) {
$this->load->model('validalogin');
        $this->validalogin->valida();
		
        $this->load->model('noticia_model');
        $data['noticia'] = $this->db->query('select * from noticias where id = '.$id)->result();
		$data['cat']=$this->db->query('select * from categorias')->result();


        $this->load->view('includes/import');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } if ($this->session->userdata('permissao') == 'editor') {
				$this->load->view('includes/menu');
			} if ($this->session->userdata('permissao') == 'colaborador') {
				redirect(site_url('home'));
			}
        $this->load->view('includes/header');
        $this->load->view('noticia/alterar', $data);
        $this->load->view('includes/footer');
    }

    public function update() {
		$this->load->model('validalogin');
        $this->validalogin->valida();

		
        if (isset($_POST['destaque'])) {
            $d = "1";
        } else {
            $d = "0";
        }
		$data['subtitulo'] = $this->input->post('subtitulo');
        $data['titulo'] = $this->input->post('titulo');
        $data['conteudo'] = $this->input->post('descricao');
        $data['destaque'] = $d;
		$data['categoria'] = $this->input->post('categoria');
		$id = $this->input->post('iduser');
	

        $this->db->where('id', $id);
        if ($this->db->update('noticias', $data)) {
            redirect(site_url('noticia/2'));
        } else {
            echo $this->input->post('iduser');
        }
    }

    public function updateimg() {
		$this->load->model('validalogin');
        $this->validalogin->valida();
		
        $this->load->model('noticia_model');
        if ($this->noticia_model->update_img($this->input->post('iduser'))) {
            redirect(site_url('noticia/2'));
        } else {
            echo $this->input->post('iduser');
        }
    }

    public function getall() {

  header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $query = $this->noticia_model->getall();
        echo json_encode($query);
    }

}
