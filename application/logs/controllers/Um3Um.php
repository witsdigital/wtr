<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Um3Um extends CI_Controller {

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
         if ($indice == 9) {
            $data['msg'] = "Já existe lancamentos para o mês em questão!";
            $this->load->view('includes/msg_danger', $data);
        }

        $this->load->model('um3um_model');
        $dados['data'] = $this->um3um_model->getall();

        $this->load->view('131/view', $dados);
        $this->load->view('includes/footer');
    }

    public function cadastro() {

 ini_set('default_charset','UTF-8');

        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            $this->load->view('includes/menu');
        }
        $this->load->view('131/cadastro');
        $this->load->view('includes/footer');
    }
    
    
     public function visualizar($id,$tipo) {
           $this->load->view('includes/import');
         
      


        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            $this->load->view('includes/menu');
        }
       
           $this->load->model('um3um_model');
        $data['data'] = $this->um3um_model->getid($id,$tipo);

        $this->load->view('131/view_'.$tipo, $data);
        $this->load->view('includes/footer');
    }
    
    
    
    public function step2() {



        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            $this->load->view('includes/menu');
        }
        
        
        $this->load->view('131/cadastro2');
        $this->load->view('includes/footer');
    }

    public function salvar() {
         ini_set('default_charset','UTF-8');
         date_default_timezone_set('America/Sao_Paulo');
         
        
        
        $entidade = $this->session->userdata('entidade');

        ini_set("memory_limit", "500M");
      set_time_limit(120);
        ini_set('max_input_nesting_level', 999);


        $arquivo = $_FILES["arquivo"]["tmp_name"];
        $arquivo = file($arquivo); //abre o arquivo
        $total = count($arquivo);
        $tp = substr($arquivo[0], 1, 3);
         $ms = substr($arquivo[1], 34, 2);
         $cod = $tp.$ms.date("His"); 
        $this->db->where('competencia',$ms);
          $this->db->where('entidade',  $this->session->userdata('entidade'));
          $consult= $this->db->get('dados_131');
          if ($consult->num_rows() > 0){
              redirect('Um3Um/9');
              
          }
         
          
         
        for ($i = 1; $i < $total - 1; $i++) {


            $codigo = substr($arquivo[$i], 0, 1);
            $unidade = substr($arquivo[$i], 1, 20);
            $data = substr($arquivo[$i], 21, 10);
            $data2 = substr($arquivo[$i], 31, 10);
            $tipo = substr($arquivo[$i], 41, 3);
            $processoadm = substr($arquivo[$i], 44, 30);
            $nprocesso = substr($arquivo[$i], 74, 30);
            $modalidade = substr($arquivo[$i], 45, 3);
            $descricao = substr($arquivo[$i], 104, 1000);
            $credor = substr($arquivo[$i], 1104, 150);
            $doc = substr($arquivo[$i], 1254, 18);
 
            $valor = substr($arquivo[$i], 1272, 21);
            $funcao = substr($arquivo[$i], 1293, 150);
            $subfuncao = substr($arquivo[$i], 1443, 150);
            $natureza = substr($arquivo[$i], 1593, 150);
            $fonte = substr($arquivo[$i], 1743, 150);
            $empenho = substr($arquivo[$i], 1893, 30);
            $pro3 = substr($arquivo[$i], 1923, 30);

            $query['codigo'] = $codigo;
            $query['unid_orc'] = $unidade;
            $query['datapublicacao'] = $unidade;
            $query['data_mov'] = $data2;
            $query['tipo'] = $tipo;
            $query['num_pro_ad'] = $processoadm;
            $query['num_pro_lict'] = $nprocesso;
            $query['bem_servico'] = $descricao;
              $credor= utf8_encode($credor);
            
            $query['credor'] = $credor;
            $query['doc'] = $doc;
            $query['valor'] = $valor;
            $query['funcao'] = $funcao;
            $query['sub_funcao'] = $subfuncao;
            $query['natureza'] = $natureza;
            $query['fonte'] = $fonte;
            $query['empenho'] = $empenho;
            $query['processo_contratacao'] = $pro3;
            $query['entidade'] = $entidade;
            $query['competencia'] = $ms;
            $query['cod'] = $cod;
            
            
            $this->db->insert('131_despesa_dados', $query);
           
        }
        
        $qy['entidade'] = $entidade;
        $qy['cod'] = $cod;
          $qy['arquivo'] = substr($arquivo[0], 1, 7);
        $qy['usuario'] = $this->session->userdata('nome');
        $qy['data_envio'] = date("Y-m-d");
        $qy['hora_envio'] = date("H:i:s");
         $qy['competencia'] = $ms;
        
       if( $this->db->insert('dados_131', $qy)){
             redirect('Um3Um/step2');
       }



       
    }
     public function salvarreceita() {
          ini_set('default_charset','UTF-8');
         date_default_timezone_set('America/Sao_Paulo');
         
        
        
        $entidade = $this->session->userdata('entidade');

        ini_set("memory_limit", "500M");
      set_time_limit(120);
        ini_set('max_input_nesting_level', 999);


        $arquivo = $_FILES["arquivo"]["tmp_name"];
        $arquivo = file($arquivo); //abre o arquivo
        $total = count($arquivo);
        $tp = substr($arquivo[0], 1, 3);
         $ms = substr($arquivo[1], 34, 2);
        $cod = $tp.$ms.date("His"); 
        for ($i = 1; $i < $total - 1; $i++) {


          $codigo = substr($arquivo[$i], 0, 1);
	$unidade = substr($arquivo[$i], 2, 21);
	$data = substr($arquivo[$i], 22, 10);
	$data2 = substr($arquivo[$i], 31, 10);
	$etapa = substr($arquivo[$i], 41, 4);
	$modalidade = substr($arquivo[$i], 45, 3);
	$descricao = substr($arquivo[$i], 48, 1000);
	$valor = substr($arquivo[$i], 1048, 21);
	$fonte = substr($arquivo[$i], 1069, 150);
	$natureza = substr($arquivo[$i], 1219, 150);
	$destino = substr($arquivo[$i], 1369, 150);

            $query['codigo'] = $codigo;
            $query['unidade_gestora'] = $unidade;
            $query['data_publicacao'] = $data;
            $query['data_registro'] = $data2;
            $query['tipo'] = $etapa;
            $query['modalidade'] = $modalidade;
            $query['descricao'] = $descricao;
            $query['valor'] = $valor;
            $query['fonte_recurso'] = $fonte;
            
            
            
            $natureza= utf8_encode($natureza);
            $query['natureza'] = $natureza;
          
            $query['destinacao'] = $destino;
             $query['entidade'] = $entidade;
            
            $query['competencia'] = $ms;
            $query['cod'] = $cod;
            
            
         
            
            
            $this->db->insert('131_receita_dados', $query);
           
        }
        
        $qy['entidade'] = $entidade;
        $qy['cod'] = $cod;
          $qy['arquivo'] = substr($arquivo[0], 1, 7);
        $qy['usuario'] = $this->session->userdata('nome');
        $qy['data_envio'] = date("Y-m-d");
        $qy['hora_envio'] = date("H:i:s");
        $qy['competencia'] = $ms;
        
        
        
       if( $this->db->insert('dados_131', $qy)){
             redirect('Um3Um');
       }



       
    }
    public function alterarreceita($cod,$id) {
       
        
        $this->db->where('cod', $cod);
         $this->db->where('id', $id);
        $this->db->where('entidade',  $this->session->userdata('entidade'));
        
        $data['dados'] = $this->db->get('131_receita_dados')->result();
        
        $this->load->view('includes/import');
        $this->load->view('includes/header');
           if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
      }else{
              $this->load->view('includes/menu'); 
        }
        $this->load->view('131/alterar_rec', $data);
        $this->load->view('includes/footer');
    }
    public function updatereceita(){
        $data['valor'] = $this->input->post('valor');
         $data['data_registro'] = $this->input->post('data');
                 $data['natureza'] = $this->input->post('natureza');
                 $id = $this->input->post('id');
                 $cod = $this->input->post('cod');
                 $this->db->where('id', $id);
                    $this->db->where('cod', $cod);
            $this->db->update('131_receita_dados', $data);
            redirect('Um3Um');
    }

}
