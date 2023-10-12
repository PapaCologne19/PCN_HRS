
<?php
//export.php  

include("connect.php");
session_start();
date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');


$dtnow = date("m/d/Y");
$data = $_SESSION["dataexport1"];


$output = '';
if (isset($_POST["export"])) {

  echo 'Recruitment Database<br>
Shorlist Name : ' . $data . ' <br>

      as of : ' . $dtnow . '   <br><br> 
';
  $output .= '
   <table class="table" bordered="1">  
                    

                         <tr>  
                              <th> Applicant Number</th>  
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
                            
                              <th>Birthday </th>
                              <th> Address </th>
                                <th> Desired Position </th>
                              <th> Date Applied </th>
                              <th> Status </th>

                          </tr>




  ';

  $resultx1 = mysqli_query($link, "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data'");
  while ($rowx1 = mysqli_fetch_row($resultx1)) {
    // echo $rowx1[2]; 

    $resultx = mysqli_query($link, "SELECT * FROM employees WHERE appno = '$rowx1[2]' ");
    while ($rowx = mysqli_fetch_array($resultx)) {

      if (mysqli_num_rows($resultx) > 0) {


        $output .= '
    <tr>
                          <td>' . $rowx["appno"] . '</td>
                          <td>' . $rowx["lastnameko"] . '</td>  
                         <td>' . $rowx["firstnameko"] . '</td>  
                         <td>' . $rowx["mnko"] . '</td>
                         <td>' . $rowx["sssnum"] . '</td>
                         <td>' . $rowx["pagibignum"] . '</td>
                         <td>' . $rowx["phnum"] . '</td>
                         <td>' . $rowx["tinnum"] . '</td>
                         <td>' . $rowx["policed"] . '</td>
                         <td>' . $rowx["brgyd"] . '</td>
                         <td>' . $rowx["nbid"] . '</td>
                         <td>' . $rowx["psa"] . '</td>

                         <td>' . $rowx["birthday"] . '</td>
                         <td>' . $rowx["paddress"] . '</td>
                                 <td>' . $rowx["despo"] . '</td>
                      
                         <td>' . $rowx["dapplied"] . '</td>  
                         <td> ___ Deploy  ___ Reject</td>  
                         
                    </tr>



   ';
      }
    }
  }




  $output .= '</table>';
  header('Content-Type: application/xls');

  $fname = "HRS_Shortlist_" . $data . "_" . $dtnow . ".xls";
  header("Content-Disposition: attachment; filename=$fname");
  echo $output;
}
?>
