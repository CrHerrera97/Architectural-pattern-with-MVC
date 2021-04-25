<?php

namespace App\Models;

class Estudiantes extends Conexion {

    public function obtener() {

        $sql = "SELECT e.codestudiante, e.documento, e.nombres, e.apellidos, e.correo, e.fechanac, e.genero FROM estudiantes e ";
        $recurso = $this->_conn->prepare($sql);
        $recurso->execute();
        $filas = $recurso->fetchAll(2);
        return $filas;
    }
    public function obtener2() {
        $sql = "SELECT e.codestudiante,e.documento, e.nombres,e.apellidos,e.genero, ";
        $sql .= "(SELECT count(codestudiante) FROM relprogest WHERE codestudiante = e.codestudiante) as hijos ";
        $sql .= "FROM estudiantes e;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->execute();
        $filas = $recurso->fetchAll(2);
        return $filas;
    }
    
    public function obtenerTodas() {
        $sql = "SELECT e.codestudiante, e.documento, e.nombres, e.apellidos, e.correo, e.fechanac, e.genero FROM estudiantes e ";
//        $sql .= "INNER JOIN facultades f ON p.codfacultad=f.codfacultad;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->execute();
        $filas = $recurso->fetchAll(2);
        return $filas;
    }
    
    public function grabar($Documeto,$Nombres,$Apellidos,$Correo,$FechaNac,$Genero) {
        $sql = "INSERT INTO estudiantes(documento, nombres, apellidos, correo, fechanac, genero) VALUES ('{$Documeto}','{$Nombres}','{$Apellidos}','{$Correo}','{$FechaNac}','{$Genero}');";
        $recurso = $this->_conn->prepare($sql);
        $resultado = $recurso->execute();
        return $resultado;
    }
    
    public function borrar($codEstudiante) {
        $sql = "DELETE FROM estudiantes WHERE codestudiante = ?;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->bindParam(1, $codEstudiante);
        $resultado = $recurso->execute();
        //Inicio: Depurar código
//        echo '<pre>';
//        $recurso->debugDumpParams();
//        echo '</pre>';
//        exit();
        //Fin: Depurar código
        return $resultado;
    }

    public function obtenerXcodigo($codigoestudiante) {
        $sql = "SELECT codestudiante, nombres FROM estudiantes  WHERE codestudiante = ?;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->bindParam(1, $codigoestudiante);
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
    
    public function actualizar($nombres,$codigoestudiante) {
        $sql = "UPDATE estudiantes SET nombres=? WHERE codestudiante = ?;";
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
