<?php require ("../register.php") ?>
<?php
  if(isset($_POST['submit_register'])){
    $user_register = new RegisterUser($_POST['name'],$_POST['lastname'],$_POST['username'],$_POST['mail'],$_POST['password']);  
  }
?>

<?php require ("../login.php") ?>
<?php 
    if(isset($_POST['submit_login'])){
      $user_login = new LoginUser($_POST['username'],$_POST['password']);  
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso</title>
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

<!--Start authentication-->

  <!--Login-->
    <div class="conteiner_login_sm">
      <div class="conteiner_form_login_sm" id="conteiner_form_login_sm">
        <img src="./image/la_harinera_favicon.png" alt="" srcset="">
        <form action="authentication.php?success=1" method="post" id="form_login_sm">
          <h3>Bienvenido</h3>
          <label for="user">Usuario o email</label>
          <input type="text" name="username" id="username" required>
          <label for="user">Contraseña</label>
          <input type="password" name="password" id="pass" required>
          <p class="login_error_sm"><?php echo @$user_login->error ?></p>
          <p class="login_success_sm"><?php echo @$user_login->success ?></p>
          <button type="submit" name="submit_login">Ingresar</button>
          <a href="#" onclick="changeformtoregister()"><p>Registrarse en La Harinera</p></a>
        </form>
      </div>

  <!--Register-->
    <div class="conteiner_form_register_sm" id="conteiner_form_register_sm">
      <img src="./image/la_harinera_favicon.png" alt="" srcset="">
      <form action="" method="post" id="form_register_sm">
        <h3>Registrate</h3>
        <label for="user">Nombre</label>
        <input type="text" name="name" id="name" required>
        <label for="user">Apellido</label>
        <input type="text" name="lastname" id="lastname" required>
        <label for="user">Usuario</label>
        <input type="text" name="username" id="username" autocomplete="off" required>
        <label for="mail">Email</label>
        <input type="email" name="mail" id="mail" required>
        <label for="user">Contraseña</label>
        <input type="password" name="password" id="pass" required>
        <button type="submit" name="submit_register">Registrarse</button>
        <p class="register_error_sm"><?php echo @$user_register->error ?></p>
        <p class="register_success_sm"><?php echo @$user_register->success ?></p>
        <a href="#" onclick="changeformtologin()"><p>Ingresa en La Harinera</p></a>
      </form>
  </div>

<!--End authentication--> 
</body>
</html>