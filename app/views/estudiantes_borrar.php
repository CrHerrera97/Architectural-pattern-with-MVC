<?php
require_once '../config/loader.php';

$CodEstudiante= filter_input(INPUT_POST, "cod");

use App\Controllers\EstudiantesController;

$objEstudiantesController= new EstudiantesController();
if ($objEstudiantesController->borrarEstudiante($CodEstudiante)){
    header("location: estudiantes_administrar.php?msg=1");
    exit();
}
header("location: estudiantes_administrar.php?msg=2");

