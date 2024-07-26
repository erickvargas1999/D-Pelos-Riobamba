<?php
    session_start();
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $CI = $_POST['CI'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $birth = $_POST['birth'];

    $reqlen = strlen($nombre) * strlen($email) * strlen($apellido) * strlen($birth) * strlen($tel) * strlen($CI);
    

    if ($reqlen > 0) {
        $servername = "localhost";
        $database = "id21078063_dpelos";
        $usernameDB = "id21078063_dpelos";
        $passwordDB = "Carajo12345.";

        $conn = new mysqli($servername, $usernameDB, $passwordDB, $database);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }
        
        $query_check = "SELECT CI FROM id21078063_dpelos.personas WHERE (email='$email' OR tel='$tel') AND CI != '$CI';";
        $result_check = $conn->query($query_check);
        if ($result_check->num_rows > 0) {
            $_SESSION['error_duplicado'] = "El correo electrónico o número de teléfono ya está registrado por otro usuario.";
            header("Location: UpdateCliente.php");
            exit();
        } else {
            
            $query_update = "UPDATE id21078063_dpelos.personas SET nombre='$nombre', apellido='$apellido', email='$email', tel='$tel', birth='$birth' WHERE CI='$CI';";
            $result_update = $conn->query($query_update);

            if ($result_update === TRUE) {
                $_SESSION['exito_actualizacion'] = "Información actualizada exitosamente.";
                header("Location: UpdateCliente.php");
                exit();
            } else {
                $_SESSION['error_actualizacion'] = "Error al actualizar la información: " . $conn->error;
                header("Location: UpdateCliente.php");
                exit();
            }
        }
    } else {
        $_SESSION['error_vacio'] = "Algún campo está vacío, por favor rellene todos los campos requeridos";
        header("Location: UpdateCliente.php");
        exit();
    }
?>
