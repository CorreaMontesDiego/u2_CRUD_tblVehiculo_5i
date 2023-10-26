<?php
include("./conexion.php");

//¿Verificar si el botón de registro ya ha sido pulsado o no?
if (isset($_POST['enviar'])) {
    // recuperar datos del formulario
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $kilometraje = $_POST['kilometraje'];
    $anio = $_POST['anio'];
    $vin = $_POST['vin'];
    $color = $_POST['color'];
    $precio = $_POST['precio'];

    // consulta
    $sql = "INSERT INTO vehiculo(marca, modelo, kilometraje, anio, vin, color, precio)
    VALUES('$marca', '$modelo', '$kilometraje', '$anio', '$vin', '$color', '$precio')";
    $query = mysqli_query($db, $sql);

    // ¿Verificar si la consulta se ha guardado exitosamente?
    if ($query)
        header('Location: ./index.php?subida=hecho');
    else
        header('Location: ./index.php?subida=fallo');
} else
    die("Acceso denegado...");
