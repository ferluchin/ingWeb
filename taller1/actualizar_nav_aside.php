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
	<?php
	include("include/cabecera.php");
	?>
</div>
</header>

  <!-- Navbar
    ================================================== -->

<?php
include("include/menu2.php");
?>

<!-- ======================================================================================================================== -->
<div class="row">
	
	
		
	<div class="span12">

		<div class="caption">
		
<!--///////////////////////////////////////////////////Empieza cuerpo del documento interno////////////////////////////////////////////-->
		<h2> Administración de contenidos disponibles</h2>	
		<div class="well well-small">
		<hr class="soft"/>
		<h4>Edición de contenido</h4>
		<div class="row-fluid">
		
		<?php
		extract($_GET);

		$sql="SELECT * FROM bloques WHERE id=$id";
		$ressql=mysql_query($sql);
		while ($row=mysql_fetch_row ($ressql)){
		    	$id=$row[0];
		    	$nombre=$row[1];
		    	$des=$row[2];
		    	$posicion=$row[3];
		    	$estado=$row[4];
		    }

		?>

		<form action="ejecutaactualizar2.php" method="post">
				Id<br><input type="text" name="id" value= "<?php echo $id ?>" readonly="readonly"><br>
				Título<br> <input type="text" name="nombre" value="<?php echo $nombre?>" ><br>
				Descripción<br> <textarea name="des" rows="7" cols="50"> <?php echo $des?></textarea>   <br>
				Estado<br> <input type="text" name="posicion" value="<?php echo $posicion?>"><br>
				Estado<br> <input type="text" name="estado" value="<?php echo $estado?>"><br>
				<br>
				<input type="submit" value="Guardar" class="btn btn-success btn-primary">
			</form>

				  
		
		
		<div class="span8">
		
		</div>	
		</div>	
		<br/>
		


		<!--EMPIEZA DESLIZABLE-->
		
		 <!--TERMINA DESLIZABLE-->



		
		
		</div>

		


		

<!--///////////////////////////////////////////////////Termina cuerpo del documento interno////////////////////////////////////////////-->
</div>

	</div>
</div>
<!-- Footer
      ================================================== -->
<hr class="soften"/>
<footer class="footer">

<hr class="soften"/>
<p>&copy; Copyright Joseph Godoy, Gerardo Gutierrez y Luis Granda <br/><br/></p>
 </footer>
</div><!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	</style>
  </body>
</html>


