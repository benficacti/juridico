<?php
session_start();
if(isset($_SESSION['login'])){
    header('Location: dashboard/painel.php');
}else{
    header('Location: dashboard/login.php');
}

