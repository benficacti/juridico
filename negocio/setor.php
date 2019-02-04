<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of setor
 *
 * @author USUARIO
 */
class setor {
    private $descSetor;
    
    function __construct($descSetor) {
        $this->descSetor = $descSetor;
    }
    
    function getDescSetor() {
        return $this->descSetor;
    }

    function setDescSetor($descSetor) {
        $this->descSetor = $descSetor;
    }



}
