<?php
require_once '../config/loader.php';

$nombreSede= filter_input(INPUT_POST, "nombresede");
$codigoSede= filter_input(INPUT_POST, "codsede");

use App\Controllers\SedesController;

$objSedeController = new SedesController();
if ($objSedeController->actualizarSede($nombreSede,$codigoSede)){
    header("location: sedes_editar.php?msg=2&codigo={$codigoSede}");
    exit();
}
header("location: sedes_editar.php?msg=1&codigo={$codigoSede}");
