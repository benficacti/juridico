<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="icon" href="favicon.png">
        <script src="js/jquery.min.js"></script>
        <title></title>


    </head>
    <body class='index-body'>
    <session id="container">
        <header id="header">
            <nav id="nav">
                <?php
                include './includes/menu.php';
                ?>
            </nav>
        </header>

        <article id="article">
            <iframe src="includes/home.php" name="iframe" id="iframe" class="iframe"></iframe>

        </article>

    </session>
    <footer id="footer">
        <label class="text-footer">Copyright © 2019 BENFICA BBTT - CTI</label>
    </footer>
    <script type="text/javascript" src="js/script.js"></script>

    <script type="text/javascript">
        $("#home").click(function () {
            $("#home").addClass("active");
            $("#meus_contrato").removeClass("active");
            $("#administracao").removeClass("active");
        });
         //REMOVE CLASS TO MENU ADMINISTRATION
        $("#meus_contrato").click(function () {
            $("#meus_contrato").addClass("active");
            $("#home").removeClass("active");
            $("#administracao").removeClass("active");
        });
        //REMOVE CLASS TO MENU ADMINISTRATION
        $("#administracao").click(function () {
            $("#administracao").addClass("active");
            $("#home").removeClass("active");
            $("#meus_contrato").removeClass("active");
        });
    </script>
</body>
</html>
