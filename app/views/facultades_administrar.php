<?php
require_once '../config/loader.php';

use App\Controllers\FacultadesController;

$objFacultadController = new FacultadesController();
$registros = $objFacultadController->getFacul();
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
        <script src="js/confirmarBorradoFacultades.js" type="text/javascript"></script>
    </head>
    <body class="container">
        <?php
        require_once 'menu.php';
        ?>
        <header>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Facultades</li>
                    <li class="breadcrumb-item active" aria-current="page">Administrar Facultades</li>
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
                        $msgTxt = "Facultad eliminada con éxito";
                        break;
                    default:
                        $msgTxt = "Error eliminando Facultad";
                }
            }
            ?>
            <span class="float-sm-right text-info"><?php echo $msgTxt; ?></span>
            <table class="table table-striped table-sm">
                <thead class="table-info">
                    <tr>
                        <th width="10%">Código Facultad</th>
                        <th width="30%">Nombre Facultad</th>
                        <th width="30%">Nombre Sede</th>
                        <th width="10%">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($registros as $indice => $campo) {
                        echo '<tr>';
                        echo '<td class="text-center">' . $campo["codfacultad"] . '</a></td>';
                        echo '<td><a href="programas_listar.php?cod=' . $campo["codfacultad"] . '">' . $campo["nombrefacultad"] . '</a></td>';
                        echo '<td>' . $campo["nombresede"] . '</td>';
                        echo '<td>';

                        echo '<a href="facultades_editar.php?codigo=' . $campo["codfacultad"] . '"><i class="far fa-edit" style="color:green"></i></a>&nbsp';

                        if ($campo["hijos"] > 0) {
                            echo '<i class="far fa-trash-alt" style="color: #92998B" />';
                        } else {
                            echo '<a href="#" data-toggle="modal" id="' . $campo["codfacultad"] . '" data-target="#modalRemoveFacultad" title="' . $campo["nombrefacultad"] . '"><i class="far fa-trash-alt" style="color: #FF5353" /></a>';
                        }
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <!--Inicio: Modal borrar sede-->
        <div class="modal fade" id="modalRemoveFacultad" tabindex="-2" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="text-danger">Advertencia</span>
                    </div>

                    <div class="modal-body">
                        ¿Está seguro que desea eliminar la Facultad?<p></p>
                        <span id="nombreFacultad" class="text-danger">ttt</span>

                        <form id="frmRemove" method="POST" action="facultades_borrar.php">
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
