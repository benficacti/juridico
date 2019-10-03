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
            <div id="list-contract" data-aos="zoom-in" >
                <div class="container-list">
                    <div class="title-list">
                        <label class="desc-title-list">Meus Contratos</label>
                    </div>
                    <div class="title-list-tb">

                        <div class="div-icon-contract"></div>
                        <div class="div-desc-contract">Descrição</div>
                        <input class="div-contrato-contract" type="number" id="nContrato"placeholder="Contrato" onkeyup="callApi();">
                        
                        <div class="div-data-contract">
                            <select name="tipo_contrato" id="tipo_contrato" onchange="callApi();">
                                <option value="0" selected>Tipo Contrato</option>
                                <option value="1">Público</option>
                                <option value="2">Privado</option>
                            </select>
                        </div>
                        <div class="div-data-contract">
                            <select id="vencimento_contrato" onchange="callApi();">
                                <option value="0" selected>Status Vencimento</option>
                                <option value="1">À vencer</option>
                                <option value="2">Vencido</option>
                            </select>
                        </div>
                        <div class="div-visu-contract"> Visualizar / Editar / Aditar</div>
                    </div>
                    <div class="table-list" id="result" >
                        <!--CONTEUDO-->


                    </div>
                </div>

            </div>       
        </div>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
                                AOS.init();
        </script>

        <script>
            $(document).ready(function () {
                $('#item_meus_contrato').addClass('item-active');
                document.getElementById("result").innerHTML = "<div class='center-img'><img src='../images/loading.gif' alt='imgLoading' class='img-loading'></div>";
                callApi();
            });

            function callApi() {
                var tipos = $("#tipo_contrato").val();
                var status_vencimento = $("#vencimento_contrato").val();
                var nContrato = $("#nContrato").val();
                $.ajax({
                    url: "api/api.php",
                    method: "post",
                    data: {request: "filtro_meus_contratos",
                        tipos: tipos,
                        status_vencimento: status_vencimento,
                        nContrato: nContrato
                    },
                    success: function (data)
                    {
                        document.getElementById("result").innerHTML = data;
                    }
                });
            }


        </script>
    </body>
</html>
