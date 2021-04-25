<?php

namespace App\Models;

class Facultades extends Conexion {

    public function obtener($codSede) {
        $sql = "SELECT f.codfacultad, s.nombresede, f.nombrefacultad FROM facultades f ";
        $sql .= "INNER JOIN sedes s ON f.codsede=s.codsede WHERE f.codsede = {$codSede}";
        $recurso = $this->_conn->prepare($sql);
        $recurso->execute();
        $filas = $recurso->fetchAll(2);
        return $filas   ;
    }
    
    public function obtener2() {
        $sql = "SELECT f.codfacultad, f.nombrefacultad,s.codsede,s.nombresede, ";
        $sql .= "(SELECT count(codFacultad) FROM programas WHERE codfacultad = f.codfacultad) as hijos ";
        $sql .= "FROM facultades f, sedes s WHERE f.codsede=s.codsede;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->execute();
        $filas = $recurso->fetchAll(2);
        return $filas;
    }
    
    public function obtenerTodas() {
        $sql = "SELECT f.codfacultad, s.nombresede, f.nombrefacultad FROM facultades f ";
        $sql .= "INNER JOIN sedes s ON f.codsede=s.codsede;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->execute();
        $filas = $recurso->fetchAll(2);
        return $filas;
    }
    
    public function grabar($nombreFacultad, $codSede) {
        $sql = "INSERT INTO facultades(nombrefacultad, codsede) VALUES ('{$nombreFacultad}', '{$codSede}');";
        $recurso = $this->_conn->prepare($sql);
        $resultado = $recurso->execute();
        return $resultado;
    }
    
    public function borrar($codFacultad) {
        $sql = "DELETE FROM facultades WHERE codfacultad = ?;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->bindParam(1, $codFacultad);
        $resultado = $recurso->execute();
        //Inicio: Depurar código
//        echo '<pre>';
//        $recurso->debugDumpParams();
//        echo '</pre>';
//        exit();
        //Fin: Depurar código
        return $resultado;
    }

    public function obtenerXcodigo($codigofacultad) {
        $sql = "SELECT codfacultad, nombrefacultad FROM facultades  WHERE codfacultad = ?;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->bindParam(1, $codigofacultad);
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
    
    public function actualizar($nombrefacultad,$codigofacultad) {
        $sql = "UPDATE facultades SET nombrefacultad=? WHERE codfacultad = ?;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->bindParam(1, $nombrefacultad);
        $recurso->bindParam(2, $codigofacultad);
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
