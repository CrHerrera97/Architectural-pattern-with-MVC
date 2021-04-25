<?php

namespace App\Controllers;

use App\Models\Estudiantes;

class EstudiantesController {

    public function getEstudiantes() {
        $objEstudiantes = new Estudiantes();
        $filas = $objEstudiantes->obtener();
        return $filas;
    }
    public function getEstud() {
        $objEstudiantes = new Estudiantes();
        $filas = $objEstudiantes->obtener2();
        return $filas;
    }
    
    public function getProgramasTodas() {
        $objEstudiantes = new Estudiantes();
        $filas = $objEstudiantes->obtenerTodas();
        return $filas;
    }
    
    public function grabarEstudiante($documeto,$nombres,$apellidos,$correo,$fechaNac,$genero) {
        $objEstudiantes = new Estudiantes();
        return $objEstudiantes->grabar($documeto, $nombres, $apellidos, $correo, $fechaNac, $genero);
    }
    public function borrarEstudiante($CodigoEstudiante) {
        $objEstudiantes = new Estudiantes();
        return $objEstudiantes->borrar($CodigoEstudiante);
    }
    
    public function getEstudianteXcampo($codigoMiEstudiante) {
        $objEstudiantes = new Estudiantes();
        $registro = $objEstudiantes->obtenerXcodigo($codigoMiEstudiante);
        return $registro;
    }
    
     public function actualizarEstudiantes($nombres,$CodigoEstudiante) {
        $objEstudiantes = new Estudiantes();
        return $objEstudiantes->actualizar($nombres, $CodigoEstudiante);
    }

}
