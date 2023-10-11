<?php
include("connect.php");
session_start();






date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');
$datenow1 = date("Y-m-d");
$datenow = date("m/d/Y h:i:s A");









//check synchorizatioin of projects
$query = "SELECT * FROM synch where id ='2'";
$resultap = mysqli_query($link, $query);
while ($rowap = mysqli_fetch_array($resultap)) {
  if ($rowap[2] != $datenow1) {
    //echo "synch it";

    $day1 = date("d") - 1;
    $month1 = date("m");
    $year1 = date("Y");


    $date_old = $year1 . "-" . $month1 . "-" . $day1;
    //echo $date_old;



    //change employee status to EWB
    $querytemp1 = "SELECT * FROM projects WHERE end_date <= '$date_old'";
    $resultemp1 = mysqli_query($link, $querytemp1);
    while ($rowem1 = mysqli_fetch_array($resultemp1)) {

      $querytemp = "UPDATE shortlist_details set activity='INACTIVE'  WHERE project = '$rowem1[1]'";
      $resultemp = mysqli_query($link, $querytemp);
    }

    $query1 = "UPDATE synch SET datenow1='$datenow1', katsing='Shortlist' WHEREid = '2'";
    mysqli_query($link, $query1);

    $kekelpogi = "Shorlist Database Synch Complete";
  } else {
    //echo "synch na do nothing";

  }
}


















if (isset($_POST['to_index'])) {
  session_unset();

  // destroy the session 
  session_destroy();

  header("location:index.php");
}








if (isset($_POST['printapp'])) {
  $appnoto = $_POST['applicant_no'];

  $_SESSION["appnoto"] = $appnoto;

  header("location:printapp.php");
}




if (isset($_POST['addappdel1'])) {
  $short1 = $_POST['shortlisttitle1del'];

  $_SESSION["data"] = $short1;
  $_SESSION["account"] = "recruitment";
  header("location:toewb.php");
}



if (isset($_POST['addappdel'])) {
  $short1 = $_POST['shortlisttitle1del'];

  $_SESSION["data"] = $short1;
  header("location:shortviewdel.php");
}




if (isset($_POST['addappview'])) {
  $short1 = $_POST['shortlisttitle1'];

  $_SESSION["data"] = $short1;
  header("location:shortview.php");
}





if (isset($_POST['addapp'])) {
  $short1 = $_POST['shortlisttitle'];



  $_SESSION["data"] = $short1;
  header("location:short.php");
}


$querytap = "SELECT * FROM track where id ='1'";
$resultap = mysqli_query($link, $querytap);
while ($rowap = mysqli_fetch_array($resultap)) {
  $appno = $rowap[1];
}




if (isset($_POST['r_mrf'])) {
  $mrf_val1 = $_POST['mrf_val'];

  $query2 = "UPDATE mrf SET hr_personnel='YES' WHERE id = '$mrf_val1'";
  mysqli_query($link, $query2);
}




echo '

';



?>




<html lang="en">

<head>
  <meta charset="UTF-8">


  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
  <link rel="stylesheet" type="text/css" href="deo1.css">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <!-- Style CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Julius+Sans+One&family=Poppins&family=Quicksand&family=Roboto&family=Thasadith&display=swap" rel="stylesheet">


  <!-- Datatables -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>








  <style type="text/css">
    * {
      font-family: 'Inter', sans-serif;
    }

    #results {
      padding: 10px;
      border: 1px solid;
      background: #ccc;
    }

    .bs-example {
      margin: 20px;
    }

    body {
      font-family: Arial;
      font-size: 20
    }

    img {
      border-radius: 8px;
    }



    .body50 {
      position: absolute;
      top: 0;
      left: 0%;
      border: 5px solid black;
      height: 100%;
      width: 50%;
    }

    .body5010p {
      display: flex;
      position: absolute;
      top: 10%;
      left: 20%;
      border: 0px solid black;
      height: 90%;
      width: 100%;
    }

    .body5025p {
      position: absolute;
      top: 10%;
      left: 25%;
      border: 0px solid green;
      height: 90%;
      width: 50%;
    }


    .body60 {
      position: absolute;
      top: 0;
      left: 50%;
      border: 5px solid black;
      height: 100%;
      width: 50%;
    }

    .body6010p {
      position: absolute;
      top: 10%;
      left: 20%;
      border: 5px solid black;
      height: 90%;
      width: 60%;
    }


    .body50100 {
      position: absolute;
      top: 10%;
      left: 20%;
      index: 102;
      border: 0px solid black;
      height: 10%;
      width: 70%;
    }


    .body5010p2 {
      position: absolute;
      top: 10%;
      left: 15%;
      border: 0px solid black;
      height: 10%;
      width: 80%;
    }

    th {
      text-align: center;
    }
  </style>






  <title>HRS RECRUITMENT</title>
</head>




