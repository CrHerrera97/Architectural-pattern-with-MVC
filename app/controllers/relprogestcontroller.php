<?php

namespace App\Controllers;

use App\Models\Relprogest;

class RelprogestController {
    
    public function getRelprogestTodas() {
        $objRelprogest = new Relprogest();
        $filas = $objRelprogest->obtenerTodas();
        return $filas;
    }
    
    public function grabar($codEstudiante, $codPrograma) {
        $objRelprogest = new Relprogest();
        return $objRelprogest->grabar($codEstudiante, $codPrograma);
    }

}
