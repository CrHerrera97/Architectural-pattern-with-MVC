<?php
require_once '../config/loader.php';

$codEstudiante= filter_input(INPUT_POST, "codestudiante");
$codPrograma = filter_input(INPUT_POST, "codprograma");

use App\Controllers\RelprogestController;

$objRelprogestController = new RelprogestController;
if ($objRelprogestController->grabar($codEstudiante, $codPrograma)){
    header("location: relprogest_crear.php?msg=1");
}
header("location: relprogest_crear.php?msg=2");
