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
                    <label class="title-contrato">ADICIONAR ANEXO</label>
                </header>
                <input type="hidden" id="idcontrato" value="<?php echo $_SESSION['contrato'] ?>">
                <input type="hidden" id="status">
                <div class="line-contract">
                    <div class="form-contract tipo_contrato">
                        <label class="title-option-contract"> ADICIONAR ANEXO? </label>
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
                            '<label class="title-option-contract">UPLOAD CONTRATO:</label>' +
                            '<label class="title-upload" for="img_contrato">ANEXAR CONTRATO</label>' +
                            '<div class="input-group-contract group-digitalizacao"  id="input-group-contract-garantia">' +
                            '<input type="file"  id="img_contrato" accept="application/pdf,application/jpg">' +
                            ' <iframe src="" class="unview" scrolling="no" id="image_contract"></iframe>' +
                            '<input type="hidden" id="path">' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    document.getElementById('div-btn').innerHTML = '<div class="line-contract">' +
                            '<input type="button" value="FINALIZAR" class="bt-login" style="float:right; margin-right:30px;" id="adicionar_arquivo">' +
                            '</div>';
                    document.getElementById('div-garantia').style.height = "70vh";
                    $("#adicionar_arquivo").click(function () {

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
                    $("#img_contrato").change(function () {
                        readURL(this);
                    });
                }

            });

            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image_contract').attr('src', e.target.result);
                        $('#image_contract').addClass("view");
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('#rd-nao').click(function () {
                if ($('#rd-nao').is(':checked')) {
                    document.getElementById('status').value = '2';
                    document.getElementById('div-garantia').innerHTML = '';
                    document.getElementById('div-btn').innerHTML = '<div class="line-contrato" data-aos="fade-left" data-aos-offset="100" data-aos-duration="500">' +
                            '<div class="form-contrato cadastrar">' +
                            '<input type="button" value="FINALIZAR" class="bt-login" style="float:left;" id="adicionar_garantia">' +
                            '</div>' +
                            '</div>';
                    document.getElementById('div-garantia').style.height = "0px";
                    $("#adicionar_arquivo").click(function () {
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
                var form;
                form = new FormData();
                var property = document.getElementById('img_contrato').files[0];
                form.append('request', 'anexo'); // para apenas 1 arquivo
                form.append('image_contract', property); // para apenas 1 arquivo

                var idcontrato = $("#idcontrato").val();
                document.getElementById("adicionar_arquivo").value = "ADICIONANDO...";
                $.ajax({
                    url: 'api/api.php', // Url do lado server que vai receber o arquivo
                    data: form,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (data) {
                         var res = data.split(";");
                                if (typeof res[0] !== "undefined" && res[0] == "00") {
                                    location.href = "finalizacao_contrato.php";
                                } else {
                                    alert("erro de comunicação com servidor!")

                                    document.getElementById("adicionar_obs").value = "TENTAR NOVAMENTE";
                                    $('#adicionar_obs').attr('disabled', false);

                                }
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