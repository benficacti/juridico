<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Updade
 *
 * @author USUARIO
 */
class Update {

    public function adicionaGarantia($_idContratoGarantia, $idStatusGarantia, $idGarantia) {
        try {
            $sql = 'UPDATE `contrato` SET `ID_STATUS_GARANTIA_CONTRATO`=' . $idStatusGarantia . ',`ID_GARANTIA_CONTRATO`=' . $idGarantia . ' '
                    . 'WHERE ID_CONTRATO = ' . $_idContratoGarantia;
            // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                return "00;" . $_idContratoGarantia;
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao obter Log';
        }
    }

    public function adicionaObjeto($_idContratoObjeto, $idStatusObjeto, $idObjeto) {
        try {
            $sql = 'UPDATE `contrato` SET `ID_OBJETO_CONTRATO`=' . $idObjeto . ' '
                    . 'WHERE ID_CONTRATO = ' . $_idContratoObjeto;
            // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                return "00;" . $_idContratoObjeto;
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao obter Log';
        }
    }

    public function adicionaObs($_idContratoObs, $idStatusObs, $idObs) {
        try {
            $sql = 'UPDATE `contrato` SET `ID_OBSERVACOES_EXIGENCIAS_CONTRATO`=' . $idObs . ' '
                    . 'WHERE ID_CONTRATO = ' . $_idContratoObs;
            // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                return "00;" . $_idContratoObs;
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao obter Log';
        }
    }

    public function adicionarAnexo($nomeUrl) {
        try {
            $id = $_SESSION['contrato'];
            $sql = 'UPDATE `contrato` SET `URL_IMAGEM_CONTRATO`= "' . $nomeUrl . '" WHERE ID_CONTRATO = ' . $id;
            // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                echo "00;";
            } else {
                echo "01";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo 'Falha ao obter Log';
        }
    }

