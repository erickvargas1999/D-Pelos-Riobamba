<?php
    session_start();
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $reqlen = strlen($contrasena) * strlen($email);

    if ($reqlen > 0) {
        $servername = "localhost";
        $database = "id21078063_dpelos";
        $usernameDB = "id21078063_dpelos";
        $passwordDB = "Carajo12345.";

        $conn = new mysqli($servername, $usernameDB, $passwordDB, $database);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $query = "SELECT CI, contrasena, nombre, apellido, birth, tel FROM id21078063_dpelos.personas WHERE email = '$email'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $stored_hashed_password = $row['contrasena'];
            $nombre_usuario = $row['nombre'];
            $apellido_usuario = $row['apellido'];
            $birth_usuario = $row['birth'];
            $cedula = $row['CI'];
            $tel_usuario = $row['tel'];
            $correo_administrador = "dpelosriobamba@gmail.com";
            if (password_verify($contrasena, $stored_hashed_password)) {
                $_SESSION['correo_usuario'] = $email;
                $_SESSION['nombre_usuario'] = $nombre_usuario;
                $_SESSION['apellido_usuario'] = $apellido_usuario;
                $_SESSION['CI_usuario'] = $cedula;
                $_SESSION['birth_usuario'] = $birth_usuario; 
                $_SESSION['tel_usuario'] = $tel_usuario; 
                $_SESSION['stored_hashed_password'] = $stored_hashed_password; 
                $_SESSION['etiqueta'] = "Reservaciones";
                if ($email === $correo_administrador) {
                    $_SESSION['rol_usuario'] = "administrador";
                } else {
                    $_SESSION['rol_usuario'] = "usuario";
                }
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['error_credencial'] = "Credenciales incorrectas. Por favor, verifica tu nombre de usuario y contraseña.";
                header("Location: login_pagina.php");
                exit();
            }
        } else {
            $_SESSION['error_credencial2'] = "Credenciales incorrectas. Por favor, verifica tu nombre de usuario y contraseña.";
            header("Location: login_pagina.php");
            exit();
        }

        $conn->close();
    } else {
        echo "Algún campo está vacío, por favor rellene todos los campos requeridos";
    }
    
?>
