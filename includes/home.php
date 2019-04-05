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
        <nav id="option-left">
            <div class="menu-home" style="display:none;" id="pesquisar" style="margin-top:1%;" data-aos="fade-left"
                 data-aos-anchor="#example-anchor"
                 data-aos-offset="500"
                 data-aos-duration="500">
                <div class="title-option">
                    <input type="text" placeholder="Pesquisar Contrato" class="input-option" id="input_pesquisar">
                </div>
                <div class="icon-option">
                    <figure class="figure-icon">
                        <img src="../images/lupa.png" class="img-icon" id="img-icon-lupa" alt="lupa-pesquisar">
                    </figure>

                </div>
            </div>
            <div class="menu-home" id="cadastrar" data-aos="fade-right"
                 data-aos-anchor="#example-anchor"
                 data-aos-offset="500"
                 data-aos-duration="500">
                <div class="title-option">
                    <label class="desc-option"><b>CADASTRAR</b><span class="desc-option-span"> CONTRATO</span></label>
                </div>
                <div class="icon-option">
                    <figure class="figure-icon">
                        <img src="../images/lupa.png" class="img-icon" id="img-icon-lupa" alt="lupa-pesquisar">
                    </figure>
                </div>
            </div>
            <div class="menu-home" style="display:none;" id="aditar" data-aos="fade-left"
                 data-aos-anchor="#example-anchor"
                 data-aos-offset="500"
                 data-aos-duration="500">
                <div class="title-option">
                    <label class="desc-option"><b>ADITAR</b><span class="desc-option-span"> CONTRATO</span></label>
                </div>
                <div class="icon-option">
                    <figure class="figure-icon">
                        <img src="../images/lupa.png" class="img-icon" id="img-icon-lupa" alt="lupa-pesquisar">
                    </figure>
                </div>
            </div>
            <div class="menu-home" id="alterar" style="display:none;" data-aos="fade-right"
                 data-aos-anchor="#example-anchor"
                 data-aos-offset="500"
                 data-aos-duration="500">
                <div class="title-option">
                    <label class="desc-option"><b>ALTERAR</b><span class="desc-option-span"> CONTRATO</span></label>
                </div>
                <div class="icon-option">
                    <figure class="figure-icon">
                        <img src="../images/editar_contrato.png" class="img-icon" id="img-icon-editar-contrato" alt="editar-contrato-pesquisar">
                    </figure>
                </div>
            </div>
            <div class="menu-home" id="relatorio" style="display:none;" data-aos="fade-left"
                 data-aos-anchor="#example-anchor"
                 data-aos-offset="500"
                 data-aos-duration="500">
                <div class="title-option">
                    <label class="desc-option"><b>RELATÓRIO</b></label>
                </div>
                <div class="icon-option">
                    <figure class="figure-icon">
                        <img src="../images/lupa.png" class="img-icon" id="img-icon-lupa" alt="lupa-pesquisar">
                    </figure>
                </div>
            </div>
        </nav>
        <div id="list" data-aos="zoom-in" >
            <div class="container-list">
                <div class="title-list">
                    <label class="desc-title-list">Próximos vencimentos</label>
                </div>
                <div class="title-list-tb">
                    <div class="div-desc">Descrição</div>
                    <div class="div-contrato">Contrato</div>
                    <div class="div-data">Data</div>
                </div>
                <div class="table-list" id="result">
                    <!--CONTEUDO-->
                    
                </div>
            </div>

        </div>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

        <script  type="text/javascript">
            $("#cadastrar").click(function () {
                location.href = 'cadastro_contrato.php';
            });
            $(document).ready(function () {
                document.getElementById("result").innerHTML = "<div class='center-img'><img src='../images/loading.gif' alt='imgLoading' class='img-loading'></div>";
                callApi();
            });

            function callApi() {
                $.ajax({
                    url: "../api/result.php",
                    method: "post",
                    data: {request: "contratos_home"},
                    success: function (data)
                    {
                        document.getElementById("result").innerHTML = data;
                    }
                });
            }
        </script>
    </body>
</html>