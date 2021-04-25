<?php
require_once '../config/loader.php';

$nombrePrograma= filter_input(INPUT_POST, "nombreprograma");
$codigoPrograma= filter_input(INPUT_POST, "codprograma");

use App\Controllers\ProgramaController;

$objProgramaController = new ProgramaController();
if ($objProgramaController->actualizarPrograma($nombrePrograma, $codigoPrograma)){
    header("location: programas_editar.php?msg=2&codigo={$codigoPrograma}");
    exit();
}
header("location: programas_editar.php?msg=1&codigo={$codigoPrograma}");
