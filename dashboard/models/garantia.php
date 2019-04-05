<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of garantia
 *
 * @author USUARIO
 */
class garantia {

    private $statusGarantia;
    private $descGarantia;
    private $idContratoGarantia;
    
    function __construct($statusGarantia, $descGarantia, $idContratoGarantia) {
        $this->statusGarantia = $statusGarantia;
        $this->descGarantia = $descGarantia;
        $this->idContratoGarantia = $idContratoGarantia;
    }
    function getStatusGarantia() {
        return $this->statusGarantia;
    }

    function getDescGarantia() {
        return $this->descGarantia;
    }

    function getIdContratoGarantia() {
        return $this->idContratoGarantia;
    }

    function setStatusGarantia($statusGarantia) {
        $this->statusGarantia = $statusGarantia;
    }

    function setDescGarantia($descGarantia) {
        $this->descGarantia = $descGarantia;
    }

    function setIdContratoGarantia($idContratoGarantia) {
        $this->idContratoGarantia = $idContratoGarantia;
    }



}
