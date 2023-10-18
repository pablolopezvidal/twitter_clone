<?php
require_once("conexion/connection.php");
session_start();
$con = connection();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Título de la página</title>
</head>
<body>
    <h1>INICIO SESION</h1>
    <form action="/login/login.php" method="POST">

      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required />

      <label for="password">password:</label>
      <input type="text" id="password" name="password" required />

      <input type="submit" value="Send" name="submit"/>
    </form>
    <a href="\registro\paginaRegistro.php">¿No estas registrado? iniciar registro</a>
</body>
</html>