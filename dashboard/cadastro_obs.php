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
            <article class="article-contrato" data-aos="zoom-in" id="result">
                <header class="header-article-contrato">
                    <label class="title-contrato">ADICIONAR OBSERVAÇÃO</label>
                </header>

                <input type="hidden" id="idcontrato" value="<?php echo $_GET['idcontrato'] ?>">
                <input type="hidden" id="status">
                <div class="line-contract">
                    <div class="form-contract tipo_contrato">
                        <label class="title-option-contract"> ADICIONAR OBSERVAÇÃO? </label>
                        <label class="input-radio-contract">
                            <input type="radio" id="rd-sim" name="radio-group">
                            <label for="rd-sim" class="rd-label-contract">Sim</label>
                        </label>
                        <label class="input-radio-contract">
                            <input type="radio" id="rd-nao" name="radio-group">
                            <label for="rd-nao" class="rd-label-contract">Não</label>

                        </label>
                    </div>
                </div>                   
                <div id="div-garantia" style="float:left;"></div>
                <div id="div-btn" style="float:left;"></div>
            </article>
        </div>
        <script  type="text/javascript">
            $(document).ready(function () {

                $('#rd-sim').click(function () {
                    if ($('#rd-sim').is(':checked')) {
                        document.getElementById('status').value = '1';
                        document.getElementById('div-garantia').innerHTML = '<div class="line-contract" data-aos="fade-left"' +
                                'data-aos-offset="200"' +
                                'data-aos-duration="200"' +
                                'id="div-garantia">' +
                                '<div class="form-contract-full">' +
                                '<label class="title-option-contract">OBSERVAÇÃO:</label>' +
                                '<div class="input-group-contract group-obs pright2"  id="input-group-contract-obs">' +
                                '<textarea maxlength="1400" type="text" class="input-contract" id="obs" placeholder="Descreva a objservação" autocomplete="off"></textarea>' +
                                '</div>' +
                                '</div>' +
                                '</div>';
                        document.getElementById('div-btn').innerHTML = '<div class="line-contract">' +
                                '<input type="button" value="FINALIZAR" class="bt-login" style="float:right; margin-right:30px;" id="adicionar_obs">' +
                                '</div>';
                        document.getElementById('div-garantia').style.height = "55vh";
                        $("#adicionar_obs").click(function () {

                            callApi();
                        });

                        $('#result').on('click', function () {
                            //NUMERO CONTRATO
                            if ($("#obs").is(":focus")) {
                                $("#input-group-contract-obs").addClass("input-group-contract-active");
                                $("#input-group-contract-obs").removeClass("input-group-contract-error");
                            } else {
                                $("#input-group-contract-obs").removeClass("input-group-contract-active");
                            }
                        });
                    }
                });

                $('#rd-nao').click(function () {
                    if ($('#rd-nao').is(':checked')) {
                        document.getElementById('status').value = '2';
                        document.getElementById('div-garantia').innerHTML = '';
                        document.getElementById('div-btn').innerHTML = '<div class="line-contrato" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">' +
                                '<div class="form-contrato cadastrar">' +
                                '<input type="button" value="FINALIZAR" class="bt-login" id="adicionar_obs">' +
                                '</div>' +
                                '</div>';
                        document.getElementById('div-garantia').style.height = "0px";
                        $("#adicionar_obs").click(function () {
                            callApi();
                        });

                        $('#result').on('click', function () {
                            //NUMERO CONTRATO
                            if ($("#obs").is(":focus")) {
                                $("#input-group-contract-obs").addClass("input-group-contract-active");
                                $("#input-group-contract-obs").removeClass("input-group-contract-error");
                            } else {
                                $("#input-group-contract-obs").removeClass("input-group-contract-active");
                            }
                        });
                    }
                });



                function callApi() {
                    var idcontrato = $("#idcontrato").val();
                    var status_obs = $("#status").val();
                    var obs = '';
                    if (status_obs === '1') {
                        obs = $("#obs").val();
                    }
                    //OBS
                    if (obs.length <= 0) {
                        $("#input-group-contract-obs").addClass("input-group-contract-error");
                    } else {
                        $("#input-group-contract-obs").removeClass("input-group-contract-error");
                    }

                    if (obs.length > 0 || status_obs !== '1') {
                        document.getElementById("result").innerHTML = "<div class='center-img'><img src='../images/loading.gif' alt='imgLoading' class='img-loading'></div>";
                        $.ajax({
                            url: "../api/api.php",
                            method: "post",
                            data: {request: "adicionar_obs",
                                status_obs: status_obs,
                                obs: obs,
                                idcontrato: idcontrato
                            },
                            success: function (data)
                            {
                                alert(data);
                                var res = data.split(";");
                                if (typeof res[0] !== "undefined" && res[0] == "00") {
                                    location.href = "finalizacao_contrato.php?idcontrato=" + res[1];
                                } else {
                                    alert("erro de comunicação com servidor!")
                                }

                            }
                        });

                    }
                }
            });
        </script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

    </body>
</html>