<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($_GET['product']);?></title>
    <!--Icons-->
      <link rel="shortcut icon" href="./image/la_harinera_favicon.ico" type="image/x-icon">
      <script src="https://kit.fontawesome.com/dcd8a6e406.js" crossorigin="anonymous"></script>
    <!--Styles-->
        <link rel="stylesheet" href="normalize.css">
        <link rel="stylesheet" href="style.css">
    <!--Scripts-->
        <script src="script.js"></script>
</head>
<body>

<header>
    <?php include 'header.php'; ?>
</header>

<?php
    $json_data = file_get_contents('../products.json');

        $storageproducts = json_decode($json_data,true);

        foreach ($storageproducts as $product) {
            if ($product['nombre'] == $_GET['product']){
                echo('
                    <div class="product_container_sm">
                        <div>
                            <img src="../public/image/'.$product['imagen'].'" alt="" srcset="">
                        </div>
                        <div>
                            <p class="product_name">'.$product['nombre'].'</p>
                            <p class="product_description">'.$product['descrip'].'</p>'
                    );
                
          
                    foreach($product['properties'] as $property){
                        echo('<p class="data_tabulated">'.$property.'</p>');
                    }

                echo('
                    <p class="price_tabulated">Precio: '.$product['preciokilo'].'/'.$product['unit'].'</p>
                        </div>
                    </div>
                ');
                break;
            }
        }
?>

<?php

?>


</body>
</html>
