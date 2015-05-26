<?php

			
session_start();

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
  header("location:index.php"); 
}

$id_usuario= $_SESSION['id'];

include("include/site_config.php");
include("include/clase_mysql.php");
$miconexion = new clase_mysql;
$miconexion->conectar($db_name,$db_host, $db_user,$db_password);

	$com=$_POST['comen'];
	$fecha=date("Y-m-d");
	$autor=$_SESSION['user'];

				$sql1="INSERT INTO comentarios VALUES('','$autor','$com','$fecha')";
				
				if(!$miconexion->consulta($sql1)){
					echo ' <script language="javascript">alert("No se a podido ingresar los datos");</script> ';
				}else{
					echo ' <script language="javascript">alert("Contenido publicado con éxito");</script> ';
					echo "<script>location.href='index2.php'</script>";

				}
				
	
?>	
	
?>