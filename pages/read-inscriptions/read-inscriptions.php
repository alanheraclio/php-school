<?php
    include "../config.php";

    $query = "SELECT * FROM students";
    $result = $connection->query($query);

    $connection->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Escuela</title>
        <link rel="stylesheet" href="read-inscriptions.css">
    </head>
    <body>
        <div class="menu">
            <a class="logout_button" href="../home/home.php">Cerrar Sesion</a>
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
                        <th>Fecha de Inscripcion</th>
                        <th>Grado</th>
                        <th>Estado de la Republica</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']." ".$row['last_name_1']." ".$row['last_name_2']; ?></td>
                            <td><?php echo $row['inscription_date']; ?></td>
                            <td><?php echo $row['level']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td>
                                <a class="action_buttton read_button" href="../read-inscriptions/read-inscription/read-inscription.php?id=<?php echo $row['id']; ?>">Ver</a>&nbsp;
                                <a class="action_buttton edit_button" href="../read-inscriptions/edit-inscription/edit-inscription.php?id=<?php echo $row['id']; ?>">Editar</a>&nbsp;
                                <a class="action_buttton delete_button" href="../read-inscriptions/delete-inscription/delete-inscription.php?id=<?php echo $row['id']; ?>">Borrar</a>
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