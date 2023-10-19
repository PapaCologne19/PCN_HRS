<?php
include("connect.php");

session_start();

$data = $_SESSION["data"];
$view = "Add Applicant to Shortlist (" . $data . ")";



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
  header("location:recruitment.php");
}

if (isset($_POST['Back1'])) {
  header("location:short.php");
}



?>



<html>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=7">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gabarito&family=Inter&family=Julius+Sans+One&family=Poppins&family=Quicksand:wght@400;500&family=Roboto&family=Thasadith&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="deo1.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">


  <!--for data table-->
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">

  <style>
    *{
      font-family: 'Roboto', sans-serif;
      text-transform: capitalize !important;
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
            <form action = "" method = "POST">
              <button class="btn btn-success btnsall" Name ="Back" style="float:right;"><span>BACK</span></button>
            </form>
            <br><br><br>

            <h2 class="fs-2"><font color="black"> ' . $view . ' </font> </h2>


                  <table id="example" class="table table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end " style="width:100%;">
                              <thead>
                              <tr>
                              
                              <th class="text-white"> Lastname. </th>
                              <th class="text-white"> Firstname </th>
                              <th class="text-white"> Middlename </th>
                              <th class="text-white"> SSS </th>
                              <th class="text-white"> Pag-ibig </th>
                              <th class="text-white"> Philhealth </th>
                              <th class="text-white"> TIN </th>
                              <th class="text-white"> Police </th>
                              <th class="text-white"> Brgy </th>
                              <th class="text-white"> NBI </th>
                              <th class="text-white"> PSA </th>
                              <th class="text-white"> Status </th>
                              <th class="text-white"> Action </th>

                               </tr>   
                              </thead>

                              <tbody> 
                  ';

    $resultx = mysqli_query($link, "SELECT * FROM employees WHERE  actionpoint <> 'BLACKLISTED' AND actionpoint <> 'REJECTED' AND actionpoint <> 'DEPLOYED'");
    while ($rowx = mysqli_fetch_row($resultx)) {

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
      echo ' 
                                           <td>  
                                           <form action = "" method = "POST">
                                           <input type = "hidden" name = "shadowd1" value = "' . $rowx[4] . '">
                                           <input type = "hidden" name = "shadowd2" value = "' . $data . '">
                                           <input type = "hidden" name = "appname88" value = "' . $rowx[6] . ', ' . $rowx[7] . ' ' . $rowx[8] . '">

                                          <button type="submit" name = "displaymo" class="btn btn-success" style = "font-size:15;width:90px;">
                                          <span class="glyphicon glyphicon-edit" >' . $rowx[33] . '</span> 
                                          </button>
                                          </form>
                                           
                                            </td> ';


      if ($rowx[33] == "TERMINATED") {


        echo '<td> <form action = "" method = "POST">

                                                  <input type = "hidden" name = "emp_number" value = "' . $rowx[4] . '">
                                                        <input type = "hidden" name = "appname88" value = "' . $rowx[6] . ', ' . $rowx[7] . ' ' . $rowx[8] . '">
                                                  ';
        $resultcem = mysqli_query($link, "SELECT * FROM shortlist_master where appnumto = '$rowx[4]'");
        $corow = mysqli_num_rows($resultcem);

        echo '
                                                  <input type = "hidden" name = "shad" value = "' . $corow . '">
                                                  

                                      
<button type="submit" name="unterminate_me" class="btn btn-info notification" style = "font-size:15;"  ><span class="glyphicon glyphicon-edit" >Unterminate</span> <span class="badge">' . $corow . '</span></button>
                                                  </form></td>
                                                  ';
      } else {
        echo '<td> <form action = "" method = "POST">
                                                  <input type = "hidden" name = "shadowE1" value = "' . $rowx[4] . '">


                                                  ';
        $resultcem = mysqli_query($link, "SELECT * FROM shortlist_master where appnumto = '$rowx[4]'");
        $corow = mysqli_num_rows($resultcem);

        echo '
                                                  <input type = "hidden" name = "shad" value = "' . $corow . '">
               
                                                  <button type="submit" name = "addtoshortlistbtn1" id = "addtoshortlistbtn1" class="btn btn-info notification">
                                                    <span class="glyphicon glyphicon-edit" >Add</span> <span class="badge">' . $corow . '</span>
                                                  </button>

                                                  </form></td>
                                                  ';
      }
      echo '
               
                                          </tr> ';
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


      $resultac = mysqli_query($link, "SELECT * FROM employees where appno='$id1'");
      while ($rowac = mysqli_fetch_array($resultac)) {


        echo '<input type = "text" name = "" value = "' . $rowac[33] . '">';
        echo '<input type = "text" name = "" value = "' . $id1 . '">';

        if ($rowac[33] == "") {
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

            $kekelpogi = "Not Added due to duplication";
          }
        } else {
          $dtnow = date("m/d/Y");

          $resultchk = mysqli_query($link, "select * from shortlist_master WHERE shortlistnameto = '$data' and appnumto='$id1' ");
          if (mysqli_num_rows($resultchk) == 0) {
            // kapag wala pang user name na kaparehas

            mysqli_query($link, "INSERT INTO shortlist_master
                                                                  (shortlistnameto,appnumto,dateto)
                                                                  VALUES
                                                                  ('$data','$id1','$dtnow')
                                                                  ");
            $kekelpogi = "Applicant Added to Shortlist Database!";
          } else {

            $kekelpogi = "Not Added due to Duplication!";
          }
        }
      }
    }










    if (isset($_POST['unterminate_me'])) {


      $emp_number1 = $_POST['emp_number'];
      $emp_number2 = $_POST['appname88'];


      echo '<div class = "how1">
        <div class = "many"><br> 
    Revert Termination: for ' . $emp_number2 . '<br>
      <form action = "" method = "POST"><br>
        <div class="form-group" >
          <label class="form-label">Reason of Untermination</label>
            <center> 
              <input type="text" name = "unter_reason" value= "" class="form-control"  placeholder="" autofocus>
            </center>
        </div>

                                                          
<br>



<input type = "text" class="form-control" name = "emp_number1" value = "' . $emp_number1 . '">
<br><br>
    <input type = "submit" name = "unter_me" value = "Submit" class="btn btn-info btn-lg" >
    
    </form>
    <br> <br>
    <form action = "" method = "POST">
              <button class="btn btn-success" Name ="Back1" ><span>Back</span></button>
            </form>
    





  </div></div>';
    }



    if (isset($_POST['unter_me'])) {

      $emp_number1 = $_POST['emp_number1'];
      $unter_reason1 = $_POST['unter_reason'];

      $resultemp = mysqli_query($link, "UPDATE employees 
                                  set
                                  actionpoint='EWB',
                                  unter_reason='$unter_reason1',
                                  reasonofaction=''  
                                WHERE
                                 appno = '$emp_number1'");

      $kekelpogi = "Un Termination successful !";
    }


    if (isset($kekelpogi)) {
      echo '<div class = "how1"><div class = "many"><br> 
    ' . $kekelpogi . '<br>
    <form action = "" method = "POST"><br>
    <input type = "submit" name = "" value = "Okay" class="btn btn-info btn-lg">
    </form>
    
  </div></div>';
    }


    ?>
    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      });

      $(document).ready(function() {
        $('#example1').DataTable();
      });

    </script>