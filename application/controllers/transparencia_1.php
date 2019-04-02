<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transparencia extends CI_Controller {

    public function index() {

		$this->session->unset_userdata('pesquisa');
		
        $this->load->model('publicacoes_portal');

        $this->load->library('pagination');
        $config = array(
            "base_url" => base_url('portal/publicacoes/'),
            "per_page" => 8,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->publicacoes_portal->CountAll(),
            "full_tag_open" => "<ul class='pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => "←",
            "prev_tag_open" => "<li class='prev'>",
            "prev_tag_close" => "</li>",
            "next_link" => "→",
            "next_tag_open" => "<li class='next'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='active'><a href='#'>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li>",
            "num_tag_close" => "</li>"
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 


        $data['publicadas'] = $this->publicacoes_portal->Getpublicaportal('id', 'desc', $config['per_page'], $offset);


        $this->load->view('transparencia/includes/imports');
        $this->load->view('transparencia/includes/header', $data);
        $this->load->view('transparencia/publicacoes', $data);
          $this->load->view('transparencia/includes/footer');
    }
	
	public function sic($conf = null, $chave=null) {
		
		$data['mensagem'] = null;
		
		if($conf==1){
			$data['mensagem'] = "<h2 style='color:green;'>Solicitação enviado com sucesso. Sua chave para consulta é: ".$chave.". Uma copia da chave de segurança foi enviada para seu email.</h2>";
		}
		if($conf==2){
			$data['mensagem'] = "<h2 style='color:red;'>Não foi possivel enviar a solicitação, tente novamente mais tarde</h2>";
		}
		
		if($conf==4){
			$data['mensagem'] = "<h2 style='color:red;'>Não foi possivel enviar a solicitação, escolha pelo menos um arquivo</h2>";
		}
		
	
        $this->load->view('transparencia/includes/imports');
        $this->load->view('/transparencia/includes/header');
        $this->load->view('transparencia/sic', $data);
        $this->load->view('transparencia/includes/footer');
    }


    public function testprint(){


  

        require_once('vendor/autoload.php');

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Hello world!</h1>');
        $mpdf->Output();
    }
	
	public function consultar_sic() {
		
		$data['mensagem'] = null;
		$data['dados'] = [];
		if(isset($_POST["cpf"]) and isset($_POST["chave"])){
			$cpf = $_POST["cpf"];
			$chave = $_POST["chave"];
			$data['dados'] = $this->db->query('select * from sic where cpf = "'.$cpf.'" and chave = '.$chave)->result();
			if(count($data['dados'])==0){
				$data['mensagem'] = "Desculpe, nenhuma informação encontrada. Verifique o numero de CPF e a chave de segurança";
			}
		}
		
	
	
	
        $this->load->view('transparencia/includes/imports');
        $this->load->view('/transparencia/includes/header');
        $this->load->view('transparencia/consultarsic', $data);
        $this->load->view('transparencia/includes/footer');
    }
	
	
	
	public function solicitar_sic($conf = null, $chave=null) {
		
		$data['mensagem'] = null;
		
		if($conf==1){
			$data['mensagem'] = "<h2 style='color:green;'>Solicitação enviado com sucesso. Sua chave para consulta é: ".$chave." <h2>";
		}
		if($conf==2){
			$data['mensagem'] = "<h2 style='color:red;'>Não foi possivel enviar a solicitação, tente novamente mais tarde<h2>";
		}
		
		if($conf==4){
			$data['mensagem'] = "<h2 style='color:red;'>Não foi possivel enviar a solicitação, escolha pelo menos um arquivo<h2>";
		}
		
		$data['estados'] = $this->db->query('select * from estado order by uf')->result();
		$data['secretarias'] = $this->db->query('select * from secretarias order by titulo')->result();
        $this->load->view('transparencia/includes/imports');
        $this->load->view('/transparencia/includes/header');
        $this->load->view('transparencia/solicitarsic', $data);
        $this->load->view('transparencia/includes/footer');
    }
	
	public function up_multi_img($id) {
    
    
            $file = $_FILES['ar'];
            $numFile = count(array_filter($file['name']));
    
    
    
    
            if (is_dir("uploads/sic")) {
                $dir = 'uploads/sic';
            } else {
                mkdir("uploads/sic", 0777, true);
                $dir = 'uploads/sic';
            }
    
    
    
            // fim diretorio
    
            if ($numFile <= 0) {
                
            } else {
    
                for ($i = 0; $i < $numFile; $i++) {
    
                    $name = $file['name'][$i];
                    $size = $file['size'][$i];
                    $error = $file['error'][$i];
                    $tmp = $file['tmp_name'][$i];
					
					move_uploaded_file($tmp, $dir . "/" . $name);
                    $obj['url'] = base_url(). $dir.'/'.$name;
                    $obj['cod_sic'] = $id;
                    $this->db->insert('arquivos_sic', $obj);
                      
                  
    
                        
                    
                }return $id;
            }
        }
	
		
	public function getmunicipios(){
        $id = $this->input->post('id');
        if($id){
            $municipio = $this->db->query('select * from cidade where estado = '.$id. ' order by nome')->result();;
        }
        echo json_encode($municipio);
    }
	
	public function nfe() {

        $this->load->view('transparencia/includes/imports');
        $this->load->view('/transparencia/includes/header');
        $this->load->view('transparencia/sic');
        $this->load->view('transparencia/includes/footer');
    }
	
	
    public function diario() {

        $this->session->unset_userdata('pesquisa');
		
        $query = $this->db->query('select * from diario_oficial where status = 1')->result();

        $this->load->library('pagination');
        $config = array(
            "base_url" => base_url('transparencia/diario/'),
            "per_page" => 8,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => count($query),
            "full_tag_open" => "<ul class='pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => "←",
            "prev_tag_open" => "<li class='prev'>",
            "prev_tag_close" => "</li>",
            "next_link" => "→",
            "next_tag_open" => "<li class='next'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='active'><a href='#'>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li>",
            "num_tag_close" => "</li>"
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 

		$data['diario_oficial']  = $this->db->query('select * from diario_oficial where status = 1 order by edicao desc limit '.$config['per_page'].' offset '.$offset)->result();
        
        $this->load->view('transparencia/includes/imports');
        $this->load->view('transparencia/includes/header', $data);
        $this->load->view('transparencia/diario', $data);
        $this->load->view('transparencia/includes/footer');
    
    }
	
	
	

    public function receitas() {

        $this->session->unset_userdata('pesquisa');
		
        $this->load->model('um3um_model');

        $this->load->library('pagination');
        $config = array(
            "base_url" => base_url('transparencia/receitas/'),
            "per_page" => 8,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->um3um_model->CountAll(),
            "full_tag_open" => "<ul class='pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => "←",
            "prev_tag_open" => "<li class='prev'>",
            "prev_tag_close" => "</li>",
            "next_link" => "→",
            "next_tag_open" => "<li class='next'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='active'><a href='#'>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li>",
            "num_tag_close" => "</li>"
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 


        $data['despesas'] = $this->um3um_model->geReceitaPortal('id', 'desc', $config['per_page'], $offset);
        $this->load->view('transparencia/includes/imports');
        $this->load->view('transparencia/includes/header', $data);
        $this->load->view('transparencia/receitas', $data);
        $this->load->view('transparencia/includes/footer');
    }
    public function filtrarreceita() {

        $filtro['ano'] =  $this->input->post('ano');
        $filtro['credor'] =  $this->input->post('credor');
        $filtro['key'] =  $this->input->post('key');
        $filtro['competencia1'] =  $this->input->post('competencia1');
        $filtro['tipo'] =  $this->input->post('tipo');


     

        $this->session->unset_userdata('pesquisa');
		
        $this->load->model('um3um_model');

        $this->load->library('pagination');
        $config = array(
            "base_url" => base_url('transparencia/filtrarreceita/'),
            "per_page" => 10,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->um3um_model->CountAll(),
            "full_tag_open" => "<ul class='pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => "←",
            "prev_tag_open" => "<li class='prev'>",
            "prev_tag_close" => "</li>",
            "next_link" => "→",
            "next_tag_open" => "<li class='next'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='active'><a href='#'>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li>",
            "num_tag_close" => "</li>"
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 


        $data['despesas'] = $this->um3um_model->geReceitaPortalFilter('id', 'desc', $filtro, $config['per_page'], $offset);
		$this->load->view('transparencia/includes/imports');
			$this->load->view('transparencia/includes/header', $data);
			$this->load->view('transparencia/receitas', $data);
			$this->load->view('transparencia/includes/footer');
    
    }
    public function despesas() {

        $this->session->unset_userdata('pesquisa');
		
        $this->load->model('um3um_model');

        $this->load->library('pagination');
        $config = array(
            "base_url" => base_url('transparencia/despesas/'),
            "per_page" => 8,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->um3um_model->CountAllDesp(),
            "full_tag_open" => "<ul class='pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => "←",
            "prev_tag_open" => "<li class='prev'>",
            "prev_tag_close" => "</li>",
            "next_link" => "→",
            "next_tag_open" => "<li class='next'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='active'><a href='#'>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li>",
            "num_tag_close" => "</li>"
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 


        $data['despesas'] = $this->um3um_model->geDespesasPortal('id', 'desc', $config['per_page'], $offset);
        $this->load->view('transparencia/includes/imports');
        $this->load->view('transparencia/includes/header', $data);
        $this->load->view('transparencia/despesas', $data);
        $this->load->view('transparencia/includes/footer');
    }
    public function filtrardespesa() {

        $filtro['ano'] =  $this->input->post('ano');
        $filtro['credor'] =  $this->input->post('credor');
        $filtro['key'] =  $this->input->post('key');
        $filtro['competencia1'] =  $this->input->post('competencia1');
        $filtro['tipo'] =  $this->input->post('tipo');


     

        $this->session->unset_userdata('pesquisa');
		
        $this->load->model('um3um_model');

        $this->load->library('pagination');
        $config = array(
            "base_url" => base_url('transparencia/filtrardespesa/'),
            "per_page" => 10,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->um3um_model->CountAll(),
            "full_tag_open" => "<ul class='pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => "←",
            "prev_tag_open" => "<li class='prev'>",
            "prev_tag_close" => "</li>",
            "next_link" => "→",
            "next_tag_open" => "<li class='next'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='active'><a href='#'>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li>",
            "num_tag_close" => "</li>"
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 


        $data['despesas'] = $this->um3um_model->geDespesasPortalFilter('id', 'desc', $filtro, $config['per_page'], $offset);
		$this->load->view('transparencia/includes/imports');
			$this->load->view('transparencia/includes/header', $data);
			$this->load->view('transparencia/despesas', $data);
			$this->load->view('transparencia/includes/footer');
    
    }
    public function publicacoes() {

		$this->session->unset_userdata('pesquisa');
		
        $this->load->model('publicacoes_portal');

        $this->load->library('pagination');
        $config = array(
            "base_url" => base_url('portal/publicacoes/'),
            "per_page" => 8,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->publicacoes_portal->CountAll(),
            "full_tag_open" => "<ul class='pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => "←",
            "prev_tag_open" => "<li class='prev'>",
            "prev_tag_close" => "</li>",
            "next_link" => "→",
            "next_tag_open" => "<li class='next'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='active'><a href='#'>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li>",
            "num_tag_close" => "</li>"
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 


        $data['publicadas'] = $this->publicacoes_portal->Getpublicaportal('id', 'desc', $config['per_page'], $offset);


        $this->load->view('transparencia/includes/imports');
        $this->load->view('transparencia/includes/header', $data);
        $this->load->view('transparencia/publicacoes', $data);
        $this->load->view('transparencia/includes/footer');
    }
	
	
	public function pesquisapublicacoes() {

        $data['entidade'] = 'condeuba';
        $entidade = "7";
        $this->load->model('publicacoes_portal');

        $this->load->library('pagination');
		
		if(isset($_GET['txt_busca'])){
			 $pesquisa = $_GET['txt_busca'];
			 $sessiondata = array(
                'pesquisa' => $pesquisa,           
             );
             $this->session->set_userdata($sessiondata);
		 } else {
			 $pesquisa = $this->session->userdata('pesquisa');
		 }
		
		
        $config = array(
            "base_url" => base_url('portal/pesquisapublicacoes/'),
            "per_page" => 8,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->publicacoes_portal->CountAllPesquisa($pesquisa),
            "full_tag_open" => "<ul class='pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => "←",
            "prev_tag_open" => "<li class='prev'>",
            "prev_tag_close" => "</li>",
            "next_link" => "→",
            "next_tag_open" => "<li class='next'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='active'><a href='#'>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li>",
            "num_tag_close" => "</li>"
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


        $data['publicadas'] = $this->publicacoes_portal->getpesquisapublicadas($config['per_page'], $offset, $pesquisa);

        // $data['publicadas'] = $this->publicacoes_portal->getpublicadas($entidade);

        $this->load->view('transparencia/includes/imports');
        $this->load->view('/transparencia/includes/header', $data);
        $this->load->view('transparencia/publicacoes', $data);
        $this->load->view('transparencia/includes/footer');
    }

    public function recdesp() {
        $this->load->model('um3um_model');
        $data['data'] = $this->um3um_model->getall();

        $this->load->view('transparencia/includes/imports');
        $this->load->view('/transparencia/includes/header', $data);
        $this->load->view('transparencia/131', $data);
        $this->load->view('transparencia/includes/footer');
    }

    public function recdespview($competencia = NULL) {
        $this->load->model('um3um_model');
        $data['data'] = $this->um3um_model->getalldetalhe($competencia);

        $this->load->view('transparencia/includes/imports');
        $this->load->view('/transparencia/includes/header', $data);
        $this->load->view('transparencia/131view', $data);
        $this->load->view('transparencia/includes/footer');
    }

    public function visualizar($id, $tipo) { //exibe dados da 131 por tipo
        $this->load->model('um3um_model');
        $data['data'] = $this->um3um_model->getid($id, $tipo);

        $this->load->view('transparencia/includes/imports');
        $this->load->view('/transparencia/includes/header', $data);
        if ($tipo == "RECEITA") {
            //  print_r($data['data'][0]);
            $this->load->view('transparencia/131detalhes_receita', $data);
        } else {
            $this->load->view('transparencia/131detalhes_despesa', $data);
        }


        $this->load->view('transparencia/includes/footer');
    }

    public function perfil($id = null) {

        $this->load->model('vereadores_model');
        $data['data'] = $this->vereadores_model->getvereador($id);
        // print_r($data);
        $this->load->view('transparencia/includes/imports');
        $this->load->view('/transparencia/includes/header', $data);
        $this->load->view('transparencia/perfil', $data);
        $this->load->view('transparencia/includes/footer');
    }

    public function salvarsic() {

        $dados = [];
		
		$dados['nome'] = $_POST['nome'];
		$dados['cpf'] = $_POST['cpf'];
		$dados['data_nascimento'] = $_POST['data'];
		$dados['sexo'] = $_POST['sexo'];
		$dados['email'] = $_POST['email'];
		$dados['tel1'] = $_POST['telefone1'];
		$dados['tel2'] = $_POST['telefone2'];
		$dados['tel3'] = $_POST['telefone3'];
		$dados['pais'] = $_POST['pais'];
		$dados['cep'] = $_POST['cep'];
		$dados['logradouro'] = $_POST['logradouro'];
		$dados['numero'] = $_POST['numero'];
		$dados['bairro'] = $_POST['bairro'];
		$dados['estado'] = $_POST['estado'];
		$dados['cidade'] = $_POST['municipio'];
		$dados['complemento'] = $_POST['complemento'];
		$dados['referencia'] = $_POST['ref'];
		$dados['cod_secretarias'] = $_POST['departamento'];
		$dados['tp_resposta'] = $_POST['forma'];
		$dados['assunto'] = $_POST['assunto'];
		$dados['descricao'] = $_POST['solicitacao'];
		$dados['chave'] = rand(1000000000, 9999999999);
		$dados['status'] = 1;
		
		
		
		
		
		$this->db->trans_begin();
        $this->db->insert('sic', $dados);
		$id = $this->db->insert_id();
		$this->up_multi_img($id);

       if ($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
		redirect (site_url('transparencia/sic/2'));
       } else {
        $this->db->trans_commit();

			$nome = 'Prefeitura Municipal';
			$email = 'email@email.com';

			$assuntomensagem = 'Portal da transparência';
			$mensagem = 'mensagem';
			$data_envio = date('d/m/Y');
			$hora_envio = date('H:i:s');

			$arquivo = '
			<html lang="en">
			<head>

			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			</head>
			<body> 

			<div class="container">
			<h2>Chave de segurança referente a solicitação de código :#'.$id.'</h2>
			
			<hr>
		 
			<b>Sua chave de segurança é :</b> ' . $dados['chave']. '<br>
		 
			<hr>
			<div class="well well-sm">Solicitação gerada no dia ' . $data_envio . ' às ' . $hora_envio . ' </div>
			
			<br><div style="font-size: 10px" align="center" class="small"><strong>Software criado e mantido por <a href="http://www.witsdigital.com.br">Wits</a></strong></div>
			</div>

			</body>
			</html>
			';

			
			require ('class.phpmailer.php');

			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->IsHTML(true);
			$mail->CharSet = 'UTF-8'; 

			$mail->SMTPDebug = 1;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = "tls";
			$mail->Port = 587; 
			$mail->Host = "smtp.gmail.com";
			$mail->Username = "witsdigital@gmail.com";
			$mail->Password = 'thiago2828';
			$mail->SetFrom("witsdigital@gmail.com", "Chave de segurança - portal da transparência");
			$mail->AddAddress($_POST['email']);
			$mail->Subject = ("Contato do site");
			$mail->MsgHTML("$arquivo");
			$enviado = $mail->Send();

		
        redirect (site_url('transparencia/sic/1/'.$dados['chave']));

       }  

	
		
   
    }

    public function get($tipo) {
        $data['entidade'] = 'condeuba';

        $entidade = "7";



        $this->load->library('pagination');
        $config = array(
            "base_url" => base_url('portal/get/').'/'.$tipo,
            "per_page" => 8,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->publicacoes_portal->CountAlltipo($tipo),
            "full_tag_open" => "<ul class='pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => "←",
            "prev_tag_open" => "<li class='prev'>",
            "prev_tag_close" => "</li>",
            "next_link" => "→",
            "next_tag_open" => "<li class='next'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='active'><a href='#'>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li>",
            "num_tag_close" => "</li>"
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


        $data['publicadas'] = $this->publicacoes_portal->Getpublicaportaltipo('id', 'desc', $config['per_page'], $offset, $tipo);

        $this->load->view('transparencia/includes/imports');
        $this->load->view('/transparencia/includes/header', $data);
        $this->load->view('transparencia/publicacoes', $data);
        $this->load->view('transparencia/includes/footer');
    }

    public function busca($key = NULL) {
        $entidade = "7";
        $tipo = "leis";
        $key = $key;
        $this->load->model('publicacoes_portal');
        $data['publicadas'] = $this->publicacoes_portal->getpublicadas_key($entidade, $key);
        $this->load->view('transparencia/includes/imports');
        $this->load->view('/transparencia/includes/header');
        $this->load->view('transparencia/publicacoes', $data);
        $this->load->view('transparencia/includes/footer');
    }

    public function buscatitulo($titulo = NULL) {
        $entidade = "7";


        $this->load->model('publicacoes_portal');
        $data['publicadas'] = $this->publicacoes_portal->getpublicadas_titulo($entidade, $titulo);
        $this->load->view('transparencia/includes/imports');
        $this->load->view('/transparencia/includes/header');
        $this->load->view('transparencia/publicacoes', $data);
        $this->load->view('transparencia/includes/footer');
    }

    public function getbusca($tipo = NULL, $dado) {

        $entidade = "7";


        $this->load->model('publicacoes_portal');
        $data['publicadas'] = $this->publicacoes_portal->getpublicadas_busca($entidade, $tipo, $dado);
        $this->load->view('transparencia/includes/imports');
        $this->load->view('/transparencia/includes/header');
        $this->load->view('transparencia/publicacoes', $data);
        $this->load->view('transparencia/includes/footer');
    }

    public function buscadata($dia, $mes, $ano) {
        $entidade = "7";
        $date = $dia . "/" . $mes . "/" . $ano;
        $date = date("Y-m-d", strtotime(str_replace('/', '-', $date)));
        echo $date;

        $this->load->model('publicacoes_portal');
        $data['publicadas'] = $this->publicacoes_portal->getpublicadas_data($entidade, $date);
        $this->load->view('transparencia/includes/imports');
        $this->load->view('/transparencia/includes/header');
        $this->load->view('transparencia/publicacoes', $data);
        $this->load->view('transparencia/includes/footer');
    }

    public function quemsomos() {
        $this->load->view('portal/includes/imports');
        $this->load->view('portal/includes/header');
        $this->load->view('portal/quemsomos');
        $this->load->view('portal/includes/footer');
    }

    public function sistemas() {
        $this->load->view('portal/includes/imports');
        $this->load->view('portal/includes/header');
        $this->load->view('portal/sistemas');
        $this->load->view('portal/includes/footer');
    }

    public function equipe() {
        $this->load->view('portal/includes/imports');
        $this->load->view('portal/includes/header');
        $this->load->view('portal/equipe');
        $this->load->view('portal/includes/footer');
    }

    public function camaras() {
        $this->load->model('entidade_model');
        $data['entidades'] = $this->entidade_model->getentidade();

        $this->load->view('portal/includes/imports');
        $this->load->view('portal/includes/header');
        $this->load->view('portal/camaras', $data);
        $this->load->view('portal/includes/footer');
    }

    public function prefeituras() {
        $this->load->view('portal/includes/imports');
        $this->load->view('portal/includes/header');
        $this->load->view('portal/camaras');
        $this->load->view('portal/includes/footer');
    }

    public function autarquias() {
        $this->load->view('portal/includes/imports');
        $this->load->view('portal/includes/header');
        $this->load->view('portal/camaras');
        $this->load->view('portal/includes/footer');
    }

    public function infoph(){
        phpinfo();
    }

}
