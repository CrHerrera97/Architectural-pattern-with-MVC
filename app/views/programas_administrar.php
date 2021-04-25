<?php
require_once '../config/loader.php';

use App\Controllers\ProgramaController;

$objProgramaController = new ProgramaController();
$registros = $objProgramaController->getProgram();
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
        <script src="js/confirmarBorradoProgramas.js" type="text/javascript"></script>
    </head>
    <body class="container">
        <?php
        require_once 'menu.php';
        ?>
        <header>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Programas</li>
                    <li class="breadcrumb-item active" aria-current="page">Administrar Programas</li>
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
                        $msgTxt = "Programa eliminado con éxito";
                        break;
                    default:
                        $msgTxt = "Error eliminando Programa";
                }
            }
            ?>
            <span class="float-sm-right text-info"><?php echo $msgTxt; ?></span>
            <table class="table table-striped table-sm">
                <thead class="table-info">
                    <tr>
                        <th width="10%">Código Programa</th>
                        <th width="30%">Nombre Programa</th>
                        <th width="30%">Nombre Facultad</th>
                        <th width="10%">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($registros as $indice => $campo) {
                        echo '<tr>';
                        echo '<td class="text-center">' . $campo["codprograma"] . '</a></td>';
                        echo '<td><a href="relprogest_listar.php?cod=' . $campo["codprograma"] . '">' . $campo["nombreprograma"] . '</a></td>';
                        echo '<td>' . $campo["nombrefacultad"] . '</td>';
                        echo '<td>';
                        
                        echo '<a href="programas_editar.php?codigo='.$campo["codprograma"].'"><i class="far fa-edit" style="color:green"></i></a>&nbsp';
                        
                        if ($campo["hijos"] > 0) {
                            echo '<i class="far fa-trash-alt" style="color: #92998B" />';
                        } else {
                            echo '<a href="#" data-toggle="modal" id="' . $campo["codprograma"] . '" data-target="#modalRemovePrograma" title="' . $campo["nombreprograma"] . '"><i class="far fa-trash-alt" style="color: #FF5353" /></a>';
                        }
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <!--Inicio: Modal borrar sede-->
        <div class="modal fade" id="modalRemovePrograma" tabindex="-2" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="text-danger">Advertencia</span>
                    </div>

                    <div class="modal-body">
                        ¿Está seguro que desea eliminar la sede?<p></p>
                        <span id="nombrePrograma" class="text-danger">ttt</span>

                        <form id="frmRemove" method="POST" action="programas_borrar.php">
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
