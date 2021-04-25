<?php
require_once '../config/loader.php';

$nombreFacultad= filter_input(INPUT_POST, "nombrefacultad");
$codigoFacultad= filter_input(INPUT_POST, "codfacultad");

use App\Controllers\FacultadesController;

$objFacultadesController = new FacultadesController();
if ($objFacultadesController->actualizarFacultad($nombreFacultad, $codigoFacultad)){
    header("location: facultades_editar.php?msg=2&codigo={$codigoFacultad}");
    exit();
}
header("location: facultades_editar.php?msg=1&codigo={$codigoFacultad}");
