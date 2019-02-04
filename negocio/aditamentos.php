<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of aditamentos
 *
 * @author USUARIO
 */
class aditamentos {

    private $idAtualContratoAditamento;
    private $dataAditamento;
    private $numeroAditamento;

    function __construct($idAtualContratoAditamento, $dataAditamento, $numeroAditamento) {
        $this->idAtualContratoAditamento = $idAtualContratoAditamento;
        $this->dataAditamento = $dataAditamento;
        $this->numeroAditamento = $numeroAditamento;
    }

    function getIdAtualContratoAditamento() {
        return $this->idAtualContratoAditamento;
    }

    function getDataAditamento() {
        return $this->dataAditamento;
    }

    function getNumeroAditamento() {
        return $this->numeroAditamento;
    }

    function setIdAtualContratoAditamento($idAtualContratoAditamento) {
        $this->idAtualContratoAditamento = $idAtualContratoAditamento;
    }

    function setDataAditamento($dataAditamento) {
        $this->dataAditamento = $dataAditamento;
    }

    function setNumeroAditamento($numeroAditamento) {
        $this->numeroAditamento = $numeroAditamento;
    }

}
