
<?php
include("connect.php");
session_start();

date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');

$dtnow = date("m/d/Y");
$output = '';

$id = mysqli_real_escape_string($link, $_GET['id']);
$query = "SELECT * FROM employees WHERE id = '$id'";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '
   <table class="table" bordered="1">  
                    
<tr>  Recruitment Database</tr>
<tr>as of : ' . $dtnow . ' </tr>   
                         <tr>
            <th> Applicant No </th>
            <th> Lastname </th>
            <th> Firstname </th>
            <th> Middlename </th>
            <th> Extension Name </th>
            <th> Contact Number </th>
            <th> Gender</th>
            <th> Civil Status</th>
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
    while ($row = mysqli_fetch_assoc($result)) {
        $police = $row['policed'];
        $barangay = $row['brgyd'];
        $nbi = $row['nbid'];
        $birthday = $row['birthday'];
        $timestamp_police = strtotime($police);
        $timestamp_barangay = strtotime($barangay);
        $timestamp_nbi = strtotime($nbi);
        $timestamp_birthday = strtotime($birthday);
        $formattedDate_police = date("F d, Y", $timestamp_police);
        $formattedDate_barangay = date("F d, Y", $timestamp_barangay);
        $formattedDate_nbi = date("F d, Y", $timestamp_nbi);
        $formattedDate_birthday = date("F d, Y", $timestamp_birthday);
        $output .= '
   
<tr> 
  <td>  ' . $row['appno'] . '   </td> 
  <td>  ' . $row['lastnameko'] . '   </td> 
  <td> ' . $row['firstnameko'] . '   </td>        
  <td> ' . $row['mnko'] . '   </td>        
  <td> ' . $row['extnname'] . '   </td>        
  <td> ' . $row['cpnum'] . '   </td>        
  <td> ' . $row['gendern'] . '   </td>        
  <td> ' . $row['civiln'] . '   </td>        
  <td> ' . $row['sssnum'] . '   </td>        
  <td> ' . $row['pagibignum'] . '   </td>        
  <td> ' . $row['phnum'] . '   </td>        
  <td> ' . $row['tinnum'] . '   </td>        
  <td> ' . $formattedDate_police . '   </td>        
  <td> ' . $formattedDate_barangay . '   </td>        
  <td> ' . $formattedDate_nbi . '   </td>        
  <td> ' . $row['psa'] . '   </td>       
  <td> ' . $formattedDate_birthday . '   </td>     
  <td> ' . $row['peraddress'] . '   </td>   
  <td>' . $row["actionpoint"] . '</td>  
</tr>
   ';
    }
    $output .= '</table>';
    header('Content-Type: application/xls');

    $fname = "HRdatabase_" . $dtnow . ".xls";
    header("Content-Disposition: attachment; filename=$fname");
    echo $output;
}
?>
