<?php

include '../persistencia/Conexao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Search
 *
 * @author USUARIO
 */
class Search {

    //put your code here



    public function TiposLog($idLog) {
        try {

            $sql = 'SELECT DESC_TIPO_LOG FROM TIPO_LOG WHERE ID_TIPO_LOG = "' . $idLog . '"';
            $sqll = Conexao::$instance->prepare($sql);
            if ($sqll->execute()) {
                $count = $sqll->rowCout();
                if ($count > 0) {
                    foreach ($sqll->fetchAll(PDO::FETCH_OBJ) as $dados) {
                        return $dados->DESC_TIPO_LOG;
                    }
                }
            }
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Falha ao obter Log';
        }
    }

}
