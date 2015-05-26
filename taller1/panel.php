<?php
include("static/site_config.php");
        include("static/clase_mysql.php");
        $act="";
        extract($_GET);
        
        $miconexion = new clase_mysql;
         $miconexion ->conectar($db_name,$db_host, $db_user, $db_password);
?>

<!DOCTYPE html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Control</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="estilos/dashboard.css" rel="stylesheet">

    <script src="bootstrap/js/ie-emulation-modes-warning.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="panel.php">Panel de Control</a>
        </div> 
      </div>

        <div></div>        

        <div id='cssmenu'>
          <ul>
          <li><a href="panel.php?pid=1">asistencia</a><a> | </a>
          <!--</li>
            <li>--><a href="panel.php?pid=2">conferencias</a><a> | </a>
            <!--</li>
            <li>--><a href="panel.php?pid=3">cursos</a><a> | </a>
            <!--</li>
            <li>--><a href="panel.php?pid=5">participantes</a><a> | </a>
            <!--</li>-->
            </ul>
            <ul class="nav pull-right"> 
              <li><a href="include/desconectar_usuario.php"> Cerrar Sesión </a></li> 
            </ul>
        </div>



    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="tabla">
         <center><h1>Administrador</h1></center>
         <br><br>

          <div class="table-responsive">
        <?php
                    //PANEL DE asistencia
                    if (@$_GET['pid']==1) {
                      echo " <h2 class='sub-header'>asistencia</h2>";
                      $miconexion ->consulta("select * from asistencia");
                      $miconexion ->verconsulta(1);
                      //Eliminar bloque
                      if (@$_GET['act']==1) {
                          $miconexion ->consulta("delete from asistencia where id='".$_GET['id']."'");  
                          $miconexion ->verconsulta(1);
                          echo "<script>alert('elminado')</script>";
                          echo "<script>location.href='panel.php?pid=1'</script>";
                      }
                      //Editar asistencia
                      if (@$_GET['act']==2) {
                          $miconexion->formedicion(1,$_GET['id']);
                          if (@$_POST['bandera']==2) {
                              $miconexion->consulta("update asistencia set nombre='".$_POST['nombre']."',descripcion='".$_POST['descripcion']."',posicion='".$_POST['posicion']."',estado='".$_POST['estado']."' where id='".$_POST['id']."'");
                              echo "<script>alert('Datos Actualizados')</script>";
                              echo "<script>location.href='panel.php?pid=1'</script>";
                            }
                      }
                    }


                    if (@$_GET['pid']==2) {
                      echo " <h2 class='sub-header'>conferencias</h2>";
                      $miconexion ->consulta("select * from conferencias");
                      $miconexion ->verconsulta(3); 
                      //Eliminar cursos
                      if (@$_GET['act']==1) {
                          $miconexion ->consulta("delete from conferencias where id='".$_GET['id']."'");  
                          $miconexion ->verconsulta(3);
                          echo "<script>alert('elminado')</script>";
                          echo "<script>location.href='panel.php?pid=3'</script>";
                      }
                      
                    }


                    //PANEL DE cursos
                    if (@$_GET['pid']==3) {
                      echo " <h2 class='sub-header'>cursos</h2>";
                      $miconexion ->consulta("select * from cursos");
                      $miconexion ->verconsulta(3); 
                      //Eliminar cursos
                      if (@$_GET['act']==1) {
                          $miconexion ->consulta("delete from cursos where id='".$_GET['id']."'");  
                          $miconexion ->verconsulta(3);
                          echo "<script>alert('elminado')</script>";
                          echo "<script>location.href='panel.php?pid=3'</script>";
                      }
                      //Editar cursos
                      if (@$_GET['act']==2) {
                          $miconexion->formedicion(3,$_GET['id']);
                          if (@$_POST['bandera']==2) {
                              $miconexion->consulta("update cursos set titulo='".$_POST['TITULO']."',fecha_p='".$_POST['FECHA_P']."',estado='".$_POST['ESTADO']."',descripcion='".$_POST['DESCRIPCION']."' where id='".$_POST['id']."'");
                              echo "<script>alert('Datos Actualizados')</script>";
                              echo "<script>location.href='panel.php?pid=3'</script>";
                            }
                      }
                      
                    }
                    //PANEL DE participantes
                    if (@$_GET['pid']==5) {
                      echo " <h2 class='sub-header'>participantes</h2>";
                      $miconexion ->consulta("select * from participantes");
                      $miconexion ->verconsulta(5);
                      //Eliminar participantes
                      if (@$_GET['act']==1) {
                          $miconexion ->consulta("delete from participantes where id_menu='".$_GET['id']."'");  
                          $miconexion ->verconsulta(5);
                          echo "<script>alert('elminado')</script>";
                          echo "<script>location.href='panel.php?pid=5'</script>";
                      }
                      //Editar participantes                      
                      if (@$_GET['act']==2) {
                          $miconexion->formedicion(5,$_GET['id']);
                          if (@$_POST['bandera']==2) {
                              $miconexion->consulta("update participantes set titulo='".$_POST['TITULO']."',estado='".$_POST['ESTADO']."',posicion='".$_POST['POSICION']."' where id_menu='".$_POST['id']."'");
                              echo "<script>alert('Datos Actualizados')</script>";
                              echo "<script>location.href='panel.php?pid=5'</script>";
                            }
                      }
                    }
                  
        ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="bootstrap/js/vendor/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
