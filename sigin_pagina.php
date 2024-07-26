<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluquería D'Pelos Riobamba - Regístrate</title>
    <link rel="icon" href="img/logo.ico" type="image/png">
    <link rel="stylesheet" href="css/sigin.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
</head>
<body style="background-image: url(img/fondosignin.jpg); background-repeat: no-repeat; background-size: cover;">
    <br>
    <br>
    <a href="login_pagina.php"><img src="img/regresa.png" alt="botonregresar" style="position: absolute; top: 20px; left: 20px; width: 65px; cursor: pointer;"></a>
    <center><div class="container" style="margin-top: -20px;">
        <h1>D'PELOS</h1>
        <p style="text-align: center;">Regístrate para empezar a reservar tus citas.</p>
        <div id="login-form">
            <form action="sigin.php" method="POST">
                <table>
                <tr>
                    <td><input type="text" name="nombre" id="nombre" class="input-text" placeholder="Nombre" required></td>
                    <td><input type="text" name="apellido" id="apellido" class="input-text" placeholder="Apellido" required></td>
                </tr>
                <tr>
                    <td><input type="text" name="CI" id="CI" class="input-text" maxlength="10" placeholder="Cédula de Identidad (CI)" required></td>
                    <script>
                        document.getElementById('CI').addEventListener('input', function() {
                          this.value = this.value.replace(/[^\d]/g, '');
                        });
                    </script>
                    <td><input type="tel" name="tel" placeholder="Número de celular" id="tel" maxlength="10" class="input-text" required></td>
                    <script>
                        document.getElementById('tel').addEventListener('input', function() {
                          this.value = this.value.replace(/[^\d]/g, '');
                        });
                    </script>
                </tr>
                <tr>
                    <td  colspan="2"><input type="email" name="email" placeholder="Correo electrónico" id="email" class="input-text" style="width: 432px;" required></td>

                </tr>
                 <tr>
                     <td><input type="password" name="contrasena" placeholder="Contraseña" id="contrasena" class="input-text" required></td>
                     <td><input type="password" name="confirmar_contrasena" placeholder="Confirmar contraseña" id="confirmar_contrasena" class="input-text" required></td>
                 </tr>   
                 <tr>
                    <td><label for="birth" style="margin-left: 10px;">Fecha de Nacimiento</label></td>
                    <td><input type="date" name="birth" id="birth" placeholder="Fecha de Nacimiento" class="input-text" required></td>
                 </tr>
                </table>
                <tr><P style="text-align: center; font-size: 12px;">Al registrarte, aceptas nuestras Condiciones, la Política de privacidad y la Política de cookies.</P></tr>
                <tr><button type="submit" id="input-submit" name="submit">Registrarte</button></tr>
             </form> 
        </div>
        
        <div id="register-link">
            ¿Ya tienes una cuenta?
            <a href="login_pagina.php" style="text-decoration: none; color: #2471A3;">Iniciar sesión</a>
        </div>
        <br>
        <?php
        if (isset($_SESSION['error_email'])) {
            echo '<span style="color: red;">' . $_SESSION['error_email'] . '</span><br>';
            // Eliminar el mensaje de error de la sesión para no mostrarlo nuevamente después de recargar la página
            unset($_SESSION['error_email']);
        }
        ?>
        <?php
        if (isset($_SESSION['error_contra'])) {
            echo '<span style="color: red;">' . $_SESSION['error_contra'] . '</span><br>';
            // Eliminar el mensaje de error de la sesión para no mostrarlo nuevamente después de recargar la página
            unset($_SESSION['error_contra']);
        }
        ?>
        <?php
        if (isset($_SESSION['error_cedula'])) {
            echo '<span style="color: red;">' . $_SESSION['error_cedula'] . '</span><br>';
            // Eliminar el mensaje de error de la sesión para no mostrarlo nuevamente después de recargar la página
            unset($_SESSION['error_cedula']);
        }
        ?>
        <?php
        if (isset($_SESSION['error_vacio'])) {
            echo '<span style="color: red;">' . $_SESSION['error_vacio'] . '</span><br>';
            // Eliminar el mensaje de error de la sesión para no mostrarlo nuevamente después de recargar la página
            unset($_SESSION['error_vacio']);
        }
        ?>
    </div></center>
</body>
</html>