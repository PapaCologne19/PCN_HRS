<?php

include ("connect.php");


    $resultrg =mysqli_query($link, "SELECT * FROM deployment where is_deleted !='1' and appno_d ='".$_POST['city_code']."'  ");
          while($rowrg=mysqli_fetch_array($resultrg))
         {

         $array[] = array("city_name" => "Start Date:".$rowrg['8']."  //  "."End Date:".$rowrg['9']);

         //echo '<option  value="'.$rowrg[2].'">'.$rowrg[2].' </option> ';
         
         }
         
         echo json_encode($array);


?>