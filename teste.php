<?php
require_once './vendor/autoload.php';
use Kreait\Firebase\Factory;
$factory = (new Factory())
    ->withDatabaseUri('https://juridico-b6a50-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
$dados = array(
    "nome"=>"jonathan",
    "data"=>"27/03/1997",
    "telefone"=>"+5511949470347",
    "email"=>"jonathan.webitb1@gmail.com",    
    "key"=> sha1("jonathan")
);
$reference = $database->getReference(sha1("jonathan"))->set($dados);