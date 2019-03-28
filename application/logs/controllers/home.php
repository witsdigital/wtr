<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {

        $this->load->model('validalogin');
        $this->validalogin->valida();


        $this->load->view('includes/import');
        $this->load->view('includes/header');
        if($this->session->userdata('permissao') == 'administrador'){
             $this->load->view('includes/menu_admin');  
            $this->load->view('admin');
        }else{
              $this->load->view('includes/menu'); 
              $this->load->view('home');
        }
      
        $this->load->view('includes/footer');
    }

}
