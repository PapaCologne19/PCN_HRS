<?php

include ("connect.php");


    $resultrg =mysql_query("SELECT * FROM book1 where id ='".$_POST['city_code']."'");
          while($rowrg=mysql_fetch_array($resultrg))
         {

         $array[] = array("city_name" => $rowrg['3']);
         //echo '<option  value="'.$rowrg[2].'">'.$rowrg[2].' </option> ';
         
         }
         
         echo json_encode($array);

?>


