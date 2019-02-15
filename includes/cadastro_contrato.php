<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <link rel="icon" href="favicon.png">
        <title></title>
        <script type="text/javascript" src="../js/jquery-1.6.4.js"></script>        
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>
        <script src="../js/jquery.min.js"></script>
    </head>
    <body>
        <article class="article-contrato" data-aos="zoom-in">
            <header class="header-article-contrato">
                <label class="title-contrato">CADASTRO CONTRATO</label>
            </header>
            <div class="line-contrato">
                <div class="form-contrato">
                    <label class="title-option-contrato">Nº Contrato:</label>
                    <input type="text" class="input-contrato" id="numero_contrato" placeholder="Nº Contrato">
                </div>
                <div class="form-contrato">
                    <label class="title-option-contrato"> Tipo Contrato:</label>
                    <label class="input-radio-contrato">
                        <input type="radio" id="rd-publico" name="radio-group" checked>
                        <label for="rd-publico" class="rd-label-contrato">Público</label>
                    </label>
                    <label class="input-radio-contrato">
                       <input type="radio" id="rd-privado" name="radio-group">
                        <label for="rd-privado" class="rd-label-contrato">Privado</label>

                    </label>
                </div>
            </div>
             <div class="line-contrato">
                <div class="form-contrato">
                    <label class="title-option-contrato">Nome Contratante: </label>
                    <input type="text" class="input-contrato" id="nome_contratante" placeholder="Nº Contrato">
                </div>
                <div class="form-contrato">
                   
                </div>
            </div>
        </article>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </body>
</html>