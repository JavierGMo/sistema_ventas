<?php
    require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/config/config.php');
    class View{
        public $dataShow;
        function __construct(){
            //echo "<p>Vista principal</p>";
        }

        function render($nombre, $titlePage){
            //'views/' . $nombre . '.php'
            // echo "pathchidasdasd".realpath($_SERVER["DOCUMENT_ROOT"].'sistemaventas/views/' . $nombre . '.php');
            require 'views/' . $nombre . '.php';
        }
    }

?>