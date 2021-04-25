<?php
require_once '../config/loader.php';

$documentoEstudiante= filter_input(INPUT_POST, "documento");
$nombreEstudiante= filter_input(INPUT_POST, "nombres");
$apellidoEstudiante= filter_input(INPUT_POST, "apellidos");
$correoEstudiante = filter_input(INPUT_POST, "correo");
$fechaNacEstudiante= filter_input(INPUT_POST, "fechanac");
$generoEstudiante= filter_input(INPUT_POST, "genero");

use App\Controllers\EstudiantesController;

$objEstudiantesController = new EstudiantesController;
if ($objEstudiantesController->grabarEstudiante($documentoEstudiante, $nombreEstudiante, $apellidoEstudiante, $correoEstudiante, $fechaNacEstudiante, $generoEstudiante)){
    header("location: estudiantes_crear.php?msg=1");
    exit();
}
header("location: estudiantes_crear.php?msg=2");
