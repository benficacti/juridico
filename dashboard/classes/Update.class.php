<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Updade
 *
 * @author USUARIO
 */
class Update {

    public function adicionaGarantia($_idContratoGarantia, $idStatusGarantia, $idGarantia) {
        try {
            $sql = 'UPDATE `contrato` SET `ID_STATUS_GARANTIA_CONTRATO`=' . $idStatusGarantia . ',`ID_GARANTIA_CONTRATO`=' . $idGarantia . ' '
                    . 'WHERE ID_CONTRATO = ' . $_idContratoGarantia;
            // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                return "00;" . $_idContratoGarantia;
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao obter Log';
        }
    }

    public function adicionaObjeto($_idContratoObjeto, $idStatusObjeto, $idObjeto) {
        try {
            $sql = 'UPDATE `contrato` SET `ID_OBJETO_CONTRATO`=' . $idObjeto . ' '
                    . 'WHERE ID_CONTRATO = ' . $_idContratoObjeto;
            // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                return "00;" . $_idContratoObjeto;
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao obter Log';
        }
    }

    public function adicionaObs($_idContratoObs, $idStatusObs, $idObs) {
        try {
            $sql = 'UPDATE `contrato` SET `ID_OBSERVACOES_EXIGENCIAS_CONTRATO`=' . $idObs . ' '
                    . 'WHERE ID_CONTRATO = ' . $_idContratoObs;
            // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                return "00;" . $_idContratoObs;
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao obter Log';
        }
    }

}
