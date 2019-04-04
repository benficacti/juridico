<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author USUARIO
 */
class login {
    private $usuarioLogin;
    private $senhaLogin;
    
    function getUsuarioLogin() {
        return $this->usuarioLogin;
    }

    function getSenhaLogin() {
        return $this->senhaLogin;
    }

    function setUsuarioLogin($usuarioLogin) {
        $this->usuarioLogin = $usuarioLogin;
    }

    function setSenhaLogin($senhaLogin) {
        $this->senhaLogin = $senhaLogin;
    }


}
