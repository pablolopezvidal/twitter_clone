<?php
require_once("../conexion/connection.php");
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
    <h1>REGISTRO</h1>
    <form action="registro.php" method="POST">

      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required />

      <label for="email">email:</label>
      <input type="text" id="email" name="email" required />

      <label for="password">password:</label>
      <input type="text" id="password" name="password" required />

      <label for="description">description:</label>
      <input type="text" id="description" name="description" required />

      <input type="submit" value="Send" name="submit"/>
    </form>
</body>
</html>