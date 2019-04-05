<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipoContrato
 *
 * @author USUARIO
 */
class tipoContrato {

    private $descTipoContrato;

    function __construct($descTipoContrato) {
        $this->descTipoContrato = $descTipoContrato;
    }

    function getDescTipoContrato() {
        return $this->descTipoContrato;
    }

    function setDescTipoContrato($descTipoContrato) {
        $this->descTipoContrato = $descTipoContrato;
    }

}
