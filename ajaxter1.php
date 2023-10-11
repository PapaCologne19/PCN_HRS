<?php

include ("connect.php");


    $resultrg =mysql_query("SELECT * FROM deployment where is_deleted !='1' and appno_d ='".$_POST['city_code']."' ");
          while($rowrg=mysql_fetch_array($resultrg))
         {

         $array1[] = array("city_name1" => "Division: ".$rowrg['10']."  //  "."Department: ".$rowrg['11']."  //  "."Project: ".$rowrg['3']." //  "."Job Title: ".$rowrg['16']);
 
         //echo '<option  value="'.$rowrg[2].'">'.$rowrg[2].' </option> ';
         
         }
         
         echo json_encode($array1);


?>