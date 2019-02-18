<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="icon" href="favicon.png">
        <title></title>
    </head>
    <body>






        <form action="api.php" method="post">
            <input type="hidden" name="request" value="cadastro_contrato">
            Numero Contrato<input name="numero" type="number"/><br>
            Tipo de Contrato<input type="radio" name="TipoContrato" value="1">Publico<input type="radio" name="TipoContrato" value="2">Privado<br>
            Contratante<input name="cantrante" type="name"/><br>
            Contratado<input name="contrato" type="name"/><br>
            Concorrencia<input name="concorrencia" type="name"/><br>
            Inicio Vigencia<input name="InicioVigencia" type="date"/><br>
            Final Vigencia<input name="FimVigencia" type="date"/><br>
            Valor Contrato<input name="valor" type="number"/><br>
            Quantidades Parcelas<input name="parcela" type="number"/><br>
            Valor das Parcelas<input name="valorParcela" type="number"/><br>
            Data Pagamento Parcelas<input name="Pagamentodata" type="date"/><br>
            Parcelas Pagas<input name="Parcelaspagas" type="number"/><br>
            Valor Total pago<input name="valorTotalPago" type="number"/><br>
            Vencimento Contrato<input name="VencimentoContrato" type="date"/><br>


            <input type="submit" value="Cadastrar" />
        </form>



        <?php
        // include '../persistencia/Conexao.php';
        //  include '../classes/Search.class.php';
        //  $mostar = Search::contratosProximoVencimento();
        ?>

    </body>
</html>
