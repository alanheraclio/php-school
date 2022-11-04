<?php
    include "../../config.php";
    $id = $id = $_GET['id'];
    $query = "SELECT * FROM students WHERE id = '$id'";
    $result = $connection->query($query);

    $connection->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Escuela</title>
        <link rel="stylesheet" href="read-inscription.css">
    </head>
    <body>
        <div class="menu">
            <a class="logout_button" href="../read-inscriptions.php">Regresar</a>
        </div>
        <div class="header">
            <h2>Consulta de Inscripciones</h2>
        </div>
        <div class="container">    
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>CURP</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Estado de la Republica</th>
                        <th>Grado</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Fecha de Inscripcion</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['last_name_1']; ?></td>
                            <td><?php echo $row['last_name_2']; ?></td>
                            <td><?php echo $row['curp']; ?></td>
                            <td><?php echo $row['birthday']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td><?php echo $row['level']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['inscription_date']; ?></td>
                        </tr>                       

                    <?php }
                        }
                    ?>           
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>Monica Lucia Ramirez Romo</p>
        </div>
    </body>
</html>