<?php

$server = "localhost";
$user = "root";
$password = "";
$nom_database = "cmdcars";

$db = mysqli_connect($server, $user, $password, $nom_database);

if (!$db)
    die("Fallo al conectar con la base de datos " . mysqli_connect_error());
