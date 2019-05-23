<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Um3Um extends CI_Controller {

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
            $data['msg'] = "Já existe!";
            $this->load->view('includes/msg_danger', $data);
        }

        $this->load->model('um3um_model');
        $dados['data'] = $this->um3um_model->getall();

        $this->load->view('131/view', $dados);
        $this->load->view('includes/footer');
    }

    public function viewdetalhe($competencia = NULL, $ano = null) {

        ini_set('default_charset', 'UTF-8');

        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            redirect(site_url('home'));
        }

        $this->load->model('um3um_model');
        $dados['data'] = $this->um3um_model->getalldetalhe($competencia, $ano);

        $this->load->view('131/view_detalhe', $dados);
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
        $this->load->view('131/cadastro');
        $this->load->view('includes/footer');
    }

    public function cadastroGeral() {

        ini_set('default_charset', 'UTF-8');

        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            redirect(site_url('home'));
        }
        $this->load->view('131/cadastroGeral');
        $this->load->view('includes/footer');
    }

    public function reportPdf() {

        ini_set('default_charset', 'UTF-8');

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

    public function printReport() {

        ini_set("memory_limit", "1128M");
        ini_set("pcre.backtrack_limit", "1000000000");
        $filtro['tipo'] = $this->input->post('tipo');
        $filtro['inicio'] = $this->input->post('competenciaa');
        $filtro['fim'] = $this->input->post('competenciab');
        $filtro['ano'] = $this->input->post('ano');

        $filtro['operacao'] = $this->input->post('operacao');




        $this->load->model('um3um_model');

        $query['dados'] = $filtro;

        require_once('vendor/autoload.php');
        $mpdf = new \Mpdf\Mpdf();
        if ($filtro['tipo'] == 1) {
            $query['itens'] = $this->um3um_model->getDespesaReport($filtro);
            $html = $this->load->view("report/reportDespesa", $query, true);
            $mpdf->SetTitle('Relatorio de Despesa');
        } else {
            $query['itens'] = $this->um3um_model->getReceitaReport($filtro);
            $html = $this->load->view("report/reportReceita", $query, true);
            $mpdf->SetTitle('Relatorio de Receita');
        }




        $mpdf->SetHeader('Mantido por WitsDigital - Relatório gerado em {DATE j/m/Y}');
        $mpdf->SetFooter('{PAGENO}');
        $mpdf->WriteHTML($html);

        $mpdf->Output();
    }

    public function apagar($id = null) {

        if ($this->session->userdata('permissao') == 'administrador') {
            if ($this->db->query('delete from dados_131 where id = ' . $id)) {
                redirect(site_url('Um3Um/3'));
            } else {
                echo 'erro';
            }
        } else {
            echo 'erro';
        }
    }

    public function visualizar($id, $tipo) {
        $this->load->view('includes/import');




        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            redirect(site_url('home'));
        }

        $this->load->model('um3um_model');
        $data['data'] = $this->um3um_model->getid($id, $tipo);

        if ($tipo == "RECEITA") {
            $this->load->view('131/view_receita', $data);
        } else {
            $this->load->view('131/view_despesa', $data);
        }


        $this->load->view('includes/footer');
    }

    public function step2() {



        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            redirect(site_url('home'));
        }


        $this->load->view('131/cadastro2');
        $this->load->view('includes/footer');
    }

    public function salvar() {
        $pm = 1;
        ini_set('default_charset', 'UTF-8');
        date_default_timezone_set('America/Sao_Paulo');

        header('Content-Type: text/html; charset=iso-8859-1');

        $entidade = $this->session->userdata('entidade');

        ini_set("memory_limit", "500M");
        set_time_limit(120);
        ini_set('max_input_nesting_level', 999);


        $tp_file = $this->input->post('tp_file');
        $cod_unidade_gestora = $this->input->post('unidade_gestora');
        $arquivo = $_FILES["arquivo"]["tmp_name"];
        $arquivo = file($arquivo); //abre o arquivo
        $total = count($arquivo);
        $tp = substr($arquivo[0], 1, 3);
        $ms = substr($arquivo[1], 34, 2);
        $nmfile = substr($arquivo[0], 1, 7);
        
        if ($nmfile == 'DESPESA' && $tp_file == 1) {
            echo "<script>alert('Arquivo txt e tipo de arquivo divergem');</script>";
            $pm = 0;
        } else {
            if ($nmfile == 'RECEITA' && $tp_file == 2) {
                echo "<script>alert('Arquivo txt e tipo de arquivo divergem');</script>";
                $pm = 0;
            }
        }
        if ($pm == 0) {

            echo " <script>

  window.history.back();

</script> ";
        } else {

            $qy['entidade'] = $entidade;

            $qy['arquivo'] = substr($arquivo[0], 1, 7);
            $qy['usuario'] = $this->session->userdata('nome');
            $qy['data_envio'] = date("Y-m-d");
            $qy['hora_envio'] = date("H:i:s");

            $qy['competencia'] = $ms;
            $qy['mes_competencia'] = $competencia;

            if ($this->db->insert('dados_131', $qy)) {
                $cod = $this->db->insert_id();
               if($tp_file == 2){
                    $this->save_131_despesa($cod, $cod_unidade_gestora);
               }else{
                    $this->salvarreceita($_FILES["arquivo"]["tmp_name"], $cod, $ano, $cod_unidade_gestora);
           
               }
                
            }
        }
    }

    public function save_131_despesa($cod, $cod_unidade_gestora) {

        $arquivo = $_FILES["arquivo"]["tmp_name"];
        $arquivo = file($arquivo); //abre o arquivo
        $total = count($arquivo);
        $tp = substr($arquivo[0], 1, 3);
        $ms = substr($arquivo[1], 34, 2);
        $entidade = $this->session->userdata('entidade');
        for ($i = 1; $i < $total - 1; $i++) {

            header('Content-Type: text/html; charset=iso-8859-1');
            $codigo = substr($arquivo[$i], 0, 1);
            $unidade = substr($arquivo[$i], 1, 20);
            $data = substr($arquivo[$i], 21, 10);
            $data2 = substr($arquivo[$i], 31, 10);
            $tipo = substr($arquivo[$i], 41, 3);
            $processoadm = substr($arquivo[$i], 44, 30);
            $nprocesso = substr($arquivo[$i], 74, 30);
            $modalidade = substr($arquivo[$i], 45, 3);
            $descricao = htmlentities(substr($arquivo[$i], 104, 1000), ENT_QUOTES, "iso-8859-1");
            $credor = substr($arquivo[$i], 1104, 150);
            $doc = substr($arquivo[$i], 1254, 18);
            $valor = substr($arquivo[$i], 1272, 21);
            $funcao = htmlentities(substr($arquivo[$i], 1293, 150), ENT_QUOTES, "iso-8859-1");


            $subfuncao = htmlentities(substr($arquivo[$i], 1443, 150), ENT_QUOTES, "iso-8859-1");
            $natureza = htmlentities(substr($arquivo[$i], 1593, 150), ENT_QUOTES, "iso-8859-1");
            $fonte = htmlentities(substr($arquivo[$i], 1743, 150), ENT_QUOTES, "iso-8859-1");

            $empenho = substr($arquivo[$i], 1893, 30);
            $pro3 = substr($arquivo[$i], 1923, 30);

            $query['codigo'] = $codigo;
            $query['unid_orc'] = $unidade;
            $query['datapublicacao'] = $unidade;
            $query['data_mov'] = $data2;
            $query['tipo'] = $tipo;
            $query['num_pro_ad'] = $processoadm;
            $query['num_pro_lict'] = utf8_encode($nprocesso);
            $query['bem_servico'] = utf8_encode($descricao);
            $credor = utf8_encode($credor);

            $query['credor'] = $credor;
            $query['doc'] = $doc;
            $query['valor'] = $valor;
            $query['funcao'] = $funcao;
            $query['sub_funcao'] = $subfuncao;
            $query['natureza'] = $natureza;
            $query['fonte'] = $fonte;
            $query['empenho'] = $empenho;
            $query['processo_contratacao'] = utf8_encode($pro3);
            $query['entidade'] = $entidade;
            $query['competencia'] = $ms;
            $query['cod_dados_131'] = $cod;
            $query['ano'] = substr($data2, 6, 4);
            $query['cod_unidade_gestora'] = $cod_unidade_gestora;


            $this->db->insert('131_despesa_dados', $query);
        }
         redirect(site_url('Um3Um/1'));
    }

    public function salvarreceita($arquivo, $cod, $ano, $cod_unidade_gestora) {


        $entidade = $this->session->userdata('entidade');

        ini_set("memory_limit", "500M");
        set_time_limit(120);
        ini_set('max_input_nesting_level', 999);


        $arquivo = file($arquivo); //abre o arquivo
        $total = count($arquivo);
        $tp = substr($arquivo[0], 1, 3);
        $ms = substr($arquivo[1], 34, 2);

        for ($i = 1; $i < $total - 1; $i++) {


            $codigo = substr($arquivo[$i], 0, 1);
            $unidade = substr($arquivo[$i], 2, 21);
            $data = substr($arquivo[$i], 22, 10);
            $data2 = substr($arquivo[$i], 31, 10);
            $etapa = substr($arquivo[$i], 41, 4);
            $modalidade = substr($arquivo[$i], 45, 3);
            $descricao = htmlentities(substr($arquivo[$i], 48, 1000), ENT_QUOTES, "iso-8859-1");
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
            $query['descricao'] = utf8_encode($descricao);
            $query['valor'] = $valor;
            $query['fonte_recurso'] = utf8_encode($fonte);



            $natureza = utf8_encode($natureza);
            $query['natureza'] = $natureza;

            $query['destinacao'] = utf8_encode($destino);
            $query['entidade'] = $entidade;

            $query['competencia'] = $ms;
            $query['cod_dados_131'] = $cod;
         $query['ano'] = substr($data2, 6, 4);


            $query['cod_unidade_gestora'] = $cod_unidade_gestora;


            $this->db->insert('131_receita_dados', $query);
        }
        redirect(site_url('Um3Um/1'));
    }

    public function alterarreceita($cod, $id) {


        $this->db->where('cod', $cod);
        $this->db->where('id', $id);
        $this->db->where('entidade', $this->session->userdata('entidade'));

        $data['dados'] = $this->db->get('131_receita_dados')->result();

        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if ($this->session->userdata('permissao') == 'administrador') {
            $this->load->view('includes/menu_admin');
        } else {
            $this->load->view('includes/menu');
        }
        $this->load->view('131/alterar_rec', $data);
        $this->load->view('includes/footer');
    }

    public function updatereceita() {
        $data['valor'] = $this->input->post('valor');
        $data['data_registro'] = $this->input->post('data');
        $data['natureza'] = $this->input->post('natureza');
        $id = $this->input->post('id');
        $cod = $this->input->post('cod');
        $this->db->where('id', $id);
        $this->db->where('cod', $cod);
        $this->db->update('131_receita_dados', $data);
        redirect(site_url('Um3Um'));
    }

    public function getAllApp() {




        //$this->load->model('um3um_model');
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $this->db->group_by('mes_competencia');
        $query = $this->db->get('dados_131');

        echo json_encode($query->result());
    }

    public function getAllRecMes() {
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');


        $data = file_get_contents("php://input");
        $obj = json_decode($data);
        $this->db->where('competencia', $obj->competencia);
        $query = $this->db->get('131_receita_dados');
        echo json_encode($query->result());
    }

    public function getAllDespMes() {
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');


        $data = file_get_contents("php://input");
        $obj = json_decode($data);
        $this->db->where('competencia', $obj->competencia);
        $query = $this->db->get('131_despesa_dados');
        echo json_encode($query->result());
    }

}
