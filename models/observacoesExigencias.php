<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of observacoesExigencias
 *
 * @author USUARIO
 */
class observacoesExigencias {

    private $idContratoObs;
    private $statusObs;
    private $descObs;

    function __construct($idContratoObs, $statusObs, $descObs) {
        $this->idContratoObs = $idContratoObs;
        $this->statusObs = $statusObs;
        $this->descObs = $descObs;
    }

    function getIdContratoObs() {
        return $this->idContratoObs;
    }

    function getStatusObs() {
        return $this->statusObs;
    }

    function getDescObs() {
        return $this->descObs;
    }

    function setIdContratoObs($idContratoObs) {
        $this->idContratoObs = $idContratoObs;
    }

    function setStatusObs($statusObs) {
        $this->statusObs = $statusObs;
    }

    function setDescObs($descObs) {
        $this->descObs = $descObs;
    }

}
