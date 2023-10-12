<?php
include("connect.php");

session_start();




$data = $_SESSION["data"];
$view = "Applicants Shortlisted on : (" . $data . ")";




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

  <style>
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
      background-color: #555;
      color: green;
      text-decoration: none;
      padding: 15px 26px;
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
      padding: 5px 10px;
      border-radius: 50%;
      background-color: red;
      color: white;
    }
  </style>





  <link rel="stylesheet" type="text/css" href="deo1.css">



  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



  <!--for data table-->
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
</head>

<body>


  <center>

    <?php
    echo '

';
    $_SESSION["dataexport1"] = $data;
    echo '


            <form action = "" method = "POST">
            <button class="button btn-success" Name ="Back" style="float:right;width:200px;height:50px"><span>BACK</span></button>
             </form>

<h2><font color="black"> ' . $view . ' </font> </h2>
<br><br>

                  <table id="example" class="table" style="width:90%;">
                              <thead>
                              <tr>
                              
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
                            <th> Action </th>

                               </tr>   
                              </thead>

                              <tbody> 
                  ';

    $resultx1 = mysqli_query($link, "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data'");
    while ($rowx1 = mysqli_fetch_row($resultx1)) {
      // $kekelpogi= $rowx1[2];

      $resultx = mysqli_query($link, "SELECT * FROM employees WHERE appno = '$rowx1[2]' ");
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





        echo '<td> 
                           <form action = "" method = "POST">
       
                        <input type = "hidden" name = "shadowE1x" value = "' . $rowx[4] . '">
                        <input type = "hidden" name = "shadowE1" value = "' . $rowx[4] . '">


                  ';
        $resultcem = mysqli_query($link, "SELECT * FROM shortlist_master where appnumto = '$rowx[4]'");
        $corow = mysqli_num_rows($resultcem);

        echo '
            
                  <input type = "hidden" name = "shad" value = "' . $corow . '">
       
                      <button type="submit" name = "remove"  class="btn btn-info notification" style = "font-size:15;width:100px;height:60px">
                        <span class="glyphicon glyphicon-edit">REMOVE</span> <span class="badge">' . $corow . '</span>
                      </button>

                       

                  </form>
                  </td>





                                          </tr> ';
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








    if (isset($_POST['addtoewb'])) {

      $id1 = $_POST['shadowE1'];



      mysqli_query($link, "UPDATE employees
          SET
          
          actionpoint = 'EWB'
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
      $corow1 = $_POST['shad'];




      if ($corow1 != 1) {

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


          $kekelpogi = "Applicant Deleted from this Shortlist only!";
        }
      } else {

        mysqli_query($link, "UPDATE employees
                                                  SET
                                                  
                                                  actionpoint = ''
                                                  WHERE
                                                  appno = '$id1'
                                                  ");
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


          $kekelpogi = "Applicant Deleted from All Shortlist ! ";
        }
      }
    }










    if (isset($kekelpogi)) {
      echo '<div class = "how1"><div class = "many"><br> 
    ' . $kekelpogi . '<br>
    <form action = "" method = "POST"><br>
    <input type = "submit" name = "cancel" value = "Okay" class="btn-info btn-lg" style="font-size:15;width:100px;height:50px">
    </form>
    
  </div></div>';
    }





    ?>
    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      });
    </script>