<?php

//include '../persistencia/Conexao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Search
 *
 * @author USUARIO
 */
class Search {

    /**
     * @name TiposLog (Método retorna o dos Tipos de log)
     * 
     * @subpackage classes  (Nome do pacote filho)
     * @access public  (Visibilidade do método)
     * @param type $idLog  (parâmetros utilizados para a consulta sql na tabela TIPO_LOG)
     * @return type DESC_TIPO_LOG  (retorno do método; retorna o nome do LOG)
     */
    public function TiposLog($idLog) {
        try {
            $sql = 'SELECT DESC_TIPO_LOG FROM TIPO_LOG WHERE ID_TIPO_LOG = "' . $idLog . '"';
            // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        return $dados->DESC_TIPO_LOG;
                    }
                }
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao obter Log';
        }
    }

    public function TipoAcesso($idTipoAcesso) {
        try {
            $sql = 'SELECT DESC_TIPO_ACESSO FROM TIPO_ACESSO WHERE ID_TIPO_ACESSO =' . $idTipoAcesso . ' ';
            //$sql = 'CALL buscaTipoAcesso('.$idTipoAcesso.')'; //Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        return $dados->DESC_TIPO_ACESSO;
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function setor($idSetor) {
        try {
            $sql = 'SELECT DESC_SETOR FROM SETOR WHERE ID_SETOR = ' . $idSetor . '';
            //$sql = 'CALL buscaDescSetor('.$idSetor.')'; // Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchaLL(PDO::FETCH_OBJ) as $dados) {
                        return $dados->DESC_SETOR;
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function login($start_login) {

        $login = $start_login->getUsuarioLogin();
        $senhas = $start_login->getSenhaLogin();
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
            $sqll = 'SELECT * FROM LOGIN WHERE USUARIO_LOGIN = "' . $login . '" ';
            //$sqll = 'CALL verificarLogin('.$login.')';// Existe uma Stored Procedure
            $p_sqll = Conexao::getInstance()->prepare($sqll);
            $p_sqll->execute();
            $count = $p_sqll->rowCount();
            if ($count >= 1) {
                foreach ($p_sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                    $senha = $dados->SENHA_LOGIN;
                    $idlogin = $dados->ID_LOGIN;
                    $login = $dados->USUARIO_LOGIN;
                    $tipo = $dados->ID_TIPO_ACESSO_LOGIN;

                    $_SESSION['idlogin'] = $idlogin;
                    if ($senha == $senhas) {
                        $_SESSION['login'] = $login;
                        $_SESSION['tipo'] = $tipo;


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
                        header('Location:index.php');
                    } else {
                        header('Location:login1.php');
                    }
                }
            } else {
                header('Location:login1.php');
            }
        } catch (Exception $ex) {
            echo 'Erro ao realizar login';
            var_dump($ex->getMessage());
        }
    }

    public function BuscaContrato($contrato) {

        try {
            $numero = $contrato->getNumeroContrato();

            $sql = 'SELECT * FROM CONTRATO WHERE NUMERO_CONTRATO = ' . $numero . ' ';
            //$sql = 'CALL buscaContrato('.$numero.')';
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        return $dados;
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function contratosProximoVencimento() {
        try {
          $mes = 1;
            
            $sql = 'SELECT * FROM CONTRATO WHERE VENCIMENTO_CONTRATO BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL "'.$mes.'" MONTH) ';
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        $vencimento = $dados->VENCIMENTO_CONTRATO;
                        $numero = $dados->NUMERO_CONTRATO;
                        echo 'Contrato '.$numero.' - '.' Vencimento'.$vencimento.'<br>';
                        
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function buscaIdGarantia($numeroContrato) {

        //$numero = $contrato->getNumeroContratoGarantia();
        try {
            $sql = 'SELECT ID_GARANTIA FROM GARANTIA WHERE NUMERO_CONTRATO_GARANTIA = ' . $numeroContrato . ' ';
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        return $dados->ID_GARANTIA;
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function buscaIdObservacoesExigencias($numeroContrato) {
        try {
            $sql = 'SELECT ID_OBSERVACOES_EXIGENCIAS FROM '
                    . 'OBSERVACOES_EXIGENCIAS WHERE NUMERO_DESC_OBSER_EXIGEN =' . $numeroContrato . ' ';
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchall(PDO::FETCH_OBJ) as $dados) {
                        return $dados->ID_OBSERVACOES_EXIGENCIAS;
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
