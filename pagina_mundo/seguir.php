<?php
require_once("../conexion/connection.php");
session_start();
$con = connection();

$userId= $_GET["userId"];
$username= $_GET["username"];
$userid1= $_SESSION['usuario']['id'];
$sql="INSERT INTO follows VALUES('$userid1','$userId')";
$res = mysqli_query($con, $sql);
header("Location: perfilUsuario.php?username=$username")
?>

