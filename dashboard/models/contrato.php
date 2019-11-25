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

private $_numeroContrato;
private $_contratanteContrato;
private $_contratadoContrato;
private $_concorrenciaContrato;
private $_objetoContrato;
private $_valorContrato;
private $_quantidadeParcelasContrato;
private $_valorDasParcelasContrato;
private $_quantidadeParcelasPagasContrato;
private $_dataPagamentoDasParcelasContrato;
private $_valorTotalPagoContrato;
private $_inicioVigenciaContrato;
private $_finalVigenciaContrato;
private $_vencimentoContrato;
private $_idGarantiaContrato;
private $_idAditamentoContrato;
private $_idLoginContrato;
private $_idFinalizacaoContrato;
private $_idTipoContrato;
private $_idStatusGarantiaContrato;
private $_idObservacoesExigenciasContrato;
private $_urlImagemContrato;
private $_empresaContrato;
private $_possuiParcela;
private $_statusContrato;

function __construct($_numeroContrato, $_contratanteContrato, $_contratadoContrato, $_concorrenciaContrato, $_objetoContrato, $_valorContrato, $_quantidadeParcelasContrato, $_valorDasParcelasContrato, $_quantidadeParcelasPagasContrato, $_dataPagamentoDasParcelasContrato, $_valorTotalPagoContrato, $_inicioVigenciaContrato, $_finalVigenciaContrato, $_vencimentoContrato, $_idGarantiaContrato, $_idAditamentoContrato, $_idLoginContrato, $_idFinalizacaoContrato, $_idTipoContrato, $_idStatusGarantiaContrato, $_idObservacoesExigenciasContrato, $_urlImagemContrato, $_empresaContrato, $_possuiParcela, $_statusContrato) {
    $this->_numeroContrato = $_numeroContrato;
    $this->_contratanteContrato = $_contratanteContrato;
    $this->_contratadoContrato = $_contratadoContrato;
    $this->_concorrenciaContrato = $_concorrenciaContrato;
    $this->_objetoContrato = $_objetoContrato;
    $this->_valorContrato = $_valorContrato;
    $this->_quantidadeParcelasContrato = $_quantidadeParcelasContrato;
    $this->_valorDasParcelasContrato = $_valorDasParcelasContrato;
    $this->_quantidadeParcelasPagasContrato = $_quantidadeParcelasPagasContrato;
    $this->_dataPagamentoDasParcelasContrato = $_dataPagamentoDasParcelasContrato;
    $this->_valorTotalPagoContrato = $_valorTotalPagoContrato;
    $this->_inicioVigenciaContrato = $_inicioVigenciaContrato;
    $this->_finalVigenciaContrato = $_finalVigenciaContrato;
    $this->_vencimentoContrato = $_vencimentoContrato;
    $this->_idGarantiaContrato = $_idGarantiaContrato;
    $this->_idAditamentoContrato = $_idAditamentoContrato;
    $this->_idLoginContrato = $_idLoginContrato;
    $this->_idFinalizacaoContrato = $_idFinalizacaoContrato;
    $this->_idTipoContrato = $_idTipoContrato;
    $this->_idStatusGarantiaContrato = $_idStatusGarantiaContrato;
    $this->_idObservacoesExigenciasContrato = $_idObservacoesExigenciasContrato;
    $this->_urlImagemContrato = $_urlImagemContrato;
    $this->_empresaContrato = $_empresaContrato;
    $this->_possuiParcela = $_possuiParcela;
    $this->_statusContrato = $_statusContrato;
}

function get_numeroContrato() {
    return $this->_numeroContrato;
}

function get_contratanteContrato() {
    return $this->_contratanteContrato;
}

function get_contratadoContrato() {
    return $this->_contratadoContrato;
}

function get_concorrenciaContrato() {
    return $this->_concorrenciaContrato;
}

function get_objetoContrato() {
    return $this->_objetoContrato;
}

function get_valorContrato() {
    return $this->_valorContrato;
}

function get_quantidadeParcelasContrato() {
    return $this->_quantidadeParcelasContrato;
}

function get_valorDasParcelasContrato() {
    return $this->_valorDasParcelasContrato;
}

function get_quantidadeParcelasPagasContrato() {
    return $this->_quantidadeParcelasPagasContrato;
}

function get_dataPagamentoDasParcelasContrato() {
    return $this->_dataPagamentoDasParcelasContrato;
}

function get_valorTotalPagoContrato() {
    return $this->_valorTotalPagoContrato;
}

function get_inicioVigenciaContrato() {
    return $this->_inicioVigenciaContrato;
}

