<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of statusAviso
 *
 * @author USUARIO
 */
class statusAviso {
    private $statusAviso;
    
    
    function __construct($statusAviso) {
        $this->statusAviso = $statusAviso;
    }

    function getStatusAviso() {
        return $this->statusAviso;
    }

    function setStatusAviso($statusAviso) {
        $this->statusAviso = $statusAviso;
    }



}
