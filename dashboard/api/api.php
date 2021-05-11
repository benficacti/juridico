<?php

include '../persistencia/Conexao.php';
include '../models/contrato.php';
include '../models/garantia.php';
include '../models/objeto.php';
include '../models/observacoesExigencias.php';
include '../models/setor.php';
include '../models/login.php';
include '../util/Util.class.php';
include '../models/usuario.php';
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
    $_possuiParcela = (null !== (filter_input(INPUT_POST, 'possui_parcela'))) ? filter_input(INPUT_POST, 'possui_parcela') : null;
    $_empresaContrato = (null !== (filter_input(INPUT_POST, 'empresa_contrato'))) ? filter_input(INPUT_POST, 'empresa_contrato') : null;
    $_idAditamentoContrato = (null !== (filter_input(INPUT_POST, 'id_contr_aditado'))) ? filter_input(INPUT_POST, 'id_contr_aditado') : null;
    $_idSetorContrato = (null !== (filter_input(INPUT_POST, 'id_setor'))) ? filter_input(INPUT_POST, 'id_setor') : null;

    
    if ($_possuiParcela == 1) {
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


    if ($_numeroContrato !== "") {

        // $contrato = new contrato($_numeroContrato, $_contratanteContrato, $_contratadoContrato, $_concorrenciaContrato, 1, $_valorContrato, $_quantidadeParcelasContrato, $_valorDasParcelasContrato, $_quantidadeParcelasPagasContrato, $_dataPagamentoDasParcelasContrato, $_valorTotalPagoContrato, $_inicioVigenciaContrato, $_finalVigenciaContrato, $_vencimentoContrato, 1, $_idAditamentoContrato, null, null, $_idTipoContrato, null, 1, null, $_empresaContrato, $_possuiParcela, null);
        $contrato = new contrato($_numeroContrato, $_contratanteContrato, $_contratadoContrato, $_concorrenciaContrato, 1, $_valorContrato, $_quantidadeParcelasContrato, $_valorDasParcelasContrato, $_quantidadeParcelasPagasContrato, $_dataPagamentoDasParcelasContrato, $_valorTotalPagoContrato, $_inicioVigenciaContrato, $_finalVigenciaContrato, $_vencimentoContrato, 1, $_idAditamentoContrato, null, null, $_idTipoContrato, null, 1, null, $_empresaContrato, $_possuiParcela, 1, $_idSetorContrato);
        Insert::CadastraContrato($contrato);
        echo $_SESSION['contrato'];
    } else {
        $_numeroContrato = null;
        //$contrato = new contrato($_numeroContrato, $_contratanteContrato, $_contratadoContrato, $_concorrenciaContrato, 1, $_valorContrato, $_quantidadeParcelasContrato, $_valorDasParcelasContrato, $_quantidadeParcelasPagasContrato, $_dataPagamentoDasParcelasContrato, $_valorTotalPagoContrato, $_inicioVigenciaContrato, $_finalVigenciaContrato, $_vencimentoContrato, 1, $_idAditamentoContrato, null, null, $_idTipoContrato, null, 1, null, $_empresaContrato, $_possuiParcela, null);
        $contrato = new contrato($_numeroContrato, $_contratanteContrato, $_contratadoContrato, $_concorrenciaContrato, 1, $_valorContrato, $_quantidadeParcelasContrato, $_valorDasParcelasContrato, $_quantidadeParcelasPagasContrato, $_dataPagamentoDasParcelasContrato, $_valorTotalPagoContrato, $_inicioVigenciaContrato, $_finalVigenciaContrato, $_vencimentoContrato, 1, $_idAditamentoContrato, null, null, $_idTipoContrato, null, 1, null, $_empresaContrato, $_possuiParcela, 1, $_idSetorContrato);
        Insert::CadastraContrato($contrato);
        echo $_SESSION['contrato'];
    }
}



if ($request == "adicionar_garantia") {
    sleep(1);
    $_idContratoGarantia = (null !== (filter_input(INPUT_POST, 'idcontrato'))) ? filter_input(INPUT_POST, 'idcontrato') : null;
    $_statusGarantia = (null !== (filter_input(INPUT_POST, 'status_garantia'))) ? filter_input(INPUT_POST, 'status_garantia') : null;
    $descGarantia = (null !== (filter_input(INPUT_POST, 'garantia'))) ? filter_input(INPUT_POST, 'garantia') : null;
    $garantia = new garantia($descGarantia);
    $idGarantia = Insert::CadastraGarantia($garantia, $_idContratoGarantia);
    if ($idGarantia != null) {
        echo Update::adicionaGarantia($_idContratoGarantia, $_statusGarantia, $idGarantia);
    }
}


