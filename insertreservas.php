<?php
session_start();
$CI = $_SESSION['CI_usuario'];
if (isset($_SESSION['CI_usuario'])) {
    $id_servicio = $_POST['id_servicio'];
    $date_reserva = $_POST['date_reserva'];
    $hora_reserva = $_POST['hora_reserva'];
    $comentario = $_POST['comentario'];
    $reqlen = strlen($id_servicio) * strlen($date_reserva) * strlen($hora_reserva);

    if ($reqlen > 0) {
        $servername = "localhost";
        $database = "id21078063_dpelos";
        $usernameDB = "id21078063_dpelos";
        $passwordDB = "Carajo12345.";

        $conn = new mysqli($servername, $usernameDB, $passwordDB, $database);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        
        $sql_check = "SELECT * FROM id21078063_dpelos.reservas WHERE date_reserva = '$date_reserva' AND hora_reserva = '$hora_reserva'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            $_SESSION['no_reserva_cita'] = "La fecha y hora seleccionadas ya están ocupadas. Por favor, elige otra.";
            header("Location: reserva.php");
            exit();
        }

        $sql = "INSERT INTO id21078063_dpelos.reservas(id_servicio, CI, date_reserva, hora_reserva, comentario) 
        VALUES ('$id_servicio', '$CI', '$date_reserva', '$hora_reserva', '$comentario');";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['reserva_cita'] = "Se ha reservado su cita.";
            header("Location: CitasCliente.php");
            exit();
        } else {
            $_SESSION['no_reserva_cita'] = "No se ha podido reservar su cita.";
            header("Location: reserva.php");
            exit();
        }

        $conn->close();
    } else {
        $_SESSION['campo_req'] = "Complete los campos requeridos.";
        header("Location: reserva.php");
        exit();
    }
} else {
    $_SESSION['no_inicio'] = "Inicie sesión.";
    header("Location: login.php");
    exit();
}
?>