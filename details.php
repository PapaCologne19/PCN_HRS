<?php
include("connect.php");

session_start();

$appnum1 = $_SESSION['appnum2'];
$appnum3 = $_SESSION['appko'];


if (isset($_POST['Back1'])) {
    header("location:short.php");
}

?>


<html>

<head>
    <title>Details</title>
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
</head>

<body>

    <?php


    $view = "Applicant Shortlist Details (" . $appnum3 . ")";
    echo '

<div class = "how2"><div class = "">
            <form action = "" method = "POST">
            <button class="btn btn-success btnsall" Name ="Back1" style="float:right;"><span>BACK</span></button>
             </form>
             <br><br><br>

    <center>


          <h2 class="fs-2"><font color="black">' . $view . ' </font> </h2>
<br>
                            <table id="example1" class="table p-3 table-sm align-middle mb-0 p-3 border border-info border-start-0 border-end-0 rounded-end" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th class="text-white"> List of Project </th>
                                            </tr>   
                                        </thead>

                                        <tbody> 
                            ';

    $resulty = mysqli_query($link, "SELECT * FROM shortlist_master WHERE  appnumto = '$appnum1'");
    while ($rowy = mysqli_fetch_row($resulty)) {

        echo ' <tr> ';
        echo '  <td>  ' . $rowy[1] . '   </td> ';
        echo ' </tr> ';
    }
    '

                                 </tbody>
                                    </table> 




    </center>      
        

</div>
</div>


';
    ?>



</body>

</html>
<script>
    $(document).ready(function() {
        $('#example1').DataTable();
    });
</script>