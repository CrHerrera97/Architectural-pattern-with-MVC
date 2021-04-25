<?php
require_once '../config/loader.php';

use App\Controllers\EstudiantesController;

$objEstudiantesController = new EstudiantesController();
$registros = $objEstudiantesController->getEstudiantes();
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
            ESTUDIANTES
        </h1>

        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>
                        Codigo
                    </th>
                    <th>
                        Documento
                    </th>
                    <th>
                        Nombres 
                    </th>
                    <th>
                        Apellidos
                    </th>
                    <th>
                        Correo
                    </th>
                    <th>
                        Fecha Nacimiento
                    </th>
                    <th>
                        Genero
                    </th>
                </tr>
            </thead>

            <tbody>           
                <?php
                foreach ($registros as $indice => $campo) {
                    echo '<tr>';
                    echo '<td>' . $campo["codestudiante"] . '</td>';
                    echo '<td>' . $campo["documento"] . '</td>';
                    echo '<td>' . $campo["nombres"] . '</td>';
                    echo '<td>' . $campo["apellidos"] . '</td>';
                    echo '<td>' . $campo["correo"] . '</td>';
                    echo '<td>' . $campo["fechanac"] . '</td>';
                    echo '<td>' . $campo["genero"] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </body>
</html>

