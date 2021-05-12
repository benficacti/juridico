<?php

/* CLASS */

/* CLASS CONNECTION */
include ('../persistencia/Conexao.php');
include ('../classes/Search.class.php');

if (isset($_SERVER["HTTP_ORIGIN"])) {
    // You can decide if the origin in $_SERVER['HTTP_ORIGIN'] is something you want to allow, or as we do here, just allow all
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
} else {
    //No HTTP_ORIGIN set, so we allow any. You can disallow if needed here
    header("Access-Control-Allow-Origin: *");
}

header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 600");    // cache for 10 minutes

if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_METHOD"])) {
        header("Access-Control-Allow-Methods: POST GET"); //Make sure you remove those you do not want to support
    }
    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"])) {
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    }
    //Just exit with 200 OK with the above headers for OPTIONS method
    exit(0);
}

function isValidJSON($str) {
    json_decode($str);

    return json_last_error() == JSON_ERROR_NONE;
}

$json_params = file_get_contents("php://input");



if (strlen($json_params) > 0 && isValidJSON($json_params)) {
    foreach (json_decode($json_params) as $json) {

        switch ($json->request) {
            case "enviar_email":

                $info = Search::emailAlert();
                echo $info;
                /*
                  $info = array('RESULT' => "true");
                  echo json_encode($info);
                 */
                break;

            default:
                $info = array('RESULT' => "false");
                echo json_encode($info);
                break;
        }
    }
} else {
    $info[] = array(
        'RESULT' => "false",
        'ERROR' => "JSON_INVALIDO"
    );
    $myJson = json_encode($info);
    echo $myJson;
}



