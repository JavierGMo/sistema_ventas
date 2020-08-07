<?php
    require_once 'view.php';
    class Controller{
        public $model;
        public $view;
        function __construct(){
            $this->view = new View();
            //echo "<p>Controlador principal</p>";
        }
    
        function loadModel($model){
            $url = 'models/'.$model.'model.php';
            // echo "URLK ".$url."<br>";
            if(file_exists($url)){
                require $url;
                
                $modelName = $model.'Model';
                // echo "Model name".$modelName."<br>";
                $this->model = new $modelName();
            }
        }
    }
?>