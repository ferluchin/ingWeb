<?php

	/*$realname=$_POST['realname'];
	$mail=$_POST['nick'];
	$pass= $_POST['pass'];
	$rpass=$_POST['rpass'];*/

	
	$cedula=$_POST['cedula'];
	$nombre=$_POST['nombre'];
	$apellido= $_POST['apellido'];
	$direccion= $_POST['direccion'];
	$correo= $_POST['correo'];
	$institucion= $_POST['institucion'];

	$tipo_inscripcion= $_POST['tipo_inscripcion'];
	$curso= $_POST['curso'];
	$hl= $_POST['horaylugar'];


	$costo_tipo_inscripcion=0;

	$costo_tipo_curso=0;

	$subtotal=0;

		$conferencia=0;

	$idasis=0;
/*	
	

	tipo de tipo_inscripcion

	estudiante 60
	expositor 50
	organizador 0



	tipo cursos

	innovacion 120
	desarrollo 50
	emprendimiento 125
	*/

	if ($curso=="INNOVACION") {
		$costo_tipo_curso= 120;
		$cursoid=1;
	} elseif ($curso=="DESARROLLO") {
		$costo_tipo_curso= 110;
		$cursoid=2;

	} else {
		$costo_tipo_curso= 125;
		$cursoid=3;

	}


	if ($tipo_inscripcion=="ESTUDIANTE") {
			$costo_tipo_inscripcion= 60;
		} elseif ($curso=="EXPOSITOR") {
			$costo_tipo_inscripcion= 50;
		} else {
			$costo_tipo_inscripcion= 0;
		}



	if ($hl=="A1") {
			$idasis= 1;
		} elseif ($hl=="A2") {
			$idasis= 2;
		} else {
			$idasis= 3;
		}

		if ($institucion=="UTPL") {
			$subtotal = (($costo_tipo_curso + $costo_tipo_inscripcion) /(1.10));
		}else {
		$subtotal = ($costo_tipo_curso + $costo_tipo_inscripcion);
		}

	$costo= ($subtotal);



		require("connect_db.php");

	



				mysql_query("INSERT INTO participantes VALUES('$cedula','$nombre','$apellido','$direccion','$correo','$institucion','$tipo_inscripcion')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				//mysql_close($link);

			



				/*
				ida
				idparticipante
				idconferencia
				idcurso
				costo
				*/





				mysql_query("INSERT INTO asistencia VALUES('','$cedula','$idasis','$cursoid','$costo')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Factura generada con éxito");</script> ';


				header('Location: factura.php');


				mysql_close($link);



	
				
				
	/*$checkemail=mysql_query("SELECT * FROM participantes WHERE email='$mail' or user='$realname'");
	$check_mail=mysql_num_rows($checkemail);
		if($pass==$rpass){
			if($check_mail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe un Usuario registrado con estos datos, verifique nuevamente la informacion ingresada");</script> ';
			}else{
				
				//require("connect_db.php");
				mysql_query("INSERT INTO participantes VALUES('$cedula','$nombre','$apellido','$direccion','$correo','$institucion','$tipo_inscripcion')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				mysql_close($link);
			}
			
		}else{
			echo ' <script language="javascript">alert("Contraseñas incorrectas");</script> ';

		}
*/
		





/*		$realname=$_POST['realname'];
	$mail=$_POST['nick'];
	$pass= $_POST['pass'];
	$rpass=$_POST['rpass'];


	require("connect_db.php");
	$checkemail=mysql_query("SELECT * FROM web WHERE email='$mail' or user='$realname'");
	$check_mail=mysql_num_rows($checkemail);
		if($pass==$rpass){
			if($check_mail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe un Usuario registrado con este nombre de usuario o correo, verifique sus datos");</script> ';
			}else{
				
				//require("connect_db.php");
				mysql_query("INSERT INTO web VALUES('','$realname','$pass','$mail','')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				mysql_close($link);
			}
			
		}else{
			echo ' <script language="javascript">alert("Contraseñas incorrectas");</script> ';

		}*/

	
?>