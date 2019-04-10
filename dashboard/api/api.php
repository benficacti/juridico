<?php

include '../models/contrato.php';
include '../models/garantia.php';
include '../models/objeto.php';
include '../models/observacoesExigencias.php';
include '../classes/Update.class.php';
include '../classes/Insert.class.php';
include '../classes/Search.class.php';
$request = (null !== (filter_input(INPUT_POST, 'request'))) ? filter_input(INPUT_POST, 'request') : 0;


if ($request == "cadastro_contrato") {
    sleep(1);
    $_numeroContrato = (null !== (filter_input(INPUT_POST, 'numero'))) ? filter_input(INPUT_POST, 'numero') : null;
    $_contratanteContrato = (null !== (filter_input(INPUT_POST, 'nome_contratante'))) ? filter_input(INPUT_POST, 'nome_contratante') : null;
    $_contratadoContrato = (null !== (filter_input(INPUT_POST, 'nome_contratada'))) ? filter_input(INPUT_POST, 'nome_contratada') : null;
    $_concorrenciaContrato = (null !== (filter_input(INPUT_POST, 'nome_concorrencia'))) ? filter_input(INPUT_POST, 'nome_concorrencia') : null;
    $_inicioVigenciaContrato = formateDate((null !== (filter_input(INPUT_POST, 'inicio_vigencia'))) ? filter_input(INPUT_POST, 'inicio_vigencia') : null);
    $_finalVigenciaContrato = formateDate((null !== (filter_input(INPUT_POST, 'fim_vigencia'))) ? filter_input(INPUT_POST, 'fim_vigencia') : null);
    $_valorContrato = (null !== (filter_input(INPUT_POST, 'valor_contrato'))) ? filter_input(INPUT_POST, 'valor_contrato') : null;
    $_vencimentoContrato = formateDate((null !== (filter_input(INPUT_POST, 'vencimento'))) ? filter_input(INPUT_POST, 'vencimento') : null);
    $_idTipoContrato = (null !== (filter_input(INPUT_POST, 'tipo_contrato'))) ? filter_input(INPUT_POST, 'tipo_contrato') : null;
    $_possui_parcela = (null !== (filter_input(INPUT_POST, 'possui_parcela'))) ? filter_input(INPUT_POST, 'possui_parcela') : null;
    $_empresa_contrato = (null !== (filter_input(INPUT_POST, 'empresa_contrato'))) ? filter_input(INPUT_POST, 'empresa_contrato') : null;

    if ($_possui_parcela == 1) {
        $_quantidadeParcelasContrato = (null !== (filter_input(INPUT_POST, 'parcela'))) ? filter_input(INPUT_POST, 'parcela') : null;
        $_valorDasParcelasContrato = (null !== (filter_input(INPUT_POST, 'valor_parcela'))) ? filter_input(INPUT_POST, 'valor_parcela') : null;
        $_dataPagamentoDasParcelasContrato = formateDate((null !== (filter_input(INPUT_POST, 'data_pag_parcela'))) ? filter_input(INPUT_POST, 'data_pag_parcela') : null);
        $_valorTotalPagoContrato = (null !== (filter_input(INPUT_POST, 'total_finalizado'))) ? filter_input(INPUT_POST, 'total_finalizado') : null;
        $_quantidadeParcelasPagasContrato = (null !== (filter_input(INPUT_POST, 'parcelas_finalizadas'))) ? filter_input(INPUT_POST, 'parcelas_finalizadas') : null;
    } else {
        $_quantidadeParcelasContrato = null;
        $_valorDasParcelasContrato = null;
        $_dataPagamentoDasParcelasContrato = null;
        $_valorTotalPagoContrato = null;
        $_quantidadeParcelasPagasContrato = null;
    }
    if ($_numeroContrato !== null) {
        $contrato = new contrato($_numeroContrato, $_contratanteContrato, $_contratadoContrato, $_concorrenciaContrato, null, $_valorContrato, $_quantidadeParcelasContrato, $_valorDasParcelasContrato, $_quantidadeParcelasPagasContrato, $_dataPagamentoDasParcelasContrato, $_valorTotalPagoContrato, $_inicioVigenciaContrato, $_finalVigenciaContrato, $_vencimentoContrato, null, null, null, null, $_idTipoContrato, null, null, $_possui_parcela, $_empresa_contrato);
        Insert::CadastraContrato($contrato);
        echo $_SESSION['contrato'];
    }
}

