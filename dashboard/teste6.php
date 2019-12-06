<?php
$senha="";
$senha.= "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
$senha.= "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
$senha.= "0123456789"; // $nu contem os números
$senha.= "!@#$%¨&*()_+=";

 
echo $newSenha = substr(str_shuffle($senha),1,5);