if ($request == 'adicionar_objeto') {
    sleep(1);
    $idContratoObjeto = (null !== (filter_input(INPUT_POST, 'idcontrato'))) ? filter_input(INPUT_POST, 'idcontrato') : null;
    $_status_objeto = (null !== (filter_input(INPUT_POST, 'status_objeto'))) ? filter_input(INPUT_POST, 'status_objeto') : null;
    $descObjeto = (null !== (filter_input(INPUT_POST, 'objeto'))) ? filter_input(INPUT_POST, 'objeto') : null;
    $objeto = new objeto($descObjeto, $idContratoObjeto);
    $idObjeto = Insert::CadastraObjeto($objeto);
    if ($idObjeto != null) {
        echo Update::adicionaObjeto($idContratoObjeto, $_status_objeto, $idObjeto);
    }
}


if ($request == 'adicionar_obs') {
    sleep(1);
    $idContratoObservacoes = (null !== (filter_input(INPUT_POST, 'idcontrato'))) ? filter_input(INPUT_POST, 'idcontrato') : null;
    $_status_obs = (null !== (filter_input(INPUT_POST, 'status_obs'))) ? filter_input(INPUT_POST, 'status_obs') : null;
    $descObserExigen = (null !== (filter_input(INPUT_POST, 'obs'))) ? filter_input(INPUT_POST, 'obs') : null;
    $obs = new observacoesExigencias($descObserExigen, $idContratoObservacoes);
    $idObservacoes = Insert::CadastraObs($obs);
    if ($idObservacoes != null) {
        echo Update::adicionaObs($idContratoObservacoes, $_status_obs, $idObservacoes);
    }
}

if (($request == 'login') && ($request !== 0)) {
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
    $nContrato = (null !== (filter_input(INPUT_POST, 'nContrato'))) ? filter_input(INPUT_POST, 'nContrato') : 0;
    $nContratado = (null !== (filter_input(INPUT_POST, 'nContratado'))) ? filter_input(INPUT_POST, 'nContratado') : 0;
    $nContratante = (null !== (filter_input(INPUT_POST, 'nContratante'))) ? filter_input(INPUT_POST, 'nContratante') : 0;

    echo Search::filtroMeusContratos($tipos, $status_vencimento, $nContrato, $nContratado, $nContratante);
}

if ($request == 'info_contrato') {
    $contrato = (null !== (filter_input(INPUT_POST, 'contrato'))) ? filter_input(INPUT_POST, 'contrato') : 0;
    echo Search::infoContrato($contrato);
}
if ($request == 'proximos_vencimentos') {
    
    $vencimento = (null !== (filter_input(INPUT_POST, 'vencimento'))) ? filter_input(INPUT_POST, 'vencimento') : 0;
    $busca = (null !== (filter_input(INPUT_POST, 'busca'))) ? filter_input(INPUT_POST, 'busca') : 0;
    echo Search::proximosVencimentos($vencimento, $busca);
}

if ($request == 'listarAlert') {
    
    echo Search::listarAlertas();
}

if ($request == 'callApiEditAlert') {
    
    $emailAlert = (null !== (filter_input(INPUT_POST, 'emailAlert'))) ? filter_input(INPUT_POST, 'emailAlert') : 0;
    $diaAlert = (null !== (filter_input(INPUT_POST, 'diaAlert'))) ? filter_input(INPUT_POST, 'diaAlert') : 0;
    $diaQtdAlert = (null !== (filter_input(INPUT_POST, 'diaQtdAlert'))) ? filter_input(INPUT_POST, 'diaQtdAlert') : 0;
    echo Update::updateAlert($emailAlert, $diaAlert, $diaQtdAlert);
}

if ($request == 'callApiRegisterAlert') {
    
    $emailAlert = (null !== (filter_input(INPUT_POST, 'emailAlert'))) ? filter_input(INPUT_POST, 'emailAlert') : 0;
    $diaAlert = (null !== (filter_input(INPUT_POST, 'diaAlert'))) ? filter_input(INPUT_POST, 'diaAlert') : 0;
    $diaQtdAlert = (null !== (filter_input(INPUT_POST, 'diaQtdAlert'))) ? filter_input(INPUT_POST, 'diaQtdAlert') : 0;
    //echo Search::cadastrarAlerta($emailAlert, $diaAlert, $diaQtdAlert);
    echo Insert::cadastrarAlert($emailAlert, $diaAlert, $diaQtdAlert);
}

if ($request == 'contratosAlerta') {
    
    echo Search::panelAlert();
}

