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

                function changeFunc(input) {
                    var change = document.getElementById("change_" + input).value;
                    if (change === 'true') {
                        $("#span-" + input).addClass("span-update-active");
                        $("#" + input).addClass("input-update-active");
                        $("#" + input).attr('readonly', false);
                        document.getElementById('div-img-' + input).innerHTML = 'SALVAR';
                        document.getElementById("change_" + input).value = false;
                        $("#tipocontrato").attr('disabled', false);
                    } else {
                        document.getElementById('div-img-' + input).innerHTML = '<img src="img/loading.gif" class="img-pencil" alt="gif">';
                        callApi2(input);
                    }
                }

                function FuncGarantia() {
                    var addGarantia = $("#idcontrato").val();

                    $.ajax({
                        url: 'api/api.php',
                        method: 'post',
                        data: {request: "addGarantia",
                            addGarantia: addGarantia
                        },
                        success: function (data) {
                            if (data === "01") {
                                window.location.href = "update_garantia.php";
                            }
                        }

                    });
                }
                
                
                function FuncObjeto(){
                    var objeto = $("#idcontrato").val();
                    $.ajax({
                        url: 'api/api.php',
                        method: 'post',
                        data:{request: "addObjeto",
                            objeto: objeto
                            
                        },
                        success: function(data){
                            if (data === "01") {
                                window.location.href = "update_objeto.php";
                            }
                        }
                    });
                }
                
                
                
                function callApi2(input) {

                    $("#tipocontrato").attr('disabled', false);
                    var idcontrato = $("#idcontrato").val();
                    var empresa = $("#empresa").val();
                    var numero = $("#numero").val();
                    var vencimento = $("#vencimento").val();
                    var contratante = $("#contratante").val();
                    var contratada = $("#contratada").val();
                    var descTipoContrato = $("#tipocontrato").val();
                    var concorrencia = $("#concorrencia").val();
                    var valorContrato = $("#valor").val();
                    var qtdParCont = $("#qtdParCont").val();
                    var valorParcContrato = $("#valorParcContrato").val();
                    var quantParcPagContr = $("#quantParcPagContr").val();
                    var dataPagParc = $("#dataPagParc").val();
                    var inicioVigencia = $("#inivigencia").val();
                    var fimVigencia = $("#fimvigencia").val();
                    $("#tipocontrato").attr('disabled', true);


                    $.ajax({
                        url: "api/api.php",
                        method: "post",
                        data: {request: "update_contrato",
                            idcontrato: idcontrato,
                            empresa: empresa,
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
                            fimVigencia: fimVigencia

                        },
                        success: function (data)

                        {
                            $("#span-" + input).removeClass("span-update-active");
                            $("#" + input).removeClass("input-update-active");
                            $("#" + input).attr('readonly', true);
                            document.getElementById("change_" + input).value = true;
                            document.getElementById('div-img-' + input).innerHTML = '<img src="img/pencil.png" class="img-pencil" alt="pencil">';




                        }
                    });


                }





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

                            $("#empresa").attr('readonly', true);
                            $("#numero").attr('readonly', true);
                            $("#vencimento").attr('readonly', true);
                            $("#contratante").attr('readonly', true);
                            $("#contratada").attr('readonly', true);
                            $("#tipocontrato").attr('disabled', true);
                            $("#concorrencia").attr('readonly', true);
                            $("#valor").attr('readonly', true);
                            $("#inivigencia").attr('readonly', true);
                            $("#fimvigencia").attr('readonly', true);

                            $('#item_painel_contrato').addClass('item-active');
                            /*BUTTON EMPRESA*/
                            $("#div-img-empresa").click(function () {
                                changeFunc('empresa');
                            });
                            /*BUTTON NUMERO*/
                            $("#div-img-numero").click(function () {
                                changeFunc('numero');
                            });
                            /*BUTTON VENCIMENTO*/
                            $("#div-img-vencimento").click(function () {
                                changeFunc('vencimento');
                            });
                            /*BUTTON CONTRATANTE*/
                            $("#div-img-contratante").click(function () {
                                changeFunc('contratante');
                            });
                            /*BUTTON CONTRATADA*/
                            $("#div-img-contratada").click(function () {
                                changeFunc('contratada');
                            });
                            /*BUTTON TIPO CONTRATO*/
                            $("#div-img-tipocontrato").click(function () {
                                changeFunc('tipocontrato');
                            });
                            /*BUTTON VALOR*/
                            $("#div-img-valor").click(function () {
                                changeFunc('valor');
                            });
                            /*BUTTON CONCORRÊNCIA*/
                            $("#div-img-concorrencia").click(function () {
                                changeFunc('concorrencia');
                            });
                            /*BUTTON QUANTIDADE PARCELAS*/
                            $("#div-img-qtdparc").click(function () {
                                changeFunc('qtdparc');
                            });
                            /*BUTTON VALOR PARCELAS*/
                            $("#div-img-valparc").click(function () {
                                changeFunc('valparc');
                            });
                            /*BUTTON PARCELAS PAGAS*/
                            $("#div-img-parcpagas").click(function () {
                                changeFunc('parcpagas');
                            });
                            /*BUTTON DATA PAGAMENTO PARCELAS*/
                            $("#div-img-datapag").click(function () {
                                changeFunc('datapag');
                            });
                            /*BUTTON DATA INICIO VIGÊNCIA*/
                            $("#div-img-inivigencia").click(function () {
                                changeFunc('inivigencia');
                            });
                            /*BUTTON DATA FIM VIGÊNCIA*/
                            $("#div-img-fimvigencia").click(function () {
                                changeFunc('fimvigencia');
                            });

                            $("#addGarantia").click(function () {
                                FuncGarantia('idcontrato');
                            });
                            
                            $("#addObjeto").click(function (){
                                FuncObjeto('addObjeto');
                            });
                        }
                    });
                }



            });

        </script>
    </body>
</html>