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
$token = filter_input(INPUT_GET, 'token');
$emailGet = filter_input(INPUT_GET, 'email');
$smtp = "smtp.benficabbtt.com.br";
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
       <a href="http://192.168.0.185:8080/juridico/dashboard/contra_senha.php?id=' . $token . ' ">reset</a>
    </body>
</html>');
if ($mail2->Send("RECOUVER")) {
    /*
    echo '<script language="javascript">';
    echo 'alert("reset de senha enviado para email")';
    echo 'window.location.href="login.php"';
    echo '</script>';
    sleep(5);
    echo '<script language="javascript">';
    echo 'window.location.href="login.php"';
    echo '</script>';
    */
    echo "E-mail enviado para " . $email . " ";
} else {
    ECHO $mgm = "<font color='red'>Erro ao enviar</font>";
}