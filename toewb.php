<?php
include("connect.php");

session_start();




$data = $_SESSION["data"];
$view = "Applicants Shortlisted on (" . $data . ")";

if (isset($_POST['displaymo'])) {

  $appnum1 = $_POST['shadowd1'];
  $shortnum1 = $_POST['shadowd2'];
  $appname1 = $_POST['appname88'];
  echo $appname1;

  $_SESSION["appnum2"] = $appnum1;
  $_SESSION["appko"] = $appname1;

  header("location:details.php");
}



if (isset($_POST['Back'])) {

  switch ($_SESSION["account"]) {
    case 'deployment':
      # code...
      header("location:deployment.php");
      break;
    case 'recruitment':
      # code...
      header("location:recruitment.php");
      break;
  }
}


if (isset($_POST['Back1'])) {
  header("location:short.php");
}


?>




<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Julius+Sans+One&family=Poppins&family=Quicksand&family=Roboto&family=Thasadith&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="deo1.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <!--for data table-->
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">

  <title>Applicant Shortlisted</title>

  <style>
    * {
      font-family: 'Inter', sans-serif;
    }

    .how2 {
      position: absolute;
      top: 0;
      left: 0;
      z-index: 105;
      background: rgb(255, 255, 255);
      background-size: 100% 100%;
      height: 100%;
      width: 100%;
      border: 0px solid black;
    }

    .notification {
      color: black;
      text-decoration: none;
      position: relative;
      display: inline-block;
      border-radius: 2px;
    }

    .notification:hover {
      background: green;
    }

    .notification .badge {
      position: absolute;
      top: -10px;
      right: -10px;
      padding: 2px 5px;
      border-radius: 50%;
      background-color: #D80032;
      color: white;
    }
  </style>
</head>


<body>



  <center class="how2">

    <?php
    echo '

';
    $_SESSION["dataexport1"] = $data;
    echo '
            <form action = "" method = "POST">
              <button class="btn btn-success btnsall" Name ="alltoewb" style="float:right;"><span>ALL TO EWB</span></button>
              <button class="btn btn-secondary btnsall" Name ="Back" style="float:right;"><span>BACK</span></button>
             </form>
