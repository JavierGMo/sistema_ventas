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
            $this->view->render('usuario/usuario', 'Usuario | '.$_SESSION['usuario']['nombre']);
        }
        public function registrarUsuario(){
            // echo 'Post';
            // var_dump($_POST);
            // echo 'files';
            // var_dump($_FILES);
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
                        $imageProcessing->guardarImagenPerfil($_FILES['imgPerfil'], dirname(realpath(__FILE__),2), $_POST['nombreDeUsuario'], '\\assets\\imgprofileusers\\')){
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
                        $_POST['nombreDeUsuario'].'/'.$refimage,
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
            //session_start();
            $validateFields = new ValidateFields();
            $dataUser = array();
            $jsonRes = array('ok'=>0);
            if($validateFields->checkFields($_POST)){
                
                $dataUser = $this->model->getUserByEmailOrUserName($_POST['user'], $_POST['contrasenia']);
                //echo $dataUser['err'];
                //Hacer el if para confirmar si llego bien la data
                if($dataUser['err']==0){
                    $_SESSION['usuario'] = $dataUser['data'];
                    $jsonRes['ok'] = 1;
                    //var_dump($_SESSION);
                    //echo json_encode($jsonRes);
                }else{
                    session_destroy();
                }

            }else{
                session_destroy();
            }
            echo json_encode($jsonRes);
        }
        public function pruebasengeneral(){
            //session_start();
            // echo '  files';
            // var_dump($_FILES);
            // $REFIMGPERFIL = $_FILES["imgPerfil"]["name"];
            // $rutaOrigen = $_FILES["imgPerfil"]["tmp_name"];
            // echo $rutaOrigen.' ->ruta origen  ';
            // $rutaIndex = dirname(realpath(__FILE__),2);
            // echo $rutaIndex.' ->index   ';
            // $rutaDestino = $rutaIndex."\\assets\\imgprofileusers\\".$REFIMGPERFIL;
            // echo ' ->ruta destino'.$rutaDestino.'  ';
            var_dump($_SESSION);
        }
        public function logOut(){
            //session_start();
            if(session_unset() && session_destroy()){
                echo json_encode(array('ok'=>1));
                header("Location: http://localhost/sistemaventas/");
            }else{
                echo json_encode(array('ok'=>0));
            }
        }
        //Funciones para quitar o agregar de la sesion despues de una accion
        private function cerrarSesion():void{
            session_unset();
            session_destroy();
        }
        private function actualizarSession(array $sesionActulizada):void{
            $_SESSION['usuario']['nombre'] = $sesionActulizada['nombre'];
            $_SESSION['usuario']['apellido'] = $sesionActulizada['apellido'];
            $_SESSION['usuario']['refimagen'] = $sesionActulizada['refimagen'];
        }
        public function changePass(){
            $jsonRes = array('ok'=>0);
            $validateFields = new ValidateFields();
            if($validateFields->checkFields($_POST)){

                $dataPass = array(
                    $_POST['nuevacontrasenia'],
                    $_SESSION['usuario']['nombredeusuario']
                );

                if($this->model->updatePass($dataPass)){
                    $jsonRes['ok'] = 1;
                    //header("Location: http://localhost/sistemaventas/login");
                }
            }

            if($jsonRes['ok'] == 1) $this->cerrarSesion();
            echo json_encode($jsonRes);
            
        }
        
        public function borrarCuenta(){
            $jsonRes = array('ok'=>0);
            if(isset($_POST['contrasenia'])){
                $dataDel = array(
                    $_SESSION['usuario']['nombredeusuario'],
                    $_POST['contrasenia']
                );
                if($this->model->deleteAccount($dataDel)) $jsonRes['ok'] = 1;
            }
            if($jsonRes['ok']==1) $this->cerrarSesion();
            echo json_encode($jsonRes);
            
        }
        public function actualizarPerfil(){
            $jsonRes = array('ok'=>0);
            $refImage = $_SESSION['usuario']['refimagen'];
            if(isset($_POST['nombre']) && isset($_POST['apellido'])){
                
                if(isset($_FILES['refimagen'])){
                    
                    $imageProcessing = new ImageProcessing();
                    if($imageProcessing->tratamientoImagenes($_FILES, 'refimagen') &&
                        $imageProcessing->guardarImagenPerfil($_FILES['refimagen'], dirname(realpath(__FILE__),2), $_SESSION['usuario']['nombredeusuario'], '\\assets\\imgprofileusers\\')){
                            $refImage = $_FILES['refimagen']['name'];
                            $jsonRes['img'] = 1;
                    }else{
                        $jsonRes['img'] = 0;
                    }
                }
                $dataUpdate = array(
                    $_POST['nombre'],
                    $_POST['apellido'],
                    $_SESSION['usuario']['nombredeusuario'].'/'.$refImage,
                    $_SESSION['usuario']['nombredeusuario']
                );
                if($this->model->updateUserPerfil($dataUpdate)) $jsonRes['ok'] = 1;
            }
            if($jsonRes['ok'] == 1) $this->actualizarSession(
                array(
                    'nombre'=>$_POST['nombre'],
                    'apellido'=>$_POST['apellido'],
                    'refimagen'=>$_SESSION['usuario']['nombredeusuario'].'/'.$refImage,
                )
            );
            echo json_encode($jsonRes);
        }
        public function fundeprueba(){
            // foreach ($_POST as $clave => $valor) {
            //     // $array[3] se actualizará con cada valor de $array...
            //     echo "{$clave} => {$valor} ";
            // }
            
            echo json_encode($_SESSION);
            //echo json_encode($_POST);
        }
    }

?>