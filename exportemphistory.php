
<?php  
//export.php  

include("connect.php");
    session_start();

date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y'); 

 $dtnow=date("m/d/Y");

$empno2=$_SESSION["empno1"];

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

$resultx = mysqli_query($link, "SELECT * FROM deployment_history where appno_d='$empno2' order by emp_startdate_d DESC");
while($rowx=mysqli_fetch_row($resultx))
{  

  $resulteml = mysqli_query($link, "SELECT * FROM employees where appno=$rowx[5]");
              while($roweml=mysqli_fetch_row($resulteml))
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

  $fname="HRdeployed_database_".$rowx[6]."_".$dtnow.".xls";
  header("Content-Disposition: attachment; filename=$fname");
  echo $output;


?>
