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

    private $descObjeto;
    private $idContratoObjeto;
    
    function __construct($descObjeto, $idContratoObjeto) {
        $this->descObjeto = $descObjeto;
        $this->idContratoObjeto = $idContratoObjeto;
    }

    function getDescObjeto() {
        return $this->descObjeto;
    }

    function getIdContratoObjeto() {
        return $this->idContratoObjeto;
    }

    function setDescObjeto($descObjeto) {
        $this->descObjeto = $descObjeto;
    }

    function setIdContratoObjeto($idContratoObjeto) {
        $this->idContratoObjeto = $idContratoObjeto;
    }


}
