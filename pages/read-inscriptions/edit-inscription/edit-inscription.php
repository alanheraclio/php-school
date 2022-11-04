<?php
    include "../../config.php";
    $id = $_GET['id'];
    $query = "SELECT * FROM students WHERE id = '$id'";
    $result = $connection->query($query);

    if($result == true) {
        if($result->num_rows < 1) {
            echo "<div class='warning'>Usuario No registrado</div>";
        }
    }
    else {
        echo "Error:". $sql . "<br>". $connection->error;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Escuela</title>
        <link rel="stylesheet" href="edit-inscription.css">
    </head>
    <body>
        <div class="header">
            <h2>Editar datos del Estudiante</h2>
        </div>
        <div class="container">
            <div class="form_container">
            <?php
                include "../../config.php";

                if(isset($_POST['submit'])) {
                    $id = $_GET['id'];
                    $name = $_POST['name'];
                    $lastName1 = $_POST['lastName1'];
                    $lastName2 = $_POST['lastName2'];
                    $curp = $_POST['curp'];
                    $birthday = date('Y-m-d',strtotime($_POST['birthday']));
                    $city = $_POST['city'];
                    $level = $_POST['level'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $inscriptionDate = date("Y-m-d");
                    
                    $query2 = "UPDATE `students` SET 
                    `name`='$name',
                    `last_name_1`='$lastName1',
                    `last_name_2`='$lastName2',
                    `curp`='$curp',
                    `birthday`='$birthday',
                    `city`='$city',
                    `level`='$level',
                    `phone`='$phone',
                    `email`='$email' 
                    WHERE `id`='$id'";;

                    $result2 = $connection->query($query2);

                    if($result2 == TRUE){
                        echo "<div class='success'>Estudiante actualizado correctamente</div>";    
                    }
                    
                    else{      
                        // echo "Error:". $sql . "<br>". $connection->error;
                        echo "<div class='warning'>$connection->error</div>";        
                    }

                    $connection->close();
                }
            ?>               
                <form action="" method="POST">
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {?>
                    <h3>Capture los datos del Alumno</h3>
                    <input class="form_input" type="text" name="name" value=<?php echo $row['name'];?> placeholder="Nombre del Alumno">
                    <br>
                    <input class="form_input" type="text" name="lastName1" value=<?php echo $row['last_name_1'];?> placeholder="Apellido Paterno">
                    <br>
                    <input class="form_input" type="text" name="lastName2" value=<?php echo $row['last_name_2'];?> placeholder="Apellido Materno">
                    <br>
                    <input class="form_input" type="text" name="curp" value=<?php echo $row['curp'];?> placeholder="CURP">
                    <br>
                    <input class="form_input" type="date" name="birthday" value=<?php echo $row['birthday'];?> placeholder="Fecha de Nacimiento">
                    <br>
                    <input class="form_input" type="text" name="city" value=<?php echo $row['city'];?> placeholder="Estado de la Republica">
                    <br>
                    <input class="form_input" type="text" name="level" value=<?php echo $row['level'];?> placeholder="Grado Escolar">
                    <br>
                    <input class="form_input" type="number" name="phone" value=<?php echo $row['phone'];?> placeholder="Telefono de contacto">
                    <br>
                    <input class="form_input" type="email" name="email" value=<?php echo $row['email'];?> placeholder="Correo Electronico">
                    <br>
                    <a href="../read-inscriptions.php">
                        <input class="form_button cancel_button" type="button" name="cancel" value="Cancelar">
                    </a>
                    <input class="form_button save_button" type="submit" name="submit" value="Actualizar">
                <?php }
                    }
                ?>
                </form>
            </div>
        </div>
        <div class="footer">
            <p>Monica Lucia Ramirez Romo</p>
        </div>
    </body>
</html>