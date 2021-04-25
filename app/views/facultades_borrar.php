<?php
require_once '../config/loader.php';

$codFacultad= filter_input(INPUT_POST, "cod");

use App\Controllers\FacultadesController;

$objFacultadController = new FacultadesController();
if ($objFacultadController->borrarfacultad($codFacultad)){
    header("location: facultades_administrar.php?msg=1");
    exit();
}
header("location: facultades_administrar.php?msg=2");

