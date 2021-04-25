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
                    <li class="breadcrumb-item active" aria-current="page">Programas</li>
                    <li class="breadcrumb-item active" aria-current="page">Crear Programas</li>
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
                                $msgTxt = "Programa creada con éxito";
                                break;
                            default:
                                $msgTxt = "Error creando Programa";
                        }
                    }
                    ?>
                    <span class="float-sm-right text-info"><?php echo $msgTxt; ?></span>
                </div>
                <div class="card-body">
                    <form id="frmProgramasCrear" name="frmProgramasCrear" method="post" action="programas_crear2.php">
                        <div class="form-group">
                            <label for="nombreprograma">Nombre del Programa</label>
                            <input id="nombreprograma" name="nombreprograma" type="text" class="form-control form-control-sm col-5" placeholder="Nombre del Programa">
                        </div>

                        <div>
                            <label for="nombreprograma">Seleccione la Facultad</label>
                            <select name="codfacultad" class="form-control form-control-sm col-5">
                                <option value="">Seleccione la Facultad</option>
                                <?php
                                foreach ($registros as $indice => $campo) {
                                    echo '<option value="' . $campo["codfacultad"] . '">' . $campo["nombrefacultad"] . '</option>';
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
                $("#frmProgramasCrear").validate({
                    errorClass: 'text-danger small',
                    rules: {
                        nombreprograma: {
                            required: true,
                            minlength: 4
                        },                        
                        codfacultad: {
                            required: true
                        }
                    },
                    messages: {
                        nombreprograma: "El nombre de la facultad es obligatorio, mínimo 4 caracteres",
                        codfacultad: "Debe seleccionar una sede"
                    }
                });
            });
        </script>        
    </body>
</html>
