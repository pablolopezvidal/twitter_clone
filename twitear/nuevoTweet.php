<?php

    require_once ("./conexion/connection.php");
    session_start();
    $con = connection();

   
    $tweet = $_POST['tweet'];
    $usuarioID= $_SESSION['usuario']['id'];
    $sql = "INSERT INTO publications VALUES(0,'$usuarioID','$tweet', NOW())";
    $query = mysqli_query($con, $sql);
    
    
    if($query){
        Header("Location: ../twitter/twitter.php");
    }else{
    
    }
?>