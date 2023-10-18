<?php
require_once("./conexion/connection.php");
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
    <form action="cambiodesc.php" method="POST">
      <label for="nueva_descripcion">nueva_descripcion:</label>
      <input type="textarea" id="nueva_descripcion" name="nueva_descripcion" required />
      <input type="submit" value="Send" name="submit"/>

    </form>
</body>
</html>