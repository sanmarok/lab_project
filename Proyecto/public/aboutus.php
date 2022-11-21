<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre nosotros</title>
    <!--Icons-->
      <link rel="shortcut icon" href="./image/la_harinera_favicon.ico" type="image/x-icon">
      <script src="https://kit.fontawesome.com/dcd8a6e406.js" crossorigin="anonymous"></script>
    <!--Styles-->
        <link rel="stylesheet" href="normalize.css">
        <link rel="stylesheet" href="estilo.css">
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

<div class="fondo">

    <div class="sobre1"></div>

    <p1 class="texto1">La harinera</p1>

<div class="sobre2">

    <p2 class="texto2">encontranos en facebook. Instagram. whatsApp. Tambien por calle San Juan 345.</p2>
    
</div>
</div>    
</body>      
 <p>Welcome to</p>

<h1>La harinera</h1>

<h2>Date un gusto!</h2>

<h3>Somos una distribuidora mayorista de harina de la ciudad de Concordia y nos enfocamos en dos pilares fundamentales:</h3>

<h4>Calidad</h4>

<h5>Años en el mercado nos han enseñado que hay un valor por sobre todos los demas, que es la confiabilidad en una materia prima consistente. Trabajamos junto a Molinos Benvenuto, distribuyendo en la ciudad de Concordia todos sus productos.</h5>
<h6>Servicio
Tenemos una excelente materia prima y apuntamos tambien a la excelencia en el servicio. Por eso ponemos a disposición esta nueva forma de contacto, donde nuestros clientes podran gestionar sus pedidos de forma eficiente y rápida.</h6>

<footer id="footer">
    <?php 
        include('footer.php');
    ?>
</footer>

</body>
</html>