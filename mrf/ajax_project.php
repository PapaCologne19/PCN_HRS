<?php

include ("connect.php");


    $resultrg =mysql_query("SELECT * FROM projects where is_deleted!='1' and client_company_id ='".$_POST['city_code']."' order by project_title asc");
          while($rowrg=mysql_fetch_array($resultrg))
         {

         $array[] = array("city_name" => $rowrg['1']);
         //echo '<option  value="'.$rowrg[2].'">'.$rowrg[2].' </option> ';
         
         }
         
         echo json_encode($array);

?>