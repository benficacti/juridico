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
            echo 'Falha ao adicionar garantia';
        }
    }

    public function adicionaObjeto($idContratoObjeto, $_status_objeto, $idObjeto) {
        try {
            $sql = 'UPDATE `contrato` SET `ID_OBJETO_CONTRATO`=' . $idObjeto . ' '
                    . 'WHERE ID_CONTRATO = ' . $idContratoObjeto;
            // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                return "00;" . $idContratoObjeto;
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao adicionar objeto';
        }
    }

    public function adicionaObs($idContratoObservacoes, $_status_obs, $idObservacoes) {
        try {
            $sql = 'UPDATE `contrato` SET `ID_OBSERVACOES_EXIGENCIAS_CONTRATO`=' . $idObservacoes . ' '
                    . 'WHERE ID_CONTRATO = ' . $idContratoObservacoes;
            // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                return "00;" . $idContratoObservacoes;
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao obter Log';
        }
    }

    public function AtualizaContrato($idContrato, $empresa, $numero, $vencimento, $contratante, $contratada, $descTipoContrato, $concorrencia, $valorContrato, $qtdParCont, $valorParcContrato, $quantParcPagContr, $dataPagParc, $inicioVigencia, $fimVigencia, $descGarantia, $descObjeto, $descObservacao) {
        echo $numero;

        $idObjeto = Search::BuscaObjeto($idContrato);
        $idGarantia = Search::BuscaGarantia($idContrato);
        $idTipoContrato = Search::BuscaTipoContrato($idContrato);
        $idObser_exigencia = Search::BuscaObs($idContrato);


        $dataPagParcx = Search::otherFormateDateBR($dataPagParc);
        $inicioVigenciax = Search::otherFormateDateBR($inicioVigencia);
        $fimVigenciax = Search::otherFormateDateBR($fimVigencia);
        $vencimentox = Search::otherFormateDateBR($vencimento);



        try {
            $sql = 'UPDATE `contrato` SET `NUMERO_CONTRATO`=' . $numero . ',`CONTRATANTE_CONTRATO` = "' . $contratante . '",'
                    . ' `CONTRATADO_CONTRATO` = "' . $contratada . '", `CONCORRENCIA_CONTRATO` = "' . $concorrencia . '", '
                    . ' `VALOR_CONTRATO`= "' . $valorContrato . '", `QUANTIDADE_PARCELAS_CONTRATO` = ' . $qtdParCont . ', '
                    . ' `VALOR_DAS_PARCELAS_CONTRATO`= "' . $valorParcContrato . '", `QUANTIDADE_PARCELAS_PAGAS_CONTRATO` = ' . $quantParcPagContr . ','
                    . ' `DATA_PAGAMENTO_DAS_PARCELAS_CONTRATO` = "' . $dataPagParcx . '", `INICIO_VIGENCIA_CONTRATO` = "' . $inicioVigenciax . '", '
                    . ' `FINAL_VIGENCIA_CONTRATO` = "' . $fimVigenciax . '", `VENCIMENTO_CONTRATO` = "' . $vencimentox . '" '
                    . ' WHERE ID_CONTRATO = "' . $idContrato . '" ';
            // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                echo 'Contrato Alterado </br>';
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha alterar contrato!';
        }
        /*
          try {
          $sql = 'UPDATE `objeto` SET `DESC_OBJETO`= "' . $descObjeto . '" '
          . ' WHERE ID_OBJETO = "' . $idObjeto . '" ';
          // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
          $sqll = Conexao::getInstance()->prepare($sql);
          if ($sqll->execute()) {
          // echo ' Objeto Alterado';
          }
          } catch (PDOException $e) {
          var_dump($e->getMessage());
          echo 'Falha alterar objeto!';
          }

          try {
          $sql = 'UPDATE `garantia` SET `DESC_GARANTIA`= "' . $descGarantia . '" '
          . ' WHERE ID_GARANTIA = "' . $idGarantia . '" ';
          // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
          $sqll = Conexao::getInstance()->prepare($sql);
          if ($sqll->execute()) {
          // echo ' Garantia Alterado';
          }
          } catch (PDOException $e) {
          var_dump($e->getMessage());
          echo 'Falha ao alterar garantia!';
          }
         */
        try {
            $sql = 'UPDATE `contrato` SET `ID_TIPO_CONTRATO`= "' . $descTipoContrato . '" '
                    . ' WHERE ID_CONTRATO = "' . $idContrato . '" ';
            // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                //  echo ' Tipo_Contrato Alterado';
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao alterar tipo contrato!';
        }
        /*
          try {

          $sql = 'UPDATE `observacoes_exigencias` SET `DESC_OBSER_EXIGEN`= "' . $descObservacao . '" '
          . ' WHERE ID_OBSERVACOES_EXIGENCIAS = ' . $idObser_exigencia . ' ';
          // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
          $sqll = Conexao::getInstance()->prepare($sql);
          if ($sqll->execute()) {
          //  echo ' Observações Alterado1';
          } else {
          //   echo 'Não alterou observação!';
          }
          } catch (PDOException $e) {
          var_dump($e->getMessage());
          echo 'Falha ao alterar observações!';
          } */
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
                        $status_garantia = $dados->ID_STATUS_GARANTIA_CONTRATO;
                        echo '                            
                 <div class="line-finally-contract-update">
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                EMPRESA:               
                                <span><input type="hidden" id="idcontrato" name="idcontrato" value="' . $id_contrato . '">
                                    <input type="hidden" id="change_empresa" name="" value="true"></span>
                            </label>
                            <div class="span-group-img">
                                <div class="figure-pencil" id="div-img-empresa">
                                    <img src="img/pencil.png" class="img-pencil" alt="pencil">
                                </div>                                 
                            </div>
                            <div class="span-group-input" id="span-empresa">
                                <input type="text" id="empresa" class="input-update" name="empresa" value="' . $empresa . '">
                            </div>  
                        </div>                    
                    </div>
                    <div class="line-finally-contract-update">
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                NÚMERO CONTRATO:
                            </label>
                            <input type="hidden" id="change_numero" name="" value="true"></span>
                            <div class="span-group-img">
                                <div class="figure-pencil" id="div-img-numero">
                                    <img src="img/pencil.png" class="img-pencil" alt="pencil">
                                </div>                                 
                            </div>
                            <div class="span-group-input" id="span-numero">
                                <input type="text" class="input-update" id="numero" name="numero" value="' . $numero . '">
                            </div>  
                        </div>                    
                    </div>
                    <div class="line-finally-contract-update">                
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                VENCIMENTO:
                            </label>
                            <input type="hidden" id="change_vencimento" name="" value="true"></span>
                            <div class="span-group-img">
                                <div class="figure-pencil" id="div-img-vencimento">
                                    <img src="img/pencil.png" class="img-pencil" alt="pencil">
                                </div>                                 
                            </div>
                            <div class="span-group-input" id="span-vencimento">
                                <input type="text" id="vencimento" class="input-update" name="vencimento" value="' . Search::otherFormateDateBR($vencimento) . '">

                            </div>

                        </div>
                    </div>
                    <div class="line-finally-contract-update">
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                CONTRATANTE:                                
                            </label>
                            <input type="hidden" id="change_contratante" name="" value="true"></span>
                            <div class="span-group-img">
                                <div class="figure-pencil" id="div-img-contratante">
                                    <img src="img/pencil.png" class="img-pencil" alt="pencil">
                                </div>                                 
                            </div>
                            <div class="span-group-input" id="span-contratante">
                                <input type="text" id="contratante" class="input-update" name="contratante" value="' . $contratante . '">
                            </div>
                        </div>
                    </div>
                    <div class="line-finally-contract-update">                
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                CONTRATADA:                                
                            </label>
                            <input type="hidden" id="change_contratada" name="" value="true"></span>
                            <div class="span-group-img">
                                <div class="figure-pencil" id="div-img-contratada">
                                    <img src="img/pencil.png" class="img-pencil" alt="pencil">
                                </div>                                 
                            </div>
                            <div class="span-group-input" id="span-contratada">
                                <input type="text" id="contratada" class="input-update" name="contratada" value="' . $contratada . '">
                            </div>
                        </div>
                    </div>
                    <div class="line-finally-contract-update">
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                TIPO CONTRATO:                                
                            </label>
                            <input type="hidden" id="change_tipocontrato" name="" value="true"></span>
                            <div class="span-group-img">
                                <div class="figure-pencil"  id="div-img-tipocontrato">
                                    <img src="img/pencil.png" class="img-pencil" alt="pencil">
                                </div>                                 
                            </div>
                            <div class="span-group-input"  id="span-tipocontrato">
                                <select id="tipocontrato" class="input-update">
                                    <option value="0">Selecione o contrato</option>
                                    <option value="1">PÚBLICO</option>
                                    <option value="2">PRIVADO</option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="line-finally-contract-update">                
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                CONCORRÊNCIA:
                            </label>
                            <input type="hidden" id="change_concorrencia" name="" value="true"></span>
                            <div class="span-group-img">
                                <div class="figure-pencil" id="div-img-concorrencia">
                                    <img src="img/pencil.png" class="img-pencil" alt="pencil">
                                </div>                                 
                            </div>
                            <div class="span-group-input"  id="span-concorrencia">
                                <input type="text" id="concorrencia" class="input-update" name="concorrencia" value="' . $concorrencia . '">
                            </div>
                        </div>
                    </div>
                    <div class="line-finally-contract-update">
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                VALOR CONTRATO:
                            </label>
                            <input type="hidden" id="change_valor" name="" value="true"></span>
                            <div class="span-group-img">
                                <div class="figure-pencil" id="div-img-valor">
                                    <img src="img/pencil.png" class="img-pencil" alt="pencil">
                                </div>                                 
                            </div>
                            <div class="span-group-input" id="span-valor">
                                <input type="text" id="valor" class="input-update"  value="' . $valorContrato . '">
                            </div>
                        </div>
                    </div>';
                        if ($possui_parcelas == 1) {
                            ECHO '
                    <div class="line-finally-contract-update">
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                QUANTIDADE DE PARCELAS:
                            </label>
                            <input type="hidden" id="change_qtdparc" name="" value="true"></span>
                            <div class="span-group-img">
                                <div class="figure-pencil" id="div-img-qtdparc">
                                    <img src="img/pencil.png" class="img-pencil" alt="pencil">
                                </div>                                 
                            </div>
                            <div class="span-group-input"  id="span-qtdparc">
                                <input type="text" id="qtdparc" class="input-update" name="qtdparc" value="' . $valorContrato . '">
                            </div>
                        </div>
                    </div>
                    <div class="line-finally-contract-update">
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                VALOR DAS PARCELAS:
                            </label>
                            <input type="hidden" id="change_valparc" name="" value="true"></span>
                            <div class="span-group-img">
                                <div class="figure-pencil" id="div-img-valparc">
                                    <img src="img/pencil.png" class="img-pencil" alt="pencil">
                                </div>                                 
                            </div>
                            <div class="span-group-input" id="span-valparc">
                                <input type="text" id="valparc" class="input-update" name="valorContrato" value="' . $valorContrato . '">
                            </div>
                        </div>
                    </div>
                    <div class="line-finally-contract-update">
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                QTD DE PARCELAS PAGAS:
                            </label>
                            <input type="hidden" id="change_parcpagas" name="" value="true"></span>
                            <div class="span-group-img">
                                <div class="figure-pencil" id="div-img-parcpagas">
                                    <img src="img/pencil.png" class="img-pencil" alt="pencil">
                                </div>                                 
                            </div>
                            <div class="span-group-input" id="span-parcpagas">
                                <input type="text" id="parcpagas" class="input-update" name="valorContrato" value="' . $valorContrato . '">
                            </div>
                        </div>
                    </div>
                    <div class="line-finally-contract-update">
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                DATA 1º PAGAMENTO:
                            </label>
                            <input type="hidden" id="change_datapag" name="" value="true"></span>
                            <div class="span-group-img">
                                <div class="figure-pencil" id="div-img-datapag">
                                    <img src="img/pencil.png" class="img-pencil" alt="pencil">
                                </div>                                 
                            </div>
                            <div class="span-group-input" id="span-datapag">
                                <input type="text" id="datapag" class="input-update" name="valorContrato" value="' . $valorContrato . '">
                            </div>
                        </div>
                    </div>
                    <div class="line-finally-contract-update">
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                ADITAMENTO:
                            </label>
                            <input type="hidden" id="change_aditamento" name="" value="true"></span>
                            <div class="span-group-img">
                                <div class="figure-pencil" id="div-img-aditamento">
                                    <img src="img/pencil.png" class="img-pencil" alt="pencil">
                                </div>                                 
                            </div>
                            <div class="span-group-input" style="background-color:white; border:0px;">
                                <a href="#" class="title-upload">ADITAR CONTRATO</a>
                            </div>
                        </div>
                    </div>
                   ';
                        }

                        echo'  <div class="line-finally-contract-update">
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                INICIO VIGÊNCIA:
                            </label>
                            <input type="hidden" id="change_inivigencia" name="" value="true"></span>
                            <div class="span-group-img">
                                <div class="figure-pencil" id="div-img-inivigencia">
                                    <img src="img/pencil.png" class="img-pencil" alt="pencil">
                                </div>                                 
                            </div>
                            <div class="span-group-input" id="span-inivigencia">
                                <input type="text" id="inivigencia" class="input-update" name="valorContrato" value="' . Search::otherFormateDateBR($inicioVigencia) . '">
                            </div>
                        </div>
                    </div>
                    <div class="line-finally-contract-update">
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                FIM VIGÊNCIA:
                            </label>
                            <input type="hidden" id="change_fimvigencia" name="" value="true"></span>
                            <div class="span-group-img">
                                <div class="figure-pencil" id="div-img-fimvigencia">
                                    <img src="img/pencil.png" class="img-pencil" alt="pencil">
                                </div>                                 
                            </div>
                            <div class="span-group-input" id="span-fimvigencia">
                                <input type="text" id="fimvigencia" class="input-update" name="valorContrato" value="' . Search::otherFormateDateBR($fimVigencia) . '">
                            </div>
                        </div>
                    </div>
                    <div class="line-finally-contract-update">
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                GARANTIA:
                            </label>
                            <div class="span-group-img">
                                <div class="figure-pencil">
                             <!--       <img src="img/pencil.png" class="img-pencil" alt="pencil">-->
                                </div>                                 
                            </div>
                            <div class="span-group-input" style="background-color:white; border:0px;">
                             ';
                        if (($status_garantia) == 1) {
                            echo '<span id="addGarantia" class="title-upload">EDITAR GARANTIA</span>';
                        } else {
                            echo '<span id="addGarantia" class="title-upload">ADICIONAR GARANTIA</span>';
                        }
                        echo'
                                
                            </div>
                        </div>
                    </div>                    
                    <div class="line-finally-contract-update">
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                OBJETO:
                            </label>
                            <div class="span-group-img">
                                <div class="figure-pencil">
                             <!--       <img src="img/pencil.png" class="img-pencil" alt="pencil">-->
                                </div>                                 
                            </div>
                            <div class="span-group-input" style="background-color:white; border:0px;">
                                <span id="addObjeto" class="title-upload">ADICIONAR OBJETO </span>
                            </div>
                        </div>
                    </div>
                    <div class="line-finally-contract-update">
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                OBSERVAÇÃO:
                            </label>
                            <div class="span-group-img">
                                <div class="figure-pencil">
                             <!--       <img src="img/pencil.png" class="img-pencil" alt="pencil">-->
                                </div>                                 
                            </div>
                            <div class="span-group-input" style="background-color:white; border:0px;">
                                <span id="addObs" class="title-upload">VER / EDITAR</span>
                            </div>
                        </div>
                    </div>
                    
                     <div class="line-finally-contract-update">
                        <div class="form-contract-fim-update">
                            <label class="title-info-contract">
                                Anexo:
                            </label>
                            <div class="span-group-img">
                                <div class="figure-pencil">
                             <!--       <img src="img/pencil.png" class="img-pencil" alt="pencil">-->
                                </div>                                 
                            </div>
                            <div class="span-group-input" style="background-color:white; border:0px;">
                                <span id="addAnex" class="title-upload">VER / EDITAR</span>
                            </div>
                        </div>
                    </div>
                ';
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function updateAdicionaGarantia($garantia, $idcontrato) {
        try {
           
            $login = $_SESSION['login'];

            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            $mac = NULL;

            $tipo_log = 10;

            $sql = 'UPDATE `GARANTIA` SET `DESC_GARANTIA` = "' . $garantia . '"'
                    . 'WHERE ID_CONTRATO_GARANTIA = ' . $idcontrato;
            // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {

                $upd = 'UPDATE `CONTRATO` SET `ID_STATUS_GARANTIA_CONTRATO` = 1 WHERE ID_CONTRATO =' . $idcontrato;
                $updd = Conexao::getInstance()->prepare($upd);
                if ($updd->execute()) {

                    $ins = "INSERT INTO `LOG`(`ID_TIPO_LOG`, `DATA_LOG`, `HORA_LOG`, `ID_LOGIN_LOG`, `IP_LOG`, `MAC_ADDRESS_LOG`, `ID_CONTRATO`)"
                            . "VALUES(:ID_TIPO_LOG, CURDATE(), CURTIME(), :ID_LOGIN_LOG, :IP_LOG, :MAC_ADDRESS_LOG, :ID_CONTRATO)";
                    $i_ins = Conexao::getInstance()->prepare($ins);
                    $i_ins->bindParam(':ID_TIPO_LOG', $tipo_log);
                    $i_ins->bindParam(':ID_LOGIN_LOG', $login);
                    $i_ins->bindParam(':IP_LOG', $ip);
                    $i_ins->bindParam(':MAC_ADDRESS_LOG', $mac);
                    $i_ins->bindParam(':ID_CONTRATO', $idcontrato);
                    if ($i_ins->execute()) {
                        echo 'GARANTIA ADICIONADA COM SUCESSO!';
                    }
                }
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao adicionar garantia';
        }
    }

    public function updateAdicionaObservacao($obs, $idcontrato) {
        try {

            $sql = 'UPDATE `OBSERVACOES_EXIGENCIAS` SET `DESC_OBSER_EXIGEN` = "' . $obs . '"'
                    . 'WHERE ID_CONTRATO_OBSERVACOES = ' . $idcontrato;
            // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                echo 'OBSERVACOES ADICIONADO COM SUCESSO!';
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao adicionar garantia';
        }
    }

    public function updateAdicionaObjeto($objeto, $idcontrato) {
        try {

            $sql = 'UPDATE `OBJETO` SET `DESC_OBJETO` = "' . $objeto . '"'
                    . 'WHERE ID_CONTRATO_OBJETO = ' . $idcontrato;
            // $sql = 'CALL buscaLog('.$idLog.')'; // Existe uma Procedure cadastrada
            $sqll = Conexao::getInstance()->prepare($sql);
            if ($sqll->execute()) {
                echo 'OBJETO ADICIONADO COM SUCESSO!';
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao adicionar garantia';
        }
    }

    public function updatelogin($nova_senha, $token) {
        $idUsuario = Search::buscaPrivateToken($token);
        try {
            $upd = 'UPDATE `LOGIN` SET `SENHA_LOGIN` = "' . $nova_senha . '"'
                    . 'WHERE ID_USUARIO_LOGIN = ' . $idUsuario;
            $updd = Conexao::getInstance()->prepare($upd);
            if ($updd->execute()) {
                $updp = 'UPDATE `RECUPERAR_SENHA` SET `ID_STATUS_ALTERAR` = 2 WHERE ID_USUARIO = ' . $idUsuario;
                $uppd = Conexao::getInstance()->prepare($updp);
                if ($uppd->execute()) {
                    return '00';
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function desativarRec($idUsuario) {
        try {
            $upd = 'UPDATE `RECUPERAR_SENHA` SET `ID_STATUS_ALTERAR` = 2 WHERE ID_USUARIO = ' . $idUsuario;
            $updd = Conexao::getInstance()->prepare($upd);
            if ($updd->execute()) {
                return true;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function excluirAnexo($anexo) {
        $null = null;
        try {
            $upd = 'UPDATE `CONTRATO` SET `URL_IMAGEM_CONTRATO` = "' . $null . '" WHERE URL_IMAGEM_CONTRATO ="' . $anexo . '" ';
            $updd = Conexao::getInstance()->prepare($upd);
            if ($updd->execute()) {
                return '00';
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function insert_id_no_contrato($idAditamento, $idContrado) {
        
        
         try {
            $upd = 'UPDATE `CONTRATO` SET `ID_ADITAMENTO_CONTRATO` = "' . $idAditamento . '" WHERE ID_CONTRATO ="' . $idContrado . '" ';
            $updd = Conexao::getInstance()->prepare($upd);
            if ($updd->execute()) {
                return '00';
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
