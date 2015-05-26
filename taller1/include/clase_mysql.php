<<!DOCTYPE html>
<html>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<script src="../bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
<body>

</body>
</html>
<?php
 class clase_mysql{
 	/*Variables para la conexion a la db*/
 	var $BaseDatos;
 	var $Servidor;
 	var $Usuario;
 	var $Clave;
 	/*Identificadores de conexion y consulta*/
 	var $Conexion_ID = 0;
 	var $Consulta_ID = 0;
 	/*Numero de error y error de textos*/
 	var $Errno = 0;
 	var $Error = "";
 	function clase_mysql(){
 		//cosntructor
 	}

 	function conectar($db, $host, $user, $pass){
 		if($db!="") $this->BaseDatos = $db;
 		if($host!="") $this->Servidor = $host;
 		if($user!="") $this->Usuario = $user;
 		if($pass!="") $this->Clave = $pass;

 		//conectamos al servidor de db
 		$this->Conexion_ID=mysql_connect($this->Servidor,$this->Usuario, $this->Clave);
 		if(!$this->Conexion_ID){
 			$this->Error="La conexion con el servidor fallida";
 			return 0;
 		}

		//Seleccionamos la base de datos
		if(!mysql_select_db($this->BaseDatos, $this->Conexion_ID)){
			$this->Error="Imposible abrir ".$this->BaseDatos;
 			return 0;
		} 	
		/*Si todo tiene exito, retorno el identificador de la conexion*/
 		return $this->Conexion_ID;
 	}	

 	//Ejecuta cualquier consulta
 	function consulta($sql=""){
 		if($sql==""){
 			$this->Error="NO hay ningun sql";
 			return 0;
 		}
 		//ejecutamos la consulta
 		$this->Consulta_ID = mysql_query($sql, $this->Conexion_ID);
 		if(!$this->Consulta_ID){
 			$this->Errno = mysql_errno();
 			$this->Error = mysql_error();
 		}
 		//retorna la consulta ejecutada
 		return $this->Consulta_ID;
 	}

 	//Devulve el numero de campos de la culsulta
 	function numcampos(){
 		return mysql_num_fields($this->Consulta_ID);
 	}

 	//Devuleve el numero de registros de la culsulta
 	function numregistros(){
 		return mysql_num_rows($this->Consulta_ID);
 	}

 	//Devuelve el nombre de un campo de la consulta
 	function nombrecampo($numcampo){
 		return mysql_field_name($this->Consulta_ID, $numcampo);
 	}

 	//Muestra los resultados de la consulta
 	function verconsulta(){
 		echo "<div class='table-responsive'>";
 		echo "<table border='1'; class='table table-hover';>";
 		echo "<tr class='warning'>";
 		//mostrar los nombres de los campos
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "<td>".$this->nombrecampo($i)."</td>";
 		}
 			echo "<td>Borrar</td>";
 			echo "<td>Editar</td>";	
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr class='success'>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 			echo "<td><a href='admin.php?id=$row[0]&act=1'><img src='images/eliminar.png' class='img-rounded'></a></td>";
 			echo "<td><a href='actualizar.php?id=$row[0]&act=2'><img src='images/actualizar.gif' class='img-rounded'></a></td>";
 				
 				
 			echo "</tr>";
 		}
 		echo "</table>";
 		echo "</div>";
 	}

 	function verconsulta2(){
 		echo "<div class='table-responsive'>";
 		echo "<table border='1'; class='table table-hover';>";
 		echo "<tr class='warning'>";
 		//mostrar los nombres de los campos
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "<td>".$this->nombrecampo($i)."</td>";
 		}
 			echo "<td>Borrar</td>";
 			echo "<td>Editar</td>";	
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr class='success'>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 			echo "<td><a href='navaside.php?id=$row[0]&act=1'><img src='images/eliminar.png' class='img-rounded'></a></td>";
 			echo "<td><a href='actualizar_nav_aside.php?id=$row[0]&act=2'><img src='images/actualizar.gif' class='img-rounded'></a></td>";
 				
 				
 			echo "</tr>";
 		}
 		echo "</table>";
 		echo "</div>";
 	}


 	function comentario(){
 		echo "<div class='table-responsive'>";
 		echo "<table  class='table'>";
 		echo "<tr class='warning'>";
 		//mostrar los nombres de los campos
 		for ($i=1; $i < $this->numcampos(); $i++) {

 			echo "<td>".$this->nombrecampo($i)."</td>";
			
 		}
 			
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr>";
 			for ($i=1; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";

 			} 				
 			echo "</tr>";
 		}
 		echo "</table>";
 		echo "</div>";
 	}

function comentarioadmin(){
 		echo "<div class='table-responsive'>";
 		echo "<table border='1'; class='table table-hover';>";
 		echo "<tr class='warning'>";
 		//mostrar los nombres de los campos
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "<td>".$this->nombrecampo($i)."</td>";
 		}
 			echo "<td>Borrar</td>";	
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr class='success'>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 			echo "<td><a href='admin_comentarios.php?id=$row[0]&act=1'><img src='images/eliminar.png' class='img-rounded'></a></td>";
 			
 				
 				
 			echo "</tr>";
 		}
 		echo "</table>";
 		echo "</div>";
 	}

 	function menus(){
 		echo "<div class='table-responsive'>";
 		echo "<table border='1'; class='table table-hover';>";
 		echo "<tr class='warning'>";
 		//mostrar los nombres de los campos
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "<td>".$this->nombrecampo($i)."</td>";
 		}
 			echo "<td>Borrar</td>";
 			echo "<td>Editar</td>";	
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr class='success'>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 			echo "<td><a href='admin_menus.php?id=$row[0]&act=1'><img src='images/eliminar.png' class='img-rounded'></a></td>";
 			echo "<td><a href='actualizar_menus.php?id=$row[0]&act=2'><img src='images/actualizar.gif' class='img-rounded'></a></td>";
 				
 				
 			echo "</tr>";
 		}
 		echo "</table>";
 		echo "</div>";
 	}



 	function consulta_lista(){
		while ($row = mysql_fetch_array($this->Consulta_ID)) {
			for ($i=0; $i < $this->numcampos(); $i++) { 
				$row[$i];
			}
			return $row;
		}
	}
///https://gist.github.com/rlramirez/
 }
?>