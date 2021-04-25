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
        <link href="styles/fontawesome/fontawesome-all.css" rel="stylesheet" type="text/css"/>
        <!--Segundo se incluyen los javascript en orden-->
        <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/confirmarBorrado.js" type="text/javascript"></script>
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
                    <li class="breadcrumb-item active" aria-current="page">Administrar sedes</li>
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
                        $msgTxt = "Sede eliminada con éxito";
                        break;
                    default:
                        $msgTxt = "Error eliminando sede";
                }
            }
            ?>
            <span class="float-sm-right text-info"><?php echo $msgTxt; ?></span>
            <table class="table table-striped table-sm">
                <thead class="table-info">
                    <tr>
                        <th width="10%">Código</th>
                        <th width="80%">Nombre sede</th>
                        <th width="10%">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($registros as $indice => $campo) {
                        echo '<tr>';
                        echo '<td class="text-center">' . $campo["codsede"] . '</a></td>';
                        echo '<td><a href="facultades_listar.php?cod=' . $campo["codsede"] . '">' . $campo["nombresede"] . '</a></td>';

                        echo '<td>';
                        
                        echo '<a href="sedes_editar.php?codigo='.$campo["codsede"].'"><i class="far fa-edit" style="color:green"></i></a>&nbsp';
                        
                        if ($campo["hijos"] > 0) {
                            echo '<i class="far fa-trash-alt" style="color: #92998B" />';
                        } else {
                            echo '<a href="#" data-toggle="modal" id="' . $campo["codsede"] . '" data-target="#modalRemoveSede" title="' . $campo["nombresede"] . '"><i class="far fa-trash-alt" style="color: #FF5353" /></a>';
                        }
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <!--Inicio: Modal borrar sede-->
        <div class="modal fade" id="modalRemoveSede" tabindex="-2" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="text-danger">Advertencia</span>
                    </div>

                    <div class="modal-body">
                        ¿Está seguro que desea eliminar la sede?<p></p>
                        <span id="nombreSede" class="text-danger">ttt</span>

                        <form id="frmRemove" method="POST" action="sedes_borrar.php">
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
