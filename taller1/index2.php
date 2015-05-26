<?php

//Iniciar Sesión
session_start();

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
  header("location:index.php"); 
}

$id_usuario= $_SESSION['id'];
?>

<!DOCTYPE html>
<?php
include("include/site_config.php");
include("include/clase_mysql.php");
$miconexion = new clase_mysql;
$miconexion->conectar($db_name,$db_host, $db_user,$db_password);
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Proyecto Academias</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Joseph Godoy">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
<body data-offset="40" background="images/fondotot.jpg" style="background-attachment: fixed">
<div class="container">
<header class="header">
<div class="row">
<h1><b><?php
	echo $_SESSION['user'];
	?></h1>
	
</div>
</header>

  <!-- Navbar
    ================================================== -->
<?php

include("include/menu.php");

?>
<!-- ======================================================================================================================== -->




<div class="row">
  <div class="col-xs-6 col-md-4">
  </div>
  <div class="col-xs-6 col-md-4">
  </div>
  <div class="col-xs-6 col-md-4">
  </div>
</div>
<!--EMPIEZA DIVISION DE LA PAGIN EN TRES PARTES -->


      <div class="row">
        <div class="col-xs-6 col-sm-3">
          <?php
            $miconexion->consulta("select * from bloques where estado='1' and posicion='izquierda'");
            for ($i=0; $i < $miconexion->numregistros(); $i++) { 
            $lista=$miconexion->consulta_lista();
            echo $lista[1]."<br>".$lista[2];
              # code...
            }
          ?>
        </div>
        <div class="col-xs-6 col-md-6">
            <?php
            $id="";
            extract($_GET);
            if($id==''){
              $query = "select * from configuracion";
              $result = mysql_query($query) or die("error". mysql_error());
              while ($row = mysql_fetch_array($result)) {
                $id=$row['HOME_PAGE'];
              }
            }
            $query = "select * from contenidos where estado='1' and ID='$id'";
            $result = mysql_query($query) or die("error". mysql_error());
            while ($row = mysql_fetch_array($result)) {
              echo "".utf8_encode($row['TITULO'])."<br>";
              echo "".utf8_encode($row['DESCRIPCION'])."";
            }
            ?>

        </div>
        <div class="col-xs-6 col-sm-3">
          <?php
            $miconexion->consulta("select * from bloques where estado='1' and posicion='derecha'");
            for ($i=0; $i < $miconexion->numregistros(); $i++) {
                $lista=$miconexion->consulta_lista();
                echo $lista[1]."<br>".$lista[2];
            }
            
            ?>
        </div>

      </div>




      <div style="padding:68px 150px 0 30px;">



      <?php
        $miconexion->consulta("select * from comentarios");
        $miconexion->comentario();  

    $query = "select * from comentarios";
              $result = mysql_query($query) or die("error". mysql_error());
              while ($row = mysql_fetch_array($result)) {
                $nom=$row['nombre'];
              }

       

      ?>

      <label style="font-size: 18pt;">Deja tu cometario</label>
      <form action="regcom.php" method="post">
      
      <textarea name="comen" class="form-control" rows="3" placeholder="Deja tu cometario aquí"></textarea>
      <label ><?php echo date("Y-m-d");?></label><br>
      <input class="btn btn-primary" type="submit" value="Aceptar">
   
    </form>

    
      </div>


<!--TERMINA DIVISION DE LA PAGIN EN TRES PARTES -->







<!-- Footer
      ================================================== -->
<hr class="soften"/>
<footer class="footer">

<hr class="soften"/>
<p>&copy; <?php echo $site_autor;?> <br/><br/></p>
 </footer>
</div><!-- /container -->
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	</style>
  </body>
</html>