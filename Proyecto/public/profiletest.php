<?php
    session_start();

    if(!isset($_SESSION['user'])){
        header("location: ../authentication.php"); exit();
    }

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
        <?php include 'header.php'; ?>
    </header>

    <h1>Bienvenido <?php echo $_SESSION['user'];?></h1>
    <br>
    <a href="?logout"><button>Cerrar sesion</button></a>
</body>
</html>