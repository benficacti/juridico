<?php
session_start();
if(isset($_SESSION['login'])){
    header('Location: cadastro_contrato.php');
}else{
    header('Location: login.php');
}

