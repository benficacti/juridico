<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
} else {
  // echo $_SESSION['contrato'] . "br"; 
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
            <article class="article-contrato" data-aos="zoom-in" id="result">
                <header class="header-article-contrato">
                    <label class="title-contrato">ADICIONAR GARANTIA</label>
                </header>
                <input type="hidden" id="idcontrato" value="<?php echo $_SESSION['contrato'] ?>">
                <input type="hidden" id="status">
                <div class="line-contract-garantia">
                    <div class="form-contract tipo_contrato">
                        <label class="title-option-contract"> ADICIONAR GARANTIA? </label>
                        <label class="input-radio-contract-garantia">
                            <input type="radio" id="rd-sim" name="radio-group">
                            <label for="rd-sim" class="rd-label-contract-garantia">Sim</label>
                        </label>
                        <label class="input-radio-contract-garantia">
                            <input type="radio" id="rd-nao" name="radio-group">
                            <label for="rd-nao" class="rd-label-contract-garantia">Não</label>
                        </label>
                        <label class="input-radio-contract-garantia">
                            <input type="date" id="id_data_venc_gar" name="radio-group" style="border-radius: 8px">
                        </label>
                    </div>
                </div>      
                <div id="div-garantia"></div>
                <div id="div-btn"></div>
            </article>
        </div>
        <script  type="text/javascript">
            $('#item_cadastro_contrato').addClass('item-active');
            $('#rd-sim').click(function () {

                if ($('#rd-sim').is(':checked')) {
                    document.getElementById('status').value = '1';
                    document.getElementById('div-garantia').innerHTML = '<div class="line-contract" data-aos="fade-left"' +
                            'data-aos-offset="200"' +
                            'data-aos-duration="200"' +
                            'id="div-garantia">' +
                            '<div class="form-contract-full">' +
                            '<label class="title-option-contract">OBSERVAÇÃO DE GARANTIA:</label>' +
                            '<div class="input-group-contract group-garantia pright2"  id="input-group-contract-garantia">' +
                            '<textarea maxlength="1400" type="text" class="input-contract" id="garantia" placeholder="Descreva a garantia" autocomplete="off"></textarea>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    document.getElementById('div-btn').innerHTML = '<div class="line-contract">' +
                            '<input type="button" value="PROSSEGUIR" class="bt-login" style="float:right; margin-right:30px;" id="adicionar_garantia">' +
                            '</div>';
                    document.getElementById('div-garantia').style.height = "70vh";
                    $("#adicionar_garantia").click(function () {

                        callApi();
                    });
                    $('#result').on('click', function () {
                        //NUMERO CONTRATO
                        if ($("#garantia").is(":focus")) {
                            $("#input-group-contract-garantia").addClass("input-group-contract-active");
                            $("#input-group-contract-garantia").removeClass("input-group-contract-error");
                        } else {
                            $("#input-group-contract-garantia").removeClass("input-group-contract-active");
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
                            '<input type="button" value="PROSSEGUIR" class="bt-login" style="float:left;" id="adicionar_garantia">' +
                            '</div>' +
                            '</div>';
                    document.getElementById('div-garantia').style.height = "0px";
                    $("#adicionar_garantia").click(function () {
                        callApi();
                    });

                    $('#result').on('click', function () {
                        //NUMERO CONTRATO
                        if ($("#garantia").is(":focus")) {
                            $("#input-group-contract-garantia").addClass("input-group-contract-active");
                            $("#input-group-contract-garantia").removeClass("input-group-contract-error");
                        } else {
                            $("#input-group-contract-garantia").removeClass("input-group-contract-active");
                        }
                    });
                }
            });



            function callApi() {
                var idcontrato = $("#idcontrato").val();
                var status_garantia = $("#status").val();
                var garantia = '';
                var data_garantia = $("#id_data_venc_gar").val();
                if (status_garantia === '1') {
                    garantia = $("#garantia").val();
                }

                //OBS
                if (garantia.length <= 0) {
                    $("#input-group-contract-garantia").addClass("input-group-contract-error");
                } else {
                    $("#input-group-contract-garantia").removeClass("input-group-contract-error");
                }

                if ((garantia.length > 0 || status_garantia !== '1') && idcontrato !== "0") {
                    //document.getElementById("result").innerHTML = "<div class='center-img'><img src='img/loading.gif' alt='imgLoading' class='img-loading'></div>";
                    document.getElementById("adicionar_garantia").value = "ADICIONANDO...";
                    $('#adicionar_garantia').attr('disabled', true);
                    
                    $.ajax({
                        url: "api/api.php",
                        method: "post",
                        
                        data: {request: "adicionar_garantia",
                            status_garantia: status_garantia,
                            garantia: garantia,
                            idcontrato: idcontrato,
                            data_garantia: data_garantia
                        },
                        success: function (data)
                        {
                           
                         
                            var res = data.split(";");
                            if (typeof res[0] !== "undefined" && res[0] == "00") {
                                location.href = "cadastro_objeto.php";
                            } else {
                                alert("erro de comunicação com servidor!");
                                document.getElementById("adicionar_garantia").value = "TENTAR NOVAMENTE";
                                $('#adicionar_garantia').attr('disabled', false);
                            }
                            
                        }
                    });
                } else {
                    document.getElementById("adicionar_garantia").value = "PROSSEGUIR";
                    $('#adicionar_garantia').attr('disabled', false);
                }
            }
        </script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

    </body>
</html>