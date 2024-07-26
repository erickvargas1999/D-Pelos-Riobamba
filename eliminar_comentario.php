<?php
// Verificar si se ha enviado el parámetro 'id_comentario' en la URL mediante el método GET
if (isset($_GET['id_comentario'])) {
    // Obtener el valor del parámetro 'id_comentario'
    $id_comentario = $_GET['id_comentario'];

    require("connection_db.php");
    $eliminar = "DELETE FROM id21078063_dpelos.comentarios WHERE id_comentario='$id_comentario'";
    $result = mysqli_query($link, $eliminar);
    
    if($result){
        echo"<script>alert('Comentario eliminado exitosamente'); window.history.go(-1);</script>";
        //header("Location: Comentarios.php");
    }else{
        echo"<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";
    }

} else {
    echo "No se proporcionó el parámetro 'id_comentario' en la URL.";
}
?>