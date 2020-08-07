<?php
    require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/libs/controller.php');
    require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/libs/imageprocessing.php');
    require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/libs/validatefields.php');
    class Producto extends Controller{
        
        function __construct(){
            parent::__construct();
            
            //$this->view->mensaje = "Hay un error al cargar el recurso";
            
            //echo "<p>Controlador Index</p>";
        }
    
        function render($param = null){
            if($param){
                //un error 
                echo 'null';
                $this->view->render('producto/producto', 'Producto');
            }
            
        }
        public function verProductosPorCategoria($param=null){
            echo $this->model->getAll();
        }
        public function nuevoProducto(){
            $jsonRes = array('ok'=>0);
            $validateFields = new ValidateFields();
            //insertProduct:model
            if($validateFields->checkFields($_POST)){
                $refimage = 'not-product.jpg';
                $imageProvcessing = new ImageProcessing();
                if($imageProvcessing->tratamientoImagenes($_FILES, 'imgproducto') &&
                    $imageProvcessing->guardarImagenPerfil($_FILES['imgproducto'], dirname(realpath(__FILE__),2), $_POST['nombreproducto'], '\\assets\\imgproductos\\')){
                        $refimage = $_FILES['imgproducto']['name'];
                        $jsonRes['img'] = 1;
                }else{
                    $jsonRes['img'] = 0;
                }

                $arrayDataProduc = array(
                    $_POST['nombreproducto'],
                    $_POST['descripcionproducto'],
                    $_POST['nombreproducto'].'/'.$refimage,
                    $_POST['precioproducto']
                );
                if($this->model->insertProduct($arrayDataProduc)){
                    $jsonRes['ok'] = 1;
                }
            }
            echo json_encode($jsonRes);
        }
        public function productoDetalle(array $arrayParam = null):void{
            if(!is_numeric($arrayParam[0])){
                header('Location: http://localhost/sistemaventas/'.$arrayParam[0]);
            }
            $id = $arrayParam[0];
            $data = $this->model->getProductById([$id]);
            $this->view->render('producto/producto', 'Producto | '.$data['data']['nombre'], $data );
        }
        public function pruebaProducto(){
            echo 'Files';
            var_dump($_FILES);
            echo 'Post';
            var_dump($_POST);
        }
    }

?>