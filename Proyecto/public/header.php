<?php

    if(isset($_GET['logout'])){
        unset($_SESSION['user']);
        header("location: index.php"); exit();
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Icons-->
      <link rel="shortcut icon" href="./image/la_harinera_favicon.ico" type="image/x-icon">
      <script src="https://kit.fontawesome.com/dcd8a6e406.js" crossorigin="anonymous"></script>
    <!--Styles-->
        <link rel="stylesheet" href="normalize.css">
        <link rel="stylesheet" href="style.css">
    <!--Scripts-->
        <script src="script.js"></script>
</head>

<?php 

    if(!isset($_SESSION['user'])){
        echo('<div id="header_rb" class="header_rb">
        <div class="h_home_rb">
            <a href="index.php"><img src="./image/La_Harinera_logo_rb.png" alt="" srcset="" class="logo_header_rb"></a>
            <div class="h_opciones_rb">
                <a href="index.php">Inicio</a>
                <a>Empresa</a> <!-- es el about us de juan-->
                <a href="products.php">Productos</a>
                <a>Contacto</a> <!-- va al footer de adolfensen-->
                <a href="authentication.php">Ingreso</a> <!-- es el login de santi-->
            </div>
        </div>
    </div>');
    }else{
        echo('<div id="header_rb" class="header_rb">
        <div class="h_home_rb">
            <a href="index.php"><img src="./image/La_Harinera_logo_rb.png" alt="" srcset="" class="logo_header_rb"></a>
            <div class="h_opciones_rb">
                <a href="index.php">Inicio</a>
                <a>Empresa</a> <!-- es el about us de juan-->
                <a href="products.php">Productos</a>
                <a>Contacto</a> <!-- va al footer de adolfensen-->
                <a href="?logout">Cerrar sesion</a> <!-- es el login de santi-->
            </div>
        </div>
    </div>');
    }

?>




