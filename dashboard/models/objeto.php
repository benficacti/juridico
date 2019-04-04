<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contrato
 *
 * @author USUARIO
 */
class objeto {

    private $idContratoObejto;
    private $statusObjeto;
    private $descObjeto;

    function __construct($idContratoObejto, $statusObjeto, $descObjeto) {
        $this->idContratoObejto = $idContratoObejto;
        $this->statusObjeto = $statusObjeto;
        $this->descObjeto = $descObjeto;
    }

    function getIdContratoObejto() {
        return $this->idContratoObejto;
    }

    function getStatusObjeto() {
        return $this->statusObjeto;
    }

    function getDescObjeto() {
        return $this->descObjeto;
    }

    function setIdContratoObejto($idContratoObejto) {
        $this->idContratoObejto = $idContratoObejto;
    }

    function setStatusObjeto($statusObjeto) {
        $this->statusObjeto = $statusObjeto;
    }

    function setDescObjeto($descObjeto) {
        $this->descObjeto = $descObjeto;
    }

}
