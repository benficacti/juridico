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
        
        <style>
            .botao-anexo{
                text-transform: uppercase;
                border-bottom-left-radius: 9px;
                border-bottom-right-radius: 9px;
                border-top-left-radius: 9px;
                border-top-right-radius: 9px;
                height: 35px;
                width: 150px;
                text-indent: 0;
                font-size: 14px;
                font-family: 'Arial';
                font-weight: bold;
                background-color: ghostwhite;               
            }
        </style>
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
            <article class="article-contract-anexo" data-aos="zoom-in" >
                <header class="header-contract-anexo">                  
                    <button class="botao-anexo" id="excluir">excluir</button>
                    <input type="hidden" id="anex" value="<?php echo $_GET['a']; ?>" />
                    <?php
                    switch ($_GET['d']) {
                        case 1:
                            echo '<label class="title-contract-anexo"><a href="meus_contratos.php">Voltar ao Meus contratos</a></label>';
                            break;
                        case 2:
                            echo'<label class="title-contract-anexo"><a href="painel.php">Voltar ao Painel</a></label>';
                            break;
                        default:
                            break;
                    }
                    ?>

                </header>
                <iframe class="box-anexo" name="anexo" id="anexo" src="uploads/<?php echo $_GET['a']; ?>.pdf" scrolling="no">
                </iframe>
            </article>

        </div>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

        <script>
            $("#excluir").click(function () {
                callApi();
            });


            function callApi() {
                var anexo = $("#anex").val();

                $.ajax({

                    url: 'api/api.php',
                    method: 'post',
                    data: {request: 'excluir_anexo',
                        anexo: anexo
                    },
                    success:function(data){
                        if (data === '00') {
                            alert('Anexo excluido com sucesso!');
                            window.location.href='meus_contratos.php';
                            
                        }
                    }
                    

                });
            }
        </script>

    </body>
</html>