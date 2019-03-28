<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicar extends CI_Controller {

    public function index($indice = null) {
        $this->load->model('validalogin');
        $this->validalogin->valida();
        $this->load->model('publicadas');
        if ($this->session->userdata('permissao') != "administrador") {
            $data['publicacoes'] = $this->publicar->getPublicacao($this->session->userdata('entidade'));
        } else {
            $data['publicacoes'] = $this->publicadas->getPublicacaosuper();
        }
        $this->load->view('includes/import');
        $this->load->view('includes/header');
           if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
      }else{
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
           if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
      }else{
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

    public function view_publicacao($indice = NULL) {

        $this->load->model('validalogin');
        $this->validalogin->valida();
        $this->load->model('publicadas');
        $data['publicacao'] = $this->publicadas->getpublicacao_key($indice);


        $this->load->view('includes/import');
        $this->load->view('includes/header');
if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
      }else{
              $this->load->view('includes/menu'); 
        }
        $this->load->view('publicar/view_publicacao', $data);
        $this->load->view('includes/footer');
    }

    public function alterar($indice = null) {
        $this->load->model('md_tppublicacao');
        $data['tppublicacao'] = $this->md_tppublicacao->gettppublica();
        $this->load->model('publicadas');
        $data['publicacao'] = $this->publicadas->getpublicacao_key($indice);

        $this->load->view('includes/import');
        $this->load->view('includes/header');
   if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
      }else{
              $this->load->view('includes/menu'); 
        }
        $this->load->view('publicar/alterar', $data);
        $this->load->view('includes/footer');
    }

    public function status($indice = null) {
        $this->load->model('publicadas');
        $this->publicadas->status($indice);
    }

    public function print_publicacao($indice = NULL) {

        $this->load->model('validalogin');
        $this->validalogin->valida();
        $this->load->model('publicacao');
        $data['publicacao'] = $this->publicacao->getpublicacao_key($indice);


        $this->load->view('includes/import');


        $this->load->view('publicadas/print_publicacao', $data);
    }

    public function delete_file($indice = NULL) {


        $this->load->model('publicadas');
        if ($this->publicadas->delete_file($indice)) {
            redirect('publicar');
        }
    }

    public function salvar() {

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
       
        if (  $this->publicadas->setpublicacao($data)) {
              $this->load->model('publicacao');
        $this->publicacao->status($dados[0]->id);
            redirect('index.php/publicar/1');
        } else {
            redirect('index.php/publicar/2');
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

        $this->load->model('publicadas');
        if ($this->publicadas->update($data, $this->input->post('id'))) {
            redirect('publicar/2');
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

        $query = $this->db->get_where('publicadas', array('id' => $id));

        foreach ($query->result() as $row) {
            $key = $row->keyarquivo;



            $file = "uploads/publicadas/" . $entidade . "/" . $dirdata . "/" . $row->keyarquivo;
            if (is_file($file)) {
                if (is_readable($file) && unlink($file)) {
                    if ($this->db->delete('publicacoes', array('id' => $id))) {
                        $this->db->delete('upload_arquivo_publicado', array('key' => $row->keyarquivo));
                        redirect('index.php/publicadas/3');
//                        redirect('publicacoes/3');
                    }
                } else {
                    
                }
            } else {
                if ($this->db->delete('publicadas', array('id' => $id))) {
                    $this->db->delete('upload_arquivo_publicado', array('key' => $row->keyarquivo));
                    redirect('index.php/publicar/3');
//                    $this->index();
                }
            }
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
                    $msg[] = "<b> $name : </b>" . $error[$erromsg];
                }
                if (array_search($type, $tiposPermitidos) === false) {

                    redirect('index.php/publicadas/cadastro/5');
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
            }redirect('index.php/publicar/2');
        }
    }

    public function updoc($entidade, $data) {
        date_default_timezone_set('America/Sao_Paulo');
        $dataatual = date("Y/m/d");

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
            $key = $entidade . rand(0, 20) . $protocolo;
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

                    redirect('index.php/publicadas/cadastro/5');
                    // Não houveram erros, move o arquivo
                } else {


                    if (move_uploaded_file($tmp, $dir . "/" . $name)) {


                        $obj['arquivo'] = $name;
                        $obj['key'] = $key;
                        $obj['entidade'] = $entidade;
                        $obj['data'] = $data;
                        $obj['datapublicada'] = $dataatual;
                          $obj['usuario'] = $this->session->userdata('nome');
                        
                        $this->db->insert('upload_arquivo_publicado', $obj);
                    } else {
                        $msg[] = "<b> $name : </b> ocorreu erro";
                    }
                }
            }return $key;
        }
    }

}
