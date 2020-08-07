<?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/header.php' ?>
<body>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/nav.php' ?>
    <div class="d-flex justify-content-center">
        <h1>Producto</h1>
    </div>
    <div class="contenedor-descripcion-infocompra d-flex flex-row align-items-center w-100 h-75">
        <div class="contenedor-descripcion-producto w-50 m-3">
            <div><img src="<?php echo constant('URL').'/assets/imgproductos/'.$params['data']['refimagen']; ?>" class="w-75 h-75" alt="Producto tal(breve descripcion)"></div><!--Imagen del producto-->
            <div>
                <div class="mt-3 mb-3"><h3>Descripcion</h3></div>
                <div class="mb-4"><p><?php echo $params['data']['descripcion']; ?></p></div>
            </div>
        </div><!--Descripcion, image, etc-->
        <div class="contenedor-info-compra w-50">
           <div class="mb-3"><h3><?php echo $params['data']['nombre']; ?></h3></div><!--Nombre del producto-->
           <div class="mb-4"><p>Precio: $<?php echo $params['data']['precio']; ?></p></div><!--Precio del producto-->
           <div>
               <form>
                    <input id="id-producto-input" type="text" hidden value="<?php echo $params['data']['idproducto']; ?>">
                    <input id="precio-producto-input" type="text" hidden value="<?php echo $params['data']['precio']; ?>">
                    <div>
                        <label for="">Cantidad de productos</label>
                        <input id="numero-productos" type="number" min="0">
                    </div><!--cantidad de productos--> 
                    <button id="btn-comprar-producto" class="btn btn-success m-3 w-75">Comprar</button>
               </form>
           </div><!--Formulario para realizar la compra-->
        </div><!--aside de compra-->
    </div><!--contenedor principal-->
    <?php
        //var_dump($_GET);
    ?>
    <?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/productocompra.js"></script>
</body>
</html>