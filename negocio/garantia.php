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

    private $descGarantia;
    private $numeroContratoGarantia;

    function __construct($descGarantia, $numeroContratoGarantia) {
        $this->descGarantia = $descGarantia;
        $this->numeroContratoGarantia = $numeroContratoGarantia;
    }

    
    function getDescGarantia() {
        return $this->descGarantia;
    }

    function getNumeroContratoGarantia() {
        return $this->numeroContratoGarantia;
    }

    function setDescGarantia($descGarantia) {
        $this->descGarantia = $descGarantia;
    }

    function setNumeroContratoGarantia($numeroContratoGarantia) {
        $this->numeroContratoGarantia = $numeroContratoGarantia;
    }


    
}
