<?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/header.php' ?>
<body>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/nav.php' ?>
    <div class="d-flex justify-content-center">
        <h1>Producto</h1>
    </div>
    <div class="contenedor-descripcion-infocompra d-flex flex-row align-items-center w-100">
        <div class="contenedor-descripcion-producto w-50">
            <div><img src="<?php echo constant('URL') ?>/public/images/cuete.png" class="w-50 h-50" alt="Producto tal(breve descripcion)"></div><!--Imagen del producto-->
            <div>
                <h3>Descripcion</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni neque quisquam atque repudiandae nulla, minus tempora est possimus natus, tempore culpa obcaecati! Commodi ullam rem repudiandae obcaecati qui velit odio?</p>
            </div>
        </div><!--Descripcion, image, etc-->
        <div class="contenedor-info-compra w-50">
           <div><h3>Nombre del producto</h3></div><!--Nombre del producto-->
           <div><p>$Precio</p></div><!--Precio del producto-->
           <div>
               <form action="">
                   <div>
                       <label for="">Cantidad de productos</label>
                       <input type="number" min="0">
                   </div><!--cantidad de productos-->
                   <button class="btn btn-success m-3">Comprar</button>
               </form>
           </div><!--Formulario para realizar la compra-->
        </div><!--aside de compra-->
    </div><!--contenedor principal-->
    <?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/footer.php'; ?>
</body>
</html>