<?php

include 'persistencia/Conexao.php';
include 'negocio/aditamentos.php';


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

    public function CadastraContrato($contrato,$garantia,$idLogin,$descObservacaoExigencias) {

        try {

            $numeroContrato = $contrato->getNumeroContrato();
            $contratanteContrato = $contrato->getContratanteContrato();
            $contratadoContrato = $contrato->getContratadoContrato();
            $objetoContrato = $contrato->getObjetoContrato();
            $valorContrato = $contrato->getValorContrato();
            $pagamentoParcelaContrato = $contrato->getPagamentoParcelaContrato();
            $pagamentoValorContrato = $contrato->getPagamentoValorContrato();
            $pagamentoDataContrato = $contrato->getPagamentoDataContrato();
            $inicioVigenciaContrato = $contrato->getInicioVigenciaContrato();
            $finalVigenciaContrato = $contrato->getFinalVigenciaContrato();
            $vencimentoContrato = $contrato->getVencimentoContrato();
            /*$idGarantiaContrato = $contrato->getIdGarantiaContrato(); //No momento de realizar o 
             *Cadastrato do CONTRATO ainda não existe o id da Garantia.
             */
            $idAditamentoContrato = $contrato->getIdAditamentoContrato();
            $idLoginContrato = $contrato->getIdLoginContrato();
            $idFinalizacaoContrato = $contrato->getIdFinalizacaoContrato(); // SIM ou NAO
            $idTipoContrato = $contrato->getIdTipoContrato(); // PUBLICO OU PRIVADO
            $idStatusGarantiaContrato = $contrato->getIdStatusGarantiaContrato(); // SIM OU NAO
            /*$idObservacoesExigenciasContrato = $contrato->getIdObservacoesExigenciasContrato(); //No momento de realizar o 
             *Cadastrato do CONTRATO ainda não existe o id da ObservacoesExigenciasContrato.
             */
            
            $descGarantia = $garantia->getDescGarantia();
             
             $insGar = "INSERT INTO `GARANTIA`(`DESC_GARANTIA`,`NUMERO_CONTRATO_GARANTIA`)VALUES(:DESC_GARANTIA,:NUMERO_CONTRATO_GARANTIA)";        
             $insGarr = Conexao::getInstance()->prepare($insGar);
             $insGarr->bindParam(":DESC_GARANTIA",$descGarantia);
             $insGarr->bindParam(":NUMERO_CONTRATO_GARANTIA",$numeroContrato);
             if ($insGarr->execute()) {
                 echo'Garantia cadastrada com sucesso!';
             }
             
             $insDescObserExig = "INSERT INTO `OBSERVACOES_EXIGENCIAS`(`DESC_OBSER_EXIGEN`,`NUMERO_DESC_OBSER_EXIGEN`)VALUES(:DESC_OBSER_EXIGEN,:NUMERO_DESC_OBSER_EXIGEN)";
             $insDescObserExigg = Conexao::getInstance()->prepare($insDescObserExig);
             $insDescObserExigg->bindParam(":DESC_OBSER_EXIGEN");
             $insDescObserExigg->bindParam(":NUMERO_DESC_OBSER_EXIGEN");
             if ($insDescObserExigg->execute()) {
                 echo'Observações e Exigencias cadastrada com sucesso!';
                 
             }
             
            
            $idGarantiaContrato = Search::buscaIdGarantia($numeroContrato);
            //$idObservacoesExigencias = Search::;
            
     
            
            $ins = "INSERT INTO `CONTRATO` (`NUMERO_CONTRATO`,`CONTRANTE_CONTRATO`,"
                    . "`CONTRATADO_CONTRATO`,`OBJETO_CONTRATO`,`VALOR_CONTRATO`,"
                    . "`PAGAMENTO_PARCELA_CONTRATO`,`PAGAMENTO_VALOR_CONTRATO`,`PAGAMENTO_DATA_CONTRATO`,"
                    . "`INICIO_VIGENCIA_CONTRATO`,`FINAL_VIGENCIA_CONTRATO`,`VENCIMENTO_CONTRATO`,"
                    . "`ID_GARANTIA_CONTRATO`,`ID_LOGIN_CONTRATO`,`ID_FINALIZACAO_CONTRATO`,"
                    . "`ID_TIPO_CONTRATO`,`ID_STATUS_GARANTIA_CONTRATO`,`ID_OBSERVACOES_EXIGENCIAS_CONTRATO`)"
                    . "VALUES("
                    . ":NUMERO_CONTRATO,:CONTRANTE_CONTRATO,:CONTRATADO_CONTRATO,:OBJETO_CONTRATO,"
                    . ":VALOR_CONTRATO,:PAGAMENTO_PARCELA_CONTRATO,:PAGAMENTO_VALOR_CONTRATO,:PAGAMENTO_DATA_CONTRATO,"
                    . ":INICIO_VIGENCIA_CONTRATO,:FINAL_VIGENCIA_CONTRATO,:VENCIMENTO_CONTRATO,:ID_GARANTIA_CONTRATO,"
                    . ":ID_LOGIN_CONTRATO,:ID_FINALIZACAO_CONTRATO,:ID_TIPO_CONTRATO,:ID_STATUS_GARANTIA_CONTRATO,"
                    . ":ID_OBSERVACOES_EXIGENCIAS_CONTRATO)";

            $inss = Conexao::getInstance()->prepare($ins);
            $inss->bindParam(":NUMERO_CONTRATO",$numeroContrato );
            $inss->bindParam(":CONTRANTE_CONTRATO",$contratanteContrato );
            $inss->bindParam(":CONTRATADO_CONTRATO",$contratadoContrato );
            $inss->bindParam(":OBJETO_CONTRATO" );
            $inss->bindParam(":VALOR_CONTRATO",$valorContrato );
            $inss->bindParam(":PAGAMENTO_PARCELA_CONTRATO",$pagamentoParcelaContrato );
            $inss->bindParam(":PAGAMENTO_VALOR_CONTRATO",$pagamentoValorContrato );
            $inss->bindParam(":PAGAMENTO_DATA_CONTRATO",$pagamentoDataContrato );
            $inss->bindParam(":INICIO_VIGENCIA_CONTRATO",$inicioVigenciaContrato );
            $inss->bindParam(":FINAL_VIGENCIA_CONTRATO",$finalVigenciaContrato );
            $inss->bindParam(":VENCIMENTO_CONTRATO",$vencimentoContrato );
            $inss->bindParam(":ID_GARANTIA_CONTRATO",$idGarantiaContrato );
            $inss->bindParam(":ID_LOGIN_CONTRATO",$idLogin );
            $inss->bindParam(":ID_FINALIZACAO_CONTRATO",$idFinalizacaoContrato );  
            $inss->bindParam(":ID_TIPO_CONTRATO",$idTipoContrato ); 
            $inss->bindParam(":ID_STATUS_GARANTIA_CONTRATO",$idStatusGarantiaContrato ); 
            $inss->bindParam(":ID_OBSERVACOES_EXIGENCIAS_CONTRATO" ); 
            
            if ($inss->execute()) {
                echo 'Contrato cadastrado com sucesso!';
            }
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
