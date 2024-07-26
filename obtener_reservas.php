<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "id21078063_dpelos";
$password = "Carajo12345.";
$dbname = "id21078063_dpelos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener las reservas del día actual
$fecha_actual = date("Y-m-d");
$sql = "CALL obtener_reservas();";
$result = $conn->query($sql);

// Crear un array para almacenar los datos de las reservas
$reservas = array();

// Recorrer los resultados de la consulta y agregarlos al array de reservas
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $hora_reserva = $row['hora_reserva'];
            $datetime = DateTime::createFromFormat('H:i:s', $hora_reserva);
            // Sumar 30 minutos al objeto DateTime
            $datetime->add(new DateInterval('PT30M'));

            // Obtener la nueva hora después de sumar 30 minutos
            $nueva_hora_reserva = $datetime->format('H:i:s');
        $reserva = array(
            
            'id_reserva' => $row['id_reserva'],
            'title' => $row['apellido'] ." " .$row['nombre'] . " - " . $row['nombre_servicio'],
            'start' => $row['date_reserva'] . "T" . $row['hora_reserva'], // Formato ISO8601 (YYYY-MM-DDTHH:mm:ss)
            'end' => $row['date_reserva'] . "T" . $nueva_hora_reserva // Formato ISO8601 (YYYY-MM-DDTHH:mm:ss)
        );
        $reservas[] = $reserva;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

// Devolver los datos de las reservas en formato JSON
header('Content-Type: application/json');
echo json_encode($reservas);
?>