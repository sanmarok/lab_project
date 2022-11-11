<?php
    class Pedido{
        private $ruta;
        
        private $error;
        private $success;

        private $arrayPedido;

        private $new_pedido;


        public function __construct(){
            $this->ruta = "json/pedidos.json";
            $this->arrayPedido = json_decode(file_get_contents($this->ruta),true); 
        }

        public function getErrorMsg(){
            return $this->error;
        }

        public function getSuccess(){
            return $this->success;
        }


        public function addPedido($usuario, $idProducto, $cantidad, $direccion, $total){
            
            if(empty($usuario) || empty($idProducto) || empty($cantidad || empty($direccion) || empty($total)))
                $error = "Hay campos sin completar, favor llenarlos todos.";
            else{
                $this->new_pedido = [
                    "idPedido" => 1,
                    "usuario" => $usuario,
                    "idProducto" => $idProducto,
                    "cantidad" => $cantidad,
                    "direccion" => $direccion,
                    "total" => $total,
                    "time" => date('Y-m-d'),
                    "estado" => 0,
                ];
                
                $this->insertPedido();
            }
        }

        public function getJSONFile(){
            return $this->arrayPedido;
        }

        private function pedidoExists(){
                foreach($this->arrayPedido as $pedido){
                    if(($this->new_pedido['cantidad']) == $pedido['cantidad'] && $this->new_pedido['idProducto'] == $pedido['idProducto'] && $this->new_pedido['direccion'] == $pedido['direccion'] && $this->new_pedido['time'] == $pedido['time']){
                        $this->error = "Su pedido ya ha sido agendado, evite volver para atras en su navegador o refrescar la página para evitar conflictos con nuevos pedidos.";
                        return true;
                    }
                }
            return false;
        }

        private function insertPedido(){
            if(!($this->pedidoExists())){
                array_push($this->arrayPedido,$this->new_pedido);

                if(file_put_contents($this->ruta, json_encode($this->arrayPedido,JSON_PRETTY_PRINT))){
                    return $this->success = "Su pedido ha sido agendado, al cabo de 24 horas hábiles nuestros repartidores estarán arribando a su domicilio.";
                }else{
                    return $this->error = "Hubo un error en la carga de su dato, por favor intentelo de nuevo en unos minutos.";
                }
            }
        }

    }
?>