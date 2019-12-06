<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author José Rubens
 */
class usuario {
    
    private $_nomeUsuario;
    private $_emailUsuario;
    private $_idSetorUsuario;
    
    function __construct($_nomeUsuario, $_emailUsuario, $_idSetorUsuario) {
        $this->_nomeUsuario = $_nomeUsuario;
        $this->_emailUsuario = $_emailUsuario;
        $this->_idSetorUsuario = $_idSetorUsuario;
    }
    
    function get_nomeUsuario() {
        return $this->_nomeUsuario;
    }

    function get_emailUsuario() {
        return $this->_emailUsuario;
    }

    function get_idSetorUsuario() {
        return $this->_idSetorUsuario;
    }

    function set_nomeUsuario($_nomeUsuario) {
        $this->_nomeUsuario = $_nomeUsuario;
    }

    function set_emailUsuario($_emailUsuario) {
        $this->_emailUsuario = $_emailUsuario;
    }

    function set_idSetorUsuario($_idSetorUsuario) {
        $this->_idSetorUsuario = $_idSetorUsuario;
    }



}
