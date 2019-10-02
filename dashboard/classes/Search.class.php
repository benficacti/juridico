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

    public function loginAuth($login, $senha) {

        try {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            $mac = NULL;

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
                        $_SESSION['idlogin'] = $idlogin;

                        if ($senha == $senhas) {
                            $_SESSION['login'] = $login;
                            $_SESSION['nivel'] = $nivel;
                            $_SESSION['usuario'] = $usuario;
                            $_SESSION['tipo_acesso'] = $tipo_acesso;


                            $ins = "INSERT INTO `LOG`(`ID_TIPO_LOG`, `DATA_LOG`, `HORA_LOG`, `ID_LOGIN_LOG`, `IP_LOG`, `MAC_ADDRESS_LOG`)"
                                    . "VALUES(:ID_TIPO_LOG, CURDATE(), CURTIME(), :ID_LOGIN_LOG, :IP_LOG, :MAC_ADDRESS_LOG)";
                            $i_ins = Conexao::getInstance()->prepare($ins);
                            $i_ins->bindParam(':ID_TIPO_LOG', $tipo_log);
                            $i_ins->bindParam(':ID_LOGIN_LOG', $login);
                            $i_ins->bindParam(':IP_LOG', $ip);
                            $i_ins->bindParam(':MAC_ADDRESS_LOG', $mac);

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

    public function BuscaUsuario($idusuario) {
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

    public function BuscaContrato($contratante) {

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

    public function BuscaUltimoId($idLogin) {

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

    public function proximosVencimentos($vencimento, $busca) {
        $data = date('Y-m-d');
        switch ($vencimento) {
            case 0:
                $sql = "SELECT * FROM CONTRATO "
                        . " INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO"
                        . " WHERE NUMERO_CONTRATO like '%" . $busca . "%' or VENCIMENTO_CONTRATO like '%" . $busca . "%' or"
                        . " CONTRATANTE_CONTRATO like '%" . $busca . "%'";
                $sqll = Conexao::getInstance()->prepare($sql);
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
                        $descTipoContrato = $dados->DESC_TIPO_CONTRATO;

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

    public function filtroMeusContratos($tipos, $status_vencimento, $nContrato) {
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
            $a = ($tipos == 0);

            if (($tipos == 0)) {
                $sql = "SELECT * FROM CONTRATO "
                        . " INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO"
                        . " WHERE NUMERO_CONTRATO like '%" . $nContrato . "%' and ID_LOGIN_CONTRATO = " . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }
            if (($tipos == 1) or ( $tipos == 2)) {
                $sql = "SELECT * FROM CONTRATO "
                        . " INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO"
                        . " WHERE NUMERO_CONTRATO like '%" . $nContrato . "%' and contrato.ID_TIPO_CONTRATO = " . $tipos . " AND ID_LOGIN_CONTRATO = " . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }
            if (($tipos == 0) and ( $status_vencimento == 1)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE contrato.VENCIMENTO_CONTRATO >= "' . $date . '" AND '
                        . ' contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }
            if (($tipos == 0) and ( $status_vencimento == 2)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE contrato.VENCIMENTO_CONTRATO < "' . $date . '" AND'
                        . ' contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }
            if (($tipos == 1) and ( $status_vencimento == 1)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE contrato.ID_TIPO_CONTRATO = ' . $tipos . ' AND '
                        . 'contrato.VENCIMENTO_CONTRATO >= "' . $date . '" AND contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }

            if (($tipos == 1) and ( $status_vencimento == 2)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE contrato.ID_TIPO_CONTRATO = ' . $tipos . ' AND '
                        . 'contrato.VENCIMENTO_CONTRATO < "' . $date . '" AND contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }
            if (($tipos == 2) and ( $status_vencimento == 1)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE contrato.ID_TIPO_CONTRATO = ' . $tipos . ' AND '
                        . 'contrato.VENCIMENTO_CONTRATO >= "' . $date . '" AND contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'];
                $sqll = Conexao::getInstance()->prepare($sql);
            }
            if (($tipos == 2) and ( $status_vencimento == 2)) {
                $sql = 'SELECT * FROM CONTRATO'
                        . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                        . ' WHERE contrato.ID_TIPO_CONTRATO = ' . $tipos . ' AND '
                        . 'contrato.VENCIMENTO_CONTRATO < "' . $date . '" AND contrato.ID_LOGIN_CONTRATO = ' . $_SESSION['login'];
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
                        $descTipoContrato = $dados->DESC_TIPO_CONTRATO;
                        $anexo = $dados->URL_IMAGEM_CONTRATO;
                        $aditamento = $dados->ID_ADITAMENTO_CONTRATO;

                        $possuiAditamento = Search::buscarContrato($aditamento);

                        //VERIFICAR QUAL CONTRATO FOI CRIADO APARTIR DE ADITAMENTO
                        $feito_de_um_aditamento = Search::verificarOrigem($id_contrato);




                        echo '<tr>';
                        if (strlen($anexo) > 0 and strlen($possuiAditamento) > 0 and strlen($feito_de_um_aditamento) > 0) {
                            echo '<td class = "td-icon-contract"><a href="ver_contrato.php?c=' . $feito_de_um_aditamento . '&d=1"><img src = "img/pert_contr.png" class = "img-icon-list" alt = "contrato-list"></a>&nbsp<a href="view_anexo.php?a=' . $anexo . '&d=1"><img src = "img/anexo.png" class = "img-icon-list" alt = "contrato-list"></a>&nbsp<a href="ver_contrato.php?c=' . $possuiAditamento . '&d=1"><img src = "img/aditamento.png" class = "img-icon-list" alt = "contrato-list"></a></th>';
                        } elseif (strlen($anexo) > 0 and strlen($possuiAditamento) > 0 and strlen($feito_de_um_aditamento) < 1) {
                            echo '<td class = "td-icon-contract"><a href="view_anexo.php?a=' . $anexo . '&d=1"><img src = "img/anexo.png" class = "img-icon-list" alt = "contrato-list"></a>&nbsp<a href="ver_contrato.php?c=' . $possuiAditamento . '&d=1"><img src = "img/aditamento.png" class = "img-icon-list" alt = "contrato-list"></a></th>';
                        } elseif (strlen($anexo) < 1 and strlen($possuiAditamento) > 0 and strlen($feito_de_um_aditamento) > 0) {
                            echo '<td class = "td-icon-contract"><a href="ver_contrato.php?c=' . $feito_de_um_aditamento . '&d=1"><img src = "img/pert_contr.png" class = "img-icon-list" alt = "contrato-list"></a>&nbsp<a href="ver_contrato.php?c=' . $possuiAditamento . '&d=1"><img src = "img/aditamento.png" class = "img-icon-list" alt = "contrato-list"></a></th>';
                        } elseif (strlen($anexo) > 0 and strlen($possuiAditamento) < 1 and strlen($feito_de_um_aditamento) > 0) {
                            echo '<td class = "td-icon-contract"><a href="ver_contrato.php?c=' . $feito_de_um_aditamento . '&d=1"><img src = "img/pert_contr.png" class = "img-icon-list" alt = "contrato-list"></a>&nbsp<a href="view_anexo.php?a=' . $anexo . '&d=1"><img src = "img/anexo.png" class = "img-icon-list" alt = "contrato-list"></a></th>';
                        } elseif (strlen($anexo) > 0 and strlen($possuiAditamento) < 1 and strlen($feito_de_um_aditamento) < 1) {
                            echo '<td class = "td-icon-contract"><a href="view_anexo.php?a=' . $anexo . '&d=1"><img src = "img/anexo.png" class = "img-icon-list" alt = "contrato-list"></a></th>';
                        } elseif (strlen($anexo) < 1 and strlen($possuiAditamento) > 0 and strlen($feito_de_um_aditamento) < 1) {
                            echo '<td class = "td-icon-contract"><a href="ver_contrato.php?c=' . $possuiAditamento . '&d=1"><img src = "img/aditamento.png" class = "img-icon-list" alt = "contrato-list"></a></th>';
                        } elseif (strlen($anexo) < 1 and strlen($possuiAditamento) < 1 and strlen($feito_de_um_aditamento) > 0) {
                            echo '<td class = "td-icon-contract"><a href="ver_contrato.php?c=' . $feito_de_um_aditamento . '&d=1"><img src = "img/pert_contr.png" class = "img-icon-list" alt = "contrato-list"></a></th>';
                        } else {
                            echo '<td class = "td-icon-contract"></th>';
                        }



                        echo '<td class = "td-desc-contract"><div class = "td-desc-list-contract">' . $contratante . '</div></td>
                    <td class = "td-contrato-contract">' . $numero . '</td>
                    <td class = "td-tipo-contract">' . $descTipoContrato . '</td>
                    <td class = "td-data-contract">' . Search::formateDateBR($vencimento) . '</td>
                         <td class = "td-visu-contract"><a href="ver_contrato.php?c=' . $id_contrato . '&d=1" ><img src = "img/eye.png" class = "img-icon-list" alt = "contrato-list"></a></td>
                         <td class = "td-visu-contract"><a href="alterar_contrato.php?c=' . $id_contrato . '&d=1" ><img src = "img/editar_contrato.png" class = "img-icon-list" alt = "contrato-list"></a></td>
                         <td class = "td-visu-contract"><a href="cadastro_contrato.php?id_contr=' . $id_contrato . '" ><img src = "img/editar_contrato.png" class = "img-icon-list" alt = "contrato-list"></a></td>                         
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

    public function infoContrato($contrato) {
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

                        if ($idAditamentoContrato > 1) {
                            $sq = 'SELECT `ID_CONTRATO_SUBMETIDO` FROM `aditamentos` WHERE `ID_ADITAMENTO` = ' . $idAditamentoContrato;
                            $sqq = Conexao::getInstance()->prepare($sq);
                            $sqq->execute();
                            $rowl = $sqq->rowCount();
                            if ($rowl > 0) {
                                foreach ($sqq->fetchAll(PDO::FETCH_OBJ) as $dados) {
                                    $idContratoView = $dados->ID_CONTRATO_SUBMETIDO;
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
                            ECHO
                            '<div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            ADITAMENTO:
                                <span><a href="ver_contrato.php?c=' . $idContratoView . '&d=1"><img src = "img/anexo.png" class = "img-icon-list" alt = "contrato-list"></a></span>
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
                        
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function formateDateBR($i) {
        $l = explode('-', $i);
        return $l[2] . "/" . $l[1] . "/" . $l[0];
    }

    public function otherFormateDateBR($e) {
        $t = explode('-', $e);
        return $t[2] . "-" . $t[1] . "-" . $t[0];
    }

    /*
      public function contratosProximoVencimento() {
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

    public function BuscaGarantia($_idContratoGarantia) {
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

    public function BuscaObjeto($idContratoObjeto) {
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

    public function BuscaTipoContrato($idContrato) {
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

    public function BuscaObs($idContratoObs) {
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

    public function BuscaGarantiaUpdate($id) {
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

    public function BuscaObjetoUpdate($id) {
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

    public function BuscaObservacaoUpdate($id) {
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

    public function buscaEmailUsuario($email) {
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

    public function buscaPrivateToken($token) {
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

    public static function buscarContrato($aditamento) {

        try {
            $sql = 'SELECT ID_CONTRATO_SUBMETIDO FROM `aditamentos` WHERE ID_ADITAMENTO = "' . $aditamento . '"';
            $lqs = Conexao::getInstance()->prepare($sql);
            if ($lqs->execute()) {
                $row = $lqs->rowCount();
                if ($row > 0) {
                    foreach ($lqs->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        return $dados->ID_CONTRATO_SUBMETIDO;
                    }
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao listar Contrato';
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

}
