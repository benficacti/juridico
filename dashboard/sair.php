<?php

include './persistencia/Conexao.php';

session_start();

$login = $_SESSION['login'];

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$mac = NULL;

$tipo_log = 15;

$ins = "INSERT INTO `LOG`(`ID_TIPO_LOG`, `DATA_LOG`, `HORA_LOG`, `ID_LOGIN_LOG`, `IP_LOG`, `MAC_ADDRESS_LOG`)"
        . "VALUES(:ID_TIPO_LOG, CURDATE(), CURTIME(), :ID_LOGIN_LOG, :IP_LOG, :MAC_ADDRESS_LOG)";
$i_ins = Conexao::getInstance()->prepare($ins);
$i_ins->bindParam(':ID_TIPO_LOG', $tipo_log);
$i_ins->bindParam(':ID_LOGIN_LOG', $login);
$i_ins->bindParam(':IP_LOG', $ip);
$i_ins->bindParam(':MAC_ADDRESS_LOG', $mac);


if ($i_ins->execute()) {
    unset($_SESSION['usuario']);
    unset($_SESSiON['nivel']);
    session_destroy();

    header('Location: login.php');
}


?>