<?php
// Verificar si se ha enviado el parámetro 'id_reserva' en la URL mediante el método GET
if (isset($_GET['id_reserva'])) {
    // Obtener el valor del parámetro 'id_reserva'
    $id_reserva = $_GET['id_reserva'];

    require("connection_db.php");
    $eliminar = "DELETE FROM id21078063_dpelos.reservas WHERE id_reserva='$id_reserva'";
    $result = mysqli_query($link, $eliminar);
    
    if($result){
        echo"<script>alert('Cita eliminada exitosamente'); window.history.go(-1);</script>";
        //header("Location: CitasCliente.php");
    }else{
        echo"<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";
    }

} else {
    echo "No se proporcionó el parámetro 'id_reserva' en la URL.";
}
?>