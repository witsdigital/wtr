<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Backup extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
          //load the login model
          $this->load->model('login_model');
     }

     public function index()
     {
         echo 'sss';
     }
     
   public function backupsql(){
        $data_envio = date('d-m-Y');
        $hora_envio = date('H-i-s');
        $this->load->dbutil();
        $path = './uploads/';
        $namefile =   $data_envio.' - backup.gz';
     
        // Executa o backup do banco de dados armazenado-o em uma variável
        $backup = $this->dbutil->backup();
         
        // carrega o helper File e cria um arquivo com o conteúdo do backup
        $this->load->helper('file');
        write_file($path.$namefile, $backup);
    
       
    
    
        $arquivo = '
        <html lang="en">
        <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        </head>
        <body> 
    
        <div class="container">
        <h2>Backup Ineb</h2>
        
        <hr>
     
       
        <hr>
        <div class="well well-sm">Solicitação gerada no dia ' . $data_envio . ' às ' . $hora_envio . ' </div>
        <br><div style="font-size: 10px" align="center" class="small"><strong>Software criado e mantido por <a href="http://www.witsdigital.com.br">Wits</a></strong></div>
        </div>
    
        </body>
        </html>
        ';
    
        
        require ('class.phpmailer.php');
    
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8'; 
    
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Port = 587; 
        $mail->Host = "smtp.gmail.com";
        $mail->Username = "witsdigital@gmail.com";
        $mail->Password = 'thiago2828';
        $mail->SetFrom("witsdigital@gmail.com", "Backup - INEB");
        $mail->AddAddress( "backup@witsdigital.com.br");
        $mail->AddAddress( "thiago.89@icloud.com");
        $mail->Subject = ("Backup Ineb - ".$data_envio);
        $mail->AddAttachment($path.$namefile);
        $mail->MsgHTML("$arquivo");
        $enviado = $mail->Send();
    }
}?>