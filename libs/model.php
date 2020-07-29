<?php
require_once 'database.php';
    class Model{
        public $db;
        function _construct(){
            $this->db = new DataBase();
        }
    }
?>