<?php
    require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/libs/controller.php');
    class SobreNosotros extends Controller{
        
        function __construct(){
            parent::__construct();
            
            //$this->view->mensaje = "Hay un error al cargar el recurso";
            
            //echo "<p>Controlador Index</p>";
        }
    
        function render(){
            echo '      ******render******** ';
            $this->view->render('sobrenosotros/sobrenosotros', 'Registro');
        }
    }

?>