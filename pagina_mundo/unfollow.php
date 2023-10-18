<?php
require_once("./conexion/connection.php");
session_start();
$con = connection();

$userId= $_GET["userId"];
$username= $_GET["username"];
$userid1= $_SESSION['usuario']['id'];
$sql="DELETE from follows where users_id='$userid1' and userToFollowId='$userId'";
$res = mysqli_query($con, $sql);
header("Location: perfilUsuario.php?username=$username")
?>

