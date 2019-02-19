<?php

include '../negocio/contrato.php';
include '../classes/Insert.class.php';

$request = (null !== (filter_input(INPUT_POST, 'numero'))) ? filter_input(INPUT_POST, 'numero') : 0;


if (($request == 'cadastro_contrato') && ($request != 0)) {
    sleep(1);
    echo $numeroContrato = (null !== (filter_input(INPUT_POST, 'numero'))) ? filter_input(INPUT_POST, 'numero') : null;
    /*
      $numeroContrato = (null !== (filter_input(INPUT_POST, 'numero'))) ? filter_input(INPUT_POST, 'numero') : null;
      $contratanteContrato = (null !== (filter_input(INPUT_POST, 'cantrante'))) ? filter_input(INPUT_POST, 'cantrante') : null;
      $contratadoContrato = (null !== (filter_input(INPUT_POST, 'contrato'))) ? filter_input(INPUT_POST, 'contrato') : null;
      $objetoContrato = (null !== (filter_input(INPUT_POST, 'objeto'))) ? filter_input(INPUT_POST, 'objeto') : null;
      $valorContrato = (null !== (filter_input(INPUT_POST, 'valor'))) ? filter_input(INPUT_POST, 'valor') : null;
      $pagamentoParcelaContrato = (null !== (filter_input(INPUT_POST, 'parcela'))) ? filter_input(INPUT_POST, 'parcela') : null;
      $pagamentoRealizadoValorContrato = (null !== (filter_input(INPUT_POST, 'realizado'))) ? filter_input(INPUT_POST, 'realizado') : null;
      $pagamentoDataContrato = (null !== (filter_input(INPUT_POST, 'Pagamentodata'))) ? filter_input(INPUT_POST, 'Pagamentodata') : null;
      $inicioVigenciaContrato = (null !== (filter_input(INPUT_POST, 'InicioVigencia'))) ? filter_input(INPUT_POST, 'InicioVigencia') : null;
      $finalVigenciaContrato = (null !== (filter_input(INPUT_POST, 'FimVigencia'))) ? filter_input(INPUT_POST, 'FimVigencia') : null;
      $vencimentoContrato = (null !== (filter_input(INPUT_POST, 'VencimentoContrato'))) ? filter_input(INPUT_POST, 'VencimentoContrato') : null;
      $idGarantiaContrato = (null !== (filter_input(INPUT_POST, 'garantia'))) ? filter_input(INPUT_POST, 'garantia') : null;
      $idTipoContrato = (null !== (filter_input(INPUT_POST, 'TipoContrato'))) ? filter_input(INPUT_POST, 'TipoContrato') : null;
      $idObservacoesExigenciasContrato = (null !== (filter_input(INPUT_POST, 'Observacoes'))) ? filter_input(INPUT_POST, 'Observacoes') : null;


      if ($numeroContrato !== null) {
      $contrato = new contrato($numeroContrato, $contratanteContrato, $contratadoContrato, $objetoContrato, $valorContrato, $pagamentoParcelaContrato, $pagamentoRealizadoValorContrato, $pagamentoDataContrato, $inicioVigenciaContrato, $finalVigenciaContrato, $vencimentoContrato, $idGarantiaContrato, $idTipoContrato, $idObservacoesExigenciasContrato);
      Insert::CadastraContrato($contrato);
      } */
}

if (($request == 'update_cadastro') && ($request != 0)) {
    
}




