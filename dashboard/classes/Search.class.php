<?php

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
    public static function TiposLog($idLog) {
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

    public static function loginAuth($login, $senha) {

        try {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            $mac = NULL;
            $null = NULL;
            $tipo_log = 14;

            $login = str_replace("'", "", $login);
            $login = str_replace('"', "", $login);
            $sqll = 'SELECT ID_LOGIN, SENHA_LOGIN, ID_TIPO_ACESSO_LOGIN, ID_USUARIO_LOGIN, USUARIO.NOME_USUARIO,
                     TIPO_ACESSO.DESC_TIPO_ACESSO FROM LOGIN 
                     INNER JOIN USUARIO ON LOGIN.ID_USUARIO_LOGIN = USUARIO.ID_USUARIO INNER JOIN TIPO_ACESSO ON
                     LOGIN.ID_TIPO_ACESSO_LOGIN = TIPO_ACESSO.ID_TIPO_ACESSO
                     WHERE USUARIO_LOGIN = "' . $login . '" ';
            $p_sqll = Conexao::getInstance()->prepare($sqll);
            if ($p_sqll->execute()) {
                $count = $p_sqll->rowCount();
                if ($count > 0) {
                    foreach ($p_sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        $senhas = $dados->SENHA_LOGIN;
                        $idlogin = $dados->ID_LOGIN;
                        $login = $dados->ID_USUARIO_LOGIN;
                        $nivel = $dados->ID_TIPO_ACESSO_LOGIN;
                        $usuario = $dados->NOME_USUARIO;
                        $tipo_acesso = $dados->DESC_TIPO_ACESSO;
                        $id_tipo_acesso_login = $dados->ID_TIPO_ACESSO_LOGIN;
                        $_SESSION['idlogin'] = $idlogin;

                        if ($senha == $senhas) {
                            $_SESSION['login'] = $login;
                            $_SESSION['nivel'] = $nivel;
                            $_SESSION['usuario'] = $usuario;
                            $_SESSION['tipo_acesso'] = $tipo_acesso;
                            $_SESSION['tipo_acesso_login'] = $id_tipo_acesso_login;


                            $ins = "INSERT INTO `LOG`(`ID_TIPO_LOG`, `DATA_LOG`, `HORA_LOG`, `ID_LOGIN_LOG`, `IP_LOG`, `MAC_ADDRESS_LOG`, `ID_CONTRATO`)"
                                    . "VALUES(:ID_TIPO_LOG, CURDATE(), CURTIME(), :ID_LOGIN_LOG, :IP_LOG, :MAC_ADDRESS_LOG, :ID_CONTRATO)";
                            $i_ins = Conexao::getInstance()->prepare($ins);
                            $i_ins->bindParam(':ID_TIPO_LOG', $tipo_log);
                            $i_ins->bindParam(':ID_LOGIN_LOG', $idlogin);
                            $i_ins->bindParam(':IP_LOG', $ip);
                            $i_ins->bindParam(':MAC_ADDRESS_LOG', $mac);
                            $i_ins->bindParam(':ID_CONTRATO', $null);

                            if ($i_ins->execute()) {
                                return "00;";
                            }
                        } else {
                            return "02";
                        }
                    }
                } else {
                    return "01";
                }
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Erro login';
        }
    }

    public static function BuscaUsuario($idusuario) {
        try {
            $sql = 'SELECT * USUARIO WHERE ID_USUARIO = "' . $idusuario . '"';
            $ssql = Conexao::getInstance()->prepare($sql);
            if ($ssql->execute()) {
                $count = $ssql->rowCount();
                if ($count > 0) {
                    foreach ($ssql->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        return $dados->NOME_USUARIO;
                    }
                }
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo ' Falha ao obter Nome usuário';
        }
    }

    public static function TipoAcesso($idTipoAcesso) {
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

    public static function setor($idSetor) {
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

    public static function login($start_login) {

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

    public static function BuscaContrato($contratante) {

        try {

            $sql = 'SELECT * FROM CONTRATO WHERE CONTRATANTE_CONTRATO = "' . $contratante . '"';
            //$sql = 'CALL buscaContrato('.$numero.')';
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        return $dados->ID_CONTRATO;
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function BuscaUltimoId($idLogin) {

        try {
            $sql = 'SELECT ID_CONTRATO FROM CONTRATO WHERE ID_LOGIN_CONTRATO = "' . $idLogin . '" ORDER BY ID_CONTRATO DESC LIMIT 1 ';
            $p_sqll = Conexao::getInstance()->prepare($sql);
            $p_sqll->execute();
            $count = $p_sqll->rowCount();
            if ($count >= 1) {
                foreach ($p_sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                    return $dados->ID_CONTRATO;
                }
            } else {
                $sql = 'SELECT ID_CONTRATO FROM CONTRATO';
                $p_sqll = Conexao::getInstance()->prepare($sql);
                $p_sqll->execute();
                $count = $p_sqll->rowCount();
                if ($count >= 1) {
                    foreach ($p_sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        return $dados->ID_CONTRATO;
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function contratos_por_periodo($dataIni, $dataFim) {

        $sql = "SELECT * FROM CONTRATO  
                INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO 
                WHERE VENCIMENTO_CONTRATO  
                BETWEEN '" . $dataIni . "' AND '" . $dataFim . "' AND ID_STATUS_CONTRATO = 1 ORDER BY VENCIMENTO_CONTRATO";
        $sqll = Conexao::getInstance()->prepare($sql);


        try {
            $mes = 1;
            $numero = "";

            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {

                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        $idContrato = $dados->ID_CONTRATO;
                        $vencimento = $dados->VENCIMENTO_CONTRATO;
                        $numero = $dados->NUMERO_CONTRATO;
                        $contratado = $dados->CONTRATADO_CONTRATO;
                        $contratante = $dados->CONTRATANTE_CONTRATO;
                        $idSetor = $dados->ID_SETOR_CONTRATO;
                        $descTipoContrato = $dados->DESC_TIPO_CONTRATO;

                        $setor = Search::descSetor($idSetor);
                        if ($numero == NULL) {
                            $numero = '<strong style="color:gray">***</strong>';
                        }

                        echo ' <div class="line-contract-panel">
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    ' . $numero . '
                                </label>
                            </div>
                        </div>
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    <div class = "desc-contratante-panel">
                                        ' . $contratante . '
                                        </div>
                                </label>
                            </div>
                        </div>
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    <div class = "desc-contratante-panel">
                                        ' . $contratado . '
                                        </div>
                                </label>
                            </div>
                        </div>
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    ' . Search::formateDateBR($vencimento) . '
                                </label>
                            </div>
                        </div>
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    ' . $setor . '
                                </label>
                            </div>
                        </div>
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    <a href="ver_contrato.php?c=' . $idContrato . '&d=2"> VER CONTRATO </a>
                                </label>
                            </div>
                        </div>
                    </div>';
                    }
                } else {

                    echo '
                    <div class="line-contract-panel">
                        <div class="info-contract-panel merge-panel">
                            <div class="title-info-contract-panel merge-panel" >
                                <label class="lbl-info-line-panel merge-panel">
                                    VOCÊ NÃO TEM CONTRATOS PROXIMOS DE VENCIMENTO
                                </label>
                            </div>

                        </div>
                    </div>
                    ';
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function proximos_vencimentos_por_dia($dias) {

        $sql = "SELECT * FROM CONTRATO  
                INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO 
                WHERE VENCIMENTO_CONTRATO  
                BETWEEN CURDATE() AND (CURDATE() + INTERVAL '" . $dias . "' DAY) "
                . "AND ID_STATUS_CONTRATO = 1 "
                . "ORDER BY VENCIMENTO_CONTRATO";
        $sqll = Conexao::getInstance()->prepare($sql);


        try {
            $mes = 1;
            $numero = "";

            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {

                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        $idContrato = $dados->ID_CONTRATO;
                        $vencimento = $dados->VENCIMENTO_CONTRATO;
                        $numero = $dados->NUMERO_CONTRATO;
                        $contratado = $dados->CONTRATADO_CONTRATO;
                        $contratante = $dados->CONTRATANTE_CONTRATO;
                        $idSetor = $dados->ID_SETOR_CONTRATO;
                        $descTipoContrato = $dados->DESC_TIPO_CONTRATO;

                        $setor = Search::descSetor($idSetor);
                        if ($numero == NULL) {
                            $numero = '<strong style="color:gray">***</strong>';
                        }

                        echo ' <div class="line-contract-panel">
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    ' . $numero . '
                                </label>
                            </div>
                        </div>
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    <div class = "desc-contratante-panel">
                                        ' . $contratante . '
                                        </div>
                                </label>
                            </div>
                        </div>
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    <div class = "desc-contratante-panel">
                                        ' . $contratado . '
                                        </div>
                                </label>
                            </div>
                        </div>
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    ' . Search::formateDateBR($vencimento) . '
                                </label>
                            </div>
                        </div>
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    ' . $setor . '
                                </label>
                            </div>
                        </div>
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    <a href="ver_contrato.php?c=' . $idContrato . '&d=2"> VER CONTRATO </a>
                                </label>
                            </div>
                        </div>
                    </div>';
                    }
                } else {

                    echo '
                    <div class="line-contract-panel">
                        <div class="info-contract-panel merge-panel">
                            <div class="title-info-contract-panel merge-panel" >
                                <label class="lbl-info-line-panel merge-panel">
                                    VOCÊ NÃO TEM CONTRATOS PROXIMOS DE VENCIMENTO
                                </label>
                            </div>

                        </div>
                    </div>
                    ';
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function proximosVencimentos($vencimento, $busca) {
        $data = date('Y-m-d');
        switch ($vencimento) {
            case 0:

                if (strlen($busca) > 0 and is_numeric($busca)) {
                    $sql = "SELECT * FROM CONTRATO "
                            . " INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO"
                            . " WHERE NUMERO_CONTRATO like '%" . $busca . "%' AND ID_STATUS_CONTRATO = 1";
                    $sqll = Conexao::getInstance()->prepare($sql);
                } elseif (strlen($busca) > 0) {
                    $sql = "SELECT * FROM CONTRATO "
                            . " INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO"
                            . " WHERE CONTRATANTE_CONTRATO like '%" . $busca . "%' or  CONTRATADO_CONTRATO like '%" . $busca . "%' AND ID_STATUS_CONTRATO = 1";
                    $sqll = Conexao::getInstance()->prepare($sql);
                } else {
                    $sql = "SELECT * FROM CONTRATO "
                            . " INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO"
                            . " WHERE ID_STATUS_CONTRATO = 1";
                    $sqll = Conexao::getInstance()->prepare($sql);
                }

                break;

            case 1:
                $sql = 'SELECT * FROM CONTRATO '
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE VENCIMENTO_CONTRATO < "' . $data . '"';
                $sqll = Conexao::getInstance()->prepare($sql);
                break;

            case 2:
                $sql = 'SELECT * FROM CONTRATO '
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE VENCIMENTO_CONTRATO >= "' . $data . '"';
                $sqll = Conexao::getInstance()->prepare($sql);
                break;
        }




        try {
            $mes = 1;
            $numero = "";

            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {

                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        $idContrato = $dados->ID_CONTRATO;
                        $vencimento = $dados->VENCIMENTO_CONTRATO;
                        $numero = $dados->NUMERO_CONTRATO;
                        $contratado = $dados->CONTRATADO_CONTRATO;
                        $contratante = $dados->CONTRATANTE_CONTRATO;
                        $idSetor = $dados->ID_SETOR_CONTRATO;
                        $descTipoContrato = $dados->DESC_TIPO_CONTRATO;

                        $setor = Search::descSetor($idSetor);
                        if ($numero == NULL) {
                            $numero = '<strong style="color:gray">***</strong>';
                        }

                        echo ' <div class="line-contract-panel">
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    ' . $numero . '
                                </label>
                            </div>
                        </div>
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    <div class = "desc-contratante-panel">
                                        ' . $contratante . '
                                        </div>
                                </label>
                            </div>
                        </div>
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    <div class = "desc-contratante-panel">
                                        ' . $contratado . '
                                        </div>
                                </label>
                            </div>
                        </div>
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    ' . Search::formateDateBR($vencimento) . '
                                </label>
                            </div>
                        </div>
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    ' . $setor . '
                                </label>
                            </div>
                        </div>
                        <div class="info-contract-panel">
                            <div class="title-info-contract-panel">
                                <label class="lbl-info-line-panel">
                                    <a href="ver_contrato.php?c=' . $idContrato . '&d=2"> VER CONTRATO </a>
                                </label>
                            </div>
                        </div>
                    </div>';
                    }
                } else {

                    echo '
                    <div class="line-contract-panel">
                        <div class="info-contract-panel merge-panel">
                            <div class="title-info-contract-panel merge-panel" >
                                <label class="lbl-info-line-panel merge-panel">
                                    VOCÊ NÃO TEM CONTRATOS PROXIMOS DE VENCIMENTO
                                </label>
                            </div>

                        </div>
                    </div>
                    ';
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function filtroMeusContratos($tipos, $status_vencimento, $nContrato, $nContratado, $nContratante) {
        try {
            $date = date('Y-m-d');
            $mes = 1;

            /*
              $count = 0;
              $and = "";
              $wherex = "";
              $where = false;
              $tipox = "";
              $vencimentox = "";

              if ($t != 0) {
              $tipox = ' contrato.ID_TIPO_CONTRATO = ' . $t;
              $count++;
              $where = true;
              }

              if ($v != 0) {
              $vencimentox = ' contrato.VENCIMENTO_CONTRATO >= "' . $v . '"';
              $count++;
              $where = true;
              }
              if ($count == 0) {
              $where = true;
              }
              if ($where) {
              $wherex = " WHERE ";
              $login = "ID_LOGIN_CONTRATO = " . $_SESSION['login'];
              if ($count == 1) {
              $and = " AND ";
              $login = $login;
              }
              if ($count > 1) {
              $and = " AND ";
              $login = $login . $and;
              }
              }

              echo $sql = 'SELECT * FROM CONTRATO '
              . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO ' .
              $wherex . $login . $tipox . $and . $vencimentox;
              $sqll = Conexao::getInstance()->prepare($sql);

             */


            //SE NÃO EXISTIR NUMERO DE CONTRATO LISTE TUDO
            if (strlen($nContrato) < 1) {
                $sql = "SELECT * FROM CONTRATO "
                        . " INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO"
                        . " WHERE ID_STATUS_CONTRATO = 1 AND ID_LOGIN_CONTRATO = " . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            } else {
                $sql = "SELECT * FROM CONTRATO "
                        . " INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO"
                        . " WHERE ID_STATUS_CONTRATO = 1 AND NUMERO_CONTRATO like '%" . $nContrato . "%' and ID_LOGIN_CONTRATO = " . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }

            //TODOS CONTRATOS PUBLICOS
            if ($tipos == 1) {
                $sql = "SELECT * FROM CONTRATO "
                        . " INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO"
                        . " WHERE ID_STATUS_CONTRATO = 1 AND contrato.ID_TIPO_CONTRATO = " . $tipos . " AND ID_LOGIN_CONTRATO = " . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }


            //TODOS OS CONTRATOS PRIVADOS
            if ($tipos == 2) {
                $sql = "SELECT * FROM CONTRATO "
                        . " INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO"
                        . " WHERE ID_STATUS_CONTRATO = 1 AND contrato.ID_TIPO_CONTRATO = '" . $tipos . "' AND ID_LOGIN_CONTRATO = " . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }




            //TODOS CONTRATOS DE UM CONTRATADO
            if (($tipos == 0) and ( strlen($nContratado) > 0)) {

                $sql = "SELECT * FROM CONTRATO "
                        . " INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO"
                        . " WHERE ID_STATUS_CONTRATO = 1 AND ID_LOGIN_CONTRATO = " . $_SESSION['login'] . " AND  CONTRATADO_CONTRATO like '%" . $nContratado . "%'";
                $sqll = Conexao::getInstance()->prepare($sql);
            }

            //TODOS CONTRATOS DE UM CONTRATANTE
            if (($tipos == 0) and ( strlen($nContratante) > 0) and ( strlen($nContratado) < 1)) {

                $sql = "SELECT * FROM CONTRATO "
                        . " INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO"
                        . " WHERE ID_STATUS_CONTRATO = 1 AND ID_LOGIN_CONTRATO = " . $_SESSION['login'] . " AND  CONTRATANTE_CONTRATO like '%" . $nContratante . "%'";
                $sqll = Conexao::getInstance()->prepare($sql);
            }


            //TODOS CONTRATOS PUBLICOS, DE UM CONTRATADO
            if (($tipos == 1) and ( strlen($nContratado) > 0)) {
                $sql = "SELECT * FROM CONTRATO "
                        . " INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO"
                        . " WHERE ID_STATUS_CONTRATO = 1 AND ID_LOGIN_CONTRATO = " . $_SESSION['login'] . " AND  CONTRATADO_CONTRATO like '%" . $nContratado . "%'";
                $sqll = Conexao::getInstance()->prepare($sql);
            }

            //TODOS CONTRATOS PUBLICOS, DE UM CONTRATANTE
            if (($tipos == 1) and ( strlen($nContratante) > 0) and ( strlen($nContratado) < 1)) {
                $sql = "SELECT * FROM CONTRATO "
                        . " INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO"
                        . " WHERE ID_STATUS_CONTRATO = 1 AND ID_LOGIN_CONTRATO = " . $_SESSION['login'] . " AND  CONTRATANTE_CONTRATO like '%" . $nContratante . "%'";
                $sqll = Conexao::getInstance()->prepare($sql);
            }

            //TODOS CONTRATOS PRIVADOS, DE UM CONTRATADO
            if (($tipos == 2) and ( strlen($nContratado) > 0)) {
                $sql = "SELECT * FROM CONTRATO "
                        . " INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO"
                        . " WHERE ID_STATUS_CONTRATO = 1 AND ID_LOGIN_CONTRATO = " . $_SESSION['login'] . " AND  CONTRATADO_CONTRATO like '%" . $nContratado . "%'";
                $sqll = Conexao::getInstance()->prepare($sql);
            }



            //TODOS CONTRATOS PRIVADOS, DE UM CONTRATANTE
            if (($tipos == 2) and ( strlen($nContratante) > 0) and ( strlen($nContratado) < 1)) {
                $sql = "SELECT * FROM CONTRATO "
                        . " INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO"
                        . " WHERE ID_STATUS_CONTRATO = 1 AND ID_LOGIN_CONTRATO = " . $_SESSION['login'] . " AND  CONTRATANTE_CONTRATO like '%" . $nContratante . "%'";
                $sqll = Conexao::getInstance()->prepare($sql);
            }


            //TODOS OS CONTRATOS Á VENCER
            if (($tipos == 0) and ( $status_vencimento == 1)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE ID_STATUS_CONTRATO = 1 AND contrato.VENCIMENTO_CONTRATO >= "' . $date . '" AND '
                        . ' contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }

            //TODOS OS CONTRATOS VENCIDOS 
            if (($tipos == 0) and ( $status_vencimento == 2)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE ID_STATUS_CONTRATO = 1 AND contrato.VENCIMENTO_CONTRATO <= "' . $date . '" AND '
                        . ' contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }


            //TODOS CONTRATOS Á VENCER DE UM CONTRATADO
            if (($tipos == 0) and ( $status_vencimento == 1) and ( strlen($nContratado) > 0)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE ID_STATUS_CONTRATO = 1 AND contrato.VENCIMENTO_CONTRATO >= "' . $date . '" AND '
                        . ' contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'] . " AND  CONTRATADO_CONTRATO like '" . $nContratado . "%'";
                $sqll = Conexao::getInstance()->prepare($sql);
            }

            //TODOS CONTRATOS Á VENCER DE UM CONTRATANTE
            if (($tipos == 0) and ( $status_vencimento == 1) and ( strlen($nContratante) > 0) and ( strlen($nContratado) < 1)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE ID_STATUS_CONTRATO = 1 AND contrato.VENCIMENTO_CONTRATO >= "' . $date . '" AND '
                        . ' contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'] . " AND  CONTRATANTE_CONTRATO like '" . $nContratante . "%'";
                $sqll = Conexao::getInstance()->prepare($sql);
            }



            //TODOS CONTRATOS VENCIDOS DE UM CONTRATADO
            if (($tipos == 0) and ( $status_vencimento == 2) and ( strlen($nContratado) > 0)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE ID_STATUS_CONTRATO = 1 AND contrato.VENCIMENTO_CONTRATO < "' . $date . '" AND'
                        . ' contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'] . " AND  CONTRATADO_CONTRATO like '" . $nContratado . "%'";
                $sqll = Conexao::getInstance()->prepare($sql);
            }


            //TODOS CONTRATOS VENCIDOS DE UM CONTRATANTE
            if (($tipos == 0) and ( $status_vencimento == 2) and ( strlen($nContratante) > 0) and ( strlen($nContratado) < 1)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE ID_STATUS_CONTRATO = 1 AND contrato.VENCIMENTO_CONTRATO < "' . $date . '" AND'
                        . ' contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'] . " AND  CONTRATANTE_CONTRATO like '" . $nContratante . "%'";
                $sqll = Conexao::getInstance()->prepare($sql);
            }



            //TODOS CONTRATOS PRIVADOS, Á VENCER DE UM CONTRATADO
            if (($tipos == 1) and ( $status_vencimento == 1) and ( strlen($nContratado) > 0)) {

                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE ID_STATUS_CONTRATO = 1 AND contrato.ID_TIPO_CONTRATO = ' . $tipos . ' AND contrato.VENCIMENTO_CONTRATO <= "' . $date . '" AND'
                        . ' contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'] . " AND  CONTRATADO_CONTRATO like '" . $nContratado . "%'";
                $sqll = Conexao::getInstance()->prepare($sql);
            }


            //TODOS CONTRATOS PRIVADOS, Á VENCER DE UM CONTRATADO
            if (($tipos == 1) and ( $status_vencimento == 1) and ( strlen($nContratado) > 0)) {

                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE ID_STATUS_CONTRATO = 1 AND contrato.ID_TIPO_CONTRATO = ' . $tipos . ' AND contrato.VENCIMENTO_CONTRATO <= "' . $date . '" AND'
                        . ' contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'] . " AND  CONTRATADO_CONTRATO like '" . $nContratado . "%'";
                $sqll = Conexao::getInstance()->prepare($sql);
            }


            //TODOS CONTRATOS PUBLICOS, Á VENCER DE UM CONTRATANTE
            if (($tipos == 1) and ( $status_vencimento == 2) and ( strlen($nContratante) > 0) and ( strlen($nContratado) < 1)) {

                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE ID_STATUS_CONTRATO = 1 AND contrato.ID_TIPO_CONTRATO = ' . $tipos . ' AND contrato.VENCIMENTO_CONTRATO <= "' . $date . '" AND'
                        . ' contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'] . " AND  CONTRATANTE_CONTRATO like '" . $nContratante . "%'";
                $sqll = Conexao::getInstance()->prepare($sql);
            }


            //TODOS CONTRATOS PRIVADOS, VENCIDOS DE UM CONTRATADO
            if (($tipos == 1) and ( $status_vencimento == 2) and ( strlen($nContratado) > 0)) {

                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE ID_STATUS_CONTRATO = 1 AND contrato.ID_TIPO_CONTRATO = ' . $tipos . ' AND contrato.VENCIMENTO_CONTRATO <= "' . $date . '" AND'
                        . ' contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'] . " AND  CONTRATADO_CONTRATO like '" . $nContratado . "%'";
                $sqll = Conexao::getInstance()->prepare($sql);
            }


            //TODOS CONTRATOS PUBLICOS, VENCIDOS SEM INFORMAR O CONTRADO
            if (($tipos == 1) and ( $status_vencimento == 2) and ( strlen($nContratado) < 1)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE ID_STATUS_CONTRATO = 1 AND contrato.ID_TIPO_CONTRATO = ' . $tipos . ' AND '
                        . 'contrato.VENCIMENTO_CONTRATO < "' . $date . '" AND contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }

            //TODOS CONTRATOS PUBLICOS, Á VENCER SEM INFORMAR O CONTRADO
            if (($tipos == 1) and ( $status_vencimento == 1) and ( strlen($nContratado) < 1)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE ID_STATUS_CONTRATO = 1 AND contrato.ID_TIPO_CONTRATO = ' . $tipos . ' AND '
                        . 'contrato.VENCIMENTO_CONTRATO >= "' . $date . '" AND contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }



            //TODOS CONTRATOS PRIVADOS, TODOS VENCIMENTOS, SEM INFORMAR CONTRADO
            if (($tipos == 2) and ( $status_vencimento == 0) and ( strlen($nContratado) < 1)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE ID_STATUS_CONTRATO = 1 AND contrato.ID_TIPO_CONTRATO = ' . $tipos . ' AND '
                        . 'contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }

            //TODOS CONTRATOS PRIVADOS Á VENCER DE UM CONTRATADO
            if (($tipos == 2) and ( $status_vencimento == 1) and ( strlen($nContratado) > 0)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE ID_STATUS_CONTRATO = 1 AND contrato.ID_TIPO_CONTRATO = ' . $tipos . ' AND '
                        . 'contrato.VENCIMENTO_CONTRATO >= "' . $date . '" AND contrato.ID_LOGIN_CONTRATO = '
                        . $_SESSION['login'] . " AND  CONTRATADO_CONTRATO like '" . $nContratado . "%'";
                $sqll = Conexao::getInstance()->prepare($sql);
            }

            //TODOS CONTRATOS PRIVADOS, VENCIDOS
            if (($tipos == 2) and ( $status_vencimento == 2)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE ID_STATUS_CONTRATO = 1 AND contrato.ID_TIPO_CONTRATO = ' . $tipos . ' AND '
                        . 'contrato.VENCIMENTO_CONTRATO < "' . $date . '" AND contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }

            //TODOS CONTRATOS PRIVADOS, Á VENCER
            if (($tipos == 2) and ( $status_vencimento == 1)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE ID_STATUS_CONTRATO = 1 AND contrato.ID_TIPO_CONTRATO = ' . $tipos . ' AND '
                        . 'contrato.VENCIMENTO_CONTRATO > "' . $date . '" AND contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }


            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    echo '<div class = "listtb" data-aos = "fade-left"
                    data-aos-anchor = "#example-anchor"
                    data-aos-offset = "400"
                    data-aos-duration = "400">

                    <table class = "tb-list">';

                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        $id_contrato = $dados->ID_CONTRATO;
                        $vencimento = $dados->VENCIMENTO_CONTRATO;
                        $numero = $dados->NUMERO_CONTRATO;
                        $contratante = $dados->CONTRATANTE_CONTRATO;
                        $contratado = $dados->CONTRATADO_CONTRATO;
                        $descTipoContrato = $dados->DESC_TIPO_CONTRATO;
                        $anexo = $dados->URL_IMAGEM_CONTRATO;
                        $idSetor = $dados->ID_SETOR_CONTRATO;

                        $descSetor = Search::descSetor($idSetor);

                        //VERIFICAR SE POSSUI OBJETO
                        $possuiObjeto = Search::verificarObjeto($id_contrato);

                        //VERIFICAR SE POSSUI ADITAMENTO
                        $possuiAditamento = Search::buscarContrato($id_contrato);

                        //VERIFICAR SE POSSUI ADITAMENTO
                        //VERIFICAR QUAL CONTRATO FOI CRIADO APARTIR DE ADITAMENTO
                        $feito_de_um_aditamento = Search::verificarOrigem($id_contrato);

                        //VERIFICAR O NUMERO DO CONTRATO PAI
                        $NumerocontratoPai = Search::NumeroContratoPai($feito_de_um_aditamento);

                        $ContranteContratoPai = Search::ContratanteContratoPai($feito_de_um_aditamento);

                        $NumerocontratoFilho = Search::NumeroContratoFilho($id_contrato);


                        echo '<tr>';
                        if (strlen($anexo) > 0 and $possuiAditamento > 0 and strlen($feito_de_um_aditamento) > 0) {
                            echo '<td class = "td-icon-contract"><a href="ver_contrato.php?c=' . $feito_de_um_aditamento . '&d=1"><img src = "img/pert_contr.png" class = "img-icon-list" alt = "contrato-list" title="restrito ao contrato: ' . $NumerocontratoPai . ' da ' . $ContranteContratoPai . ' "></a>&nbsp<a href="view_anexo.php?a=' . $anexo . '&d=1"><img src = "img/anexo.png" class = "img-icon-list" alt = "contrato-list" title="anexo"></a>&nbsp<a href="ver_aditamentos.php?c=' . $id_contrato . '&d=1&n=' . $numero . '"><img src = "img/aditamento.png" class = "img-icon-list" alt = "contrato-list" title="Possui o aditamento Contrato: ' . $NumerocontratoFilho . ' "></a></th>';
                        } elseif (strlen($anexo) > 0 and $possuiAditamento > 0 and strlen($feito_de_um_aditamento) < 1) {
                            echo '<td class = "td-icon-contract"><a href="view_anexo.php?a=' . $anexo . '&d=1"><img src = "img/anexo.png" class = "img-icon-list" alt = "contrato-list" title="anexo"></a>&nbsp<a href="ver_aditamentos.php?c=' . $id_contrato . '&d=1&n=' . $numero . '"><img src = "img/aditamento.png" class = "img-icon-list" alt = "contrato-list" title="Possui o aditamento Contrato: ' . $NumerocontratoFilho . '"></a></a></th>';
                        } elseif (strlen($anexo) < 1 and $possuiAditamento > 0 and strlen($feito_de_um_aditamento) > 0) {
                            echo '<td class = "td-icon-contract"><a href="ver_contrato.php?c=' . $feito_de_um_aditamento . '&d=1"><img src = "img/pert_contr.png" class = "img-icon-list" alt = "contrato-list" title="restrito ao contrato: ' . $NumerocontratoPai . ' da ' . $ContranteContratoPai . ' "></a>&nbsp<a href="ver_aditamentos.php?c=' . $id_contrato . '&d=1&n=' . $numero . '"><img src = "img/aditamento.png" class = "img-icon-list" alt = "contrato-list" title="Possui o aditamento Contrato: ' . $NumerocontratoFilho . '"></a></th>';
                        } elseif (strlen($anexo) > 0 and $possuiAditamento < 1 and strlen($feito_de_um_aditamento) > 0) {
                            echo '<td class = "td-icon-contract"><a href="ver_contrato.php?c=' . $feito_de_um_aditamento . '&d=1"><img src = "img/pert_contr.png" class = "img-icon-list" alt = "contrato-list" title="restrito ao contrato: ' . $NumerocontratoPai . ' da ' . $ContranteContratoPai . ' "></a>&nbsp<a href="view_anexo.php?a=' . $anexo . '&d=1"><img src = "img/anexo.png" class = "img-icon-list" alt = "contrato-list" title="anexo"></a></th>';
                        } elseif (strlen($anexo) > 0 and $possuiAditamento < 1 and strlen($feito_de_um_aditamento) < 1) {
                            echo '<td class = "td-icon-contract"><a href="view_anexo.php?a=' . $anexo . '&d=1"><img src = "img/anexo.png" class = "img-icon-list" alt = "contrato-list" title="anexo"></a></th>';
                        } elseif (strlen($anexo) < 1 and $possuiAditamento > 0 and strlen($feito_de_um_aditamento) < 1) {
                            echo '<td class = "td-icon-contract"><a href="ver_aditamentos.php?c=' . $id_contrato . '&d=1&n=' . $numero . '"><img src = "img/aditamento.png" class = "img-icon-list" alt = "contrato-list" title="Possui o aditamento Contrato: "' . $NumerocontratoFilho . '"></a></th>';
                        } elseif (strlen($anexo) < 1 and $possuiAditamento < 1 and strlen($feito_de_um_aditamento) > 0) {
                            echo '<td class = "td-icon-contract"><a href="ver_contrato.php?c=' . $feito_de_um_aditamento . '&d=1"><img src = "img/pert_contr.png" class = "img-icon-list" alt = "contrato-list" title="restrito ao contrato: ' . $NumerocontratoPai . ' da ' . $ContranteContratoPai . ' "></a></th>';
                        } else {
                            echo '<td class = "td-icon-contract">...</th>';
                        }




                        echo '<td class = "td-desc-contract">' . $contratante . '</td>
                            <td class = "td-contrato-contract">' . $contratado . '</td>
                            <td class = "td-contrato-contract">' . $numero . '</td>
                            <td class = "td-tipo-contract">' . $descTipoContrato . '</td>
                            <td class = "td-data-contract">' . Search::formateDateBR($vencimento) . '</td>
                            <td class = "td-setor-contract">' . $descSetor . '</td>    
                            <td class = "td-visu-contract"><a href="ver_contrato.php?c=' . $id_contrato . '&d=1" ><img src = "img/eye.png" class = "img-icon-list" alt = "contrato-list" title = "Visualizar Contrato"></a></td>
                            <td class = "td-visu-contract"><a href="alterar_contrato.php?c=' . $id_contrato . '&d=1" ><img src = "img/editar_contrato.png" class = "img-icon-list" alt = "contrato-list" title = "Editar Contrato"></a></td>
                            <td class = "td-visu-contract"><a href="cadastro_contrato.php?id_contr=' . $id_contrato . '" ><img src = "img/editar_contrato.png" class = "img-icon-list" alt = "contrato-list" title = "Aditar Contrato"></a></td>                         
                    </tr>
               
                    ';
                    }
                } else {

                    echo '
                    <tr>
                    <td> NENHUM CONTRATO CONTRATO COM VENCIMENTOS PARA OS PROXIMOS 30 DIAS</td>
                    </tr>
                    ';
                }
                echo '     </table>
                    </div>';
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function infoAditados($contrato, $nContrato) {
        try {


            echo ' 
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract" style="color: #f00;">
                            CONTRATO PRINCIPAL: '.$nContrato.'
                        </label>
                    </div>                    
                </div>';




            $sql = 'SELECT result.IDCONTRATO IDCONT, ct.NUMERO_CONTRATO FROM contrato ct,  
                    (

                    SELECT a.ID_CONTRATO_SUBMETIDO IDCONTRATO FROM aditamentos a 
                    INNER JOIN contrato c ON c.ID_CONTRATO = a.ID_CONTRATO_ADITADO_ADITAMENTO
                    WHERE a.ID_CONTRATO_ADITADO_ADITAMENTO = ' . $contrato . '

                    )result


                    WHERE ct.ID_CONTRATO IN(result.IDCONTRATO)';
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        $numeroC = $dados->NUMERO_CONTRATO;
                        $idCont = $dados->IDCONT;


                        echo ' 
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            CONTRATO:
                                <a href="ver_contrato.php?c=' . $idCont . '&d=1">' . $numeroC . '</a>
                        </label>
                    </div>                    
                </div>';
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function infoContrato($contrato) {
        try {
            $mes = 1;
            $idContratoView = "";

            $sql = 'SELECT * FROM CONTRATO '
                    . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                    . ' INNER JOIN EMPRESA_CONTRATO ON contrato.ID_EMPRESA_CONTRATO = empresa_contrato.ID_EMPRESA_CONTRATO'
                    . ' INNER JOIN POSSUI_PARCELA ON contrato.ID_POSSUI_PARCELA_CONTRATO = possui_parcela.ID_POSSUI_PARCELA'
                    . ' INNER JOIN OBJETO ON contrato.ID_OBJETO_CONTRATO = objeto.ID_OBJETO'
                    . ' INNER JOIN GARANTIA ON contrato.ID_GARANTIA_CONTRATO = garantia.ID_GARANTIA'
                    . ' INNER JOIN OBSERVACOES_EXIGENCIAS ON contrato.ID_OBSERVACOES_EXIGENCIAS_CONTRATO = OBSERVACOES_EXIGENCIAS.ID_OBSERVACOES_EXIGENCIAS'
                    . ' WHERE ID_LOGIN_CONTRATO = ' . $_SESSION['login'] . ' AND ID_CONTRATO = ' . $contrato;
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        $empresa = $dados->DESC_EMPRESA_CONTRATO;
                        $vencimento = $dados->VENCIMENTO_CONTRATO;
                        $numero = $dados->NUMERO_CONTRATO;
                        $contratante = $dados->CONTRATANTE_CONTRATO;
                        $contratada = $dados->CONTRATADO_CONTRATO;
                        $concorrencia = $dados->CONCORRENCIA_CONTRATO;
                        $descTipoContrato = $dados->DESC_TIPO_CONTRATO;
                        $valorContrato = $dados->VALOR_CONTRATO;
                        $quantidadeParcelaContrato = $dados->QUANTIDADE_PARCELAS_CONTRATO;
                        $quantidadeParcelasPagasContrato = $dados->QUANTIDADE_PARCELAS_PAGAS_CONTRATO;
                        $valorParcelasContrato = $dados->VALOR_DAS_PARCELAS_CONTRATO;
                        $inicioVigencia = $dados->INICIO_VIGENCIA_CONTRATO;
                        $fimVigencia = $dados->FINAL_VIGENCIA_CONTRATO;
                        $dataPagamentoParcela = $dados->DATA_PAGAMENTO_DAS_PARCELAS_CONTRATO;
                        $descObjeto = $dados->DESC_OBJETO;
                        $descGarantia = $dados->DESC_GARANTIA;
                        $descObservacao = $dados->DESC_OBSER_EXIGEN;
                        $possui_parcelas = $dados->ID_POSSUI_PARCELA_CONTRATO;
                        $idAditamentoContrato = $dados->ID_ADITAMENTO_CONTRATO;
                        $url_img = $dados->URL_IMAGEM_CONTRATO;
                        $idSetor = $dados->ID_SETOR_CONTRATO;
                        $setor = Search::descSetor($idSetor);

                        if ($idAditamentoContrato > 1) {
                            $sq = 'SELECT `ID_CONTRATO_SUBMETIDO` FROM `aditamentos` WHERE `ID_ADITAMENTO` = ' . $idAditamentoContrato;
                            $sqq = Conexao::getInstance()->prepare($sq);
                            $sqq->execute();
                            $rowl = $sqq->rowCount();
                            if ($rowl > 0) {
                                foreach ($sqq->fetchAll(PDO::FETCH_OBJ) as $dados) {
                                    $idContratoV = $dados->ID_CONTRATO_SUBMETIDO;

                                    $sq = 'SELECT `ID_CONTRATO` FROM `contrato` WHERE `ID_CONTRATO` = ' . $idContratoV . ' AND ID_STATUS_CONTRATO = 1';
                                    $sqq = Conexao::getInstance()->prepare($sq);
                                    $sqq->execute();
                                    $rowl = $sqq->rowCount();
                                    if ($rowl > 0) {
                                        foreach ($sqq->fetchAll(PDO::FETCH_OBJ) as $dados) {
                                            $idContratoView = $dados->ID_CONTRATO;
                                        }
                                    }
                                }
                            }
                        }



                        echo ' 
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            EMPRESA:
                            <span>' . $empresa . '</span>
                        </label>
                    </div>                    
                </div>
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            NÚMERO CONTRATO:
                            <span>' . $numero . '</span>
                        </label>
                    </div>                    
                </div>
                <div class="line-finally-contract">                
                     <div class="form-contract-fim">
                        <label class="title-info-contract">
                            VENCIMENTO:
                            <span>' . Search::formateDateBR($vencimento) . '</span>
                        </label>
                    </div>
                </div>
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            CONTRATANTE:
                            <span>' . $contratante . '</span>
                        </label>
                    </div>
                </div>
                <div class="line-finally-contract">                
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            CONTRATADA:
                            <span>' . $contratada . '</span>
                        </label>
                    </div>
                </div>
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            TIPO CONTRATO:
                            <span>' . $descTipoContrato . '</span>
                        </label>
                    </div>

                   
                </div>
                 <div class="line-finally-contract">                
                   <div class="form-contract-fim">
                        <label class="title-info-contract">
                            CONCORRÊNCIA:
                            <span>' . $concorrencia . '</span>
                        </label>
                    </div>
                </div>
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            VALOR CONTRATO:
                            <span>R$ ' . $valorContrato . '</span>
                        </label>
                    </div>
                </div>';
                        if ($possui_parcelas == 1) {
                            ECHO '<div class="line-finally-contract">                      
                      <div class="form-contract-fim">
                        <label class="title-info-contract">
                            QUANTIDADE DE PARCELAS:
                            <span>' . $quantidadeParcelaContrato . '</span>
                        </label>
                    </div>
                </div>
                   <div class="line-finally-contract">                
                      <div class="form-contract-fim">
                        <label class="title-info-contract">
                            VALOR DAS PARCELAS:
                            <span>R$ ' . $valorParcelasContrato . '</span>
                        </label>
                    </div>
                </div>
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            QUANTIDADE DE PARCELAS PAGAS:
                            <span>' . $quantidadeParcelasPagasContrato . '</span>
                        </label>
                    </div>
                </div>                
                <div class="line-finally-contract">                
                      <div class="form-contract-fim">
                        <label class="title-info-contract">
                            DATA PRIMEIRO PAGAMENTO:
                            <span>' . Search::formateDateBR($dataPagamentoParcela) . '</span>
                        </label>
                    </div>
                </div>
                <div class="line-finally-contract">                
                     <div class="form-contract-fim">
                        <label class="title-info-contract">
                            ADITAMENTO:
                            <span>NÃO</span>
                        </label>
                    </div>
                </div>';
                        }

                        echo' <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            INICIO VIGÊNCIA:
                            <span>' . Search::formateDateBR($inicioVigencia) . '</span>
                        </label>
                    </div>
                    
                </div>
                <div class="line-finally-contract">                
                     <div class="form-contract-fim">
                        <label class="title-info-contract">
                            FIM VIGÊNCIA:
                            <span>' . Search::formateDateBR($fimVigencia) . '</span>
                        </label>
                    </div>
                </div>';
                        if ($descGarantia > 0) {
                            echo
                            '<div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <p class="title-info-contract">
                            GARANTIA:
                            <span>' . $descGarantia . '</span>
                        </p>
                    </div>
                </div>';
                        }


                        if ($descObjeto > 0) {
                            echo
                            '<div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            OBJETO:
                            <span>' . $descObjeto . '</span>
                        </label>
                    </div>
                </div>';
                        }

                        if ($descObservacao > 0) {
                            echo
                            '<div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            OBSERVAÇÃO:
                            <span>' . $descObservacao . '</span>
                        </label>
                    </div>                 
                </div>';
                        }

                        if ($idContratoView > 1) {
                            echo
                            '<div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            ADITAMENTO:
                                <span><a href="ver_contrato.php?c=' . $idContratoView . '&d=1"><img src = "img/aditamento.png" class = "img-icon-list" alt = "contrato-list" title="possui aditamento"></a></span>
                        </label>
                    </div>                 
                </div>';
                        }

                        if (strlen($url_img) > 0) {
                            echo '<div class="line-finally-contract">
                                <div class="form-contract-fim">
                                    <label class="title-info-contract">
                                        ANEXO:
                                           <span> <a href="view_anexo.php?a=' . $url_img . '&d=1"><img src = "img/lupa.png" class = "img-icon-list" alt = "contrato-list"></a></span>
                                    </label>
                                </div>                 
                             </div>
                             ';
                        }

                        echo '<div class="line-finally-contract">                
                            <div class="form-contract-fim">
                               <label class="title-info-contract">
                                   SETOR:
                                   <span>' . $setor . '</span>
                               </label>
                           </div>
                        </div>';

                        if (strlen($descObjeto) > 0) {
                            echo '<div class="line-finally-contract">
                                <div class="form-contract-fim">
                                    <label class="title-info-contract">
                                        OBJETO:
                                           <span>' . $descObjeto . '</span>
                                    </label>
                                </div>                 
                             </div>
                             ';
                        }
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function formateDateBR($i) {
        $l = explode('-', $i);
        return $l[2] . "/" . $l[1] . "/" . $l[0];
    }

    public static function otherFormateDateBR($e) {
        $t = explode('-', $e);
        return $t[2] . "-" . $t[1] . "-" . $t[0];
    }

    /*
      public static function contratosProximoVencimento() {
      try {
      $mes = 1;

      $sql = 'SELECT * FROM CONTRATO WHERE VENCIMENTO_CONTRATO BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL "' . $mes . '" MONTH) ';
      $sqll = Conexao::getInstance()->prepare($sql);
      if ($sqll->execute()) {
      $count = $sqll->rowCount();
      if ($count > 0) {
      foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
      $vencimento = $dados->VENCIMENTO_CONTRATO;
      $numero = $dados->NUMERO_CONTRATO;
      $contratante = $dados->CONTRATANTE_CONTRATO;
      //  echo 'Contrato '.$numero.' - '.' Vencimento'.$vencimento.'<br>';


      echo '<div class = "listtb" data-aos = "fade-left"
      data-aos-anchor = "#example-anchor"
      data-aos-offset = "400"
      data-aos-duration = "400">

      <table class = "tb-list" id = "result">
      <tr>
      <td class = "td-icon"><img src = "../images/editar_contrato.png" class = "img-icon-list" alt = "contrato-list"></th>
      <td class = "td-desc"><div class = "td-desc-list">' . $contratante . '</div></td>
      <td class = "td-contrato">' . $numero . '</td>
      <td class = "td-data">' . $vencimento . '</td>
      </tr>
      </table>
      </div>
      ';
      }
      } else {

      echo '<div data-aos = "fade-left"
      data-aos-anchor = "#example-anchor"
      data-aos-offset = "400"
      data-aos-duration = "400">

      <table class = "tb-liste">
      <tr>
      <td> NENHUM CONTRATO CONTRATO COM VENCIMENTOS PARA OS PROXIMOS 30 DIAS</td>
      </tr>
      </table>
      </div>
      ';
      }
      }
      } catch (Exception $exc) {
      echo $exc->getTraceAsString();
      }
      }
     */

    public static function buscaIdGarantia($numeroContrato) {

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

    public static function buscaIdObservacoesExigencias($numeroContrato) {
        try {
            $sql = 'SELECT ID_OBSERVACOES_EXIGENCIAS FROM '
                    . 'OBSERVACOES_EXIGENCIAS WHERE NUMERO_DESC_OBSER_EXIGEN = ' . $numeroContrato . ' ';
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

    public static function BuscaGarantia($_idContratoGarantia) {
        try {
            $sql = 'SELECT ID_GARANTIA FROM '
                    . 'GARANTIA WHERE ID_CONTRATO_GARANTIA = ' . $_idContratoGarantia . '';
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchall(PDO::FETCH_OBJ) as $dados) {
                        return $dados->ID_GARANTIA;
                    }
                } else {
                    echo 'não buscou ID_GARANTIA';
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function BuscaObjeto($idContratoObjeto) {
        try {

            $sql = 'SELECT ID_OBJETO FROM '
                    . 'OBJETO WHERE ID_CONTRATO_OBJETO = ' . $idContratoObjeto . '';
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchall(PDO::FETCH_OBJ) as $dados) {
                        return $dados->ID_OBJETO;
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function BuscaTipoContrato($idContrato) {
        try {
            $sql = 'SELECT ID_TIPO_CONTRATO FROM '
                    . 'CONTRATO WHERE ID_CONTRATO = ' . $idContrato . '';
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchall(PDO::FETCH_OBJ) as $dados) {
                        return $dados->ID_TIPO_CONTRATO;
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public static function BuscaObs($idContratoObs) {
        try {
            $sql = 'SELECT ID_OBSERVACOES_EXIGENCIAS FROM '
                    . 'OBSERVACOES_EXIGENCIAS WHERE ID_CONTRATO_OBSERVACOES = ' . $idContratoObs . '';
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

    public static function BuscaGarantiaUpdate($id) {
        try {

            $sql = 'SELECT * FROM GARANTIA WHERE ID_CONTRATO_GARANTIA = ' . $id;
            $ssql = Conexao::getInstance()->prepare($sql);
            if ($ssql->execute()) {
                $count = $ssql->rowCount();
                if ($count > 0) {
                    foreach ($ssql->fetchall(PDO::FETCH_OBJ) as $dados) {
                        return $d = $dados->DESC_GARANTIA;
                    }
                } else {
                    echo'Não achou linha';
                }
            } else {
                echo' Não buscou';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function BuscaObjetoUpdate($id) {
        try {

            $sql = 'SELECT * FROM OBJETO WHERE ID_CONTRATO_OBJETO = ' . $id;
            $ssql = Conexao::getInstance()->prepare($sql);
            if ($ssql->execute()) {
                $count = $ssql->rowCount();
                if ($count > 0) {
                    foreach ($ssql->fetchall(PDO::FETCH_OBJ) as $dados) {

                        return $d = $dados->DESC_OBJETO;
                    }
                } else {
                    echo'Não achou linha';
                }
            } else {
                echo' Não buscou';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function BuscaObservacaoUpdate($id) {
        try {

            $sql = 'SELECT * FROM OBSERVACOES_EXIGENCIAS WHERE ID_CONTRATO_OBSERVACOES = ' . $id;
            $ssql = Conexao::getInstance()->prepare($sql);
            if ($ssql->execute()) {
                $count = $ssql->rowCount();
                if ($count > 0) {
                    foreach ($ssql->fetchall(PDO::FETCH_OBJ) as $dados) {

                        return $d = $dados->DESC_OBSER_EXIGEN;
                    }
                } else {
                    echo'Não achou linha';
                }
            } else {
                echo' Não buscou';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function buscaEmailUsuario($email) {
        try {
            $random = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789", 5)), 0, 15);
            $sql = 'SELECT * FROM USUARIO WHERE EMAIL_USUARIO = "' . $email . '"';
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        $idUsuario = $dados->ID_USUARIO;
                        $token1 = $dados->EMAIL_USUARIO;
                        $token = sha1(rand(1000, 999999) . $random);

                        $tokenCadastrado = Insert::gerarToken($idUsuario, $token);
                        if ($tokenCadastrado == '00') {
                            return $token;
                        }
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public static function buscaPrivateToken($token) {
        try {
            $sql = 'SELECT * FROM RECUPERAR_SENHA WHERE PRIVATE_TOKEN = "' . $token . '" AND ID_STATUS_ALTERAR = 1';
            $ssql = Conexao::getInstance()->prepare($sql);
            if ($ssql->execute()) {
                $count = $ssql->rowCount();
                if ($count > 0) {
                    foreach ($ssql->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        return $dados->ID_USUARIO;
                        //Update::updatelogin($idUsuario, $usuario, $senha);
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public static function ListarContratos() {


        try {

            $sql = 'SELECT * FROM `contrato`';
            $lqs = Conexao::getInstance()->prepare($sql);
            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        echo'<option>' . $dados->NUMERO_CONTRATO . '</option>';
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao Listar Contratos';
        }
    }

    public static function Contra_a_aditar($id_contr) {

        try {
            $num_contr = "";
            $sql = 'SELECT * FROM `contrato` WHERE ID_CONTRATO = ' . $id_contr;
            $lqs = Conexao::getInstance()->prepare($sql);
            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        $num_contr = $dados->NUMERO_CONTRATO;
                        if ($num_contr == NULL) {
                            $num_contr = "<strong style='color: gray'>***</strong>";
                        }
                        echo'<strong>ADITAMENTO: </strong>  Contrato:' . $num_contr . ' Contrante: ' . $dados->CONTRATANTE_CONTRATO;
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao Listar Contrato a ser Aditado';
        }
    }

    public static function buscarContrato($id_contrato) {

        try {
            $sql = 'SELECT ID_CONTRATO FROM `contrato` '
                    . 'WHERE ID_STATUS_CONTRATO = 1 '
                    . 'AND ID_CONTRATO = "' . $id_contrato . '" '
                    . 'AND ID_ADITAMENTO_CONTRATO > 0';
            $lqs = Conexao::getInstance()->prepare($sql);

            $lqs->execute();
            $row = $lqs->rowCount();
            return $row;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao listar buscarContrato';
        }
    }

    public static function verificarOrigem($id_contrato) {

        try {
            $sql = 'SELECT ID_CONTRATO_ADITADO_ADITAMENTO FROM contrato  '
                    . 'INNER JOIN aditamentos  ON ID_CONTRATO = ID_CONTRATO_SUBMETIDO '
                    . 'WHERE ID_CONTRATO_SUBMETIDO = "' . $id_contrato . '"';
            $lqs = Conexao::getInstance()->prepare($sql);
            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        return $dados->ID_CONTRATO_ADITADO_ADITAMENTO;
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao verificar se contrato foi criado com base em um aditamento';
        }
    }

    public static function verificarAditamento($excluir_contr) {

        try {

            $sql = 'SELECT ID_ADITAMENTO_CONTRATO FROM contrato WHERE ID_STATUS_CONTRATO = 1 AND ID_CONTRATO = ' . $excluir_contr;
            $lqs = Conexao::getInstance()->prepare($sql);
            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {
                    $idAditamentoContrato = $dados->ID_ADITAMENTO_CONTRATO;

                    $sql = 'SELECT ID_CONTRATO_SUBMETIDO FROM aditamentos WHERE ID_ADITAMENTO = ' . $idAditamentoContrato;
                    $lqs = Conexao::getInstance()->prepare($sql);
                    if ($lqs->execute()) {
                        $row = $lqs->rowCount();
                        foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {
                            $idContratoSubmetido = $dados->ID_CONTRATO_SUBMETIDO;

                            $sql = 'SELECT ID_CONTRATO FROM contrato WHERE ID_STATUS_CONTRATO = 1 AND ID_CONTRATO = ' . $idContratoSubmetido;
                            $lqs = Conexao::getInstance()->prepare($sql);
                            if ($lqs->execute()) {
                                $row = $lqs->rowCount();
                                return $row;
                            }
                        }
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha se aditamento do contrato esta ativo';
        }
    }

    public static function possuiAditamento($excluir_contr) {

        try {
            $sql = 'SELECT ID_CONTRATO FROM contrato  '
                    . 'WHERE ID_CONTRATO = "' . $excluir_contr . '" '
                    . 'AND ID_STATUS_CONTRATO = 1 AND ID_ADITAMENTO_CONTRATO IS NOT NULL ';
            $lqs = Conexao::getInstance()->prepare($sql);
            if ($lqs->execute()) {
                $row = $lqs->rowCount();

                return $row;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao verificar se contrato possui aditamento';
        }
    }

    public static function verificaAtivo($excluir_contr) {


        try {
            $sql = 'SELECT ID_CONTRATO FROM contrato  '
                    . 'WHERE ID_CONTRATO = "' . $id_contrato . '" '
                    . 'AND ID_STATUS_CONTRATO = 1 ';
            $lqs = Conexao::getInstance()->prepare($sql);
            if ($lqs->execute()) {
                $row = $lqs->rowCount();

                return $row;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao retornar linha';
        }
    }

    public static function NumeroContratoPai($feito_de_um_aditamento) {


        try {
            $sql = 'SELECT NUMERO_CONTRATO FROM contrato  '
                    . 'WHERE ID_CONTRATO = "' . $feito_de_um_aditamento . '" '
                    . 'AND ID_STATUS_CONTRATO = 1 ';
            $lqs = Conexao::getInstance()->prepare($sql);
            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {

                        return $dados->NUMERO_CONTRATO;
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao buscar numero contrato';
        }
    }

    public static function NumeroContratoFilho($id_contrato) {

        try {
            $contratosList = '';
            $sql = 'SELECT c.NUMERO_CONTRATO NUMERO_CONTRATO
                    FROM aditamentos a 
                    INNER JOIN contrato c ON c.ID_CONTRATO = a.ID_CONTRATO_SUBMETIDO
                    WHERE a.ID_CONTRATO_ADITADO_ADITAMENTO = ' . $id_contrato;
            $lqs = Conexao::getInstance()->prepare($sql);
            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {

                        $contratosList .= 'N°: ' . $dados->NUMERO_CONTRATO . '  ';
                    }
                    return $contratosList;
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao buscar numero contrato';
        }
    }

    public static function ContratanteContratoPai($feito_de_um_aditamento) {

        try {
            $sql = 'SELECT CONTRATANTE_CONTRATO FROM contrato  '
                    . 'WHERE ID_CONTRATO = "' . $feito_de_um_aditamento . '" '
                    . 'AND ID_STATUS_CONTRATO = 1 ';
            $lqs = Conexao::getInstance()->prepare($sql);
            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {

                        return $dados->CONTRATANTE_CONTRATO;
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao buscar contratante';
        }
    }

    public static function idSetor($descSetor) {

        try {
            $sql = 'SELECT ID_SETOR FROM setor  '
                    . 'WHERE DESC_SETOR = "' . $descSetor . '"';
            $lqs = Conexao::getInstance()->prepare($sql);
            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {

                        return $dados->ID_SETOR;
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao buscar idSetor';
        }
    }

    public static function idUsuario($nome, $email) {


        try {
            $sql = 'SELECT ID_USUARIO FROM usuario where NOME_USUARIO = "' . $nome . '" and EMAIL_USUARIO = "' . $email . '"';
            $lqs = Conexao::getInstance()->prepare($sql);
            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {

                        return $dados->ID_USUARIO;
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao buscar idUsuario';
        }
    }

    public static function senhaLogin($idUsuario) {


        try {

            $sql = 'SELECT SENHA_LOGIN FROM login'
                    . 'WHERE ID_USUARIO_LOGIN = "' . $idUsuario . '"';
            $lqs = Conexao::getInstance()->prepare($sql);
            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {

                        return $dados->SENHA_LOGIN;
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao verificar se contrato esta ativo';
        }
    }

    public static function ListarSetor() {

        try {

            $sql = 'SELECT * FROM SETOR';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {

                        echo' <option value=' . $dados->DESC_SETOR . '></option> ';
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao Listar Setores';
        }
    }

    public static function verificaSetorExiste(setor $setor) {

        try {

            $descSetor = $setor->getDescSetor();

            $sql = 'SELECT ID_SETOR FROM SETOR where DESC_SETOR = "' . $descSetor . '"';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();

                return $row;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao verificar se setor existe';
        }
    }

    public static function LoginSenha($idUsuario, $senha) {

        try {

            //$sql = 'SELECT USUARIO_LOGIN, SENHA_LOGIN FROM login where ID_USUARIO_LOGIN = "' . $idUsuario . '" AND SENHA_LOGIN = "' . $senha . '"';
            $sql = 'SELECT * from login INNER JOIN usuario ON login.ID_USUARIO_LOGIN = usuario.ID_USUARIO where ID_USUARIO_LOGIN = "' . $idUsuario . '" AND SENHA_LOGIN = "' . $senha . '"';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {

                        $inf[] = array(
                            'USUARIO' => $dados->USUARIO_LOGIN,
                            'SENHA' => $dados->SENHA_LOGIN,
                            'EMAIL' => $dados->EMAIL_USUARIO
                        );

                        $json = json_encode($inf);
                        return $json;
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao pegar usuario e senha';
        }
    }

    public static function verificarEmailExiste($_emailUsuario) {

        try {

            //$sql = 'SELECT USUARIO_LOGIN, SENHA_LOGIN FROM login where ID_USUARIO_LOGIN = "' . $idUsuario . '" AND SENHA_LOGIN = "' . $senha . '"';
            $sql = 'SELECT ID_USUARIO from usuario WHERE EMAIL_USUARIO = "' . $_emailUsuario . '" ';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();

                return $row;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao pegar usuario e senha';
        }
    }

    public static function obterIdUsuario($email) {

        try {

            //$sql = 'SELECT USUARIO_LOGIN, SENHA_LOGIN FROM login where ID_USUARIO_LOGIN = "' . $idUsuario . '" AND SENHA_LOGIN = "' . $senha . '"';
            $sql = 'SELECT ID_USUARIO from usuario WHERE EMAIL_USUARIO = "' . $email . '" ';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {

                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        return $dados->ID_USUARIO;
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao obter idUsuario';
        }
    }

    public static function idTime($idUsuario) {

        try {

            //$sql = 'SELECT USUARIO_LOGIN, SENHA_LOGIN FROM login where ID_USUARIO_LOGIN = "' . $idUsuario . '" AND SENHA_LOGIN = "' . $senha . '"';
            $sql = 'SELECT ID_TIME_LOGIN from time_login WHERE ID_USUARIO_LOGIN = "' . $idUsuario . '" ';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {

                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        return $dados->ID_TIME_LOGIN;
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao obter idUsuario';
        }
    }

    public static function verificarTempo($email) {


        try {

            //$sql = 'SELECT USUARIO_LOGIN, SENHA_LOGIN FROM login where ID_USUARIO_LOGIN = "' . $idUsuario . '" AND SENHA_LOGIN = "' . $senha . '"';
            $sql = 'SELECT ID_USUARIO from usuario WHERE EMAIL_USUARIO = "' . $email . '" ';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {

                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {


                        $idUsuario = Search::obterIdUsuario($email);

                        $verificaTime = Search::verificarTime($idUsuario);

                        if ($verificaTime > '24:00') {

                            return '00';
                        }

                        return '01';
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao obter idUsuario';
        }
    }

    public static function verificarTime($idUsuario) {

        try {


            // $sql = 'SELECT ID_TIME_LOGIN from time_login WHERE ID_USUARIO_LOGIN = "'.$email.'" ';
            $sql = 'SELECT TIMEDIFF(CURRENT_TIMESTAMP, `TIME_LOGIN`) TIME from TIME_LOGIN where `ID_USUARIO_LOGIN` = "' . $idUsuario . '"';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {

                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        return $dados->TIME;
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao obter idUsuario';
        }
    }

    public static function descSetor($idSetor) {

        try {

            //$sql = 'SELECT USUARIO_LOGIN, SENHA_LOGIN FROM login where ID_USUARIO_LOGIN = "' . $idUsuario . '" AND SENHA_LOGIN = "' . $senha . '"';
            $sql = 'SELECT DESC_SETOR from setor WHERE ID_SETOR = "' . $idSetor . '"';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {

                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {

                        return $dados->DESC_SETOR;
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao obter nome do setor';
        }
    }

    public static function descSetorJson() {

        try {

            //$sql = 'SELECT USUARIO_LOGIN, SENHA_LOGIN FROM login where ID_USUARIO_LOGIN = "' . $idUsuario . '" AND SENHA_LOGIN = "' . $senha . '"';
            $sql = 'SELECT DESC_SETOR from setor';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {

                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {

                        $inf[] = array(
                            'NOME' => $dados->DESC_SETOR
                        );
                    }
                    $json = json_encode($inf);
                    return $json;
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao obter nome do setor';
        }
    }

    public static function verificarObjeto($id_contrato) {

        try {

            $sql = 'SELECT * from OBJETO WHERE ID_CONTRATO_OBJETO = "' . $id_contrato . '"';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {

                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {

                        return $dados->DESC_OBJETO;
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao listar objeto';
        }
    }

    public static function panelAlert() {

        try {
            $diaQtdAlert = Search::diasAlerta();

            $sql = 'SELECT  
                                ID_CONTRATO,
                                (
                                SELECT a.diasParaVencer FROM alertas a
                                )DIASPARAVENCER,
                                (
                                    SELECT COUNT(cs.ID_CONTRATO) FROM contrato cs 
                                    WHERE cs.VENCIMENTO_CONTRATO  
                                    BETWEEN CURDATE() AND (CURDATE() + INTERVAL "' . $diaQtdAlert . '" DAY) AND cs.ID_STATUS_CONTRATO = 1
                                )QTD 
                                FROM CONTRATO 				
                                INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO 
                                WHERE VENCIMENTO_CONTRATO  
                                BETWEEN CURDATE() AND (CURDATE() + INTERVAL "' . $diaQtdAlert . '" DAY) AND ID_STATUS_CONTRATO = 1 
                                ORDER BY VENCIMENTO_CONTRATO';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {

                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {

                        $inf [] = array(
                            "IDCONTRATO" => $dados->ID_CONTRATO,
                            "QTDCONTRATO" => $dados->QTD,
                            "DIASPARAVENCER" => $dados->DIASPARAVENCER
                        );
                        return $json = json_encode($inf);
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao listar objeto';
        }
    }

    public static function emailAlert() {

        try {
            $emailCadastro = '';
            $diaQtdAlert = Search::diasAlerta();
            $statusAlert = Search::statusAlerta();
            $diaSemana = Search::diaDaSemana();
            $diaDoAlerta = Search::diaDoAlerta();

            if ($diaDoAlerta == $diaSemana and $statusAlert == '1') {


                $sql = '
                    SELECT
                        DISTINCT
                        NUMERO_CONTRATO,
                        CONTRATANTE_CONTRATO,
                        CONTRATADO_CONTRATO,
                    ( 
                        SELECT 
                        a.emailDestinatario FROM alertas a 
                    )EMAILCADASTRO, 
                    ( 
                        SELECT 
                        a.diasParaVencer FROM alertas a 
                    )DIASPARAVENCER,
                    ( 
                        SELECT 
                        a.idStatus FROM alertas a 
                    )STATUSEMAIL,
                    (
                      SELECT COUNT(cs.ID_CONTRATO) FROM contrato cs 
                        WHERE cs.VENCIMENTO_CONTRATO  
                        BETWEEN CURDATE() AND (CURDATE() + INTERVAL "' . $diaQtdAlert . '" DAY) 
                        AND cs.ID_STATUS_CONTRATO = 1
                     )QTD_CONTRATOS
                    FROM CONTRATO 
                    INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO
                    WHERE VENCIMENTO_CONTRATO BETWEEN CURDATE() AND (CURDATE() + INTERVAL "' . $diaQtdAlert . '" DAY) 
                    AND ID_STATUS_CONTRATO = 1
                    AND (SELECT Al.diaReceberEmail FROM alertas AL) = ( SELECT WEEKDAY(CURDATE()) ) 
                    ORDER BY VENCIMENTO_CONTRATO';
                $lqs = Conexao::getInstance()->prepare($sql);

                if ($lqs->execute()) {
                    $row = $lqs->rowCount();
                    if ($row > 0) {

                        foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {

                            $emailCadastro = $dados->EMAILCADASTRO;
                            $info[] = array(
                                'NUMERO_CONTRATO' => $dados->NUMERO_CONTRATO,
                                'DIAS_PARA_VENCER' => $dados->DIASPARAVENCER,
                                'CONTRATANTE_CONTRATO' => $dados->CONTRATANTE_CONTRATO,
                                'CONTRATADO_CONTRATO' => $dados->CONTRATADO_CONTRATO,
                            );
                        }



                        return $json = EnviarEmail::sendMailm($info, $emailCadastro);
                        //echo '<script type="text/javascript">location.href =emailAlerta.php;</script>';
                        // header("Location: emailAlerta.php");
                        // return $json = json_encode($info);
                    }
                }
            } else if ($diaDoAlerta == $diaSemana and $statusAlert == '2') {
                $info = array('RESULT' => 'TRUE');
                echo json_encode($info);
            } else {
                Update::alterarStatusEmail_2();
                $info = array('RESULT' => 'TRUE');
                echo json_encode($info);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao listar emailAlert';
        }
    }

    public static function diasAlerta() {

        try {

            $sql = 'SELECT diasParaVencer FROM ALERTAS ';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {

                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {

                        return $dados->diasParaVencer;
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao listar diasAlerta';
        }
    }

    public static function verificarAlert() {

        try {

            $sql = 'SELECT * FROM ALERTAS ';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    return true;
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao verificarAlert';
        }
    }

    public static function listarAlertas() {


        try {

            $sql = 'SELECT * FROM ALERTAS ';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        $inf [] = array(
                            'EMAIL' => $dados->emailDestinatario,
                            'DIAPARAVENCER' => $dados->diasParaVencer,
                            'DIARECEBEREMAIL' => $dados->diaReceberEmail
                        );
                    }
                    return $json = json_encode($inf);
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao listarAlertas';
        }
    }

    public static function statusAlerta() {

        try {

            $sql = 'SELECT a.idStatus FROM ALERTAS a';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        
                    }
                    return $dados->idStatus;
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao statusAlerta';
        }
    }

    public static function diaDaSemana() {


        try {

            $sql = 'SELECT WEEKDAY(CURDATE()) DIA ';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        
                    }
                    return $dados->DIA;
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao diaDaSemana';
        }
    }

    public static function diaDoAlerta() {

        try {

            $sql = 'SELECT a.diaReceberEmail DIA_DO_ALERTA FROM alertas a';
            $lqs = Conexao::getInstance()->prepare($sql);

            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        
                    }
                    return $dados->DIA_DO_ALERTA;
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao diaDoAlerta';
        }
    }

}
