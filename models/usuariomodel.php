<?php
    class UsuarioModel extends Model{
        private $nombres;
        private $apellidos;
        private $nombreDeUsuario;
        private $correo;
        private $refImage;
        private $contrasenia;
        public function __construct(){
            parent::_construct();
        }

        public function setNombres(string $nombres){
            $this->nombres = $nombres;
        }
        public function getNombres():string{
            return $this->nombres;
        }
        public function setApellidos(string $apellidos){
            $this->apellidos = $apellidos;
        }
        public function getApellidos():string{
            return $this->apellidos;
        }
        public function setNombreDeUsuario(string $nombreDeUsuario){
            $this->nombreDeUsuario = $nombreDeUsuario;
        }
        public function getNombreDeUsuario():string{
            return $this->nombreDeUsuario;
        }
        public function setCorreo(string $correo){
            $this->correo = $correo;
        }
        public function getCorreo():string{
            return $this->correo;
        }
        public function setRefImage(string $refImage){
            $this->refImage = $refImage;
        }
        public function getRefImage():string{
            return $this->refImage;
        }
        public function setContrasenia(string $contrasenia){
            $this->contrasenia = $contrasenia;
        }
        public function getContrasenia():string{
            return $this->contrasenia;
        }
        //Metodos para las operaciones del crud
        public function getUserByEmailOrUserName(string $paramUser, string $password):array{
            $dataJson = array('err'=>1);
            try {
                $query = $this->db->connect()->prepare('SELECT idusuario, nombre, apellido, nombredeusuario, correo, refimagen FROM usuario WHERE contrasenia=? AND (nombredeusuario=? OR correo=?)');
                if($query->execute(array($password, $paramUser, $paramUser))){
                    $dataJson['err'] = 0;
                    $tempData = $query->fetch(PDO::FETCH_ASSOC);
                    if(!$tempData) $tempData = null;
                    $dataJson['data'] = $tempData;
                }
            } catch (PDOException $e) {
                //throw $th;

            }
            //Hacemos un json_encode, que es un string
            
            return $dataJson;
        }
        //Insertar usuario
        public function insertUser(array $userData):bool{
            $insertOk = false;
            try {
                $query = $this->db->connect()->prepare('INSERT INTO usuario (idusuario, nombre, apellido, nombredeusuario, correo, refimagen, contrasenia) VALUES (NULL, ?, ?, ?, ?, ?, ?)');
                if($query->execute($userData)){
                    $insertOk = true;
                }
            } catch (PDOException $e) {
                //throw $th;

            }
            return $insertOk;   
        }
    }
?>