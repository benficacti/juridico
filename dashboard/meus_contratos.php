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
                        <div class="div-contrato-contract">Contrato</div>
                        <div class="div-data-contract">
                            <select id="tipo_contrato">
                                <option value="0" selected>Tipo Contrato</option>
                                <option value="1">Público</option>
                                <option value="2">Privado</option>
                            </select>
                        </div>
                        <div class="div-data-contract">
                            <select id="vencimento_contrato">
                                <option value="0" selected>Status Vencimento</option>
                                <option value="1">À vencer</option>
                                <option value="2">Vencido</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-list" >
                        <!--CONTEUDO-->
                        <div class="listtb"  data-aos="fade-left"
                             data-aos-anchor="#example-anchor"
                             data-aos-offset="400"
                             data-aos-duration="400">

                            <table class="tb-list" id="result">
                                
                            </table>
                        </div>
                       
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
                document.getElementById("result").innerHTML = "<div class='center-img'><img src='../images/loading.gif' alt='imgLoading' class='img-loading'></div>";
                callApi();
            });

            function callApi() {
                $.ajax({
                    url: "api/api.php",
                    method: "post",
                    data: {request: "meus_contratos"},
                    success: function (data)
                    {
                        document.getElementById("result").innerHTML = data;
                    }
                });
            }
        </script>
    </body>
</html>