<?php

namespace App\Controllers;

use App\Models\Facultades;

class FacultadesController {

    public function getFacultades($codSede) {
        $objFacultades = new Facultades();
        $filas = $objFacultades->obtener($codSede);
        return $filas;
    }
    
    public function getFacul() {
        $objFacultades = new Facultades();
        $filas = $objFacultades->obtener2();
        return $filas;
    }
    
    public function getFacultadesTodas() {
        $objFacultades = new Facultades();
        $filas = $objFacultades->obtenerTodas();
        return $filas;
    }
    
    public function grabarFacultad($nombreFacultad, $codSede) {
        $objFacultades = new Facultades();
        return $objFacultades->grabar($nombreFacultad, $codSede);
    }
    public function borrarfacultad($CodigoFacultad) {
        $objFacultades = new Facultades();
        return $objFacultades->borrar($CodigoFacultad);
    }
    
    public function getFacultadXcampo($codigoMiFacultad) {
        $objFacultades = new Facultades();
        $registro = $objFacultades->obtenerXcodigo($codigoMiFacultad);
        return $registro;
    }
    
     public function actualizarFacultad($nombreFacultad,$CodigoFacultad) {
        $objFacultades = new Facultades();
        return $objFacultades->actualizar($nombreFacultad,$CodigoFacultad);
    }

}
