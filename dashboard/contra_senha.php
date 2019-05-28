<?php
$contraSenha = filter_input(INPUT_GET, 'id');
//$idUsuario = Search::buscaPrivateToken($contraSenha);
?>
<!DOCTYPE html
    <html lang="pt-br"> 
<head>    
    <meta charset="UTF-8"/>
    <meta name="description" content="Gestão Eletronico de Contrato">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
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
    <section id="container">
        <article id="article-right" style=" width: 100vw !important;">
            <div class="container-login">
                <div class="login">

                    <header class="header-login">
                        <h2 class="title-header-login">
                            <span class="title-form-login">Gestão Eletrônica de Contratos</span>
                        </h2>

                    </header>
                    <article class="article-login">
                        <div class="line-login">
                            <div class="input-group-login"  id="input-group-login-user">
                                <input type="hidden" id="token" value="<?php echo$contraSenha ?>">
                                <input type="password" class="input-login" id="nova_senha" placeholder="NOVA SENHA" autocomplete="off" >     
                            </div>
                        </div>
                        <div class="line-login">
                            <div class="input-group-login" id="input-group-login-senha">
                                <input type="password" class="input-login" id="confirmar_senha"  autocomplete="off"  placeholder="CONFIRMAR SENHA">     
                            </div>                         
                        </div>
                        <div class="line-login">
                            <div class="btn-login">
                                <input type="submit" class="bt-login" id="entrar" value="CADASTRAR">     
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </article>
        <div class="rod-rodape">
            <div class="fai-rodape">
                <footer class="fa-rodape">
                     <span class="version">versão:1.0.0 </span>
                     <p> © <?php echo date('Y'); ?> Todos direitos reservados: Desenvolvido por: CTI-BBTT</p>      
                </footer>    
            </div>
        </div>
    </section>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#container').on('click', function () {
                if ($("#nova_senha").is(":focus")) {
                    $("#input-group-login-user").addClass("input-group-login-active");
                } else {
                    $("#input-group-login-user").removeClass("input-group-login-active");
                }
                if ($("#confirmar_senha").is(":focus")) {
                    $("#input-group-login-senha").addClass("input-group-login-active");
                } else {
                    $("#input-group-login-senha").removeClass("input-group-login-active");
                }
            });

        });
        $("#nova_senha").keydown(function () {
            $("#input-group-login-user").removeClass("input-group-login-error");
        });
        $("#confirmar_senha").keydown(function () {
            $("#input-group-login-senha").removeClass("input-group-login-error");
        });
        $("#entrar").click(function () {
            callApi();
        });
        function callApi() {
            var nova_senha = $("#nova_senha").val();
            var confirmar_senha = $("#confirmar_senha").val();
            var token = $("#token").val();
            if (nova_senha.length <= 0) {
                $("#input-group-login-user").addClass("input-group-login-error");
            } else {
                $("#input-group-login-user").removeClass("input-group-login-error");
            }
            if (confirmar_senha.length <= 0) {
                $("#input-group-login-senha").addClass("input-group-login-error");
            } else {
                $("#input-group-login-senha").removeClass("input-group-login-error");
            }

            if (nova_senha === confirmar_senha) {

                if (nova_senha.length > 0 && confirmar_senha.length > 0) {
                    document.getElementById("entrar").value = "SALVANDO...";
                    $.ajax({
                        url: "api/api.php",
                        method: "post",
                        data: {request: "contra_senha",
                            nova_senha: nova_senha,
                            token: token
                        },
                        success: function (data)
                        {
                            
                            alert("Senha alterada com sucesso!");
                            if (data === "00") {
                                window.location.href = "login.php";
                            }

                        }
                    });
                } else {
                    document.getElementById("entrar").value = "ENTRAR";
                }
            } else {
                alert("senhas não conferem!");
            }

        }


    </script>
</body>
</html>





