<?php
    require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/libs/controller.php');
    class Producto extends Controller{
        
        function __construct(){
            parent::__construct();
            
            //$this->view->mensaje = "Hay un error al cargar el recurso";
            
            //echo "<p>Controlador Index</p>";
        }
    
        function render(){
            $this->view->render('producto/producto', 'Producto');
        }
        public function verProductosPorCategoria($param=null){
            echo $this->model->getAll();
        }
    }

?>