<br><br><br>
          <h2><font color="black"> ' . $view . ' </font> </h2>
          <br><br>

                  <table id="example" class="table table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end " style="width:100%;">
                              <thead class="bg-success">
                              <tr>
                                <th class="text-white"> Lastname </th>
                                <th class="text-white"> Firstname </th>
                                <th class="text-white"> Middlename </th>
                                <th class="text-white"> SSS </th>
                                <th class="text-white">  Pag-ibig </th>
                                <th class="text-white" > Philhealth </th>
                                <th class="text-white"> TIN </th>
                                <th class="text-white" > Police </th>
                                <th class="text-white"> Brgy </th>
                                <th class="text-white"> NBI </th>
                                <th class="text-white"> PSA </th>
                                <th class="text-white"> Action </th>
                               </tr>   
                              </thead>

                              <tbody> 
                  ';

    $resultx1 = mysqli_query($link, "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data'");
    while ($rowx1 = mysqli_fetch_row($resultx1)) {
      // $kekelpogi= $rowx1[2];

      $resultx = mysqli_query($link, "SELECT * FROM employees WHERE appno = '$rowx1[2]'  ");
      while ($rowx = mysqli_fetch_row($resultx)) {
        if ($rowx[33] == "EWB" or $rowx[33] == "DEPLOYED" or  $rowx[37] != '') {
          echo ' <tr> ';

          echo '  <td>  ' . $rowx[6] . '   </td> ';
          echo '  <td> ' . $rowx[7] . '   </td> ';
          echo '  <td> ' . $rowx[8] . '   </td> ';
          echo '  <td> ' . $rowx[24] . '   </td> ';
          echo '  <td> ' . $rowx[25] . '   </td> ';
          echo '  <td> ' . $rowx[26] . '   </td> ';
          echo '  <td> ' . $rowx[27] . '   </td> ';
          echo '  <td> ' . $rowx[28] . '   </td> ';
          echo '  <td> ' . $rowx[29] . '   </td> ';
          echo '  <td> ' . $rowx[30] . '   </td> ';
          echo '  <td> ' . $rowx[31] . '   </td> ';





          echo '<td> 
                           <form action = "" method = "POST">
       
                        <input type = "hidden" name = "shadowE1x" value = "' . $rowx[4] . '">
                        <input type = "hidden" name = "shadowE1" value = "' . $rowx[4] . '">


                  ';
          $resultcem = mysqli_query($link, "SELECT * FROM shortlist_master where appnumto = '$rowx[4]'");
          $corow = mysqli_num_rows($resultcem);

          echo '
            
                  <input type = "hidden" name = "shad" value = "' . $corow . '">
       
                     <!-- <button type="submit" name = "addtoewb"  class="btn btn-info notification" style = "font-size:15;width:100px;height:60px">
                        <span class="glyphicon glyphicon-edit">TO EWB</span>
                      </button>-->

                       

                  </form>
                  </td>





                                          </tr> ';
        } else {
          echo ' <tr> ';

          echo '  <td>  ' . $rowx[6] . '   </td> ';
          echo '  <td> ' . $rowx[7] . '   </td> ';
          echo '  <td> ' . $rowx[8] . '   </td> ';
          echo '  <td> ' . $rowx[24] . '   </td> ';
          echo '  <td> ' . $rowx[25] . '   </td> ';
          echo '  <td> ' . $rowx[26] . '   </td> ';
          echo '  <td> ' . $rowx[27] . '   </td> ';
          echo '  <td> ' . $rowx[28] . '   </td> ';
          echo '  <td> ' . $rowx[29] . '   </td> ';
          echo '  <td> ' . $rowx[30] . '   </td> ';
          echo '  <td> ' . $rowx[31] . '   </td> ';





          echo '<td> 
                           <form action = "" method = "POST">
       
                        <input type = "hidden" name = "shadowE1x" value = "' . $rowx[4] . '">
                        <input type = "hidden" name = "shadowE1" value = "' . $rowx[4] . '">


                  ';
          $resultcem = mysqli_query($link, "SELECT * FROM shortlist_master where appnumto = '$rowx[4]'");
          $corow = mysqli_num_rows($resultcem);

          echo '
            
                  <input type = "hidden" name = "shad" value = "' . $corow . '">
       
                      <button type="submit" name = "addtoewb"  class="btn btn-info notification">
                        <span class="glyphicon glyphicon-edit">TO EWB</span>
                      </button>

                       

                  </form>
                  </td>





                                          </tr> ';
        }
      }
    }
    '

                       </tbody>
                          </table> 



            ';
    echo '</center>
                          
</body>
</html>

