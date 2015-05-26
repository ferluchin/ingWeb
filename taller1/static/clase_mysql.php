<?php

class clase_mysql{

	//variables para la conexion
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;
	/*Identificadores de conexion y consulta*/
	var $Conexion_ID = 0;
	var $consulta_ID = 0;
	/*Numero de error y error de texto*/
	var $Errno = 0;
	var $Error = "";
	function clase_mysql(){
		//Constructor//		

	}
	function conectar($db, $host, $user, $pass){
		//Conexion//
		if ($db!="") $this ->BaseDatos = $db;
		if ($host!="") $this ->Servidor = $host;
		if ($user !="") $this ->Usuario = $user;
		if ($pass !="") $this ->Clave = $pass;

		//Conectamos al servidor de la base de datos//
		$this->Conexion_ID=mysql_connect($this->Servidor, $this->Usuario, $this->Clave); 
		if (!$this->Conexion_ID) {
			$this ->Error="La conexion con el servidor fallida";
			return 0;
		}

		//Seleccion de la base de datos//
		if (mysql_select_db($this->BaseDatos, $this->Conexion_ID)) {
			$this->Error="Imposible abrir".$this->BaseDatos;
			return 0;
		}
		/*Si todo tiene exito, retorno el identificador de la conexion*/
		return $this->Conexion_ID;

	}
	//Ejecuta cualquier consulta 
	function consulta($sql=""){
		if ($sql=="") {
			$this -> Error="No hay ningun SQL";
			return 0;
		}
		//ejecutamos la consulta
		$this ->consulta_ID = mysql_query($sql, $this->Conexion_ID);
		if (!$this->Conexion_ID) {
			$this->Errno= mysql_errno();
			$this->Error= mysql_error();
		}
		//retorna la consulta ejecutada
		return $this->consulta_ID;
	}

	//Devuleve el numero de campos de la consulta 
	function numcampos(){

		return mysql_num_fields($this->consulta_ID);
	}
	//Devuelve el numero de registros de la consulta
	function numregistros(){

		return mysql_num_rows($this->consulta_ID);
	}
	//Devuelve el nombre de un campo de la consulta
	function nombrecampo($numcampo){
		return mysql_field_name($this->consulta_ID, $numcampo);
	}
	//Muestra los resultados  de la consulta 
	function verconsulta($panel){
		echo "<li></li>";
		echo "<table class='table table-striped'>";
		echo "<thead>";
		echo "<tr>";
		//mostrar los nombres de los campos
		for ($i=1; $i < $this->numcampos() ; $i++) { 
			echo "<th>".$this->nombrecampo($i)."</th>";
		}
			echo "<th><b>Borrar</b></th>";
			//echo "<th><b>Editar</b></th>";
			
			
		echo "</tr>";
		echo "<thead>";
		while ($row = mysql_fetch_array($this->consulta_ID)) {
			echo "<tbody>";
			echo "<tr>";
			for ($i=1; $i < $this->numcampos() ; $i++) { 
				echo "<td>".utf8_encode($row[$i])."</td>";
			}
				switch ($panel) {
					case 1:
						echo "<td><button type='button'class='btn btn-danger'><a href='panel.php?id=$row[0]&act=1&pid=1'>Borrar</a></button></td>";
						//echo "<td><button type='button'class='btn btn-success'><a href='panel.php?id=$row[0]&act=2&pid=1'>Editar</a></button></td>";
						break;
					case 2:
						echo "<td><button type='button'class='btn btn-danger'><a href='panel.php?id=$row[0]&act=1&pid=2'>Borrar</a></button></td>";
						//echo "<td><button type='button'class='btn btn-success'><a href='panel.php?id=$row[0]&act=2&pid=2'>Editar</a></button></td>";
						break;
					case 3:
						echo "<td><button type='button'class='btn btn-danger'><a href='panel.php?id=$row[0]&act=1&pid=3'>Borrar</a></button></td>";
						//echo "<td><button type='button'class='btn btn-success'><a href='panel.php?id=$row[0]&act=2&pid=3'>Editar</a></button></td>";
						break;
					case 4:
						echo "<td><button type='button'class='btn btn-danger'><a href='panel.php?id=$row[0]&act=1&pid=4'>Borrar</a></button></td>";
						//echo "<td><button type='button'class='btn btn-success'><a href='panel.php?id=$row[0]&act=2&pid=4'>Editar</a></button></td>";
						break;
					case 5:
						echo "<td><button type='button'class='btn btn-danger'><a href='panel.php?id=$row[0]&act=1&pid=5'>Borrar</a></button></td>";
						//echo "<td><button type='button'class='btn btn-success'><a href='panel.php?id=$row[0]&act=2&pid=5'>Editar</a></button></td>";
						break;
					case 6:

						echo "<td><button type='button'class='btn btn-danger'><a href='panel.php?id=$row[0]&act=1&pid=6'>Borrar</a></button></td>";
						//echo "<td><button type='button'class='btn btn-success'><a href='panel.php?id=$row[0]&act=2&pid=6'>Editar</a></button></td>";
						break;
					
					default:
						break;
				}
			echo "</tr>";
			echo "<tbody>";
		}
		echo "</table>";
	}

