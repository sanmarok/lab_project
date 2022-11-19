<?php
    session_start();

    if(!isset($_SESSION['user'])){
        header("location: ../authentication.php"); exit();
    }

    if(isset($_GET['logout'])){
        unset($_SESSION['user']);
        header("location: index.html"); exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    <h1>Bienvenido <?php echo $_SESSION['user'];?></h1>
    <br>
    <a href="?logout"><button>Cerrar sesion</button></a>
</body>
</html>