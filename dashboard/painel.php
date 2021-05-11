<?php
session_start();
if (($_SESSION['tipo_acesso_login']) != 1) {

    header('Location: meus_contratos.php');
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
        <link rel=”stylesheet” href=”https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css”>
        <title>GEC - Gestão Eletronico de Contrato</title>
        <!-- CSS -->
        <link rel="stylesheet" href="css/css.css"/>
        <script type="text/javascript" src="js/jquery-1.6.4.js"></script>        
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>
        <script src="js/jquery.min.js"></script>

        <style>
            h1{
                text-align: center;
            }
        </style>
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
                        <?php include('includes/topbar.php'); ?>
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
            <article class="article-contract-fim" data-aos="zoom-in" >

                <div class="panels ">
                    <input type="text" class="pesquisar_painel" placeholder="FILTRAR" id="busca" onkeyup="callApi();" style="margin: 3px">              
                    <div class="line-contract-panel"> 
                        <div class="title-contract-panel" style="width: 62%">
                            <label class="lbl-title-panel">
                                PRÓXIMOS VENCIMENTOS
                            </label>
                        </div>
                        <span class="alert_painel" id="id_do_elemento" value="" onclick="buscaPorDiaAlerta()" style="background: #ff0000; padding: 3px; font-weight: bold; color: #FFF"></span>
                        <input type="hidden" value="" id="idQtdDiasParaVencer">
                    </div>
                    <div class="line-contract-panel">
                        <input type="number" class="pesquisar_painel" placeholder="Dias à vencer" id="idBuscaPorDia" onkeyup="buscaPorDia()" style="margin: 3px">
                        <label>Incio:</label>
                        <input type="date" class="data_painel" id="idDataIni">
                        <label>Fim:</label>
                        <input type="date" class="data_painel" id="idDataFim" onblur="buscaPorData()">
                        <button class="btn-download" onclick="imprimir()">Download pdf</button>
                        <button class="btn-email">Enviar Email</button>
                    </div>

                    <div id="idImpressao">
                        <div class="line-contract-panel">
                            <div class="info-contract-panel">
                                <div class="title-info-contract-panel">
                                    <label class="lbl-info-title-panel">
                                        CONTRATO
                                    </label>
                                </div>
                            </div>
                            <div class="info-contract-panel">
                                <div class="title-info-contract-panel">
                                    <label class="lbl-info-title-panel">
                                        CONTRATANTE
                                    </label>
                                </div>
                            </div>

                            <div class="info-contract-panel">
                                <div class="title-info-contract-panel">
                                    <label class="lbl-info-title-panel">
                                        CONTRATADO
                                    </label>
                                </div>
                            </div>

                            <div class="info-contract-panel">
                                <div class="title-info-contract-panel">
                                    <select id="vencimento_contrato" class="lbl-info-title-panel" onchange="callApi();">
                                        <option value="0">VENCIMENTO</option>
                                        <option value="1">VENCIDO</option>
                                        <option value="2">À VENCER</option>
                                    </select>
                                </div>
                            </div>

                            <div class="info-contract-panel">
                                <div class="title-info-contract-panel">
                                    <label class="lbl-info-title-panel">
                                        SETOR
                                    </label>
                                </div>
                            </div>

                            <div class="info-contract-panel">
                                <div class="title-info-contract-panel">
                                    <label class="lbl-info-title-panel">
                                        OPÇÃO
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div id="result">

                        </div>

                    </div>

                </div>

            </article>

        </div>


        <!-- /BOX CONTEUDO DA PAG -->
        <!-- /Conteúdo -->

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
                                        AOS.init();
        </script>

        <script  type="text/javascript">
            $("#cadastrar").click(function () {
                location.href = 'cadastro_contrato.php';
            });
            $(document).ready(function () {
                $('#item_painel_contrato').addClass('item-active');
                // document.getElementById("result").innerHTML = "<div class='center-img'><img src='../images/loading.gif' alt='imgLoading' class='img-loading'></div>";
                callApi();
            });

            function callApi() {
                var vencimento = $("#vencimento_contrato").val();
                var busca = $("#busca").val();
                $.ajax({
                    url: "api/api.php",
                    method: "post",

                    data: {request: "proximos_vencimentos",
                        vencimento: vencimento,
                        busca: busca
                    },
                    success: function (data)
                    {
                        document.getElementById("result").innerHTML = data;
                    }
                });
            }

            function buscaPorDia() {
                var idBuscaPorDia = document.getElementById('idBuscaPorDia').value;

                if (idBuscaPorDia.length > 0) {
                    $.ajax({
                        url: "api/api.php",
                        method: "post",

                        data: {request: "proximos_vencimentos_por_dia",
                            dias: idBuscaPorDia

                        },
                        success: function (data) {
                            document.getElementById("result").innerHTML = data;
                        }
                    });
                } else {
                    callApi();
                }
            }

            function buscaPorData() {
                var idDataIni = document.getElementById('idDataIni').value;
                var idDataFim = document.getElementById('idDataFim').value;

                if (idDataIni.length > 1 && idDataFim.length > 1) {
                    $.ajax({
                        url: "api/api.php",
                        method: "post",

                        data: {request: "contratos_por_periodo",
                            DataIni: idDataIni,
                            DataFim: idDataFim

                        },
                        success: function (data) {
                            document.getElementById("result").innerHTML = data;
                        }
                    });
                } else {
                    alert('Verifica as datas');
                }
            }
            
            contratosAlerta();
            function contratosAlerta() {
                
                $.ajax({
                    url: "api/api.php",
                    method: "post",

                    data: {request: "contratosAlerta"

                    },
                    success: function (data) {
                        //document.getElementById("id_do_elemento").innerHTML = data;
                        var qtd = '';
                        var dias_para_vencer = '';
                        var obj = JSON.parse(data);
                        obj.forEach(function( name, value){
                            qtd = name.QTDCONTRATO;
                            dias_para_vencer = name.DIASPARAVENCER;
                        });
                        document.getElementById('id_do_elemento').innerHTML = 'Exitem '+ qtd +' Contratos à vencer nos próximos '+ dias_para_vencer + ' dias!';
                        document.getElementById('idQtdDiasParaVencer').value = dias_para_vencer;
                    }
                });
            }
            
            function buscaPorDiaAlerta() {
                var idBuscaPorDia = document.getElementById('idQtdDiasParaVencer').value;
                if (idBuscaPorDia.length > 0) {
                    $.ajax({
                        url: "api/api.php",
                        method: "post",

                        data: {request: "proximos_vencimentos_por_dia",
                            dias: idBuscaPorDia

                        },
                        success: function (data) {
                            document.getElementById("result").innerHTML = data;
                        }
                    });
                } else {
                    callApi();
                }
            }


            function imprimir() {
                //pega o Html da DIV
                var divElements = document.getElementById('idImpressao').innerHTML;
                //pega o HTML de toda tag Body
                var oldPage = document.body.innerHTML;

                //Alterna o body 
                document.body.innerHTML =
                        "<html><head><title></title></head><body><h1>Listagem de Contratos</h1>" +
                        divElements + "</body>";

                //Imprime o body atual
                window.print();

                //Retorna o conteudo original da página. 
                document.body.innerHTML = oldPage;

                window.close();
            }


            var piscando = document.getElementById('id_do_elemento');
            var interval = window.setInterval(function () {
                if (piscando.style.visibility === 'hidden') {
                    piscando.style.visibility = 'visible';
                } else {
                    piscando.style.visibility = 'hidden';
                }
            }, 900);


        </script>
    </body>
</html>