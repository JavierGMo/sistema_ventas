<?php
    require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/libs/controller.php');
    require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/libs/validatefields.php');
    class ProductoUsuario extends Controller{
        function __construct(){
            parent::__construct();
        }
        public function registrarCompra():void{
            $jsonRes = array(
                'ok'=>0,
                'session'=>0
            );
            //var_dump($_POST);
            $validateFields = new ValidateFields();
            if($validateFields->checkFields($_POST) && isset($_SESSION['usuario'])){
                $dataCompra = array(
                    $_POST['idproducto'],
                    $_SESSION['usuario']['idusuario'],
                    $_POST['numerodepiezas'],
                    $_POST['total']
                );
                if($this->model->insertProductoUsuario($dataCompra)){
                    $jsonRes['ok'] = 1;
                    $jsonRes['session'] = 1;
                }
            }


            echo json_encode($jsonRes);
        }
        public function pruebaCompra():void{
            var_dump($_POST);
            echo 'Despues del post';
            if(isset($_SESSION['usuario'])){
                echo '    ok    ';
                var_dump($_SESSION);
            }
            
        }
    }
    




?>