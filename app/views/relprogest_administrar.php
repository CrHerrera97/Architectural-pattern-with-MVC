<?php
require_once '../config/loader.php';

use App\Controllers\EstudiantesController;

$objEstudiantesController = new EstudiantesController();
$registros = $objEstudiantesController->getEstud();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Proyecto Web-MVC</title>
        <!--Primero se incluyen los estilos en orden-->
        <link href="styles/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="styles/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="styles/fontawesome/fontawesome-all.css" rel="stylesheet" type="text/css"/>
        <!--Segundo se incluyen los javascript en orden-->
        <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/confirmarBorradoEstudiantes.js" type="text/javascript"></script>
    </head>
    <body class="container">
        <?php
        require_once 'menu.php';
        ?>
        <header>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Estudiantes</li>
                    <li class="breadcrumb-item active" aria-current="page">Administrar Estudiantes</li>
                </ol>
            </nav>
        </header>
        <section>
            <?php
            $msgTxt = "";
            if (isset($_GET["msg"])) {
                $msg = filter_input(INPUT_GET, "msg");
                switch ($msg) {
                    case "1":
                        $msgTxt = "Estudiante eliminado con éxito";
                        break;
                    default:
                        $msgTxt = "Error eliminando Estudiante";
                }
            }
            ?>
            <span class="float-sm-right text-info"><?php echo $msgTxt; ?></span>
            <table class="table table-striped table-sm">
                <thead class="table-info">
                    <tr>
                        <th width="15%">Código Estudiante</th>
<!--                       <th width="30%">Documento Estudiantes</th>-->
                        <th width="15%">Nombres Estudiantes</th>
                        <th width="15%">Apellidos Estudiantes</th>
<!--                        <th width="30%">Correo Estudiante</th>
                        <th width="30%">Fecha-Nac Estudiantes</th>-->
                        <th width="15%">Genero Estudiantes</th>
                        <th width="10%">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($registros as $indice => $campo) {
                        echo '<tr>';
                        echo '<td class="text-center">' . $campo["codestudiante"] . '</a></td>';
                        echo '<td><a href="relprogest_listar.php?cod=' . $campo["codestudiante"] . '">' . $campo["nombres"] . '</a></td>';
//                        echo '<td>' . $campo["nombres"] . '</td>';
                        echo '<td>' . $campo["apellidos"] . '</td>';
//                        echo '<td>' . $campo["correo"] . '</td>';
//                        echo '<td>' . $campo["fechanac"] . '</td>';
                        echo '<td>' . $campo["genero"] . '</td>';
                        echo '<td>';

                        echo '<a href="estudiantes_editar.php?codigo=' . $campo["codestudiante"] . '"><i class="far fa-edit" style="color:green"></i></a>&nbsp';

                        if ($campo["hijos"] > 0) {
                            echo '<i class="far fa-trash-alt" style="color: #92998B" />';
                        } else {
                            echo '<a href="#" data-toggle="modal" id="' . $campo["codestudiante"] . '" data-target="#modalRemoveEstudiantes" title="' . $campo["nombres"] . '"><i class="far fa-trash-alt" style="color: #FF5353" /></a>';
                        }
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <!--Inicio: Modal borrar sede-->
        <div class="modal fade" id="modalRemoveEstudiantes" tabindex="-2" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="text-danger">Advertencia</span>
                    </div>

                    <div class="modal-body">
                        ¿Está seguro que desea eliminar el estudiante?<p></p>
                        <span id="nombres" class="text-danger">ttt</span>

                        <form id="frmRemove" method="POST" action="estudiantes_borrar.php">
                            <input id="cod" name="cod" type="hidden" value=""/>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Eliminar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin: Modal borrar sede-->
    </body>
</html>
