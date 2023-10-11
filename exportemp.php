
<?php  
//export.php  

include("connect.php");
    session_start();

date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y'); 

 $dtnow=date("m/d/Y");



$output = '';

  $output .= '
   <table class="table" bordered="1">  
                    
<tr>  Deployment Database</tr>
<tr>as of : '.$dtnow.' </tr>  
                         <tr>

    <th> Client</th>
            <th> Project </th>
            <th> Emp No.</th>
            <th> Name </th>
            <th> Start Date </th>
            <th> End Date </th>
        


             </tr>   
  ';

$resultx = mysql_query("SELECT * FROM deployment where is_deleted!='1' order by client_d and project_d asc");
while($rowx=mysql_fetch_row($resultx))
{  
   
             $resulteml = mysql_query("SELECT * FROM employees where appno=$rowx[5]");
              while($roweml=mysql_fetch_row($resulteml))
              {  


   $output .= '

                                               <tr> 

                        <td>  '.$rowx[1].'   </td> 
                       <td>  '.$rowx[3].'   </td> 
                         <td> '.$rowx[6].'   </td>   

           

                         <td> '.$roweml[6].", ".$roweml[7]." ".$roweml[8].'   </td> 
                      
                    
                         <td> '.$rowx[8].'   </td>      
                         <td> '.$rowx[9].'   </td> 
                                     

   


                    </tr>
   ';
  }}
  $output .= '</table>';
  header('Content-Type: application/xls');

  $fname="HRdeployed_database_".$dtnow.".xls";
  header("Content-Disposition: attachment; filename=$fname");
  echo $output;


?>
