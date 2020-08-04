<?php
    class ImageProcessing{
        private $refImg;
        /* fin getter y setters */
        public function tratamientoImagenes($infoImage, $nameInThePost):bool{
            if($infoImage[$nameInThePost]['error']===UPLOAD_ERR_OK){
                $extencionesImagen = array(0=>'image/jpg',1=>'image/png', 2=>'image/jpeg');
                $typeImage = $infoImage[$nameInThePost]['type'];
                $tamanioImagen = $infoImage[$nameInThePost]['size'];
                $tamanioLimite = 1024*1024*8;
                if(in_array($typeImage, $extencionesImagen)){
                    if($tamanioImagen<$tamanioLimite){
                        return true;
                    }
                }
            }
            return false;   
        }
        public function guardarImagenPerfil(array $dataArchivo, string $rutaIndex, string $userName, string $rutaUsuario):bool{
            $imgGuardada = false;
            $rutaOrigen = '';
            $refImg = '';
            if($dataArchivo===null){
                return $imgGuardada;
            }else{
                $rutaOrigen = $dataArchivo['tmp_name'];
                $refImg = $dataArchivo['name'];
            }
            $rutaDestino = $rutaIndex.$rutaUsuario.$userName.'\\';
            if(!file_exists($rutaDestino)){
                if(mkdir($rutaDestino)){
                    $rutaDestino .= $refImg;
                    if(move_uploaded_file($rutaOrigen,$rutaDestino)){
                        $imgGuardada = true;
                    } 
                }
            }else{
                $rutaDestino .= $refImg;
                if(move_uploaded_file($rutaOrigen,$rutaDestino)){
                    $imgGuardada = true;
                }
            }
            return $imgGuardada;
        }
        public function nombreImagen($nombre, $tipoImg):string{
            $extension = explode('/', $tipoImg)[1];
            return ($nombre.'.'.$extension);
        }
    }

?>