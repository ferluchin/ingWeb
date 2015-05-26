<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="estilos/estilos.css">
	<title>Ingenieria web 2015</title>
</head>
<body background="http://allfons.ru/pic/201112/1366x768/allfons.ru-3624.jpg" style="background-attachment: fixed;" >
	<center><div class="tit"><h2 style="font-size: 25pt;color: #000000; ">Inicio de sesión</h2></div>
		<center><div class="Ingreso">

	<table border="0" align="center" valign="middle">
		<tr>
		<td rowspan=2>
		<form action="validar.php" method="post">

			<table border="0">

			<tr><td><label style="font-size: 14pt; color: #000000;"><b>Usuario: </b></label></td>
				<td width=80> <input class="form-group has-success" style="border-radius:15px;" type="text" name="user"></td></tr>
			<tr><td><label style="font-size: 14pt; font-color: #00s21u;color: #000000; "><b>Contraseña: </b></label></td>
				<td witdh=80><input style="border-radius:15px;" type="password" name="pass"></td></tr>
			<tr><td></td>
				<td width=80 align=center><input class="btn btn-primary" type="submit" value="Aceptar"></td>
				</tr></tr>

	</table>
		
		</form>
<br>
<!-- formulario registro -->

<form method="post" action="" >
  <fieldset>
    <legend  style="color:#000000; font-size: 18pt; "><b>Registro</b></legend>
    <div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>Ingresa tu nombre</b></label>
      <input type="text" name="nombre" class="form-control" placeholder="Ingresa tu nombre" />
    </div>
    
    <div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>Ingresa tu apellido</b></label>
      <input type="text" name="apellido" class="form-control" placeholder="Ingresa tu apellido" />
    </div>
	<div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>Ingresa tu direccion</b></label>
      <input type="text" name="direccion" class="form-control" placeholder="Ingresa tu direccion" />
    </div>
	<div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>Ingresa tu correo</b></label>
      <input type="text" name="correo" class="form-control" placeholder="Ingresa tu correo" />
    </div>
	
	<div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>Ingresa tu cedula</b></label>
      <input type="text" name="cedula" class="form-control" placeholder="Ingresa tu cedula" />
    </div>

    <div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>Selecciona tu institucíon</b></label>
		<select name="institucion">
    	  <option value="UTPL">UNIVERSIDAD TECNICA PARTICULAR DE LOJA</option>
  		  <option value="UNL">UNIVERSIDAD NACIONAL DE LOJA</option>
  		  <option value="EPL">ESCUELA POLITECNICA DEL LITORAL</option>

          <option value="-">OTRA</option>
		</select>

		<!-- <input type="text" name="institucion"> -->
    </div>

    <div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>Selecciona el tipo de inscripcion </b></label>
		<select name="tipo_inscripcion">
    	  <option value="ESTUDIANTE">Estudiante (60)</option>
  		  <option value="EXPOSITOR">Expositor (50)</option>
  		  <option value="ORGANIZADOR">Organizador</option>

          
		</select>
		
    </div>

    <div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>Selecciona el tipo de curso </b></label>
		<select name="curso">
    	  <option value="INNOVACION">Innovación (120)</option>
  		  <option value="DESARROLLO">Desarrollo (50)</option>
  		  <option value="EPL">Emprendimiento (125)</option>
		</select>
		
    </div>


     <div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>Selecciona la hora y el lugar </b></label>
		<select name="horaylugar">
    	  <option value="A1">- Conferencia 1 | Auditorio 1  de 8H00 a 10H00</option>
  		  <option value="A2">	- Conferencia 2	| Auditorio 1  de 11H00 a 13H00</option>
  		  <option value="A3">	- Conferencia 3 | Auditorio 2  de 8H00 a 10H00</option>
		</select>
		
	



    </div>

	
<!--     <div class="form-group">
      <label style="font-size: 14pt;color: #000000; "><b>Ingresa tu email</b></label>
      <input type="text" name="nick" class="form-control"  required placeholder="Ingresa mail"/>
    </div>
    <div class="form-group">
      <label style="font-size: 14pt;color: #000000; "><b>Ingresa tu Password</b></label>
      <input type="password" name="pass" class="form-control"  placeholder="Ingresa contraseña" />
    </div>
    <div class="form-group">
      <label style="font-size: 14pt;color: #000000; "><b>Repite tu contraseña</b></label>
      <input type="password" name="rpass" class="form-control" required placeholder="repite contraseña" />
    </div> -->
     
    </div>
   
    <input  class="btn btn-green" type="submit" name="submit" value="Registrarse"/>

  </fieldset>
</form>
</div>
<?php
		if(isset($_POST['submit'])){
			require("registro.php");

		}
	?>
<!--Fin formulario registro -->

		</td>
		</tr>
		</table>
		</div></center></div></center>

	
</body>
</html>