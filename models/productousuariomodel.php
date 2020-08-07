<?php
    class ProductoUsuarioModel extends Model{
        private $idProductoUsuario;
        private $idProductoFk;
        private $idUsuarioFk;
        private $cantidadPiezas;
        private $total;
        public function __construct(){
            parent::_construct();
        }
        public function setIdProductoUsuario($idProductoUsuario):void{
            $this->idProductoUsuario = $idProductoUsuario;
        }
        public function getIdProductoUsuario($idProductoUsuario):string{
            return $this->idProductoUsuario;
        }
        public function setIdProductoFk($idProductoFk):void{
            $this->idProductoFk = $idProductoFk;
        }
        public function getIdProductoFk($idProductoFk):string{
            return $this->idProductoFk;
        }
        public function setIdUsuarioFk($idUsuarioFk):void{
            $this->idUsuarioFk = $idUsuarioFk;
        }
        public function getIdUsuarioFk($idUsuarioFk):string{
            return $this->idUsuarioFk;
        }
        public function setCantidadPiezas($cantidadPiezas):void{
            $this->cantidadPiezas = $cantidadPiezas;
        }
        public function getCantidadPiezas($cantidadPiezas):string{
            return $this->cantidadPiezas;
        }
        public function setTotal($total):void{
            $this->total = $total;
        }
        public function getTotal($total):string{
            return $this->total;
        }

        public function insertProductoUsuario(array $param):bool{
            $res = false;
            try {
                $query = $this->db->connect()->prepare('INSERT INTO `productousuario` (`idproductousuario`, `producto_idproducto`, `usuario_idusuario`, `cantidadpiezas`, `total`) VALUES (NULL, ?, ?, ?, ?)');
                if($query->execute($param)){
                    $res = true;
                }
            } catch (PDOException $th) {
                //throw $th;
            }

            return $res;
        }




    }
    


?>