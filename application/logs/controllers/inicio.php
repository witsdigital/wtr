<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inicio extends CI_Controller {

 function __construct(){
   parent::__construct();
 }

 function index(){
   if($this->session->userdata('id')){
         $this->load->view('area_restrita');
   } else {
     redirect('login', 'refresh');
   }
 }
}
?>