<?php
session_start();
$CI = $_SESSION['CI_usuario'];
if (isset($_SESSION['CI_usuario']) && isset($_POST['mensaje'])) {
    $mensaje = $_POST['mensaje'];

        $servername = "localhost";
        $database = "id21078063_dpelos";
        $usernameDB = "id21078063_dpelos";
        $passwordDB = "Carajo12345.";

        $conn = new mysqli($servername, $usernameDB, $passwordDB, $database);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $sql = "INSERT INTO id21078063_dpelos.comentarios(CI, mensaje) 
        VALUES ('$CI', '$mensaje');";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['comentario'] = "Gracias por proporcionar su comentario.";
            header("Location: ayuda.php");
            exit();
        } else {
            $_SESSION['no_comentario'] = "No se ha podido enviar tu comentario.";
            header("Location: ayuda.php");
            exit();
        }
        $conn->close();
    } else {
        $_SESSION['campos'] = "Complete los campos requeridos.";
        header("Location: ayuda.php");
        exit();
    }
?>