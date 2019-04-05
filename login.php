<?php

session_start();


include "./dashboard/persistencia/Conexao.php";


$login = filter_input(INPUT_POST, 'tName');
$senhas = filter_input(INPUT_POST, 'tSenha');
$cod = 1;
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
try {
    $login = str_replace("'", "", $login);
    $login = str_replace('"', "", $login);
    $sqll = 'SELECT ID_LOGIN, SENHA_LOGIN, ID_TIPO_ACESSO_LOGIN, ID_USUARIO_LOGIN, USUARIO.NOME_USUARIO FROM LOGIN 
INNER JOIN USUARIO ON LOGIN.ID_USUARIO_LOGIN = USUARIO.ID_USUARIO 
WHERE USUARIO_LOGIN = "'.$login.'" ';
    $p_sqll = Conexao::getInstance()->prepare($sqll);
    $p_sqll->execute();
    $count = $p_sqll->rowCount();
    if ($count > 0) {
        foreach ($p_sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
            $senha = $dados->SENHA_LOGIN;
            $idlogin = $dados->ID_LOGIN;
            $login = $dados->ID_USUARIO_LOGIN;
            $nivel = $dados->ID_TIPO_ACESSO_LOGIN;
            echo $usuario = $dados->NOME_USUARIO;
            $_SESSION['idlogin'] = $idlogin;

            if ($senha == $senhas) {
                $_SESSION['login'] = $login;
                $_SESSION['nivel'] = $nivel;
                $_SESSION['usuario'] = $usuario;

                /*
                  $ins = "INSERT INTO `LOG`(`DATA_LOG`, `HORA_LOG`, `USUARIO_LOG`, `IP_LOG`, `ID_TIPO_LOG`)"
                  . "VALUES(CURDATE(), CURTIME(), :USUARIO_LOG, :IP_LOG, :ID_TIPO_LOG)";
                  $i_ins = Conexao::getInstance()->prepare($ins);
                  $i_ins->bindParam(':USUARIO_LOG',$idlogin);
                  $i_ins->bindParam(':IP_LOG',$ip);
                  $i_ins->bindParam(':ID_TIPO_LOG',$cod);
                  if ( $i_ins->execute()) {
                  header('Location:index.php');
                  } */
                header('Location:dashboard/painel.php');
            } else {
                header('Location:login1.php');
            }
        }
    } else {
        header('Location:login1.php');
    }
} catch (Exception $ex) {
    echo 'Erro ao cadastrar';
    var_dump($ex->getMessage());
}


 