<!-- <body style="background-image: url(bg.png); background-size:100% 100%; background-repeat: no-repeat;"> -->
<body>
  


  <?php


  if ($_SESSION["darkk"] == "recruitment") { ?>

    <header class="cd-main-header js-cd-main-header">
      <div class="cd-logo-wrapper">
        <a href="#0" class="cd-logo"><img src="assets/img/pcnlogo1.png" alt="Logo"></a>
      </div>

      <div class=" js-cd-search">
        <form>
          <!-- <input class="reset" type="search" placeholder="Search...">-->
        </form>
      </div>

      <button class="reset cd-nav-trigger js-cd-nav-trigger" aria-label="Toggle menu"><span></span></button>
      <ul class="cd-nav__list js-cd-nav__list">
        <!--<li class="cd-nav__item"><a href="#0">Tour</a></li>
          <li class="cd-nav__item"><a href="#0">Support</a></li>                                                                    -->
        <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">

          <a href="">
            <img src="assets/img/cd-avatar.svg" alt="avatar">
            <span>Account</span>
          </a>
          <form action="" method="POST">
            <ul class="cd-nav__sub-list">
              <!-- <li class="cd-nav__sub-item"><a href="#0">My Account</a></li>
                                                                                    <li class="cd-nav__sub-item"><a href="#0">Edit Account</a></li>-->
              <li class="cd-nav__sub-item"><BUTTON class="button2" name="to_index" style="font-size:14; width:98%;height:50px">Log out</button></li>
            </ul>
          </form>
        </li>
      </ul>
    </header>

    <!-- .cd-main-header -->
    <main class="cd-main-content">
      <nav class="cd-side-nav js-cd-side-nav">
        <ul class="cd-side__list js-cd-side__list">
          <!--<li class="cd-side__label"><span>Recruitment</span></li>-->
          <li class="cd-side__item cd-side__item--has-children cd-side__item--overview js-cd-item--has-children">
            <!--<a href="#0">Overview</a>-->
            <ul class="cd-side__sub-list">
              <!--   <li class="cd-side__sub-item"><a href="#0">All Data</a></li>
               <li class="cd-side__sub-item"><a href="#0">Category 1</a></li>
               <li class="cd-side__sub-item"><a href="#0">Category 2</a></li> -->
            </ul>
          </li>

          <li class="cd-side__item cd-side__item--has-children cd-side__item--notifications cd-side__item--selected js-cd-item--has-children">
            <!-- <a href="#0">Notifications<span class="cd-count">3</span></a>-->

            <ul class="cd-side__sub-list">
              <!--<li class="cd-side__sub-item"><a aria-current="page" href="">All Notifications</a></li>-->
              <!--<li class="cd-side__sub-item"><a href="">Recruitment Request</a></li>-->
              <!--<li class="cd-side__sub-item"><a href="">Shortlist Request</a></li>-->
            </ul>
          </li>

          <li class="cd-side__item cd-side__item--has-children cd-side__item--comments js-cd-item--has-children">
            <!--<a href="#0">Comments</a>-->
            <ul class="cd-side__sub-list">
              <!--<li class="cd-side__sub-item"><a href="#0">All Comments</a></li>
                <li class="cd-side__sub-item"><a href="#0">Edit Comment</a></li>
                <li class="cd-side__sub-item"><a href="#0">Delete Comment</a></li> -->
            </ul>
          </li>
        </ul>

        <ul class="cd-side__list js-cd-side__list">
          <li class="cd-side__label" style="font-size:26;"><span>Recruitment Menu</span></li>
          <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
            <a href="">REPORTS</a>

            <ul class="cd-side__sub-list">
              <form action="" method="POST">
                <li class="cd-side__btn"><a><BUTTON class="btn" name="blacklistr" style="font-size:14; width:150px;height:50px">List of Blacklisted</button></a></li>
                <li class="cd-side__btn"><a><BUTTON class="btn" name="viewdatabase" style="font-size:14; width:150px;height:50px">View Database</button></a></li>

                <!--<li class="cd-side__sub-item"><a><BUTTON class="btn" name = "additionalr">Additional Repots</button></a></li>-->
              </form>
            </ul>
          </li>

          <li class="cd-side__item cd-side__item--has-children cd-side__item--images js-cd-item--has-children">
            <!--<a href="#0">Images</a>-->

            <ul class="cd-side__sub-list">
              <!--<li class="cd-side__sub-item"><a href="#0">All Images</a></li>
                                                          <li class="cd-side__sub-item"><a href="#0">Edit Image</a></li>

                                                        -->
            </ul>
          </li>

          <li class="cd-side__item cd-side__item--has-children cd-side__item--users js-cd-item--has-children">
            <!--  <a href="#0">Users</a>-->

            <ul class="cd-side__sub-list">
              <!--
                                                        <li class="cd-side__sub-item"><a href="#0">All Users</a></li>
                                                        <li class="cd-side__sub-item"><a><BUTTON class="btn" name = "next1">Edit User</button></a></li>
                                                        <li class="cd-side__sub-item"><a><BUTTON class="btn" name = "next">Add User</button></a></li>
                                                        -->
            </ul>
          </li>

        </ul>

        <ul class="cd-side__list js-cd-side__list">

          <form action="" method="POST">
            <!--<li class="cd-side__label"><span>Recruitment Action</span></li>-->
            <li class="cd-side__btn"><a><BUTTON class="btn" name="applicant"><i class="bi bi-camera" style="margin-right: .5rem !important;"></i> Take Applicant Photo</button></li>
            <li class="cd-side__btn"><a><BUTTON class="btn" name="shortlist"><i class="bi bi-database" style="margin-right: .5rem !important;"></i> Database Entry</button></a></li>
            <li class="cd-side__btn"><a><BUTTON class="btn" name="databaselist"><i class="bi bi-database-add" style="margin-right: .5rem !important;"></i> Edit Database Entry</button></a></li>


            <li class="cd-side__btn"><button type="button" class="btn" data-toggle="modal" data-target="#myModalapp_print"><i class="bi bi-printer" style="margin-right: .5rem !important;"></i> Print an Entry</button></li>


            <br>
            <ul class="cd-side__list js-cd-side__list">
              <li class="cd-side__label" style="font-size:26"><span>SHORTLISTING MENU</span></li>
              <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
                <a href="">REPORTS</a>

                <ul class="cd-side__sub-list">
                  <form action="" method="POST">
                    <!--<li class="cd-side__sub-item"><a><BUTTON class="btn" name = "blacklistr">List of Blacklisted</button></a></li>-->
                    <!--<li class="cd-side__sub-item"><a><BUTTON class="btn" name = "viewdatabaseshort">View Database</button></a></li>-->
                    <li class="cd-side__btn"><a><button type="button" class="btn" style="font-size:14; width:150px;height:50px" data-toggle="modal" data-target="#myModaladdshortview">+ Shortlist Download</button></a></li>
                    <!--<li class="cd-side__sub-item"><a><BUTTON class="btn" name = "additionalr">Additional Repots</button></a></li>-->
                    <li class="cd-side__btn"><a><BUTTON class="btn" name="summary" style="font-size:14; width:150px;height:50px">+ Summary</button></a></li>
                  </form>
                </ul>
              </li>

              <li class="cd-side__item cd-side__item--has-children cd-side__item--images js-cd-item--has-children">
                <!--<a href="#0">Images</a>-->

                <ul class="cd-side__sub-list">
                  <!--<li class="cd-side__sub-item"><a href="#0">All Images</a></li>
                                                          <li class="cd-side__sub-item"><a href="#0">Edit Image</a></li>

                                                        -->
                </ul>
              </li>

              <li class="cd-side__item cd-side__item--has-children cd-side__item--users js-cd-item--has-children">
                <!--  <a href="#0">Users</a>-->

                <ul class="cd-side__sub-list">
                  <!--
                                                        <li class="cd-side__sub-item"><a href="#0">All Users</a></li>
                                                        <li class="cd-side__sub-item"><a><BUTTON class="btn" name = "next1">Edit User</button></a></li>
                                                        <li class="cd-side__sub-item"><a><BUTTON class="btn" name = "next">Add User</button></a></li>
                                                        -->
                </ul>
              </li>

            </ul>








            <!--<li class="cd-side__label"><span>Shortlisting Action</span></li>-->
            <form action="" method="POST">
              <li class="cd-side__btn"><a><BUTTON class="btn" name="shortlisttitle"><i class="bi bi-file-earmark-plus" style="margin-right: .5rem !important;"></i> Create Shortlist Title</button></a></li>
              <!-- <li class="cd-side__btn"><a><BUTTON class="btn" name = "addapp">+ Add Applicant to Shorlist1</button></a></li>        -->



              <li class="cd-side__btn"><button type="button" class="btn" data-toggle="modal" data-target="#myModaladdshort"><i class="bi bi-folder-plus" style="margin-right: .5rem !important;"></i> Add to Shortlist</button></li>
              <li class="cd-side__btn"><button type="button" class="btn" data-toggle="modal" data-target="#myModaldelshort"><i class="bi bi-folder-minus" style="margin-right: .5rem !important;"></i> Remove from shortlist</button></li>
              <li class="cd-side__btn"><button type="button" class="btn" data-toggle="modal" data-target="#myModalewb"><i class="bi bi-layer-forward" style="margin-right: .5rem !important;"></i> Forward to EWB</button></li>
              <li class="cd-side__btn"><button type="button" class="btn" data-toggle="modal" data-target="#myModalmrf"><i class="bi bi-person-add" style="margin-right: .5rem !important;"></i> MRF </button></li>

            </form>

        </ul>




      </nav>

    <?php
  } else {
    // kapag wala pang user name na kaparehas
    $kekelpogi_index = "Page direct Un Authorized";

    // remove all session variables

    session_unset();

    // destroy the session 
    session_destroy();
  }
    ?>


    <?php




    if (isset($_POST['summary'])) {
      echo '
<div class="body5025p">
<table id="example" class="table" style="width:100%">
            <thead>
            <tr>
            <th> Shortlist Name </th>
            <th> Manpower Count </th>
            

             </tr>   
            </thead>

            <tbody> 


';

      $querydis1 = "SELECT distinct shortlistnameto FROM shortlist_master";
      $resultdis1 = mysqli_query($link, $connect);
      while ($rowdis1 = mysqli_fetch_array($resultdis1)) {

        $querydis = "SELECT shortlistnameto, count(*) FROM shortlist_master where shortlistnameto='$rowdis1[0]' group by shortlistnameto ";
        $resultdis = mysqli_query($link, $querydis);
        while ($rowdis = mysqli_fetch_array($resultdis)) {
          echo ' <tr> ';
          echo '  <td>  ' . $rowdis[0] . '   </td> ';
          echo '  <td>  ' . $rowdis[1] . '   </td> ';
        }
        echo ' </tr> ';
      }
      '


     </tbody>
        </table> 






</div>
';
    }



    if (isset($_POST['addapp1'])) {
      echo '
<div class = ""><div class = "how1">

<br><br>
      <center>

<h2><font color="white">Add Applicant to Shortlist</font> </h2>
<br><br>
<form action = "" method = "POST"><br>



 <div class="form-group" >
        <label class="form-label"> Project  Title : </label>
                                                     
                                                          <select class="" name="shortlisttitle"  data-placeholder="" style= "height:45px;width:60%" > ';
      echo '<option>Select shortlist Name:</option> ';

      $querypro = "SELECT * FROM shortlist_details WHERE activity ='ACTIVE' order by shortlistname ASC ";
      $resultpro = mysqli_query($link, $querypro);
      while ($rowpro = mysqli_fetch_array($resultpro)) {

        echo '<option  value="' . $rowpro[0] . '">' . $rowpro[1] . '(' . $rowpro[2] . ') </option> 
                                                   
                                                                       ';
      }
      echo '          
                                                           </select> </div>

   
<input type = "text" name = "shadowE" value = "' . $rowx[0] . '">

       
     <button type="button" name = "addtoshortlistbtn" id = "addtoshortlistbtn" class="buttton btn-default">
      <span class="glyphicon glyphicon-edit" ></span> ADD
   </button>
     
     
<table id="example" class="table" style="width:100%">
            <thead>
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
            <th> Action </th>

             </tr>   
            </thead>

            <tbody> 
';


      $queryx = "SELECT * FROM employees WHERE actionpoint <> 'BLACKLISTED' AND actionpoint <> 'REJECTED' AND actionpoint <> 'SHORTLISTED'";
      $resultx = mysqli_query($link, $queryx);
      while ($rowx = mysqli_fetch_row($resultx)) {

        echo ' <tr> ';
        echo '  <td>  ' . $rowx[4] . '   </td> ';
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

        echo '<td> <form action = "" method = "POST">
<input type = "hidden" name = "shadowE" value = "' . $rowx[0] . '">

       
     <button type="submit" name = "addtoshortlistbtn" id = "addtoshortlistbtn1" class="btn btn-default">
      <span class="glyphicon glyphicon-edit" ></span> ADD
    </button>

  
    ';


        echo '</form></td>';




        echo ' </tr> ';
      }
      '


     </tbody>
        </table> 

  







</form>
';
      echo '</center>
                  <!--- laman -->
                        </div>     </div>
             
';
    }




    if (isset($_POST['addtoshortlistbtn1'])) {

      $kekelpogi1 = "Shortlist Title and Employee Added";
    }





    if (isset($_POST['shortlisttitle'])) {
      echo '
<div class="body50100">
<div class = "">

<br><br>
      <center>

<h2><font color="black"> Shortlist Title Creation</font> </h2>
<br><br>
<form action = "" method = "POST"><br>


                                                      <div class="form-group" >
                                                            <label class="form-label"> Project  Title : </label>
                                                     
                                                          <select class="form-group" name="projecttitle"  data-placeholder="" style= "height:45px;width:60%" > ';
      echo '<option>Select Project:</option> ';

      $querypro = "SELECT * FROM Projects where end_date >= '$datenow1' order by project_title ASC ";
      $resultpro = mysqli_query($link, $querypro);
      while ($rowpro = mysqli_fetch_array($resultpro)) {

        echo '<option  value="' . $rowpro[0] . '">' . $rowpro[1] . '(' . $rowpro[2] . ')' . $rowpro[5] . ' </option> 
                                                   
                                                                       ';
      }
      echo '          
                                                           </select> </div>
                                                          
      

<br>

                                                      <div class="form-group" >
                                                            <label class="form-label">Shortlist Name :</label>
                                                          <input type="text" name = "newshortlist" value= "" class="form-group"  placeholder="New Shorlist Name" style= "height:45px;width:60%;">
                                                      </div>

    <input type = "submit" name = "createshortlist" value = "Create Shortlist" class="btn-info btn-lg" style = "font-size:15;width: 200px;height: 50px">
    <input type = "submit" name = "cancel" value = "Cancel" class="btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px">
    </form>
    

';
      //  $kekelpogi="Shortlist title created" ;
      echo '</center>
                  <!--- laman -->
                        </div>     </div>
             
';
    }




    if (isset($_POST['createshortlist'])) {
      $dtnow = date("m/d/Y");

      $projecttitle1 = $_POST['projecttitle'];
      $newshortlist1 = $_POST['newshortlist'];


      if (strlen($projecttitle1) == 0 || strlen($newshortlist1) == 0) {
        $kekelpogi = "Fields must be Filled";
      } else {
        $querymo = "SELECT * FROM Projects where id='$projecttitle1' ";
        $resultmo = mysqli_query($link, $querymo);
        while ($rowmo = mysqli_fetch_array($resultmo)) {
          $project_t = $rowmo[1];
          $client_t = $rowmo[2];
        }

        $queryns = "select * from shortlist_details WHERE shortlistname = '$newshortlist1' ";
        $resultns = mysqli_query($link, $queryns);

        if (mysqli_num_rows($resultns) == 0) {
          // kapag wala pang user name na kaparehas

          $query3 = "INSERT INTO shortlist_details(shortlistname,project,client,datecreated,activity) VALUES('$newshortlist1','$project_t','$client_t','$dtnow','ACTIVE')";
          mysqli_query($link, $query3);
          $kekelpogi = "Shortlist Created";
        } else {
          $kekelpogi = "unable to create shortlist, name not unique !";
        }
      }
    }






    if (isset($_POST['databaselist'])) {

    ?>

      <div class="how2s" >
        <!-- <form action="" method="POST">
          <button class="submit" class="btn btn-default btn-lg" Name="Back" style="float:right;font-size:15;width:200px;height:50px"><span>Close Report</span></button>

        </form> -->
        <div class="cd-content-wrapper container-fluid">
          <div class="text-component text-center container-fluid">
            <!--- laman -->
            <div class="container">
            <h2 class="fs-2">Applicant Database</h2>
            <table class="table table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end" id="example" style="width:100%">
              <thead style="background-color: aqua !important;">
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
                  <th> Action </th>

                </tr>
              </thead>

              <tbody>

                <?php
                $queryx = "SELECT *, 
                DATE_FORMAT(policed, '%M %d, %Y') AS police_exp,
                DATE_FORMAT(brgyd, '%M %d, %Y') barangay, 
                DATE_FORMAT(nbid, '%M %d, %Y') NBI,
                DATE_FORMAT(birthday, '%M %d, %Y') birthday
                FROM employees WHERE actionpoint <> 'BLACKLISTED' AND actionpoint <> 'REJECTED' AND actionpoint <> 'SHORTLISTED'";
                $resultx = mysqli_query($link, $queryx);
                while ($rowx = mysqli_fetch_assoc($resultx)) {
                  echo ' <tr> ';
                  echo '  <td>  ' . $rowx['appno'] . '   </td> ';
                  echo '  <td>  ' . $rowx['lastnameko'] . '   </td> ';
                  echo '  <td> ' . $rowx['firstnameko'] . '   </td> ';
                  echo '  <td> ' . $rowx['mnko'] . '   </td> ';
                  echo '  <td> ' . $rowx['sssnum'] . '   </td> ';
                  echo '  <td> ' . $rowx['pagibignum'] . '   </td> ';
                  echo '  <td> ' . $rowx['phnum'] . '   </td> ';
                  echo '  <td> ' . $rowx['tinnum'] . '   </td> ';
                  echo '  <td> ' . $rowx['police_exp'] . '   </td> ';
                  echo '  <td> ' . $rowx['barangay'] . '   </td> ';
                  echo '  <td> ' . $rowx['NBI'] . '   </td> ';
                  echo '  <td> ' . $rowx['psa'] . '   </td> ';
                  echo '  <td> ' . $rowx['birthday'] . '   </td> ';
                  echo '  <td> ' . $rowx['peraddress'] . '   </td> ';


                  echo '<td> <form action = "" method = "POST">
<input type = "hidden" name = "shadowE" value = "' . $rowx['id'] . '">

    <button type="submit" name = "Editbtn" class="btn btn-default btn-sm">
      <span class="glyphicon glyphicon-edit" ></span> Edit
    </button>
                  &nbsp; &nbsp;
    <button type="submit" name = "blackbtn" class="btn btn-default btn-sm">
      <span class="glyphicon glyphicon-edit" ></span> Black List
    </button>

  
    ';


                  echo '</form></td>';




                  echo ' </tr> ';
                }
                ?>

              </tbody>
            </table>
            </div>
          </div>
          <!--- laman -->
        </div>
      </div> <!-- .content-wrapper -->


      <?php


    }

















    if (isset($_POST['Editbtn'])) {

      $idshadow = $_POST['shadowE'];


      $queryted = "SELECT * FROM employees WHERE id = '$idshadow'";
      $resulted = mysqli_query($link, $queryted);
      while ($rowed = mysqli_fetch_array($resulted)) { ?>

        <div class="cd-content-wrapper container">
          <div class="">
            <!--- laman -->
            <form action="" method="POST" class="form-group row">
              <center>
                <img src="' . $rowed[2] . '" alt="" style="width:200px;height:200px;">
              </center>
          </div>

          <div class="form-group mt-3">
            <label class="form-label">Source :</font></label>
            <select class="form-select cbo" name="source" value="<?php $rowed[5] ?>" data-placeholder="Select Source" style="height:45px;width:250px" required> ;

              <?php
              echo '<option>' . $rowed[5] . '</option>';
              $querys = "SELECT * FROM sources";
              $results = mysqli_query($link, $querys);
              while ($rows = mysqli_fetch_array($results)) {
                echo '<option value="' . $rows[1] . '">' . $rows[1] . '</option>';
              }
              ?>
            </select>
          </div>

          <div class="form-group mt-3 col-md-6">
            <label class="form-label">Last Name:</font></label>
            <input type="text" required name="lastnameko" value="<?php $rowed[6] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>

          <div class="form-group mt-3 col-md-6">
            <label class="form-label">First Name:</font></label>
            <input type="text" required name="firstnameko" value="<?php $rowed[7] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>

          <div class="form-group mt-3 col-md-6">
            <label class="form-label">Middle Name:</font></label>
            <input type="text` required" name="mnko" value="<?php $rowed[8] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">Extension Name:</font></label>
            <input type="text" required name="extnname" value="<?php $rowed[9] ?>" maxlength="5" class="form-control" placeholder="" style="height:45px;width:20%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">Present Address:</font></label>
            <input type="text" required name="paddress" value="<?php $rowed[10] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">Region :</font></label>
            <select class="form-select cbo" name="regionn" id="regionn" data-placeholder="Select User type" style="height:45px;width:50%"> ;

              <?php
              echo '<option>Select Region:</option> ';
              $queryrg = "SELECT * FROM region";
              $resultrg = mysqli_query($link, $queryrg);
              while ($rowrg = mysqli_fetch_array($resultrg)) {
                echo '<option  value="' . $rowrg[3] . '">' . $rowrg[2] . '</option>';
              }
              ?>
            </select>
          </div>

          <div class="form-group mt-3">
            <label class="form-label">City : </font></label>
            <select class="form-select" name="cityn" id="cityn" data-placeholder="Select City" style="height:45px;width:50%"></select>
          </div>


          <div class="form-group mt-3">
            <label class="form-label">Permanent Address </font></label>
            <input type="text" required name="peraddress" value="<?php $rowed[13] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">Date of Birth </font></label>
            <input type="date" required name="birthday" value="<?php $rowed[14] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">Age </font></label>
            <input type="text" required name="agen" id="agen" value="<?php $rowed[15] ?>" class="form-control" placeholder="" style="height:45px;width:30%;" readonly>
          </div>

          <div class="form-group mt-3">
            <label class="form-label">Gender </font></label>
            <select class="form-select cbo" name="gendern" value="<?php $rowed[16] ?>" data-placeholder="Select Gendert " style="height:45px;width:50%"> ;
              <?php
              echo '<option>' . $rowed[16] . '</option> ';
              $querytg = "SELECT * FROM gender";
              $resultg = mysqli_query($link, $querytg);
              while ($rowg = mysqli_fetch_array($resultg)) {
                echo '<option  value="' . $rowg[1] . '">' . $rowg[1] . ' </option> ';
              }
              ?>
            </select>
          </div>

          <div class="form-group mt-3">
            <label class="form-label">Civil Status </font></label>
            <select class="form-select cbo" name="civiln" value="<?php $rowed[17] ?>" data-placeholder="" style="height:45px;width:50%"> ;
              <?php
              echo '<option>' . $rowed[17] . '</option> ';
              $queryt = "SELECT * FROM tax_status";
              $resultt = mysqli_query($link, $queryt);
              while ($rowtt = mysqli_fetch_array($resultt)) {
                echo '<option  value="' . $rowtt[2] . '">' . $rowtt[2] . ' </option> ';
              }
              ?>
            </select>
          </div>

          <div class="form-group mt-3">
            <label class="form-label">Cell Phone Number </font></label>
            <input type="text" required name="cpnum" value="<?php $rowed[18] ?>" class="form-control" placeholder="" style="height:45px;width:30%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">landline </font></label>
            <input type="text" required name="landline" value="<?php $rowed[19] ?>" class="form-control" placeholder="" style="height:45px;width:30%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">Email Address </font></label>
            <input type="text" required name="emailadd" value="<?php $rowed[20] ?>" class="form-control" placeholder="" style="height:45px;width:30%;">
          </div>
          <div class="form-group mt-3">
            <label class="form-label">Desired Position </font></label>
            <select class="form-select cbo" name="despo" value="<?php $rowed[21] ?>" data-placeholder="" style="height:45px;width:50%"> ;
              <?php
              echo '<option>' . $rowed[21] . '</option> ';
              $queryjt = "SELECT * FROM job_title ";
              $resultjt = mysqli_query($link, $queryjt);
              while ($rowjt = mysqli_fetch_array($resultjt)) {
                echo '<option  value="' . $rowjt[2] . '">' . $rowjt[2] . ' </option> ';
              }
              ?>
            </select>
          </div>

          <div class="form-group mt-3">
            <label class="form-label">Classification of Applicant </font></label>
            <select class="form-select cbo" name="classn" value="<?php $rowed[22] ?>" data-placeholder="" style="height:45px;width:50%"> ;
              <?php
              echo '<option>' . $rowed[22] . '</option> ';
              $queryca = "SELECT * FROM classifications";
              $resultca = mysqli_query($link, $queryca);
              while ($rowca = mysqli_fetch_array($resultca)) {
                echo '<option  value="' . $rowca[1] . '">' . $rowca[1] . ' </option> ';
              }
              ?>
            </select>
          </div>

          <div class="form-group mt-3">
            <label class="form-label">Identification Marks </font></label>
            <select class="form-select cbo" name="idenn" value="<?php $rowed[23] ?>" data-placeholder="" style="height:45px;width:50%"> ;
              <?php
              echo '<option>' . $rowed[23] . '</option> ';
              $queryide = "SELECT * FROM distinguishing_qualification_marks";
              $resultide = mysqli_query($link, $queryide);
              while ($rowider = mysqli_fetch_array($resultide)) {
                echo '<option  value="' . $rowider[1] . '">' . $rowider[1] . ' </option> ';
              }
              ?>
            </select>
          </div>

          <div class="form-group mt-3">
            <label class="form-label">SSS:</font></label>
            <input type="text" required name="sssnum" value="<?php $rowed[24] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">PAG-IBIG:</font></label>
            <input type="text" required name="pagibignum" value="<?php $rowed[25] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">PHILHEALTH:</font></label>
            <input type="text required" name="phnum" value="<?php $rowed[26] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">TIN:</font></label>
            <input type="text" required name="tinnum" value="<?php $rowed[27] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">POLICE:</font></label>
            <input type="date" required name="policed" value="<?php $rowed[28] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">BRGY:</font></label>
            <input type="date required" name="brgyd" value="<?php $rowed[29] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">NBI:</font></label>
            <input type="date" required name="nbid" value="<?php $rowed[30] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">PSA:</font></label>
            <select class="form-select cbo" name="psa" value="<?php $rowed[31] ?>" data-placeholder="" style="height:45px;width:60%"> ;
              <option><?php $rowed[31] ?></option>
              <option value="With">With</option>
              <option value="Without">Without</option>
            </select>
          </div>

          <div class="form-group mt-3">
            <label class="form-label">Emergency Contact Person:</font></label>
            <input type="text" required name="e_person" value="<?php $rowed[38] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">Emergency Contact Address:</font></label>
            <input type="text" required name="e_address" value="<?php $rowed[39] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">Emergency Contact Number:</font></label>
            <input type="text" required name="e_contact" value="<?php $rowed[40] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>

          <div class="form-group mt-3">
            <label class="form-label">REMARKS:</font></label>
            <input type="text" required name="remarks" value="<?php $rowed[32] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          </div>


          <input type="hidden" name="shadowEdit" value="<?php $rowed[0] ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          <button <input type="submit" name="updateit" value="" class="btn btn-primary btn-lg" style="vertical-align:middle">Update It</button>
          <button <input type="submit" name="Cancel" value="" class="btn btn-dark btn-lg" style="vertical-align:middle">Cancel</button>

          </form>





          <!--- laman -->
        </div>
        </div> <!-- .content-wrapper -->';
      <?php    }
    }




    if (isset($_POST['applicant'])) { ?>
      <div class="cd-content-wrapper">
        <div class="text-component text-center">
          <!--- laman -->
          <div class="container">
            <div class="row">

              <div class="home mb-5 cameras d-flex justify-content-center align-items-center">
                <div class="body5010p col-md-12 mb-5" id="my_camera"></div>
              </div>

              <br><br><br><br><br><br>
              <div class="buttonsCamera mt-5">
                <div class="col-md-12 mt-5">
                  <button class="btn btn-success btn-sm" onclick="myFunctioncam()">Display Camera</button><br><br>
                  <form method="POST" action="storeImage.php">
                    <input type=button class="btn btn-success btn-sm" value="Take Photo" onClick="take_snapshot()">
                    <input type=Submit class="btn btn-success btn-sm" Value="Submit">
                    <hr>
                    <h2 class="a">
                      <div class="container">
                        <label for="text">
                          <font color="Black" size="6">
                            <font color="red">*</font>Image Capture
                          </font>
                        </label> <br>
                        <input type="hidden" name="image" class="image-tag">
                        <div id="results">Your captured image will appear here...</div>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          </h2>

          <!---  laman -->
        </div>
      </div> <!-- .content-wrapper -->





    <?php }



    if (isset($_POST['blacklistyes'])) {

      $id = $_POST['shadowblacklist'];
      $blacklistreason1 = $_POST['blacklistreason'];
      $datenow = date("m/d/Y h:i:s A");
      $actionpoint1 = "BLACKLISTED";

      $query4 = "UPDATE employees SET actionpoint='$actionpoint1', reasonofaction='$blacklistreason1', dateofaction='$datenow' WHERE id = '$id'";
      mysqli_query($link, $query4);

      $queryem = "SELECT * FROM employees WHERE id = '$id'";
      $resultem = mysqli_query($link, $queryem);
      while ($rowem = mysqli_fetch_array($resultem)) {

        $query5 = "INSERT INTO blacklist_history
      (tracking,photopath,dapplied,appno,source,lastnameko,firstnameko,mnko,extnname,paddress,cityn,regionn,peraddress,birthday,age,gendern,civiln,cpnum,landline,emailadd,despo,classn,idenn,sssnum,pagibignum,phnum,tinnum,policed,brgyd,nbid,psa,remarks,actionpoint,reasonofaction,dateofaction)
      VALUES
      ('$rowem[1]','$rowem[2]','$rowem[3]','$rowem[4]','$rowem[5]','$rowem[6]','$rowem[7]','$rowem[8]','$rowem[9]','$rowem[10]','$rowem[11]','$rowem[12]','$rowem[13]','$rowem[14]','$rowem[15]','$rowem[16]','$rowem[17]','$rowem[18]','$rowem[19]','$rowem[20]','$rowem[21]','$rowem[22]','$rowem[23]','$rowem[24]','$rowem[25]','$rowem[26]','$rowem[27]','$rowem[28]','$rowem[29]','$rowem[30]','$rowem[31]','$rowem[32]','$actionpoint1','$blacklistreason1','$datenow')
      ";
        mysqli_query($link, $query5);
      }

      $kekelpogi = "Black list done !";
    }









    if (isset($_POST['updateit'])) {


      $id1 = $_POST['shadowEdit'];

      //$photoko2=$_SESSION["photoko"];
      // $dapplied1 = $_POST['dapplied'];
      // $appno1 = $_POST['appnoko'];
      $source1 = $_POST['source'];
      $lastnameko1 = strtoupper($_POST['lastnameko']);
      $firstnameko1 = strtoupper($_POST['firstnameko']);
      $mnko1 = strtoupper($_POST['mnko']);
      $extnname1 = strtoupper($_POST['extnname']);
      $paddress1 = strtoupper($_POST['paddress']);
      $cityn1 = $_POST['cityn'];
      $regionn1 = $_POST['regionn'];

      //$resultct=mysqli_query("SELECT * FROM city WHERE citymunDesc = '$cityn1'");
      //    while($rowct=mysqli_fetch_array($resultct))
      //{
      //$cityn2 = $rowct[3];
      //}




      //    $resultregi=mysqli_query("SELECT * FROM region WHERE regCode = '$cityn2'");
      //    while($rowregi=mysqli_fetch_array($resultregi))
      //{
      //$regionn1 = $rowregi[2];
      //}






      //  $regionn1 = $_POST['regionn'];
      $peraddress1 = strtoupper($_POST['peraddress']);
      $birthday1 = $_POST['birthday'];

      $dateOfBirth = $birthday1;
      $today = date("Y-m-d");
      //echo $birthday1;
      //ECHO $today;
      $diff = date_diff(date_create($dateOfBirth), date_create($today));
      //echo "Age is ".$diff->format("%y");
      $age1 = $diff->format("%y");


      $datebirth = date_create($birthday1);
      $birthday1a = date_format($datebirth, "m/d/Y");



      //  $age1 = $_POST['agen'];
      $gendern = $_POST['gendern'];
      $civiln1 = $_POST['civiln'];
      $cpnum1 = $_POST['cpnum'];
      $landline1 = $_POST['landline'];
      $emailadd1 = $_POST['emailadd'];
      $despo1 = $_POST['despo'];
      $classn1 = $_POST['classn'];
      $idenn1 = $_POST['idenn'];
      $sssnum1 = $_POST['sssnum'];
      $pagibignum1 = $_POST['pagibignum'];
      $phnum1 = $_POST['phnum'];
      $tinnum1 = $_POST['tinnum'];
      $e_person1 = $_POST['e_person'];
      $e_address1 = $_POST['e_address'];
      $e_contact1 = $_POST['e_contact'];

      $policed1x = $_POST['policed'];
      $datepol = date_create($policed1x);
      $policed1 = date_format($datepol, "m/d/Y");




      $brgyd1x = $_POST['brgyd'];
      $datebrgy = date_create($brgyd1x);
      $brgyd1 = date_format($datebrgy, "m/d/Y");



      $nbid1x = $_POST['nbid'];
      $datenbi = date_create($nbid1x);
      $nbid1 = date_format($datenbi, "m/d/Y");


      $psa1 = $_POST['psa'];
      $remarks1 = $_POST['remarks'];


      $query6 = "UPDATE employees

  SET
  source='$source1',
  lastnameko='$lastnameko1',
  firstnameko='$firstnameko1',
  mnko='$mnko1',
  extnname='$extnname1',
  paddress='$paddress1',
  cityn='$cityn1',
  regionn='$regionn1',
  peraddress='$peraddress1',
  birthday='$birthday1',
  age='$age1',
  gendern='$gendern',
  civiln='$civiln1',
  cpnum='$cpnum1',
  landline='$landline1',
  emailadd='$emailadd1',
  despo='$despo1',
  classn='$classn1',
  idenn='$idenn1',
  sssnum='$sssnum1',
  pagibignum='$pagibignum1',
  phnum='$phnum1',
  tinnum='$tinnum1',
  policed='$policed1x',
  brgyd='$brgyd1x',
  nbid='$nbid1x',
  psa='$psa1',
  e_person='$e_person1',
  e_address='$e_address1',
  e_number='$e_contact1',

  remarks='$remarks1'

    
    WHERE
    id = '$id1'
    ";
      mysqli_query($link, $query6);
      //echo $id1;
      $kekelpogi = "Update Successful!";
    }
    //VALUES
    //     (,'$photoko2','$dapplied1','$appno1',,

    //tracking,
    //     photopath,
    //     dapplied,
    //     appno,

    if (isset($_POST['next'])) {



      $photoko2 = $_SESSION["photoko"];
      $dapplied1 = $_POST['dapplied'];
      $appno1 = $_POST['appnoko'];
      $source1 = $_POST['source'];
      $lastnameko1 = strtoupper($_POST['lastnameko']);
      $firstnameko1 = strtoupper($_POST['firstnameko']);
      $mnko1 = strtoupper($_POST['mnko']);
      $extnname1 = strtoupper($_POST['extnname']);
      $paddress1 = strtoupper($_POST['paddress']);
      $cityn1 = $_POST['cityn'];
      $regionn1 = $_POST['regionn'];
      //$resultct=mysqli_query("SELECT * FROM city WHERE citymunDesc = '$cityn1'");
      //  while($rowct=mysqli_fetch_array($resultct))
      //{
      //$cityn2 = $rowct[3];
      //}




      //  $resultregi=mysqli_query("SELECT * FROM region WHERE regCode = '$cityn2'");
      // while($rowregi=mysqli_fetch_array($resultregi))
      //{
      //$regionn1 = $rowregi[2];
      //}


      //echo $regionn1;

      $peraddress1 = strtoupper($_POST['peraddress']);
      $birthday1 = $_POST['birthday'];


      $dateOfBirth = $birthday1;
      $today = date("Y-m-d");
      //echo $birthday1;
      //ECHO $today;
      $diff = date_diff(date_create($dateOfBirth), date_create($today));
      //echo "Age is ".$diff->format("%y");
      $age1 = $diff->format("%y");


      $datebirth = date_create($birthday1);
      $birthday1a = date_format($datebirth, "m/d/Y");

      $gendern = $_POST['gendern'];
      $civiln1 = $_POST['civiln'];
      $cpnum1 = $_POST['cpnum'];
      $landline1 = $_POST['landline'];
      $emailadd1 = $_POST['emailadd'];
      $despo1 = $_POST['despo'];
      $classn1 = $_POST['classn'];
      $idenn1 = $_POST['idenn'];
      $sssnum1 = $_POST['sssnum'];
      $pagibignum1 = $_POST['pagibignum'];
      $phnum1 = $_POST['phnum'];
      $tinnum1 = $_POST['tinnum'];
      $e_person1 = $_POST['e_person'];
      $e_address1 = $_POST['e_address'];
      $e_contact1 = $_POST['e_contact'];

      $policed1x = $_POST['policed'];
      $datepol = date_create($policed1x);
      $policed1 = date_format($datepol, "m/d/Y");




      $brgyd1x = $_POST['brgyd'];
      $datebrgy = date_create($brgyd1x);
      $brgyd1 = date_format($datebrgy, "m/d/Y");



      $nbid1x = $_POST['nbid'];
      $datenbi = date_create($nbid1x);
      $nbid1 = date_format($datenbi, "m/d/Y");



      $psa1 = $_POST['psa'];
      $remarks1 = $_POST['remarks'];

      $querytemp1 = "select * from employees WHERE lastnameko = '$lastnameko1' and firstnameko ='$firstnameko1' and mnko='$mnko1'";
      $resultempl = mysqli_query($link, $querytemp1);

      if (mysqli_num_rows($resultempl) == 0) {

        $query7 = "INSERT INTO employees
      (tracking,photopath,dapplied,appno,source,lastnameko,firstnameko,mnko,extnname,paddress,cityn,regionn,peraddress,birthday,age,gendern,civiln,cpnum,landline,emailadd,despo,classn,idenn,sssnum,pagibignum,phnum,tinnum,policed,brgyd,nbid,psa,remarks,e_person,e_address,e_number)
      VALUES
      ('$appno1','$photoko2','$dapplied1','$appno1','$source1','$lastnameko1','$firstnameko1','$mnko1','$extnname1','$paddress1','$cityn1','$regionn1','$peraddress1','$birthday1','$age1','$gendern','$civiln1','$cpnum1','$landline1','$emailadd1','$despo1','$classn1','$idenn1','$sssnum1','$pagibignum1','$phnum1','$tinnum1','$policed1x','$brgyd1x','$nbid1x','$psa1','$remarks1','$e_person1','$e_address1','$e_contact1')
      ";
        mysqli_query($link, $query7);

        $kekelpogi = "Successful!";
      } else {
        $kekelpogi = "Applicant is in Database!";
      }

      //     header("location:index.php");
    }


    if (isset($_POST['shortlist'])) {

      if (!isset($_SESSION["photoko"]) || (trim($_SESSION["photoko"]) == '')) {
        // do stuff
        $kekelpogi = "Take Photo First";
      } else {





        $querytracking = "SELECT * FROM track WHERE id = '1'";
        $resulttracking = mysqli_query($link, $querytracking);
        while ($rowtr = mysqli_fetch_array($resulttracking))

          //echo $rowtr[1]+1;
          $newtracking = $rowtr[1] + 1;
        //echo $newtracking;

        //mysqli_query("INSERT INTO fulldata
        //              (tracking,rf_p,ce_p,po_p,ar_p,avp_p,d1_p,d2_p,d3_p,d4_p,d5_p)
        //             VALUES
        //            ('$newtracking','0','0','0','0','0','0','0','0','0','0')
        //           ");


        $query8 = "UPDATE track SET appno = '$newtracking' WHERE id = '1'";
        mysqli_query($link, $query8);




        $datenow = date("m/d/Y h:i:s A");
        echo '

         <div class="cd-content-wrapper">
          
                       <form action = "" method = "POST">
                    
                       <div class="">
                       <center>
                          <img src="' . $_SESSION["photoko"] . '" alt="" style="width:200px;height:200px;">
                          </center>
                          </div>
          
                                                     <div class="form-group">

                                                             <label class="form-label">Date Applied : </font></label>   
                                                             <input type="text" name = "dapplied" class="form-control"  value= "' . $datenow . '"   placeholder="" style= "height:45px;width:45%;" readonly>
                                                              <label class="form-label">Applicant Number : </font></label> 
                                                             <input type="text" name = "appnoko"  value= "' . $newtracking . '" class="form-control"  placeholder="" style= "height:45px;width:45%;" readonly>
                                                      </div>

                                                       <div class="form-group">
                                                      <label class="form-label">Source :</font></label>
                                                      <select class="form-control cbo" name="source"  data-placeholder="Select Source" style= "height:45px;width:250px" > ;      
                                                           
                                                           ';
        echo '<option>Select Source</option>';
        $query9 = "SELECT * FROM sources";
        $results = mysqli_query($link, $query9);
        while ($rows = mysqli_fetch_array($results)) {
          echo '<option value="' . $rows[1] . '">' . $rows[1] . '</option>';
        }
        echo '          
                                                           </select>
                                                    </div>

                                                      <div class="form-group" >
                                                            <label class="form-label">Last Name:</font></label>
                                                          <input type="text" name = "lastnameko" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                                      </div>
                                                      
                                                      <div class="form-group" >
                                                            <label class="form-label">First Name:</font></label>
                                                          <input type="text" name = "firstnameko" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                                      </div>

                                                      <div class="form-group" >
                                                            <label class="form-label">Middle Name:</font></label>
                                                          <input type="text`" name = "mnko"  class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                                      </div>
                                                      
                                                      <div class="form-group" >
                                                            <label class="form-label">Extension Name:</font></label>
                                                          <input type="text" name = "extnname" maxlength="5" class="form-control"  placeholder="" style= "height:45px;width:20%;">
                                                      </div>
                                                      
                                                      <div class="form-group" >
                                                            <label class="form-label">Present Address:</font></label>
                                                          <input type="text" name = "paddress"  class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                                      </div>



                                                        <div class="form-group">
                                                      <label class="form-label">Region :</font></label>
                                                      <select class="form-control cbo" name="regionn" id="regionn"  data-placeholder="Select User type" style= "height:45px;width:50%" > ;      
                                                           
                                                           ';
        echo '<option>Select Region:</option> ';
        $queryrg = "SELECT * FROM region";
        $resultrg = mysqli_query($link, $queryrg);
        while ($rowrg = mysqli_fetch_array($resultrg)) {
          echo '<option  value="' . $rowrg[3] . '">' . $rowrg[2] . '</option>';
        }
        echo '          
                                                           </select> 
                                                    </div>



                                                      
                                                          <div class="form-group" >
                                                            <label class="form-label">City : </font></label>
                                                          <select class="form-control" name="cityn" id="cityn"  data-placeholder="Select City"  style= "height:45px;width:50%" > ;      
                                                           
                                                               
                                                           </select>
                                                    </div>

                                                  
                                                    
                                                  

                                                      <div class="form-group" >
                                                            <label class="form-label">Permanent Address </font></label>
                                                          <input type="text" name = "peraddress"  class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                                      </div>  

                                                      <div class="form-group" >
                                                            <label class="form-label">Date of Birth </font></label>
                                                          <input type="date" name = "birthday"  class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                                      </div>

                                                      <!--<div class="form-group" >
                                                            <label class="form-label">Age </font></label>
                                                          <input type="text" name = "age" id ="age"  class="form-control"  placeholder="" style= "height:45px;width:30%;">
                                                      </div>-->

                                                      <div class="form-group" >
                                                            <label class="form-label">Gender </font></label>
                                                  <select class="form-control cbo" name="gendern"  data-placeholder="Select Gendert " style= "height:45px;width:50%" > ;      
                                                           
                                                           ';
        echo '<option>Select Gender</option> ';
        $querytg = "SELECT * FROM gender";
        $resultg = mysqli_query($link, $querytg);
        while ($rowg = mysqli_fetch_array($resultg)) {
          echo '<option  value="' . $rowg[1] . '">' . $rowg[1] . ' </option> ';
        }
        echo '          
                                                           </select>
                                                    </div>
                                                          
                                                      <div class="form-group" >
                                                            <label class="form-label">Civil Status </font></label>
                                                      <select class="form-control cbo" name="civiln"  data-placeholder="" style= "height:45px;width:50%" > ;      
                                                           
                                                           ';
        echo '<option>Select Civil Status:</option> ';
        $queryy = "SELECT * FROM tax_status";
        $resultt = mysqli_query($link, $queryy);
        while ($rowtt = mysqli_fetch_array($resultt)) {
          echo '<option  value="' . $rowtt[2] . '">' . $rowtt[2] . ' </option> ';
        }
        echo '          
                                                           </select>
                                                    </div>
                                                      


                                                      <div class="form-group" >
                                                            <label class="form-label">Cell Phone Number </font></label>
                                                          <input type="text" name = "cpnum"  class="form-control"  placeholder="" style= "height:45px;width:30%;">
                                                      </div>  
                                                      
                                                      <div class="form-group" >
                                                            <label class="form-label">landline </font></label>
                                                          <input type="text" name = "landline"  class="form-control"  placeholder="" style= "height:45px;width:30%;">
                                                      </div>  

                                                      <div class="form-group" >
                                                            <label class="form-label">Email Address </font></label>
                                                          <input type="text" name = "emailadd"  class="form-control"  placeholder="" style= "height:45px;width:30%;">
                                                      </div>  
                                                      <div class="form-group" >
                                                            <label class="form-label">Desired Position </font></label>
                                                            <select class="form-control cbo" name="despo"   data-placeholder="" style= "height:45px;width:50%" > ;      
                                                           
                                                           ';
        echo '<option>Select job title:</option> ';
        $querytjt = "SELECT * FROM job_title ";
        $resultjt = mysqli_query($link, $querytjt);
        while ($rowjt = mysqli_fetch_array($resultjt)) {
          echo '<option  value="' . $rowjt[2] . '">' . $rowjt[2] . ' </option> ';
        }
        echo '          
                                                           </select>
                                                    </div>

                                                      <div class="form-group" >
                                                            <label class="form-label">Classification of Applicant </font></label>
                                                               <select class="form-control cbo" name="classn"   data-placeholder="" style= "height:45px;width:50%" > ;      
                                                           
                                                           ';
        echo '<option>Select Classification:</option> ';
        $querytc = "SELECT * FROM classifications";
        $resultc = mysqli_query($link, $querytc);
        while ($rowc = mysqli_fetch_array($resultc)) {
          echo '<option  value="' . $rowc[1] . '">' . $rowc[1] . ' </option> ';
        }
        echo '          
                                                           </select> 
                                                           </div>

                                                      <div class="form-group" >
                                                            <label class="form-label">Identification Marks </font></label>
                                                                <select class="form-control cbo" name="idenn"   data-placeholder="" style= "height:45px;width:50%"> ;      
                                                           
                                                           ';
        echo '<option>Select Identification Marks:</option> ';
        $querytide = "SELECT * FROM distinguishing_qualification_marks";
        $resultide = mysqli_query($link, $querytide);
        while ($rowider = mysqli_fetch_array($resultide)) {
          echo '<option  value="' . $rowider[1] . '">' . $rowider[1] . ' </option> ';
        }
        echo  '          
                                                           </select> 
                                                           </div>

                  
                                     
    
                                


                                                   


       
                                     <div class="form-group" >
                                     <label class="form-label">SSS:</font></label>
                                     <input type="text" name = "sssnum" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                     </div>

                                     <div class="form-group" >
                                     <label class="form-label">PAG-IBIG:</font></label>
                                     <input type="text" name = "pagibignum" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                     </div>
                                     
                                     <div class="form-group" >
                                     <label class="form-label">PHILHEALTH:</font></label>
                                     <input type="text" name = "phnum" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                     </div>
                                     
                                     <div class="form-group" >
                                     <label class="form-label">TIN:</font></label>
                                     <input type="text" name = "tinnum" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                     </div>
                                     
                                     <div class="form-group" >
                                     <label class="form-label">POLICE:</font></label>
                                     <input type="date" name = "policed" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                     </div>
                                     
                                     <div class="form-group" >
                                     <label class="form-label">BRGY:</font></label>
                                     <input type="date" name = "brgyd" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                     </div>
                                     
                                     <div class="form-group" >
                                     <label class="form-label">NBI:</font></label>
                                     <input type="date" name = "nbid" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                     </div>
                                     
                                     <div class="form-group" >
                                     <label class="form-label">PSA:</font></label>
                                    
                                          <select class="form-control cbo" name="psa"   data-placeholder="" style= "height:45px;width:60%"> ;      
                                                           
                                                           ';
        echo '<option>Select One:</option> 
                                                         <option value="With">With</option>
                                                         <option value="Without">Without</option>
           
                                                           </select> 
                                                           </div>
                                                      
         
                                     <div class="form-group" >
                                     <label class="form-label">Emergency Contact Person:</font></label>
                                     <input type="text" name = "e_person" value= "" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                     </div>
                                     
                                     <div class="form-group" >
                                     <label class="form-label">Emergency Contact Address:</font></label>
                                     <input type="text" name = "e_address" value= "" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                     </div>
                                     
                                     <div class="form-group" >
                                     <label class="form-label">Emergency Contact Number:</font></label>
                                     <input type="text" name = "e_contact" value= "" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                     </div>


                                    <div class="form-group" >
                                   <label class="form-label">REMARKS:</font></label>
                                   <input type="text" name = "remarks" class="form-control"  placeholder="" style= "height:45px;width:60%;">
                                   </div>

       
    
                     <input type = "submit" name = "next" value = "Save" class=" btn-info btn-lg" style = "height:50px;width:80%;">
                 </form>



                                      
         
                </div> <!-- .content-wrapper -->
              ';
      }
    }



    if (isset($_POST['viewdatabase'])) {
      echo '
                <div class="cd-content-wrapper">
                  <div class="text-component text-center">
<div class = "how2" style="width:100%">
            <!--- laman -->
  
   <form method="post" action="export.php">
     <input type="submit" name="export" class="btn-success" value="Export" style="float:right;font-size:15;width:200px;height:50px" />
    </form>

             <form action = "" method = "POST" style="align=left">
             <button class="" class="btn-success" Name ="Back" style="float:right;font-size:15;width:200px;height:50px"><span>Close Report</span></button>

</form>
                    <h2>Recruitment Database</h2>
         

<table id="example" class="table" style="width:100%">
            <thead>
            <tr>
            <th> Applicant No. </th>
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
          
             </tr>   
            </thead>

            <tbody> 

';
      $querytx = "SELECT * FROM employees ";
      $resultx = mysqli_query($link, $querytx);
      while ($rowx = mysqli_fetch_row($resultx)) {

        echo ' <tr> ';
        echo '  <td>  ' . $rowx[4] . '   </td> ';
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
        echo '  <td> ' . $rowx[14] . '   </td> ';
        echo '  <td> ' . $rowx[10] . '   </td> ';









        echo ' </tr> ';
      }
      echo '


     </tbody>
        </table> 

  

   


                  </div>
            <!--- laman -->
                  </div>
                </div> <!-- .content-wrapper -->
  
  ';
    }




    if (isset($_POST['blacklistr'])) {
      echo '
                <div class="cd-content-wrapper">
                  <div class="text-component text-center">
<div class = "how2" style="width:100%">
            <!--- laman -->

             <form action = "" method = "POST" style="align=left">
             <button class="submit" class="btn btn-default btn-lg" Name ="Back" style="float:right;font-size:15;width:200px;height:50px"><span>Close Report</span></button>

</form>
                    <h2>List of Black Listed</h2>
         

<table id="example" class="table" style="width:100%">
            <thead>
            <tr>
            <th> Applicant No </th>
            <th> Lastname </th>
            <th> Firstname </th>
            <th> Middlename </th>
            <th> Action </th>

             </tr>   
            </thead>

            <tbody> 

';
      $queryttx = "SELECT * FROM employees where actionpoint='BLACKLISTED'";
      $resultx = mysqli_query($link, $queryttx);
      while ($rowx = mysqli_fetch_row($resultx)) {

        echo ' <tr> ';
        echo '  <td>  ' . $rowx[4] . '   </td> ';
        echo '  <td>  ' . $rowx[6] . '   </td> ';
        echo '  <td> ' . $rowx[7] . '   </td> ';
        echo '  <td> ' . $rowx[8] . '   </td> ';

        echo '<td> <form action = "" method = "POST">
<input type = "hidden" name = "shadowEblack" value = "' . $rowx[0] . '">

       <button type="submit" name = "Editbtnblacklist" class="btn btn-default">
      <span class="glyphicon glyphicon-edit" ></span> Undo Blacklist
    </button>


  
    ';


        echo '</form></td>';




        echo ' </tr> ';
      }
      echo '


     </tbody>
        </table> 

  

     




                  </div>
            <!--- laman -->
                  </div>
                </div> <!-- .content-wrapper -->
  
  ';
    }


    if (isset($_POST['shorlistr'])) {
      echo '
                <div class="cd-content-wrapper">
                  <div class="text-component text-center">
            shortlistr
            <!--- laman -->

                    <h1>Responsive Sidebar Navigation</h1>
                    <p>👈<a href="https://codyhouse.co/gem/responsive-sidebar-navigation">Article &amp; Download</a></p>
                  
            <!--- laman -->
                  </div>
                </div> <!-- .content-wrapper -->
  ';
    }

    if (isset($_POST['additionalr'])) {
      echo '
                <div class="cd-content-wrapper">
                  <div class="text-component text-center">
            additionalr
            <!--- laman -->

                    <h1>Responsive Sidebar Navigation</h1>
                    <p>👈<a href="https://codyhouse.co/gem/responsive-sidebar-navigation">Article &amp; Download</a></p>
                  
            <!--- laman -->
                  </div>
                </div> <!-- .content-wrapper -->
  ';
    }


    ?>





    <?php


    if (isset($_POST['Editbtnblacklist'])) {

      $idshadow1 = $_POST['shadowEblack'];

      $query10 = "UPDATE employees

    SET

  actionpoint='',
  reasonofaction='',
  dateofaction=''
    
    WHERE
    id = '$idshadow1'
    ";
      $query10 = "UPDATE employees

    SET

  actionpoint='',
  reasonofaction='',
  dateofaction=''
    
    WHERE
    id = '$idshadow1'
    ";
      mysqli_query($link, $query10);

      $kekelpogi = "Blacklist reverted";
    }











    if (isset($_POST['blackbtn'])) {

      $idshadow1 = $_POST['shadowE'];

      $queryb1 = "SELECT * FROM employees WHERE id = '$idshadow1'";
      $resultbl = mysqli_query($link, $queryb1);
      while ($rowbl = mysqli_fetch_array($resultbl)) {

        echo '<div class = "how1"><div class = "many"><br> 


                   <form action = "" method = "POST"><br>
                                                  <div class="form-group" >
                                                   <label class="form-label">Are you Sure you want to Blacklist: ' . $rowbl[6] . ' ' . $rowbl[7] . ' ' . $rowbl[8] . ' </label>
                                                <br> <br><center>
                   <input type="text" name = "blacklistreason" class="form-control"  placeholder="Type reason for Blacklisting" style= "height:45px;width:90%" autofocus>
                   <br>
                   
<input type="hidden" name = "shadowblacklist" class="form-control"  value="' . $idshadow1 . '" placeholder="Type reason for Blacklisting" style= "height:45px;width:90%">
                   
                    <input type = "submit" name = "blacklistyes" value = "YES" class="btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px">
                    <input type = "submit" name = "blacklistno" value = "NO" class="btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px">
  </center>
  </div>
                    </form>

                </div></div>';
      }
    }


    ?>
















    </main> <!-- .cd-main-content -->
    <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
    <script src="assets/js/menu-aim.js"></script>
    <script src="assets/js/main.js"></script>


    <!-- Configure a few settings and attach camera -->
    <script>
      new DataTable('#example');
    </script>
    <script language="JavaScript">
      

      function take_snapshot() {
        Webcam.snap(function(data_uri) {
          $(".image-tag").val(data_uri);
          document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
        });
      }



      function myFunctioncam() {
        Webcam.set({
          width: 300,
          height: 300,
          image_format: 'jpeg',
          jpeg_quality: 90
        });

        Webcam.attach('#my_camera');
        document.getElementById("my_camera").style.visibility = "hidden";





        var x = document.getElementById("my_camera");
        if (x.style.visibility === "hidden") {
          x.style.visibility = "visible";
        } else {
          x.style.visibility = "hidden";
        }


      }

      $(document).ready(function() {
        $("#myTab a").click(function(e) {
          e.preventDefault();
          $(this).tab('show');
        });
      });





      $(document).ready(function() {
        $('#example').DataTable();
      });


      $(document).ready(function() {
        $("#e99").DataTable();
      });




      //$(document).ready(function() {
      //    var table = $('#example').DataTable();

      //    $('#example tbody').on( 'click', 'tr', function () {
      //        if ( $(this).hasClass('selected') ) {
      //            $(this).removeClass('selected');
      //        }
      //        else {
      //            table.$('tr.selected').removeClass('selected');
      //            $(this).addClass('selected');
      //        }
      //    } );

      //    $('#addtoshortlistbtn').click( function () {
      //        table.row('.selected').remove().draw( false );
      //        document.getElementById("addtoshortlistbtn1").click();
      //    } );
      //} );







      $("#regionn").on("change", function() {

        var x_values = $("#regionn").find(":selected").val();

        $.ajax({
          url: 'ajaxregion.php',
          type: 'POST',
          //dataType:'JSON',
          data: {
            city_code: x_values
          },
          success: function(result) {

            result = JSON.parse(result);

            //Empty option on change
            var select = document.getElementById("cityn");
            var length = select.options.length;

            for (i = length - 1; i >= 0; i--) {
              select.options[i] = null;
            }
            //end

            result.forEach(function(item, index) {

              //console.log(item[2]);

              var option = document.createElement("option");
              option.text = item['city_name'];
              option.value = item['city_name'];
              var select = document.getElementById("cityn");
              select.appendChild(option);
            });
          },

          error: function(result) {
            console.log(result)
          }
        });

      });
    </script>




    <!--//========================================-->

    <!-- Modal HTML -->
    <div id="myModalmrf" class="modal fade">
      <!--<div class="howx">-->
      <div class="modal-dialog  modal-xl">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title">Report</h5>
            <button type="button" class="close" data-dismiss="modal"></button>
          </div>


          <div class="modal-body">
            <center>
              <h3>Summary Report</h3>

              <hr>
              <table id="e99" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th> FILLED BY </th>
                    <th> LOCATION </th>
                    <th> POSITION </th>
                    <th> NEEDED </thh>
                    <th> PROVIDED </th>
                    <th> RECEIVED BY: </th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  $query11 = "SELECT * FROM mrf where uid<>'' ";
                  $result = mysqli_query($link, $query11);
                  while ($row = mysqli_fetch_row($result)) {
                    $uid1 = $row[47];
                    $totalneed = $row[12] + $row[13];
                    $totalprovided = $row[43] + $row[44];

                    $query_uid = "SELECT * FROM book1 where idnya='$uid1'";
                    $result_uid = mysqli_query($link, $query_uid);
                    while ($row_uid = mysqli_fetch_row($result_uid)) {
                      $fullname = $row_uid[9];

                      if ($row[46] == "YES") {

                        echo ' <tr> ';
                        echo '  <td>  ' . $fullname . '   </td> ';
                        echo '  <td>  ' . $row[42] . '   </td> ';
                        echo '  <td>  ' . $row[10] . '   </td> ';
                        echo '  <td style=" text-align: center;">  ' . $totalneed . '   </td> ';
                        echo '  <td style=" text-align: center;">  ' . $totalprovided . '   </td> ';

                        echo ' <td> <form action = "" method = "POST">
                                                <input type = "hidden" name = "mrf_val" value = "' . $row[0] . '">
                                                       <button type="submit" name = "r_mrf" class="btn btn-default"><span class="glyphicon glyphicon-edit" ></span> Provide Shortlist</button>
                                                </form>
                                            </td>
                                   </tr> ';
                      } else {
                        echo ' <tr> ';
                        echo '  <td>  ' . $fullname . '   </td> ';
                        echo '  <td>  ' . $row[42] . '   </td> ';
                        echo '  <td>  ' . $row[10] . '   </td> ';
                        echo '  <td style=" text-align: center;">  ' . $totalneed . '   </td> ';
                        echo '  <td style=" text-align: center;">  ' . $totalprovided . '   </td> ';
                        echo '

                                           <td> <form action = "" method = "POST">
                                                <input type = "hidden" name = "mrf_val" value = "' . $row[0] . '">
                                                       <button type="submit" name = "r_mrf" class="btn btn-default"><span class="glyphicon glyphicon-edit" ></span> Accept MRF</button>
                                                </form>
                                            </td>

                                   </tr> ';
                      }
                    }
                  } ?>



                </tbody>
              </table>
            </center>
          </div>

          <div class="modal-footer">
            <form action="" method="POST">
              <button class="button" Name="cancel"><span>OK</span></button>

            </form>
            <!--  <a href="https://www.facebook.com/sosy.tindera" class="fa fa-facebook"></a>
                                              <input type="submit" Value =  "Next" class="btn btn-success" id="submit">
                                              <button type="button" class="btn btn-primary">Save changes</button>
                                    <input type="submit" value = "dd" name ="location_to" class="btn btn-primary"  >
                                      -->
            </form>
          </div>

        </div>
      </div>
      <!-- </div> -->
    </div>



    <!--//========================================-->



