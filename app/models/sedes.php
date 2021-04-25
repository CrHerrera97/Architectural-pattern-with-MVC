<?php

namespace App\Models;

class Sedes extends Conexion {

    public function obtener() {
        $sql = "SELECT s.codsede, s.nombresede, ";
        $sql .= "(SELECT count(codsede) FROM facultades WHERE codsede = s.codsede) as hijos ";
        $sql .= "FROM sedes s";
        $recurso = $this->_conn->prepare($sql);
        $recurso->execute();
        $filas = $recurso->fetchAll(2);
        return $filas;
    }

    public function grabar($nombreSede) {
        $sql = "INSERT INTO sedes(nombresede) VALUES ('{$nombreSede}');";
        $recurso = $this->_conn->prepare($sql);
        $resultado = $recurso->execute();
        return $resultado;
    }

    public function borrar($codSede) {
        $sql = "DELETE FROM sedes WHERE codsede = ?;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->bindParam(1, $codSede);
        $resultado = $recurso->execute();
        //Inicio: Depurar código
//        echo '<pre>';
//        $recurso->debugDumpParams();
//        echo '</pre>';
//        exit();
        //Fin: Depurar código
        return $resultado;
    }

    public function obtenerXcodigo($codigosede) {
        $sql = "SELECT codsede, nombresede FROM sedes  WHERE codsede = ?;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->bindParam(1, $codigosede);
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
    
    public function actualizar($nombresede,$codigosede) {
        $sql = "UPDATE sedes SET nombresede=? WHERE codsede = ?;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->bindParam(1, $nombresede);
        $recurso->bindParam(2, $codigosede);
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
