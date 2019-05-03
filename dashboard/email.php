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
       
        <article id="article-right" style="width: 100vw !important;">
            <div class="container-login">
                <div class="login">

                    <header class="header-login">
                        <h2 class="title-header-login">
                            <span class="title-form-login">Gestão Eletrônica de Contratos</span>
                        </h2>
                    </header>
                    <article class="article-login">
                        <div class="line-login">
                            <label class="title-login title-senha" for="senha">Email</label>
                            <div class="input-group-login" id="input-group-login-senha">
                                <input type="text" class="input-login" id="email"  autocomplete="off"  placeholder="Digite seu email">     
                            </div>                         
                        </div>
                        <div class="line-login">
                            <div class="btn-login">
                                <input type="submit" class="bt-login" id="enviar" value="ENVIAR">     
                            </div>
                        </div>
                    </article>

                </div>
            </div>
        </article>
    </section>
        <script type="text/javascript">
            $("#enviar").click(function () {
                var email = $("#email").val();
                $.ajax({
                    // url: "enviar.php",
                    url: "api/api.php",
                    method: "post",
                    data: {request: "enviar",
                        email: email
                    },
                    success: function (data)
                    {
                        var token = data;
                        var emails = email;
                        
                        location.href = "enviar.php?token="+token+" & email="+emails+" ";

                    }
                });
            });

        </script>
    </body>
</html>
