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
