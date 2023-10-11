<?php



    $resultrg =mysql_query("SELECT * FROM city where regDesc ="$_POST['brand']);
          while($rowrg=mysql_fetch_array($resultrg))
         {
         echo '<option  value="'.$rowrg[2].'">'.$rowrg[2].' </option> ';
         }

?>