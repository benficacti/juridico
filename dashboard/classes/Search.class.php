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

    public function loginAuth($login, $senha) {

        try {


            $login = str_replace("'", "", $login);
            $login = str_replace('"', "", $login);
            $sqll = 'SELECT ID_LOGIN, SENHA_LOGIN, ID_TIPO_ACESSO_LOGIN, ID_USUARIO_LOGIN, USUARIO.NOME_USUARIO,
                     TIPO_ACESSO.DESC_TIPO_ACESSO FROM LOGIN 
                     INNER JOIN USUARIO ON LOGIN.ID_USUARIO_LOGIN = USUARIO.ID_USUARIO INNER JOIN TIPO_ACESSO ON
                     LOGIN.ID_TIPO_ACESSO_LOGIN = TIPO_ACESSO.ID_TIPO_ACESSO
                     WHERE USUARIO_LOGIN = "' . $login . '" ';
            $p_sqll = Conexao::getInstance()->prepare($sqll);
            $p_sqll->execute();
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
                        return "00;";
                    } else {
                        return "02";
                    }
                }
            } else {
                return "01";
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

    public function BuscaContrato($numero) {

        try {

            $sql = 'SELECT * FROM CONTRATO WHERE NUMERO_CONTRATO = ' . $numero;
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

    public function proximosVencimentos() {
        try {
            $mes = 1;

            $sql = 'SELECT * FROM CONTRATO '
                    . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                    . ' WHERE ID_LOGIN_CONTRATO = ' . $_SESSION['login'];
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {

                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        $idContrato = $dados->ID_CONTRATO;
                        $vencimento = $dados->VENCIMENTO_CONTRATO;
                        $numero = $dados->NUMERO_CONTRATO;
                        $contratante = $dados->CONTRATANTE_CONTRATO;
                        $descTipoContrato = $dados->DESC_TIPO_CONTRATO;

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
                                    <div class = "desc-contratante-panel"> ' . $contratante . '</div>
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
                                    <a href="ver_contrato.php?c=' . $idContrato . '"> VER CONTRATO </a>
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

    public function meusContratos() {
        try {
            $mes = 1;

            $sql = 'SELECT * FROM CONTRATO '
                    . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                    . ' WHERE ID_LOGIN_CONTRATO = ' . $_SESSION['login'];
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    echo '<div class = "listtb" data-aos = "fade-left"
                    data-aos-anchor = "#example-anchor"
                    data-aos-offset = "400"
                    data-aos-duration = "400">

                    <table class = "tb-list">';

                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        $vencimento = $dados->VENCIMENTO_CONTRATO;
                        $numero = $dados->NUMERO_CONTRATO;
                        $contratante = $dados->CONTRATANTE_CONTRATO;
                        $descTipoContrato = $dados->DESC_TIPO_CONTRATO;
                        //  echo 'Contrato '.$numero.' - '.' Vencimento'.$vencimento.'<br>';




                        echo '<tr>
                    <td class = "td-icon-contract"><img src = "img/editar_contrato.png" class = "img-icon-list" alt = "contrato-list"></th>
                    <td class = "td-desc-contract"><div class = "td-desc-list-contract">' . $contratante . '</div></td>
                    <td class = "td-contrato-contract">' . $numero . '</td>
                    <td class = "td-tipo-contract">' . $descTipoContrato . '</td>
                    <td class = "td-data-contract">' . Search::formateDateBR($vencimento) . '</td>
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

            $sql = 'SELECT * FROM CONTRATO '
                    . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                    . ' INNER JOIN OBJETO ON contrato.ID_OBJETO_CONTRATO = objeto.ID_OBJETO'
                    . ' INNER JOIN GARANTIA ON contrato.ID_GARANTIA_CONTRATO = garantia.ID_GARANTIA'
                    . ' INNER JOIN OBSERVACOES_EXIGENCIAS ON contrato.ID_OBSERVACOES_EXIGENCIAS_CONTRATO = OBSERVACOES_EXIGENCIAS.ID_OBSERVACOES_EXIGENCIAS'
                    . ' WHERE ID_LOGIN_CONTRATO = ' . $_SESSION['login'] . ' AND ID_CONTRATO = ' . $contrato;
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
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
                        echo ' 
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            NÚMERO CONTRATO:
                            <span>' . $numero . '</span>
                        </label>
                    </div>

                    <div class="form-contract-fim fright pright">
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

                    <div class="form-contract-fim fright pright">
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

                    <div class="form-contract-fim fright pright">
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
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            QUANTIDADE DE PARCELAS:
                            <span>' . $quantidadeParcelaContrato . '</span>
                        </label>
                    </div>
                    <div class="form-contract-fim fright pright">
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
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            DATA PRIMEIRO PAGAMENTO:
                            <span>' . Search::formateDateBR($dataPagamentoParcela) . '</span>
                        </label>
                    </div>
                    <div class="form-contract-fim fright pright">
                        <label class="title-info-contract">
                            ADITAMENTO:
                            <span>NÃO</span>
                        </label>
                    </div>
                </div>

                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            INICIO VIGÊNCIA:
                            <span>' . Search::formateDateBR($inicioVigencia) . '</span>
                        </label>
                    </div>
                    <div class="form-contract-fim fright pright">
                        <label class="title-info-contract">
                            FIM VIGÊNCIA:
                            <span>' . Search::formateDateBR($fimVigencia) . '</span>
                        </label>
                    </div>
                </div>
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <p class="title-info-contract">
                            GARANTIA:
                            <span>' . $descGarantia . '</span>
                        </p>
                    </div>
                </div>
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            OBJETO:
                            <span>' . $descObjeto . '</span>
                        </label>
                    </div>
                </div>
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            OBSERVAÇÃO:
                            <span>' . $descObservacao . '</span>
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

    public function formateDateBR($i) {
        $l = explode('-', $i);
        return $l[2] . "/" . $l[1] . "/" . $l[0];
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

    public function BuscaGarantia($idcontrato) {
        try {
            $sql = 'SELECT ID_GARANTIA FROM '
                    . 'GARANTIA WHERE ID_CONTRATO_GARANTIA = ' . $idcontrato;
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchall(PDO::FETCH_OBJ) as $dados) {
                        return $dados->ID_GARANTIA;
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function BuscaObjeto($idcontrato) {
        try {
            $sql = 'SELECT ID_OBJETO FROM '
                    . 'OBJETO WHERE ID_CONTRATO_OBJETO = ' . $idcontrato;
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

    public function BuscaObs($idcontrato) {
        try {
            $sql = 'SELECT ID_OBSERVACOES_EXIGENCIAS FROM '
                    . 'observacoes_exigencias WHERE ID_CONTRATO_OBSERVACOES = ' . $idcontrato;
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
