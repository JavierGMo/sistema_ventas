<?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/header.php' ?>
<body>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/nav.php' ?>
    
    <div>
        <div id="cont-usuario-panel" class="d-flex h-100">
            <div class="bg-dark mr-5">
                <ul class="prefil-opciones-de-usuario">
                    <li><a id="moveUpdateDataUser" href="#cont-actualizar-datos">Perfil</a></li>
                    <li><a id="moveUploadProduct" href="#subir-producto">Subir producto</a></li>
                    <li><a id="moveUpdatePass" href="#cambiar-contrasenia">Cambiar contraseña</a></li>
                    <li><a id="moveDelAccount" href="#eliminar-cuenta">Eliminar cuenta</a></li>
                </ul>
            </div>
            <div class="d-flex flex-column pt-3">
                <div id="cont-actualizar-datos">
                    <div class="d-flex mt-3 mb-3">
                        <div class="w-25">
                            <img src="<?php echo constant('URL').'/assets/imgprofileusers/'.$_SESSION['usuario']['refimagen'] ?>" alt="imagen de perfil" class="rounded-circle w-75 h-75">
                        </div><!--imagen del usuario-->
                        <div class="w-75">
                            <form>
                                <fieldset id="form-desactivado" disabled>
                                    <div class="d-flex flex-column align-items-center justify-content-center w-100">
                                        <div class="d-flex flex-column mt-3 mb-3 contenedor-inputs-login">
                                            <label for="actualizar-img-perfil">Imagen de perfil</label>
                                            <input type="file" class="pr-5" id="actualizar-img-perfil">
                                        </div>
                                        <div class="d-flex flex-column mt-3 mb-3 contenedor-inputs-login">
                                            <label for="actualizar-nombres-s">Nombre(s)</label>
                                            <input type="text" class="pr-5" id="actualizar-nombres-s" placeholder="Nombres(s)" value="<?php echo $_SESSION['usuario']['nombre']; ?>">
                                        </div>
                                        <div class="d-flex flex-column mt-3 mb-3 contenedor-inputs-login">
                                            <label for="actualizar-apellido-s">Apellidos(s)</label>
                                            <input type="text" class="pr-5" id="actualizar-apellido-s" placeholder="Apellido(s)" value="<?php echo $_SESSION['usuario']['apellido']; ?>">
                                        </div>
                                        <button id="btn-actualizar-datos" class="btn btn-success mb-2 w-25">Actualizar</button>
                                    </div>
                                </fieldset>
                                
                            </form>
                            <div class="d-flex justify-content-center">
                                <button id="btn-edit-confirm-data" class="btn btn-primary">Editar <i class="fa fa-edit"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Datos-->
                <div id="subir-producto" class="oculto">
                    <form >
                        <div class="d-flex flex-column align-items-center justify-content-center w-100">
                            <div class="d-flex flex-column mt-3 mb-3 contenedor-inputs-login">
                                <label for="img-producto">Imagen del producto</label>
                                <input type="file" class="pr-5" id="img-producto">
                            </div>
                            <div class="d-flex flex-column mt-3 mb-3 contenedor-inputs-login">
                                <label for="nombre-producto">Nombre producto</label>
                                <input type="text" class="pr-5" id="nombre-producto" placeholder="Nombre" required>
                            </div>
                            <div class="d-flex flex-column mt-3 mb-3 contenedor-inputs-login">
                                <label for="descripcion-producto">Descripcion producto</label>
                                <input type="text" class="pr-5" id="descripcion-producto" placeholder="Descripcion producto" required>
                            </div>
                            <div class="d-flex flex-column mt-3 mb-3 contenedor-inputs-login">
                                <label for="precio-producto">Precio</label>
                                <input type="text" class="pr-5" id="precio-producto" placeholder="Precio producto" required>
                            </div>
                            <button id="btn-subir-producto" class="btn btn-success mb-2 w-25">Subir producto</button>
                        </div>
                    </form>
                </div>
                <!--Subir producto-->
                <div id="cambiar-contrasenia" class="oculto">
                    <form >
                        <div class="d-flex flex-column align-items-center justify-content-center w-100">
                            <div class="d-flex flex-column mt-3 mb-3 contenedor-inputs-login">
                                <label for="nueva-contrasenia">Nueva contraseña</label>
                                <input type="password" class="pr-5" id="nueva-contrasenia" placeholder="Nueva contraseña" required>
                            </div>
                            <div class="d-flex flex-column mt-3 mb-3 contenedor-inputs-login">
                                <label for="confirm-contrasenia-nueva">Confirmar contraseña nueva</label>
                                <input type="password" class="pr-5" id="confirm-contrasenia-nueva" placeholder="Confirmar contraseña nueva" required>
                            </div>
                            <button id="btn-cambiar-contrasenia" class="btn btn-success mb-2">Cambiar contraseña</button>
                        </div>
                    </form>
                </div>
                <!--Cambiar contraseña-->
                <div id="eliminar-cuenta" class="oculto">
                    <div class="d-flex flex-column">
                        <div class="m-4">
                            <h3>Eliminar cuenta</h3>
                            <button id="btn-pre-eliminar" class="btn btn-danger">Eliminar cuenta</button>
                        </div>
                        <div id="form-eliminar-cuenta" class="oculto">
                            <form>
                                <div class="d-flex flex-column align-items-center justify-content-center w-100">
                                    <div class="d-flex flex-column mt-3 mb-3 contenedor-inputs-login">
                                        <label for="contrasenia-verificar-eliminacion">Escriba su contraseña</label>
                                        <input type="password" class="pr-5" id="contrasenia-verificar-eliminacion" placeholder="Escriba su contraseña" required>
                                    </div>
                                    <button id="btn-contrasenia-seguridad-del" class="btn btn-danger mb-2">Borrar cuenta</button>
                                </div>                            
                            </form>
                        </div>
                    </div>
                </div>
                <!--Eliminar cuenta-->
            </div><!--contendor column-->
            
        </div><!--datos del usuario-->
    </div><!--Contenido del usuario-->
    <!---->
    <?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/perfilusuario.js"></script>
    
</body>
</html>