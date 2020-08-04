<?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/header.php' ?>
<body>
<?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/nav.php' ?>
    <div class="d-flex justify-content-center mt-3"><h1>Anuncios</h1></div>
    <div class="contenedor-anuncios w-100 h-75 p-5">
        <img src="<?php echo constant('URL') ?>/public/images/anuncio.jpg" class="w-100 h-25" alt="Imagen de prueba para anuncios">
    </div>
    <div class="contenedor-productos-scroll d-flex flex-column w-100 m-4">
        <div class="d-flex justify-content-center m-4 contenedor-titulo-producto">
            <h3>Productos</h3>
        </div>
        <!--#todos-los-productos-->
        
        <div class="wrap">
            <div class="productos-car">
                <div id="todos-los-productos" class="swiper-wrapper">
                </div>
                
            </div>
        </div>
    </div><!--Contenedor principal-->
    <?php include_once $_SERVER["DOCUMENT_ROOT"].'/sistemaventas/views/includes/footer.php'; ?>
    
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>