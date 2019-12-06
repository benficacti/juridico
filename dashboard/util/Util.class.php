<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Util
 *
 * @author USUARIO
 */
class Util {

    public function geradorSenha() {

        $senha = "";
        $senha .= "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // contem as letras maiúsculas
        $senha .= "abcdefghijklmnopqrstuvyxwz"; // contem as letras minusculas
        $senha .= "0123456789"; // contem os números
        //$senha .= "!@#$%¨&*()_+=";


        return $newSenha = substr(str_shuffle($senha), 1, 5);
    }

}
