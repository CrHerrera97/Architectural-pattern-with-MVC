<?php
require_once '../config/loader.php';


$codprograma = filter_input(INPUT_GET, "cod");

use App\Controllers\ProgramaController;

$objProgramaController = new ProgramaController();
$registros = $objProgramaController->getProgramas($codprograma);
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Proyecto WEB-MVC</title>
        <!--Primero coloco los estilos css--> 
        <link href="styles/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="styles/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <!--Segundo colocamos los javascript en orden--> 
        <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
    </head>
    <body class=" container">
        <?php
        require_once 'menu.php';
        ?>
        <h1>
            PROGRAMAS
        </h1>

        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>
                        Codigo Programa
                    </th>
                    <th>
                        Nombre Programa
                    </th>
                    <th>
                        Nombre Facultad
                    </th>

                    <th>
                        Nombre Sede
                    </th>

                </tr>
            </thead>

            <tbody>           
                <?php
                foreach ($registros as $indice => $campo) {

                    echo '<tr>';
                    echo '<td>' . $campo["codprograma"] . '</td>';
                    echo '<td>' . $campo["nombreprograma"] . '</td>';
                    echo '<td>' . $campo["nombrefacultad"] . '</td>';
                    echo '<td>' . $campo["nombresede"] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </body>
</html>

