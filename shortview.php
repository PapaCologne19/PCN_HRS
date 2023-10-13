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

</head>

<body>


  <center class="how2">

    <?php
    echo '

<form method="post" action="export1.php">';
    $_SESSION["dataexport1"] = $data;
    echo '
     <input type="submit" name="export" class="btn btn-success btnsall" value="Export" style="float:right;" />
    </form>


            <form action = "" method = "POST">
            <button class="btn btn-success btnsall" Name ="Back" style="float:right;"><span>Back</span></button>
             </form>
<br><br>
<h2 class="fs-2"><font color="black"> ' . $view . ' </font> </h2>
<br><br>

                  <table id="example" class="table p-3 table-sm align-middle mb-0 p-3 border border-info border-start-0 border-end-0 rounded-end" style="width:100%;">
                              <thead>
                              <tr>
                              
                              <th class="text-white"> Lastname </th>
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
                                  <th class="text-white"> Birthday </th>
            <th class="text-white"> Address </th>
                      <th class="text-white"> Status </th>
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
    <input type = "submit" name = "" value = "Okay" class=" btn btn-info btn-lg">
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