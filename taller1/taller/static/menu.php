<div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $project_name;?>
            <small> | <?php echo $project_slogan;?></small>
          </a>
        </div>
<div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">   
            <?php
              $query = "select * from enlaces where id_enlaces=JERARQUIA";
              $result = mysql_query($query) or die("error". mysql_error());

              while ($row = mysql_fetch_array($result)) {
                  echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>".$row['NOMBRE']."</a>";  
                  //primer lvl
                  $query = "select * from enlaces where jerarquia='".$row['ID_ENLACES']."' and jerarquia !=ID_ENLACES";
                  $result2 = mysql_query($query) or die("error". mysql_error());
                  if (mysql_num_rows($result2)>0) {
                    echo "<ul class='dropdown-menu' role='menu'>";
                    while ($row2 = mysql_fetch_array($result2)) {

                        $query = "select * from enlaces where jerarquia='".$row2['ID_ENLACES']."' and jerarquia !=ID_ENLACES and jerarquia2=3";
                        $result3 = mysql_query($query) or die("error". mysql_error());
                        if (mysql_num_rows($result3)>0) {
                          echo "<li class='dropdown-submenu'><a href='http://127.0.0.1/ing_web_2015/web_app_05_05_2015/admin.php' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>".$row2['NOMBRE']."</a>";
                          
                          echo "<ul class='dropdown-menu' role='menu'>";
                          while ($row3 = mysql_fetch_array($result3)) {
                            //tercer lvl
                              echo "<li><a href=''>".$row3['NOMBRE']."</a></li>";
                            }
                          echo "</ul>";
                        }else{
                          //segundo lvl
                        echo "<li><a href='#'>".$row2['NOMBRE']."</a></li>";
                      }
                      }
                    echo "</ul>";
                  }
                 echo "</li>"; 
               
              }

              
            ?>
          </ul>
        </div><!--/.nav-collapse -->