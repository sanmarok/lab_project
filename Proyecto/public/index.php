<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Harinera</title>
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
    <div class="body_rb">

        <header>
            <?php 
                session_start();
                include 'header.php'; 
            ?>
        </header>
        
        <div class="container_rb">
            <div class="section_rb">
                
                <div class="landing_rb">
                
                    <h1 class="h_rb">¡Bienvenido!</h1>
                    <p class="p_rb">Somos una distribuidora mayorista de harina de la ciudad de Concordia
                    y nos enfocamos en dos pilares fundamentales:</p>
                    <br>
                
                    <div class="landing_left_rb">
                        <h2 class="h_rb">Calidad</h2>
                        <br>
                        <p class="p_rb">Años en el mercado nos han enseñado que hay un valor por sobre todos los demas, que es la confiabilidad en una materia prima consistente. Trabajamos junto a Molinos Benvenuto, distribuyendo en la ciudad de Concordia todos sus productos.</p>
                    </div>

                    <div class="landing_right_rb">
                        <h2 class="h_rb">Servicio</h2>
                        <br>
                        <p class="p_rb">Tenemos una excelente materia prima y apuntamos tambien a la excelencia en el servicio.
                        Por eso ponemos a disposición esta nueva forma de contacto, donde nuestros clientes
                        podran gestionar sus pedidos de forma eficiente y rápida.</p>
                </div>
            </div>        
            </div>
        </div>
    </div>

</body>

<footer>
    <?php 
        include('footer.php');
    ?>
</footer>
</html>