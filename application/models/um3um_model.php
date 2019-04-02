



<?php



/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.

 */



class um3um_model extends CI_Model {



    public function getall() {

        $this->db->group_by('competencia, entidade, ano');
        $query = $this->db->get('dados_131');

        return $query->result();
 
    }



    public function getalldetalhe($competencia,$ano) {

        $this->db->where('competencia', $competencia);
        $this->db->where('ano', $ano);

        $query = $this->db->get('dados_131');

        return $query->result();

    }



    public function getid($id, $tipo) {



        if ($tipo == "RECEITA") {

            $this->db->where('cod_dados_131', $id);



            $query = $this->db->get('131_receita_dados');

        }

        if ($tipo == "DESPESA") {

            $this->db->where('cod_dados_131', $id);



            $query = $this->db->get('131_despesa_dados');

        }







        return $query->result();

    }


    
    function CountAll() {

        return $this->db->count_all("131_receita_dados");

    }
    function CountAllDiaria() {

        return $this->db->count_all("diarias");

    }
    function CountAllDesp() {

        return $this->db->count_all("131_despesa_dados");

    }
    function CountAllFilterReceita($sort = 'id', $order = 'desc', $filtro, $limit = null, $offset = null) {
         if($filtro['ano']){
                $this->db->where('ano',$filtro['ano']);
               
            }
          
            if($filtro['tipo']){
                $this->db->where('tipo',$filtro['tipo']);
               
            }
            if($filtro['competencia1']){
                $this->db->where('competencia',$filtro['competencia1']);
               
            }
            if($filtro['key']){
                $this->db->like('descricao', $filtro['key'],'both');
                $this->db->or_like('descricao', $filtro['key'],'after');
               
               
            }

        return $this->db->count_all("131_despesa_dados");

    }

    function geDespesasPortal($sort = 'id', $order = 'desc', $limit = null, $offset = null) {

        $this->db->order_by($sort, $order);

        if ($limit)

            $this->db->limit($limit, $offset);



        $query = $this->db->get("131_despesa_dados");



        if ($query->num_rows() > 0) {



            return $query->result();

        } else {



            return null;

        }
 
    }
    function geReceitaPortal($sort = 'id', $order = 'desc', $limit = null, $offset = null) {

        $this->db->order_by($sort, $order);
        if ($limit)
            $this->db->limit($limit, $offset);
        $query = $this->db->get("131_receita_dados");

        if ($query->num_rows() > 0) {



            return $query->result();

        } else {



            return null;

        }
 
    }
    function geDiariasPortal($sort = 'id', $order = 'desc', $limit = null, $offset = null) {

        $this->db->order_by($sort, $order);
        if ($limit)
            $this->db->limit($limit, $offset);
        $query = $this->db->get("diarias");

        if ($query->num_rows() > 0) {



            return $query->result();

        } else {



            return null;

        }
 
    }
    function geReceitaPortalFilter($sort = 'id', $order = 'desc', $filtro, $limit = null, $offset = null) {



        $this->db->order_by($sort, $order);
        if ($limit)
            $this->db->limit($limit, $offset);
            if($filtro['ano']){
                $this->db->where('ano',$filtro['ano']);
               
            }
            if($filtro['credor']){
                $this->db->where('credor',$filtro['credor']);
               
            }
            if($filtro['tipo']){
                $this->db->where('tipo',$filtro['tipo']);
               
            }
            if($filtro['competencia1']){
                $this->db->where('competencia',$filtro['competencia1']);
               
            }
            if($filtro['key']){
                $this->db->like('credor', $filtro['key'],'both');
                $this->db->or_like('valor', $filtro['key'],'after');
               
               
            }
        $query = $this->db->get("131_receita_dados");
      

       

        if ($query->num_rows() > 0) {
            return $query->result();

        } else {



            return null;

        }

    }
    function geDespesasPortalFilter($sort = 'id', $order = 'desc', $filtro, $limit = null, $offset = null) {



        $this->db->order_by($sort, $order);
        if ($limit)
            $this->db->limit($limit, $offset);
            if($filtro['ano']){
                $this->db->where('ano',$filtro['ano']);
               
            }
            if($filtro['credor']){
                $this->db->where('credor',$filtro['credor']);
               
            }
            if($filtro['tipo']){
                $this->db->where('tipo',$filtro['tipo']);
               
            }
            if($filtro['competencia1']){
                $this->db->where('competencia',$filtro['competencia1']);
               
            }
            if($filtro['key']){
                $this->db->like('credor', $filtro['key'],'both');
                $this->db->or_like('valor', $filtro['key'],'after');
               
               
            }
        $query = $this->db->get("131_despesa_dados");
      

       

        if ($query->num_rows() > 0) {
            return $query->result();

        } else {



            return null;

        }

    }
	
	
	function count_despesas($filtro) {

        
            if($filtro['ano']){
                $this->db->where('ano',$filtro['ano']);
               
            }
            if($filtro['credor']){
                $this->db->where('credor',$filtro['credor']);
               
            }
            if($filtro['tipo']){
                $this->db->where('tipo',$filtro['tipo']);
               
            }
            if($filtro['competencia1']){
                $this->db->where('competencia',$filtro['competencia1']);
               
            }
            if($filtro['key']){
                $this->db->like('credor', $filtro['key'],'both');
                $this->db->or_like('valor', $filtro['key'],'after');
               
               
            }
        $query = $this->db->get("131_despesa_dados");
      

       

       
        return $query->num_rows();

       

    }

    public function getDespesaReport($filtro) {
        $this->db->where('competencia',$filtro['inicio']);
        $this->db->where('ano',$filtro['ano']);
        $querya=$this->db->get('dados_131')->result();
      
       
        $this->db->where('cod_dados_131',  $querya[0]->id);
        //$this->db->limit(10);
        
        if(isset($filtro['operacao']) && $filtro['operacao']!='DECON' ){
                  $this->db->where('tipo',$filtro['operacao']);
                
        }
        
    $query = $this->db->get("131_despesa_dados");


//print_r($query->result());

        return $query->result();

    }
    public function getReceitaReport($filtro) {
        $this->db->where('competencia',$filtro['inicio']);
        $this->db->where('ano',$filtro['ano']);
        $querya=$this->db->get('dados_131')->result();
      
        if(isset($filtro['operacao']) && $filtro['operacao']!='RECON' ){
                  $this->db->where('tipo',$filtro['operacao']);
                
        }
        $this->db->where('cod_dados_131',  $querya[0]->id);

$query = $this->db->get("131_receita_dados");


        return $query->result();

    }
    
    
    public function getTipos($tipo) {



        if ($tipo == "RECEITA") {

          

            $query = $this->db->get('131_receita_dados');

        }

        if ($tipo == "DESPESA") {
            $this->db->where('tipo', 'PAG');
        

            $query = $this->db->get('131_despesa_dados');

        }







        return $query->result();

    }



}

?>