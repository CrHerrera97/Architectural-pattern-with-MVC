
<nav class = "navbar navbar-expand-lg navbar-dark bg-dark">
    <a class = "navbar-brand" href="index.php">UTS</a>
    <!--boton para cuando se minimiza lla panalla-->
    <button class = "navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#navbarNavDropDown" aria-controls="navbarNavDropDown"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>

    </button>

    <!--Contenido Del Menu-->
    <div class ="collapse navbar-collapse" id="navbarNavDropDown">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarNavDropDown" 
                   role="bottom" data-toggle="dropdown" aria-haspopup="tru"
                   aria-expanded="true">
                    Sedes</a>

                <div class="dropdown-menu" aria-labelledby="navbarNavDropDown">
                    <a class="dropdown-item " href="sedes_listar.php">Listar</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="sedes_administrar.php">Administrar</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="sedes_crear.php">Crear</a>
                </div>

            </li>
        </ul>
    </div>
    
    <div class ="collapse navbar-collapse" id="navbarNavDropDown">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarNavDropDown" 
                   role="bottom" data-toggle="dropdown" aria-haspopup="tru"
                   aria-expanded="true">
                    Facultades</a>

                <div class="dropdown-menu" aria-labelledby="navbarNavDropDown">
                    <a class="dropdown-item " href="facultades_listar.php">Listar</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="facultades_administrar.php">Administrar</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="facultades_crear.php">Crear</a>
                </div>

            </li>
        </ul>
    </div>
    
    <div class ="collapse navbar-collapse" id="navbarNavDropDown">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarNavDropDown" 
                   role="bottom" data-toggle="dropdown" aria-haspopup="tru"
                   aria-expanded="true">
                    Programas</a>

                <div class="dropdown-menu" aria-labelledby="navbarNavDropDown">
                    <a class="dropdown-item " href="programas_listar.php">Listar</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="programas_administrar.php">Administrar</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="programas_crear.php">Crear</a>
                </div>

            </li>
        </ul>
    </div>
    

    
    <div class ="collapse navbar-collapse" id="navbarNavDropDown">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarNavDropDown" 
                   role="bottom" data-toggle="dropdown" aria-haspopup="tru"
                   aria-expanded="true">
                    Estudiantes</a>

                <div class="dropdown-menu" aria-labelledby="navbarNavDropDown">
                    <a class="dropdown-item " href="estudiantes_listar.php">Listar</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="estudiantes_administrar.php">Administrar</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="estudiantes_crear.php">Crear</a>
                </div>
                

            </li>
        </ul>
    </div>   
    
        <div class ="collapse navbar-collapse" id="navbarNavDropDown">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarNavDropDown" 
                   role="bottom" data-toggle="dropdown" aria-haspopup="tru"
                   aria-expanded="true">
                    Programa-Estudiantes</a>

                <div class="dropdown-menu" aria-labelledby="navbarNavDropDown">
                    <a class="dropdown-item " href="relprogest_listar.php">Listar</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="#">Administrar</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="#">Crear</a>
                </div>

            </li>
        </ul>
    </div>
    
   </nav>