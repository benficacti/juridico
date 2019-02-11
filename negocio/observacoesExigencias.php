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
    private $numeroDescObserExigen;

    function __construct($descObserExig, $numeroDescObserExigen) {
        $this->descObserExig = $descObserExig;
        $this->numeroDescObserExigen = $numeroDescObserExigen;
    }
    
    function getDescObserExig() {
        return $this->descObserExig;
    }

    function getNumeroDescObserExigen() {
        return $this->numeroDescObserExigen;
    }

    function setDescObserExig($descObserExig) {
        $this->descObserExig = $descObserExig;
    }

    function setNumeroDescObserExigen($numeroDescObserExigen) {
        $this->numeroDescObserExigen = $numeroDescObserExigen;
    }




}
