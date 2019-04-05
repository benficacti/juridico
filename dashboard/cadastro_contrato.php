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
                        <div class="input-group-contract"  id="input-group-contract-contrato">
                            <input type="text" class="input-contract" id="numero_contrato" placeholder="Nº Contrato" autocomplete="off" >     
                        </div>
                    </div>
                    <div class="form-contract">
                        <label class="title-option-contract"> TIPO CONTRATO:</label>
                        <label class="input-radio-contract">
                            <input type="radio" id="rd_publico" name="radio-group" value="1">
                            <label for="rd-publico" class="rd-label-contract">Público</label>
                        </label>
                        <label class="input-radio-contract">
                            <input type="radio" id="rd_privado" name="radio-group" value="2">
                            <label for="rd-privado" class="rd-label-contract">Privado</label>

                        </label>
                    </div>
                </div>
                <div class="line-contract">
                    <div class="form-contract">
                        <label class="title-option-contract">CONTRATANTE:</label>
                        <div class="input-group-contract group-contratante"  id="input-group-contract-contrato">
                            <input type="text" class="input-contract" id="nome_contratante" placeholder="Nome Contratante" autocomplete="nope" >     
                        </div>
                    </div>
                    <div class="form-contract">
                        <label class="title-option-contract">CONTRATADA:</label>
                        <div class="input-group-contract group-contratante pright"  id="input-group-contract-contrato">
                            <input type="text" class="input-contract" id="nome_contratada" placeholder="Nome Contratada" autocomplete="nope" >     
                        </div>
                    </div>
                </div>
                <div class="line-contract">
                    <div class="form-contract">
                        <label class="title-option-contract">CONCORRÊNCIA:</label>
                        <div class="input-group-contract group-concorrencia"  id="input-group-contract-contrato">
                            <input type="text" class="input-contract" id="nome_concorrencia" placeholder="Nome Concorrência" autocomplete="nope" >     
                        </div>
                    </div>
                    <div class="form-contract">
                        <label class="title-option-contract">DATA VIGÊNCIA:</label>
                        <div class="input-group-contract group-date"  id="input-group-contract-contrato">
                            <input type="text" class="input-contract input-date" id="inicio_vigencia" placeholder="00/00/0000" >     
                        </div>
                        <label class="title-option-contract">á</label>
                        <div class="input-group-contract group-date pright"  id="input-group-contract-contrato">
                            <input type="text" class="input-contract input-date" id="fim_vigencia" placeholder="00/00/0000" >     
                        </div>
                    </div>
                </div>
                <div class="line-contract">
                    <div class="form-contract form-contract-left">
                        <label class="title-option-contract">VALOR CONTRATO:</label>
                        <div class="input-group-contract group-valor-contract"  id="input-group-contract-contrato">
                            <input type="text" class="input-contract input-valor" id="valor_contrato" placeholder="Valor Contrato" autocomplete="off" >     
                        </div>
                    </div>
                    <div class="form-contract form-contract-center">
                        <label class="title-option-contract mleft">PARCELAS:</label>
                        <div class="input-group-contract group-parcelas"  id="input-group-contract-contrato">
                            <input type="text" class="input-contract input-parcelas" id="parcela" placeholder="Parcelas" autocomplete="off" >     
                        </div>
                    </div>
                    <div class="form-contract form-contract-right">
                        <label class="title-option-contract mleft">VALOR PARCELA:</label>
                        <div class="input-group-contract group-valor-contract pright"  id="input-group-contract-contrato">
                            <input type="text" class="input-contract input-valor" id="valor_parcela" placeholder="Valor Parcela" autocomplete="off" >     
                        </div>
                    </div>
                </div>
                <div class="line-contract">
                    <div class="form-contract">
                        <label class="title-option-contract">DATA DE PAGAMENTO DAS PARCELAS:</label>
                        <div class="input-group-contract group-date-parc"  id="input-group-contract-contrato">
                            <input type="text" class="input-contract input-date" id="data_pag_parcela" placeholder="00/00/0000" autocomplete="nope" >     
                        </div>
                    </div>
                    <div class="form-contract">
                        <label class="title-option-contract">PARCELAS FINALIZADAS:</label>
                        <div class="input-group-contract group-parcelas-finalizadas pright"  id="input-group-contract-contrato">
                            <input type="text" class="input-contract input-parcelas-finalizadas" id="parcelas_finalizadas" placeholder="Parcelas Finalizadas" autocomplete="nope" >     
                        </div>
                    </div>
                </div>
                <div class="line-contract">
                    <div class="form-contract">
                        <label class="title-option-contract">TOTAL FINALIZADO:</label>
                        <div class="input-group-contract group-total-finalizado"  id="input-group-contract-contrato">
                            <input type="text" class="input-contract input-total-finalizado" id="total_finalizado" placeholder="Total finalizado" autocomplete="nope" >     
                        </div>
                    </div>
                    <div class="form-contract">
                        <label class="title-option-contract">VENCIMENTO:</label>
                        <div class="input-group-contract group-vencimento pright"  id="input-group-contract-contrato">
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

            $(function () {
                $('#valor_contrato').maskMoney({prefix: 'R$ ', allowNegative: true, thousands: '.', decimal: ',', affixesStay: false});
                $('#valor_parcela').maskMoney({prefix: 'R$ ', allowNegative: true, thousands: '.', decimal: ',', affixesStay: false});
            })
            $("#cadastrar_contrato").click(function () {
                callApi();
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
                document.getElementById("result").innerHTML = "<div class='center-img'><img src='../images/loading.gif' alt='imgLoading' class='img-loading'></div>";
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
                        parcelas_finalizadas: parcelas_finalizadas
                    },
                    success: function (data)
                    {
                        alert(data);
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
            }

        </script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script>
            function calcular() {
                var valor_contrato = (document.getElementById('valor_contrato').value);
                valor_contrato = valor_contrato.replace("R$ ", "");
                valor_contrato = parseInt(valor_contrato);
                var qtd_parcela = parseInt((document.getElementById('parcela').value).replace(",", "."));
                var parcelas = valor_contrato / qtd_parcela;
                document.getElementById('valor_parcela').value = ((parcelas)).toFixed(2);

                var valor_parcelas = (document.getElementById('valor_parcela').value);
                valor_parcelas = parseFloat(valor_parcelas).toFixed(2);
                var parcelas_finalizadas = (document.getElementById('parcelas_finalizadas').value);
                parcelas_finalizadas = parseInt(parcelas_finalizadas);
                var total_finalizado = valor_parcelas * parcelas_finalizadas;
                var total_final = total_finalizado + " de " + valor_contrato;
                document.getElementById('total_finalizado').value = (total_final);


            }
        </script>

    </body>
</html>