<?php
    include "../../config.php";
    $id = $_GET['id'];
    $query = "DELETE FROM `students` WHERE `id`='$id'";
    $result = $connection->query($query);

    if ($result == TRUE) {
        echo "<div class='success'>Estudiante borrado correctamente</div>"; 
    }
    else {
        echo "<div class='warning'>Error al intentar borrar al estudiante: ".$connection->error."</div>"; 
    }

    $connection->close();
?>
                
<!DOCTYPE html>
<html>
    <head>
        <title>Escuela</title>
        <link rel="stylesheet" href="delete-inscription.css">
    </head>
    <body>
        <div class="container">
            <a href="../read-inscriptions.php">Regresar</a>
        </div>
        <div class="footer">
            <p>Monica Lucia Ramirez Romo</p>
        </div>
    </body>
</html>