	function verconsulta2($panel){
		echo "<li></li>";
		echo "<table class='table table-striped'>";
		echo "<thead>";
		echo "<tr>";
		//mostrar los nombres de los campos
		for ($i=1; $i < $this->numcampos() ; $i++) { 
			echo "<th>".$this->nombrecampo($i)."</th>";
		}
			echo "<th><b>Borrar</b></th>";
			//echo "<th><b>Editar</b></th>";
		$rs = mysql_query("SELECT MAX(id_tabla) AS id FROM tabla");
		if ($row = mysql_fetch_row($rs)) {
		$id = trim($row[0]);
		}	
			
		echo "</tr>";
		echo "<thead>";
		while ($row = mysql_fetch_array($this->consulta_ID)) {
			echo "<tbody>";
			echo "<tr>";
			for ($i=1; $i < $this->numcampos() ; $i++) { 
				echo "<td>".utf8_encode($row[$i])."</td>";
				if($row[$i]=)
			}
						echo "<td><button type='button'class='btn btn-danger'><a href='panel.php?id=$row[0]&act=1&pid=1'>Borrar</a></button></td>";
						//echo "<td><button type='button'class='btn btn-success'><a href='panel.php?id=$row[0]&act=2&pid=1'>Editar</a></button></td>";
						
				}
			echo "</tr>";
			echo "<tbody>";
		}
		echo "</table>";
	}



	function consulta_lista(){

		while ($row = mysql_fetch_array($this->consulta_ID)) {
			for ($i=1; $i < $this->numcampos(); $i++) { 
				$row[$i];
			}
			return $row;
		}
	}

	function formconsulta($panel){

 		echo "<form action='panel.php?act=3&&pid=".$panel."' method='post' class='form-signin'>";
 		echo "<center><h2 class='form-signin-heading'>Nuevo Registro</h2></center>";
 		for ($i=1; $i < $this->numcampos(); $i++) { 
 			echo $this->nombrecampo($i).": <input name='".$this->nombrecampo($i)."'class='form-control'  placeholder='".$this->nombrecampo($i)."'  required autofocus><br>";
 		}
		echo "<input type='hidden' name='bandera' value='3' >";
		echo "<input class='btn btn-lg btn-primary btn-block' type='submit' value='Guardar'>";
 		echo "</form>";
 	}
 	/*
 	function formedicion($editar,$id){
 		switch ($editar) {
 			case 1:
 				echo "<form action='panel.php?pid=1&act=2' method='post'>";
 				echo "<center><h2 class='form-signin-heading'>Actualizar Registro</h2></center>";
 				$this->consulta("select * from bloques where id='".$id."'");
 				break;
 			case 2:
 				echo "<form action='panel.php?pid=2&act=2' method='post'>";
 				echo "<center><h2 class='form-signin-heading'>Actualizar Registro</h2></center>";
 				$this->consulta("select * from configuracion where id='".$id."'");
 				break;
 			case 3:
 				echo "<form action='panel.php?pid=3&act=2' method='post'>";
 				echo "<center><h2 class='form-signin-heading'>actualizar Registro</h2></center>";
 				$this->consulta("select * from contenidos where id='".$id."'");
 				break;

 			case 4:
 				echo "<form action='panel.php?pid=4&act=2' method='post'>";
 				echo "<center><h2 class='form-signin-heading'>Actualizar Registro</h2></center>";
 				$this->consulta("select * from enlaces where id_enlaces='".$id."'");
 				break;
 			case 5:
 				echo "<form action='panel.php?pid=5&act=2' method='post'>";
 				echo "<center><h2 class='form-signin-heading'>Actualizar Registro</h2></center>";
 				$this->consulta("select * from menus where id_menu='".$id."'");
 				break;
 			case 6:
 				echo "<form action='panel.php?pid=6&act=2' method='post'>";
 				echo "<center><h2 class='form-signin-heading'>Actualizar Registro</h2></center>";
 				$this->consulta("select * from usuarios where id_usuario='".$id."'");
 				break;
 			
 			
 			default:
 				break;
 		} 
 		$row = mysql_fetch_array($this->consulta_ID);

 		echo "<form class='actualiza'>";
 					for ($i=1; $i < $this->numcampos(); $i++) { 
 						echo $this->nombrecampo($i).": <input name='".$this->nombrecampo($i)."'class='form-control' value='".$row[$this->nombrecampo($i)]."' placeholder='".$this->nombrecampo($i)."'><br>";

  						}
  						echo "<input type='hidden' name='id' value='".$_GET['id']."' >";
  						echo "<input type='hidden' name='bandera' value='2' >";
  						echo "<input class='btn btn-lg btn-primary btn-block' type='submit' style='width:230px; text-align: center; display: block;'; value='Actualizar'>";
 						echo "</form>";	
 		echo "</form>";
 		}*/

 		function verificar_login($user,$password,&$result)
    	{
		        $sql = "SELECT * FROM usuarios WHERE user='$user' and pass='$password'";
		        $rec = mysql_query($sql);
		        $count = 0;
		        while($row = mysql_fetch_object($rec))
		        {
		            $count++;
		            $result = $row;
		        }
		        if($count == 1)
		        {
		            return 1;
		        }
		        else
		        {
		            return 0;
		        }
    	}
    	function verconsultamenu2(){
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "".$this->nombrecampo($i)."";
 		}
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				//echo "".$row[$i]." linea229";
 				$tabla=$row[$i];
 				echo "<li><a href='tablas.php?id=$row[0]&tabla=$tabla&id=tabla&act=tabla'>$tabla</a></li>";
 			}		
 		} 		
 	}


}
?>





