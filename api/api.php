<?php

include '../negocio/contrato.php';
include '../classes/Insert.class.php';

$request = (null !== (filter_input(INPUT_GET, 'request'))) ? filter_input(INPUT_GET, 'request') : 0;


if (($request == "cadastro_contrato") && ($request !== 0)) {
    //sleep(1);
  
  /*
    if (filter_input(INPUT_GET,'rd_publico' == 'rd_publico')) {
            $_idTipoContrato = (null !== (filter_input(INPUT_GET, 'rd_publico'))) ? filter_input(INPUT_GET, 'rd_publico') : null;

    }elseif(filter_input(INPUT_GET,'rd_privado' == 'rd_privado')){
         $_idTipoContrato = (null !== (filter_input(INPUT_GET, 'rd_privado'))) ? filter_input(INPUT_GET, 'rd_privado') : null;
    }
     */       
           
            
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
 
    //$_idLoginContrato = (null !== (filter_input(INPUT_POST, 'numero'))) ? filter_input(INPUT_POST, 'numero') : null;

    //$_idTipoContrato = (null !== (filter_input(INPUT_POST, 'numero'))) ? filter_input(INPUT_POST, 'numero') : null;
   
    $_idTipoContrato = 1;
    
    
    if ($_numeroContrato !== null) {
        $contrato = new contrato($_numeroContrato, $_contratanteContrato, $_contratadoContrato,
                $_concorrenciaContrato, $_valorContrato, $_quantidadeParcelasContrato, $_valorDasParcelasContrato,
                $_quantidadeParcelasPagasContrato, $_dataPagamentoDasParcelasContrato, $_valorTotalPagoContrato,
                $_inicioVigenciaContrato, $_finalVigenciaContrato, $_vencimentoContrato,$_idTipoContrato);
        Insert::CadastraContrato($contrato);
        

    }
}

if (($request == 'update_cadastro') && ($request != 0)) {
    
}



