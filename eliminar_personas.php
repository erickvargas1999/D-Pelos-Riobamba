<?php
// Verificar si se ha enviado el parámetro 'CI' en la URL mediante el método GET
if (isset($_GET['CI'])) {
    // Obtener el valor del parámetro 'CI'
    $CI = $_GET['CI'];

    require("connection_db.php");
    $eliminar = "DELETE FROM id21078063_dpelos.personas WHERE CI='$CI'";
    $result = mysqli_query($link, $eliminar);
    
    if($result){
        echo"<script>alert('Cita eliminada exitosamente'); window.history.go(-1);</script>";
        //header("Location: CitasCliente.php");
    }else{
        echo"<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";
    }

} else {
    echo "No se proporcionó el parámetro 'CI' en la URL.";
}
?>