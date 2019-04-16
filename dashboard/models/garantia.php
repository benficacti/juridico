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
    
    function __construct($descGarantia) {
        $this->descGarantia = $descGarantia;
    }

    function getDescGarantia() {
        return $this->descGarantia;
    }

    function setDescGarantia($descGarantia) {
        $this->descGarantia = $descGarantia;
    }

}
