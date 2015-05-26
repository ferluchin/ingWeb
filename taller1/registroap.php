<?php

include("include/site_config.php");
include("include/clase_mysql.php");
$miconexion = new clase_mysql;
$miconexion->conectar($db_name,$db_host, $db_user,$db_password);

	$tit=$_POST['titulo'];
	$fecha=$_POST['fecha'];
	$estado=$_POST['estado'];
	$desc=$_POST['desc'];


				$sql1="INSERT INTO contenidos VALUES('','$tit','$fecha','$estado','$desc')";
				
				if(!$miconexion->consulta($sql1)){
					echo ' <script language="javascript">alert("No se a podido ingresar los datos");</script> ';
				}else{
					echo ' <script language="javascript">alert("Contenido publicado con éxito");</script> ';

				}
				
				

?>

