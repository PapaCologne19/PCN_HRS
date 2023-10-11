
<?php  
//export.php  

include("connect.php");
    session_start();

date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y'); 

 $dtnow=date("m/d/Y");



$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM employees";
 $result = mysql_query( $query);
 if(mysql_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    
<tr>  Recruitment Database</tr>
<tr>as of : '.$dtnow.' </tr>   
                         <tr>
            <th> Applicant No </th>
            <th> Lastname </th>
            <th> Firstname </th>
            <th> Middlename </th>
            <th> SSS </th>
            <th> Pag-ibig </th>
            <th> Philhealth </th>
            <th> TIN </th>
            <th> Police </th>
            <th> Brgy </th>
            <th> NBI </th>
            <th> PSA </th>
            <th> Birthday </th>
            <th> Address </th>
                      <th> Status </th>
             </tr>   
  ';
  while($row = mysql_fetch_array($result))
  {
   $output .= '
   
 <tr> 
  <td>  '.$row[4].'   </td> 
  <td>  '.$row[6].'   </td> 
  <td> '.$row[7].'   </td>        
  <td> '.$row[8].'   </td>        
  <td> '.$row[24].'   </td>        
  <td> '.$row[25].'   </td>        
  <td> '.$row[26].'   </td>        
  <td> '.$row[27].'   </td>        
  <td> '.$row[28].'   </td>        
  <td> '.$row[29].'   </td>        
  <td> '.$row[30].'   </td>        
  <td> '.$row[31].'   </td>       
   <td> '.$row[14].'   </td>     
    <td> '.$row[10].'   </td>   


                          <td>'.$row["actionpoint"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');

  $fname="HRdatabase_".$dtnow.".xls";
  header("Content-Disposition: attachment; filename=$fname");
  echo $output;
 }
}
?>
