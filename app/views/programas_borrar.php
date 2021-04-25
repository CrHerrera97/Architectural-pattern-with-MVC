<?php
require_once '../config/loader.php';

$CodPrograma= filter_input(INPUT_POST, "cod");

use App\Controllers\ProgramaController;

$objProgramaController= new ProgramaController();
if ($objProgramaController->borrarPrograma($CodPrograma)){
    header("location: programas_administrar.php?msg=1");
    exit();
}
header("location: programas_administrar.php?msg=2");

