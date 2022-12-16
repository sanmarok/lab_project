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

        session_start();
	include_once '../public/header.php';
        if(isset($_SESSION['user'])){

            $nombreUsuario = $_SESSION['user'];
            $divPedido;

        }else{
            header('Location: ../public/index.php');
//            $nombreUsuario = "jamesbond";
        }

        require_once "../public/manejoJSON.php";
        require_once "../public/productoObj.php";
        require_once "../public/usuarioObj.php";

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
                
                $todosLosPedidos = $listaPedidos->getJSONFile();
                $todosLosProductos = $listaProductos->getJSONFile();
                $todosLosUsuarios = $listaUsuarios->getJSONFile();
                $catalogoP = "";

                $pedidosActivos = "";
                $pedidosEnviados = "";
                $pedidosRechazados = "";

                $scriptRechazar= "<script>";

                foreach($todosLosPedidos as $pedidos){

                    if($nombreUsuario == $pedidos['usuario']){
                        $prodDescrip ="";
                        $prodNom ="";
                        $prodImg ="";

                        foreach($todosLosProductos as $produc){

                            $catalogoP .= "<option>".$produc['nombre']."</option>";

                            if($pedidos['idProducto'] == $produc['idProducto']){
                                $prodDescrip = $produc['descrip'];
                                $prodNom = $produc['nombre'];
                                $prodImg = $produc['imagen'];
                            }
                        }

                        $prodEstado="";
                        $botonAbort="";

                        switch($pedidos['estado']){
                            case -1:

                                $prodEstado = "<p class='mp-s-text' style='color: #333'> -- Pedido Rechazado -- </p>";

                                $pedidosRechazados .= "<div class='mp-pedido' style='opacity: 0.4'>
                                    <div class='mp-imagen'>
                                        <img src='image/$prodImg'>
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
                                            <p class='mp-precio'>$".$pedidos['total']."</p>
                                        </div>
                                    </div>
        
                                    <div class='mp-status'>
                                        $prodEstado
                                    </div>
                                    $botonAbort
                                </div>";

                                break;
                            case 0:

                                $prodEstado = "<p class='mp-s-text' style='color: #E45826'> >> Por entregar</p>";
                                $botonAbort = "<div id='idProd".$pedidos['idPedido']."' class='cancelar'>X</div>";
                                
                                $pedidosActivos .= "<div class='mp-pedido'>
                                    <div class='mp-imagen'>
                                        <img src='image/$prodImg'>
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
                                            <p class='mp-precio'>$".$pedidos['total']."</p>
                                        </div>
                                    </div>

                                    <div class='mp-status'>
                                        $prodEstado
                                    </div>
                                    $botonAbort
                                    <form action='remover.php' method='POST' name='cancelar".$pedidos['idPedido']."'>
                                        <input type='hidden' name='idProd' value='".$pedidos['idPedido']."'>
                                    </form>

                                </div>";

                                $scriptRechazar .= "document.getElementById('idProd".$pedidos['idPedido']."').addEventListener('click',()=>{
                                    document.cancelar".$pedidos['idPedido'].".submit();
                                });";

                                break;
                            case 1:
                                $prodEstado = "<p class='mp-s-text' style='color: #03506F'> Entregado << </p>";

                                $pedidosEnviados .="<div class='mp-pedido'>
                                    <div class='mp-imagen'>
                                        <img src='image/$prodImg'>
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
                                            <p class='mp-precio'>$".$pedidos['total']."</p>
                                        </div>
                                    </div>

                                    <div class='mp-status'>
                                        $prodEstado
                                    </div>
                                    $botonAbort
                                </div>";

                                break;
                                    
                        }
                    }
                }
                
                $scriptRechazar .= "</script>";

                echo $pedidosActivos.$pedidosEnviados.$pedidosRechazados;

                ?>

            </div>

            <div class="hacerPedido" id="mkPedido">

            <?php

                $catalogoP = "<select id='selecProd'>";
                $scriptCarga = "<script>";
                
                $switchCase = "document.getElementById('selecProd').addEventListener('change', ()=>{
                    let valor = document.getElementById('selecProd').value;
                    document.getElementById('ideProducto').value = valor;
                    switch(valor){";

                foreach($todosLosProductos as $produc){
                    
                    $catalogoP .= "<option value='".$produc['idProducto']."'>".$produc['nombre']."</option>";
                    $scriptCarga .= "let prod".$produc['idProducto']." = ['".$produc['nombre']."','image/".$produc['imagen']."','".$produc['descrip']."',".$produc['preciokilo']."];";
                    $switchCase .= "case '".$produc['idProducto']."':
                        document.getElementById('preciokg').innerHTML = '$' + prod".$produc['idProducto']."[3];
                        document.getElementById('precioTotal').innerHTML = '$' + (prod".$produc['idProducto']."[3]*document.getElementById('cantidad').value);
                        document.getElementById('imagenProd').setAttribute('src',prod".$produc['idProducto']."[1]);
                        document.getElementById('descripProd').innerHTML = prod".$produc['idProducto']."[2];
                        break;";
                }

                $switchCase .= "} });";
                $calcularTotal = "document.getElementById('cantidad').addEventListener('change', ()=>{
                    document.getElementById('precioTotal').innerHTML = '$' + (document.getElementById('cantidad').value * ((document.getElementById('preciokg').innerHTML).slice(1)));
                });";
                $catalogoP .= "</select>";
                $scriptCarga .= $switchCase.$calcularTotal."</script>";

                $nombreU;
                $direccion;

                foreach($todosLosUsuarios as $usuario){
                    if($usuario['username']==$nombreUsuario){
                        $nombreU = $usuario['name']." ".$usuario['lastname'];
                        $direccion = $usuario['email'];
                        break;
                    }
                }

                echo "<form class='hp-display' action='pedidoNuevo.php' method='POST' name='realizarPedido'>
                        <div class='hp-datos'>
                            <div class='hp-d-title'>
                                <p>Orden de Compra</p>
                                <div class='hp-dt-linea'></div>
                            </div>
                            <div class='hp-d-campos'>
                                <div class='hp-d-usuario'>
                                    <div class='hp-du-user'>
                                        <p><b>Usuario:</b> $nombreU</p>
                                    </div>
                                    <div class='hp-du-dir'>
                                        <p><b>Dirección destino: </b></p>
                                        <input type='text' name='direccion' placeholder='Ej: Rivadavia 345' value='$direccion'>
                                        <i class='fa fa-exclamation-triangle' style='color: #E45826; font-size: 20px;' title='Campo obligatorio. Por defecto toma la dirección del cliente.'></i>
                                    </div>
                                </div>

                                $catalogoP
                                
                                <div class='hp-d-precio'>
                                    <p><b>Precio/Kg: </b> <i id='preciokg'>$". $todosLosProductos[0]['preciokilo'] ."</i></p>
                                </div>
                                <div class='hp-d-cantidad'>
                                    <p><b>Solicitar cantidad:</b></p>
                                    <input id='cantidad' type='number' name='cantidad' value='1'>
                                </div>
                                <div class='hp-d-total'>
                                    <p><b>Total:</b> <i id='precioTotal'>$". $todosLosProductos[0]['preciokilo']."</i></p>
                                </div>
                            </div>
                            <div class='hp-d-botonera'>
                                <input type='button' id='hacerPedido' value='Solicitar'>
                            </div>
                        </div>

                        <div class='hp-producto'>
                            <div class='hp-p-imagen'>
                                <img id='imagenProd' src='image/". $todosLosProductos[0]['imagen']."'>
                            </div>
                            <div class='hp-p-descripcion'>
                                <p id='descripProd'>". $todosLosProductos[0]['descrip']."</p>
                            </div>
                        </div>
                        <input type='hidden' name='usuario' value='".$usuario['username']."'>
                        <input type='hidden' name='idProducto' id='ideProducto' value='".$todosLosProductos[0]['idProducto']."'>
                        <input type='hidden' id='totalTotal' name='total' value='".$todosLosProductos[0]['preciokilo']."'>

                    </form>";
                ?>
            </div>
        </div>
    </section>



    <?php
    if($listaPedidos->getErrorMsg() !== ""){
        echo "<div class='errorMsg' id='errorMsg'>
                <div class='errorDisplay'>
                    <div class='cerrar' id='cerrarMsgError'>+</div>
                    <i class='fa fa-exclamation-triangle'></i><p>".$listaPedidos->getErrorMsg()."</p>
                </div>
            </div>";

        echo "<script>
        document.getElementById('cerrarMsgError').addEventListener('click',()=>{
            document.getElementById('errorMsg').style.display = 'none';
        });
        </script>";
    }

        include "../public/footer.php";
        echo $scriptCarga;        
        echo $scriptRechazar;
    ?>


    <script>
        document.getElementById('hacerPedido').addEventListener('click',()=>{
            document.getElementById('totalTotal').value =document.getElementById('precioTotal').innerHTML.slice(1);
            document.realizarPedido.submit();
        });
    </script>

    <script src="js/profile.js"></script>
</body>
</html>