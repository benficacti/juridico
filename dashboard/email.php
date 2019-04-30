<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="js/jquery.min.js"></script>

        <title></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        </nav>
        <div class="container-ticket" >
            <table class="table" id="tb_vendas" style=" text-align: center;" >
                <thead>
                    <tr>
                        <th scope="col">
                            <input type="email" name="email" id="email" placeholder="DIGITE SEU E-MAIL" data-value="0"  class="form-control"autocomplete="off">
                        </th>
                    </tr>

                    <tr>
                        <th>
                            <button id="enviar" style="cursor:pointer;border-radius:10px; padding:3px;">Enviar redefinar por E-mail</button>
                        </th>
                    </tr>

                </thead>
            </table>
        </div>
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
