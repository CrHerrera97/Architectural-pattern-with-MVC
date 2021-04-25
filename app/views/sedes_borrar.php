<?php
require_once '../config/loader.php';

$CodSede= filter_input(INPUT_POST, "cod");

use App\Controllers\SedesController;

$objSedeController = new SedesController();
if ($objSedeController->borrarSede($CodSede)){
    header("location: sedes_administrar.php?msg=1");
    exit();
}
header("location: sedes_administrar.php?msg=2");

