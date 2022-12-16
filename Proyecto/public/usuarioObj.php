<?php
    class Usuario{
        private $ruta;

        private $arrayUsuarios;

        public function __construct(){
            $this->ruta = "../users.json";
            $this->arrayUsuarios = json_decode(file_get_contents($this->ruta),true); 
        }

        public function getJSONFile(){
            return $this->arrayUsuarios;
        }

    }
?>