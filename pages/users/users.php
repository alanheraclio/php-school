<!DOCTYPE html>
<html>
    <head>
        <title>Escuela</title>
        <link rel="stylesheet" href="users.css">
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
            <h2>Acceso a Usuarios</h2>
        </div>
        <div class="container">
            <div class="login_form">
                <?php
                    include "../config.php";
                    if(isset($_POST['submit'])) {
                        $user = $_POST['user'];
                        $password = $_POST['password'];
                        $query = "SELECT * FROM users WHERE user = '$user' AND password = '$password'";

                        $result = $connection->query($query);

                        if($result == true) {
                            if($result->num_rows > 0) {

                                foreach($result as $row) {
                                    if($row['role'] == 'admin'){
                                        header("Location:../read-inscriptions/read-inscriptions.php");
                                    }
                                    else {
                                        echo "<div class='warning'>No cuenta con los accesos</div>";
                                    }
                                }
                            }
                            else {
                                echo "<div class='warning'>Usuario no registrado</div>";
                            }
                        }
                        else {
                            echo "Error:". $sql . "<br>". $connection->error;
                        }

                        $connection->close();
                    }
                ?>
                <h2>Sistema Administrativo</h2>
                <img src="../../img/login.png" width="20%">
                <form action="" method="POST">
                    <input class="form_input" type="text" name="user" placeholder="Nombre">
                    <br>
                    <input class="form_input" type="password" name="password" placeholder="Contraseña">
                    <br>
                    <input class="login_button" type="submit" name="submit" value="Ingresar">
                </form>
            </div>
        </div>
        <div class="footer">
            <p>Monica Lucia Ramirez Romo</p>
        </div>
    </body>
</html>