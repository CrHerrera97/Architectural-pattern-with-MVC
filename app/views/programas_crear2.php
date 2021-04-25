<?php
require_once '../config/loader.php';

$nombrePrograma= filter_input(INPUT_POST, "nombreprograma");
$codFacultad = filter_input(INPUT_POST, "codfacultad");

use App\Controllers\ProgramaController;

$objProgramasController = new ProgramaController;
if ($objProgramasController->grabarPrograma($nombrePrograma, $codFacultad)){
    header("location: programas_crear.php?msg=1");
    exit();
}
header("location: programas_crear.php?msg=2");
