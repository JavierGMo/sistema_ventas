<?php
    require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/libs/controller.php');
    require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/libs/imageprocessing.php');
    require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/libs/validatefields.php');
    class Usuario extends Controller{
        
        function __construct(){
            parent::__construct();
            
            //$this->view->mensaje = "Hay un error al cargar el recurso";
            
            //echo "<p>Controlador Index</p>";
        }
    
        function render(){
            $this->view->render('usuario/usuario', 'Usuario');
        }
        public function registrarUsuario(){
            
            $validateFields = new ValidateFields();
            $jsonRes = array('ok'=>0);
            if($validateFields->checkFields($_POST)){
               
               $validateFields->setContrasenia($_POST['contrasenia']);
               $validateFields->setConfirmContrasenia($_POST['confirmarContrasenia']);

               if($validateFields->validatePassword()){
                   //insertar usuarios
                   $refimage = 'not-user-image.jpg';
                   $imageProcessing = new ImageProcessing();
                   if($imageProcessing->tratamientoImagenes($_FILES, 'imgPerfil') &&
                        $imageProcessing->guardarImagenPerfil($_FILES["imgPerfil"], dirname(realpath(__FILE__),2), $_POST['nombreDeUsuario'])){
                       $refimage = $_FILES['imgPerfil']['name'];
                       $jsonRes['img'] = 1;
                   }else{
                    $jsonRes['img'] = 0;
                   }
                    $arrayDataUser = array(
                        $_POST['nombres'],
                        $_POST['apellidos'],
                        $_POST['nombreDeUsuario'],
                        $_POST['correo'],
                        $refimage,
                        $_POST['contrasenia']
                    );
                    
                    if($this->model->insertUser($arrayDataUser)){
                        $jsonRes['ok'] = 1;
                    }
               }
            }
            
            //var_dump($_FILES);
            //echo $this->model;
            echo json_encode($jsonRes);
        }
        public function loginUsuario(){
            session_start();
            $validateFields = new ValidateFields();
            $jsonRes = array();
            if($validateFields->checkFields($_POST)){
                
                $jsonRes = $this->model->getUserByEmailOrUserName($_POST['user'], $_POST['contrasenia']);
                //echo $jsonRes['err'];
                //Hacer el if para confirmar si llego bien la data 
                echo json_encode($jsonRes);

            }else{
                session_destroy();
            }
        }
        public function pruebaparaverimg(){
            
            echo '  files';
            var_dump($_FILES);
            $REFIMGPERFIL = $_FILES["imgPerfil"]["name"];
            $rutaOrigen = $_FILES["imgPerfil"]["tmp_name"];
            echo $rutaOrigen.' ->ruta origen  ';
            $rutaIndex = dirname(realpath(__FILE__),2);
            echo $rutaIndex.' ->index   ';
            $rutaDestino = $rutaIndex."\\assets\\imgprofileusers\\".$REFIMGPERFIL;
            echo ' ->ruta destino'.$rutaDestino.'  ';
        }
    }

?>