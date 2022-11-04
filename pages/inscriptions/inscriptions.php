<!DOCTYPE html>
<html>
    <head>
        <title>Escuela</title>
        <link rel="stylesheet" href="inscriptions.css">
    </head>
    <body>
        <div class="menu">
            <a class="menu_button" href="../home/home.php">Inicio</a>
            <a class="menu_button" href="../services/services.php">Servicios</a>
            <a class="menu_button" href="../inscriptions/inscriptions.php">Inscripciones</a>
            <a class="menu_button" href="../contact/contact.php">Contacto</a>
            <a class="menu_button" href="../users/users.php">Accesos a Usuarios</a>
        </div>
        <div class="header">
            <h2>Inscripciones</h2>
        </div>
        <div class="container">
            <div class="form_container">
            <?php
    include "../config.php";

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $lastName1 = $_POST['lastName1'];
        $lastName2 = $_POST['lastName2'];
        $curp = $_POST['curp'];
        $birthday = date('Y-m-d',strtotime($_POST['birthday']));
        $city = $_POST['city'];
        $level = $_POST['level'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $inscription_date = date("Y-m-d");
        
        $query = "INSERT INTO students 
                  VALUES (NULL, '$name', '$lastName1', '$lastName2', '$curp', '$birthday', '$city', '$level', '$phone', '$email', '$inscription_date')";

        $result = $connection->query($query);

        if($result == TRUE){
            echo "<div class='success'>Estudiante inscrito correctamente</div>";    
        }
        
        else{      
            echo "Error:". $sql . "<br>". $connection->error;
            echo "<div class='warning'>$connection->error</div>";        
        }

        $connection->close(); 
    }
?>               
                <form action="" method="POST">
                    <h3>Capture los datos del Alumno</h3>
                    <input class="form_input" type="text" name="name" placeholder="Nombre del Alumno" required>
                    <br>
                    <input class="form_input" type="text" name="lastName1" placeholder="Apellido Paterno" required>
                    <br>
                    <input class="form_input" type="text" name="lastName2" placeholder="Apellido Materno" required>
                    <br>
                    <input class="form_input" type="text" name="curp" placeholder="CURP" maxlength="18" minlength="18" required>
                    <br>
                    <input class="form_input" type="date" name="birthday" placeholder="Fecha de Nacimiento" required>
                    <br>
                    <input class="form_input" type="text" name="city" placeholder="Estado de la Republica" required>
                    <br>
                    <input class="form_input" type="text" name="level" placeholder="Grado Escolar" required>
                    <br>
                    <input class="form_input" type="number" name="phone" placeholder="Telefono de contacto" required>
                    <br>
                    <input class="form_input" type="email" name="email" placeholder="Correo Electronico" required>
                    <br>
                    <a href="../home/home.php">
                        <input class="form_button cancel_button" type="button" name="cancel" value="Cancelar">
                    </a>
                    <input class="form_button save_button" type="submit" name="submit" value="Guardar">
                </form>
            </div>
        </div>
        <div class="footer">
            <p>Monica Lucia Ramirez Romo</p>
        </div>
    </body>
</html>