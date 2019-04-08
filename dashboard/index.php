<?php
session_start();
if(isset($_SESSION['login'])){
    header('Location: painel.php');
}else{
    header('Location: login.php');
}

