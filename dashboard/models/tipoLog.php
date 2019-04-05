<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipoLog
 *
 * @author USUARIO
 */
class tipoLog {

    private $descTipoLog;

    function __construct($descTipoLog) {
        $this->descTipoLog = $descTipoLog;
    }

    function getDescTipoLog() {
        return $this->descTipoLog;
    }

    function setDescTipoLog($descTipoLog) {
        $this->descTipoLog = $descTipoLog;
    }

}
