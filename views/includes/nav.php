<nav class="navbar navbar-expand-lg navbar-dark contenedor-nav">
    <a class="navbar-brand logo" href="home">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline pl-4 pr-3 mt-lg-0 mt-sm-4">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form><!--Buscador-->
        <ul class="navbar-nav lista-de-opciones">
            <li class="nav-item active mb-sm-4 mt-lg-0 mt-sm-4">
                <a class="" href="home">Home</a>
            </li>
            <li class="nav-item mb-sm-4">
                <a class="" href="ayuda">Ayuda</a>
            </li>
            <?php if(!isset($_SESSION["usuario"])): ?>
            <li class="nav-item mb-sm-4">
                <a class="" href="sobrenosotros">Sobre nosotros</a>
            </li>
            <li class="nav-item mb-sm-4">
                <a class="btn btn-primary" href="iniciosesion">Iniciar sesion</a>
            </li>
            <li class="nav-item mb-sm-4">
                <a class="btn btn-light" href="registro">Registrarse</a>
            </li>
            <?php endif ?>
            <?php if(isset($_SESSION["usuario"])): ?>
                <li class="nav-item mb-sm-4">
                    <a class="btn btn-primary" href="usuario"><i class="fa fa-user"></i> Perfil</a>
                </li>
                <li class="nav-item mb-sm-4">
                    <a id="cerrar-sesion" class="btn btn-light" href="http://localhost/sistemaventas/usuario/logOut"><i class="fa fa-times"></i> Cerrar Session</a>
                </li>
            <?php endif ?>
        </ul><!--menu de vistas-->
    </div>
</nav><!--nav-->