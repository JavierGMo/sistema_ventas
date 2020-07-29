<?php
    require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/libs/controller.php');
    require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/libs/imageprocessing.php');
    require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/libs/validatefields.php');
    class Registro extends Controller{
        
        function __construct(){
            parent::__construct();
            
            //$this->view->mensaje = "Hay un error al cargar el recurso";
            
            //echo "<p>Controlador Index</p>";
        }
    
        function render(){
            $this->view->render('registro/registro', 'Registro');
        }
    }

?>