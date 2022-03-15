<?php

session_start();
//include 'negocio/aditamentos.php';


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Insert
 *
 * @author USUARIO
 */
class Insert {

    public function CadastraAditamento($aditamento) {

        try {
            $idContratoAtual = $aditamento->getIdAtualContratoAditamento();
            $dataAditamento = $aditamento->getDataAditamento();
            $numeroAditamento = $aditamento->getNumeroAditamento();


            $ins = "INSERT INTO `ADITAMENTOS`(`ID_ATUAL_CONTRATO_ADITAMENTO`,`DATA_ADITAMENTO`,`NUMERO_ADITAMENTO`)VALUES(:ID_ATUAL_CONTRATO_ADITAMENTO,:DATA_ADITAMENTO,:NUMERO_ADITAMENTO)";
            $i_ins = Conexao::getInstance()->prepare($ins);
            $i_ins->bindParam(":ID_ATUAL_CONTRATO_ADITAMENTO", $idContratoAtual);
            $i_ins->bindParam(":DATA_ADITAMENTO", $dataAditamento);
            $i_ins->bindParam(":NUMERO_ADITAMENTO", $numeroAditamento);
            if ($i_ins->execute()) {
                echo 'cadastrado';
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao cadastrar aditamento';
        }
    }

    public function CadastraContrato(contrato $contrato) {

        try {

            $idAditamentoContrado = "";
            $idSetor = "";

            $numeroContrato = $contrato->get_numeroContrato();
            $idTipoContrato = $contrato->get_idTipoContrato(); // PUBLICO OU PRIVADO
            $contratanteContrato = $contrato->get_contratanteContrato();
            $contratadoContrato = $contrato->get_contratadoContrato();
            $concorrenciaContrato = $contrato->get_concorrenciaContrato();
            $inicioVigenciaContrato = $contrato->get_inicioVigenciaContrato();
            $finalVigenciaContrato = $contrato->get_finalVigenciaContrato();
            $valorContrato = $contrato->get_valorContrato();
            $quantidadeParcelasContrato = $contrato->get_quantidadeParcelasContrato(); // quantidade de parcelas tem o contrato
            $valorDasParcelas = $contrato->get_valorDasParcelasContrato();
            $dataPagamentoDasParcelas = $contrato->get_dataPagamentoDasParcelasContrato();
            $parcelasPagas = $contrato->get_quantidadeParcelasPagasContrato();
            $ValortotalPago = $contrato->get_valorTotalPagoContrato();
            $vencimentoContrato = $contrato->get_vencimentoContrato();
            $possuiParcela = $contrato->get_possuiParcela();
            $empresaContrato = $contrato->get_empresaContrato();
            $idAditamentoContrado = $contrato->get_idAditamentoContrato();
            $idStatusContrato = $contrato->get_statusContrato();
            $idLogin = $_SESSION['login'];

            $descSetor = $contrato->get_idSetorContrato();
            $idSetor = Search::idSetor($descSetor);

            if ($idSetor < 1) {
                $idSetor = Insert::idSetorcadastrarSetor($descSetor);
            }

            if ($idAditamentoContrado != "") {
                $idAditamentoContrado = $contrato->get_idAditamentoContrato();
            } else {
                $idAditamentoContrado = NULL;
            }

            /*
              $insGar = "INSERT INTO `GARANTIA`(`DESC_GARANTIA`,`NUMERO_CONTRATO_GARANTIA`)VALUES(:DESC_GARANTIA,:NUMERO_CONTRATO_GARANTIA)";
              $insGarr = Conexao::getInstance()->prepare($insGar);
              $insGarr->bindParam(":DESC_GARANTIA", $GarantiaContrato);
              $insGarr->bindParam(":NUMERO_CONTRATO_GARANTIA", $numeroContrato);
              if ($insGarr->execute()) {
              echo'Garantia cadastrada com sucesso!';
              }

              $insDescObserExig = "INSERT INTO `OBSERVACOES_EXIGENCIAS`(`DESC_OBSER_EXIGEN`,`NUMERO_DESC_OBSER_EXIGEN`)VALUES(:DESC_OBSER_EXIGEN,:NUMERO_DESC_OBSER_EXIGEN)";
              $insDescObserExigg = Conexao::getInstance()->prepare($insDescObserExig);
              $insDescObserExigg->bindParam(":DESC_OBSER_EXIGEN", $ObservacoesExigenciasContrato);
              $insDescObserExigg->bindParam(":NUMERO_DESC_OBSER_EXIGEN", $numeroContrato);
              if ($insDescObserExigg->execute()) {
              echo'Observações e Exigencias cadastrada com sucesso!';
              }


              $idGarantiaContrato = Search::buscaIdGarantia($numeroContrato);
              $idObservacoesExigencias = Search::buscaIdObservacoesExigencias($numeroContrato);

             */


            /* $sql = Conexao::getInstance()->prepare("SELECT NUMERO_CONTRATO FROM CONTRATO WHERE NUMERO_CONTRATO = '" . $numeroContrato . "'");
              if ($sql->execute()) {
              $count = $sql->rowCount();
              if ($count > 0) {
              echo '01;';
              } else { */
            $insCont = "INSERT INTO `CONTRATO`(`NUMERO_CONTRATO`,`ID_TIPO_CONTRATO`,`CONTRATANTE_CONTRATO`,"
                    . "`CONTRATADO_CONTRATO`,`CONCORRENCIA_CONTRATO`,`INICIO_VIGENCIA_CONTRATO`,`FINAL_VIGENCIA_CONTRATO`,"
                    . "`VALOR_CONTRATO`,`QUANTIDADE_PARCELAS_CONTRATO`,`VALOR_DAS_PARCELAS_CONTRATO`,"
                    . "`DATA_PAGAMENTO_DAS_PARCELAS_CONTRATO`,`QUANTIDADE_PARCELAS_PAGAS_CONTRATO`,`VALOR_TOTAL_PAGO_CONTRATO`,"
                    . "`VENCIMENTO_CONTRATO`,`ID_LOGIN_CONTRATO`, `ID_POSSUI_PARCELA_CONTRATO`, `ID_EMPRESA_CONTRATO`,`ID_STATUS_CONTRATO`, `ID_SETOR_CONTRATO`)"
                    . "VALUES("
                    . ":NUMERO_CONTRATO,:ID_TIPO_CONTRATO,:CONTRATANTE_CONTRATO,:CONTRATADO_CONTRATO,:CONCORRENCIA_CONTRATO,"
                    . ":INICIO_VIGENCIA_CONTRATO,:FINAL_VIGENCIA_CONTRATO,:VALOR_CONTRATO,:QUANTIDADE_PARCELAS_CONTRATO,"
                    . ":VALOR_DAS_PARCELAS_CONTRATO,:DATA_PAGAMENTO_DAS_PARCELAS_CONTRATO,:QUANTIDADE_PARCELAS_PAGAS_CONTRATO,"
                    . ":VALOR_TOTAL_PAGO_CONTRATO,:VENCIMENTO_CONTRATO,:ID_LOGIN_CONTRATO,:ID_POSSUI_PARCELA_CONTRATO, :ID_EMPRESA_CONTRATO, :ID_STATUS_CONTRATO, :ID_SETOR_CONTRATO)";
            $insContS = Conexao::getInstance()->prepare($insCont);
            $insContS->bindParam(":NUMERO_CONTRATO", $numeroContrato);
            $insContS->bindParam(":ID_TIPO_CONTRATO", $idTipoContrato);
            $insContS->bindParam(":CONTRATANTE_CONTRATO", $contratanteContrato);
            $insContS->bindParam(":CONTRATADO_CONTRATO", $contratadoContrato);
            $insContS->bindParam(":CONCORRENCIA_CONTRATO", $concorrenciaContrato);
            $insContS->bindParam(":INICIO_VIGENCIA_CONTRATO", $inicioVigenciaContrato);
            $insContS->bindParam(":FINAL_VIGENCIA_CONTRATO", $finalVigenciaContrato);
            $insContS->bindParam(":VALOR_CONTRATO", $valorContrato);
            $insContS->bindParam(":QUANTIDADE_PARCELAS_CONTRATO", $quantidadeParcelasContrato);
            $insContS->bindParam(":VALOR_DAS_PARCELAS_CONTRATO", $valorDasParcelas);
            $insContS->bindParam(":DATA_PAGAMENTO_DAS_PARCELAS_CONTRATO", $dataPagamentoDasParcelas);
            $insContS->bindParam(":QUANTIDADE_PARCELAS_PAGAS_CONTRATO", $parcelasPagas);
            $insContS->bindParam(":VALOR_TOTAL_PAGO_CONTRATO", $ValortotalPago);
            $insContS->bindParam(":VENCIMENTO_CONTRATO", $vencimentoContrato);
            $insContS->bindParam(":ID_LOGIN_CONTRATO", $idLogin);
            $insContS->bindParam(":ID_POSSUI_PARCELA_CONTRATO", $possuiParcela);
            $insContS->bindParam(":ID_EMPRESA_CONTRATO", $empresaContrato);
            $insContS->bindParam(":ID_STATUS_CONTRATO", $idStatusContrato);
            $insContS->bindParam(":ID_SETOR_CONTRATO", $idSetor);



            if ($insContS->execute()) {

                if (strlen($idAditamentoContrado) > 0) {

                    $query = 'SELECT ID_CONTRATO FROM contrato WHERE ID_LOGIN_CONTRATO = "' . $idLogin . '" ORDER by `ID_CONTRATO` desc LIMIT 1';
                    $querys = Conexao::getInstance()->prepare($query);
                    $querys->execute();
                    $linh = $querys->rowCount();
                    if ($linh > 0) {

                        foreach ($querys->fetchAll(PDO::FETCH_OBJ) as $dados) {
                            $idContSub = $dados->ID_CONTRATO;

                            $inserAdi = "INSERT INTO `aditamentos`(`ID_CONTRATO_ADITADO_ADITAMENTO`, `ID_CONTRATO_SUBMETIDO`, `DATA_ADITAMENTO`)"
                                    . "VALUES ("
                                    . ":ID_CONTRATO_ADITADO_ADITAMENTO, :ID_CONTRATO_SUBMETIDO, CURTIME())";
                            $inserAdit = Conexao::getInstance()->prepare($inserAdi);
                            $inserAdit->bindParam(":ID_CONTRATO_ADITADO_ADITAMENTO", $idAditamentoContrado);
                            $inserAdit->bindParam(":ID_CONTRATO_SUBMETIDO", $idContSub);

                            if ($inserAdit->execute()) {
                                $cons = 'SELECT ID_ADITAMENTO FROM aditamentos WHERE ID_CONTRATO_ADITADO_ADITAMENTO = "' . $idAditamentoContrado . '" and ID_CONTRATO_SUBMETIDO =' . $idContSub;
                                $conss = Conexao::getInstance()->prepare($cons);
                                $conss->execute();
                                $row = $conss->rowCount();
                                if ($row > 0) {
                                    foreach ($conss->fetchAll(PDO::FETCH_OBJ) as $dados) {
                                        $idAditamento = $dados->ID_ADITAMENTO;


                                        Update::insert_id_no_contrato($idAditamento, $idAditamentoContrado);
                                    }
                                }
                            }
                        }
                    }
                }



                $id = Search::BuscaUltimoId($idLogin);
                $_SESSION['contrato'] = $id;
                echo '00;';
            } else {
                echo'Não cadastrou';
            }
//   }
//  }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public function CadastraGarantia($garantia, $_idContratoGarantia) {

        try {
            $descGarantia = $garantia->getDescGarantia();
            $ins = "INSERT INTO `garantia`(`DESC_GARANTIA`, `ID_CONTRATO_GARANTIA`) "
                    . "VALUES (:DESC_GARANTIA, :ID_CONTRATO_GARANTIA)";
            $i_ins = Conexao::getInstance()->prepare($ins);
            $i_ins->bindParam(":DESC_GARANTIA", $descGarantia);
            $i_ins->bindParam(":ID_CONTRATO_GARANTIA", $_idContratoGarantia);
            if ($i_ins->execute()) {
                return Search::BuscaGarantia($_idContratoGarantia);
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao cadastrar Garantia';
        }
    }

    public function CadastraObjeto($objeto) {
        try {
            $idContratoObjeto = $objeto->getIdContratoObjeto();
            $descObejeto = $objeto->getDescObjeto();
            $ins = "INSERT INTO `objeto`(`DESC_OBJETO`, `ID_CONTRATO_OBJETO`) "
                    . "VALUES (:DESC_OBJETO, :ID_CONTRATO_OBJETO)";
            $i_ins = Conexao::getInstance()->prepare($ins);
            $i_ins->bindParam(":DESC_OBJETO", $descObejeto);
            $i_ins->bindParam(":ID_CONTRATO_OBJETO", $idContratoObjeto);
            if ($i_ins->execute()) {
                return Search::BuscaObjeto($idContratoObjeto);
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao cadastrar Objeto';
        }
    }

    public function CadastraObs($obs) {
        try {
            $idContratoObs = $obs->getIdContratoObservacoes();
            $descObs = $obs->getDescObserExigen();
            $ins = "INSERT INTO `observacoes_exigencias`( `DESC_OBSER_EXIGEN`, `ID_CONTRATO_OBSERVACOES`)  "
                    . "VALUES (:DESC_OBSER_EXIGEN, :ID_CONTRATO_OBSERVACOES)";
            $i_ins = Conexao::getInstance()->prepare($ins);
            $i_ins->bindParam(":DESC_OBSER_EXIGEN", $descObs);
            $i_ins->bindParam(":ID_CONTRATO_OBSERVACOES", $idContratoObs);
            if ($i_ins->execute()) {
                return Search::BuscaObs($idContratoObs);
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao cadastrar Observação';
        }
    }

    public function gerarToken($idUsuario, $token) {
        $idStatusAlterar = 1; // alterar
        try {
            $sql = 'SELECT * FROM RECUPERAR_SENHA WHERE ID_USUARIO = "' . $idUsuario . '" AND ID_STATUS_ALTERAR = 1';
            $ssql = Conexao::getInstance()->prepare($sql);
            if ($ssql->execute()) {
                $count = $ssql->rowCount();
                if ($count > 0) {
                    foreach ($ssql->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        $idUsuario = $dados->ID_USUARIO;

                        if (Update::desativarRec($idUsuario)) {
                            return Insert::gerarToken($idUsuario, $token);
                        }
                    }
                } else {
                    $ins = "INSERT INTO `recuperar_senha`(`ID_USUARIO`, `PRIVATE_TOKEN`, `ID_STATUS_ALTERAR`)"
                            . "VALUES(:ID_USUARIO, :PRIVATE_TOKEN, :ID_STATUS_ALTERAR)";
                    $inss = Conexao::getInstance()->prepare($ins);
                    $inss->bindParam(":ID_USUARIO", $idUsuario);
                    $inss->bindParam(":PRIVATE_TOKEN", $token);
                    $inss->bindParam(":ID_STATUS_ALTERAR", $idStatusAlterar);
                    if ($inss->execute()) {
                        return '00';
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public static function Aditamento_contrato($aditamento) {


        try {

            $ins = "INSERT INTO `recuperar_senha`(`ID_USUARIO`, `PRIVATE_TOKEN`, `ID_STATUS_ALTERAR`)"
                    . "VALUES(:ID_USUARIO, :PRIVATE_TOKEN, :ID_STATUS_ALTERAR)";
            $inss = Conexao::getInstance()->prepare($ins);
            $inss->bindParam(":ID_USUARIO", $idUsuario);
            $inss->bindParam(":PRIVATE_TOKEN", $token);
            $inss->bindParam(":ID_STATUS_ALTERAR", $idStatusAlterar);
            if ($inss->execute()) {
                return '00';
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao realizar aditamento no contrato';
        }
    }

    public static function cadastrarSetor(setor $setor) {

        try {

            $descSetor = $setor->getDescSetor();

            $ins = "INSERT INTO `setor`(`DESC_SETOR`)"
                    . "VALUES(:DESC_SETOR)";
            $inss = Conexao::getInstance()->prepare($ins);
            $inss->bindParam(":DESC_SETOR", $descSetor);
            if ($inss->execute()) {

                return $idSetor = Search::idSetor($descSetor);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao cadastrar setor';
        }
    }

    public static function cadastrarUsuario(usuario $usuario) {

        try {

            $nome = $usuario->get_nomeUsuario();
            $email = $usuario->get_emailUsuario();
            $idSetor = $usuario->get_idSetorUsuario();

            $ins = "INSERT INTO `usuario`(`NOME_USUARIO`,`EMAIL_USUARIO`,`ID_SETOR_USUARIO`)"
                    . "VALUES(:NOME_USUARIO, :EMAIL_USUARIO, :ID_SETOR_USUARIO)";
            $inss = Conexao::getInstance()->prepare($ins);
            $inss->bindParam(":NOME_USUARIO", $nome);
            $inss->bindParam(":EMAIL_USUARIO", $email);
            $inss->bindParam(":ID_SETOR_USUARIO", $idSetor);
            if ($inss->execute()) {

                return $idUsuario = Search::idUsuario($nome, $email);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao cadastrar usuario';
        }
    }

    public static function cadastrarLogin(login $login) {


        try {

            $idUsuario = $login->get_idUsuarioLogin();
            $usuario = $login->get_usuarioLogin();
            $senha = $login->get_senhaLogin();
            $idTipoAcesso = $login->get_idTipoAcesso();

            $ins = "INSERT INTO `time_login`(`TIME_LOGIN`, `ID_USUARIO_LOGIN`)"
                    . "VALUES(CURTIME(), :ID_USUARIO_LOGIN)";
            $inss = Conexao::getInstance()->prepare($ins);
            $inss->bindParam(":ID_USUARIO_LOGIN", $idUsuario);
            if ($inss->execute()) {
                $idTime = Search::idTime($idUsuario);


                $ins = "INSERT INTO `login`(`ID_USUARIO_LOGIN`,`USUARIO_LOGIN`,`SENHA_LOGIN`,`ID_TIPO_ACESSO_LOGIN`, `ID_TIME_LOGIN`)"
                        . "VALUES(:ID_USUARIO_LOGIN, :USUARIO_LOGIN, :SENHA_LOGIN, :ID_TIPO_ACESSO_LOGIN, :ID_TIME_LOGIN)";
                $inss = Conexao::getInstance()->prepare($ins);
                $inss->bindParam(":ID_USUARIO_LOGIN", $idUsuario);
                $inss->bindParam(":USUARIO_LOGIN", $usuario);
                $inss->bindParam(":SENHA_LOGIN", $senha);
                $inss->bindParam(":ID_TIPO_ACESSO_LOGIN", $idTipoAcesso);
                $inss->bindParam(":ID_TIME_LOGIN", $idTime);
                if ($inss->execute()) {

                    $infor = Search::LoginSenha($idUsuario, $senha);
                    return $infor;
                    //return  $senhaLogin = Search::senhaLogin($idUsuario);
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao cadastrar login';
        }
    }

    public static function idSetorcadastrarSetor($descSetor) {

        try {

            $ins = "INSERT INTO `setor`(`DESC_SETOR`)"
                    . "VALUES(:DESC_SETOR)";
            $inss = Conexao::getInstance()->prepare($ins);
            $inss->bindParam(":DESC_SETOR", $descSetor);
            if ($inss->execute()) {

                return $idSetor = Search::idSetor($descSetor);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao cadastrar setor';
        }
    }

    public static function cadastrarAlert($emailAlert, $diaAlert, $diaQtdAlert) {

        try {

            $verificar = Search::verificarAlert();
            if ($verificar) {
                return false;
            } else {
                $ins = "INSERT INTO `alertas`(`EMAILDESTINATARIO`,`DIASPARAVENCER`,`DIARECEBEREMAIL`)"
                        . "VALUES(:EMAILDESTINATARIO,:DIASPARAVENCER,:DIARECEBEREMAIL)";
                $inss = Conexao::getInstance()->prepare($ins);
                $inss->bindParam(":EMAILDESTINATARIO", $emailAlert);
                $inss->bindParam(":DIASPARAVENCER", $diaQtdAlert);
                $inss->bindParam(":DIARECEBEREMAIL", $diaAlert);
                if ($inss->execute()) {

                    return true;
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo 'Falha ao cadastrarAlert';
        }
    }

}
