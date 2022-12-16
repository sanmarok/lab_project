<?php
require_once "../public/manejoJSON.php";

$listaPedido = new Pedido();
$listaPedido->addPedido($_POST['usuario'],$_POST['idProducto'],$_POST['cantidad'],$_POST['direccion'],$_POST['total']);
header('Location: ../public/profile.php');
?>