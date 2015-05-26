<!DOCTYPE html>

<?php
include("include/site_config.php");

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
		<h2> Agregar NAV - ASIDE</h2>	
		<form method="post" action="" >
		  <fieldset>
		    <legend  style="font-size: 18pt"><b>Ingrese el nuevo contenido de la pagina</b></legend>
		    <div class="form-group">
		      <label style="font-size: 14pt"><b>Nombre</b></label>
		      <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre" />
		    </div>
		    <div class="form-group">
		      <label style="font-size: 14pt"><b>Descripcion</b></label>
		      <textarea name="des" class="form-control" placeholder="Descripción"></textarea>
		    </div>
		    <div class="form-group">
		      <label style="font-size: 14pt"><b>Posicion</b></label>
		      <input type="text" name="pos" class="form-control" placeholder="Ingrese la posicion" />
		    </div>
		    <div class="form-group">
		      <label style="font-size: 14pt"><b>Estado</b></label>
		      <input type="text" name="estado" class="form-control" placeholder="estado" />
		      
		      
		    </div>

		    <input  class="btn btn-success" type="submit" name="submit" value="Registrar"/>

		  </fieldset>
		</form>

		<?php
			if(isset($_POST['submit'])){
				require("registroap_nav_aside.php");
			}
		?>

		


		

<!--///////////////////////////////////////////////////Termina cuerpo del documento interno////////////////////////////////////////////-->
</div>

	</div>
</div>
<!-- Footer
      ================================================== -->
<hr class="soften">
<footer class="footer">

<hr class="soften"/>
<p>&copy; <?php echo $site_autor;?> <br/><br/></p>
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