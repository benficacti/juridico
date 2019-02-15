<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="icon" href="favicon.png">
        <title></title>
    </head>
    <body>
        <form action="repassaCadastroContrato.php" method="post">
            Numero Contrato<input name="numero" type="number"/><br>
            Contratante<input name="cantrante" type="name"/><br>
            Contratado<input name="contrato" type="name"/><br>
            Objeto<input name="objeto" type="name"/><br>
            Valor Contrato<input name="valor" type="number"/><br>
            Quantidades Parcelas<input name="parcela" type="number"/><br>
            Pagamento Realizado<input name="realizado" type="number"/><br>
            Data Pagamento<input name="Pagamentodata" type="date"/><br>
            Inicio Vigencia<input name="InicioVigencia" type="date"/><br>
            Final Vigencia<input name="FimVigencia" type="date"/><br>
            Vencimento Contrato<input name="VencimentoContrato" type="date"/><br>
            Garantia<input name="garantia" type="name"/><br>
            Tipo de Contrato<input type="radio" name="TipoContrato" value="1">Publico<input type="radio" name="TipoContrato" value="2">Privado<br>
            Obsercações<textarea name="Observacoes" rows="4" cols="10"></textarea>
            <input type="submit" value="Cadastrar" />
        </form>
        <?php
            include '../persistencia/Conexao.php';
            include '../classes/Search.class.php';
        
            $mostar = Search::contratosProximoVencimento();
        ?>

    </body>
</html>
