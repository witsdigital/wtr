<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Licitacao extends CI_Controller {

    public function index($indice = NULL) {

        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
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
        if ($indice == 9) {
            $data['msg'] = "Já existe lancamentos para o mês em questão!";
            $this->load->view('includes/msg_danger', $data);
        }

        $this->db->from('licitacao lc, modalidade_licitacao ml, unidade_gestora ug');
            $this->db->where('lc.modalidade = ml.id_modalidade_licitacao');
            $this->db->where('lc.cod_unidade = ug.id_unidade_gestora');
        $dados['data'] = $this->db->get()->result();

        $this->load->view('licitacao/exibir', $dados);
        $this->load->view('includes/footer');
    }

    public function cadastro() {

        ini_set('default_charset', 'UTF-8');

        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            redirect(site_url('home'));
        }
        $this->load->view('licitacao/cadastro');
        $this->load->view('includes/footer');
    }

    public function cadastroVencedor($indice = null) {
         if ($indice == 1) {
            $data['msg'] = "Dados cadastrados com sucesso!";
            $this->load->view('includes/msg_success', $data);
        }

        ini_set('default_charset', 'UTF-8');

        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            redirect(site_url('home'));
        }
        $this->load->view('licitacao/cadastroVencedor');
        $this->load->view('includes/footer');
    }

    public function apagar($id = null) {

        if ($this->session->userdata('permissao') == 'administrador') {
            if ($this->db->query('delete from licitacao where id_licitacao = ' . $id)) {
                redirect(site_url('licitacao/3'));
            } else {
                echo 'erro';
            }
        } else {
            echo 'erro';
        }
    }

    public function salvar() {
        ini_set('default_charset', 'UTF-8');
        date_default_timezone_set('America/Sao_Paulo');


        $dados['modalidade'] = $this->input->post('modalidade');
        $dados['cod_licitacao'] = $this->input->post('cod_licitacao');
        $dados['objeto'] = $this->input->post('objeto');
        $dados['razao_social_vencedor'] = $this->input->post('razao_social_vencedor');
        $dados['cnpj_vencedor'] = $this->input->post('cnpj_vencedor');
        $dados['valor'] = $this->input->post('valor');
        $dados['informe_homologacao'] = $this->input->post('informe_homologacao');
        $dados['numero_processo_adm'] = $this->input->post('numero_processo_adm');
        $dados['data_publicacao'] = $this->converteData($this->input->post('data_publicacao'));
        $dados['url_edital'] = $this->input->post('url_edital');
        $dados['numero_edital'] = $this->input->post('numero_edital');
        $dados['numero_contrato'] = $this->input->post('numero_contrato');
        $dados['url_contrato'] = $this->input->post('url_contrato');
        $dados['data_limite'] = $this->converteData($this->input->post('data_limite'));
        $dados['data_abertura'] = $this->converteData($this->input->post('data_abertura'));
        $dados['horario'] = $this->input->post('horario');
        $dados['status_licitacao'] = $this->input->post('status');
        $dados['cod_unidade'] = $this->input->post('cod_unidade');
		
		
		if (isset($_FILES['aviso']) && $_FILES['aviso']['name'] != ''){
			$dados['aviso']  = $this->up_multi_img($_FILES['aviso']);
		}
		if (isset($_FILES['adjudicacao']) && $_FILES['adjudicacao']['name'] != ''){
			$dados['adjudicacao']  = $this->up_multi_img($_FILES['adjudicacao']);
		}
		if (isset($_FILES['edital']) && $_FILES['edital']['name'] != ''){
			$dados['edital']  = $this->up_multi_img($_FILES['edital']);
		}
		if (isset($_FILES['contrato']) && $_FILES['contrato']['name'] != ''){
			$dados['contrato']  = $this->up_multi_img($_FILES['contrato']);
		}
		if (isset($_FILES['extrato']) && $_FILES['extrato']['name'] != ''){
			$dados['extrato']  = $this->up_multi_img($_FILES['extrato']);
		}


        if ($this->db->insert('licitacao', $dados)) {
            redirect(site_url('licitacao/1'));
        }

  
    }
	
public function up_multi_img($file) {
             
            $numFile = count(array_filter($file['name']));

            if (is_dir("uploads/licitacao")) {
                $dir = 'uploads/licitacao';
            } else {
                mkdir("uploads/licitacao", 0777, true);
                $dir = 'uploads/licitacao';
            }

    
                for ($i = 0; $i < $numFile; $i++) {
    
                    $name = rand(0, 999999999).md5(rand(0,99999999)).$file['name'][$i];
                    $type = $file['type'][$i];
                    $size = $file['size'][$i];
                    $error = $file['error'][$i];
                    $tmp = $file['tmp_name'][$i];
                    $tiposPermitidos = array('application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf');
                    // $tiposPermitidos = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');
    
                    if ($error != 0) {
                        $msg[] = "<b> $name : </b>" . $error[$erromsg];
                    }
                    if (array_search($type, $tiposPermitidos) === false) {
    
                        redirect('index.php/publicacoes/cadastro/5');
                        // Não houveram erros, move o arquivo
                    } else {
    
                        if (move_uploaded_file($tmp, $dir . "/" . $name)) {
                            return $name;
                        } else {
                            $msg[] = "<b> $name : </b> ocorreu erro";
                        }
                    }
                }
            
        }
	