if ($request == 'proximos_vencimentos_por_dia') {
    
    $dias = (null !== (filter_input(INPUT_POST, 'dias'))) ? filter_input(INPUT_POST, 'dias') : 0;
    echo Search::proximos_vencimentos_por_dia($dias);
}

if ($request == 'contratos_por_periodo') {
    
    $dataIni = (null !== (filter_input(INPUT_POST, 'DataIni'))) ? filter_input(INPUT_POST, 'DataIni') : 0;
    $dataFim = (null !== (filter_input(INPUT_POST, 'DataFim'))) ? filter_input(INPUT_POST, 'DataFim') : 0;
    echo Search::contratos_por_periodo($dataIni, $dataFim);
}

if ($request == 'anexo') {
    if (isset($_FILES["image_contract"])) {
        if ($_FILES["image_contract"]["error"] == UPLOAD_ERR_OK) {
            $file = $_FILES["image_contract"]["tmp_name"];

            $caminho = "../uploads/";
            $newName = sha1(date("Y-m-d h:i:s", time()));
            move_uploaded_file($file, $caminho . $newName . ".pdf");
            Update::adicionarAnexo($newName);
        } else {
            Update::adicionarAnexo(null);
        }
    } else {
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
    $numero = (null !== (filter_input(INPUT_POST, 'numero'))) ? filter_input(INPUT_POST, 'numero') : null;
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
    sleep(1);
    echo Update::AtualizaContrato($idContrato, $empresa, $numero, $vencimento, $contratante, $contratada, $descTipoContrato, $concorrencia, $valorContrato, $qtdParCont, $valorParcContrato, $quantParcPagContr, $dataPagParc, $inicioVigencia, $fimVigencia); //, $descGarantia, $descObjeto, $descObservacao);
}

function formateDate($i) {
    $l = explode("/", $i);
    return $l[2] . '-' . $l[1] . '-' . $l[0];
}

if ($request == 'addGarantia') {
    $addGarantia = (null !== (filter_input(INPUT_POST, 'addGarantia'))) ? filter_input(INPUT_POST, 'addGarantia') : 0;
    $_SESSION['contrato'] = $addGarantia;
    if (!empty($addGarantia)) {
        if (isset($addGarantia)) {
            echo '01';
        }
    }
}



if ($request == 'addObjeto') {
    $addObjeto = (null !== (filter_input(INPUT_POST, 'objeto'))) ? filter_input(INPUT_POST, 'objeto') : 0;
    $_SESSION['contrato'] = $addObjeto;
    if (!empty($addObjeto)) {
        if (isset($addObjeto)) {
            echo '01';
        }
    }
}

if ($request == 'addAnexo') {
    $addAnexo = (null !== (filter_input(INPUT_POST, 'anexo'))) ? filter_input(INPUT_POST, 'anexo') : 0;
    $_SESSION['contrato'] = $addAnexo;
    if (!empty($addAnexo)) {
        if (isset($addAnexo)) {
            echo '01';
        }
    }
}

if ($request == 'addGarantiaUpdate') {
    $garantia = (null !== (filter_input(INPUT_POST, 'garantia'))) ? filter_input(INPUT_POST, 'garantia') : 0;
    $idcontrato = (null !== (filter_input(INPUT_POST, 'idcontrato'))) ? filter_input(INPUT_POST, 'idcontrato') : 0;

    echo Update::updateAdicionaGarantia($garantia, $idcontrato);
}


if ($request == 'addObservacaoUpdate') {
    $obs = (null !== (filter_input(INPUT_POST, 'obs'))) ? filter_input(INPUT_POST, 'obs') : 0;
    $idcontrato = (null !== (filter_input(INPUT_POST, 'idcontrato'))) ? filter_input(INPUT_POST, 'idcontrato') : 0;

    echo Update::updateAdicionaObservacao($obs, $idcontrato);
}

if ($request == 'addObjetoUpdate') {
    $objeto = (null !== (filter_input(INPUT_POST, 'objeto'))) ? filter_input(INPUT_POST, 'objeto') : 0;
    $idcontrato = (null !== (filter_input(INPUT_POST, 'idcontrato'))) ? filter_input(INPUT_POST, 'idcontrato') : 0;

    echo Update::updateAdicionaObjeto($objeto, $idcontrato);
}

if ($request == 'addObservacao') {
    $addObs = (null !== (filter_input(INPUT_POST, 'addObs'))) ? filter_input(INPUT_POST, 'addObs') : 0;
    $_SESSION['contrato'] = $addObs;
    if (!empty($addObs)) {
        if (isset($addObs)) {
            echo '01';
        }
    }
}


if ($request == 'excluir_contrato') {
    $excluir_contr = (null !== (filter_input(INPUT_POST, 'excluir_contr'))) ? filter_input(INPUT_POST, 'excluir_contr') : null;
    if (!empty($excluir_contr)) {
        if (isset($excluir_contr)) {
            echo $update_status_contrato = Update::alterarStatusContrato($excluir_contr);
        }
    }
}

if ($request == 'alter_setor') {
    
    $idcontrato = (null !== (filter_input(INPUT_POST, 'idcontrato'))) ? filter_input(INPUT_POST, 'idcontrato') : null;
    $descSetor = (null !== (filter_input(INPUT_POST, 'descSetor'))) ? filter_input(INPUT_POST, 'descSetor') : null;
    if (!empty($idcontrato)) {
        if (isset($idcontrato)) {
            echo $update = Update::updatesetor($idcontrato, $descSetor);
        }
    }
}

if ($request == 'enviar') {
    $email = (null !== (filter_input(INPUT_POST, 'email'))) ? filter_input(INPUT_POST, 'email') : 0;

    echo $token = Search::buscaEmailUsuario($email);
}


if ($request == 'reset_senha') {
    $esqueci_senha = (null !== (filter_input(INPUT_POST, 'esqueci_senha'))) ? filter_input(INPUT_POST, 'esqueci_senha') : 0;
    if (!empty($esqueci_senha)) {
        if (isset($esqueci_senha)) {
            echo '1';
        }
    }
}

if ($request == 'contra_senha') {
    $nova_senha = (null !== (filter_input(INPUT_POST, 'nova_senha'))) ? filter_input(INPUT_POST, 'nova_senha') : 0;
    $token = (null !== (filter_input(INPUT_POST, 'token'))) ? filter_input(INPUT_POST, 'token') : 0;

    echo Update::updatelogin($nova_senha, $token);
}

if ($request == 'link_temporario') {
    $nova_senha = (null !== (filter_input(INPUT_POST, 'nova_senha'))) ? filter_input(INPUT_POST, 'nova_senha') : 0;
    $email = (null !== (filter_input(INPUT_POST, 'email'))) ? filter_input(INPUT_POST, 'email') : 0;

    echo Update::updateLink($nova_senha, $email);
}

if ($request == 'excluir_anexo') {
    $anexo = (null !== (filter_input(INPUT_POST, 'anexo'))) ? filter_input(INPUT_POST, 'anexo') : 0;

    echo Update::excluirAnexo($anexo);
}


if ($request == 'aditamento_contrato') {
    $aditamento = (null !== (filter_input(INPUT_POST, 'aditamento'))) ? filter_input(INPUT_POST, 'aditamento') : 0;

    echo Insert::Aditamento_contrato($aditamento);
}

if ($request == 'cadastro_novo_usuario') {
    $_nomeUsuario = (null !== (filter_input(INPUT_POST, 'usuario'))) ? filter_input(INPUT_POST, 'usuario') : null;
    $_emailUsuario = (null !== (filter_input(INPUT_POST, 'email'))) ? filter_input(INPUT_POST, 'email') : null;
    $descSetor = (null !== (filter_input(INPUT_POST, 'setor'))) ? filter_input(INPUT_POST, 'setor') : null;
    $_usuarioLogin = (null !== (filter_input(INPUT_POST, 'login'))) ? filter_input(INPUT_POST, 'login') : null;
    $_idTipoAcesso = (null !== (filter_input(INPUT_POST, 'perfil'))) ? filter_input(INPUT_POST, 'perfil') : null;

    $idSetorCadastrar = "";

    $verificarEmailExiste = Search::verificarEmailExiste($_emailUsuario);

    if ($verificarEmailExiste > 0) {
        echo '01';
    } else {


        $setor = new setor($descSetor);

        $verificarSetorExiste = Search::verificaSetorExiste($setor);

        if ($verificarSetorExiste < 1) {

            $idSetorCadastrar = Insert::cadastrarSetor($setor);
        } else {
            $idSetorCadastrar = Search::idSetor($descSetor);
        }



        $usuario = new usuario($_nomeUsuario, $_emailUsuario, $idSetorCadastrar);

        $_idUsuarioLogin = Insert::cadastrarUsuario($usuario);



        $_senhaLogin = Util::geradorSenha();

        $login = new login($_idUsuarioLogin, $_usuarioLogin, $_senhaLogin, $_idTipoAcesso);

        echo $cadastrarLogin = Insert::cadastrarLogin($login);
    }
}
