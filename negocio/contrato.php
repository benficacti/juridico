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
private $contratanteContrato;
private $contratadoContrato;
private $objetoContrato;
private $valorContrato;
private $pagamentoParcelaContrato;
private $pagamentoRealizadoValorContrato;
private $pagamentoDataContrato;
private $inicioVigenciaContrato;
private $finalVigenciaContrato;
private $vencimentoContrato;
private $idGarantiaContrato;
private $idAditamentoContrato;
private $idLoginContrato;
private $idFinalizacaoContrato;
private $idTipoContrato;
private $idStatusGarantiaContrato;
private $idObservacoesExigenciasContrato;


function __construct($numeroContrato, $contratanteContrato, $contratadoContrato, $objetoContrato, $valorContrato, 
        $pagamentoParcelaContrato, $pagamentoRealizadoValorContrato, $pagamentoDataContrato, $inicioVigenciaContrato,
        $finalVigenciaContrato, $vencimentoContrato, $idGarantiaContrato, 
       $idTipoContrato,$idObservacoesExigenciasContrato) {
    
    $this->numeroContrato = $numeroContrato;
    $this->contratanteContrato = $contratanteContrato;
    $this->contratadoContrato = $contratadoContrato;
    $this->objetoContrato = $objetoContrato;
    $this->valorContrato = $valorContrato;
    $this->pagamentoParcelaContrato = $pagamentoParcelaContrato;
    $this->pagamentoRealizadoValorContrato = $pagamentoRealizadoValorContrato;
    $this->pagamentoDataContrato = $pagamentoDataContrato;
    $this->inicioVigenciaContrato = $inicioVigenciaContrato;
    $this->finalVigenciaContrato = $finalVigenciaContrato;
    $this->vencimentoContrato = $vencimentoContrato;
    $this->idGarantiaContrato = $idGarantiaContrato;
    $this->idTipoContrato = $idTipoContrato;
    $this->idObservacoesExigenciasContrato = $idObservacoesExigenciasContrato;
}

function getNumeroContrato() {
    return $this->numeroContrato;
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

function getValorContrato() {
    return $this->valorContrato;
}

function getPagamentoParcelaContrato() {
    return $this->pagamentoParcelaContrato;
}

function getPagamentoRealizadoValorContrato() {
    return $this->pagamentoRealizadoValorContrato;
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

function getIdGarantiaContrato() {
    return $this->idGarantiaContrato;
}

function getIdAditamentoContrato() {
    return $this->idAditamentoContrato;
}

function getIdLoginContrato() {
    return $this->idLoginContrato;
}

function getIdFinalizacaoContrato() {
    return $this->idFinalizacaoContrato;
}

function getIdTipoContrato() {
    return $this->idTipoContrato;
}

function getIdStatusGarantiaContrato() {
    return $this->idStatusGarantiaContrato;
}

function getIdObservacoesExigenciasContrato() {
    return $this->idObservacoesExigenciasContrato;
}

function setNumeroContrato($numeroContrato) {
    $this->numeroContrato = $numeroContrato;
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

function setValorContrato($valorContrato) {
    $this->valorContrato = $valorContrato;
}

function setPagamentoParcelaContrato($pagamentoParcelaContrato) {
    $this->pagamentoParcelaContrato = $pagamentoParcelaContrato;
}

function setPagamentoRealizadoValorContrato($pagamentoRealizadoValorContrato) {
    $this->pagamentoRealizadoValorContrato = $pagamentoRealizadoValorContrato;
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

function setIdGarantiaContrato($idGarantiaContrato) {
    $this->idGarantiaContrato = $idGarantiaContrato;
}

function setIdAditamentoContrato($idAditamentoContrato) {
    $this->idAditamentoContrato = $idAditamentoContrato;
}

function setIdLoginContrato($idLoginContrato) {
    $this->idLoginContrato = $idLoginContrato;
}

function setIdFinalizacaoContrato($idFinalizacaoContrato) {
    $this->idFinalizacaoContrato = $idFinalizacaoContrato;
}

function setIdTipoContrato($idTipoContrato) {
    $this->idTipoContrato = $idTipoContrato;
}

function setIdStatusGarantiaContrato($idStatusGarantiaContrato) {
    $this->idStatusGarantiaContrato = $idStatusGarantiaContrato;
}

function setIdObservacoesExigenciasContrato($idObservacoesExigenciasContrato) {
    $this->idObservacoesExigenciasContrato = $idObservacoesExigenciasContrato;
}



}
