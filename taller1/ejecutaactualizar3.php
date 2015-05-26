<?php
include("include/site_config.php");
include("include/clase_mysql.php");
$miconexion = new clase_mysql;
$miconexion->conectar($db_name,$db_host, $db_user,$db_password);

	extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
	$sentencia="update menus set id_padre='$idpadre', titulo='$tit', ruta='$ruta', jerarquia='$jerarquia', posicion='$posicion', estado='$estado' where id='$id'";
	$resent=mysql_query($sentencia);
	if ($resent==null) {
		echo "Error de procesamieno no se han actuaizado los datos";
		header("location: actualizar_menus.php");

		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		
		echo "<script>location.href='navaside.php'</script>";
	}else {
		echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';
		
		echo "<script>location.href='admin_menus.php'</script>";
		
	}
?>