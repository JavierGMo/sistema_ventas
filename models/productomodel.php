<?php
    //require_once realpath($_SERVER["DOCUMENT_ROOT"].'/sistemaventas/libs/model.php');
    class ProductoModel extends Model{
        private $idProducto;
        private $nombre;
        private $descripcion;
        private $refImagen;
        private $precio;
        public function __construct(){
            parent::_construct();
        }

        public function getIdProducto(){
            return $this->idProducto;
        }
        public function setIdProducto($idProducto){
            $this->idProducto = $idProducto;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function getDescripcion(){
            return $this->descripcion;
        }
        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
        public function getRefImagen(){
            return $this->refImagen;
        }
        public function setRefImagen($refImagen){
            $this->refImagen = $refImagen;
        }
        public function getPrecio(){
            return $this->precio;
        }
        public function setPrecio($precio){
            $this->precio = $precio;
        }
        public function getAll(){
           $dataJson = array();

           try{
               $query = $this->db->connect()->prepare('SELECT * from producto');
               if($query->execute()){
                   $dataJson['err'] = 0;
                    while($row = $query->fetch()){
                        $dataJson['data'][] = array(
                            'idproducto'=>$row['idproducto'],
                            'nombre'=>$row['nombre'],
                            'descripcion'=>$row['descripcion'],
                            'refimagen'=>$row['refimagen'],
                            'precio'=>$row['precio']
                        );
                    }
               }
           }catch(PDOException $e){
               $dataJson = array('err'=>1);
           }
           $dataJson = json_encode($dataJson);
           return $dataJson;
        }
        
        public function insertProduct(array $dataProducto):bool{
            $insertOK = false;
            try {
                $query = $this->db->connect()->prepare('INSERT INTO `producto` (`idproducto`, `nombre`, `descripcion`, `refimagen`, `precio`) VALUES (NULL, ?, ?, ?, ?)');
                if ($query->execute($dataProducto)) $insertOK = true;
            } catch (PDOException $e) {
                
            }
            return $insertOK;
            
        }
    
        public function getById($id){
           
        }
    
        public function update($item){
           
        }
    
        public function delete($id){
            
        }
    }

?>