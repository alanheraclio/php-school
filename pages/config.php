<?php
    $server = "localhost";
    $user = "root"; 
    $pass = "";
    $db = "school";

    $connection = new mysqli($server, $user, $pass, $db);

    if ($connection->connect_error) {
        die("Error de conexion: " . $connection->connect_error);
    }
?>