<?php
include("./conexion.php");

// Compruebe si se ha hecho clic en el botón de registro 
if (isset($_POST['editar_datos'])) {
    // recuperar datos del formulario
    $id = $_POST['editar_id'];
    $marca = $_POST['editar_marca'];
    $modelo = $_POST['editar_modelo'];
    $kilometraje = $_POST['editar_kilometraje'];
    $anio = $_POST['editar_anio'];
    $vin = $_POST['editar_vin'];
    $color = $_POST['editar_color'];
    $precio = $_POST['editar_precio'];


    // consulta
    $sql = "UPDATE vehiculo SET marca='$marca', modelo='$modelo', kilometraje='$kilometraje', anio='$anio', vin='$vin', color='$color', precio='$precio' WHERE idVehiculo = '$id'";
    
    $query = mysqli_query($db, $sql);

    // ¿Comprueba si la consulta se guardó correctamente?
    if ($query)
        header('Location: ./index.php?actualizacion=hecho');
    else
        header('Location: ./index.php?actualizacion=fallo');
} else
    die("Acceso denegado...");
