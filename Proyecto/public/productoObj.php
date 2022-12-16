<?php
    class Producto{
        private $ruta;

        private $arrayProductos;

        public function __construct(){
            $this->ruta = "../products.json";
            $this->arrayProductos = json_decode(file_get_contents($this->ruta),true); 
        }

        public function getJSONFile(){
            return $this->arrayProductos;
        }

    }
?>