<?php
    //require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/controllers/home.php');
    require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/controllers/errorpage.php');
    class App{
            private $url;
            private $archivoController;
            private $controller;
            
            function __construct(){
                //var_dump($_GET);
                $url = isset($_GET['url'])? $_GET['url']: null;
                
                $url = rtrim($url, '/');
                $url = explode('/', $url);
                $archivoController = '';
                if(empty($url[0])){
                    $archivoController = realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/controllers/home.php');
                    require $archivoController;
                    $controller = new Home();
                    $controller->render();
                    // $controller->render();
                    // $controller->loadModel('index');
                    return false;
                }else{
                    $archivoController = 'controllers/' . $url[0] . '.php';
                    //$_GET['url'] = '';
                }
                if(file_exists($archivoController)){
                    require $archivoController;
        
                    $controller = new $url[0];
                    $controller->loadModel($url[0]);
                    // Se obtienen el número de param
                    
                    $nparam = sizeof($url);
                    // si se llama a un método
                    //echo '************Nparametros=>'.$nparam;
                    if($nparam > 1){
                        // hay parámetros
                        
                        if($nparam > 2){
                            $param = [];
                            for($i = 2; $i < $nparam; $i++){
                                array_push($param, $url[$i]);
                            }
                            $controller->{$url[1]}($param);
                        }else{
                            // solo se llama al método
                            $controller->{$url[1]}();
                        }
                    }else{
                        // si se llama a un controlador
                        $controller->render();  
                    }
                }else{
                    $controller = new ErrorPage();
                }
            }
            public function redirect(){
                
            }
        }
?>