<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipoAcesso
 *
 * @author USUARIO
 */
class tipoAcesso {

    private $descTipoAcesso;

    function __construct($descTipoAcesso) {
        $this->descTipoAcesso = $descTipoAcesso;
    }

    function getDescTipoAcesso() {
        return $this->descTipoAcesso;
    }

    function setDescTipoAcesso($descTipoAcesso) {
        $this->descTipoAcesso = $descTipoAcesso;
    }

}
