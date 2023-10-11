<?php

include ("connect.php");


    $resultrg1 =mysql_query("SELECT * FROM client_company where company_name ='".$_POST['city_code1']."' ");
          while($rowrg1=mysql_fetch_array($resultrg1))
         {

         $array[] = array("city_name1" => $rowrg1['5']);
         //echo '<option  value="'.$rowrg[2].'">'.$rowrg[2].' </option> ';
         
         }
         
         echo json_encode($array);

?>