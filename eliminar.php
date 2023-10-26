<?php
include("./conexion.php");

if (isset($_POST['eliminar_datos'])) {
    // Obtener ID desde la cadena de consulta
    $id = $_POST['eliminar_id'];

    // consulta de eliminación
    $sql = "DELETE FROM vehiculo WHERE idVehiculo = '$id'";
    $query = mysqli_query($db, $sql);

    // ¿La consulta se eliminó con éxito?
    if ($query) {
        header('Location: ./index.php?eliminacion=hecho');
    } else
        die('Location: ./index.php?eliminacion=fallo');
} else
    die("Acceso denegado...");
