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
    private $_idUsuarioLogin;
    private $_usuarioLogin;
    private $_senhaLogin;
    private $_idTipoAcesso;
    
    function __construct($_idUsuarioLogin, $_usuarioLogin, $_senhaLogin, $_idTipoAcesso) {
        $this->_idUsuarioLogin = $_idUsuarioLogin;
        $this->_usuarioLogin = $_usuarioLogin;
        $this->_senhaLogin = $_senhaLogin;
        $this->_idTipoAcesso = $_idTipoAcesso;
    }

    function get_idUsuarioLogin() {
        return $this->_idUsuarioLogin;
    }

    function get_usuarioLogin() {
        return $this->_usuarioLogin;
    }

    function get_senhaLogin() {
        return $this->_senhaLogin;
    }

    function get_idTipoAcesso() {
        return $this->_idTipoAcesso;
    }

    function set_idUsuarioLogin($_idUsuarioLogin) {
        $this->_idUsuarioLogin = $_idUsuarioLogin;
    }

    function set_usuarioLogin($_usuarioLogin) {
        $this->_usuarioLogin = $_usuarioLogin;
    }

    function set_senhaLogin($_senhaLogin) {
        $this->_senhaLogin = $_senhaLogin;
    }

    function set_idTipoAcesso($_idTipoAcesso) {
        $this->_idTipoAcesso = $_idTipoAcesso;
    }


}
