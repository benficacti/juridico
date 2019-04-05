<?php

session_start();


unset($_SESSION['usuario']);
unset($_SESSiON['nivel']);
session_destroy();

header('Location: login.php');

 ?>