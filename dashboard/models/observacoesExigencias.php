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

    private $descObserExigen;
    private $idContratoObservacoes;
    
    function __construct($descObserExigen, $idContratoObservacoes) {
        $this->descObserExigen = $descObserExigen;
        $this->idContratoObservacoes = $idContratoObservacoes;
    }

    function getDescObserExigen() {
        return $this->descObserExigen;
    }

    function getIdContratoObservacoes() {
        return $this->idContratoObservacoes;
    }

    function setDescObserExigen($descObserExigen) {
        $this->descObserExigen = $descObserExigen;
    }

    function setIdContratoObservacoes($idContratoObservacoes) {
        $this->idContratoObservacoes = $idContratoObservacoes;
    }


}
