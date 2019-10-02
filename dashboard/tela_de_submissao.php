<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
} else {
    $_SESSION['contrato'] = 0;
    
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
        <link href="css/aos.css" rel="stylesheet"/>
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
                    <label class="title-contrato">SUBMISSÃO DE CONTRATO</label>

                </header>
                <div class="line-contract">
                    <div class="form-contract">
                        <div class="input-group-contract-submeter">
                            <input type="text" list="list_contrato" class="input-contract" id="contrato_padrao" placeholder="CONTRATO PARA SUBMISSÃO" autocomplete="nope" >  
                            <datalist id="list_contrato">
                                <?php
                                include './persistencia/Conexao.php';
                                include './classes/Search.class.php';
                                Search::ListarContratos();
                                ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="form-contract">
                        <div class="input-group-contract-submeter">
                            <input type="text" list="list_contrato" class="input-contract" id="contrato_padrao" placeholder="CONTRATO PADRÃO" autocomplete="nope" >  
                            <datalist id="list_contrato">
                                <?php
                                Search::ListarContratos();
                                ?>
                            </datalist>    
                        </div>
                    </div>
                </div>

                <div class="line-contract">
                    <div class="btn-login">
                        <input type="submit" value="SUBMETER" class="bt-login" id="cadastrar_contrato">
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

                $("#vencimento").mask("99/99/9999");
                function verifyFocus() {
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
                }
                $('#result').on('click', function () {
                    verifyFocus();
                });
                document.onkeydown = TabExample;

                function TabExample(evt) {
                    var evt = (evt) ? evt : ((event) ? event : null);
                    var tabKey = 9;
                    if (evt.keyCode == tabKey) {
                        verifyFocus();
                    }
                }

                $(function () {
                    $('#valor_contrato').maskMoney({prefix: 'R$ ', allowNegative: true, thousands: '.', decimal: ',', affixesStay: false});
                    $('#valor_parcela').maskMoney({prefix: 'R$ ', allowNegative: true, thousands: '.', decimal: ',', affixesStay: false});
                    $('#valor_parcela').attr('readonly', true);
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
                        var empresa_contrato = $("#empresa_contrato").val();
                        if (empresa_contrato !== "0") {
                            if (empresa_contrato === "1") {
                                document.getElementById('nome_concorrencia').value = " Não possui concorrência";
                            } else {
                                document.getElementById('nome_concorrencia').value = " Não possui concorrência";
                            }
                        } else {
                            document.getElementById('nome_concorrencia').value = "AGUARDANDO EMPRESA";
                            $("#empresa_contrato").addClass("input-group-contract-error");
                        }

                        $("#input-group-contract-concorrencia").removeClass("input-group-contract-error");
                        $("#input-group-contract-tipocontrato").removeClass("input-group-contract-error");
                        $("#input-group-contract-tipocontratoprivado").removeClass("input-group-contract-error");
                    }
                });

                $('#rd-sim').click(function () {
                    if ($('#rd-sim').is(':checked')) {
                        document.getElementById('possui_parcela').value = 1;

                        $("#input-group-contract-vencimento").addClass("pright");
                        $("#left-title").addClass("left-title");
                        $("#div-parcelas").load("includes/implement_cadastro_contrato.html");
                        $("#input-group-contract-possuiparc").removeClass("input-group-contract-error");
                        $("#input-group-contract-possuiparcnao").removeClass("input-group-contract-error");
                        setTimeout(function () {
                            $("#data_pag_parcela").mask("99/99/9999")
                        }, 1000);
                    }

                });
                $('#rd-nao').click(function () {
                    if ($('#rd-nao').is(':checked')) {
                        document.getElementById('possui_parcela').value = 2;
                        $("#left-title").removeClass("left-title");
                        $("#input-group-contract-vencimento").removeClass("pright");
                        $("#line1").addClass("unview");
                        $("#line2").addClass("unview");
                        $("#line3").addClass("unview");
                        $("#input-group-contract-possuiparc").removeClass("input-group-contract-error");
                        $("#input-group-contract-possuiparcnao").removeClass("input-group-contract-error");
                    }
                });
                $("#empresa_contrato").change(function () {
                    $("#empresa_contrato").removeClass("input-group-contract-error");
                    if ($('#rd-privado').is(':checked')) {
                        var empresa_contrato = $("#empresa_contrato").val();
                        if (empresa_contrato === "1") {
                            document.getElementById('nome_concorrencia').value = "Não possui concorrência";
                        } else if (empresa_contrato === "2") {
                            document.getElementById('nome_concorrencia').value = "Não possui concorrência";
                        } else {
                            document.getElementById('nome_concorrencia').value = "AGUARDANDO EMPRESA";
                            $("#empresa_contrato").addClass("input-group-contract-error");
                        }
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
                    var possui_parcela = $("#possui_parcela").val();
                    var empresa_contrato = $("#empresa_contrato").val();

                    /* //NUMERO CONTRATO
                     if (num_contrato.length <= 0) {
                     $("#input-group-contract-numero").addClass("input-group-contract-error");
                     } else {
                     $("#input-group-contract-numero").removeClass("input-group-contract-error");
                     }*/
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

                    //POSSUI PARCELA
                    if (possui_parcela === "0") {
                        $("#input-group-contract-possuiparc").addClass("input-group-contract-error");
                        $("#input-group-contract-possuiparcnao").addClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-possuiparc").removeClass("input-group-contract-error");
                        $("#input-group-contract-possuiparcnao").removeClass("input-group-contract-error");
                    }
                    if (possui_parcela === "1") {
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
                    if (empresa_contrato === "0") {
                        $("#empresa_contrato").addClass("input-group-contract-error");
                    } else {
                        $("#empresa_contrato").removeClass("input-group-contract-error");
                    }
                    if (possui_parcela == "1") {
                        if (parseInt(parcelas_finalizadas) <= parseInt(parcela)) {
                            $("#input-group-contract-parcfim").removeClass("input-group-contract-error");
                            if (nome_contratante.length > 0 && nome_contratada.length > 0
                                    && nome_concorrencia.length > 0 && inicio_vigencia.length > 0 && fim_vigencia.length > 0
                                    && valor_contrato.length > 0 && parcela.length > 0 && valor_parcela.length > 0
                                    && data_pag_parcela.length > 0 && parcelas_finalizadas.length > 0 && total_finalizado.length > 0
                                    && vencimento.length > 0 && empresa_contrato !== "0") {
                                document.getElementById("cadastrar_contrato").value = "CADASTRANDO...";
                                $('#cadastrar_contrato').attr('disabled', true);
                                //document.getElementById("result").innerHTML = "<div class='center-img'><img src='img/loading.gif' alt='imgLoading' class='img-loading'></div>";
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
                                        tipo_contrato: tipo_contrato,
                                        parcela: parcela,
                                        valor_parcela: valor_parcela,
                                        data_pag_parcela: data_pag_parcela,
                                        total_finalizado: total_finalizado,
                                        vencimento: vencimento,
                                        parcelas_finalizadas: parcelas_finalizadas,
                                        possui_parcela: possui_parcela,
                                        empresa_contrato: empresa_contrato
                                    },
                                    success: function (data)
                                    {
                                        // alert(data);
                                        var res = data.split(";");
                                        if (typeof res[0] !== "undefined" && res[0] == "00") {
                                            location.href = "cadastro_garantia.php";
                                        } else if (typeof res[0] !== "undefined" && res[0] == "01") {
                                            alert('Contrato ja existente');
                                            $("#input-group-contract-numero").addClass("input-group-contract-error");
                                            document.getElementById("cadastrar_contrato").value = "CADASTRAR";
                                            $('#cadastrar_contrato').attr('disabled', false);
                                        } else {
                                            alert("erro de comunicação com servidor!")
                                            document.getElementById("cadastrar_contrato").value = "TENTAR NOVAMENTE";
                                            $('#cadastrar_contrato').attr('disabled', false);
                                        }
                                        //window.location.href = "home.php";//
                                        // document.getElementById("result").innerHTML = data;
                                    }
                                });
                            }
                        } else {
                            $("#input-group-contract-parcfim").addClass("input-group-contract-error");
                            document.getElementById("cadastrar_contrato").value = "CADASTRAR";
                            $('#cadastrar_contrato').attr('disabled', false);
                        }
                    } else if (possui_parcela == "2") {
                        if (nome_contratante.length > 0 && nome_contratada.length > 0
                                && nome_concorrencia.length > 0 && inicio_vigencia.length > 0 && fim_vigencia.length > 0
                                && vencimento.length > 0 && empresa_contrato !== "0") {
                            document.getElementById("cadastrar_contrato").value = "CADASTRANDO...";
                            $('#cadastrar_contrato').attr('disabled', true);
                            //document.getElementById("result").innerHTML = "<div class='center-img'><img src='img/loading.gif' alt='imgLoading' class='img-loading'></div>";
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
                                    vencimento: vencimento,
                                    tipo_contrato: tipo_contrato,
                                    possui_parcela: possui_parcela,
                                    empresa_contrato: empresa_contrato
                                },
                                success: function (data)
                                {
                                    alert(data);
                                    var res = data.split(";");
                                    if (typeof res[0] !== "undefined" && res[0] == "00") {
                                        location.href = "cadastro_garantia.php";
                                    } else if (typeof res[0] !== "undefined" && res[0] == "01") {
                                        alert('Contrato ja existente');
                                        $("#input-group-contract-numero").addClass("input-group-contract-error");
                                        document.getElementById("cadastrar_contrato").value = "CADASTRAR";
                                        $('#cadastrar_contrato').attr('disabled', false);
                                    } else {
                                        alert("erro de comunicação com servidor!")
                                        document.getElementById("cadastrar_contrato").value = "TENTAR NOVAMENTE";
                                        $('#cadastrar_contrato').attr('disabled', false);
                                    }
                                    //window.location.href = "home.php";//
                                    // document.getElementById("result").innerHTML = data;
                                }
                            });
                        }
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
                    valor_contrato = valor_contrato.replace(",", "");
                    valor_contrato = valor_contrato.replace(".", "");


                    nValor = valor_contrato;

                    nValor = nValor.replace(".", "");
                    nValor = nValor.replace(",", "");

                    var qtd_parcela = parseInt((document.getElementById('parcela').value).replace(",", "."));
                    var parcelas = nValor / qtd_parcela;


                    var resultado = parcelas + "";

                    var n = resultado.indexOf(".");

                    if (n !== -1) {
                        resultado = resultado.substring(0, n);
                    } else {

                    }


                    document.getElementById('valor_parcela').value = "R$ " + mascaraValor(resultado);
                    var valor_parcelas = (document.getElementById('valor_parcela').value);
                    valor_parcelas = parseFloat(valor_parcelas);





                    var parcelas = (document.getElementById('parcelas_finalizadas').value);
                    if (parcelas <= qtd_parcela) {
                        parcelas = parseInt(parcelas);
                        var total_finalizado = parseFloat(valor_parcelas) * parcelas;
                        ((total_finalizado)).toFixed(2);
                        //var total_final = total_finalizado + " de " + nValor;
                        var total_final = parcelas + " de " + qtd_parcela;
                        document.getElementById('total_finalizado').value = total_final;
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
            function mascaraValor(valor) {
                valor = valor.toString().replace(/\D/g, "");
                valor = valor.toString().replace(/(\d)(\d{17})$/, "$1.$2");
                valor = valor.toString().replace(/(\d)(\d{14})$/, "$1.$2");
                valor = valor.toString().replace(/(\d)(\d{11})$/, "$1.$2");
                valor = valor.toString().replace(/(\d)(\d{8})$/, "$1.$2");
                valor = valor.toString().replace(/(\d)(\d{5})$/, "$1.$2");
                valor = valor.toString().replace(/(\d)(\d{2})$/, "$1,$2");
                return valor
            }
        </script>

    </body>
</html>