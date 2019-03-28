<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Publicar extends CI_Controller {



    public function index($indice = null) {

        $this->load->model('validalogin');

        $this->validalogin->valida();

        $this->load->model('publicadas');

        $data['publicacoes'] = $this->publicadas->getPublicacaosuper();

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





        $this->load->view('publicar/view', $data);

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

        $this->load->view('publicar/cadastro', $data);

        $this->load->view('includes/footer');

    }
	
	
	public function verpub($indice = null) {

        $this->load->model('validalogin');
        $this->validalogin->valida();

        $data['publicacoes'] = $this->db->query('select * from envio_arquivo order by id_envio desc')->result();

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





        $this->load->view('publicar_envio/view', $data);

        $this->load->view('includes/footer');

    }



    public function view_publicacao($indice = NULL) {



        $this->load->model('validalogin');

        $this->validalogin->valida();

        $this->load->model('publicadas');

        $data['publicacao'] = $this->publicadas->getpublicacao_key($indice);


        $this->load->view('includes/import');

        $this->load->view('includes/header');

        if ($this->session->userdata('permissao') == 'administrador') {

            $this->load->view('includes/menu_admin');

        } else {

            $this->load->view('includes/menu');

        }

        $this->load->view('publicar/view_publicacao', $data);

        $this->load->view('includes/footer');

    }
	
	
	public function view_publicacaoenvio($indice = NULL) {



        $this->load->model('validalogin');

        $this->validalogin->valida();

        $this->load->model('publicadas');

        $data['publicacao'] = $this->db->query('select * from envio_arquivo where id_envio ='.$indice)->result();


        $this->load->view('includes/import');

        $this->load->view('includes/header');

        if ($this->session->userdata('permissao') == 'administrador') {

            $this->load->view('includes/menu_admin');

        } else {

            $this->load->view('includes/menu');

        }

        $this->load->view('publicar_envio/view_publicacao', $data);

        $this->load->view('includes/footer');

    }
	
	
	public function enviarpub() {
		$this->load->model('validalogin');
        $this->validalogin->valida();


        $this->load->view('includes/import');

        $this->load->view('includes/header');

        if ($this->session->userdata('permissao') == 'administrador') {

            $this->load->view('includes/menu_admin');

        } else {

            $this->load->view('includes/menu');

        }

        $this->load->view('publicar_envio/cadastro');

        $this->load->view('includes/footer');

    }




    public function alterar($indice = null) {
		$this->load->model('validalogin');
        $this->validalogin->valida();


        $this->load->model('md_tppublicacao');

        $data['tppublicacao'] = $this->md_tppublicacao->gettppublica();

        $this->load->model('publicadas');

        $data['publicacao'] = $this->publicadas->getpublicacao_key($indice);



        $this->load->view('includes/import');

        $this->load->view('includes/header');

        if ($this->session->userdata('permissao') == 'administrador') {

            $this->load->view('includes/menu_admin');

        } else {

            $this->load->view('includes/menu');

        }

        $this->load->view('publicar/alterar', $data);

        $this->load->view('includes/footer');

    }



    public function status($indice = null) {
		$this->load->model('validalogin');
        $this->validalogin->valida();


        $this->load->model('publicadas');

        $this->publicadas->status($indice);

    }



    public function print_publicacao($indice = NULL) {



        $this->load->model('validalogin');

        $this->validalogin->valida();

        $this->load->model('publicacao');

        $data['publicacao'] = $this->publicacao->getpublicacao_key($indice);





        $this->load->view('includes/import');





        $this->load->view('publicar/print_publicacao', $data);

    }



    public function delete_file($indice = NULL) {

$this->load->model('validalogin');
        $this->validalogin->valida();




        $this->load->model('publicadas');

        if ($this->publicadas->delete_file($indice)) {

            redirect(site_url('publicar'));

        }

    }



    public function salvar1() {




$this->load->model('validalogin');
        $this->validalogin->valida();





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

        $idpublicacao = $this->input->post('idpublicacao');

        $query = $this->db->query('select * from publicacoes where id ="' . $idpublicacao . '"');

        $dados = $query->result();

        $data['data'] = $dados[0]->data;

        $data['titulo'] = $dados[0]->titulo;

        $data['tipo'] = $dados[0]->tipo;

        $data['edicao'] = $this->input->post('edicao');

        $data['caderno'] = $this->input->post('caderno');

        $data['ementa'] = $this->input->post('ementa');

        $data['orgao'] = $this->input->post('orgao');



        $data['objeto'] = $this->input->post('objeto');

        $data['keyarquivo'] = $this->updoc($dados[0]->entidade, $dados[0]->data);

        $data['entidade'] = $dados[0]->entidade;

        $data['status'] = 1;

        $data['local'] = 1;





        $this->load->model('publicadas');



        if ($this->publicadas->setpublicacao($data)) {

            $this->load->model('publicacao');

            $this->publicacao->status($dados[0]->id);

            redirect(site_url('publicar/1'));

        } else {

            redirect(site_url('publicar/2'));

        }

    }



    public function salvar() {

$this->load->model('validalogin');
        $this->validalogin->valida();

        $data = str_replace("/", "-", $this->input->post('data'));



        $datacad = date('Y-m-d', strtotime($data)); // data q o cliente selecionou

        $dados['data'] = $datacad;

        $dados['titulo'] = $this->input->post('titulo');

        $dados['tipo'] = $this->input->post('tipo');

        $dados['objeto'] = $this->input->post('objeto');

        $cod_publica = $this->publicadas->setpublicacao($dados);



        if ($this->updoc(7, $datacad, $cod_publica)) {



            redirect(site_url('publicar/1'));

        } else {

            redirect(site_url('publicar/2'));

        }

    }



    public function update() {


$this->load->model('validalogin');
        $this->validalogin->valida();



        $data = str_replace("/", "-", $this->input->post('data'));

        $datacad = date('Y-m-d', strtotime($data)); // data q o cliente selecionou

        $dados['data'] = $datacad;

        $dados['titulo'] = $this->input->post('titulo');

        $dados['tipo'] = $this->input->post('tipo');

        $dados['objeto'] = $this->input->post('objeto');



        if ($this->publicadas->update($dados, $this->input->post('id'))) {

            redirect(site_url('publicar/1'));

        }

//        if ($this->updoc(7, $datacad, $cod_publica)) {

//

//            redirect('publicar/1');

//        } else {

//            redirect('publicar/2');

//        }

    }
	
	
	public function salvarenvio() {
$this->load->model('validalogin');
        $this->validalogin->valida();


        $data = str_replace("/", "-", $this->input->post('data'));

        $datacad = date('Y-m-d', strtotime($data)); // data q o cliente selecionou

        $dados['data'] = $datacad;

        $dados['titulo'] = $this->input->post('titulo');

        $dados['tipo'] = $this->input->post('tipo');

        $dados['observacao'] = $this->input->post('observacao');

        
		
		$cod_publica = $this->publicadas->setpublicacaoenvio($dados);



        if ($this->updoc2(7, $datacad, $cod_publica)) {



            redirect(site_url('publicar/verpub/1'));

        } else {

            redirect(site_url('publicar/verpub/2'));

        }

    }



    public function apagar($id = NULL) {
		$this->load->model('validalogin');
        $this->validalogin->valida();


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



        $query = $this->db->get_where('publicacao', array('id' => $id));



                if ($this->db->delete('publicacao', array('id' => $id))) {

                    redirect(site_url('publicar/3'));

//                    $this->index();

                

				}

        

    }
	
	
	
    public function apagarenvio($id = NULL) {
		$this->load->model('validalogin');

        $this->validalogin->valida();
		$this->db->delete('upload_arquivo', array('cod_envio' => $id));
 
                if ($this->db->delete('envio_arquivo', array('id_envio' => $id))) {

                    redirect(site_url('publicar/verpub/3'));


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



        $entidade = $this->input->post('entidade');



        if (is_dir("uploads/publicadas/$entidade/$dirdata")) {

            $dir = 'uploads/publicadas/' . $entidade . '/' . $dirdata;

        } else {

            mkdir("uploads/publicadas/$entidade/$dirdata", 0777, true);

            $dir = 'uploads/publicadas/' . $entidade . '/' . $dirdata;

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

                    $msg[] = "<b> $name : </b>" . $error['asdas'];

                }

                if (array_search($type, $tiposPermitidos) === false) {



                    redirect(site_url('publicadas/cadastro/5'));

                    // Não houveram erros, move o arquivo

                } else {





                    if (move_uploaded_file($tmp, $dir . "/" . $name)) {





                        $obj['arquivo'] = $name;

                        $obj['key'] = $key;

                        if ($this->db->insert('upload_arquivo_publicado', $obj)) {



//                            redirect('index.php/publicacoes/2'); 

                        }

                    } else {

                        $msg[] = "<b> $name : </b> ocorreu erro";

                    }

                }

            }redirect(site_url('publicar/2'));

        }

    }



    public function updoc($entidade, $data, $id) {



        date_default_timezone_set('America/Sao_Paulo');

        $file = $_FILES['ar'];

        $numFile = count(array_filter($file['name']));



        switch (date("m", strtotime($data))) {

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

         if (is_dir("uploads/publicadas/$entidade/$dirdata")) {

            $dir = 'uploads/publicadas/' . $entidade . '/' . $dirdata;

        } else {

            mkdir("uploads/publicadas/$entidade/$dirdata", 0777, true);

            $dir = 'uploads/publicadas/' . $entidade . '/' . $dirdata;

        }

        // fim diretorio



        if ($numFile <= 0) {

            echo "<script>alert('Selecione uma imagem')</script>";

            echo "<script type=\"text/javascript\">

		  window.setTimeout(\"location.href='index.php?pg=envio';\", 2000);

		</script>";

        } else {

            $key = $id;

            for ($i = 0; $i < $numFile; $i++) {



                $name = rand(5, 10000).md5($file['name'][$i]);

           

				$type = $file['type'][$i];

                $size = $file['size'][$i];

                $error = $file['error'][$i];

                $tmp = $file['tmp_name'][$i];

                $tiposPermitidos = array('application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf');





                if ($error != 0) {

                    $msg[] = "<b> $name : </b>" . $error[$i];

                }

                if (array_search($type, $tiposPermitidos) === false) {



                    redirect(site_url('publicadas/cadastro/5'));

                    // Não houveram erros, move o arquivo

                } else {





                    if (move_uploaded_file($tmp, $dir . "/" . $name)) {



                        date_default_timezone_set('America/Sao_Paulo');

                        $date = date('Y-m-d');

                        $obj['arquivo'] = base_url(). $dir. '/' .$name;

                        $obj['key'] = $key;

                        $obj['entidade'] = $entidade;

                        $obj['data'] = $data;

                        $obj['datapublicada'] = $date;

                        $obj['usuario'] = $this->session->userdata('nome');



                        $this->db->insert('upload_arquivo_publicado', $obj);

                    } else {

                        $msg[] = "<b> $name : </b> ocorreu erro";

                    }

                }

            }return $key;

        }

    }
	
	
	
	public function updoc2($entidade, $data, $id) {



        date_default_timezone_set('America/Sao_Paulo');

        $file = $_FILES['ar'];

        $numFile = count(array_filter($file['name']));



        switch (date("m", strtotime($data))) {

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

          if (is_dir("uploads/publicadas/$entidade/$dirdata")) {

            $dir = 'uploads/publicadas/' . $entidade . '/' . $dirdata;

        } else {

            mkdir("uploads/publicadas/$entidade/$dirdata", 0777, true);

            $dir = 'uploads/publicadas/' . $entidade . '/' . $dirdata;

        }

        // fim diretorio



        if ($numFile <= 0) {

            echo "<script>alert('Selecione uma imagem')</script>";

            echo "<script type=\"text/javascript\">

		  window.setTimeout(\"location.href='index.php?pg=envio';\", 2000);

		</script>";

        } else {

            $cod_envio = $id;

            for ($i = 0; $i < $numFile; $i++) {



                $name = md5(rand(100000, 100000000)).$file['name'][$i];

           

				$type = $file['type'][$i];

                $size = $file['size'][$i];

                $error = $file['error'][$i];

                $tmp = $file['tmp_name'][$i];

                $tiposPermitidos = array('application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf' , 'application/x-zip', 'application/zip', 'application/x-zip-compressed');





                if ($error != 0) {

                    $msg[] = "<b> $name : </b>" . $error[$i];

                }

                if (array_search($type, $tiposPermitidos) === false) {



                    redirect(site_url('publicar/verpub/5'));

                    // Não houveram erros, move o arquivo

                } else {





                    if (move_uploaded_file($tmp, $dir . "/" . $name)) {


                        date_default_timezone_set('America/Sao_Paulo');

                        $date = date('Y-m-d');

                        $obj['arquivo'] = base_url(). $dir. '/' .$name;

                        $obj['cod_envio'] = $cod_envio;

                        $obj['data'] = $data;

                        $obj['data_publicar'] = $date;

                        $obj['usuario'] = $this->session->userdata('nome');

                        $this->db->insert('upload_arquivo', $obj);

                    } else {

                        $msg[] = "<b> $name : </b> ocorreu erro";

                    }

                }

            } return $cod_envio;

        }

    }



}