</body>

</html>




<?php
if (isset($kekelpogi)) {
  echo '<div class = "how1"><div class = "many"><br> 
    ' . $kekelpogi . '<br>
    <form action = "" method = "POST"><br>
    <input type = "submit" name = "" value = "Okay" class="btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px">
    </form>
    
  </div></div>';
}

if (isset($kekelpogi_index)) {
  echo '<div class = "how2"><div class = "many"><br> 
    <font color="Black" size="12">' . $kekelpogi_index . '</font><br>
    <form action = "" method = "POST"><br>
    <input type = "submit" name = "to_index" value = "Okay" class="btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px">
    </form>
    
  </div></div>';
}


if (isset($kekelpogi1)) {
  echo '<div class = "how1"><div class = "many"><br> 
    ' . $kekelpogi1 . '<br>
    <br>
    <input type = "submit" name = "" value = "Okay" class="btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px">
    
    
  </div></div>';
}
?>



<!-- Modal -->
<div class="modal fade" id="myModaladdshort" role="dialog">
  <div class="modal-dialog modal-lg"> <!--//sm,med, lg , xl-->
    <div class="modal-content">

      <div class="modal-header">
        <label for="text">
          <font color="Black" size="6">
            <font color="red">*</font>Select Shortlist Title:
          </font>
        </label>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <br>
      </div>

      <div class="modal-body">


        <form action="" method="POST"><br>


          <div class="form-group">
            <!--<label class="form-label"> Project  Title : </label>-->
            <center>
              <select class="" name="shortlisttitle" data-placeholder="" style="height:45px;width:60%"> ;
                <option>Select shortlist Name:</option>
                <?php

                $querypro = "SELECT * FROM shortlist_details WHERE activity ='ACTIVE' order by shortlistname ASC ";
                $resultpro = mysqli_query($link, $querypro);
                while ($rowpro = mysqli_fetch_array($resultpro)) {

                  echo '<option  value="' . $rowpro[1] . '">' . $rowpro[1] . '(' . $rowpro[2] . ') </option> 
                                                   
                                                                       ';
                }
                ?>


              </select>
            </center>
          </div>






          <div class="modal-footer">

            <input type="submit" name="addapp" value="Okay" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
            <input type="submit" name="Cancelko" value="Close" data-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
        </form>

      </div>

    </div><!--div for body-->

  </div>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModaladdshortview" role="dialog">
  <div class="modal-dialog modal-lg"> <!--//sm,med, lg , xl-->
    <div class="modal-content">

      <div class="modal-header">
        <label for="text">
          <font color="Black" size="6">
            <font color="red">*</font>Select Shortlist Title:
          </font>
        </label>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <br>
      </div>

      <div class="modal-body">


        <form action="" method="POST"><br>


          <div class="form-group">
            <!--<label class="form-label"> Project  Title : </label>-->
            <center>
              <select class="" name="shortlisttitle1" data-placeholder="" style="height:45px;width:60%"> ;
                <option>Select shortlist Name:</option>
                <?php

                $querypro2 = "SELECT * FROM shortlist_details WHERE activity ='ACTIVE' order by shortlistname ASC ";
                $resultpro = mysqli_query($link, $querypro2);
                while ($rowpro = mysqli_fetch_array($resultpro)) {

                  echo '<option  value="' . $rowpro[1] . '">' . $rowpro[1] . '(' . $rowpro[2] . ') </option> 
                                                   
                                                                       ';
                }
                ?>


              </select>
            </center>
          </div>






          <div class="modal-footer">

            <input type="submit" name="addappview" value="Okay" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
            <input type="submit" name="Cancelko" value="Close" data-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
        </form>

      </div>

    </div><!--div for body-->

  </div>
