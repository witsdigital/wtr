<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class galeria_model extends CI_Model {

    public function set($obj) {
        

       
        if ($this->db->insert('galeria', $obj)) {
            return true;
        }
    }
    public function getid($id) {
        $this->db->where('id', $id);
         $this->db->or_where('key', $id);
        $query = $this->db->get('galeria');
        return $query->result();
    }
     public function getimgid($id) {
        $this->db->where('key', $id);
        $query = $this->db->get('img_galeria');
        return $query->result();
    }
    
      public function getimgid2($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('img_galeria');
        return $query->result();
    }

    public function getall() {
         $this->db->order_by("id", "desc"); 
           $query = $this->db->get('galeria');
          
        return $query->result();
    }

    public function getall2($sort = 'id', $order = 'desc', $limit = null, $offset = null) {
		$this->db->order_by('id', 'desc');
        if ($limit)
        $this->db->limit($limit, $offset);
		$this->db->where("destaque", 1); 
        $query = $this->db->get("galeria");

        if ($query->num_rows() > 0) {

            return $query->result();
        } else {

            return null;
        }
  
   }
   
       function CountAll(){
        return $this->db->count_all("galeria");
    }
   

   
    public function update($obj,$id) {
        $this->db->where('id', $id);
        if($this->db->update('galeria', $obj)){
             return true;
        }
       
    }
    public function update_img($id){
         $this->load->model('Imagem');
        $upload = new Imagem();
        $img = $upload->upload('galeria');
        if ($img == null) {
            $img = "";
        }
        $obj['img'] = $img;
         $this->db->where('id', $id);
         
         
         if($this->db->update('galeria', $obj)){
             return true;
        }
    }

}

?>