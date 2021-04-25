<?php
require_once '../config/loader.php';

$codSede = filter_input(INPUT_GET, "cod");

use App\Controllers\FacultadesController;

$objFacultadesController = new FacultadesController();

if (empty($codSede)) {
    $registros = $objFacultadesController->getFacultadesTodas();
} else {
    $registros = $objFacultadesController->getFacultades($codSede);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Proyecto Web-MVC</title>
        <!--Primero se incluyen los estilos en orden-->
        <link href="styles/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="styles/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <!--Segundo se incluyen los javascript en orden-->
        <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
    </head>
    <body class="container">
        <?php
        require_once 'menu.php';
        ?>
        <header>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Facultades</li>
                    <li class="breadcrumb-item active" aria-current="page">Listado facultades</li>
                </ol>
                </na>
        </header>
        <section>
            <?php
            if (!empty($registros)) {
                ?>
                <table class="table table-striped table-sm">
                    <thead class="table-info">
                        <tr>
                            <th width="10%">Código</th>
                            <th width="45%">Nombre facultad</th>
                            <th width="45%">Nombre sede</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($registros as $indice => $campo) {
                            echo '<tr>';
                            echo '<td class="text-center">' . $campo["codfacultad"] . '</td>';
                            echo '<td>' . $campo["nombrefacultad"] . '</td>';
                            echo '<td>' . $campo["nombresede"] . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <?php
            } else {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>No se encontraron registros</strong> Por favor contacte al administrador
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>
        </section>
    </body>
</html>