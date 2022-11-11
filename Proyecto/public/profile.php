<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="css/profile.css">
    <script src="https://kit.fontawesome.com/dcd8a6e406.js" crossorigin="anonymous"></script>
    <title>Perfil de Usuario</title>

</head>
<body>
    
    <?php


        if(isset($_SESSION['username'])){

            $nombreUsuario = $_SESSION['username'];
            $divPedido;



        }else{
            header('index.php');
        }


        include "php/manejoJSON.php";

        $listaPedidos = new Pedido();
        $listaProductos = new Producto();
        $listaUsuarios = new Usuario();

        




    ?>

    <section>
        
        <nav>
            <div class="nav-item" id="nav-item1">Mis pedidos</div>
            <div class="nav-item" id="nav-item2">Realizar un pedido</div>
        </nav>

        <div class="pedidoConteiner">
            <div class="misPedidos" id="pedidos">

                <?php
                
                $listaPedidos->addPedido("Angel", 10, 5, "LAS HERAS 534", 3400);

                $todosLosPedidos = $listaPedidos->getJSONFile();
                $todosLosProductos = $listaProductos->getJSONFile();
                $todosLosUsuarios = $listaUsuarios->getJSONFile();

                foreach($todosLosPedidos as $pedidos){

                    if($nombreUsuario == $pedidos['usuario']){
                        $prodDescrip;
                        $prodNom;
                        $prodImg;

                        foreach($todosLosProductos as $produc){
                            if($pedidos['idProducto'] == $produc['idProducto']){
                                $prodDescrip = $produc['descrip'];
                                $prodNom = $produc['nombre'];
                                $prodImg = $produc['imagen'];
                                break;
                            }
                        }

                        $prodEstado;
                        if($produc['estado'])
                            $prodEstado = "<p class='mp-s-text' style='color: #E45826'> >> Por entregar</p>";
                        else
                            $prodEstado = "<p class='mp-s-text' style='color: #03506F'> Entregado << </p>";

                        

                        $divPedido = "<div class='mp-pedido'>
                            <div class='mp-imagen'>
                                <img src='$prodImg'>
                                <div class='mp-i-sombrita'></div>
                            </div>
                            <div class='mp-datos'>
                                <div class='mp-proddata'>
                                    <i class='fa-solid fa-wheat-awn' style='color: #ba9f74; font-size: 25px;'></i>
                                    <p class='mp-prod'>$prodNom</p>
                                    <div class='mp-line'></div>
                                </div>
                                <div class='mp-descripcion'>
                                    <p class='mp-pd-title'>Descripción:</p>
                                    <p class='mp-pd-descr'>$prodDescrip</p>
                                </div>
                                <div class='mp-proddata-price'>
                                    <p class='mp-pd-title'>Dirección:</p>
                                    <p class='mp-precio'>".$pedidos['direccion']."</p>
                                </div>
                                <div class='mp-proddata-price'>
                                    <p class='mp-pd-title'>Total:</p>
                                    <p class='mp-precio'>".$pedidos['total']."</p>
                                </div>
                            </div>

                            <div class='mp-status'>
                                $prodEstado
                            </div>
                            <div class='cancelar'>X</div>
                        </div>";

                    }
                }
                
                ?>

            </div>

            <div class="hacerPedido" id="mkPedido">

            <?php
                echo "<div class='hp-display'>
                    <div class='hp-datos'>
                        <div class='hp-d-title'>
                            <p>Orden de Compra</p>
                            <div class='hp-dt-linea'></div>
                        </div>
                        <div class='hp-d-campos'>
                            <div class='hp-d-usuario'>
                                <div class='hp-du-user'>
                                    <p><b>Usuario:</b> Esteban Quito</p>
                                </div>
                                <div class='hp-du-dir'>
                                    <p><b>Dirección destino: </b></p>
                                    <input type='text' placeholder='Ej: Rivadavia 345'>
                                    <i class='fa fa-exclamation-triangle' style='color: #E45826; font-size: 20px;' title='Campo obligatorio. Por defecto toma la dirección del cliente.'></i>
                                </div>
                            </div>

                            <select>
                                <option>Harina 000 Blanca Flor</option>
                                <option>Harina 0000 Blanca Flor</option>
                                <option>Harina Integral Pureza</option>
                                <option>Harina Derivada</option>
                                <option>Harina Tipo C++</option>
                            </select>
                            
                            <div class='hp-d-precio'>
                                <p><b>Precio/Kg: </b> $240</p>
                            </div>
                            <div class='hp-d-cantidad'>
                                <p><b>Solicitar cantidad:</b></p>
                                <input type='number' value='1'>
                            </div>
                            <div class='hp-d-total'>
                                <p><b>Total:</b> $240</p>
                            </div>
                        </div>
                        <div class='hp-d-botonera'>
                            <input type='button' value='Solicitar'>
                        </div>
                    </div>

                    <div class='hp-producto'>
                        <div class='hp-p-imagen'>
                            <img src='https://i.blogs.es/95d4c3/harina-trigo-tipos/1024_2000.jpg'>
                        </div>
                        <div class='hp-p-descripcion'>
                            <p>Harina a base de trigo, ultra refinada.</p>
                        </div>
                    </div>

                </div>";
                ?>
            </div>
        </div>
    </section>

    

    <?php
     echo $listaPedidos->getErrorMsg();
        //include "footer.php";
    ?>

    <script src="js/profile.js"></script>
</body>
</html>