<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contrato
 *
 * @author USUARIO
 */
class contrato {

    private $numeroContrato;
    private $idTipoContrato;
    private $contratanteContrato;
    private $contratadoContrato;
    private $objetoContrato;
    private $idFinalizacaoContrato;
    private $valorContrato;
    private $pagamentoParcelaContrato;
    private $pagamentoValorContrato;
    private $pagamentoDataContrato;
    private $inicioVigenciaContrato;
    private $finalVigenciaContrato;
    private $vencimentoContrato;
    private $idAdiantamentoContrato;
    private $idStatusGarantia;
    private $idGarantia;
    private $idLogin;
    private $idObservacoesExigencias;

    function __construct($numeroContrato, $idTipoContrato, $contratanteContrato, $contratadoContrato, $objetoContrato, $idFinalizacaoContrato, $valorContrato, $pagamentoParcelaContrato, $pagamentoValorContrato, $pagamentoDataContrato, $inicioVigenciaContrato, $finalVigenciaContrato, $vencimentoContrato, $idAdiantamentoContrato, $idStatusGarantia, $idGarantia, $idLogin, $idObservacoesExigencias) {
        $this->numeroContrato = $numeroContrato;
        $this->idTipoContrato = $idTipoContrato;
        $this->contratanteContrato = $contratanteContrato;
        $this->contratadoContrato = $contratadoContrato;
        $this->objetoContrato = $objetoContrato;
        $this->idFinalizacaoContrato = $idFinalizacaoContrato;
        $this->valorContrato = $valorContrato;
        $this->pagamentoParcelaContrato = $pagamentoParcelaContrato;
        $this->pagamentoValorContrato = $pagamentoValorContrato;
        $this->pagamentoDataContrato = $pagamentoDataContrato;
        $this->inicioVigenciaContrato = $inicioVigenciaContrato;
        $this->finalVigenciaContrato = $finalVigenciaContrato;
        $this->vencimentoContrato = $vencimentoContrato;
        $this->idAdiantamentoContrato = $idAdiantamentoContrato;
        $this->idStatusGarantia = $idStatusGarantia;
        $this->idGarantia = $idGarantia;
        $this->idLogin = $idLogin;
        $this->idObservacoesExigencias = $idObservacoesExigencias;
    }

    function getNumeroContrato() {
        return $this->numeroContrato;
    }

    function getIdTipoContrato() {
        return $this->idTipoContrato;
    }

    function getContratanteContrato() {
        return $this->contratanteContrato;
    }

    function getContratadoContrato() {
        return $this->contratadoContrato;
    }

    function getObjetoContrato() {
        return $this->objetoContrato;
    }

    function getIdFinalizacaoContrato() {
        return $this->idFinalizacaoContrato;
    }

    function getValorContrato() {
        return $this->valorContrato;
    }

    function getPagamentoParcelaContrato() {
        return $this->pagamentoParcelaContrato;
    }

    function getPagamentoValorContrato() {
        return $this->pagamentoValorContrato;
    }

    function getPagamentoDataContrato() {
        return $this->pagamentoDataContrato;
    }

    function getInicioVigenciaContrato() {
        return $this->inicioVigenciaContrato;
    }

    function getFinalVigenciaContrato() {
        return $this->finalVigenciaContrato;
    }

    function getVencimentoContrato() {
        return $this->vencimentoContrato;
    }

    function getIdAdiantamentoContrato() {
        return $this->idAdiantamentoContrato;
    }

    function getIdStatusGarantia() {
        return $this->idStatusGarantia;
    }

    function getIdGarantia() {
        return $this->idGarantia;
    }

    function getIdLogin() {
        return $this->idLogin;
    }

    function getIdObservacoesExigencias() {
        return $this->idObservacoesExigencias;
    }

    function setNumeroContrato($numeroContrato) {
        $tamanho = strlen($numeroContrato);
        if ($tamanho > 0) {
            $this->numeroContrato = $numeroContrato;
        }
    }

    function setIdTipoContrato($idTipoContrato) {
        $this->idTipoContrato = $idTipoContrato;
    }

    function setContratanteContrato($contratanteContrato) {
        $this->contratanteContrato = $contratanteContrato;
    }

    function setContratadoContrato($contratadoContrato) {
        $this->contratadoContrato = $contratadoContrato;
    }

    function setObjetoContrato($objetoContrato) {
        $this->objetoContrato = $objetoContrato;
    }

    function setIdFinalizacaoContrato($idFinalizacaoContrato) {
        $this->idFinalizacaoContrato = $idFinalizacaoContrato;
    }

    function setValorContrato($valorContrato) {
        $this->valorContrato = $valorContrato;
    }

    function setPagamentoParcelaContrato($pagamentoParcelaContrato) {
        $this->pagamentoParcelaContrato = $pagamentoParcelaContrato;
    }

    function setPagamentoValorContrato($pagamentoValorContrato) {
        $this->pagamentoValorContrato = $pagamentoValorContrato;
    }

    function setPagamentoDataContrato($pagamentoDataContrato) {
        $this->pagamentoDataContrato = $pagamentoDataContrato;
    }

    function setInicioVigenciaContrato($inicioVigenciaContrato) {
        $this->inicioVigenciaContrato = $inicioVigenciaContrato;
    }

    function setFinalVigenciaContrato($finalVigenciaContrato) {
        $this->finalVigenciaContrato = $finalVigenciaContrato;
    }

    function setVencimentoContrato($vencimentoContrato) {
        $this->vencimentoContrato = $vencimentoContrato;
    }

    function setIdAdiantamentoContrato($idAdiantamentoContrato) {
        $this->idAdiantamentoContrato = $idAdiantamentoContrato;
    }

    function setIdStatusGarantia($idStatusGarantia) {
        $this->idStatusGarantia = $idStatusGarantia;
    }

    function setIdGarantia($idGarantia) {
        $this->idGarantia = $idGarantia;
    }

    function setIdLogin($idLogin) {
        $this->idLogin = $idLogin;
    }

    function setIdObservacoesExigencias($idObservacoesExigencias) {
        $this->idObservacoesExigencias = $idObservacoesExigencias;
    }

}
