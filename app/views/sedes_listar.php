<?php
require_once '../config/loader.php';

use App\Controllers\SedesController;

$objSedesController = new SedesController();
$registros = $objSedesController->getSedes();
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
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Sedes</li>
                    <li class="breadcrumb-item active" aria-current="page">Listado sedes</li>
                </ol>
                </nav>
        </header>
        <section>
            <table class="table table-striped table-sm">
                <thead class="table-info">
                    <tr>
                        <th width="10%">Código</th>
                        <th width="90%">Nombre sede</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($registros as $indice => $campo) {
                        echo '<tr>';
                        echo '<td class="text-center">' . $campo["codsede"] . '</a></td>';
                        echo '<td><a href="facultades_listar.php?cod=' . $campo["codsede"] . '">' . $campo["nombresede"] . '</a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </section>     
    </body>
</html>
