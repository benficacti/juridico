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
            <input type="hidden" id="idcontrato" value="<?php echo $_GET['c'] ?>">
            <article class="article-contract-fim" data-aos="zoom-in" >
                <header class="header-contract-fim">
                    <?php
                    switch ($_GET['d']) {
                        case 1:
                            echo ' <label class="title-contract-fim"><a href="meus_contratos.php">Voltar ao Meus contratos</a></label>';
                            break;
                        case 2:
                            echo'<label class="title-contract-fim"><a href="painel.php">Voltar ao Painel</a></label>';
                            break;
                        default:
                            break;
                    }
                    ?>
                </header>
                <div id="result">

                </div>
            </article>

        </div>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#item_painel_contrato').addClass('item-active');




                callApi();

                function callApi() {
                    var id_contrato = $("#idcontrato").val();
                    $.ajax({
                        url: "api/api.php",
                        method: "post",
                        data: {request: "alteracao_contrato",
                            id_contrato: id_contrato
                        },
                        success: function (data)
                        {
                            document.getElementById("result").innerHTML = data;


                            $('#alterar_contrato').click(function () {

                                var idcontrato = $("#idcontrato").val();
                                var empresa = $("#empresa").val();
                                var numero = $("#numero").val();
                                var vencimento = $("#vencimento").val();
                                var contratante = $("#contratante").val();
                                var contratada = $("#contratada").val();
                                var descTipoContrato = $("#descTipoContrato").val();
                                var concorrencia = $("#concorrencia").val();
                                var valorContrato = $("#valorContrato").val();
                                var qtdParCont = $("#qtdParCont").val();
                                var valorParcContrato = $("#valorParcContrato").val();
                                var quantParcPagContr = $("#quantParcPagContr").val();
                                var dataPagParc = $("#dataPagParc").val();
                                var inicioVigencia = $("#inicioVigencia").val();
                                var fimVigencia = $("#fimVigencia").val();
                                var descGarantia = $("#descGarantia").val();
                                var descObjeto = $("#descObjeto").val();
                                var descObservacao = $("#descObservacao").val();
                                $.ajax({
                                    url: "api/api.php",
                                    method: "post",
                                    data: {request: "update_contrato",
                                        idcontrato: idcontrato,
                                        empresa:  empresa,
                                        numero: numero,
                                        vencimento: vencimento,
                                        contratante: contratante,
                                        contratada: contratada,
                                        descTipoContrato: descTipoContrato,
                                        concorrencia: concorrencia,
                                        valorContrato: valorContrato,
                                        qtdParCont: qtdParCont,
                                        valorParcContrato: valorParcContrato,
                                        quantParcPagContr: quantParcPagContr,
                                        dataPagParc: dataPagParc,
                                        inicioVigencia: inicioVigencia,
                                        fimVigencia: fimVigencia,
                                        descGarantia: descGarantia,
                                        descObjeto: descObjeto,
                                        descObservacao: descObservacao

                                        
                                    },
                                    success: function (data)

                                    {
                                        alert(data);
                                        window.location.href = "meus_contratos.php";
                                    }
                                });

                            });
                        }
                    });
                }
            });

        </script>
    </body>
</html>