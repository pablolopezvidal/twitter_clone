<?php

    require_once ("./conexion/connection.php");
    session_start();
    $con = connection();

   
    $nueva_descripcion = $_POST['nueva_descripcion'];
    $nueva_desc= $_SESSION['usuario']['username'];
    $sql = "UPDATE users SET description='$nueva_descripcion' WHERE username='$nueva_desc'";
    $query = mysqli_query($con, $sql);
    $_SESSION['usuario']['description']=$nueva_descripcion;
    
    if($query){
        Header("Location: ../twitter/twitter.php");
    }else{
    
    }
?>