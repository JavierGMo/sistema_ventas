<?php
    class ValidateFields{
        private $contrasenia;
        private $confirmContrasenia;
        /*Getters and Setters */
        public function getContrasenia():string{return $this->contrasenia;}
        public function getConfirmContrasenia():string{return $this->confirmContrasenia;}
        public function setContrasenia(string $contrasenia):void{$this->contrasenia = trim($contrasenia);}
        public function setConfirmContrasenia(string $confirmContrasenia):void{$this->confirmContrasenia = trim($confirmContrasenia);}
        //Methods
        public function checkFields(array $fields = null):bool{
            $itsOk = false;
            foreach($fields as $value) if(isset($value) && !empty($value)) $itsOk = true;
            return $itsOk;
        }
        public function validatePassword():bool{
            //Retorna un booleano
           if(strcmp($this->getContrasenia(), $this->getConfirmContrasenia()) === 0){
               return true;
            }
            return false;
        }
    }
?>