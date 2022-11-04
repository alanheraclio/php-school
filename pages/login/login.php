<?php
    include "../config.php";

    if(isset($_POST['submit'])) {
        $user = $_POST['user'];
        $password = $_POST['password'];
        $query = "SELECT user FROM users WHERE user = '$user' AND password = '$password'";

        $result = $connection->query($query);

        if($result == true) {

            if($result->num_rows > 0) {
                echo "suario encontrado";
                header("Location:../home/home.php");
            }
            else {
                echo "<div class='warning'>Usuario No registrado</div>";
            }
        }

        else {
            echo "Error:". $sql . "<br>". $connection->error;
        }

        $connection->close(); 
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Escuela</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div class="container">
            <h2>Sistema Escolar</h2>
            <img src="../../img/login.png" width="20%">
            <form action="" method="POST">
                <input class="form_input" type="text" name="user" placeholder="Nombre">
                <br>
                <input class="form_input" type="password" name="password" placeholder="Contraseña">
                <br>
                <input class="login_button" type="submit" name="submit" value="Ingresar">
            </form>
        </div>
        <div class="footer">
            <p>Monica Lucia Ramirez Romo</p>
        </div>
    </body>
</html>