public function salvar_doc($file){
	$nome = rand(99, 999999999).md5(rand(0, 9999999999999999)).'.pdf';
     $curriculo    = $file;
     $configuracao = array(
         'upload_path'   => '.uploads/licitacao/',
         'file_name'     => $nome
     );      
     $this->load->library('upload');
     $this->upload->initialize($configuracao);
     if ($this->upload->do_upload($curriculo['name']))
         return $nome;
     else
         echo $this->upload->display_errors();
}

    public function salvarVencedor() {
        ini_set('default_charset', 'UTF-8');
        date_default_timezone_set('America/Sao_Paulo');


        $dados['cod_licitacao'] = $this->input->post('cod_licitacao');
        $dados['cod_contrato'] = $this->input->post('cod_contrato');
        $dados['valor'] = $this->input->post('valor_contrato');
        $dados['nome'] = $this->input->post('nome');
        $dados['doc'] = $this->input->post('doc');
        
       

        if ($this->db->insert('vencedor_licitacao', $dados)) {
            redirect(site_url('licitacao/cadastroVencedor/1'));
        }

  
    }
    
    public function alterar($id) {


$data['licitacao'] = $this->db->query('select * from licitacao where id_licitacao ='.$id)->result();


$this->load->view('includes/import');
	if($this->session->userdata('permissao') == 'administrador'){
	 $this->load->view('includes/menu_admin');  
	}else{
	  redirect(site_url('home'));
	}
$this->load->view('includes/header');
$this->load->view('licitacao/alterar', $data);
$this->load->view('includes/footer');
}


public function update(){
      $dados['modalidade'] = $this->input->post('modalidade');
        $dados['cod_licitacao'] = $this->input->post('cod_licitacao');
        $dados['objeto'] = $this->input->post('objeto');
        $dados['razao_social_vencedor'] = $this->input->post('razao_social_vencedor');
        $dados['cnpj_vencedor'] = $this->input->post('cnpj_vencedor');
        $dados['valor'] = $this->input->post('valor');
        $dados['informe_homologacao'] = $this->input->post('informe_homologacao');
        $dados['numero_processo_adm'] = $this->input->post('numero_processo_adm');
        $dados['data_publicacao'] = $this->converteData($this->input->post('data_publicacao'));
        $dados['url_edital'] = $this->input->post('url_edital');
        $dados['numero_edital'] = $this->input->post('numero_edital');
        $dados['numero_contrato'] = $this->input->post('numero_contrato');
        $dados['url_contrato'] = $this->input->post('url_contrato');
        $dados['data_limite'] = $this->converteData($this->input->post('data_limite'));
        $dados['data_abertura'] = $this->converteData($this->input->post('data_abertura'));
        $dados['horario'] = $this->input->post('horario');
        $dados['status_licitacao'] = $this->input->post('status');
        $dados['cod_unidade'] = $this->input->post('cod_unidade');
		
		if (isset($_FILES['aviso']) && $_FILES['aviso']['name'] != ''){
			$dados['aviso']  = $this->up_multi_img($_FILES['aviso']);
		}
		if (isset($_FILES['adjudicacao']) && $_FILES['adjudicacao']['name'] != ''){
			$dados['adjudicacao']  = $this->up_multi_img($_FILES['adjudicacao']);
		}
		if (isset($_FILES['edital']) && $_FILES['edital']['name'] != ''){
			$dados['edital']  = $this->up_multi_img($_FILES['edital']);
		}
		if (isset($_FILES['contrato']) && $_FILES['contrato']['name'] != ''){
			$dados['contrato']  = $this->up_multi_img($_FILES['contrato']);
		}
		if (isset($_FILES['extrato']) && $_FILES['extrato']['name'] != ''){
			$dados['extrato']  = $this->up_multi_img($_FILES['extrato']);
		}

        
        
        		$this->db->where('id_licitacao', $this->input->post('iduser'));
        if ($this->db->update('licitacao', $dados)) {
            redirect(site_url('licitacao/2'));
        } else {
            echo $this->input->post('iduser');
        }
        
        
}
    
    public function converteData($data=null){
        
        $dt = str_replace("/", "-", $data);
$datacad = date('Y-m-d', strtotime($dt));
return $datacad;
        
    }

}
