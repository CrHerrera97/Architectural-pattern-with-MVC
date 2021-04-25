<?php

namespace App\Controllers;

use App\Models\Sedes;

class SedesController {

    public function getSedes() {
        $objSedes = new Sedes();
        $filas = $objSedes->obtener();
        return $filas;
    }

    public function grabarSede($nombreSede) {
        $objSedes = new Sedes();
        return $objSedes->grabar($nombreSede);
    }
    
    public function borrarSede($CodigoSede) {
        $objSedes = new Sedes();
        return $objSedes->borrar($CodigoSede);
    }
    
    public function getSedesXcampo($codigoMiSede) {
        $objSedes = new Sedes();
        $registro = $objSedes->obtenerXcodigo($codigoMiSede);
        return $registro;
    }
    
     public function actualizarSede($nombreSede,$CodigoSede) {
        $objSedes = new Sedes();
        return $objSedes->actualizar($nombreSede,$CodigoSede);
    }

}