if ($request == 'adicionar_garantia') {
    sleep(1);
    $_idContratoGarantia = (null !== (filter_input(INPUT_POST, 'idcontrato'))) ? filter_input(INPUT_POST, 'idcontrato') : null;
    $_statusGarantia = (null !== (filter_input(INPUT_POST, 'status_garantia'))) ? filter_input(INPUT_POST, 'status_garantia') : null;
    $_descGarantia = (null !== (filter_input(INPUT_POST, 'garantia'))) ? filter_input(INPUT_POST, 'garantia') : null;
    $garantia = new garantia($_statusGarantia, $_descGarantia, $_idContratoGarantia);
    $idGarantia = Insert::CadastraGarantia($garantia);
    if ($idGarantia != null) {
        echo Update::adicionaGarantia($_idContratoGarantia, $_statusGarantia, $idGarantia);
    }
}

if ($request == 'adicionar_objeto') {
    sleep(1);
    $_idContratoObejto = (null !== (filter_input(INPUT_POST, 'idcontrato'))) ? filter_input(INPUT_POST, 'idcontrato') : null;
    $_status_objeto = (null !== (filter_input(INPUT_POST, 'status_objeto'))) ? filter_input(INPUT_POST, 'status_objeto') : null;
    $_descObejto = (null !== (filter_input(INPUT_POST, 'objeto'))) ? filter_input(INPUT_POST, 'objeto') : null;
    $objeto = new objeto($_idContratoObejto, $_status_objeto, $_descObejto);
    $idObjeto = Insert::CadastraObjeto($objeto);
    if ($idObjeto != null) {
        echo Update::adicionaObjeto($_idContratoObejto, $_status_objeto, $idObjeto);
    }
}

if ($request == 'adicionar_obs') {
    sleep(1);
    $_idContratoObs = (null !== (filter_input(INPUT_POST, 'idcontrato'))) ? filter_input(INPUT_POST, 'idcontrato') : null;
    $_status_obs = (null !== (filter_input(INPUT_POST, 'status_obs'))) ? filter_input(INPUT_POST, 'status_obs') : null;
    $_descObs = (null !== (filter_input(INPUT_POST, 'obs'))) ? filter_input(INPUT_POST, 'obs') : null;
    $obs = new observacoesExigencias($_idContratoObs, $_status_obs, $_descObs);
    $idObjeto = Insert::CadastraObs($obs);
    if ($idObjeto != null) {
        echo Update::adicionaObs($_idContratoObs, $_status_obs, $idObjeto);
    }
}
if ($request == 'adicionar_obs') {
    sleep(rand(1, 3));
    $_idContratoObs = (null !== (filter_input(INPUT_POST, 'idcontrato'))) ? filter_input(INPUT_POST, 'idcontrato') : null;
    $_status_obs = (null !== (filter_input(INPUT_POST, 'status_obs'))) ? filter_input(INPUT_POST, 'status_obs') : null;
    $_descObs = (null !== (filter_input(INPUT_POST, 'obs'))) ? filter_input(INPUT_POST, 'obs') : null;
    $obs = new observacoesExigencias($_idContratoObs, $_status_obs, $_descObs);
    $idObjeto = Insert::CadastraObs($obs);
    if ($idObjeto != null) {
        echo Update::adicionaObs($_idContratoObs, $_status_obs, $idObjeto);
    }
}
if (($request == 'login') && ($request !== 0)) {
    sleep(rand(1, 3));
    $login = (null !== (filter_input(INPUT_POST, 'login'))) ? filter_input(INPUT_POST, 'login') : 0;
    $senha = (null !== (filter_input(INPUT_POST, 'senha'))) ? filter_input(INPUT_POST, 'senha') : 0;
    echo Search::loginAuth($login, $senha); //00; = efetuado / 01; usuario incorreto /02; senha incorreta
}


if ($request == 'meus_contratos') {
    echo Search::meusContratos();
}

if ($request == 'filtro_meus_contratos') {
    $tipos = (null !== (filter_input(INPUT_POST, 'tipos'))) ? filter_input(INPUT_POST, 'tipos') : 0;
    $status_vencimento = (null !== (filter_input(INPUT_POST, 'status_vencimento'))) ? filter_input(INPUT_POST, 'status_vencimento') : 0;
    echo Search::filtroMeusContratos($tipos, $status_vencimento);
}

