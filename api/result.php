<?php
include '../classes/Search.class.php';
include '../persistencia/Conexao.php';
sleep(1);


$request = (null !== (filter_input(INPUT_GET, 'request'))) ? filter_input(INPUT_GET, 'request') : 0;


if (($request == "contratos_home") && ($request !== 0)) {
    
    Search::contratosProximoVencimento();
    
}


?>
