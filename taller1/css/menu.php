<div id='cssmenu'>
  <?php
    menu_cabeza(0, 1);
    function menu_cabeza($padre, $level) {
      $query = "select a.id_menu, a.titulo, a.ruta, Deriv1.Count 
                FROM menus a LEFT OUTER JOIN (
                SELECT id_padre, COUNT(*) AS Count FROM menus GROUP BY id_padre) 
                Deriv1 ON a.id_menu = Deriv1.id_padre WHERE a.posicion = 'cabeza' 
                and  a.id_padre=".$padre." ORDER BY a.jerarquia ASC";
      $result = mysql_query($query) or die("error". mysql_error());
      echo "<ul>";
      while ($row = mysql_fetch_assoc($result)) {
        if ($row['Count'] > 0) {
          echo "<li class='active has-sub'><a href='" . $row['ruta'] . "'>" . $row['titulo'] . "</a>";
          menu_cabeza($row['id_menu'], $level + 1);
          echo "</li>";
        } elseif ($row['Count']==0) {
          echo "<li><a href='" . $row['ruta'] . "'>" . $row['titulo'] . "</a></li>";
        } else;
      }
      echo "</ul>";
    }
  ?>
</div>