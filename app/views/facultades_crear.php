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
        <script src="js/jquery.validate.js" type="text/javascript"></script>
    </head>
    <body class="container">
        <?php
        require_once 'menu.php';
        ?>
        <header>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Facultades</li>
                    <li class="breadcrumb-item active" aria-current="page">Crear facultad</li>
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
                                $msgTxt = "Facultad creada con éxito";
                                break;
                            default:
                                $msgTxt = "Error creando Facultad";
                        }
                    }
                    ?>
                    <span class="float-sm-right text-info"><?php echo $msgTxt; ?></span>
                </div>
                <div class="card-body">
                    <form id="frmFacultadCrear" name="frmFacultadCrear" method="post" action="facultades_crear2.php">
                        <div class="form-group">
                            <label for="nombrefacultad">Nombre de la facultad</label>
                            <input id="nombrefacultad" name="nombrefacultad" type="text" class="form-control form-control-sm col-5" placeholder="Nombre de la facultad">
                        </div>

                        <div>
                            <label for="nombrefacultad">Seleccione la sede</label>
                            <select name="codsede" class="form-control form-control-sm col-5">
                                <option value="">Seleccione sede</option>
                                <?php
                                foreach ($registros as $indice => $campo) {
                                    echo '<option value="' . $campo["codsede"] . '">' . $campo["nombresede"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <br />

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Crear registro</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#frmFacultadCrear").validate({
                    errorClass: 'text-danger small',
                    rules: {
                        nombrefacultad: {
                            required: true,
                            minlength: 4
                        },                        
                        codsede: {
                            required: true
                        }
                    },
                    messages: {
                        nombrefacultad: "El nombre de la facultad es obligatorio, mínimo 4 caracteres",
                        codsede: "Debe seleccionar una sede"
                    }
                });
            });
        </script>        
    </body>
</html>
