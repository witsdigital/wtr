<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacoes extends CI_Controller {
    
      function __construct()
    {
       
        parent::__construct();
            $this->load->model('log_model');
           
    }
 

    public function index($indice = null) {
        $this->load->model('validalogin');
        $this->validalogin->valida();
        $this->load->model('publicacao');
        if ($this->session->userdata('permissao') != "administrador") {
            $data['publicacoes'] = $this->publicacao->getPublicacao($this->session->userdata('entidade'));
        } else {
            $data['publicacoes'] = $this->publicacao->getPublicacaosuper($this->session->userdata('entidade'));
        }
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


        $this->load->view('publicacoes/publicacoes', $data);
        $this->load->view('includes/footer');
    }

    public function cadastro($indice = NULL) {

        $this->load->model('validalogin');
        $this->validalogin->valida();
        $this->load->model('md_tppublicacao');
        $data['tppublicacao'] = $this->md_tppublicacao->gettppublica();

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
        if ($indice == 5) {
            $data['msg'] = "Tipo de arquivo nao permitido !";
            $this->load->view('includes/msg_danger', $data);
        }
        $this->load->view('publicacoes/cad_publicacao', $data);
        $this->load->view('includes/footer');
    }

    public function view_publicacao($indice = NULL) {

        $this->load->model('validalogin');
        $this->validalogin->valida();
        $this->load->model('publicacao');
        $data['publicacao'] = $this->publicacao->getpublicacao_key($indice);


        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            $this->load->view('includes/menu');
        }

        $this->load->view('publicacoes/view_publicacao', $data);
        $this->load->view('includes/footer');
    }

    public function alterar($indice = null) {
         $this->load->view('includes/header');
       
        $this->load->view('includes/import');
        
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            $this->load->view('includes/menu');
        }
         
         
        
        $this->load->model('md_tppublicacao');
        $data['tppublicacao'] = $this->md_tppublicacao->gettppublica();
        $this->load->model('publicacao');
        $data['publicacao'] = $this->publicacao->getpublicacao_key($indice);

       

        $this->load->view('publicacoes/alterar', $data);
        $this->load->view('includes/footer');
    }

    public function status($indice = null) {
        $this->load->model('publicacao');
        $this->publicacao->status($indice);
    }

    public function print_publicacao($indice = NULL) {

        $this->load->model('validalogin');
        $this->validalogin->valida();
        $this->load->model('publicacao');
        $data['publicacao'] = $this->publicacao->getpublicacao_key($indice);


        $this->load->view('includes/import');


        $this->load->view('publicacoes/print_publicacao', $data);
    }

    public function delete_file($indice = NULL) {


        $this->load->model('publicacao');
        if ($this->publicacao->delete_file($indice)) {
            redirect(site_url('publicacoes'));
        }
    }

    public function salvar() {
//        Validar login
        $this->load->model('validalogin');
        $this->validalogin->valida();
        if (isset($_POST['de'])) {
            $local = "1";
        }
        if (isset($_POST['dm'])) {
            $local = "2";
        }
        if (isset($_POST['du'])) {
            $local = "3";
        }
        if (isset($_POST['de']) && isset($_POST['dm'])) {
            $local = "4";
        }
        if (isset($_POST['de']) && isset($_POST['dm']) && isset($_POST['du'])) {
            $local = "5";
        }
        $dt = $this->input->post('data');
        $dt = date("Y-m-d", strtotime(str_replace('/', '-', $dt)));
        $data['data'] = $dt;
        $data['titulo'] = $this->input->post('titulo');
        $data['tipo'] = $this->input->post('tipo');
        $data['local'] = $local;
        $data['objeto'] = $this->input->post('objeto');

        date_default_timezone_set('America/Sao_Paulo');
        $dataatual = date("Y/m/d");
        $protocolo = date("dmHi");
        $entidade = $this->session->userdata('entidade');
        $key = $entidade . $protocolo;
        $data['keyarquivo'] = $key;

 $data['status'] = 0;


        $data['entidade'] = $this->session->userdata('entidade');

        if ($this->db->insert('publicacoes', $data)) {
               $this->log_model->log('Cadastrou uma publicação');
            $this->updoc($this->session->userdata('entidade'), $key);
            redirect(site_url('publicacoes/1'));
        } else {
            echo $key;
        }
    }

    public function update() {


        if (isset($_POST['de'])) {
            $local = "1";
        }
        if (isset($_POST['dm'])) {
            $local = "2";
        }
        if (isset($_POST['du'])) {
            $local = "3";
        }
        if (isset($_POST['de']) && isset($_POST['dm'])) {
            $local = "4";
        }
        if (isset($_POST['dm']) && isset($_POST['du'])) {
            $local = "6";
        }
        if (isset($_POST['de']) && isset($_POST['du'])) {
            $local = "7";
        }
        if (isset($_POST['de']) && isset($_POST['dm']) && isset($_POST['du'])) {
            $local = "5";
        }


        $dt = $this->input->post('data');
        $dt = date("Y-m-d", strtotime(str_replace('/', '-', $dt)));
        $data['data'] = $dt;
        $data['titulo'] = $this->input->post('titulo');
        $data['tipo'] = $this->input->post('tipo');
        $data['local'] = $local;
        $data['objeto'] = $this->input->post('objeto');

        $this->load->model('publicacao');
        if ($this->publicacao->update($data, $this->input->post('id'))) {
               $this->log_model->log('alterou uma publicação');
            
            redirect(site_url('publicacoes/2'));
        } else {
            echo $this->input->post('iduser');
        }
    }

    public function apagar($id = NULL) {
        switch (date("m")) {
            case 1:
                $dirdata = "janeiro";
                break;
            case 2:
                $dirdata = "fevereiro";
                break;
            case 3:
                $dirdata = "marco";
                break;
            case 4:
                $dirdata = "abril";
                break;
            case 5:
                $dirdata = "maio";
                break;
            case 6:
                $dirdata = "junho";
                break;
            case 7:
                $dirdata = "julho";
                break;
            case 8:
                $dirdata = "agosto";
                break;
            case 9:
                $dirdata = "setembro";
                break;
            case 10:
                $dirdata = "outubro";
                break;
            case 11:
                $dirdata = "novembro";
                break;
            case 12:
                $dirdata = "dezembro";
                break;
        }

        $query = $this->db->get_where('publicacoes', array('id' => $id));
        foreach ($query->result() as $row) {
            $key = $row->keyarquivo;
            $this->db->delete('upload_arquivo', array('key' => $row->keyarquivo));
            $this->db->delete('publicacoes', array('id' => $id));
            $this->log_model->log('apagou uma publicação ');
           redirect(site_url('publicacoes'));
        }
    }

    public function upfile() {
        date_default_timezone_set('America/Sao_Paulo');
        $dataatual = date("Y/m/d");
        $protocolo = date("dmyHi");

        $file = $_FILES['ar'];

        $numFile = count(array_filter($file['name']));

        switch (date("m")) {
            case 1:
                $dirdata = "janeiro";
                break;
            case 2:
                $dirdata = "fevereiro";
                break;
            case 3:
                $dirdata = "marco";
                break;
            case 4:
                $dirdata = "abril";
                break;
            case 5:
                $dirdata = "maio";
                break;
            case 6:
                $dirdata = "junho";
                break;
            case 7:
                $dirdata = "julho";
                break;
            case 8:
                $dirdata = "agosto";
                break;
            case 9:
                $dirdata = "setembro";
                break;
            case 10:
                $dirdata = "outubro";
                break;
            case 11:
                $dirdata = "novembro";
                break;
            case 12:
                $dirdata = "dezembro";
                break;
        }

        $entidade = $this->session->userdata('entidade');

        if (is_dir("uploads/publicacao/$entidade/$dirdata")) {
            $dir = 'uploads/publicacao/' . $entidade . '/' . $dirdata;
        } else {
            mkdir("uploads/publicacao/$entidade/$dirdata", 0777, true);
            $dir = 'uploads/publicacao/' . $entidade . '/' . $dirdata;
        }



        // fim diretorio

        if ($numFile <= 0) {
            echo "<script>alert('Selecione uma imagem')</script>";
            echo "<script type=\"text/javascript\">
		  window.setTimeout(\"location.href='index.php?pg=envio';\", 2000);
		</script>";
        } else {
            $key = $this->input->post('keyfile');
            for ($i = 0; $i < $numFile; $i++) {

                $name = $file['name'][$i];
                $type = $file['type'][$i];
                $size = $file['size'][$i];
                $error = $file['error'][$i];
                $tmp = $file['tmp_name'][$i];
                $tiposPermitidos = array('application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf');


                if ($error != 0) {
                    $msg[] = "<b> $name : </b>" . $error[$erromsg];
                }
                if (array_search($type, $tiposPermitidos) === false) {

                    redirect(site_url('publicacoes/cadastro/5'));
                    // Não houveram erros, move o arquivo
                } else {
                    $name = $this->removeAcentos($name);

                    if (move_uploaded_file($tmp, $dir . "/" . $name)) {


                        $obj['arquivo'] = $name;
                        $obj['key'] = $key;
                        if ($this->db->insert('upload_arquivo', $obj)) {

//                            redirect('index.php/publicacoes/2'); 
                        }
                    } else {
                        $msg[] = "<b> $name : </b> ocorreu erro";
                    }
                }
            }redirect(site_url('publicacoes/2'));
        }
    }

    public function updoc($entidade, $key) {


        $file = $_FILES['ar'];
        $numFile = count(array_filter($file['name']));

        switch (date("m")) {
            case 1:
                $dirdata = "janeiro";
                break;
            case 2:
                $dirdata = "fevereiro";
                break;
            case 3:
                $dirdata = "marco";
                break;
            case 4:
                $dirdata = "abril";
                break;
            case 5:
                $dirdata = "maio";
                break;
            case 6:
                $dirdata = "junho";
                break;
            case 7:
                $dirdata = "julho";
                break;
            case 8:
                $dirdata = "agosto";
                break;
            case 9:
                $dirdata = "setembro";
                break;
            case 10:
                $dirdata = "outubro";
                break;
            case 11:
                $dirdata = "novembro";
                break;
            case 12:
                $dirdata = "dezembro";
                break;
        }


        if (is_dir("uploads/publicacao/$entidade/$dirdata")) {
            $dir = 'uploads/publicacao/' . $entidade . '/' . $dirdata;
        } else {
            mkdir("uploads/publicacao/$entidade/$dirdata", 0777, true);
            $dir = 'uploads/publicacao/' . $entidade . '/' . $dirdata;
        }



        // fim diretorio

        if ($numFile <= 0) {
            echo "<script>alert('Selecione uma imagem')</script>";
            echo "<script type=\"text/javascript\">
		  window.setTimeout(\"location.href='index.php?pg=envio';\", 2000);
		</script>";
        } else {

            for ($i = 0; $i < $numFile; $i++) {

                $name = $file['name'][$i];
                $type = $file['type'][$i];
                $size = $file['size'][$i];
                $error = $file['error'][$i];
                $tmp = $file['tmp_name'][$i];
                $tiposPermitidos = array('application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf');


                if ($error != 0) {
                    $msg[] = "<b> $name : </b>" . $error[$erromsg];
                }
                if (array_search($type, $tiposPermitidos) === false) {

                    redirect(site_url('publicacoes/cadastro/5'));
                    // Não houveram erros, move o arquivo
                } else {
       $name = $this->removeAcentos($name);
                    if (move_uploaded_file($tmp, $dir . "/" . $name)) {


                        $obj['arquivo'] = $name;
                        $obj['key'] = $key;
                        $this->db->insert('upload_arquivo', $obj);
                    } else {
                        $msg[] = "<b> $name : </b> ocorreu erro";
                    }
                }
            }return $key;
        }
    }

    public function removeAcentos($string, $slug = false) {
        $string = strtolower($string);
        // Código ASCII das vogais
        $ascii['a'] = range(224, 230);
        $ascii['e'] = range(232, 235);
        $ascii['i'] = range(236, 239);
        $ascii['o'] = array_merge(range(242, 246), array(240, 248));
        $ascii['u'] = range(249, 252);
        // Código ASCII dos outros caracteres
        $ascii['b'] = array(223);
        $ascii['c'] = array(231);
        $ascii['d'] = array(208);
        $ascii['n'] = array(241);
        $ascii['y'] = array(253, 255);
        foreach ($ascii as $key => $item) {
            $acentos = '';
            foreach ($item AS $codigo)
                $acentos .= chr($codigo);
            $troca[$key] = '/[' . $acentos . ']/i';
        }
        $string = preg_replace(array_values($troca), array_keys($troca), $string);
        // Slug?
        if ($slug) {
            // Troca tudo que não for letra ou número por um caractere ($slug)
            $string = preg_replace('/[^a-z0-9]/i', $slug, $string);
            // Tira os caracteres ($slug) repetidos
            $string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
            $string = trim($string, $slug);
        }
        return $string;
    }
	
	
		
	public function getPublicacaoApp(){
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


        $query = $this->db->query("select * from publicacao ORDER BY STR_TO_DATE(data, '%m-%Y')")->result();
        echo json_encode($query);
	}
	
	
		public function getPublicacaoPDF(){
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		
        $data = file_get_contents("php://input");
        $objData = json_decode($data);

        $query = $this->db->query("select arquivo, Month(data) as mes from upload_arquivo_publicado where `key` = " .$objData)->result();
		
		$arr = array ();
		$i=0;
		
		foreach ($query as $row) {
			$valor = $row->mes;
			switch ($valor) {
            case 1:
                $dirdata = "janeiro";
                break;
            case 2:
                $dirdata = "fevereiro";
                break;
            case 3:
                $dirdata = "marco";
                break;
            case 4:
                $dirdata = "abril";
                break;
            case 5:
                $dirdata = "maio";
                break;
            case 6:
                $dirdata = "junho";
                break;
            case 7:
                $dirdata = "julho";
                break;
            case 8:
                $dirdata = "agosto";
                break;
            case 9:
                $dirdata = "setembro";
                break;
            case 10:
                $dirdata = "outubro";
                break;
            case 11:
                $dirdata = "novembro";
                break;
            case 12:
                $dirdata = "dezembro";
                break;
        }

			$arr[$i]['link'] = $dirdata. '/'.$row->arquivo;
			
		}
		
		
		
		
        echo json_encode($arr);
	}
	

}
