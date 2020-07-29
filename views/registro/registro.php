<?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/header.php' ?>
<body>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/nav.php' ?>
    <div class="d-flex justify-content-center">
        <h1>Registro</h1>
    </div>
    <div class="d-flex flex-column align-items-center justify-content-center w-100%">
        <div class="w-75 contenedor-form">
            <form class="w-100" enctype="multipart/form-data">
                <div class="form-col justify-content-center align-items-center">
                    <div class="form-row mb-3">
                        <div class="col-md-5 mr-3">
                            <label for="registro-imagen-perfil">Imagen de perfil</label>
                            <input type="file" class="form-control-file" id="registro-imagen-perfil">
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-md-5 mr-3">
                            <label for="registro-nombre-s">Nombre(s)</label>
                            <input type="text" class="form-control" id="registro-nombre-s" placeholder="Nombres(s)" required >
                        </div>
                        <div class="col-md-5">
                            <label for="registro-apellido-s">Apellido(s)</label>
                            <input type="text" class="form-control" id="registro-apellido-s" placeholder="Apellido(s)" required >
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-md-5 mr-3">
                            <label for="registro-nombre-usuario">Nombre de usuario</label>
                            <input type="text" class="form-control" id="registro-nombre-usuario" placeholder="Nombre de usuario" required >
                        </div>
                        <div class="col-md-5">
                            <label for="registro-correo">Correo</label>
                            <input type="email" class="form-control" id="registro-correo" placeholder="Correo" required >
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-md-5 mr-3">
                            <label for="registro-contrasenia">Contraseña</label>
                            <input type="password" class="form-control" id="registro-contrasenia" placeholder="Contraseña" required >
                        </div>
                        <div class="col-md-5">
                            <label for="registro-contrasenia-verificada">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="registro-contrasenia-verificada" placeholder="Confirmar contraseña" required >
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center my-3 mx-4">
                    <button type="submit" id="button-registrar-usuario" class="btn btn-success mt-2 mb-2 w-50">Registrarse</button>
                </div>
                
            </form>
        </div>
        <div class="m-4">
            <a href="iniciosesion">Iniciar sesion</a>
        </div>
        
    </div><!--form para registro-->
    <!---->
    <?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/registrouser.js"></script>
</body>
</html>