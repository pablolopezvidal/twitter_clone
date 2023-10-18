<?php
require_once("../conexion/connection.php");
session_start();
$con = connection();
/*$idUsuario = ($_SESSION['usuario']['id']);*/
$sql ="SELECT * FROM publications join users on publications.userId = users.id order by publications.id DESC";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
  <title>Título de la página</title>
</head>
<body>
    <div id="barra_superior">
      <a href="../twitter/twitter.php"><img id=logotwitter src="https://cdn.icon-icons.com/icons2/947/PNG/512/twitter-social-outlined-logo_icon-icons.com_74044.png"></a>
    </div>
    <div id="contenido">
      <?php while ($row = mysqli_fetch_array($query)): ?>
              <div class="caja">
                  <a href="perfilUsuario.php?username=<?=$row['username'] ?>"><?= $row['username'] ?></a> <!--que esto sea un <a> con un metodos post para poder almacenar el nombre de usuario y arrais de ahi imprimir todas las cosas de ese susuario -->
                  <h3><?= $row['text']?></h3>
                  <h3><?= $row['createDate']?></h3>
              </div>                   
          <?php endwhile; ?>
    </div>
      <div id="barra_inferior">
      <div class="botones"><a href="../twitear/twitear.php">PUBLICAR</a></div>
      <div class="botones"><a href="../descripcion/cambiardesc.php">DESCRIPCION</a></div>
      <div class="botones"><a href="../pagina_mundo/mundo.php">MUNDO</a></div>
      <div class="botones"><a href="../seguidos/seguidos.php">SEGUIDOS</a></div>
    </div>
</body>
</html>