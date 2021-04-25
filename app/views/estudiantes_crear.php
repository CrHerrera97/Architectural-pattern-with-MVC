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
                    Formulario de creación
                    <?php
                    $msgTxt = "";
                    if (isset($_GET["msg"])) {
                        $msg = filter_input(INPUT_GET, "msg");
                        switch ($msg) {
                            case "1":
                                $msgTxt = "Estudiante creado con éxito";
                                break;
                            default:
                                $msgTxt = "Error creando Estudiante";
                        }
                    }
                    ?>
                    <span class="float-sm-right text-info"><?php echo $msgTxt; ?></span>
                </div>
                <div class="card-body">
                    <form id="frmEstudiantesCrear" name="frmEstudiantesCrear" method="post" action="estudiantes_crear2.php">
                        
                        <div class="form-group">
                            <label for="documento">Documento del Estudiante</label>
                            <input id="documento" name="documento" type="text" class="form-control form-control-sm col-5" placeholder="Documento del Estudiante">
                        </div>
                        
                        <div class="form-group">
                            <label for="nombres">Nombres del Estudiante</label>
                            <input id="nombres" name="nombres" type="text" class="form-control form-control-sm col-5" placeholder="Nombres del Estudiante">
                        </div>
                        
                        <div class="form-group">
                            <label for="apellidos">Apellidos del Estudiante</label>
                            <input id="apellidos" name="apellidos" type="text" class="form-control form-control-sm col-5" placeholder="Apellidos del Estudiante">
                        </div>
                        
                        <div class="form-group">
                            <label for="correo">Correo del Estudiante</label>
                            <input id="correo" name="correo" type="text" class="form-control form-control-sm col-5" placeholder="Correo del Estudiante">
                        </div>
                        
                        <div class="form-group">
                            <label for="fechanac">Fecha de Nacimiento del Estudiante</label>
                            <input id="fechanac" name="fechanac" type="text" class="form-control form-control-sm col-5" placeholder="Fecha de Nacimiento del Estudiante">
                        </div>
                        
                        <div class="form-group">
                            <label for="genero">Genero del Estudiante</label>
                            <input id="genero" name="genero" type="text" class="form-control form-control-sm col-5" placeholder="Genero del Estudiante">
                        </div>

                            </select>
                        </div>
                        <br />

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm"> Crear registro</button>
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
                        documento: {
                            required: true,
                            minlength: 10
                        },
                        nombres: {
                            required: true,
                            minlength: 5
                        },                        
                        apellidos: {
                            required: true,
                            minlength: 5
                        },
                        correo: {
                            required: true,
                            minlength: 15
                        },
                        fechanac: {
                            required: true,
                            minlength: 10
                        },
                        genero: {
                            required: true,
                            minlength: 1
                        }
                    },
                    messages: {
                        documento: "El documento del estudiante es obligatorio, mínimo 10 caracteres",
                        nombres: "El nombre del estudiante es obligatorio, mínimo 5 caracteres",
                        apellidos: "El apellido del estudiante es obligatorio, mínimo 5 caracteres",
                        correo: "El correo del estudiante es obligatorio, mínimo 15 caracteres",
                        fechanac: "El Fecha de Nacimiento del estudiante es obligatorio, mínimo 10 caracteres",
                        genero: "El genero del estudiante es obligatorio, mínimo 1 caracter",
                        
                        
                    }
                });
            });
        </script>        
    </body>
</html>
