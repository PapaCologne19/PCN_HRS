<?php
include("connect.php");

session_start();




$data = $_SESSION["data"];
$view = "Applicants Shortlisted on : (" . $data . ")";

//$data1=$_SESSION["data1"];




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

<form method="post" action="export1.php">';
    $_SESSION["dataexport1"] = $data;
    echo '
     <input type="submit" name="export" class="btn-success" value="Export" style="float:right;font-size:15;width:200px;height:50px" />
    </form>


            <form action = "" method = "POST">
            <button class="button btn-success" Name ="Back" style="float:right;width:200px;height:50px"><span>BACK</span></button>
             </form>
<br><br>
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
                                  <th> Birthday </th>
            <th> Address </th>
                      <th> Status </th>
                               </tr>   
                              </thead>

                              <tbody> 
                  ';

    $resultx1 = mysqli_query($link, "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data'");
    while ($rowx1 = mysqli_fetch_row($resultx1)) {
      // echo $rowx1[2]; 

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
        echo '  <td> ' . $rowx[14] . '   </td>  ';
        echo '  <td> ' . $rowx[10] . '   </td>    ';
        echo '  <td>' . $rowx[33] . '</td>    ';

        echo '



                  </form></td>




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














    if (isset($kekelpogi)) {
      echo '<div class = "how1"><div class = "many"><br> 
    ' . $kekelpogi . '<br>
    <form action = "" method = "POST"><br>
    <input type = "submit" name = "" value = "Okay" class="btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px">
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



      $(document).ready(function() {
        var table = $('#example').DataTable();

        $('#example tbody').on('click', 'tr', function() {
          if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
          } else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
          }
        });

        $('#addtoshortlistbtn').click(function() {
          table.row('.selected').remove().draw(false);
          document.getElementById("addtoshortlistbtn1").click();
        });
      });
    </script>