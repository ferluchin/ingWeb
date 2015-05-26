<?php
include("static/site_config.php");
        include("static/clase_mysql.php");
        $act="";
        extract($_GET);
        
        $miconexion = new clase_mysql;
         $miconexion ->conectar($db_name,$db_host, $db_user, $db_password);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FACTURA DIGITAL</title>
</head>
<body>

 <?php
                      $miconexion ->consulta("select * from asistencia");
                      $miconexion ->verconsulta2(1);
                    ?>

	
</body>
</html>