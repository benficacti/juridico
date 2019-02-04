<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipoAviso
 *
 * @author USUARIO
 */
class tipoAviso {

    private $descTipoAviso;

    function __construct($descTipoAviso) {
        $this->descTipoAviso = $descTipoAviso;
    }

    function getDescTipoAviso() {
        return $this->descTipoAviso;
    }

    function setDescTipoAviso($descTipoAviso) {
        $this->descTipoAviso = $descTipoAviso;
    }

}
