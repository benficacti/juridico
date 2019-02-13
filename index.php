<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="icon" href="favicon.png">
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
            <iframe src="includes/home.php" name="frame" id="iframe" class="iframe"></iframe>

        </article>

    </session>
    <footer id="footer">
        <label class="text-footer">Copyright © 2019 BENFICA BBTT - CTI</label>
    </footer>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
