<?php
include '../connect.php';
    $resultrg =mysqli_query($link, "SELECT * FROM city where regDesc =" . $_POST['brand']);
          while($rowrg=mysqli_fetch_array($resultrg))
         {
         echo '<option  value="'.$rowrg[2].'">'.$rowrg[2].' </option> ';
         }
?>