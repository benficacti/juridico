<?php
if ($_SESSION['tipo_acesso_login'] == 1) {
    echo '<a href="painel.php" class="barra-latera-item" id="item_painel_contrato">Painel</a>';
}
?>
<a href="meus_contratos.php" class="barra-latera-item" id="item_meus_contrato">Meus Contratos</a>
<a href="cadastro_contrato.php" class="barra-latera-item" id="item_cadastro_contrato">Cadastro Contrato</a>
<!--<a href="###" class="barra-latera-item" id="item_cadastro_contrato">Controle de usuario</a>-->
<?php
if ($_SESSION['tipo_acesso_login'] == 1) {
    echo '<a href="controle_usuario.php" class="barra-latera-item" id="item_cadastro_contrato">Controle Usuario</a>';
    echo '<a href="controle_alertas.php" class="barra-latera-item" id="item_cadastro_contrato">Cadastro Alertas</a>';
}
?>
<a href="sair.php" class="barra-latera-item">Logout</a>