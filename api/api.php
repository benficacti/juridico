<?php

include '../models/contrato.php';
include '../models/garantia.php';
include '../models/objeto.php';
include '../models/observacoesExigencias.php';
include '../classes/Update.class.php';
include '../classes/Insert.class.php';
include '../classes/Search.class.php';
$request = (null !== (filter_input(INPUT_GET, 'request'))) ? filter_input(INPUT_GET, 'request') : 0;


if ($request == "cadastro_contrato") {
    sleep(rand(1, 3));
    $_numeroContrato = (null !== (filter_input(INPUT_GET, 'numero'))) ? filter_input(INPUT_GET, 'numero') : null;
    $_contratanteContrato = (null !== (filter_input(INPUT_GET, 'nome_contratante'))) ? filter_input(INPUT_GET, 'nome_contratante') : null;
    $_contratadoContrato = (null !== (filter_input(INPUT_GET, 'nome_contratada'))) ? filter_input(INPUT_GET, 'nome_contratada') : null;
    $_concorrenciaContrato = (null !== (filter_input(INPUT_GET, 'nome_concorrencia'))) ? filter_input(INPUT_GET, 'nome_concorrencia') : null;
    $_inicioVigenciaContrato = (null !== (filter_input(INPUT_GET, 'inicio_vigencia'))) ? filter_input(INPUT_GET, 'inicio_vigencia') : null;
    $_finalVigenciaContrato = (null !== (filter_input(INPUT_GET, 'fim_vigencia'))) ? filter_input(INPUT_GET, 'fim_vigencia') : null;
    $_valorContrato = (null !== (filter_input(INPUT_GET, 'valor_contrato'))) ? filter_input(INPUT_GET, 'valor_contrato') : null;
    $_quantidadeParcelasContrato = (null !== (filter_input(INPUT_GET, 'parcela'))) ? filter_input(INPUT_GET, 'parcela') : null;
    $_valorDasParcelasContrato = (null !== (filter_input(INPUT_GET, 'valor_parcela'))) ? filter_input(INPUT_GET, 'valor_parcela') : null;
    $_dataPagamentoDasParcelasContrato = (null !== (filter_input(INPUT_GET, 'data_pag_parcela'))) ? filter_input(INPUT_GET, 'data_pag_parcela') : null;
    $_valorTotalPagoContrato = (null !== (filter_input(INPUT_GET, 'total_finalizado'))) ? filter_input(INPUT_GET, 'total_finalizado') : null;
    $_vencimentoContrato = (null !== (filter_input(INPUT_GET, 'vencimento'))) ? filter_input(INPUT_GET, 'vencimento') : null;
    $_quantidadeParcelasPagasContrato = (null !== (filter_input(INPUT_GET, 'parcelas_finalizadas'))) ? filter_input(INPUT_GET, 'parcelas_finalizadas') : null;
    $_idTipoContrato = 1;
    if ($_numeroContrato !== null) {
        $contrato = new contrato($_numeroContrato, $_contratanteContrato, $_contratadoContrato, $_concorrenciaContrato, $_valorContrato, $_quantidadeParcelasContrato, $_valorDasParcelasContrato, $_quantidadeParcelasPagasContrato, $_dataPagamentoDasParcelasContrato, $_valorTotalPagoContrato, $_inicioVigenciaContrato, $_finalVigenciaContrato, $_vencimentoContrato, $_idTipoContrato);
        Insert::CadastraContrato($contrato);
    }
}

if ($request == 'adicionar_garantia') {
    sleep(rand(1, 3));
    $_idContratoGarantia = (null !== (filter_input(INPUT_GET, 'idcontrato'))) ? filter_input(INPUT_GET, 'idcontrato') : null;
    $_statusGarantia = (null !== (filter_input(INPUT_GET, 'status_garantia'))) ? filter_input(INPUT_GET, 'status_garantia') : null;
    $_descGarantia = (null !== (filter_input(INPUT_GET, 'garantia'))) ? filter_input(INPUT_GET, 'garantia') : null;
    $garantia = new garantia($_statusGarantia, $_descGarantia, $_idContratoGarantia);
    $idGarantia = Insert::CadastraGarantia($garantia);
    if ($idGarantia != null) {
        echo Update::adicionaGarantia($_idContratoGarantia, $_statusGarantia, $idGarantia);
    }
}

if ($request == 'adicionar_objeto') {
    sleep(rand(1, 3));
    $_idContratoObejto = (null !== (filter_input(INPUT_GET, 'idcontrato'))) ? filter_input(INPUT_GET, 'idcontrato') : null;
    $_status_objeto = (null !== (filter_input(INPUT_GET, 'status_objeto'))) ? filter_input(INPUT_GET, 'status_objeto') : null;
    $_descObejto = (null !== (filter_input(INPUT_GET, 'objeto'))) ? filter_input(INPUT_GET, 'objeto') : null;
    $objeto = new objeto($_idContratoObejto, $_status_objeto, $_descObejto);
    $idObjeto = Insert::CadastraObjeto($objeto);
    if ($idObjeto != null) {
        echo Update::adicionaObjeto($_idContratoObejto, $_status_objeto, $idObjeto);
    }
}

if ($request == 'adicionar_obs') {
    sleep(rand(1, 3));
    $_idContratoObs = (null !== (filter_input(INPUT_GET, 'idcontrato'))) ? filter_input(INPUT_GET, 'idcontrato') : null;
    $_status_obs = (null !== (filter_input(INPUT_GET, 'status_obs'))) ? filter_input(INPUT_GET, 'status_obs') : null;
    $_descObs = (null !== (filter_input(INPUT_GET, 'obs'))) ? filter_input(INPUT_GET, 'obs') : null;
    $obs = new observacoesExigencias($_idContratoObs, $_status_obs, $_descObs);
    $idObjeto = Insert::CadastraObs($obs);
    if ($idObjeto != null) {
        echo Update::adicionaObs($_idContratoObs, $_status_obs, $idObjeto);
    }
}

if (($request == 'update_cadastro') && ($request != 0)) {
    
}



