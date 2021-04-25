<?php

namespace App\Models;

class Relprogest extends Conexion {

    public function obtenerTodas() {
        $sql = "SELECT p.nombreprograma,e.nombres FROM relprogest rel, programas p, estudiantes e";
        $sql .= " WHERE rel.codprograma=p.codprograma AND rel.codestudiante=e.codestudiante;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->execute();
        $filas = $recurso->fetchAll(2);
        return $filas;
    }

    public function grabar($codEstudiante, $codPrograma) {
        $sql = "INSERT INTO relprogest(codestudiante, codprograma) VALUES ('{$codEstudiante}', '{$codPrograma}');";
        $recurso = $this->_conn->prepare($sql);
        $resultado = $recurso->execute();
        return $resultado;
    }

    public function borrar($codEstudiante,$codPrograma) {
        $sql = "DELETE FROM relprogest WHERE codestudiante = ? AND codprograma = ?;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->bindParam(1, $codEstudiante);
        $recurso->bindParam(2, $codPrograma);
        $resultado = $recurso->execute();
        //Inicio: Depurar código
//        echo '<pre>';
//        $recurso->debugDumpParams();
//        echo '</pre>';
//        exit();
        //Fin: Depurar código
        return $resultado;
    }

    public function obtenerXcodigo($codigoestudiante,$codigoprograma) {
        $sql = "SELECT codestudiante, codprograma FROM relprogest  WHERE codestudiante = ? AND codprograma = ?;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->bindParam(1, $codigoestudiante);
        $recurso->bindParam(2, $codigoprograma);
        $recurso->execute();
        $filas = $recurso->fetchAll(2);
        //Inicio: Depurar código
//        echo '<pre>';
//        $recurso->debugDumpParams();
//        echo '</pre>';
//        exit();
        //Fin: Depurar código
        return $filas[0];
    }

    public function actualizar($codigoEstudiante, $codigoPrograma) {
        $sql = "UPDATE relprogest SET nombres=? WHERE codestudiante = ?;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->bindParam(1, $nombres);
        $recurso->bindParam(2, $codigoestudiante);
        $recurso->execute();
        $resultado = $recurso->fetchAll(2);
        //Inicio: Depurar código
//        echo '<pre>';
//        $recurso->debugDumpParams();
//        echo '</pre>';
//        exit();
        //Fin: Depurar código
        return $resultado;
    }

}
