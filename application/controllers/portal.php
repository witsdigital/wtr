<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class portal extends CI_Controller {

     public function index() {

		$dados['ultima_slide'] = $this->db->query('select noticias.*, categorias.nomecategoria from noticias left join categorias on categorias.id_categoria = noticias.categoria where destaque = 1 order by data desc limit 1 ')->result();
		$dados['ultimas_slide'] = $this->db->query('select noticias.*, categorias.nomecategoria from noticias left join categorias on categorias.id_categoria = noticias.categoria where destaque = 1 order by data desc limit 3 offset 1')->result();
		$dados['ultimas_noticias'] = $this->db->query('select noticias.*, categorias.nomecategoria from noticias left join categorias on categorias.id_categoria = noticias.categoria where destaque != 1 order by data desc limit 2 ')->result();
	
		$query = $this->db->query('SELECT DISTINCT noticias.categoria, categorias.nomecategoria FROM `noticias` left join categorias on categorias.id_categoria = noticias.categoria GROUP by categoria')->result();	
		$i = 0;
		foreach($query as $row){
			 $query[$i]->noticia = $this->db->query('select noticias.*, categorias.nomecategoria from noticias left join categorias on categorias.id_categoria = noticias.categoria where categoria = '.$row->categoria.' order by data desc limit 1 ')->result();
			 $query[$i]->noticias = $this->db->query('select noticias.*, categorias.nomecategoria from noticias left join categorias on categorias.id_categoria = noticias.categoria where categoria = '.$row->categoria.' order by data desc limit 3 offset 1')->result();
			$i++;
		}
		
		$dados['ultimas_categorias'] = $query ;
     
		
		
		
		$this->load->view('portal/includes/header');
       $this->load->view('portal/home', $dados);
		$this->load->view('portal/includes/side-menu');
        $this->load->view('portal/includes/footer');
		
	
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
    
     public function publicacoes() {

		$this->session->unset_userdata('pesquisa');
		
		
        $data['entidade'] = 'condeuba';
        $entidade = "7";
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

        // $data['publicadas'] = $this->publicacoes_portal->getpublicadas($entidade);

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
	
	public function recdespview($competencia = NULL) {
        $this->load->model('um3um_model');
        $data['data'] = $this->um3um_model->getalldetalhe($competencia,2019);

        $this->load->view('transparencia/includes/imports');
        $this->load->view('transparencia/includes/header', $data);
        $this->load->view('transparencia/131view', $data);
        $this->load->view('transparencia/includes/footer');
    }
	
	public function recdesp() {
        $this->load->model('um3um_model');
        $data['data'] = $this->um3um_model->getall();

        $this->load->view('transparencia/includes/imports');
        $this->load->view('transparencia/includes/header', $data);
        $this->load->view('transparencia/131', $data);
        $this->load->view('transparencia/includes/footer');
    }
	
	public function noticias() {
   
        $this->load->model('noticia_model');
        $this->load->library('pagination');

        $config = array(
            "base_url" => base_url('portal/noticias/'),
            "per_page" => 6,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->noticia_model->CountAll(),
            "full_tag_open" => "<ul class='pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li class='page-link'>",
            "first_tag_close" => "</li>",
            "prev_link" => "←",
            "prev_tag_open" => "<li class='page-link'>",
            "prev_tag_close" => "</li>",
            "next_link" => "→",
            "next_tag_open" => "<li class='page-link'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li class='page-link'>",
            "last_tag_close" => "</li >",
            "cur_tag_open" => "<li class='active'><a class='page-link' >",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li class='page-link'>",
            "num_tag_close" => "</li>"
        );


        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['noticias'] = $this->noticia_model->GetNotPortal('id', 'desc', $config['per_page'], $offset);


        $this->load->view('portal/includes/header');
        $this->load->view('portal/noticias', $data);
        $this->load->view('portal/includes/footer');
    }
    


	
	public function galerias() {
   
        $this->load->library('pagination');


        $config = array(
            "base_url" => base_url('portal/galerias/'),
            "per_page" => 6,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->noticia_model->CountAll(),
            "full_tag_open" => "<ul class='pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li class='page-link'>",
            "first_tag_close" => "</li>",
            "prev_link" => "←",
            "prev_tag_open" => "<li class='page-link'>",
            "prev_tag_close" => "</li>",
            "next_link" => "→",
            "next_tag_open" => "<li class='page-link'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li class='page-link'>",
            "last_tag_close" => "</li >",
            "cur_tag_open" => "<li class='active'><a href='#' class='page-link' >",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li class='page-link'>",
            "num_tag_close" => "</li>"
        );


        $this->pagination->initialize($config);
 
        $data['pagination'] = $this->pagination->create_links();

        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['galerias'] = $this->db->query('select * from galeria limit '. $config['per_page']. ' offset ' .$offset)->result();
		$i=0;
		foreach($data['galerias'] as $row){
			$data['galerias'][$i]->arquivo = $this->db->query('select * from img_galeria where img_galeria.key = '.$row->key.' limit 1')->result();
			$i++;
		}
		
        $this->load->view('portal/includes/header');
        $this->load->view('portal/galerias', $data);
        $this->load->view('portal/includes/footer');
    }
	
	
	public function view_noticia($id = null) {
		
		if($id==null){
			redirect(base_url());
		}
   
		$data['noticia'] = $this->db->query('select noticias.*, categorias.nomecategoria from noticias left join categorias on categorias.id_categoria = noticias.categoria where id = '.$id.' order by id desc limit 2 ')->result();
		$data['noticias_relacionadas'] = $this->db->query('select * from noticias where id!= '.$id.' and categoria = '.$data['noticia'][0]->categoria.' order by  RAND() limit 3 ')->result();

        $objData['visualizacoes'] = $data['noticia'][0]->visualizacoes + 1;
		
		$this->db->where('id', $id);
		$this->db->update('noticias', $objData);
		
		$this->load->view('portal/includes/header');
        $this->load->view('portal/view_noticia', $data);
        $this->load->view('portal/includes/footer');
    }
	
	
	public function noticias_categoria($id = null, $offset2 = 0) {
		
  
        $this->load->model('noticia_model');
        $this->load->library('pagination');

		$this->session->unset_userdata('pesquisa');

        $config = array(
            "base_url" => base_url('portal/noticias_categoria/').'/'.$id.'/',
            "per_page" => 6,
            "num_links" => 3,
            "uri_segment" => 4,
            "total_rows" => $this->noticia_model->CountAllCategoria($id),
            "full_tag_open" => "<ul class='pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => true,
            "last_link" => true,
            "first_tag_open" => "<li class='page-link'>",
            "first_tag_close" => "</li>",
            "prev_link" => "←",
            "prev_tag_open" => "<li class='page-link'>",
            "prev_tag_close" => "</li>",
            "next_link" => "→",
            "next_tag_open" => "<li class='page-link'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li class='page-link'>",
            "last_tag_close" => "</li >",
            "cur_tag_open" => "<li class='active'><a href='#' class='page-link' >",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li class='page-link'>",
            "num_tag_close" => "</li>"
        );


        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['noticias'] = $this->noticia_model->GetNotPortalCat($id, 'desc', $config['per_page'], $offset2);


        $this->load->view('portal/includes/header');
        $this->load->view('portal/noticias', $data);
        $this->load->view('portal/includes/footer');
    }
	
	
	public function pesquisa($pesquisa = null, $offset2 = 0) {
		
  
		if(isset($_GET['txt_busca'])){
		$pesquisa = $_POST['txt_busca'];
		}
  
        $this->load->model('noticia_model');
        $this->load->library('pagination');


        $config = array(
            "base_url" => base_url('portal/pesquisa/').'/'.$pesquisa.'/',
            "per_page" => 6,
            "num_links" => 3,
            "uri_segment" => 4,
            "total_rows" => $this->noticia_model->CountAllPesquisa($pesquisa),
            "full_tag_open" => "<ul class='pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => true,
            "last_link" => true,
            "first_tag_open" => "<li class='page-link'>",
            "first_tag_close" => "</li>",
            "prev_link" => "←",
            "prev_tag_open" => "<li class='page-link'>",
            "prev_tag_close" => "</li>",
            "next_link" => "→",
            "next_tag_open" => "<li class='page-link'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li class='page-link'>",
            "last_tag_close" => "</li >",
            "cur_tag_open" => "<li class='active'><a href='#' class='page-link' >",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li class='page-link'>",
            "num_tag_close" => "</li>"
        );


        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['noticias'] = $this->db->query("select noticias.*, categorias.nomecategoria from noticias left join categorias on categorias.id_categoria = noticias.categoria where `titulo` LIKE '%".$pesquisa."%' or  `conteudo` LIKE '%".$pesquisa."%' order by id desc limit ". $config['per_page'] . " offset " .$offset2)->result();



        $this->load->view('portal/includes/header');
        $this->load->view('portal/pesquisa', $data);
        $this->load->view('portal/includes/footer');
    }
	
	
	public function view_secretaria($id = null) {
		
		if($id==null){
			redirect(base_url());
		}
   
		$data['secretaria'] = $this->db->query('select * from secretarias where id_secretaria ='.$id)->result();
		
		$this->load->view('portal/includes/header');
        $this->load->view('portal/view_secretaria', $data);
		$this->load->view('portal/includes/side-menu');
        $this->load->view('portal/includes/footer');
    }
	
	
	public function secretarias() {
   
		$data['secretarias'] = $this->db->query('select * from secretarias')->result();
		
		$this->load->view('portal/includes/header');
        $this->load->view('portal/secretarias', $data);
		$this->load->view('portal/includes/side-menu');
        $this->load->view('portal/includes/footer');
    }
	
	public function contato($res = null) {
		$resposta = null;
		if($res == 1){
			$resposta = "<font color='green'>Mensagem enviada com sucesso</font>";
		}
		if($res == 2){
			$resposta = "<font color='red'>Não foi possivel enviar a mensagem, tente novamente mais tarde</font>";
		}
		$dados['resposta'] = $resposta;
		$this->load->view('portal/includes/header');
        $this->load->view('portal/view_contato', $dados);
        $this->load->view('portal/includes/footer');
    }
	
	
	public function salvarcontato() {
		
			$data['nome'] = $this->input->post('nome');
			$data['email'] = $this->input->post('email');
			$data['telefone'] = $this->input->post('telefone');
			$data['assunto'] = $this->input->post('assunto');
			$data['descricao'] = $this->input->post('mensagem');
			$data['status'] = 0;
			
			if($this->db->insert('ouvidoria', $data)){
				redirect('portal/contato/1'); 
			} else {
				redirect('portal/contato/2'); 
			}
							   

	}
	
	

    public function view_galeria($id = null) {
		
		if($id==null){
			redirect(base_url());
		}
     
        $this->load->model('galeria_model');
		$data['info'] = $this->db->query('select * from galeria where galeria.key = '.$id)->result();
        $data['galeria'] = $this->galeria_model->getimgid($id);
		$data['key'] = $id;

        $this->load->view('portal/includes/header');
        $this->load->view('portal/view_galeria', $data);
        $this->load->view('portal/includes/footer');
    }

    public function enviarcontato() {



        $nome = $_POST['name'];

        $email = $_POST['email'];

        $telefone = $_POST['telefone'];



        $assuntomensagem = $_POST['assunto'];

        $mensagem = $_POST['mensagem'];

        $data_envio = date('d/m/Y');

        $hora_envio = date('H:i:s');



        $arquivo = '

<html lang="en">



<head>



<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body> 



<div class="container">

<h2>Contato do site Sudoeste Leilões</h2>

<div class="well well-sm">Formulário gerado no dia ' . $data_envio . ' às ' . $hora_envio . ' </div>

  <hr>

  <b>Nome do usuário:</b> ' . $nome . '<br>

      <b>E-mail:</b> ' . $email . '<br>
      
      <b>E-Telefone:</b> ' . $telefone . '<br>

            <b>Assunto:</b> ' . $assuntomensagem . '<br>

             <b>Mensagem:</b> <br>' . $mensagem . '<br>

      

      <br><div style="font-size: 10px" align="center" class="small"><strong>Formulário criado e mantido por <a href="http://www.witsdigital.com.br">Wits</a></strong></div>

</div>



</body>

</html>

';



        require_once('class.phpmailer.php');



        $mail = new PHPMailer();

        $mail->IsSMTP();

        $mail->IsHTML(true);

        $mail->CharSet = 'UTF-8';



        $mail->SMTPDebug = 1;

        $mail->SMTPAuth = true;

        $mail->SMTPSecure = "ssl";

        $mail->Port = 465;

        $mail->Host = "smtp.gmail.com";

        $mail->Username = "witsdigital@gmail.com";

        $mail->Password = "thiago2828";

        $mail->SetFrom("contato@teste.com.br", "Camara de vereadores - contato");

        $mail->AddAddress("contato@teste.com.br");

        $mail->Subject = ("contato do site");

        $mail->MsgHTML($arquivo);

        $enviarEmail = $mail->Send();

        if ($enviarEmail) {
            $data['enviado'] = '<font color="green">Mensagem enviada</font>';
        } else {
            $data['enviado'] = '<font color="red">Erro ao enviar mensagem, tente novamente mais tarde</font>';
        }



        $data['entidade'] = 'condeuba';


        $this->load->view('transparencia/includes/imports');
        $this->load->view('/transparencia/includes/header', $data);
        $this->load->view('transparencia/contato', $data);
        $this->load->view('transparencia/includes/footer');
    }

    public function get($tipo) {
        $data['entidade'] = 'condeuba';

        $entidade = "7";



        $this->load->library('pagination');
        $config = array(
            "base_url" => base_url('portal/publicacoes/'),
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
      $this->load->view('transparencia/includes/header', $data);
        $this->load->view('transparencia/publicacoes', $data);
        //$this->load->view('transparencia/includes/footer');
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

    public function esictemp(){
        $data['url'] = 'http://www.ipmbrasil.org.br/diariooficial/SIC/inicio';
        $data['title'] = '<title>Prefeitura Municipal de Guajeru Bahia</title>';
           $this->load->view('portal/includes/header_frame');
        $this->load->view('portal/tempurl', $data);

    }
    public function diariotemp(){
        $data['url'] = 'http://www.ipmbrasil.org.br/DiarioOficial/ba/pmguajeru/diario';
        $data['title'] = '<title>Prefeitura Municipal de Guajeru Bahia</title>';
          $this->load->view('portal/includes/header_frame');
        $this->load->view('portal/tempurl', $data);

    }
    public function transptemp(){
        $data['url'] = 'http://www.ipmbrasil.org.br/DiarioOficial/ba/pmguajeru/transparencia';
        $data['title'] = '<title>Prefeitura Municipal de Guajeru Bahia</title>';
       //$this->load->view('portal/includes/imports');
        $this->load->view('portal/includes/header_frame');
        $this->load->view('portal/tempurl', $data);

    }

}