';


    if (isset($_POST['addtoshortlistbtn1'])) {

      $id1 = $_POST['shadowE1'];



      mysqli_query($link, "UPDATE employees
          SET
          
          actionpoint = 'SHORTLISTED'
          WHERE
          appno = '$id1'
          ");


      $dtnow = date("m/d/Y");

      $resultchk = mysqli_query($link, "select * from shortlist_master WHERE shortlistnameto = '$data' and appnumto='$id1' ");
      if (mysqli_num_rows($resultchk) == 0) {
        // kapag wala pang user name na kaparehas

        mysqli_query($link, "INSERT INTO shortlist_master
                        (shortlistnameto,appnumto,dateto)
                        VALUES
                        ('$data','$id1','$dtnow')
                        ");
        $kekelpogi = "Applicant Added to Shortlist Database";
      } else {

        $kekelpogi = "Not Added due to duplication!";
      }
    }







    if (isset($_POST['alltoewb'])) {

      $resultx1 = mysqli_query($link, "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data'");
      while ($rowx1 = mysqli_fetch_row($resultx1)) {
        // $kekelpogi= $rowx1[2];

        $resultx = mysqli_query($link, "SELECT * FROM employees WHERE appno = '$rowx1[2]' ");
        while ($rowx = mysqli_fetch_row($resultx)) {
          echo '
<input type = "text" name = "shake" value = "' . $rowx[4] . '">
';
          mysqli_query($link, "UPDATE employees
                                            SET
                                            
                                            actionpoint = 'EWB',
                                            ewbdeploy='0'

                                            WHERE
                                            appno = '$rowx[4]'
                                            ");


          $dtnow = date("m/d/Y");

          $resultchk = mysqli_query($link, "select * from shortlist_master WHERE shortlistnameto = '$data' and appnumto='$rowx[4]' ");
          if (mysqli_num_rows($resultchk) == 0) {
            // kapag wala pang user name na kaparehas

            $kekelpogi = "Cannot locate applicant !";
          } else {

            mysqli_query($link, "UPDATE shortlist_master
                                                                  set 

                                                                  ewb='EWB',
                                                                  ewbdate='$dtnow'
                                                                WHERE
                                                                appnumto='$rowx[4]'
                                                                ");
          }
        }
      }
      $kekelpogi = "All Applicants transferred for EWB Checking!!";
    }






    if (isset($_POST['addtoewb'])) {

      $id1 = $_POST['shadowE1x'];



      mysqli_query($link, "UPDATE employees
          SET
          
          actionpoint = 'EWB',
                 ewbdeploy='0'

          WHERE
          appno = '$id1'
          ");


      $dtnow = date("m/d/Y");

      $resultchk = mysqli_query($link, "select * from shortlist_master WHERE shortlistnameto = '$data' and appnumto='$id1' ");
      if (mysqli_num_rows($resultchk) == 0) {
        // kapag wala pang user name na kaparehas

        $kekelpogi = "Cannot locate applicant !";
      } else {

        mysqli_query($link, "UPDATE shortlist_master
            set 

            ewb='EWB',
            ewbdate='$dtnow'
          WHERE
          appnumto='$id1'
          ");


        $kekelpogi = "Applicant transferred for EWB Checking!";
      }
    }







    if (isset($_POST['remove'])) {
      $id1 = $_POST['shadowE1x'];
      $kekelpogi = $id1;



      $resultac = mysqli_query($link, "SELECT * FROM employees where appno='$id1'");
      while ($rowac = mysqli_fetch_array($resultac)) {


        if ($rowac[33] == "SHORTLISTED") {

          if ($corow == 1) {

            mysqli_query($link, "UPDATE employees
                          SET
                          
                          actionpoint = ''
                                 ewbdeploy=''
                          WHERE
                          appno = '$id1'
                          ");

            $dtnow = date("m/d/Y");

            $resultchk = mysqli_query($link, "select * from shortlist_master WHERE shortlistnameto = '$data' and appnumto='$id1' ");
            if (mysqli_num_rows($resultchk) == 0) {
              // kapag wala pang user name na kaparehas

              $kekelpogi = "Cannot locate applicant !";
            } else {

              mysqli_query($link, "DELETE  from shortlist_master
                                      WHERE
                                      shortlistnameto = '$data' and appnumto='$id1'
                                      ");


              $kekelpogi = "Applicant Deleted from Shortlist!";
            }
          }
        } else {
          $dtnow = date("m/d/Y");

          $resultchk1 = mysqli_query($link, "select * from shortlist_master WHERE shortlistnameto = '$data' and appnumto='$id1' ");
          if (mysqli_num_rows($resultchk1) == 0) {
            // kapag wala pang user name na kaparehas

            $kekelpogi = "Cannot locate applicant !";
          } else {

            mysqli_query($link, "DELETE  from shortlist_master
                                      WHERE
                                      shortlistnameto = '$data' and appnumto='$id1'
                                      ");


            $kekelpogi = "Applicant Deleted from Shortlist!";
          }
        }
      }
    }







    if (isset($kekelpogi)) {
      echo '<div class = "how1"><div class = "many"><br> 
    ' . $kekelpogi . '<br>
    <form action = "" method = "POST"><br>
    <input type = "submit" name = "cancel" value = "Okay" class="btn btn-info btn-lg">
    </form>
    
  </div></div>';
    }





    ?>
    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      });
    </script>