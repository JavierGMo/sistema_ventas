<?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/header.php' ?>
<body>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/nav.php' ?>
    <div class="d-flex justify-content-center my-4"><h1>Inicio de sesion</h1></div>
    
    <div class="contenedor-principal-login w-100">
        <div class="w-100">
            <form class="w-100" action="">
                <div class="d-flex flex-column align-items-center justify-content-center w-100">
                    <div class="d-flex flex-column mt-3 mb-3 contenedor-inputs-login">
                        <label for="login-usuario">Correo o usuario</label>
                        <input type="text" class="pr-5" id="login-usuario" placeholder="Correo o usuario" required>
                    </div>
                    <div class="d-flex flex-column mt-3 mb-3 contenedor-inputs-login">
                        <label for="login-contrasenia">Contraseña</label>
                        <input type="password" class="pr-5" id="login-contrasenia" placeholder="Contraseña" required>
                    </div>
                    <button id="btn-iniciar-sesion" class="btn btn-success mb-2 w-25">Iniciar sesion</button>
                </div>
            </form>
        </div><!--contenedor del formulario-->
        <div class="d-flex justify-content-center my-4">
            <p>¿No tienes cuenta?, <a href="registro">Crea una</a></p>
        </div>
    </div>
    <?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/login.js"></script>
</body>
</html>