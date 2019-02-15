<?php

include '../persistencia/Conexao.php';
include 'Search.class.php';
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

            $numeroContrato = $contrato->getNumeroContrato();
            $contratanteContrato = $contrato->getContratanteContrato();
            $contratadoContrato = $contrato->getContratadoContrato();
            $objetoContrato = $contrato->getObjetoContrato();
            $valorContrato = $contrato->getValorContrato();
            $pagamentoParcelaContrato = $contrato->getPagamentoParcelaContrato();
            $pagamentoRealizadoValorContrato = $contrato->getPagamentoRealizadoValorContrato();
            $pagamentoDataContrato = $contrato->getPagamentoDataContrato();
            $inicioVigenciaContrato = $contrato->getInicioVigenciaContrato();
            $finalVigenciaContrato = $contrato->getFinalVigenciaContrato();
            $vencimentoContrato = $contrato->getVencimentoContrato();
            
            $GarantiaContrato = $contrato->getIdGarantiaContrato();
            /*$idGarantiaContrato = $contrato->getIdGarantiaContrato(); //No momento de realizar o 
             *Cadastrato do CONTRATO ainda não existe o id da Garantia.
             */
            
            /*$idAditamentoContrato = $contrato->getIdAditamentoContrato(); // No momento de realizar o 
             * Cadastro do CONTRATO ainda não existe um aditamento
             */
            
            
            $idLogin = 1;
            $idFinalizacaoContrato = 1;
             /* $idFinalizacaoContrato = $contrato->getIdFinalizacaoContrato(); // SIM ou NAO
              */
            $idTipoContrato = $contrato->getIdTipoContrato(); // PUBLICO OU PRIVADO
            
            $idStatusGarantiaContrato = 1;        
            /*$idStatusGarantiaContrato = $contrato->getIdStatusGarantiaContrato(); // SIM OU NAO
             */
            
            $ObservacoesExigenciasContrato = $contrato->getIdObservacoesExigenciasContrato();
            /*$idObservacoesExigenciasContrato = $contrato->getIdObservacoesExigenciasContrato(); //No momento de realizar o 
             *Cadastrato do CONTRATO ainda não existe o id da ObservacoesExigenciasContrato.
             */
            
            //$descGarantia = $garantia->getDescGarantia();
             
             $insGar = "INSERT INTO `GARANTIA`(`DESC_GARANTIA`,`NUMERO_CONTRATO_GARANTIA`)VALUES(:DESC_GARANTIA,:NUMERO_CONTRATO_GARANTIA)";        
             $insGarr = Conexao::getInstance()->prepare($insGar);
             $insGarr->bindParam(":DESC_GARANTIA",$GarantiaContrato);
             $insGarr->bindParam(":NUMERO_CONTRATO_GARANTIA",$numeroContrato);
             if ($insGarr->execute()) {
                 echo'Garantia cadastrada com sucesso!';
             }
             
             $insDescObserExig = "INSERT INTO `OBSERVACOES_EXIGENCIAS`(`DESC_OBSER_EXIGEN`,`NUMERO_DESC_OBSER_EXIGEN`)VALUES(:DESC_OBSER_EXIGEN,:NUMERO_DESC_OBSER_EXIGEN)";
             $insDescObserExigg = Conexao::getInstance()->prepare($insDescObserExig);
             $insDescObserExigg->bindParam(":DESC_OBSER_EXIGEN",$ObservacoesExigenciasContrato);
             $insDescObserExigg->bindParam(":NUMERO_DESC_OBSER_EXIGEN",$numeroContrato);
             if ($insDescObserExigg->execute()) {
                 echo'Observações e Exigencias cadastrada com sucesso!';
                 
             }
             
            
            $idGarantiaContrato = Search::buscaIdGarantia($numeroContrato);
            $idObservacoesExigencias = Search::buscaIdObservacoesExigencias($numeroContrato);
            
     
            
            
             echo $numeroContrato.'<br>';
             echo $contratanteContrato.'<br>';
             echo $contratadoContrato.'<br>';
             echo $objetoContrato.'<br>';
             echo $valorContrato.'<br>';
             echo $pagamentoParcelaContrato.'<br>';
             echo $pagamentoRealizadoValorContrato.'<br>';
             echo $pagamentoDataContrato.'<br>';
             echo $inicioVigenciaContrato.'<br>';
             echo $finalVigenciaContrato.'<br>';
             echo $vencimentoContrato.'<br>';
             echo $idGarantiaContrato.'<br>';
             echo $idLogin.'<br>';
             echo $idFinalizacaoContrato.'<br>';
             echo $idTipoContrato.'<br>';
             echo $idStatusGarantiaContrato.'<br>';
             echo $idObservacoesExigencias.'<br>';
            
            
            
            $insCont = "INSERT INTO `CONTRATO`(`NUMERO_CONTRATO`,`CONTRATANTE_CONTRATO`,"
                    . "`CONTRATADO_CONTRATO`,`OBJETO_CONTRATO`,`VALOR_CONTRATO`,"
                    . "`PAGAMENTO_PARCELA_CONTRATO`,`PAGAMENTO_REALIZADO_VALOR_CONTRATO`,"
                    . "`PAGAMENTO_DATA_CONTRATO`,`INICIO_VIGENCIA_CONTRATO`,`FINAL_VIGENCIA_CONTRATO`,"
                    . "`VENCIMENTO_CONTRATO`,`ID_GARANTIA_CONTRATO`,"
                    . "`ID_LOGIN_CONTRATO`,`ID_FINALIZACAO_CONTRATO`,`ID_TIPO_CONTRATO`,`ID_STATUS_GARANTIA_CONTRATO`,"
                    . "`ID_OBSERVACOES_EXIGENCIAS_CONTRATO`)"
                    . "VALUES("
                    . ":NUMERO_CONTRATO,:CONTRATANTE_CONTRATO,:CONTRATADO_CONTRATO,:OBJETO_CONTRATO,:VALOR_CONTRATO,"
                    . ":PAGAMENTO_PARCELA_CONTRATO,:PAGAMENTO_REALIZADO_VALOR_CONTRATO,:PAGAMENTO_DATA_CONTRATO,"
                    . ":INICIO_VIGENCIA_CONTRATO,:FINAL_VIGENCIA_CONTRATO,:VENCIMENTO_CONTRATO,:ID_GARANTIA_CONTRATO,"
                    . ":ID_LOGIN_CONTRATO,:ID_FINALIZACAO_CONTRATO,"
                    . ":ID_TIPO_CONTRATO,:ID_STATUS_GARANTIA_CONTRATO,:ID_OBSERVACOES_EXIGENCIAS_CONTRATO)";
             $insContS = Conexao::getInstance()->prepare($insCont);
             $insContS->bindParam(":NUMERO_CONTRATO",$numeroContrato);
              $insContS->bindParam(":CONTRATANTE_CONTRATO",$contratanteContrato);
               $insContS->bindParam(":CONTRATADO_CONTRATO",$contratadoContrato);
                $insContS->bindParam(":OBJETO_CONTRATO",$objetoContrato);
                 $insContS->bindParam(":VALOR_CONTRATO",$valorContrato);
                  $insContS->bindParam(":PAGAMENTO_PARCELA_CONTRATO",$pagamentoParcelaContrato);
                   $insContS->bindParam(":PAGAMENTO_REALIZADO_VALOR_CONTRATO",$pagamentoRealizadoValorContrato);
                    $insContS->bindParam(":PAGAMENTO_DATA_CONTRATO",$pagamentoDataContrato);
                     $insContS->bindParam(":INICIO_VIGENCIA_CONTRATO",$inicioVigenciaContrato);
                      $insContS->bindParam(":FINAL_VIGENCIA_CONTRATO",$finalVigenciaContrato);
                       $insContS->bindParam(":VENCIMENTO_CONTRATO",$vencimentoContrato);
                        $insContS->bindParam(":ID_GARANTIA_CONTRATO",$idGarantiaContrato);
                          $insContS->bindParam(":ID_LOGIN_CONTRATO",$idLogin);
                           $insContS->bindParam(":ID_FINALIZACAO_CONTRATO",$idFinalizacaoContrato);
                            $insContS->bindParam(":ID_TIPO_CONTRATO",$idTipoContrato);
                             $insContS->bindParam(":ID_STATUS_GARANTIA_CONTRATO",$idStatusGarantiaContrato);
                              $insContS->bindParam(":ID_OBSERVACOES_EXIGENCIAS_CONTRATO",$idObservacoesExigencias);
                              
             if ($insContS->execute()) {
                 echo'Contrato cadastrado com sucesso!';
                 
             }
           
            
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } catch (Exception $exc){
            echo $exc->getMessage();
        }
    }

}
