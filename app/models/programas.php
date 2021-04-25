<?php

namespace App\Models;

class Programas extends Conexion {

    public function obtener() {
        $sql = "SELECT p.codprograma, p.nombreprograma,f.nombrefacultad,"
                . "s.nombresede FROM programas p INNER JOIN(facultades f INNER JOIN "
                . "sedes s ON f.codsede=s.codsede) ON p.codfacultad=f.codfacultad;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->execute();
        $filas = $recurso->fetchAll(2);
        return $filas;
    }
    
     public function obtener2() {
        $sql = "SELECT p.codprograma, p.nombreprograma,f.codfacultad,f.nombrefacultad, ";
        $sql .= "(SELECT count(codprograma) FROM relprogest WHERE codprograma = p.codprograma) as hijos ";
        $sql .= "FROM programas p,facultades f WHERE f.codfacultad=p.codfacultad;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->execute();
        $filas = $recurso->fetchAll(2);
        return $filas;
    }
    
    public function obtenerTodas() {
        $sql = "SELECT p.codprograma, f.nombrefacultad, p.nombreprograma FROM programas p ";
        $sql .= "INNER JOIN facultades f ON p.codfacultad=f.codfacultad;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->execute();
        $filas = $recurso->fetchAll(2);
        return $filas;
    }
    
    public function grabar($nombrePrograma,$codFacultad) {
        $sql = "INSERT INTO programas(nombreprograma,codfacultad) VALUES ('{$nombrePrograma}','{$codFacultad}');";
        $recurso = $this->_conn->prepare($sql);
        $resultado = $recurso->execute();
        return $resultado;
    }
    
    public function borrar($codPrograma) {
        $sql = "DELETE FROM programas WHERE codprograma = ?;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->bindParam(1, $codPrograma);
        $resultado = $recurso->execute();
        //Inicio: Depurar código
//        echo '<pre>';
//        $recurso->debugDumpParams();
//        echo '</pre>';
//        exit();
        //Fin: Depurar código
        return $resultado;
    }

    public function obtenerXcodigo($codigoprograma) {
        $sql = "SELECT codprograma, nombreprograma FROM programas  WHERE codprograma = ?;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->bindParam(1, $codigoprograma);
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
    
    public function actualizar($nombreprograma,$codigoprograma) {
        $sql = "UPDATE programas SET nombreprograma=? WHERE codprograma = ?;";
        $recurso = $this->_conn->prepare($sql);
        $recurso->bindParam(1, $nombreprograma);
        $recurso->bindParam(2, $codigoprograma);
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
