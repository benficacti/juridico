<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <link rel="icon" href="favicon.png">
        <title></title>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>

        <script src="../js/jquery.min.js" type="text/javascript"></script>

        <script src="../js/jquery.maskMoney.js"></script>

    </head>
    <body>

        <div id="list-contract" data-aos="zoom-in" >
            <div class="container-list">
                <div class="title-list">
                    <label class="desc-title-list">Meus Contratos</label>
                </div>
                <div class="title-list-tb">

                    <div class="div-icon-contract"></div>
                    <div class="div-desc-contract">Descrição</div>
                    <div class="div-contrato-contract">Contrato</div>
                    <div class="div-data-contract">
                        <select id="tipo_contrato">
                            <option value="0" selected>Tipo Contrato</option>
                            <option value="1">Público</option>
                            <option value="2">Privado</option>
                        </select>
                    </div>
                    <div class="div-data-contract">
                        <select id="vencimento_contrato">
                            <option value="0" selected>Status Vencimento</option>
                            <option value="1">À vencer</option>
                            <option value="2">Vencido</option>
                        </select>
                    </div>
                </div>
                <div class="table-list" id="result">
                    <!--CONTEUDO-->
                    <div class="listtb"  data-aos="fade-left"
                         data-aos-anchor="#example-anchor"
                         data-aos-offset="400"
                         data-aos-duration="400">

                        <table class="tb-list" id="result">
                            <tr>
                                <td class="td-icon-contract"><img src="../images/editar_contrato.png" class="img-icon-list" alt="contrato-list"></th>
                                <td class="td-desc-contract"><div class="td-desc-list">' . $contratante . '</div></td>
                                <td class="td-contrato-contract">' . $numero . '</td>
                                 <td class="td-tipo-contract">' . $numero . '</td>
                                <td class="td-data-contract">' . $vencimento . '</td>
                            </tr>
                        </table>
                    </div>
                    <div class="listtb"  data-aos="fade-left"
                         data-aos-anchor="#example-anchor"
                         data-aos-offset="400"
                         data-aos-duration="400">

                        <table class="tb-list" id="result">
                            <tr>
                                <td class="td-icon-contract"><img src="../images/editar_contrato.png" class="img-icon-list" alt="contrato-list"></th>
                                <td class="td-desc-contract"><div class="td-desc-list">' . $contratante . '</div></td>
                                <td class="td-contrato-contract">' . $numero . '</td>
                                 <td class="td-tipo-contract">' . $numero . '</td>
                                <td class="td-data-contract">' . $vencimento . '</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>       
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

    </body>

</html>
