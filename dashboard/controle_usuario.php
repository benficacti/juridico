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
                    <label class="title-contrato">CADASTRAR NOVO USUÁRIO</label>

                </header>
                <span style="margin-left: 2vw;">

                </span>


                <div class="line-contract">
                    <div class="form-contract">
                        <label class="title-option-contract">NOME:</label>
                        <div class="input-group-contract group-contratante">
                            <input type="text" class="input-contract" id="nome_usuario" placeholder="Novo usuario" autocomplete="nope" autocomplete="off">     
                        </div>
                    </div>
                    <div class="form-contract">
                        <label class="title-option-contract">E-MAIL:</label>
                        <div class="input-group-contract group-contratante pright">
                            <input type="email" class="input-contract" id="email_usuario" placeholder="E-mail" autocomplete="nope" autocomplete="off" >     
                        </div>
                    </div>
                </div>
                <div class="line-contract">
                    <div class="form-contract">
                        <label class="title-option-contract">SETOR:</label>
                        <div class="input-group-contract group-concorrencia">
                            <input type="text" list="list_setor" class="input-contract" id="setor_usuario" placeholder="Setor" autocomplete="nope"autocomplete="off">   
                            <datalist id="list_setor">
                                <?php
                                Search::ListarSetor();
                                ?>
                            </datalist>
                        </div>
                    </div>

                    <div class="form-contract">
                        <label class="title-option-contract">PERFIL:</label>
                        <div class="input-group-contract group-contratante pright">
                            <select id="perfil_usuario">
                                <option value="">Selecione perfil</option>
                                <option value="1">ADMINISTRADOR</option>
                                <option value="2">MODERADOR</option>
                                <option value="3">COMUM</option>
                                <option value="4">INATIVO</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="line-contract">
                    <div class="form-contract">
                        <label class="title-option-contract">LOGIN:</label>
                        <div class="input-group-contract group-concorrencia">
                            <input type="text" class="input-contract" id="login_new_usuario" placeholder="Login" autocomplete="nope"autocomplete="off"  >     
                        </div>
                    </div>

                </div>

                <div class="line-contract">
                    <div class="btn-login">
                        <input type="submit" value="PROSSEGUIR" class="bt-login" id="cadastrar_new_usuario">
                    </div>
                </div>

            </article>

        </div>


        <!-- /BOX CONTEUDO DA PAG -->
        <!-- /Conteúdo -->

        <script  type="text/javascript">
            $(document).ready(function () {

                $("#cadastrar_new_usuario").click(function () {
                    callApi();
                });


                function callApi() {
                    var nome_usuario = $("#nome_usuario").val();
                    var email_usuario = $("#email_usuario").val();
                    var setor_usuario = $("#setor_usuario").val();
                    var login_new_usuario = $("#login_new_usuario").val();
                    var perfil_usuario = $("#perfil_usuario").val();


                    //NOME CONTRATANTE
                    if (nome_usuario.length <= 0) {
                        $("#nome_usuario").focus();
                    } else if (email_usuario.length < 1) {
                        $("#email_usuario").focus();
                    } else if (setor_usuario.length < 1) {
                        $("#setor_usuario").focus();
                    } else if (login_new_usuario.length < 1) {
                        $("#login_new_usuario").focus();
                    } else if (perfil_usuario.length < 1) {
                        $("#perfil_usuario").focus();
                    }
                    if (nome_usuario.length > 0) {
                        document.getElementById("cadastrar_new_usuario").value = "CADASTRANDO...";
                        $.ajax({
                            url: "api/api.php",
                            method: "post",
                            data: {request: "cadastro_novo_usuario",
                                usuario: nome_usuario,
                                email: email_usuario,
                                setor: setor_usuario,
                                login: login_new_usuario,
                                perfil: perfil_usuario
                            },
                            success: function (data)
                            {
                                if (data === '01') {
                                    alert('já existe uma conta de email associado');
                                } else {

                                    result = "";
                                    $.each(JSON.parse(data), function (key, value) {

                                        location.href = "enviarUsuarioSenha.php?usuario=" + value.USUARIO + " & senha=" + value.SENHA + " & email=" + value.EMAIL + " ";
                                    });
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