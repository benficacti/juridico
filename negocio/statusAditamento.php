<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of statusAditamento
 *
 * @author USUARIO
 */
class statusAditamento {

    private $descStatusAditamento;

    function __construct($descStatusAditamento) {
        $this->descStatusAditamento = $descStatusAditamento;
    }

    function getDescStatusAditamento() {
        return $this->descStatusAditamento;
    }

    function setDescStatusAditamento($descStatusAditamento) {
        $this->descStatusAditamento = $descStatusAditamento;
    }

}
