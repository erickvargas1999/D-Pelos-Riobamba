<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluquería D'Pelos Riobamba - Inicia Sesión</title>
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="icon" href="img/logo.ico" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
</head>
<body style="background-image: url(img/fondosignin.jpg); background-repeat: no-repeat; background-size: cover;">
<a href="index.php"><img src="img/regresa.png" alt="botonregresar" style="position: absolute; top: 20px; left: 20px; width: 65px; cursor: pointer;"></a>  
<br>
  <br>
  <br>
  <center>
    <div class="container">
        <h1>D'PELOS</h1>
        <div id="login-form">
          <h2>Iniciar sesión</h2>
          <form action="login.php" method="POST">
            <table>
              <tr>
                <td><input type="email" id="input-text" placeholder="Correo electrónico" name="email" style="width: 300px;" required></td>
              </tr>
              <tr>
                <td><input type="password" name="contrasena" id="input-text" placeholder="Contraseña" style="width: 300px;" required></td>
              </tr>
            </table>
              <tr>
                <td><input type="submit" name="submit" value="Iniciar Sesión" id="input-submit"></td>
              </tr>
            <br>
            <?php
              if (isset($_SESSION['exito'])) {
                  echo '<span style="color: green;">' . $_SESSION['exito'] . '</span><br>';
                  // Eliminar el mensaje de error de la sesión para no mostrarlo nuevamente después de recargar la página
                  unset($_SESSION['exito']);
              }
            ?>
            <br>
            <?php
              if (isset($_SESSION['error_credencial'])) {
                  echo '<span style="color: red;">' . $_SESSION['error_credencial'] . '</span><br>';
                  // Eliminar el mensaje de error de la sesión para no mostrarlo nuevamente después de recargar la página
                  unset($_SESSION['error_credencial']);
              }
            ?>
            <?php
              if (isset($_SESSION['error_credencial2'])) {
                  echo '<span style="color: red;">' . $_SESSION['error_credencial2'] . '</span><br>';
                  // Eliminar el mensaje de error de la sesión para no mostrarlo nuevamente después de recargar la página
                  unset($_SESSION['error_credencial2']);
              }
            ?>
          </form>
        </div>
      </div>
      <br>
      <div class="container2">
        <div id="register-link">
          ¿No tienes una cuenta?
          <a href="sigin_pagina.php" style="text-decoration: none; color: #2471A3;">Regístrate</a>
        </div>
      </div>
    
  </center>
</body>
</html>