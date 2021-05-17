<?php

/*
  // Ou arquivo local
  $path = 'red.txt';
  $fileType = mime_content_type($path);
  $fileName = basename($path);

  // Pegando o conteúdo do arquivo
  $fp = fopen($path, "rb"); // abre o arquivo enviado
  $anexo = fread($fp, filesize($path)); // calcula o tamanho
  $anexo = chunk_split(base64_encode($anexo)); // codifica o anexo em base 64
  fclose($fp); // fecha o arquivo
 */
$user = filter_input(INPUT_GET, 'usuario');
$password = filter_input(INPUT_GET, 'senha');
$emailGet = filter_input(INPUT_GET, 'email');
$smtp = "email-ssl.com.br";
$usuario = "jose.rubens@benficabbtt.com.br";
$senha = "System2020";
require_once 'smtp/smtp.php';
$email = $emailGet; //(isset($_GET['email'])) ? $_GET['email'] : null;
$mail2 = new SMTP;
$mail2->Delivery('relay');
$mail2->Relay($smtp, $usuario, $senha, 587, 'login', false);
$mail2->TimeOut(200);
$mail2->Priority('high');
//$mail2->attachfile($path);

$mail2->From("contatos@benficabbtt.com.br");
$mail2->AddTo($email);

$mail2->Html("Redefinir Senha BENFICABBTT / RALIP");
$mail2->html('<!DOCTYPE html>
<html lang="pt-br"> 
    <head>    
        <meta charset="UTF-8"/>
        <meta name="description" content="Gestão Eletronico de Contrato">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="icon" href="favicon.png">   
        <title>GEC - Gestão Eletronico de Contrato</title>
        <!-- CSS -->
        <link rel="stylesheet" href="css/css.css"/>
    </head>
    <body>
    <p>Link temporario espira em 60 minutos!!!</p>
       <a href="http://localhost/juridico/dashboard/link_temporario.php?user=' . $user . ' & pass='.$password.' & email='.$email.' ">temporario</a>    
    </body>
</html>');
if ($mail2->Send("RECOUVER")) {
    
      
            
//      echo "E-mail enviado para " . $email . " ";
//      sleep(2);
//      echo '<script language="javascript">';
//      echo 'window.location.href="login.php"';
//      echo '</script>';
     
    echo "E-mail enviado para " . $email . " ";
} else {
    ECHO $mgm = "<font color='red'>Erro ao enviar</font>";
}