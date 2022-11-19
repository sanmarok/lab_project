<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($_GET['product']);?></title>
    <link rel="shortcut icon" href="./image/la_harinera_favicon.ico" type="image/x-icon">
    <!--Styles-->
        <link rel="stylesheet" href="normalize.css">
        <link rel="stylesheet" href="style.css">
    <!--Scripts-->
        <script src="script.js"></script>
</head>
<body>

<!-- <div class="products_container_sm">
    <p>Productos</p>
</div>

<div class="products_table_sm">
    <?php
    /*
        $json_data = file_get_contents('../products.json');

        $storageproducts = json_decode($json_data,true);

        foreach ($storageproducts as $product) {
            echo('
            <div class="product_card_sm">
                <img src="../public/image/'.$product['image'].'" alt="" srcset="">
                <div class="product_text_sm">
                    <p class="product_name">'.$product['productname'].'</p>
                    <br>
                    <p class="product_description">'.$product['description'].'</p>
                    <br>
                    <p class="product_price">Precio: $'.$product['price'].'/'.$product['unit'].'</p>
                    
                </div>
            </div>'
        );
        }
    */
    ?>
</div>-->

<?php
    $json_data = file_get_contents('../products.json');

        $storageproducts = json_decode($json_data,true);

        foreach ($storageproducts as $product) {
            if ($product['productname'] == $_GET['product']){
                echo($product['productname'].'<br>'.$product['price'].'<br>'.$product['description']);
                break;
            }
        }
?>
</body>
</html>