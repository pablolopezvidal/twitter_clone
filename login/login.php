<?php

    require_once ("../conexion/connection.php");
    session_start();
    $con = connection();


    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = trim($_POST["username"]);
        $password = $_POST["password"];
    }

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $res = mysqli_query($con, $sql);

    if ($res && mysqli_num_rows($res) == 1) {
        $usuario = mysqli_fetch_assoc($res);

        if (password_verify($password, $usuario["password"])) { /*aqui se pone el nombre que tiene la columna en la tablade de mysql para comparar la encriptada con al que se le ha dado el el formulario*/
            $_SESSION["usuario"] = $usuario;
            header("Location: ../twitter/twitter.php");
        } else {
            $_SESSION["error_login"] = "Login incorrecto";
            header("Location: ../paginas_error/error1");
        }
    } else {
        $_SESSION["error_login"] = "Login incorrecto";
        header("Location: ../paginas_error/error");/*aqui cuando se vulve al index se vuelve a ejecutar de arriba a abajo por eso se imprime el mensaje*/
    }
?>