<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of avisoContrato
 *
 * @author USUARIO
 */
class avisoContrato {
    private $descAviso;
    private $dataAviso;
    private $idContratoAviso;
    private $idTipoAviso;
    private $idStatusAviso;
    
    function __construct($descAviso, $dataAviso, $idContratoAviso, $idTipoAviso, $idStatusAviso) {
        $this->descAviso = $descAviso;
        $this->dataAviso = $dataAviso;
        $this->idContratoAviso = $idContratoAviso;
        $this->idTipoAviso = $idTipoAviso;
        $this->idStatusAviso = $idStatusAviso;
    }
    

    function getDescAviso() {
        return $this->descAviso;
    }

    function getDataAviso() {
        return $this->dataAviso;
    }

    function getIdContratoAviso() {
        return $this->idContratoAviso;
    }

    function getIdTipoAviso() {
        return $this->idTipoAviso;
    }

    function getIdStatusAviso() {
        return $this->idStatusAviso;
    }

    function setDescAviso($descAviso) {
        $this->descAviso = $descAviso;
    }

    function setDataAviso($dataAviso) {
        $this->dataAviso = $dataAviso;
    }

    function setIdContratoAviso($idContratoAviso) {
        $this->idContratoAviso = $idContratoAviso;
    }

    function setIdTipoAviso($idTipoAviso) {
        $this->idTipoAviso = $idTipoAviso;
    }

    function setIdStatusAviso($idStatusAviso) {
        $this->idStatusAviso = $idStatusAviso;
    }


}
