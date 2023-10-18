<?php
require_once("../conexion/connection.php");
session_start();
$con = connection();
$idUsuario = ($_SESSION['usuario']['id']);

$sql ="SELECT * FROM publications where userId = $idUsuario order by id desc";
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
  <div id="informacion">
    <div id="informacion_uno">
        <div id="fotoperfil"></div>
        <h1><?=($_SESSION['usuario']['username']);?></h1>
    </div>
    <div id="informacion_dos">
      <h3><?=($_SESSION['usuario']['description']);?></h3>
      <h3>||</h3>
      <h3><?=($_SESSION['usuario']['createDate']);?></h3>
    </div>
  </div>
  <a href="../cerreSesion/cierreSesion.php"><button>CERRAR SESION</button></a>
  <h1>Tweets</h1>
  <div id="contenido">
    <?php while ($row = mysqli_fetch_array($query)): ?>
              <div class="caja">
                  <!--preguntar si el primer h3 esta bien -->
                  <h3><?=$_SESSION['usuario']['username']?></h3>
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

