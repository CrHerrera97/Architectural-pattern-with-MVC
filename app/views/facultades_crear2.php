<?php
require_once '../config/loader.php';

$nombreFacultad= filter_input(INPUT_POST, "nombrefacultad");
$codSede = filter_input(INPUT_POST, "codsede");

use App\Controllers\FacultadesController;

$objFacultadController = new FacultadesController;
if ($objFacultadController->grabarFacultad($nombreFacultad, $codSede)){
    header("location: facultades_crear.php?msg=1");
    exit();
}
header("location: facultades_crear.php?msg=2");