function get_finalVigenciaContrato() {
    return $this->_finalVigenciaContrato;
}

function get_vencimentoContrato() {
    return $this->_vencimentoContrato;
}

function get_idGarantiaContrato() {
    return $this->_idGarantiaContrato;
}

function get_idAditamentoContrato() {
    return $this->_idAditamentoContrato;
}

function get_idLoginContrato() {
    return $this->_idLoginContrato;
}

function get_idFinalizacaoContrato() {
    return $this->_idFinalizacaoContrato;
}

function get_idTipoContrato() {
    return $this->_idTipoContrato;
}

function get_idStatusGarantiaContrato() {
    return $this->_idStatusGarantiaContrato;
}

function get_idObservacoesExigenciasContrato() {
    return $this->_idObservacoesExigenciasContrato;
}

function get_urlImagemContrato() {
    return $this->_urlImagemContrato;
}

function get_empresaContrato() {
    return $this->_empresaContrato;
}

function get_possuiParcela() {
    return $this->_possuiParcela;
}

function get_statusContrato() {
    return $this->_statusContrato;
}

function set_numeroContrato($_numeroContrato) {
    $this->_numeroContrato = $_numeroContrato;
}

function set_contratanteContrato($_contratanteContrato) {
    $this->_contratanteContrato = $_contratanteContrato;
}

function set_contratadoContrato($_contratadoContrato) {
    $this->_contratadoContrato = $_contratadoContrato;
}

function set_concorrenciaContrato($_concorrenciaContrato) {
    $this->_concorrenciaContrato = $_concorrenciaContrato;
}

function set_objetoContrato($_objetoContrato) {
    $this->_objetoContrato = $_objetoContrato;
}

function set_valorContrato($_valorContrato) {
    $this->_valorContrato = $_valorContrato;
}

function set_quantidadeParcelasContrato($_quantidadeParcelasContrato) {
    $this->_quantidadeParcelasContrato = $_quantidadeParcelasContrato;
}

function set_valorDasParcelasContrato($_valorDasParcelasContrato) {
    $this->_valorDasParcelasContrato = $_valorDasParcelasContrato;
}

function set_quantidadeParcelasPagasContrato($_quantidadeParcelasPagasContrato) {
    $this->_quantidadeParcelasPagasContrato = $_quantidadeParcelasPagasContrato;
}

function set_dataPagamentoDasParcelasContrato($_dataPagamentoDasParcelasContrato) {
    $this->_dataPagamentoDasParcelasContrato = $_dataPagamentoDasParcelasContrato;
}

function set_valorTotalPagoContrato($_valorTotalPagoContrato) {
    $this->_valorTotalPagoContrato = $_valorTotalPagoContrato;
}

function set_inicioVigenciaContrato($_inicioVigenciaContrato) {
    $this->_inicioVigenciaContrato = $_inicioVigenciaContrato;
}

function set_finalVigenciaContrato($_finalVigenciaContrato) {
    $this->_finalVigenciaContrato = $_finalVigenciaContrato;
}

function set_vencimentoContrato($_vencimentoContrato) {
    $this->_vencimentoContrato = $_vencimentoContrato;
}

function set_idGarantiaContrato($_idGarantiaContrato) {
    $this->_idGarantiaContrato = $_idGarantiaContrato;
}

function set_idAditamentoContrato($_idAditamentoContrato) {
    $this->_idAditamentoContrato = $_idAditamentoContrato;
}

function set_idLoginContrato($_idLoginContrato) {
    $this->_idLoginContrato = $_idLoginContrato;
}

function set_idFinalizacaoContrato($_idFinalizacaoContrato) {
    $this->_idFinalizacaoContrato = $_idFinalizacaoContrato;
}

function set_idTipoContrato($_idTipoContrato) {
    $this->_idTipoContrato = $_idTipoContrato;
}

function set_idStatusGarantiaContrato($_idStatusGarantiaContrato) {
    $this->_idStatusGarantiaContrato = $_idStatusGarantiaContrato;
}

function set_idObservacoesExigenciasContrato($_idObservacoesExigenciasContrato) {
    $this->_idObservacoesExigenciasContrato = $_idObservacoesExigenciasContrato;
}

function set_urlImagemContrato($_urlImagemContrato) {
    $this->_urlImagemContrato = $_urlImagemContrato;
}

function set_empresaContrato($_empresaContrato) {
    $this->_empresaContrato = $_empresaContrato;
}

function set_possuiParcela($_possuiParcela) {
    $this->_possuiParcela = $_possuiParcela;
}

function set_statusContrato($_statusContrato) {
    $this->_statusContrato = $_statusContrato;
}



}
