<?php
include 'classes/Search.class.php';
include 'persistencia/Conexao.php';

    $usuario = $_SESSION['usuario'] ;
   
    

?>

<div class="img-user"><img src="img/police.png"/></div>
<label class="nome-user"><?php echo $usuario;?></label>
<label class="conta-user">Minha conta <div class="icon-nav">aa</div></label>