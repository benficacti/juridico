<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of observacoesExigencias
 *
 * @author USUARIO
 */
class observacoesExigencias {
    private $descObserExig;
    
    function __construct($descObserExig) {
        $this->descObserExig = $descObserExig;
    }

    
    function getDescObserExig() {
        return $this->descObserExig;
    }

    function setDescObserExig($descObserExig) {
        $this->descObserExig = $descObserExig;
    }


}
