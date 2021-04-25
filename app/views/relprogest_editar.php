<?php
require_once '../config/loader.php';

use App\Controllers\EstudiantesController;

$codiguitoEstudiante = filter_input(INPUT_GET, "codigo");
$objEstudiantesController = new EstudiantesController;
$campo = $objEstudiantesController->getEstudianteXcampo($codiguitoEstudiante);
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
        <script src="js/jquery.validate.js" type="text/javascript"></script>
    </head>
    <body class="container">
        <?php
        require_once 'menu.php';
        ?>
        <header>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Estudiantes</li>
                    <li class="breadcrumb-item active" aria-current="page">Crear Estudiantes</li>
                </ol>
                </na>
        </header>
        <section>
            <div class="card">
                <div class="card-header">
                    Formulario de Edicion
                    <?php
                    $msgTxt = "";
                    if (isset($_GET["msg"])) {
                        $msg = filter_input(INPUT_GET, "msg");
                        switch ($msg) {
                            case "1":
                                $msgTxt = "Estudiantes Editado con éxito";
                                break;
                            default:
                                $msgTxt = "Error Editando el Estudiantes";
                        }
                    }
                    ?>
                    <span class="float-sm-right text-info"><?php echo $msgTxt; ?></span>
                </div>
                <div class="card-body">
                    <form id="frmEstudiantesCrear" name="frmEstudiantesCrear" method="post" action="estudiantes_editar2.php">
                        <input id="codestudiante" name="codestudiante" type="hidden" value="<?php echo $campo["codestudiante"]; ?>"/>
                        <div class="form-group">
                            <label for="nombres">Nombre del Estudiante</label>
                            <input id="nombres" name="nombres" type="text" class="form-control form-control-sm col-5" value="<?php echo $campo["nombres"]; ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Editar registro</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#frmEstudiantesCrear").validate({
                    errorClass: 'text-danger small',
                    rules: {
                        nombres: {
                            required: true,
                            minlength: 4
                        }
                    },
                    messages: {
                        nombres: "El nombre del Estudiante es obligatorio, mínimo 5 caracteres"
                    }
                });
            });
        </script>        
    </body>
</html>
