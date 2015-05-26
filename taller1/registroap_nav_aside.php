<?php

include("include/site_config.php");
include("include/clase_mysql.php");
$miconexion = new clase_mysql;
$miconexion->conectar($db_name,$db_host, $db_user,$db_password);

	$nom=$_POST['nombre'];
	$des=$_POST['des'];
	$pos=$_POST['pos'];
	$estado=$_POST['estado'];


				$sql1="INSERT INTO bloques VALUES('','$nom','$des','$pos','$estado')";
				
				if(!$miconexion->consulta($sql1)){
					echo ' <script language="javascript">alert("No se a podido ingresar los datos");</script> ';
				}else{
					echo ' <script language="javascript">alert("Contenido publicado con éxito");</script> ';
					echo "<script>location.href='navaside.php'</script>";

				}
				
				

?>

