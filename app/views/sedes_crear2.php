<?php
require_once '../config/loader.php';

$nombreSede= filter_input(INPUT_POST, "nombresede");

use App\Controllers\SedesController;

$objSedeController = new SedesController();
if ($objSedeController->grabarSede($nombreSede)){
    header("location: sedes_crear.php?msg=1");
    exit();
}
header("location: sedes_crear.php?msg=2");
