<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
} else {
    
}
?>
<!DOCTYPE html>
<html lang="pt-br"> 
    <head>    
        <meta charset="UTF-8"/>
        <meta name="description" content="Gestão Eletronico de Contrato">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="icon" href="favicon.png">   
        <title>GEC - Gestão Eletronico de Contrato</title>
        <!-- CSS -->
        <link rel="stylesheet" href="css/css.css"/>
        <script type="text/javascript" src="js/jquery-1.6.4.js"></script>        
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>
        <script src="js/jquery.min.js"></script>
    </head>
    <body>
        <!-- Conteúdo -->
        <header>
            <nav class="top-nav">
                <div class="logo-nav">
                    <img src="img/logo_benfica.png"/>
                </div>
                <div class="dados-user-nav">
                    <div class="dados-user">
                        <?php include 'includes/topbar.php'; ?>
                    </div>
                </div>
            </nav>
        </header>
        <div class="barra-lateral">
            <nav>
                <div class="barra-lateral-nav">
                    <?php include('includes/menu.php'); ?>
                </div>
            </nav>
        </div>
        <!-- BOX CONTEUDO DA PAG -->

        <div class="box-conteudo">
            <input type="hidden" id="idcontrato" value="<?php echo $_GET['c'] ?>">
            <article class="article-contract-fim" data-aos="zoom-in" >
                <header class="header-contract-fim">
                    <?php
                    switch ($_GET['d']) {
                        case 1:
                            echo ' <label class="title-contract-fim"><a href="meus_contratos.php">Voltar ao Meus contratos</a></label>';
                            break;
                        case 2:
                            echo'<label class="title-contract-fim"><a href="painel.php">Voltar ao Painel</a></label>';
                            break;
                        default:
                            break;
                    }
                    ?>
                </header>
                <div id="result">
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
                                <input type="text" id="vencimento" class="input-update" name="vencimento" value="' . Search::formateDateBR($vencimento) . '">

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
                            <div class="span-group-input"  id="span-tipocontrato"><select id="tipocontrato" class="input-update">
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
                    </div>
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
                    <div class="line-finally-contract-update">
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
                                <input type="text" id="inivigencia" class="input-update" name="valorContrato" value="' . $valorContrato . '">
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
                                <input type="text" id="fimvigencia" class="input-update" name="valorContrato" value="' . $valorContrato . '">
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
                                <a href="#" class="title-upload">ADICIONAR GARANTIA</a>
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
                                <a href="#" class="title-upload">ADICIONAR OBJETO</a>
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
                                <a href="#" class="title-upload">VER / EDITAR</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

        </div>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script type="text/javascript">

            $(document).ready(function () {
                $('#item_painel_contrato').addClass('item-active');
                /*BUTTON EMPRESA*/
                $("#div-img-empresa").click(function () {
                    changeFunc('empresa');
                });
                /*BUTTON NUMERO*/
                $("#div-img-numero").click(function () {
                    changeFunc('numero');
                });
                /*BUTTON VENCIMENTO*/
                $("#div-img-vencimento").click(function () {
                    changeFunc('vencimento');
                });
                /*BUTTON CONTRATANTE*/
                $("#div-img-contratante").click(function () {
                    changeFunc('contratante');
                });
                /*BUTTON CONTRATADA*/
                $("#div-img-contratada").click(function () {
                    changeFunc('contratada');
                });
                /*BUTTON TIPO CONTRATO*/
                $("#div-img-tipocontrato").click(function () {
                    changeFunc('tipocontrato');
                });
                /*BUTTON VALOR*/
                $("#div-img-valor").click(function () {
                    changeFunc('valor');
                });
                /*BUTTON CONCORRÊNCIA*/
                $("#div-img-concorrencia").click(function () {
                    changeFunc('concorrencia');
                });
                /*BUTTON QUANTIDADE PARCELAS*/
                $("#div-img-qtdparc").click(function () {
                    changeFunc('qtdparc');
                });
                /*BUTTON VALOR PARCELAS*/
                $("#div-img-valparc").click(function () {
                    changeFunc('valparc');
                });
                /*BUTTON PARCELAS PAGAS*/
                $("#div-img-parcpagas").click(function () {
                    changeFunc('parcpagas');
                });
                /*BUTTON DATA PAGAMENTO PARCELAS*/
                $("#div-img-datapag").click(function () {
                    changeFunc('datapag');
                });
                /*BUTTON DATA INICIO VIGÊNCIA*/
                $("#div-img-inivigencia").click(function () {
                    changeFunc('inivigencia');
                });
                /*BUTTON DATA FIM VIGÊNCIA*/
                $("#div-img-fimvigencia").click(function () {
                    changeFunc('fimvigencia');
                });

                function changeFunc(input) {
                    var change = document.getElementById("change_" + input).value;
                    if (change === 'true') {
                        $("#span-" + input).addClass("span-update-active");
                        $("#" + input).addClass("input-update-active");
                        $("#" + input).attr('readonly', false);
                        document.getElementById('div-img-' + input).innerHTML = '<img src="img/save.png" class="img-pencil" alt="check">';
                        document.getElementById("change_" + input).value = false;
                    } else {
                        document.getElementById('div-img-' + input).innerHTML = '<img src="img/loading.gif" class="img-pencil" alt="gif">';
                        setTimeout(function () {
                            $("#span-" + input).removeClass("span-update-active");
                            $("#" + input).removeClass("input-update-active");
                            $("#" + input).attr('readonly', true);
                            document.getElementById("change_" + input).value = true;
                            document.getElementById('div-img-' + input).innerHTML = '<img src="img/pencil.png" class="img-pencil" alt="pencil">';
                        }, 2000);

                    }

                    /*  if (active) {
                     $("#span-" + input).addClass("span-update-active");
                     $("#" + input).addClass("input-update-active");
                     $("#" + input).attr('readonly', false);
                     document.getElementById('div-img-' + input).innerHTML = '<img src="img/pencil.png" class="img-pencil" alt="check" onclick="('."'1','empresa'".'")>';
                     } else {
                     $("#span-" + input).removeClass("span-update-active");
                     $("#" + input).removeClass("input-update-active");
                     $("#" + input).attr('readonly', true);
                     
                     }*/
                }
                function callApi() {
                    var id_contrato = $("#idcontrato").val();
                    $.ajax({
                        url: "api/api.php",
                        method: "post",
                        data: {request: "alteracao_contrato",
                            id_contrato: id_contrato
                        },
                        success: function (data)
                        {
                            document.getElementById("result").innerHTML = data;
                            $('#alterar_contrato').click(function () {

                                var idcontrato = $("#idcontrato").val();
                                var empresa = $("#empresa").val();
                                var numero = $("#numero").val();
                                var vencimento = $("#vencimento").val();
                                var contratante = $("#contratante").val();
                                var contratada = $("#contratada").val();
                                var descTipoContrato = $("#descTipoContrato").val();
                                var concorrencia = $("#concorrencia").val();
                                var valorContrato = $("#valor").val();
                                var qtdParCont = $("#qtdParCont").val();
                                var valorParcContrato = $("#valorParcContrato").val();
                                var quantParcPagContr = $("#quantParcPagContr").val();
                                var dataPagParc = $("#dataPagParc").val();
                                var inicioVigencia = $("#inicioVigencia").val();
                                var fimVigencia = $("#fimVigencia").val();
                                var descGarantia = $("#descGarantia").val();
                                var descObjeto = $("#descObjeto").val();
                                var descObservacao = $("#descObservacao").val();
                                $.ajax({
                                    url: "api/api.php",
                                    method: "post",
                                    data: {request: "update_contrato",
                                        idcontrato: idcontrato,
                                        empresa: empresa,
                                        numero: numero,
                                        vencimento: vencimento,
                                        contratante: contratante,
                                        contratada: contratada,
                                        descTipoContrato: descTipoContrato,
                                        concorrencia: concorrencia,
                                        valorContrato: valorContrato,
                                        qtdParCont: qtdParCont,
                                        valorParcContrato: valorParcContrato,
                                        quantParcPagContr: quantParcPagContr,
                                        dataPagParc: dataPagParc,
                                        inicioVigencia: inicioVigencia,
                                        fimVigencia: fimVigencia,
                                        descGarantia: descGarantia,
                                        descObjeto: descObjeto,
                                        descObservacao: descObservacao


                                    },
                                    success: function (data)

                                    {
                                        alert(data);
                                        window.location.href = "meus_contratos.php";
                                    }
                                });
                            });
                        }
                    });
                }
            });

        </script>
    </body>
</html>