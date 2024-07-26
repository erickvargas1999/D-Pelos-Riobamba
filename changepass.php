<?php
    session_start();
    $currentpass = $_POST['currentpass'];
    $contrasena = $_POST['contrasena'];
    $confirmar_contrasena = $_POST['confirmar_contrasena'];
    $reqlen = strlen($contrasena) * strlen($confirmar_contrasena);

    if ($reqlen > 0) {
        require("connection_db.php");
        if (password_verify($currentpass, $_SESSION['stored_hashed_password'])) {
            if ($contrasena == $confirmar_contrasena) {
                $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);
                $ci_usuario = $_SESSION['CI_usuario'];
                $query = "CALL actualizar_contrasena('$hashed_password', '$ci_usuario')";
                mysqli_query($link, $query);
                mysqli_close($link);
                $_SESSION['exitoupdpass'] = "Contraseña cambiada exitosamente.";
                 header("Location: UpdatePassword.php");
                 exit();
            } else {
             $_SESSION['error_contra'] = "La confirmación de contraseña no coincide con la nueva contraseña ingresada. Verifica y vuelve a intentarlo.";
             header("Location: UpdatePassword.php");
             exit();
            }
        }else{
            $_SESSION['error_pass'] = "Contraseña Actual Incorrecta.";
            header("Location: UpdatePassword.php");
            exit();
        }
    } else {
        echo "Algún campo está vacío, por favor rellene todos los campos requeridos";
    }
?>