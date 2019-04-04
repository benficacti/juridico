<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of finalizacaoContrato
 *
 * @author USUARIO
 */
class finalizacaoContrato {

    private $descFinalizacaoContrato;

    function __construct($descFinalizacaoContrato) {
        $this->descFinalizacaoContrato = $descFinalizacaoContrato;
    }

    function getDescFinalizacaoContrato() {
        return $this->descFinalizacaoContrato;
    }

    function setDescFinalizacaoContrato($descFinalizacaoContrato) {
        $this->descFinalizacaoContrato = $descFinalizacaoContrato;
    }

}
