<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of aditamentos
 *
 * @author USUARIO
 */
class aditamentos {

    private $idContratoAditadoAditamento;
    private $idContratoSubmetido;
    private $dataAditamento;

    function __construct($idContratoAditadoAditamento, $idContratoSubmetido, $dataAditamento) {
        $this->idContratoAditadoAditamento = $idContratoAditadoAditamento;
        $this->idContratoSubmetido = $idContratoSubmetido;
        $this->dataAditamento = $dataAditamento;
    }

    
    function getIdContratoAditadoAditamento() {
        return $this->idContratoAditadoAditamento;
    }

    function getIdContratoSubmetido() {
        return $this->idContratoSubmetido;
    }

    function getDataAditamento() {
        return $this->dataAditamento;
    }

    function setIdContratoAditadoAditamento($idContratoAditadoAditamento) {
        $this->idContratoAditadoAditamento = $idContratoAditadoAditamento;
    }

    function setIdContratoSubmetido($idContratoSubmetido) {
        $this->idContratoSubmetido = $idContratoSubmetido;
    }

    function setDataAditamento($dataAditamento) {
        $this->dataAditamento = $dataAditamento;
    }


}
