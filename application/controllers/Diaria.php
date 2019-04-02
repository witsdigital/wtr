<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Diaria extends CI_Controller {

    public function index($indice = NULL) {

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
            $data['msg'] = "usuario ja existe!";
            $this->load->view('includes/msg_danger', $data);
        }
        if ($indice == 9) {
            $data['msg'] = "Já existe lancamentos para o mês em questão!";
            $this->load->view('includes/msg_danger', $data);
        }

        $this->load->model('um3um_model');
        $dados['data'] = $this->db->get('diarias')->result();

        $this->load->view('diarias/exibir', $dados);
        $this->load->view('includes/footer');
    }

   

    public function cadastro() {

        ini_set('default_charset', 'UTF-8');

        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            redirect (site_url('home'));
        }
        $this->load->view('diarias/cadastro');
        $this->load->view('includes/footer');
    }
    
    
    
     public function apagar($id = null) {

        if ($this->session->userdata('permissao') == 'administrador') {
            if($this->db->query('delete from dados_131 where id = '.$id)){
                 redirect(site_url('Um3Um/3'));
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

        header('Content-Type: text/html; charset=iso-8859-1');

        $entidade = $this->session->userdata('entidade');

        ini_set("memory_limit", "500M");
        set_time_limit(120);
        ini_set('max_input_nesting_level', 999);

         $competencia = $this->input->post('competencia');
        $ano = $this->input->post('ano');
        $arquivo = $_FILES["arquivo"]["tmp_name"];
        $arquivo = file($arquivo); //abre o arquivo
        $total = count($arquivo);
       
       
         for ($i = 1; $i < $total - 1; $i++) {

                    header('Content-Type: text/html; charset=iso-8859-1');
                
                  $query['unidade'] = substr($arquivo[$i], 1, 4);
                  $query['cod_unidade_orcamentaria'] = substr($arquivo[$i], 5, 4);
                  $query['empenho'] = substr($arquivo[$i], 9, 10);
                  $query['dt_pagamento_empenho'] = substr($arquivo[$i], 19, 8);
                  $query['matricula'] = substr($arquivo[$i], 27, 10);
                  $query['ano'] =  $ano ;
                  $query['nome'] = utf8_encode(substr($arquivo[$i], 41, 50));
                  $query['objetivo'] =  utf8_encode(substr($arquivo[$i], 191, 200));
                  $query['dt_saida'] = substr($arquivo[$i], 391, 9);
                  $query['dt_retorno'] = substr($arquivo[$i], 404, 9);
                  $query['qtd_diarias'] = substr($arquivo[$i], 417, 3);
                  $query['valor_total'] = substr($arquivo[$i], 420, 16);
                   $query['competencia'] = $competencia;
           
                  
             
                  

                    $this->db->insert('diarias', $query);
                }
                
                
         redirect(site_url('Diaria/1'));
       
    }

   


}