if ($request == 'info_contrato') {
    $contrato = (null !== (filter_input(INPUT_POST, 'contrato'))) ? filter_input(INPUT_POST, 'contrato') : 0;
    echo Search::infoContrato($contrato);
}
if ($request == 'proximos_vencimentos') {
    Search::proximosVencimentos();
}
if ($request == 'anexo') {
	
    if ($_FILES["image_contract"]["error"] == UPLOAD_ERR_OK) {
        $file = $_FILES["image_contract"]["tmp_name"];

        $caminho = "../uploads/";
        $newName = sha1(date("Y-m-d h:i:s", time()));
        move_uploaded_file($file, $caminho . $newName . ".pdf");
        Update::adicionarAnexo($newName);
    }else{
		Update::adicionarAnexo(null);
	}
}

if ($request == 'alteracao_contrato') {
    $id_contrato = (null !== (filter_input(INPUT_POST, 'id_contrato'))) ? filter_input(INPUT_POST, 'id_contrato') : 0;
    echo Update::UpdateContrato($id_contrato);
}

if ($request == 'update_contrato') {

    $idContrato = (null !== (filter_input(INPUT_POST, 'idcontrato'))) ? filter_input(INPUT_POST, 'idcontrato') : 0;
    $empresa = (null !== (filter_input(INPUT_POST, 'empresa'))) ? filter_input(INPUT_POST, 'empresa') : 0;
    $numero = (null !== (filter_input(INPUT_POST, 'numero'))) ? filter_input(INPUT_POST, 'numero') : 0;
    $vencimento = (null !== (filter_input(INPUT_POST, 'vencimento'))) ? filter_input(INPUT_POST, 'vencimento') : 0;
    $contratante = (null !== (filter_input(INPUT_POST, 'contratante'))) ? filter_input(INPUT_POST, 'contratante') : 0;
    $contratada = (null !== (filter_input(INPUT_POST, 'contratada'))) ? filter_input(INPUT_POST, 'contratada') : 0;
    $descTipoContrato = (null !== (filter_input(INPUT_POST, 'descTipoContrato'))) ? filter_input(INPUT_POST, 'descTipoContrato') : 0;
    $concorrencia = (null !== (filter_input(INPUT_POST, 'concorrencia'))) ? filter_input(INPUT_POST, 'concorrencia') : 0;
    $valorContrato = (null !== (filter_input(INPUT_POST, 'valorContrato'))) ? filter_input(INPUT_POST, 'valorContrato') : 0;
    $qtdParCont = (null !== (filter_input(INPUT_POST, 'qtdParCont'))) ? filter_input(INPUT_POST, 'qtdParCont') : 0;
    $valorParcContrato = (null !== (filter_input(INPUT_POST, 'valorParcContrato'))) ? filter_input(INPUT_POST, 'valorParcContrato') : 0;
    $quantParcPagContr = (null !== (filter_input(INPUT_POST, 'quantParcPagContr'))) ? filter_input(INPUT_POST, 'quantParcPagContr') : 0;
    $dataPagParc = (null !== (filter_input(INPUT_POST, 'dataPagParc'))) ? filter_input(INPUT_POST, 'dataPagParc') : 0;
    $inicioVigencia = (null !== (filter_input(INPUT_POST, 'inicioVigencia'))) ? filter_input(INPUT_POST, 'inicioVigencia') : 0;
    $fimVigencia = (null !== (filter_input(INPUT_POST, 'fimVigencia'))) ? filter_input(INPUT_POST, 'fimVigencia') : 0;
    $descGarantia = (null !== (filter_input(INPUT_POST, 'descGarantia'))) ? filter_input(INPUT_POST, 'descGarantia') : 0;
    $descObjeto = (null !== (filter_input(INPUT_POST, 'descObjeto'))) ? filter_input(INPUT_POST, 'descObjeto') : 0;
    $descObservacao = (null !== (filter_input(INPUT_POST, 'descObservacao'))) ? filter_input(INPUT_POST, 'descObservacao') : 0;

    echo Update::AtualizaContrato($idContrato, $empresa, $numero, $vencimento, $contratante, $contratada, 
            $descTipoContrato, $concorrencia, $valorContrato, $qtdParCont, $valorParcContrato, $quantParcPagContr, 
            $dataPagParc, $inicioVigencia, $fimVigencia, $descGarantia, $descObjeto, $descObservacao);
}

function formateDate($i) {
    $l = explode("/", $i);
    return $l[2] . '-' . $l[1] . '-' . $l[0];
}
