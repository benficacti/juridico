<?php

session_start();
include '../persistencia/Conexao.php';
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

    public function CadastraContrato($contrato) {

        try {

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
            $vencimentoContrato = $contrato->get_vencimentoContrato();
            $idLogin = $_SESSION['login'];

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


            $sql = Conexao::getInstance()->prepare("SELECT NUMERO_CONTRATO FROM CONTRATO WHERE NUMERO_CONTRATO = '" . $numeroContrato . "'");
            if ($sql->execute()) {
                $count = $sql->rowCount();
                if ($count > 0) {
                    echo '01;';
                } else {
                    $insCont = "INSERT INTO `CONTRATO`(`NUMERO_CONTRATO`,`ID_TIPO_CONTRATO`,`CONTRATANTE_CONTRATO`,"
                            . "`CONTRATADO_CONTRATO`,`CONCORRENCIA_CONTRATO`,`INICIO_VIGENCIA_CONTRATO`,`FINAL_VIGENCIA_CONTRATO`,"
                            . "`VALOR_CONTRATO`,`QUANTIDADE_PARCELAS_CONTRATO`,`VALOR_DAS_PARCELAS_CONTRATO`,"
                            . "`DATA_PAGAMENTO_DAS_PARCELAS_CONTRATO`,`QUANTIDADE_PARCELAS_PAGAS_CONTRATO`,`VALOR_TOTAL_PAGO_CONTRATO`,"
                            . "`VENCIMENTO_CONTRATO`,`ID_LOGIN_CONTRATO`, `ID_POSSUI_PARCELA_CONTRATO`, `ID_EMPRESA_CONTRATO`)"
                            . "VALUES("
                            . ":NUMERO_CONTRATO,:ID_TIPO_CONTRATO,:CONTRATANTE_CONTRATO,:CONTRATADO_CONTRATO,:CONCORRENCIA_CONTRATO,"
                            . ":INICIO_VIGENCIA_CONTRATO,:FINAL_VIGENCIA_CONTRATO,:VALOR_CONTRATO,:QUANTIDADE_PARCELAS_CONTRATO,"
                            . ":VALOR_DAS_PARCELAS_CONTRATO,:DATA_PAGAMENTO_DAS_PARCELAS_CONTRATO,:QUANTIDADE_PARCELAS_PAGAS_CONTRATO,"
                            . ":VALOR_TOTAL_PAGO_CONTRATO,:VENCIMENTO_CONTRATO,:ID_LOGIN_CONTRATO,:ID_POSSUI_PARCELA_CONTRATO, :ID_EMPRESA_CONTRATO)";
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



                    if ($insContS->execute()) {
                        $id = Search::BuscaContrato($numeroContrato);
                        $_SESSION['contrato'] = $id;
                        echo '00;';
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public function CadastraGarantia($garantia) {

        try {
            $idContratoGarantia = $garantia->getIdContratoGarantia();
            $descGarantia = $garantia->getDescGarantia();


            $ins = "INSERT INTO `garantia`(`DESC_GARANTIA`) "
                    . "VALUES (:DESC_GARANTIA)";
            $i_ins = Conexao::getInstance()->prepare($ins);
            $i_ins->bindParam(":DESC_GARANTIA", $descGarantia);
            if ($i_ins->execute()) {
                return Search::BuscaGarantia($descGarantia);
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao cadastrar aditamento';
        }
    }

    public function CadastraObjeto($objeto) {
        try {
            $idContratoObejto = $objeto->getIdContratoObejto();
            $descObejto = $objeto->getDescObjeto();
            $ins = "INSERT INTO `objeto`(`DESC_OBJETO`) "
                    . "VALUES (:DESC_OBJETO)";
            $i_ins = Conexao::getInstance()->prepare($ins);
            $i_ins->bindParam(":DESC_OBJETO", $descObejto);
            if ($i_ins->execute()) {
                return Search::BuscaObjeto($descObejto);
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao cadastrar aditamento';
        }
    }

    public function CadastraObs($obs) {
        try {
            $idContratoObs = $obs->getIdContratoObs();
            $descObs = $obs->getDescObs();
            $ins = "INSERT INTO `observacoes_exigencias`( `DESC_OBSER_EXIGEN`)  "
                    . "VALUES (:DESC_OBSER_EXIGEN)";
            $i_ins = Conexao::getInstance()->prepare($ins);
            $i_ins->bindParam(":DESC_OBSER_EXIGEN", $descObs);
            if ($i_ins->execute()) {
                return Search::BuscaObs($descObs);
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao cadastrar aditamento';
        }
    }

}
