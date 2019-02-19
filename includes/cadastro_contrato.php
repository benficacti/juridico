<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <link rel="icon" href="favicon.png">
        <title></title>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>
        <script src="../js/jquery.min.js"></script>
        <script type="text/javascript">

        </script>
    </head>
    <body>
        <article class="article-contrato" data-aos="zoom-in" id="result">
            <header class="header-article-contrato">
                <label class="title-contrato">CADASTRO CONTRATO</label>
            </header>
            <form action="" method="post" onsubmit="return false;">
                <div class="line-contrato">
                    <div class="form-contrato num_contrato">
                        <label class="title-option-contrato">Nº Contrato:</label>
                        <input type="text" class="input-contrato input-auto-num" id="numero_contrato" placeholder="Nº Contrato" autocomplete="off">
                    </div>
                    <div class="form-contrato tipo_contrato">
                        <label class="title-option-contrato"> Tipo Contrato:</label>
                        <label class="input-radio-contrato">
                            <input type="radio" id="rd-publico" name="radio-group" checked>
                            <label for="rd-publico" class="rd-label-contrato">Público</label>
                        </label>
                        <label class="input-radio-contrato">
                            <input type="radio" id="rd-privado" name="radio-group">
                            <label for="rd-privado" class="rd-label-contrato">Privado</label>

                        </label>
                    </div>
                </div>
                <div class="line-contrato">
                    <div class="form-contrato contratante">
                        <label class="title-option-contrato">Contratante: </label>
                        <input type="text" class="input-contrato input-auto" id="nome_contratante"  placeholder="Nome Contratante" autocomplete="off">
                    </div>
                    <div class="form-contrato contratada">
                        <label class="title-option-contrato">Contratada: </label>
                        <input type="text" class="input-contrato input-auto" id="nome_contratada"  placeholder="Nome Contratada" autocomplete="off">
                    </div>
                </div>
                <div class="line-contrato">
                    <div class="form-contrato concorrencia">
                        <label class="title-option-contrato">Concorrência: </label>
                        <input type="text" class="input-contrato input-auto-concorrencia" id="nome_concorrencia"  placeholder="Nome Concorrência" autocomplete="off">
                    </div>     
                    <div class="form-contrato datavigencia">
                        <label class="title-option-contrato">Data Vigência: </label>
                        <input type="text" class="input-contrato input-auto-vigencia" id="inicio_vigencia"  placeholder="00/00/0000" autocomplete="off">
                        <span class="span-space">á</span>
                        <input type="text" class="input-contrato input-auto-vigencia" id="fim_vigencia"  placeholder="00/00/0000" autocomplete="off">
                    </div> 
                </div>
                <div class="line-contrato">
                    <div class="form-contrato valorcontrato">
                        <label class="title-option-contrato">Valor Contrato: </label>
                        <input type="text" class="input-contrato input-auto-valor" id="valor_contrato"  placeholder="Valor Contrato" autocomplete="off">
                    </div> 
                    <div class="form-contrato parcela">
                        <label class="title-option-contrato">Parcelas </label>
                        <input type="text" class="input-contrato input-auto-valor" id="parcela"  placeholder="Parcelas" autocomplete="off">
                    </div> 
                    <div class="form-contrato valorparcela">
                        <label class="title-option-contrato">Valor Parcela: </label>
                        <input type="text" class="input-contrato input-auto-valorparcela" id="valor_parcela"  placeholder="Valor Parcela" autocomplete="off" readonly="readonly">
                    </div> 
                </div>
                <div class="line-contrato">
                    <div class="form-contrato datapagparc">
                        <label class="title-option-contrato">Data de pagamento das parcelas: </label>
                        <input type="text" class="input-contrato input-auto-dataparc" id="data_pag_parcela"  placeholder="Valor Contrato" autocomplete="off">
                    </div> 
                    <div class="form-contrato parcelasfinalizadas">
                        <label class="title-option-contrato">Parcelas Finalizadas: </label>
                        <input type="text" class="input-contrato input-auto-parcelasfinalizadas" id="parcelas_finalizadas"  placeholder="Parc. Finalizadas" autocomplete="off">
                    </div> 
                </div>
                <div class="line-contrato">

                    <div class="form-contrato totalfinalizado">
                        <label class="title-option-contrato">Total Finalizado: </label>
                        <input type="text" class="input-contrato input-auto-totalfinalizado" id="total_finalizado"  placeholder="Total finalizado" autocomplete="off" readonly="readonly">
                    </div> 
                    <div class="form-contrato vencimentocontrato">
                        <label class="title-option-contrato">Vencimento: </label>
                        <input type="text" class="input-contrato input-auto-vencimento" id="vencimento"  placeholder="00/00/0000" autocomplete="off">
                    </div> 
                </div>
                <div class="line-contrato">
                    <div class="form-contrato cadastrar">
                        <center>  
                            <input type="button" value="PROSSEGUIR" class="button-cadastro-contrato" id="cadastrar_contrato">
                        </center>
                    </div> 

                </div>
            </form>
        </article>
        <script  type="text/javascript">
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



               // document.getElementById("result").innerHTML = "<div class='center-img'><img src='../images/loading.gif' alt='imgLoading' class='img-loading'></div>";
                $.ajax({
                    url: "../api/api.php",
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
                       // document.getElementById("result").innerHTML = data;
                       alert(data);
                    }
                });

            }
        </script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

    </body>
</html>
