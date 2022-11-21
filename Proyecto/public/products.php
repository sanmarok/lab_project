<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="shortcut icon" href="./image/la_harinera_favicon.ico" type="image/x-icon">
    <!--Styles-->
        <link rel="stylesheet" href="normalize.css">
        <link rel="stylesheet" href="style.css">
    <!--Scripts-->
        <script src="script.js"></script>
</head>
<body>

    <header>
        <?php 
            session_start();
            include 'header.php'; 
        ?>
    </header>

    <div class="products_container_sm">
        <p>Productos</p>
    </div>

    <div class="products_table_sm">
        <?php

            $json_data = file_get_contents('../products.json');

            $storageproducts = json_decode($json_data,true);

            foreach ($storageproducts as $product) {
                echo('        
                <a id= "link" href="productpage.php?product='.$product['nombre'].'" target="_blank">
                    <div class="product_card_sm">
                        <img src="../public/image/'.$product['imagen'].'" alt="" srcset="">
                        <div class="product_text_sm">
                            <p class="product_name">'.$product['nombre'].'</p>
                            <br>
                            <p class="product_description">'.$product['descrip'].'</p>
                            <br>
                            <p class="product_price">Precio: $'.$product['preciokilo'].'/'.$product['unit'].'</p>
                            
                        </div>
                    </div>
                </a>'
            );
            }
        ?>
    </div>

    <footer>
        <?php 
            include('footer.php');
        ?>
    </footer>
</body>
</html>