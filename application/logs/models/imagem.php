<?php

class Imagem extends CI_Controller {

    function index() {
        $this->load->view('form');
    }

    function upload($categoria,$entidade) {

        //parametriza as preferências   
         if (is_dir("uploads/$categoria/$entidade")) {
               $dir = 'uploads/'.'/' . $categoria.'/'.$entidade ;
        } else {
            mkdir("uploads/$categoria/$entidade", 0777, true);
          $dir = 'uploads/'.'/' . $categoria.'/'.$entidade ;
        }
        
        
        $config["upload_path"] = $dir;
        $config["allowed_types"] = "jpg|pdf|doc|jpeg|png|gif";
        $config["overwrite"] = TRUE;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 150;
        $config['height'] = 100;
        
        $this->load->library("upload", $config);
        //em caso de sucesso no upload     
        if ($this->upload->do_upload()) {

            //renomeia a foto   
            $nomeimg = md5($this->upload->file_name);
            $nomeorig = $config["upload_path"] . "/" . $this->upload->file_name;
            $nomedestino = $config["upload_path"] . "/" . $nomeimg . $this->upload->file_ext;
            rename($nomeorig, $nomedestino);
            //define opções de crop        
            $config["image_library"] = "gd2";
            $config["source_image"] = $nomedestino;

            $this->load->library("image_lib", $config);
        
          
            return $nomeimg . $this->upload->file_ext;
        } else {
           
        }
    }

}
