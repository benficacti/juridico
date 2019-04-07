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
        <script src="js/jquery.maskMoney.js"></script>
        <script src="js/masked.js"></script>
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
            <article class="article-contrato" data-aos="zoom-in" id="result">
                <header class="header-article-contrato">
                    <label class="title-contrato">CADASTRO CONTRATO</label>
                </header>
                <div class="line-contract">
                    <div class="form-contract">
                        <label class="title-option-contract">Nº CONTRATO:</label>
                        <div class="input-group-contract input-group-login-active"  id="input-group-contract-numero">
                            <input type="text" class="input-contract" id="numero_contrato" placeholder="Nº Contrato" autocomplete="nope" >     
                        </div>
                    </div>
                    <div class="form-contract">
                        <input type="hidden" id="tipo_contrato">
                        <label class="title-option-contract"> TIPO CONTRATO:</label>
                        <label class="input-radio-contract" id="input-group-contract-tipocontrato">
                            <input type="radio" id="rd-publico" name="radio-group">
                            <label for="rd-publico" class="rd-label-contract">Público</label>
                        </label>
                        <label class="input-radio-contract" id="input-group-contract-tipocontratoprivado">
                            <input type="radio" id="rd-privado" name="radio-group">
                            <label for="rd-privado" class="rd-label-contract">Privado</label>

                        </label>

                    </div>
                </div>
                <div class="line-contract">
                    <div class="form-contract">
                        <label class="title-option-contract">CONTRATANTE:</label>
                        <div class="input-group-contract group-contratante"  id="input-group-contract-contratante">
                            <input type="text" class="input-contract" id="nome_contratante" placeholder="Nome Contratante" autocomplete="nope" autocomplete="off"  >     
                        </div>
                    </div>
                    <div class="form-contract">
                        <label class="title-option-contract">CONTRATADA:</label>
                        <div class="input-group-contract group-contratante pright"  id="input-group-contract-contratada">
                            <input type="text" class="input-contract" id="nome_contratada" placeholder="Nome Contratada" autocomplete="nope" autocomplete="off" >     
                        </div>
                    </div>
                </div>
                <div class="line-contract">
                    <div class="form-contract">
                        <label class="title-option-contract">CONCORRÊNCIA:</label>
                        <div class="input-group-contract group-concorrencia"  id="input-group-contract-concorrencia">
                            <input type="text" class="input-contract" id="nome_concorrencia" placeholder="Nome Concorrência" autocomplete="nope"autocomplete="off"  >     
                        </div>
                    </div>
                    <div class="form-contract">
                        <label class="title-option-contract">DATA VIGÊNCIA:</label>
                        <div class="input-group-contract group-date"  id="input-group-contract-inivigencia">
                            <input type="text" class="input-contract input-date" id="inicio_vigencia" placeholder="00/00/0000" >     
                        </div>
                        <label class="title-option-contract">á</label>
                        <div class="input-group-contract group-date pright"  id="input-group-contract-fimvigencia">
                            <input type="text" class="input-contract input-date" id="fim_vigencia" placeholder="00/00/0000"  >     
                        </div>
                    </div>
                </div>
                <div class="line-contract">
                    <div class="form-contract form-contract-left">
                        <label class="title-option-contract">VALOR CONTRATO:</label>
                        <div class="input-group-contract group-valor-contract"  id="input-group-contract-valor">
                            <input type="text" class="input-contract input-valor" id="valor_contrato" placeholder="Valor Contrato" autocomplete="off"  onkeyup="calcular();">     
                        </div>
                    </div>
                    <div class="form-contract form-contract-center">
                        <label class="title-option-contract mleft">PARCELAS:</label>
                        <div class="input-group-contract group-parcelas"  id="input-group-contract-parcelas">
                            <input type="text" class="input-contract input-parcelas" id="parcela" placeholder="Parcelas" value="1" autocomplete="off" onkeyup="calcular();">     
                        </div>
                    </div>
                    <div class="form-contract form-contract-right">
                        <label class="title-option-contract mleft">VALOR PARCELA:</label>
                        <div class="input-group-contract group-valor-contract pright"  id="input-group-contract-valorparc">
                            <input type="text" class="input-contract input-valor" id="valor_parcela" placeholder="Valor Parcela" autocomplete="off" readonly="readonly">     
                        </div>
                    </div>
                </div>
                <div class="line-contract">
                    <div class="form-contract">
                        <label class="title-option-contract">DATA DE PAGAMENTO DAS PARCELAS:</label>
                        <div class="input-group-contract group-date-parc"  id="input-group-contract-datapay">
                            <input type="text" class="input-contract input-date" id="data_pag_parcela" placeholder="00/00/0000" autocomplete="nope" >     
                        </div>
                    </div>
                    <div class="form-contract">
                        <label class="title-option-contract">PARCELAS FINALIZADAS:</label>
                        <div class="input-group-contract group-parcelas-finalizadas pright"  id="input-group-contract-parcfim">
                            <input type="text" class="input-contract input-parcelas-finalizadas" id="parcelas_finalizadas" placeholder="Parcelas Finalizadas" autocomplete="nope" onkeyup="calcular();">     
                        </div>
                    </div>
                </div>

                <div class="line-contract">
                    <div class="form-contract">
                        <label class="title-option-contract">TOTAL FINALIZADO:</label>
                        <div class="input-group-contract group-total-finalizado"  id="input-group-contract-totalfim">
                            <input type="text" class="input-contract input-total-finalizado" id="total_finalizado" placeholder="Total finalizado" autocomplete="nope"readonly="readonly" >     
                        </div>
                    </div>
                    <div class="form-contract">
                        <label class="title-option-contract">VENCIMENTO:</label>
                        <div class="input-group-contract group-vencimento pright"  id="input-group-contract-vencimento">
                            <input type="text" class="input-contract input-vencimento" id="vencimento" placeholder="00/00/0000" autocomplete="nope" >     
                        </div>
                    </div>
                </div>
                <div class="line-contract">
                    <div class="btn-login">
                        <input type="submit" value="PROSSEGUIR" class="bt-login" id="cadastrar_contrato">
                    </div>
                </div>

            </article>

        </div>


        <!-- /BOX CONTEUDO DA PAG -->
        <!-- /Conteúdo -->

        <script  type="text/javascript">
            $(document).ready(function () {
                $('#item_cadastro_contrato').addClass('item-active');
                $("#inicio_vigencia").mask("99/99/9999");
                $("#fim_vigencia").mask("99/99/9999");
                $("#data_pag_parcela").mask("99/99/9999");
                $("#vencimento").mask("99/99/9999");
                $('#result').on('click', function () {
                    //NUMERO CONTRATO
                    if ($("#numero_contrato").is(":focus")) {
                        $("#input-group-contract-numero").addClass("input-group-contract-active");
                        $("#input-group-contract-numero").removeClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-numero").removeClass("input-group-contract-active");
                    }
                    //NOME CONTRATANTE
                    if ($("#nome_contratante").is(":focus")) {
                        $("#input-group-contract-contratante").addClass("input-group-contract-active");
                        $("#input-group-contract-contratante").removeClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-contratante").removeClass("input-group-contract-active");
                    }
                    //NOME CONTRATADA
                    if ($("#nome_contratada").is(":focus")) {
                        $("#input-group-contract-contratada").addClass("input-group-contract-active");
                        $("#input-group-contract-contratada").removeClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-contratada").removeClass("input-group-contract-active");
                    }
                    //NOME CONCORRENCIA
                    if ($("#nome_concorrencia").is(":focus")) {
                        $("#input-group-contract-concorrencia").addClass("input-group-contract-active");
                        $("#input-group-contract-concorrencia").removeClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-concorrencia").removeClass("input-group-contract-active");
                    }
                    //INICIO VIGENCIA
                    if ($("#inicio_vigencia").is(":focus")) {
                        $("#input-group-contract-inivigencia").addClass("input-group-contract-active");
                        $("#input-group-contract-inivigencia").removeClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-inivigencia").removeClass("input-group-contract-active");
                    }

                    //FIM VIGENCIA
                    if ($("#fim_vigencia").is(":focus")) {
                        $("#input-group-contract-fimvigencia").addClass("input-group-contract-active");
                        $("#input-group-contract-fimvigencia").removeClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-fimvigencia").removeClass("input-group-contract-active");
                    }
                    //VALOR CONTRATO
                    if ($("#valor_contrato").is(":focus")) {
                        $("#input-group-contract-valor").addClass("input-group-contract-active");
                        $("#input-group-contract-valor").removeClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-valor").removeClass("input-group-contract-active");
                    }
                    // PARCELAS
                    if ($("#parcela").is(":focus")) {
                        $("#input-group-contract-parcelas").addClass("input-group-contract-active");
                        $("#input-group-contract-parcelas").removeClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-parcelas").removeClass("input-group-contract-active");
                    }
                    // VALOR PARCELAS
                    if ($("#valor_parcela").is(":focus")) {
                        $("#input-group-contract-valorparc").addClass("input-group-contract-active");
                        $("#input-group-contract-valorparc").removeClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-valorparc").removeClass("input-group-contract-active");
                    }
                    // DATA PAGAMENTO PARCELAS
                    if ($("#data_pag_parcela").is(":focus")) {
                        $("#input-group-contract-datapay").addClass("input-group-contract-active");
                        $("#input-group-contract-datapay").removeClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-datapay").removeClass("input-group-contract-active");
                    }
                    // PARCELAS FINALIZADAS
                    if ($("#parcelas_finalizadas").is(":focus")) {
                        $("#input-group-contract-parcfim").addClass("input-group-contract-active");
                        $("#input-group-contract-parcfim").removeClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-parcfim").removeClass("input-group-contract-active");
                    }
                    //TOTAL FINALIZADO
                    if ($("#total_finalizado").is(":focus")) {
                        $("#input-group-contract-totalfim").addClass("input-group-contract-active");
                        $("#input-group-contract-totalfim").removeClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-totalfim").removeClass("input-group-contract-active");
                    }
                    //VENCIMENTO
                    if ($("#vencimento").is(":focus")) {
                        $("#input-group-contract-vencimento").addClass("input-group-contract-active");
                        $("#input-group-contract-vencimento").removeClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-vencimento").removeClass("input-group-contract-active");
                    }
                });

                $(function () {
                    $('#valor_contrato').maskMoney({prefix: 'R$ ', allowNegative: true, thousands: '.', decimal: ',', affixesStay: false});
                    //('#valor_parcela').maskMoney({prefix: 'R$ ', allowNegative: true, thousands: '.', decimal: ',', affixesStay: false});
                })
                $("#cadastrar_contrato").click(function () {
                    callApi();
                });

                $('#rd-publico').click(function () {
                    if ($('#rd-publico').is(':checked')) {
                        document.getElementById('tipo_contrato').value = 1;
                        document.getElementById('nome_concorrencia').value = "";
                        $('#nome_concorrencia').attr('readonly', false);
                        $("#input-group-contract-tipocontrato").removeClass("input-group-contract-error");
                        $("#input-group-contract-tipocontratoprivado").removeClass("input-group-contract-error");
                    }
                });
                $('#rd-privado').click(function () {
                    if ($('#rd-privado').is(':checked')) {
                        document.getElementById('tipo_contrato').value = 2;
                        $('#nome_concorrencia').attr('readonly', true);
                        document.getElementById('nome_concorrencia').value = "Contrato Privado BBTT";
                        $("#input-group-contract-concorrencia").removeClass("input-group-contract-error");

                        $("#input-group-contract-tipocontrato").removeClass("input-group-contract-error");
                        $("#input-group-contract-tipocontratoprivado").removeClass("input-group-contract-error");
                    }
                });
                function callApi() {
                    var num_contrato = $("#numero_contrato").val();
                    var nome_contratante = $("#nome_contratante").val();
                    var nome_contratada = $("#nome_contratada").val();
                    var nome_concorrencia = $("#nome_concorrencia").val();
                    var inicio_vigencia = $("#inicio_vigencia").val();
                    var fim_vigencia = $("#fim_vigencia").val();
                    var valor_contrato = $("#valor_contrato").val();
                    var parcela = $("#parcela").val();
                    var valor_parcela = $("#valor_parcela").val();
                    var data_pag_parcela = $("#data_pag_parcela").val();
                    var parcelas_finalizadas = $("#parcelas_finalizadas").val();
                    var total_finalizado = $("#total_finalizado").val();
                    var vencimento = $("#vencimento").val();
                    var tipo_contrato = $("#tipo_contrato").val();

                    //NUMERO CONTRATO
                    if (num_contrato.length <= 0) {
                        $("#input-group-contract-numero").addClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-numero").removeClass("input-group-contract-error");
                    }
                    //NOME CONTRATANTE
                    if (nome_contratante.length <= 0) {
                        $("#input-group-contract-contratante").addClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-contratante").removeClass("input-group-contract-error");
                    }
                    //NOME CONTRATADA
                    if (nome_contratada.length <= 0) {
                        $("#input-group-contract-contratada").addClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-contratada").removeClass("input-group-contract-error");
                    }
                    //NOME CONCORRÊNCIA
                    if (nome_concorrencia.length <= 0) {
                        $("#input-group-contract-concorrencia").addClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-concorrencia").removeClass("input-group-contract-error");
                    }
                    //INICIO VIGENCIA
                    if (inicio_vigencia.length <= 0) {
                        $("#input-group-contract-inivigencia").addClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-inivigencia").removeClass("input-group-contract-error");
                    }
                    //FIM VIGENCIA
                    if (fim_vigencia.length <= 0) {
                        $("#input-group-contract-fimvigencia").addClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-fimvigencia").removeClass("input-group-contract-error");
                    }
                    //VALOR CONTRATO
                    if (valor_contrato.length <= 0) {
                        $("#input-group-contract-valor").addClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-valor").removeClass("input-group-contract-error");
                    }
                    //PARCELAS
                    if (parcela.length <= 0) {
                        $("#input-group-contract-parcelas").addClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-parcelas").removeClass("input-group-contract-error");
                    }
                    //VALOR PARCELAS
                    if (valor_parcela.length <= 0 || valor_parcela === "NaN") {
                        $("#input-group-contract-valorparc").addClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-valorparc").removeClass("input-group-contract-error");
                    }
                    //DATA PAGAMENTO PARCELA
                    if (data_pag_parcela.length <= 0) {
                        $("#input-group-contract-datapay").addClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-datapay").removeClass("input-group-contract-error");
                    }
                    //PARCELAS FINALIZADAS
                    if (parcelas_finalizadas.length <= 0) {
                        $("#input-group-contract-parcfim").addClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-parcfim").removeClass("input-group-contract-error");
                    }
                    //TOTAL FINALIZADO
                    if (total_finalizado.length <= 0 || total_finalizado === "NaN de NaN") {
                        $("#input-group-contract-totalfim").addClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-totalfim").removeClass("input-group-contract-error");
                    }
                    //VENCIMENTO
                    if (vencimento.length <= 0) {
                        $("#input-group-contract-vencimento").addClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-vencimento").removeClass("input-group-contract-error");
                    }
                    //TIPO CONTRATO
                    if (tipo_contrato.length <= 0) {
                        $("#input-group-contract-tipocontrato").addClass("input-group-contract-error");
                        $("#input-group-contract-tipocontratoprivado").addClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-tipocontrato").removeClass("input-group-contract-error");
                        $("#input-group-contract-tipocontratoprivado").removeClass("input-group-contract-error");
                    }

                    if (num_contrato.length > 0 && nome_contratante.length > 0 && nome_contratada.length > 0
                            && nome_concorrencia.length > 0 && inicio_vigencia.length > 0 && fim_vigencia.length > 0
                            && valor_contrato.length > 0 && parcela.length > 0 && valor_parcela.length > 0
                            && data_pag_parcela.length > 0 && parcelas_finalizadas.length > 0 && total_finalizado.length > 0
                            && vencimento.length > 0) {
                        document.getElementById("result").innerHTML = "<div class='center-img'><img src='img/loading.gif' alt='imgLoading' class='img-loading'></div>";
                        $.ajax({
                            url: "api/api.php",
                            method: "post",
                            data: {request: "cadastro_contrato",
                                numero: num_contrato,
                                nome_contratante: nome_contratante,
                                nome_contratada: nome_contratada,
                                nome_contratante: nome_contratante,
                                nome_concorrencia: nome_concorrencia,
                                inicio_vigencia: inicio_vigencia,
                                fim_vigencia: fim_vigencia,
                                valor_contrato: valor_contrato,
                                parcela: parcela,
                                valor_parcela: valor_parcela,
                                data_pag_parcela: data_pag_parcela,
                                total_finalizado: total_finalizado,
                                vencimento: vencimento,
                                parcelas_finalizadas: parcelas_finalizadas,
                                tipo_contrato: tipo_contrato
                            },
                            success: function (data)
                            {
                                // alert(data);
                                var res = data.split(";");
                                if (typeof res[0] !== "undefined" && res[0] == "00") {
                                    location.href = "cadastro_garantia.php?idcontrato=" + res[1];
                                } else {
                                    alert("erro de comunicação com servidor!")
                                }
                                //window.location.href = "home.php";//
                                // document.getElementById("result").innerHTML = data;
                            }
                        });
                    } else {

                    }
                }

            });


        </script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script>
            function calcular() {
                $(document).ready(function () {


                    var valor_contrato = (document.getElementById('valor_contrato').value);
                    valor_contrato = valor_contrato.replace("R$ ", "");
                    var d = valor_contrato.toString();
                    var nValor;
                    if (d.length > 6) {
                        valor_contrato = valor_contrato.replace(",", "");
                        valor_contrato = valor_contrato.replace(".", "");
                        nValor = valor_contrato.substring(0, valor_contrato.length - 2) + "." + valor_contrato.substring(valor_contrato.length - 2, valor_contrato.length);
                        var qtd_parcela = parseInt((document.getElementById('parcela').value).replace(",", "."));
                        var parcelas = nValor / qtd_parcela;
                        document.getElementById('valor_parcela').value = ((parcelas)).toFixed(2);
                        var valor_parcelas = (document.getElementById('valor_parcela').value);
                        valor_parcelas = parseFloat(valor_parcelas).toFixed(2);
                    } else {
                        valor_contrato = valor_contrato.replace(",", ".");
                        nValor = parseFloat(valor_contrato);
                        var qtd_parcela = parseInt((document.getElementById('parcela').value).replace(",", "."));
                        var parcelas = nValor / qtd_parcela;
                        document.getElementById('valor_parcela').value = ((parcelas)).toFixed(2);
                        var valor_parcelas = (document.getElementById('valor_parcela').value);
                        valor_parcelas = parseFloat(valor_parcelas).toFixed(2);
                    }

                    var parcelas = (document.getElementById('parcelas_finalizadas').value);

                    if (parcelas <= qtd_parcela) {
                        parcelas = parseInt(parcelas);
                        var total_finalizado = parseFloat(valor_parcelas) * parcelas;
                        var total_final = total_finalizado + " de " + nValor;
                        document.getElementById('total_finalizado').value = (total_final);
                        $("#input-group-contract-parcfim").removeClass("input-group-contract-error");
                    } else {
                        if (parcelas.length > 0) {
                            $("#input-group-contract-parcfim").addClass("input-group-contract-error");
                        } else {
                            $("#input-group-contract-parcfim").removeClass("input-group-contract-error");
                        }

                    }
                });
            }

        </script>

    </body>
</html>