<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
    
    
	public function reportByfornecedor() {
		
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $data = file_get_contents("php://input");
        $objData = json_decode($data);



      
      if( isset($objData->cod_fornecedor)){
        $this->db->where('cod_fornecedor', $objData->cod_fornecedor); 
      }
      if( isset($objData->datain) && !isset($objData->dataout)){
        $data = str_replace("/", "-", $objData->datain);
        $objData->datain =  date('Y-m-d', strtotime($data));
        $this->db->where('data_vencimento >=',  $objData->datain);
      }
      if( isset($objData->dataout) && !isset($objData->datain)){
        $data = str_replace("/", "-", $objData->dataout);
        $objData->dataout =  date('Y-m-d', strtotime($data));
        $this->db->where('data_vencimento <=',  $objData->dataout);
    }
      if( isset($objData->datain) && isset($objData->dataout)){
        $data = str_replace("/", "-", $objData->datain);
        $objData->datain =  date('Y-m-d', strtotime($data));
        
        $data = str_replace("/", "-", $objData->dataout);
        $objData->dataout =  date('Y-m-d', strtotime($data));
        $this->db->where('data_vencimento <=',  $objData->dataout);

        $this->db->where('data_vencimento >=',  $objData->datain);
        $this->db->where('data_vencimento <=',  $objData->dataout);
      }
      if(isset($objData->tipo)){
     
        if($objData->tipo==1){
          $this->db->select('cp.*, fcd.*, emp.nome as nomeempresa');
            $this->db->from('contas_pagar cp, fornecedor fcd, empresa emp');
            $this->db->where('cp.cod_fornecedor = fcd.id_fornecedor');
       if( isset($objData->status)){
      if($objData->status==1){
        $this->db->where('cp.status = 1');
      }
      if($objData->status==0){
        $this->db->where('cp.status = 0');
      }
       }
            $this->db->where('emp.id_empresa = cp.cod_empresa');

            if( isset($objData->cod_empresa)){
            
              $this->db->where('cp.cod_empresa', $objData->cod_empresa); 
            }
     
          // $this->db->order_by("data_vencimento", "ASC"); 
          $this->db->order_by("cp.cod_fornecedor ", "ASC"); 
          $this->db->order_by("fcd.nome ", "ASC"); 

            $query = $this->db->get()->result();
          }
          if($objData->tipo==2){
              
            $query = $this->db->get('contas_receber')->result();
          }
      }
   

		echo json_encode($query);

    }
	public function byData() {
		
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $data = file_get_contents("php://input");
        $objData = json_decode($data);
        
        $datain = date('Y-m-d',strtotime($objData->datain));
        $dataout = date('Y-m-d',strtotime($objData->dataout));
        
        //$query = $this->db->query("SELECT sum(p.valor) as total, p.entrega, p.tp_pag, p.id_pedido, p.data,p.valor, u.nome, e.nome as nomemepresa FROM pedido p, usuario u, empresa e WHERE e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario AND (p.data BETWEEN '2018-09-01' AND '2018-09-29')")->result();
        
        
     $query = $this->db->query("SELECT p.entrega, p.tp_pag, p.id_pedido, p.data,p.valor, u.nome, e.nome as nomemepresa FROM pedido p, usuario u, empresa e WHERE e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario AND (p.data BETWEEN '".$datain."' AND '".$dataout."')")->result();
     $dados = $this->db->query("SELECT sum(p.valor) as total, sum(p.entrega) as totalentrega, count(*) as totalreg FROM pedido p, usuario u, empresa e WHERE e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario AND (p.data BETWEEN '".$datain."' AND '".$dataout."')")->result();
     $topitens = $this->db->query("SELECT COUNT(*) as totalreg, prod.nome, prod.image FROM pedido p, pedido_itens pi, produto prod where prod.id_produto = pi.cod_produto AND p.id_pedido = pi.cod_pedido AND (p.data BETWEEN '".$datain."' AND '".$dataout."') GROUP BY pi.cod_produto order by totalreg DESC LIMIT 5")->result();
    
    $obj['dados'] = $query;
    $obj['total'] = $dados;
    $obj['top'] = $topitens;

		echo json_encode($obj);

    }
    

		public function byAtual() {
		
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $data = file_get_contents("php://input");
        $objData = json_decode($data);
        
 
      
    
     $query = $this->db->query("SELECT p.entrega, p.tp_pag, p.id_pedido, p.data,p.valor, u.nome, e.nome as nomemepresa FROM pedido p, usuario u, empresa e WHERE e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario AND p.data >= DATE_SUB( DATE( NOW() ), INTERVAL DAY( NOW() ) -1 DAY ) ORDER BY p.data DESC")->result();
     $dados = $this->db->query("SELECT sum(p.valor) as total, sum(p.entrega) as totalentrega, count(*) as totalreg FROM pedido p, usuario u, empresa e WHERE e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario AND p.data >= DATE_SUB( DATE( NOW() ), INTERVAL DAY( NOW() ) -1 DAY ) ORDER BY p.data DESC")->result();
     $topitens = $this->db->query("SELECT COUNT(*) as totalreg, prod.nome, prod.image FROM pedido p, pedido_itens pi, produto prod where prod.id_produto = pi.cod_produto AND p.id_pedido = pi.cod_pedido AND p.data >= DATE_SUB( DATE( NOW() ), INTERVAL DAY( NOW() ) -1 DAY ) GROUP BY pi.cod_produto order by totalreg DESC LIMIT 5")->result();
    
    $obj['dados'] = $query;
    $obj['total'] = $dados;
      $obj['top'] = $topitens;

		echo json_encode($obj);

    }
    
 
	
	
	// reports por empresa
	
	
	    public function byDataEmp() {
		
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $data = file_get_contents("php://input");
        $objData = json_decode($data);
        
        $datain = date('Y-m-d',strtotime($objData->datain));
        $dataout = date('Y-m-d',strtotime($objData->dataout));
        $empresa =$objData->empresa;
        
        //$query = $this->db->query("SELECT sum(p.valor) as total, p.entrega, p.tp_pag, p.id_pedido, p.data,p.valor, u.nome, e.nome as nomemepresa FROM pedido p, usuario u, empresa e WHERE e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario AND (p.data BETWEEN '2018-09-01' AND '2018-09-29')")->result();
        
        
     $query = $this->db->query("SELECT fp.*, p.entrega, p.tp_pag, p.id_pedido, p.data,p.valor, u.nome, e.nome as nomemepresa FROM forma_pagamento fp, pedido p, usuario u, empresa e WHERE  p.tp_pag = fp.id_forma_pagamento AND p.status= 4 AND e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario AND (p.data BETWEEN '".$datain."' AND '".$dataout."') AND e.id_empresa = ".$empresa)->result();
     $dados = $this->db->query("SELECT sum(p.valor) as total,  (SELECT sum(p.valor) FROM pedido p, forma_pagamento fp WHERE (p.data BETWEEN '".$datain."' AND '".$dataout."') AND p.tp_pag = fp.id_forma_pagamento and fp.tipo = 3 and p.cod_empresa = ".$empresa.") as cartao_credito,(SELECT sum(p.valor) FROM pedido p, forma_pagamento fp WHERE  (p.data BETWEEN '".$datain."' AND '".$dataout."') AND p.tp_pag = fp.id_forma_pagamento and fp.tipo = 2 and p.cod_empresa = ".$empresa.") as cartao_debito,  ( SELECT sum(p.valor) FROM pedido p WHERE  (p.data BETWEEN '".$datain."' AND '".$dataout."') AND p.cod_empresa = ".$empresa." AND p.tp_pag = 1 ) as dinheiro, sum(p.entrega) as totalentrega, count(*) as totalreg FROM pedido p, usuario u, empresa e WHERE p.status= 4 AND e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario AND (p.data BETWEEN '".$datain."' AND '".$dataout."') AND e.id_empresa = ".$empresa)->result();
     $topitens = $this->db->query("SELECT COUNT(*) as totalreg, prod.nome, prod.image FROM pedido p, pedido_itens pi, produto prod where p.status= 4 AND prod.id_produto = pi.cod_produto AND p.id_pedido = pi.cod_pedido AND (p.data BETWEEN '".$datain."' AND '".$dataout."') AND p.cod_empresa = ".$empresa." GROUP BY pi.cod_produto order by totalreg DESC LIMIT 5")->result();
    
    $obj['dados'] = $query;
    $obj['total'] = $dados;
    $obj['top'] = $topitens;

		echo json_encode($obj);

    }
    
       public function byAtualByEmp() {
		
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $data = file_get_contents("php://input");
        $objData = json_decode($data);
             $empresa =$objData;
 
      
    
     $query = $this->db->query("SELECT fp.*, p.entrega, p.tp_pag, p.id_pedido, p.data,p.valor, u.nome, e.nome as nomemepresa FROM pedido p, usuario u, empresa e, forma_pagamento fp WHERE p.tp_pag = fp.id_forma_pagamento AND p.status=4 AND e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario AND p.data >= DATE_SUB( DATE( NOW() ), INTERVAL DAY( NOW() ) -1 DAY ) AND e.id_empresa = ".$empresa." ORDER BY p.data DESC")->result();
     $dados = $this->db->query("SELECT sum(p.valor) as total,  (SELECT sum(p.valor) FROM pedido p, forma_pagamento fp WHERE p.status = 4 AND p.tp_pag = fp.id_forma_pagamento and fp.tipo = 3 and p.cod_empresa = ".$empresa.") as cartao_credito,  (SELECT sum(p.valor) FROM pedido p, forma_pagamento fp WHERE p.status = 4 AND p.tp_pag = fp.id_forma_pagamento and fp.tipo = 2 and p.cod_empresa = ".$empresa.") as cartao_debito, ( SELECT sum(p.valor) FROM pedido p WHERE p.status = 4 AND p.cod_empresa = ".$empresa." AND p.tp_pag = 1 ) as dinheiro, sum(p.entrega) as totalentrega, count(*) as totalreg FROM pedido p, usuario u, empresa e WHERE p.status=4 AND e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario AND p.data >= DATE_SUB( DATE( NOW() ), INTERVAL DAY( NOW() ) -1 DAY )  AND e.id_empresa = ".$empresa." ORDER BY p.data DESC")->result();
     $topitens = $this->db->query("SELECT COUNT(*) as totalreg, prod.nome, prod.image FROM pedido p, pedido_itens pi, produto prod where p.status=4 AND prod.id_produto = pi.cod_produto AND p.id_pedido = pi.cod_pedido AND p.data >= DATE_SUB( DATE( NOW() ), INTERVAL DAY( NOW() ) -1 DAY )  AND p.cod_empresa = ".$empresa." GROUP BY pi.cod_produto order by totalreg DESC LIMIT 5")->result();
    
    $obj['dados'] = $query;
    $obj['total'] = $dados;
      $obj['top'] = $topitens;

		echo json_encode($obj);

    }
       public function totalvendas() {
		
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $data = file_get_contents("php://input");
        $objData = json_decode($data);
             $empresa =$objData;

 $query = $this->db->query("SELECT count(*) total FROM pedido p WHERE p.cod_empresa = ".$empresa." and p.status = 4")->result();
    

		echo json_encode($query);

    
	
	
	   }
       public function graficosReport() {
		
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $data = file_get_contents("php://input");
        $objData = json_decode($data);
           $empresa =$objData;



 $query['vendas'] = $this->db->query("SELECT MONTH(pedido.data) mes, sum(pedido.valor) totalvenda FROM `pedido` WHERE pedido.cod_empresa =".$empresa." and pedido.data BETWEEN ADDDATE(LAST_DAY(SUBDATE(CURDATE(), INTERVAL 7 MONTH)), 1) AND LAST_DAY(DATE_SUB(curdate(), INTERVAL 0 month)) group by MONTH(pedido.data)
 ")->result();
 $query['despesas'] = $this->db->query("SELECT MONTH(contas_pagar.data) mes, sum(contas_pagar.valor) total FROM `contas_pagar` WHERE contas_pagar.status=1 AND contas_pagar.cod_empresa = ".$empresa." and contas_pagar.data BETWEEN ADDDATE(LAST_DAY(SUBDATE(CURDATE(), INTERVAL 7 MONTH)), 1) AND LAST_DAY(DATE_SUB(curdate(), INTERVAL 0 month)) group by MONTH(contas_pagar.data)
 ")->result();
 $query['despesaspagas'] = $this->db->query("SELECT MONTH(contas_pagar.data) mes, sum(contas_pagar.valor) total FROM `contas_pagar` WHERE contas_pagar.status=2 AND contas_pagar.cod_empresa = ".$empresa." and contas_pagar.data BETWEEN ADDDATE(LAST_DAY(SUBDATE(CURDATE(), INTERVAL 7 MONTH)), 1) AND LAST_DAY(DATE_SUB(curdate(), INTERVAL 0 month)) group by MONTH(contas_pagar.data)
 ")->result();
    

		echo json_encode($query);

    
	
	
	   }
	
	
	
	
	
	
	
	public function byDatapdv() {
		
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $data = file_get_contents("php://input");
        $objData = json_decode($data);
        
        $datain = date('Y-m-d',strtotime($objData->datain));
        $dataout = date('Y-m-d',strtotime($objData->dataout));
        
        //$query = $this->db->query("SELECT sum(p.valor) as total, p.entrega, p.tp_pag, p.id_pedido, p.data,p.valor, u.nome, e.nome as nomemepresa FROM pedido p, usuario u, empresa e WHERE e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario AND (p.data BETWEEN '2018-09-01' AND '2018-09-29')")->result();
        
        
     $query = $this->db->query("SELECT p.entrega, p.tp_pag, p.id_pedido, p.data,p.valor, u.nome, e.nome as nomemepresa FROM pedido p, usuario u, empresa e WHERE e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario and p.tipo_venda_pdv = 0 and p.origem = 2 AND (p.data BETWEEN '".$datain."' AND '".$dataout."')")->result();
     $dados = $this->db->query("SELECT sum(p.valor) as total, sum(p.entrega) as totalentrega, count(*) as totalreg FROM pedido p, usuario u, empresa e WHERE e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario and p.tipo_venda_pdv = 0 and p.origem = 2 AND (p.data BETWEEN '".$datain."' AND '".$dataout."')")->result();
     $topitens = $this->db->query("SELECT COUNT(*) as totalreg, prod.nome, prod.image FROM pedido p, pedido_itens pi, produto prod where prod.id_produto = pi.cod_produto AND p.id_pedido = pi.cod_pedido and p.tipo_venda_pdv = 0 and p.origem = 2 AND (p.data BETWEEN '".$datain."' AND '".$dataout."') GROUP BY pi.cod_produto order by totalreg DESC LIMIT 5")->result();
    
    $obj['dados'] = $query;
    $obj['total'] = $dados;
    $obj['top'] = $topitens;

		echo json_encode($obj);

    }
    

		public function byAtualpdv() {
		
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $data = file_get_contents("php://input");
        $objData = json_decode($data);
        
 
      
    
     $query = $this->db->query("SELECT p.entrega, p.tp_pag, p.id_pedido, p.data,p.valor, u.nome, e.nome as nomemepresa FROM pedido p, usuario u, empresa e WHERE e.id_empresa = p.cod_empresa and p.tipo_venda_pdv = 0 and p.origem = 2 AND u.id = p.cod_usuario AND p.data >= DATE_SUB( DATE( NOW() ), INTERVAL DAY( NOW() ) -1 DAY ) ORDER BY p.data DESC")->result();
     $dados = $this->db->query("SELECT sum(p.valor) as total, sum(p.entrega) as totalentrega, count(*) as totalreg FROM pedido p, usuario u, empresa e WHERE e.id_empresa = p.cod_empresa and p.tipo_venda_pdv = 0 and p.origem = 2 AND u.id = p.cod_usuario AND p.data >= DATE_SUB( DATE( NOW() ), INTERVAL DAY( NOW() ) -1 DAY ) ORDER BY p.data DESC")->result();
     $topitens = $this->db->query("SELECT COUNT(*) as totalreg, prod.nome, prod.image FROM pedido p, pedido_itens pi, produto prod where prod.id_produto = pi.cod_produto and p.tipo_venda_pdv = 0 and p.origem = 2 AND p.id_pedido = pi.cod_pedido AND p.data >= DATE_SUB( DATE( NOW() ), INTERVAL DAY( NOW() ) -1 DAY ) GROUP BY pi.cod_produto order by totalreg DESC LIMIT 5")->result();
    
    $obj['dados'] = $query;
    $obj['total'] = $dados;
      $obj['top'] = $topitens;

		echo json_encode($obj);

    }
    
 
	
	
	// reports por empresa
	
	
	public function byDataEmppdv() {
		
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $data = file_get_contents("php://input");
        $objData = json_decode($data);
        
        $datain = date('Y-m-d',strtotime($objData->datain));
        $dataout = date('Y-m-d',strtotime($objData->dataout));
        $empresa =$objData->empresa;
        
        //$query = $this->db->query("SELECT sum(p.valor) as total, p.entrega, p.tp_pag, p.id_pedido, p.data,p.valor, u.nome, e.nome as nomemepresa FROM pedido p, usuario u, empresa e WHERE e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario AND (p.data BETWEEN '2018-09-01' AND '2018-09-29')")->result();
        
        
     $query = $this->db->query("SELECT fp.*, p.entrega, p.tp_pag, p.id_pedido, p.data,p.valor, u.nome, e.nome as nomemepresa FROM forma_pagamento fp, pedido p, usuario u, empresa e WHERE  p.tp_pag = fp.id_forma_pagamento AND e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario AND (p.data BETWEEN '".$datain."' AND '".$dataout."') AND e.id_empresa = ".$empresa .' and p.tipo_venda_pdv = 0 and p.origem = 2')->result();
     $dados = $this->db->query("SELECT sum(p.valor) as total,  (SELECT sum(p.valor) FROM pedido p, forma_pagamento fp WHERE (p.data BETWEEN '".$datain."' AND '".$dataout."') AND p.tp_pag = fp.id_forma_pagamento and fp.tipo = 3 and p.tipo_venda_pdv = 0 and p.origem = 2 and p.cod_empresa = ".$empresa.") as cartao_credito,(SELECT sum(p.valor) FROM pedido p, forma_pagamento fp WHERE  (p.data BETWEEN '".$datain."' AND '".$dataout."') AND p.tp_pag = fp.id_forma_pagamento and fp.tipo = 2 and p.tipo_venda_pdv = 0 and p.origem = 2 and p.cod_empresa = ".$empresa.") as cartao_debito,  ( SELECT sum(p.valor) FROM pedido p WHERE  (p.data BETWEEN '".$datain."' AND '".$dataout."') AND p.cod_empresa = ".$empresa." AND  p.tipo_venda_pdv = 0 and p.origem = 2 and p.tp_pag = 1 ) as dinheiro, sum(p.entrega) as totalentrega, count(*) as totalreg FROM pedido p, usuario u, empresa e WHERE e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario AND (p.data BETWEEN '".$datain."' AND '".$dataout."') AND e.id_empresa = ".$empresa)->result();
     $topitens = $this->db->query("SELECT COUNT(*) as totalreg, prod.nome, prod.image FROM pedido p, pedido_itens pi, produto prod where prod.id_produto = pi.cod_produto AND p.id_pedido = pi.cod_pedido AND (p.data BETWEEN '".$datain."' AND '".$dataout."') AND p.cod_empresa = ".$empresa." and p.tipo_venda_pdv = 0 and p.origem = 2 GROUP BY pi.cod_produto order by totalreg DESC LIMIT 5")->result();
    
    $obj['dados'] = $query;
    $obj['total'] = $dados;
    $obj['top'] = $topitens;

		echo json_encode($obj);

    }
	
	       public function byAtualByEmppdv() {
		
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $data = file_get_contents("php://input");
        $objData = json_decode($data);
        $empresa =$objData;
 
      
    
     $query = $this->db->query("SELECT fp.*, p.entrega, p.tp_pag, p.id_pedido, p.data,p.valor, u.nome, e.nome as nomemepresa FROM pedido p, usuario u, empresa e, forma_pagamento fp WHERE p.tp_pag = fp.id_forma_pagamento AND e.id_empresa = p.cod_empresa and p.tipo_venda_pdv = 0 and p.origem = 2 AND u.id = p.cod_usuario AND p.data >= DATE_SUB( DATE( NOW() ), INTERVAL DAY( NOW() ) -1 DAY ) AND e.id_empresa = ".$empresa." ORDER BY p.data DESC")->result();
     $dados = $this->db->query("SELECT sum(p.valor) as total,  (SELECT sum(p.valor) FROM pedido p, forma_pagamento fp WHERE p.tp_pag = fp.id_forma_pagamento and fp.tipo = 3 and p.cod_empresa = ".$empresa.") as cartao_credito,  (SELECT sum(p.valor) FROM pedido p, forma_pagamento fp WHERE p.tipo_venda_pdv = 0 and p.origem = 2 AND p.tp_pag = fp.id_forma_pagamento and fp.tipo = 2 and p.cod_empresa = ".$empresa.") as cartao_debito, ( SELECT sum(p.valor) FROM pedido p WHERE  p.cod_empresa = ".$empresa." AND p.tp_pag = 1 ) as dinheiro, sum(p.entrega) as totalentrega, count(*) as totalreg FROM pedido p, usuario u, empresa e WHERE e.id_empresa = p.cod_empresa AND u.id = p.cod_usuario AND p.data >= DATE_SUB( DATE( NOW() ), INTERVAL DAY( NOW() ) -1 DAY )  AND e.id_empresa = ".$empresa." ORDER BY p.data DESC")->result();
     $topitens = $this->db->query("SELECT COUNT(*) as totalreg, prod.nome, prod.image FROM pedido p, pedido_itens pi, produto prod where prod.id_produto = pi.cod_produto AND p.id_pedido = pi.cod_pedido AND p.data >= DATE_SUB( DATE( NOW() ), INTERVAL DAY( NOW() ) -1 DAY ) and p.tipo_venda_pdv = 0 and p.origem = 2  AND p.cod_empresa = ".$empresa." GROUP BY pi.cod_produto order by totalreg DESC LIMIT 5")->result();
    
    $obj['dados'] = $query;
    $obj['total'] = $dados;
      $obj['top'] = $topitens;

		echo json_encode($obj);

    }
    

    public function totalvendaspdv() {
		
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $data = file_get_contents("php://input");
        $objData = json_decode($data);
             $empresa =$objData;

		$query = $this->db->query("SELECT count(*) total FROM pedido p WHERE p.cod_empresa = ".$empresa." and p.origem=2 and p.tipo_venda_pdv = 0")->result();
    

		echo json_encode($query);

    }
	
	
	public function relatoriopdv() {
		
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $data = file_get_contents("php://input");
        $objData = json_decode($data);
        $empresa =$objData->cod_empresa;

		$query['somatoria'] = $this->db->query("SELECT sum(total_dinheiro) as dinheiro, sum(total_cartao_credito) as credito, sum(total_cartao_debito) as debito, sum(total_boleto) as boleto, sum(total_saque) as saque, sum(total_deposito) as deposito  FROM caixa  WHERE status = 2")->result();
		

		echo json_encode($query);

    }
	
	
	public function relatoriopdv_pesquisa() {
		
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $data = file_get_contents("php://input");
        $objData = json_decode($data);
        
        $datain = date('Y-m-d',strtotime($objData->datain));
        $dataout = date('Y-m-d',strtotime($objData->dataout));
        $empresa =$objData->empresa;
        
        $query['somatoria'] = $this->db->query("SELECT sum(total_dinheiro) as dinheiro, sum(total_cartao_credito) as credito, sum(total_cartao_debito) as debito, sum(total_boleto) as boleto, sum(total_saque) as saque, sum(total_deposito) as deposito  FROM caixa  WHERE (data_fechamento BETWEEN '".$datain."' AND '".$dataout."') and status = 2 and cod_empresa = ".$empresa)->result();
		
		
		echo json_encode($query);
		

    }
	
	
	
	public function getPacientes() {
		
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $data = file_get_contents("php://input");
        $objData = json_decode($data);
        $this->db->where('permissao',5);
   if(isset($objData->cod_empresa)){
    if($objData->cod_empresa>0){
      $this->db->where('cod_empresa', $objData->cod_empresa);
     }
   }   
   if(isset($objData->turno)){
   if($objData->turno>0){
    $this->db->where('turno', $objData->turno);
   }
   }   
   
   $this->db->order_by("nome ", "ASC"); 
        $query = $this->db->get('usuario')->result();
		echo json_encode( $query);
		
    }
	public function getcontasPagar_relatorio() {
		
		header("Access-Control-Allow-Origin: *");
        header('Content-Type: text/html; charset=utf-8');

        $data = file_get_contents("php://input");
        $objData = json_decode($data);
        
        
        
        $query['contas'] = $this->db->query("SELECT * from contas_pagar join empresa on contas_pagar.cod_empresa = empresa.id_empresa where contas_pagar.status = 1")->result();
		
		
		echo json_encode($query);
		

    }


  	public function Painel_getfornecedores() {
		

      header("Access-Control-Allow-Origin: *");
      header('Content-Type: text/html; charset=utf-8');
      header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

      $data = file_get_contents("php://input");
      $objData = json_decode($data);
		 $dados['fornecedores'] = $this->db->query('select fornecedor.*, empresa.nome as nome_empresa from fornecedor join empresa on empresa.id_empresa = fornecedor.cod_empresa')->result();
      if(isset($objData->cod_empresa)){
        if( $objData->permissao<2){
         $dados['fornecedores'] = $this->db->query('select fornecedor.*, empresa.nome as nome_empresa from fornecedor join empresa on empresa.id_empresa = fornecedor.cod_empresa')->result();
        }
       if($objData->permissao>=2){
          $dados['fornecedores'] = $this->db->query('select fornecedor.*, empresa.nome as nome_empresa from fornecedor join empresa on empresa.id_empresa = fornecedor.cod_empresa where cod_empresa = '.$objData->cod_empresa)->result();
        
       }
 
      }
      



$i=0;
foreach($dados['fornecedores'] as $row){
  $dados['fornecedores'][$i]->telefones = $this->db->query('select * from telefone_fornecedor where cod_fornecedor ='.$row->id_fornecedor)->result();
  $i++;
}
      
  
      echo json_encode($dados);
}
    public function imprimirFornecedor($id = null) {

      $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
      $decoded = base64_decode($id);
      $ar = json_decode($decoded, true);

     if(isset($ar['cod_empresa'])){
       if( $ar['permissao']==2){
        $this->db->where('cod_empresa',$ar['cod_empresa']);
       }
      if($ar['permissao']<2){
        $this->db->where('cod_empresa',$ar['cod_empresa']);
      }

     }
      $query = $this->db->get('fornecedor')->result();
    

      $dados['fornecedores'] = $query;

      $i=0;
	foreach($dados['fornecedores'] as $row){
		$dados['fornecedores'][$i]->telefones = $this->db->query('select * from telefone_fornecedor where cod_fornecedor ='.$row->id_fornecedor)->result();
		$i++;
	}
      
print_r($ar);


//  $this->load->view("pedidos/imprimirFornecedores",  $dados);
    $html = $this->load->view("pedidos/imprimirFornecedores",  $dados, true);
     $mpdf->SetHeader('Mantido por WitsDigital - Relatório gerado em {DATE j/m/Y}');
     $mpdf->SetFooter('{PAGENO}');
     $mpdf->writeHTML($html);
     $mpdf->Output();

     
  }


  public function getprodutos() {
		

    header("Access-Control-Allow-Origin: *");
    header('Content-Type: text/html; charset=utf-8');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    $data = file_get_contents("php://input");
    $objData = json_decode($data);

    if(isset($objData->prioridade)){
      $this->db->where('nivel',$objData->prioridade);
    }
    $this->db->where('cod_empresa',$objData->cod_empresa);
    $dados['produto'] = $this->db->get('produto')->result();

   
$i=0;
foreach($dados['produto'] as $row){
  $estoque = $this->db->query('select sum(quantidade) as estoque from estoque where tipo_operacao = 1 and status = 1  and cod_produto = '.$row->id_produto)->result();
  $estoque1 = $this->db->query('select sum(quantidade) as estoque from estoque where tipo_operacao = 2 and status = 1  and cod_produto = '.$row->id_produto)->result();
  $estoque2 = $this->db->query('select sum(quantidade) as estoque from estoque where tipo_operacao = 3 and status = 1  and cod_produto = '.$row->id_produto)->result();
  $estoque3 = $this->db->query('select sum(quantidade) as estoque from estoque where tipo_operacao = 4 and status = 1  and cod_produto = '.$row->id_produto)->result();
  $estoque4 = $this->db->query('select sum(quantidade) as estoque from estoque where tipo_operacao = 5 and status = 1  and cod_produto = '.$row->id_produto)->result();
  $calculo = $estoque[0]->estoque - $estoque1[0]->estoque - $estoque2[0]->estoque + $estoque3[0]->estoque + $estoque4[0]->estoque;
  $dados['produto'][$i]->estoque = $calculo;
  $i++;
}



if(isset($objData->nivel)&& $objData->nivel==1){
  $dados2 = array();

  $n=0;
  foreach($dados['produto'] as $row){
if($row->estoque > $row->min_estoque){
  array_push($dados2,$row);
}
 $n++;
  }
  $dados['produto'] = $dados2;
}
if(isset($objData->nivel)&& $objData->nivel==2){
  $dados2 = array();

  $n=0;
  foreach($dados['produto'] as $row){
if($row->estoque == $row->min_estoque){
  array_push($dados2,$row);
}
 $n++;
  }
  $dados['produto'] = $dados2;
}
if(isset($objData->nivel)&& $objData->nivel==3){
  $dados2 = array();

  $n=0;
  foreach($dados['produto'] as $row){
if($row->estoque < $row->min_estoque){
  array_push($dados2,$row);
}
 $n++;
  }
  $dados['produto'] = $dados2;
}

    

    echo json_encode($dados);
}
    public function imprimirProdutos($id = null) {

      $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
      $decoded = base64_decode($id);
      $ar = json_decode($decoded, true);



if(isset($ar['prioridade'])){
  $this->db->where('nivel',$ar['prioridade']);
}
$this->db->where('cod_empresa',$ar['cod_empresa']);
$dados['produto'] = $this->db->get('produto')->result();


foreach($dados['produto'] as $row){
  $estoque = $this->db->query('select sum(quantidade) as estoque from estoque where tipo_operacao = 1 and status = 1  and cod_produto = '.$row->id_produto)->result();
  $estoque1 = $this->db->query('select sum(quantidade) as estoque from estoque where tipo_operacao = 2 and status = 1  and cod_produto = '.$row->id_produto)->result();
  $estoque2 = $this->db->query('select sum(quantidade) as estoque from estoque where tipo_operacao = 3 and status = 1  and cod_produto = '.$row->id_produto)->result();
  $estoque3 = $this->db->query('select sum(quantidade) as estoque from estoque where tipo_operacao = 4 and status = 1  and cod_produto = '.$row->id_produto)->result();
  $estoque4 = $this->db->query('select sum(quantidade) as estoque from estoque where tipo_operacao = 5 and status = 1  and cod_produto = '.$row->id_produto)->result();
  $calculo = $estoque[0]->estoque - $estoque1[0]->estoque - $estoque2[0]->estoque + $estoque3[0]->estoque + $estoque4[0]->estoque;
  $dados['produto'][$i]->estoque = $calculo;
  $i++;
}

  



if(isset($ar['nivel'])&& $ar['nivel']==1){
  $dados2 = array();

  $n=0;
  foreach($dados['produto'] as $row){
if($row->estoque > $row->min_estoque){
  array_push($dados2,$row);
}
 $n++;
  }
  $dados['produto'] = $dados2;
}
if(isset($ar['nivel'])&& $ar['nivel']==2){
  $dados2 = array();

  $n=0;
  foreach($dados['produto'] as $row){
if($row->estoque == $row->min_estoque){
  array_push($dados2,$row);
}
 $n++;
  }
  $dados['produto'] = $dados2;
}
if(isset($ar['nivel'])&& $ar['nivel']==3){
  $dados2 = array();

  $n=0;
  foreach($dados['produto'] as $row){
if($row->estoque < $row->min_estoque){
  array_push($dados2,$row);
}
 $n++;
  }
  $dados['produto'] = $dados2;
}

   

$dados['produtos'] =  $dados['produto'];

$total = 0;
foreach($dados['produto'] as $row){
  $total = $total + ($row->custo*$row->estoque);
}


$dados['total'] = $total;









 // $this->load->view("pedidos/imprimir2",  $dados);

    $html = $this->load->view("pedidos/imprimirProduto",  $dados, true);



     $mpdf->SetHeader('Mantido por WitsDigital - Relatório gerado em {DATE j/m/Y}');

     $mpdf->SetFooter('{PAGENO}');
     // Insere o conteúdo da variável $html no arquivo PDF
     $mpdf->writeHTML($html);


     $mpdf->Output();


     
  }
    public function imprimirpedidos2($id = null) {

      $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
      $decoded = base64_decode($id);
      $ar = json_decode($decoded, true);

      if( isset($ar['cod_fornecedor'])){
        $this->db->where('cod_fornecedor', $ar['cod_fornecedor']); 
      }
      if( isset($ar['datain']) && !isset($ar['dataout'])){
        $data = str_replace("/", "-", $ar['datain']);
        $ar['datain'] =  date('Y-m-d', strtotime($data));
        $this->db->where('data_vencimento >=',  $ar['datain']);
      }
      if( isset($ar['dataout']) && !isset($ar['datain'])){
        $data = str_replace("/", "-", $ar['dataout']);
        $ar['dataout'] =  date('Y-m-d', strtotime($data));
        $this->db->where('data_vencimento <=',  $ar['dataout']);
    }
      if( isset($ar['datain']) && isset($ar['dataout'])){
        $data = str_replace("/", "-", $ar['datain']);
        $ar['datain'] =  date('Y-m-d', strtotime($data));
        
        $data = str_replace("/", "-", $ar['dataout']);
        $ar['dataout'] =  date('Y-m-d', strtotime($data));
        $this->db->where('data_vencimento <=',  $ar['dataout']);

        $this->db->where('data_vencimento >=',  $ar['datain']);
        $this->db->where('data_vencimento <=',  $ar['dataout']);
      }
      if(isset($ar['tipo'])){
     
        if($ar['tipo']==1){
       
          $this->db->select('cp.*, fcd.*, emp.nome as nomeempresa');
          $this->db->from('contas_pagar cp, fornecedor fcd, empresa emp');
          $this->db->where('cp.cod_fornecedor = fcd.id_fornecedor');
          if( isset($ar['status'])){
            if($ar['status']==1){
              $this->db->where('cp.status = 1');
            }
            if($ar['status']==0){
              $this->db->where('cp.status = 0');
            }
             }
          $this->db->where('emp.id_empresa = cp.cod_empresa');

          if( isset($ar['cod_empresa'])){
          
            $this->db->where('cp.cod_empresa', $ar['cod_empresa']); 
          }
        
          $this->db->order_by("cp.cod_fornecedor ", "ASC"); 
          $this->db->order_by("fcd.nome ", "ASC"); 

          $query = $this->db->get()->result();
          }
          if($ar['tipo']==2){
              
            $query = $this->db->get('contas_receber')->result();
          }
      }

      //echo json_encode($query);
   

$dados['contas'] = $query;

$total = 0;
foreach($query as $row){
  $total = $total + $row->valor;
}


$dados['total'] = $total;



 // $this->load->view("pedidos/imprimir2",  $dados);

     $html = $this->load->view("reports/imprimir2",  $dados, true);



     $mpdf->SetHeader('Mantido por WitsDigital - Relatório gerado em {DATE j/m/Y}');

     $mpdf->SetFooter('{PAGENO}');
     // Insere o conteúdo da variável $html no arquivo PDF
     $mpdf->writeHTML($html);


     $mpdf->Output();


     
  }
    public function imprimirpedidosTeste($id = null) {

      $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
      $decoded = base64_decode($id);
      $ar = json_decode($decoded, true);

      if( isset($ar['cod_fornecedor'])){
        $this->db->where('cod_fornecedor', $ar['cod_fornecedor']); 
      }
      if( isset($ar['datain']) && !isset($ar['dataout'])){
        $data = str_replace("/", "-", $ar['datain']);
        $ar['datain'] =  date('Y-m-d', strtotime($data));
        $this->db->where('data_vencimento >=',  $ar['datain']);
      }
      if( isset($ar['dataout']) && !isset($ar['datain'])){
        $data = str_replace("/", "-", $ar['dataout']);
        $ar['dataout'] =  date('Y-m-d', strtotime($data));
        $this->db->where('data_vencimento <=',  $ar['dataout']);
    }
      if( isset($ar['datain']) && isset($ar['dataout'])){
        $data = str_replace("/", "-", $ar['datain']);
        $ar['datain'] =  date('Y-m-d', strtotime($data));
        
        $data = str_replace("/", "-", $ar['dataout']);
        $ar['dataout'] =  date('Y-m-d', strtotime($data));
        $this->db->where('data_vencimento <=',  $ar['dataout']);

        $this->db->where('data_vencimento >=',  $ar['datain']);
        $this->db->where('data_vencimento <=',  $ar['dataout']);
      }
      if(isset($ar['tipo'])){
     
        if($ar['tipo']==1){
       
          $this->db->select('cp.*, fcd.*, emp.nome as nomeempresa');
          $this->db->from('contas_pagar cp, fornecedor fcd, empresa emp');
          $this->db->where('cp.cod_fornecedor = fcd.id_fornecedor');
          $this->db->where('cp.status = 1');
          $this->db->where('emp.id_empresa = cp.cod_empresa');

          if( isset($ar['cod_empresa'])){
          
            $this->db->where('cp.cod_empresa', $ar['cod_empresa']); 
          }
          $this->db->where('cp.status = 1');
          $this->db->order_by("cp.cod_fornecedor ", "ASC"); 
          $this->db->order_by("fcd.nome ", "ASC"); 

          $query = $this->db->get()->result();
          }
          if($ar['tipo']==2){
              
            $query = $this->db->get('contas_receber')->result();
          }
      }

      //echo json_encode($query);
   

$dados['contas'] = $query;

$total = 0;
foreach($query as $row){
  $total = $total + $row->valor;
}


$dados['total'] = $total;



 // $this->load->view("pedidos/imprimir2",  $dados);

     $this->load->view("reports/imprimir2",  $dados);
    //  $html = $this->load->view("reports/imprimir2",  $dados, true);



    //  $mpdf->SetHeader('Mantido por WitsDigital - Relatório gerado em {DATE j/m/Y}');

    //  $mpdf->SetFooter('{PAGENO}');
    //  // Insere o conteúdo da variável $html no arquivo PDF
    //  $mpdf->writeHTML($html);


    //  $mpdf->Output();


     
  }


  
  
  public function reportCbAgrupado($id = null){

    $decoded = base64_decode($id);
    $ar = json_decode($decoded, true);









    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);

    if(isset($ar['cod_conta'])){
      if($ar['cod_conta']>0){
       $query= $this->db->query('SELECT *, (SELECT sum(valor) FROM itens_conta_bancaria where itens_conta_bancaria.status = 1 AND itens_conta_bancaria.cod_conta_bancaria = cb.id_conta_bancaria ) as totallancamentos FROM contas_bancarias cb WHERE cb.id_conta_bancaria = '.$ar['cod_conta'].' AND status_conta_bancaria = 1')->result();
   
      }
     }else{
       $query= $this->db->query('SELECT *, (SELECT sum(valor) FROM itens_conta_bancaria where itens_conta_bancaria.status = 1 AND itens_conta_bancaria.cod_conta_bancaria = cb.id_conta_bancaria ) as totallancamentos FROM contas_bancarias cb WHERE status_conta_bancaria = 1')->result();
   
     }
    for($i=0; $i<count($query);$i++){



      if( isset($ar['datain']) && !isset($ar['dataout'])){
        $data = str_replace("/", "-", $ar['datain']);
        $ar['datain'] =  date('Y-m-d', strtotime($data));
        $this->db->where('data_lacamento >=',  $ar['datain']);
      }
      if( isset($ar['dataout']) && !isset($ar['datain'])){
        $data = str_replace("/", "-", $ar['dataout']);
        $ar['dataout'] =  date('Y-m-d', strtotime($data));
        $this->db->where('data_lacamento <=',  $ar['dataout']);
    }
      if( isset($ar['datain']) && isset($ar['dataout'])){
        $data = str_replace("/", "-", $ar['datain']);
        $ar['datain'] =  date('Y-m-d', strtotime($data));
        
        $data = str_replace("/", "-", $ar['dataout']);
        $ar['dataout'] =  date('Y-m-d', strtotime($data));
        $this->db->where('data_lacamento <=',  $ar['dataout']);

        $this->db->where('data_lacamento >=',  $ar['datain']);
        $this->db->where('data_lacamento <=',  $ar['dataout']);
      }

      
      $this->db->where('cod_conta_bancaria', $query[$i]->id_conta_bancaria );
      $this->db->where('status', 1);

      $this->db->order_by("data_lacamento", "DESC"); 
      $query[$i]->lancamentos = $this->db->get('itens_conta_bancaria')->result();
    }




   

    for($i= 0; $i<count($query); $i++){
     $total = 0;
     for($z = 0; $z<count($query[$i]->lancamentos); $z++){
      $total+= $query[$i]->lancamentos[$z]->valor;
     }
     $query[$i]->lancval = $total;
    }


    $dados['contas'] = $query;

    //print_r($query);
  
  // $this->load->view("reports/printCbAgrupado",  $dados);
    $html = $this->load->view("reports/printCbAgrupado",  $dados, true);

     $mpdf->SetHeader('Mantido por WitsDigital - Relatório gerado em {DATE j/m/Y}');

     $mpdf->SetFooter('{PAGENO}');
     // Insere o conteúdo da variável $html no arquivo PDF
     $mpdf->writeHTML($html);


     $mpdf->Output();
  }




  public function reportCbAgrupadoView($id = null){
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: text/html; charset=utf-8');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    $data = file_get_contents("php://input");
    $objData = json_decode($data);





  if(isset($objData->cod_conta)){
   if($objData->cod_conta>0){
    $query= $this->db->query('SELECT *, (SELECT sum(valor) FROM itens_conta_bancaria where itens_conta_bancaria.status = 1 AND itens_conta_bancaria.cod_conta_bancaria = cb.id_conta_bancaria ) as totallancamentos FROM contas_bancarias cb WHERE cb.id_conta_bancaria = '.$objData->cod_conta.' AND status_conta_bancaria = 1')->result();

   }
  }else{
    $query= $this->db->query('SELECT *, (SELECT sum(valor) FROM itens_conta_bancaria where itens_conta_bancaria.status = 1 AND itens_conta_bancaria.cod_conta_bancaria = cb.id_conta_bancaria ) as totallancamentos FROM contas_bancarias cb WHERE status_conta_bancaria = 1')->result();

  }
    
    for($i=0; $i<count($query);$i++){




      if( isset($objData->datain) && !isset($objData->dataout)){
        $data = str_replace("/", "-", $objData->datain);
        $objData->datain =  date('Y-m-d', strtotime($data));
        $this->db->where('data_lacamento >=',  $objData->datain);
      }
      if( isset($objData->dataout) && !isset($objData->datain)){
        $data = str_replace("/", "-", $objData->dataout);
        $objData->dataout =  date('Y-m-d', strtotime($data));
        $this->db->where('data_lacamento <=',  $objData->dataout);
    }
      if( isset($objData->datain) && isset($objData->dataout)){
        $data = str_replace("/", "-", $objData->datain);
        $objData->datain =  date('Y-m-d', strtotime($data));
        
        $data = str_replace("/", "-", $objData->dataout);
        $objData->dataout =  date('Y-m-d', strtotime($data));
        $this->db->where('data_lacamento <=',  $objData->dataout);
        $this->db->where('data_lacamento >=',  $objData->datain);
  
      }

      
      $this->db->where('cod_conta_bancaria', $query[$i]->id_conta_bancaria );
      $this->db->where('status', 1);

      $this->db->order_by("data_lacamento", "ASC"); 
      $query[$i]->lancamentos = $this->db->get('itens_conta_bancaria')->result();
    }


    echo json_encode( $query);

  }


  
  public function reportAgrupado($id = null){

    $decoded = base64_decode($id);
    $ar = json_decode($decoded, true);


    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
    $query = $this->db->get('empresa')->result();
  for($i=0; $i<count($query); $i++){
    $this->db->select('cp.*, fcd.*, emp.nome as nomeempresa');
    $this->db->from('contas_pagar cp, fornecedor fcd, empresa emp');
    $this->db->where('cp.cod_fornecedor = fcd.id_fornecedor');
    if( isset($ar['status'])){
      if($ar['status']==1){
        $this->db->where('cp.status = 1');
      }
      if($ar['status']==0){
        $this->db->where('cp.status = 0');
      }
       }
    $this->db->where('emp.id_empresa = cp.cod_empresa');
    $this->db->where('cp.cod_empresa', $query[$i]->id_empresa); 
  

    if( isset($ar['datain']) && !isset($ar['dataout'])){
      $data = str_replace("/", "-", $ar['datain']);
      $ar['datain'] =  date('Y-m-d', strtotime($data));
      $this->db->where('data_vencimento >=',  $ar['datain']);
    }
    if( isset($ar['dataout']) && !isset($ar['datain'])){
      $data = str_replace("/", "-", $ar['dataout']);
      $ar['dataout'] =  date('Y-m-d', strtotime($data));
      $this->db->where('data_vencimento <=',  $ar['dataout']);
  }
    if( isset($ar['datain']) && isset($ar['dataout'])){
      $data = str_replace("/", "-", $ar['datain']);
      $ar['datain'] =  date('Y-m-d', strtotime($data));
      
      $data = str_replace("/", "-", $ar['dataout']);
      $ar['dataout'] =  date('Y-m-d', strtotime($data));
      $this->db->where('data_vencimento <=',  $ar['dataout']);

      $this->db->where('data_vencimento >=',  $ar['datain']);
      $this->db->where('data_vencimento <=',  $ar['dataout']);
    }
    if( isset($ar['cod_fornecedor'])){
      $this->db->where('cp.cod_fornecedor', $ar['cod_fornecedor']); 
    }
    $this->db->order_by("fcd.nome ", "ASC"); 
    
 $query[$i]->contaspagar = $this->db->get()->result();

 $total = 0;
foreach($query[$i]->contaspagar as $row){
  $total = $total + $row->valor;

}


$query[$i]->totalvalor = $total;



  }
  $dados['contas'] = $query;
  // $this->load->view("reports/printAgrupado",  $dados);
    $html = $this->load->view("reports/printAgrupado",  $dados, true);



     $mpdf->SetHeader('Mantido por WitsDigital - Relatório gerado em {DATE j/m/Y}');

     $mpdf->SetFooter('{PAGENO}');
     // Insere o conteúdo da variável $html no arquivo PDF
     $mpdf->writeHTML($html);


     $mpdf->Output();
  }


   function testeCusto(){
  
    $query = $this->db->get('solicitacao')->result();

for($z = 0; $z< count( $query); $z++){
  $items = json_decode($query[$z]->itens); 
  $query[$z]->produtos = $items->produtos;
  $query[$z]->kits = $items->kits;
  $produtos = [];
  $i = 0;
$temptotal = 0;
  for($i=0; $i<count($query[$z]->produtos);$i++){
$temptotal  = $temptotal + $query[$z]->produtos[$i]->custo;
  }

foreach($query[$z]->kits as $rowkit){
foreach($rowkit->itens as $rowitensKit){
  $temptotal  = $temptotal + $rowitensKit->custo;
}

}
$query[$z]->custosolicicao =   $temptotal;

}
$totalcusto = 0;
for($y = 0; $y<count($query);$y++){
  $totalcusto = $totalcusto + $query[$y]->custosolicicao;

}
$totalcusto = $totalcusto/count($query);
  echo json_encode($query);
     
    
    
  }
	


}