</div>
</div>




<!-- Modal -->
<div class="modal fade" id="myModaldelshort" role="dialog">
  <div class="modal-dialog modal-lg"> <!--//sm,med, lg , xl-->
    <div class="modal-content">

      <div class="modal-header">
        <label for="text">
          <font color="Black" size="6">
            <font color="red">*</font>Select Shortlist Title:
          </font>
        </label>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <br>
      </div>

      <div class="modal-body">


        <form action="" method="POST"><br>


          <div class="form-group">
            <!--<label class="form-label"> Project  Title : </label>-->
            <center>
              <select class="" name="shortlisttitle1del" data-placeholder="" style="height:45px;width:60%"> ;
                <option>Select shortlist Name:</option>
                <?php
                $querypro3 = "SELECT * FROM shortlist_details WHERE activity ='ACTIVE' order by shortlistname ASC ";
                $resultpro = mysqli_query($link, $querypro3);
                while ($rowpro = mysqli_fetch_array($resultpro)) {

                  echo '<option  value="' . $rowpro[1] . '">' . $rowpro[1] . '(' . $rowpro[2] . ') </option> 
                                                   
                                                                       ';
                }
                ?>


              </select>
            </center>
          </div>






          <div class="modal-footer">

            <input type="submit" name="addappdel" value="Okay" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
            <input type="submit" name="Cancelko" value="Close" data-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
        </form>

      </div>

    </div><!--div for body-->

  </div>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModalewb" role="dialog">
  <div class="modal-dialog modal-lg"> <!--//sm,med, lg , xl-->
    <div class="modal-content">

      <div class="modal-header">
        <label for="text">
          <font color="Black" size="6">
            <font color="red">*</font>Select Shortlist Title:
          </font>
        </label>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <br>
      </div>

      <div class="modal-body">


        <form action="" method="POST"><br>


          <div class="form-group">
            <!--<label class="form-label"> Project  Title : </label>-->
            <center>
              <select class="" name="shortlisttitle1del" data-placeholder="" style="height:45px;width:60%"> ;
                <option>Select shortlist Name:</option>
                <?php
                $querypro4 = "SELECT * FROM shortlist_details WHERE activity ='ACTIVE' order by shortlistname ASC ";
                $resultpro = mysqli_query($link, $querypro4);
                while ($rowpro = mysqli_fetch_array($resultpro)) {

                  echo '<option  value="' . $rowpro[1] . '">' . $rowpro[1] . '(' . $rowpro[2] . ') </option> 
                                                   
                                                                       ';
                }
                ?>


              </select>
            </center>
          </div>






          <div class="modal-footer">

            <input type="submit" name="addappdel1" value="Okay" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
            <input type="submit" name="Cancelko" value="Close" data-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
        </form>

      </div>

    </div><!--div for body-->

  </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModalapp_print" role="dialog" tabindex="1">
  <div class="modal-dialog modal-lg "> <!--//sm,med, lg , xl-->
    <div class="modal-content">

      <div class="modal-header">
        <label for="text">
          <font color="Black" size="6">
            <font color="red">*</font>Select Applicant:
          </font>
        </label>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        <br>
      </div>

      <div class="modal-body">
        <form action="" method="POST"><br>
          <div class="form-group">
            <!--<label class="form-label"> Project  Title : </label>-->
            <center>
              <select class="form-select" name="applicant_no" data-placeholder="" style="height:45px;width:60%"> ;
                <option selected disabled>Select shortlist Name:</option>
                <?php
                $querypro5 = "SELECT * FROM employees WHERE actionpoint !='BLACKLISTED' OR actionpoint !='DEPLOYED' order by lastnameko ASC ";
                $resultpro = mysqli_query($link, $querypro5);
                while ($rowpro = mysqli_fetch_array($resultpro)) {

                  echo '<option  value="' . $rowpro[4] . '">' . $rowpro[6] . ", " . $rowpro[7] . " " . $rowpro[8] . ') </option>';
                }
                ?>
              </select>
            </center>
          </div>






          <div class="modal-footer">
            <input type="submit" name="printapp" value="Okay" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
            <input type="submit" name="Cancelko" value="Close" data-dismiss="modal" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
        </form>

      </div>

    </div><!--div for body-->

  </div>
</div>
</div>