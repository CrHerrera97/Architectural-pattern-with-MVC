<?php
require_once '../config/loader.php';

$Nombres= filter_input(INPUT_POST, "nombres");
$codigoEstudiante= filter_input(INPUT_POST, "codestudiante");

use App\Controllers\EstudiantesController;

$objEstudiantesController = new EstudiantesController();
if ($objEstudiantesController->actualizarEstudiantes($Nombres, $codigoEstudiante)){
    header("location: estudiantes_editar.php?msg=2&codigo={$codigoEstudiante}");
    exit();
}
header("location: estudiantes_editar.php?msg=1&codigo={$codigoEstudiante}");
