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
    <form action="nuevoTweet.php" method="POST">
      <label for="tweet">tweet:</label>
      <input type="textarea" id="tweet" name="tweet" required />
      <input type="submit" value="Send" name="submit"/>
    </form>
</body>
</html>