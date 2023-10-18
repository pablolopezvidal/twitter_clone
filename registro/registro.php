<?php 

if (isset($_POST["submit"])) {
    require_once("../conexion/connection.php");
    session_start();
    $con = connection();


    
    $username = isset($_POST["username"]) ? mysqli_real_escape_string($con, $_POST["username"]) : false;
    $email = isset($_POST["email"]) ? mysqli_real_escape_string($con, trim($_POST["email"])) : false;
    $password = isset($_POST["password"]) ? mysqli_real_escape_string($con, $_POST["password"]) : false;
    $description = isset($_POST["description"]) ? mysqli_real_escape_string($con, trim($_POST["description"])) : false;
    

    $arrayErrores = array();
    
    if (!empty($username) && !is_numeric($username)) {
        $usernameValidado = true;
    } else {
        $usernameValidado = false;
        $arrayErrores["username"] = "El username no es valido";
    }

    if (!empty($email)) {
        $mailValidado = true;
    } else {
        $mailValidado = false;
        $arrayErrores["mail"] = "El mail no es valido";
    }

    if (!empty($password)) {
        $passValidado = true;
    } else {
        $passValidado = false;
        $arrayErrores["password"] = "la contraseña no es valido";
    }

    if (!empty($password)) {
        $descriptionValidado = true;
    } else {
        $descriptionValidado = false;
        $arrayErrores["description"] = "la descripcion no puede ser vacia";
    }


    $sqlUsername = "SELECT Count(*) FROM users WHERE username= '{$username}'";
    $queryCount = mysqli_query($con, $sqlUsername);
    $UsernameCount = (mysqli_fetch_row($queryCount))[0];

    if ($mailValidado && ($UsernameCount > 0)) {
        $mailValidado = false;
        $arrayErrores["mail"] = "Este mail ya ha sido registrado";
    } else {
        $mailValidado = true;
    }

/*
    if (!empty($username)) {
        $passValidado = true;
    } else {
        $passValidado = false;
        $arrayErrores["password"] = "El password no es valido";
    }
*/

    $guardarUsuario = false;
    if(count($arrayErrores) == 0) {
        $guardarUsuario = true;
        
        $passSegura = password_hash($password, PASSWORD_BCRYPT, ["cost" => 4]);
    
        
        $sql11 = "INSERT INTO users VALUES(0,'$username', '$email', '$passSegura', '$description', NOW())";
        $guardar = mysqli_query($con, $sql11);
                                
        if ($guardar) {
            $_SESSION["completado"] = "Registro completado";
            header("Location: ../index.php");
        } else {
            $_SESSION["errores"]["general"] = "Fallo en el registro";
            header("Location: ../paginas_error/error1");
        }
    } else {
        $_SESSION["errores"] = $arrayErrores;
        header("Location: ../paginas_error/error");
    }
    
}
?>