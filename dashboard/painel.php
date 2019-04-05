<?php
session_start();
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
            <div id="list" data-aos="zoom-in" >
                <div class="container-list">
                    <div class="title-list">
                        <label class="desc-title-list">Próximos vencimentos</label>
                    </div>
                    <div class="title-list-tb">
                        <div class="div-desc">Descrição</div>
                        <div class="div-contrato">Contrato</div>
                        <div class="div-data">Data</div>
                    </div>
                    <div class="table-list" id="result">
                        <!--CONTEUDO-->

                    </div>
                </div>

            </div>

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
                document.getElementById("result").innerHTML = "<div class='center-img'><img src='../images/loading.gif' alt='imgLoading' class='img-loading'></div>";
                callApi();
            });

            function callApi() {
                $.ajax({
                    url: "api/result.php",
                    method: "post",
                    data: {request: "contratos_home"},
                    success: function (data)
                    {
                        document.getElementById("result").innerHTML = data;
                    }
                });
            }
        </script>
    </body>
</html>