    public function UpdateContrato($id_contrato) {
        try {
            $mes = 1;

            $sql = 'SELECT * FROM CONTRATO '
                    . ' INNER JOIN TIPO_CONTRATO ON contrato.ID_TIPO_CONTRATO = TIPO_CONTRATO.ID_TIPO_CONTRATO'
                    . ' INNER JOIN EMPRESA_CONTRATO ON contrato.ID_EMPRESA_CONTRATO = empresa_contrato.ID_EMPRESA_CONTRATO'
                    . ' INNER JOIN POSSUI_PARCELA ON contrato.ID_POSSUI_PARCELA_CONTRATO = possui_parcela.ID_POSSUI_PARCELA'
                    . ' INNER JOIN OBJETO ON contrato.ID_OBJETO_CONTRATO = objeto.ID_OBJETO'
                    . ' INNER JOIN GARANTIA ON contrato.ID_GARANTIA_CONTRATO = garantia.ID_GARANTIA'
                    . ' INNER JOIN OBSERVACOES_EXIGENCIAS ON contrato.ID_OBSERVACOES_EXIGENCIAS_CONTRATO = OBSERVACOES_EXIGENCIAS.ID_OBSERVACOES_EXIGENCIAS'
                    . ' WHERE ID_LOGIN_CONTRATO = ' . $_SESSION['login'] . ' AND ID_CONTRATO = ' . $id_contrato;
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCount();
                if ($count > 0) {
                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        $empresa = $dados->DESC_EMPRESA_CONTRATO;
                        $vencimento = $dados->VENCIMENTO_CONTRATO;
                        $numero = $dados->NUMERO_CONTRATO;
                        $contratante = $dados->CONTRATANTE_CONTRATO;
                        $contratada = $dados->CONTRATADO_CONTRATO;
                        $concorrencia = $dados->CONCORRENCIA_CONTRATO;
                        $descTipoContrato = $dados->DESC_TIPO_CONTRATO;
                        $valorContrato = $dados->VALOR_CONTRATO;
                        $quantidadeParcelaContrato = $dados->QUANTIDADE_PARCELAS_CONTRATO;
                        $quantidadeParcelasPagasContrato = $dados->QUANTIDADE_PARCELAS_PAGAS_CONTRATO;
                        $valorParcelasContrato = $dados->VALOR_DAS_PARCELAS_CONTRATO;
                        $inicioVigencia = $dados->INICIO_VIGENCIA_CONTRATO;
                        $fimVigencia = $dados->FINAL_VIGENCIA_CONTRATO;
                        $dataPagamentoParcela = $dados->DATA_PAGAMENTO_DAS_PARCELAS_CONTRATO;
                        $descObjeto = $dados->DESC_OBJETO;
                        $descGarantia = $dados->DESC_GARANTIA;
                        $descObservacao = $dados->DESC_OBSER_EXIGEN;
                        $possui_parcelas = $dados->ID_POSSUI_PARCELA_CONTRATO;
                        echo ' 
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            EMPRESA:               
                                <span><input type="text" id="empresa" name="empresa" value="' . $empresa . '"></span>
                        </label>
                    </div>                    
                </div>
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            NÚMERO CONTRATO:
                                <span><input type="text" id="numero" name="numero" value="' . $numero . '"></span>  
                        </label>
                    </div>                    
                </div>
                <div class="line-finally-contract">                
                     <div class="form-contract-fim">
                        <label class="title-info-contract">
                            VENCIMENTO:
                            <span><input type="text" id="vencimento" name="vencimento" value="' . Search::formateDateBR($vencimento) . '"></span>
                        </label>
                    </div>
                </div>
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            CONTRATANTE:
                            <span><input type="text" id="concorrencia" name="concorrencia" value="' . $contratante . '"></span>
                        </label>
                    </div>
                </div>
                <div class="line-finally-contract">                
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            CONTRATADA:
                           <span><input type="text" id="contratada" name="contratada" value="' . $contratada . '"></span>
                        </label>
                    </div>
                </div>
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            TIPO CONTRATO:
                            <span><input type="text" id="descTipoContrato" name="descTipoContrato" value="' . $descTipoContrato . '"></span>
                        </label>
                    </div>

                   
                </div>
                 <div class="line-finally-contract">                
                   <div class="form-contract-fim">
                        <label class="title-info-contract">
                            CONCORRÊNCIA:
                           <span><input type="text" id="concorrencia" name="concorrencia" value="' . $concorrencia . '"></span> 
                        </label>
                    </div>
                </div>
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            VALOR CONTRATO:
                            <span><input type="text" id="valorContrato" name="valorContrato" value="' . $valorContrato . '"></span>
                        </label>
                    </div>
                </div>';
                        if ($possui_parcelas == 1) {
                            ECHO '<div class="line-finally-contract">                      
                      <div class="form-contract-fim">
                        <label class="title-info-contract">
                            QUANTIDADE DE PARCELAS:
                            <span><input type="text" id="qtdParCont" name="qtdParCont" value="' . $quantidadeParcelaContrato . '"></span>
                        </label>
                    </div>
                </div>
                   <div class="line-finally-contract">                
                      <div class="form-contract-fim">
                        <label class="title-info-contract">
                            VALOR DAS PARCELAS:
                            <span><input type="text" id="valorContrato" name="valorContrato" value="' . $valorParcelasContrato . '"></span>
                        </label>
                    </div>
                </div>
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            QUANTIDADE DE PARCELAS PAGAS:
                            <span><input type="text" id="quantParcPagContr" name="quantParcPagContr" value="' . $quantidadeParcelasPagasContrato . '"></span>
                        </label>
                    </div>
                </div>                
                <div class="line-finally-contract">                
                      <div class="form-contract-fim">
                        <label class="title-info-contract">
                            DATA PRIMEIRO PAGAMENTO:
                            <span><input type="text" id="dataPagParc" name="dataPagParc" value="' . Search::formateDateBR($dataPagamentoParcela) . '"></span>
                        </label>
                    </div>
                </div>
                <div class="line-finally-contract">                
                     <div class="form-contract-fim">
                        <label class="title-info-contract">
                            ADITAMENTO:
                            <span>NÃO</span>
                        </label>
                    </div>
                </div>';
                        }

                        echo' <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            INICIO VIGÊNCIA:
                            <span><input type="text" id="inicioVigencia" name="inicioVigencia" value="' . Search::formateDateBR($inicioVigencia) . '"></span>
                        </label>
                    </div>
                    
                </div>
                <div class="line-finally-contract">                
                     <div class="form-contract-fim">
                        <label class="title-info-contract">
                            FIM VIGÊNCIA:
                            <span><input type="text" id="fimVigencia" name="fimVigencia" value="' . Search::formateDateBR($fimVigencia) . '"></span>
                        </label>
                    </div>
                </div>
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <p class="title-info-contract">
                            GARANTIA:
                            <span><input type="text" id="descGarantia" name="descGarantia" value="' . $descGarantia . '"></span>
                        </p>
                    </div>
                </div>
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            OBJETO:
                            <span><input type="text" id="descObjeto" name="descObjeto" value="' . $descObjeto . '"></span>
                        </label>
                    </div>
                </div>
                <div class="line-finally-contract">
                    <div class="form-contract-fim">
                        <label class="title-info-contract">
                            OBSERVAÇÃO:
                            <span><input type="text" id="descObservacao" name="descObservacao" value="' . $descObservacao . '"></span>
                        </label>
                    </div>
                </div>';
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
