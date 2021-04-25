<?php

namespace App\Controllers;

use App\Models\Programas;

class ProgramaController {

    public function getProgramas() {
        $objProgramas = new Programas();
        $filas = $objProgramas->obtener();
        return $filas;
    }
    public function getProgram() {
        $objProgramas = new Programas();
        $filas = $objProgramas->obtener2();
        return $filas;
    }
    
    public function getProgramasTodas() {
        $objProgramas = new Programas();
        $filas = $objProgramas->obtenerTodas();
        return $filas;
    }
    
    public function grabarPrograma($nombrePrograma, $codFacultad) {
        $objProgramas = new Programas();
        return $objProgramas->grabar($nombrePrograma, $codFacultad);
    }
    public function borrarPrograma($CodigoPrograma) {
        $objProgramas = new Programas();
        return $objProgramas->borrar($CodigoPrograma);
    }
    
    public function getProgramaXcampo($codigoMiPrograma) {
        $objProgramas = new Programas();
        $registro = $objProgramas->obtenerXcodigo($codigoMiPrograma);
        return $registro;
    }
    
     public function actualizarPrograma($nombrePrograma,$CodigoPrograma) {
        $objProgramas = new Programas();
        return $objProgramas->actualizar($nombrePrograma, $CodigoPrograma);
    }


}
