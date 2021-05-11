<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
} else {
    $_SESSION['contrato'] = 0;
}

include './persistencia/Conexao.php';
include './classes/Search.class.php';
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
        <link href="css/aos.css" rel="stylesheet"/>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.maskMoney.js"></script>
        <script src="js/masked.js"></script>
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
                    <label class="title-contrato">CADASTRAR ALERTAS</label>

                </header>
                <span style="margin-left: 2vw;">

                </span>


                <div class="line-contract">
                    <div class="form-contract">
                        <label class="title-option-contract">E-MAIL:</label>
                        <div class="input-group-contract group-contratante">
                            <input type="text" class="input-contract" id="idEmailAlerta" placeholder="email@email.com" autocomplete="nope" autocomplete="off">     
                        </div>
                    </div>
                    <div class="form-contract">
                        <label class="title-option-contract">DIA DO RECEBIMENTO:</label>
                        <div class="input-group-contract group-contratante pright">
                            <select class="input-contract" id="idDiaAlerta">
                                <option value="0">SEGUNDA-FEIRA</option>
                                <option value="1">TERÇA-FEIRA</option> 
                                <option value="3">QUARTA-FEIRA</option>
                                <option value="4">QUINTA-FEIRA</option>
                                <option value="5">SEXTA-FEIRA</option>
                                <option value="6">SABADO-FEIRA</option>
                                <option value="7">DOMINGO-FEIRA</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="line-contract">
                    <div class="form-contract">
                        <label class="title-option-contract">VENCIMENTOS ATÉ:</label>
                        <div class="input-group-contract group-contratante">
                            <input type="number" class="input-contract" id="idQtdDiasAlerta" placeholder="DIAS" autocomplete="nope" autocomplete="off">  
                        </div>
                    </div>
                </div>


                <div class="line-contract" style="margin-top: 55px">
                    <div class="form-contract">
                        <div class="btn-login">
                            <input type="submit" value="CADASTRAR" class="bt-login" id="idCadastrarAlertas">
                        </div>
                    </div>
                    <div class="form-contract">
                        <div class="btn-login">
                            <input type="submit" value="EDITAR" class="bt-login" id="idEditarAlertas" onclick="verificarEditar()">
                        </div>
                    </div>
                </div>

            </article>

        </div>


        <!-- /BOX CONTEUDO DA PAG -->
        <!-- /Conteúdo -->

        <script  type="text/javascript">
            $(document).ready(function () {

                $("#idCadastrarAlertas").click(function () {
                    callApiRegisterAlert();
                });


                function callApiRegisterAlert() {
                    var emailAlert = $("#idEmailAlerta").val();
                    var diaAlert = $("#idDiaAlerta").val();
                    var diaQtdAlert = $("#idQtdDiasAlerta").val();


                    //NOME CONTRATANTE
                    if (emailAlert.length <= 0) {
                        $("#idEmailAlerta").focus();
                    } else if (diaAlert.length < 1) {
                        $("#idDiaAlerta").focus();
                    } else if (diaQtdAlert.length < 1) {
                        $("#idQtdDiasAlerta").focus();
                    }

                    document.getElementById("idCadastrarAlertas").value = "CADASTRANDO...";
                    $.ajax({
                        url: "api/api.php",
                        method: "post",
                        data: {request: "callApiRegisterAlert",
                            emailAlert: emailAlert,
                            diaAlert: diaAlert,
                            diaQtdAlert: diaQtdAlert
                        },
                        success: function (data)
                        {

                            if (data) {
                                alert('Alerta criado com sucesso!');
                                location.href = 'controle_alertas.php';
                                location.href = 'controle_alertas.php';
                            } else {
                                alert('Já existe um alerta cadastrado!');
                                location.href = 'controle_alertas.php';
                            }



                        }
                    });


                }

            });


            //EDITAR ALERTAS

            function verificarEditar() {
                var emailAlert = $("#idEmailAlerta").val();
                var diaAlert = $("#idDiaAlerta").val();
                var diaQtdAlert = $("#idQtdDiasAlerta").val();

                if (emailAlert.length >= 4) {

                    callApiEditAlert();

                } else {
                    listarAlert();
                }
            }


            function callApiEditAlert() {
                var emailAlert = document.getElementById('idEmailAlerta').value;
                var diaAlert = document.getElementById('idDiaAlerta').value;
                var diaQtdAlert = document.getElementById('idQtdDiasAlerta').value;


                //NOME CONTRATANTE
                if (emailAlert.length <= 0) {
                    $("#idEmailAlerta").focus();
                } else if (diaAlert.length < 1) {
                    $("#idDiaAlerta").focus();
                } else if (diaQtdAlert.length < 1) {
                    $("#idQtdDiasAlerta").focus();
                }

                document.getElementById("idEditarAlertas").value = "EDITANDO...";
                $.ajax({
                    url: "api/api.php",
                    method: "post",
                    data: {request: "callApiEditAlert",
                        emailAlert: emailAlert,
                        diaAlert: diaAlert,
                        diaQtdAlert: diaQtdAlert
                    },
                    success: function (data)
                    {

                        if (data) {
                            alert('Alerta editado com sucesso!');
                            location.href = 'controle_alertas.php';
                        }

                    }
                });

            }

            function listarAlert() {
                $.ajax({
                    url: "api/api.php",
                    method: "post",
                    data: {request: "listarAlert"
                    },
                    success: function (data)
                    {
                        var obj = JSON.parse(data);
                        obj.forEach(function (name, value) {
                            document.getElementById('idEmailAlerta').value = name.EMAIL;
                            document.getElementById('idQtdDiasAlerta').value = name.DIAPARAVENCER;
                            document.getElementById('idDiaAlerta').value = name.DIARECEBEREMAIL;
                        });
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