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
                <!--<header class="header-contract-fim">
                    <label class="title-contract-fim">PAINEL</label>
                </header>-->
                <!--   <div class="panels options">
                       <div class="line-contract-panel options">
                           <div class="title-contract-panel options">
                               <label class="lbl-title-panel">
                                   CONSULTA CONTRATO
                               </label>
                           </div>
                       </div>
                       <div class="line-contract-panel options2">
                           <label class="title-option-panel">Nº CONTRATO:</label>
                           <div class="input-group-option-panel input-group-login-active"  id="input-group-contract-numero">
                               <input type="text" class="input-panel" id="numero_contrato" placeholder="Nº Contrato" autocomplete="off" >     
                           </div>
                       </div>
                       <div class="line-contract-panel options">
                           <div class="title-contract-panel options">
                               <label class="lbl-title-panel">
                                   RESULTADO
                               </label>
                           </div>
                       </div>
                        <div class="line-contract-panel options">
                           
                       </div>
                   </div>
                vencimentos-panel
                -->
                <div class="panels ">
                    <div class="line-contract-panel">
                        <div class="title-contract-panel">
                            <label class="lbl-title-panel">
                                PRÓXIMOS VENCIMENTOS
                            </label>
                        </div>
                    </div>
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
                                <select id="vencimento_contrato" class="lbl-info-title-panel">
                                    <option id="0">VENCIMENTO</option>
                                    <option id="1">VENCIDO</option>
                                    <option id="2">À VENCER</option>
                                </select>
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
                $.ajax({
                    url: "api/api.php",
                    method: "post",
                    data: {request: "proximos_vencimentos"},
                    success: function (data)
                    {
                        document.getElementById("result").innerHTML = data;
                    }
                });
            }
        </script>
    </body>
</html>