<?php

require_once '../public/manejoJSON.php';

$listaPedido = new Pedido();

echo $_POST['idProd'];

$listaPedido->remover($_POST['idProd']);

header('Location: ../public/profile.php');
?>