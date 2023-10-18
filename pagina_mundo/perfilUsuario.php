<?php
require_once("./conexion/connection.php");
session_start();
$con = connection();
$username= $_GET["username"];
$sql ="SELECT * FROM publications join users on publications.userId = users.id where username='$username'";
$query = mysqli_query($con, $sql);
$res= mysqli_fetch_assoc($query);
$idUsuario=$res['userId'];
$sql2 ="SELECT * FROM publications where userid='$idUsuario'";
$query2 = mysqli_query($con, $sql2);
if($_SESSION['usuario']['username']==$username)
    header("Location: ../twitter/twitter.php")
?>





<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Título de la página</title>
  <link rel="stylesheet" type="text/css" href="../estilos/estilos.css">

</head>
<body>
    <div id="barra_superior">
        <a href="../twitter/twitter.php"><img id=logotwitter src="https://cdn.icon-icons.com/icons2/947/PNG/512/twitter-social-outlined-logo_icon-icons.com_74044.png"></a>
    </div>
    <div id="informacion">
    <div id="informacion_uno">
        <div id="fotoperfil"></div>
        <h1><?=$username;?></h1>
    </div>
    <div id="informacion_dos">
        <h1><?= $res['description']?></h1>
        <h3>||</h3>
        <h1><?= $res['createDate']  ?></h1>
    </div>
    <?php
        $id1=$res['userId'];
        $id=$_SESSION['usuario']['id'];
        $sql5="SELECT * from follows where users_id=$id  and userToFollowId=$id1";
        $query5 = mysqli_query($con, $sql5);
        if(mysqli_num_rows($query5) == 0):?>
         <a href="seguir.php?userId=<?=$res['userId']?>&username=<?=$res['username']?>">seguir</a> <!--que esto sea un <a> con un metodos post para poder almacenar el nombre de usuario y arrais de ahi imprimir todas las cosas de ese susuario -->                                                                                                                <!--que esto sea un <a> con un metodos post para poder almacenar el nombre de usuario y arrais de ahi imprimir todas las cosas de ese susuario -->
         <?php else:?>
         <a href="unfollow.php?userId=<?=$res['userId']?>&username=<?=$res['username']?>">unfollow</a>
         <?php endif ?> 
  </div>
  <h1>Tweets</h1>
  <div id="contenido">
        <?php while ($row = mysqli_fetch_array($query2)): ?>
                    <div class="caja">
                        <!--preguntar si el primer h3 esta bien -->
                        <h3><?=$username?></h3>
                        <h3><?= $row['text']?></h3>
                        <h3><?= $row['createDate']?></h3>
                    </div>                   
        <?php endwhile; ?>
    </div>
    </div>
      <div id="barra_inferior">
      <div class="botones"><a href="../twitear/twitear.php">PUBLICAR</a></div>
      <div class="botones"><a href="../descripcion/cambiardesc.php">DESCRIPCION</a></div>
      <div class="botones"><a href="../pagina_mundo/mundo.php">MUNDO</a></div>
      <div class="botones"><a href="../seguidos/seguidos.php">SEGUIDOS</a></div>
    </div>
</body>
</html>


  