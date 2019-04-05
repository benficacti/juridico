<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of log
 *
 * @author USUARIO
 */
class log {

    private $idTipoLog;
    private $dataLog;
    private $horaLog;
    private $idLoginLog;
    private $ipLog;
    private $macAddressLog;

    function __construct($idTipoLog, $dataLog, $horaLog, $idLoginLog, $ipLog, $macAddressLog) {
        $this->idTipoLog = $idTipoLog;
        $this->dataLog = $dataLog;
        $this->horaLog = $horaLog;
        $this->idLoginLog = $idLoginLog;
        $this->ipLog = $ipLog;
        $this->macAddressLog = $macAddressLog;
    }

    function getIdTipoLog() {
        return $this->idTipoLog;
    }

    function getDataLog() {
        return $this->dataLog;
    }

    function getHoraLog() {
        return $this->horaLog;
    }

    function getIdLoginLog() {
        return $this->idLoginLog;
    }

    function getIpLog() {
        return $this->ipLog;
    }

    function getMacAddressLog() {
        return $this->macAddressLog;
    }

    function setIdTipoLog($idTipoLog) {
        $this->idTipoLog = $idTipoLog;
    }

    function setDataLog($dataLog) {
        $this->dataLog = $dataLog;
    }

    function setHoraLog($horaLog) {
        $this->horaLog = $horaLog;
    }

    function setIdLoginLog($idLoginLog) {
        $this->idLoginLog = $idLoginLog;
    }

    function setIpLog($ipLog) {
        $this->ipLog = $ipLog;
    }

    function setMacAddressLog($macAddressLog) {
        $this->macAddressLog = $macAddressLog;
    }

}
