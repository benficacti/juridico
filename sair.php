<?php

session_start();


unset($_SESSION['tloginSession']);
unset($_SESSiON['tsenhaSession']);
session_destroy();

header('Location:login1.php');

 ?>