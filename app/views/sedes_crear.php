
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
                    <li class="breadcrumb-item active" aria-current="page">Sedes</li>
                    <li class="breadcrumb-item active" aria-current="page">Crear sede</li>
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
                                $msgTxt = "Sede creada con éxito";
                                break;
                            default:
                                $msgTxt = "Error creando la sede";
                        }
                    }
                    ?>
                    <span class="float-sm-right text-info"><?php echo $msgTxt; ?></span>
                </div>
                <div class="card-body">
                    <form id="frmSedeCrear" name="frmSedeCrear" method="post" action="sedes_crear2.php">
                        <div class="form-group">
                            <label for="nombresede">Nombre de la sede</label>
                            <input id="nombresede" name="nombresede" type="text" class="form-control form-control-sm col-5" placeholder="Nombre de la sede">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Crear registro</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#frmSedeCrear").validate({
                    errorClass: 'text-danger small',
                    rules: {
                        nombresede: {
                            required: true,
                            minlength: 4
                        }
                    },
                    messages: {
                        nombresede: "El nombre de la sede es obligatorio, mínimo 4 caracteres"
                    }
                });
            });
        </script>        
    </body>
</html>
