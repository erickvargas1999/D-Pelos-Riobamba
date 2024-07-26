<?php
    session_start();
   $nombre = $_POST['nombre'];
   $apellido = $_POST['apellido'];
   $CI = $_POST['CI'];
   $email = $_POST['email'];
   $tel = $_POST['tel'];
   $birth = $_POST['birth'];
   $contrasena = $_POST['contrasena'];
   $confirmar_contrasena = $_POST['confirmar_contrasena'];
   $reqlen = strlen($nombre) * strlen($contrasena) * strlen($email) * strlen($confirmar_contrasena) * strlen($apellido) * strlen($birth) * strlen($tel) * strlen($CI);
   
   if ($reqlen > 0) {
       if (validarCIEcuador($CI)) {
           require("connection_db.php");
           $query_check_email_ci = mysqli_query($link, "SELECT COUNT(*) AS count FROM id21078063_dpelos.personas WHERE email='$email' OR CI='$CI' OR tel='$tel';");
           $row = mysqli_fetch_assoc($query_check_email_ci);
           $count = $row['count'];
            
           if ($count > 0) {
            $_SESSION['error_email'] = "Correo electrónico, cédula o teléfono ya existente. Por favor, verifique.";
            header("Location: sigin_pagina.php");
            exit();
           } else {
               if ($contrasena == $confirmar_contrasena) {
                   $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);
                   mysqli_query($link, "INSERT INTO id21078063_dpelos.personas (CI, nombre, apellido, email, tel, contrasena, birth) VALUES ('$CI', '$nombre', '$apellido', '$email', '$tel', '$hashed_password', '$birth');");
                   mysqli_close($link);
                   $_SESSION['exito'] = "Registro Exitoso.";
                    header("Location: login_pagina.php");
                    exit();
               } else {
                $_SESSION['error_contra'] = "Por favor, introduzca dos contraseñas idénticas.";
                header("Location: sigin_pagina.php");
                exit();
               }
           }
        } else {
            $_SESSION['error_cedula'] = "Por favor, introduzca una cédula válida.";
            header("Location: sigin_pagina.php");
            exit();
       }
   } else {
        $_SESSION['error_vacio'] = "Algún campo está vacío, por favor rellene todos los campos requeridos";
        header("Location: sigin_pagina.php");
        exit();
   }
   
    function validarCIEcuador($CI) {

        if (strlen($CI) !== 10) {
            return false;
        }
    
        if (!ctype_digit($CI)) {
            return false;
        }
    
        $verificador = (int)substr($CI, -1);
    
        $CISinVerificador = (int)substr($CI, 0, 9);
        
        $suma = 0;
        for ($i = 0; $i < 9; $i++) {
            $digito = $CISinVerificador % 10;
            $CISinVerificador = (int)($CISinVerificador / 10);
    
            if ($i % 2 === 0) {
                $digito *= 2;
                if ($digito > 9) {
                    $digito -= 9;
                }
            }
    
            $suma += $digito;
        }
    
        $digitoVerificadorEsperado = 10 - ($suma % 10);
        if ($digitoVerificadorEsperado === 10) {
            $digitoVerificadorEsperado = 0;
        }
    
        if ($verificador === $digitoVerificadorEsperado) {
            return true;
        }
    
        return false;
    }
?>