<script type="text/javascript">
  //pcn drive/MRF

  var script_url1 = "https://script.google.com/macros/s/AKfycbzC9hvKZE45BQBy0TH5kBsGQQQX0Na7gcqnOCFWtdL3TcTM-0WsypvYLK7u_Eh0Ni_E/exec";



  //INSERT BEGIN unknown user=========================================================================================================



  function log_value() {


    if ($("#idnum").val() == null || $("#idnum").val() == "") {
      alert("No input found");
      document.getElementById("idnum").focus();
    } else {
      document.getElementById("myModal").style.display = "none";
      document.getElementById("loader").style.visibility = "visible";
      document.getElementById("wrapper").style.visibility = "visible";
      document.getElementById("how").style.display = "block";


      //  alert(document.getElementById("idnum").value);
      var pass1 = document.getElementById("idnum").value;

      var url = script_url1 + "?callback=ctrlq1&pass1=" + pass1 + "&action=read_log";

      //https://script.google.com/macros/s/AKfycbz-Il3SYJXZlHBqiERn5Hv9vBDB6LKZdXWSNQw2pcFy_tWcAJFrvCIwdTOdkFtHN1slwg/exec?callback=ctrlq1&pass1="+pass1+"&action=read_log
      var request = jQuery.ajax({
        crossDomain: true,
        url: url,
        method: "GET",
        dataType: "jsonp"
      });

    }

  }

  //INSERT END =========================================================================================================




  // print the returned data
  function ctrlq1(e) {


    $("#re1").html(e.result);
    $("#re1").css("visibility", "Hidden");

    //  $("#re2").html(e.result1);
    // $("#re2").css("visibility","visible");

    // alert(document.getElementById("re1").innerHTML);
    // alert(document.getElementById("re2").innerHTML);

    //  var x = document.getElementById("re1").innerHTML;



    if (document.getElementById("re1").innerHTML == "USER NOT FOUND") {
      alert("USER NOT FOUND !");
      window.location.replace("form.php");
      //    alert("FOUND !");
      //             window.location.replace("main.php");

    } else {
      document.getElementById("myModal").style.display = "none";
      document.getElementById("loader").style.visibility = "hidden";
      document.getElementById("wrapper").style.visibility = "hidden";
      document.getElementById("how").style.visibility = "hidden";
      document.getElementById("uname").value = document.getElementById("re1").innerHTML;
    }
    document.getElementById("udept").value = $("#idnum").val()







  }
</script>





<?php

include("connect.php");
session_start();



date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');
$datenow1 = date("Y-m-d");
$datenow = date("m/d/Y h:i:s A");

$ldate = date('F j, Y');
$timeko = date("h:i:s A");



if (isset($_POST['mrf'])) {

  session_unset();
  session_destroy();

  header("location:mrf.php");
}


if (isset($_POST['data'])) {

  $mrf_type = $_POST['mrf_type'];



  if ($mrf_type = "INHOUSE") {
    $position = $_POST['position'];
    $other_position = $_POST['other_position'];

    $radio = "RADIO";
    $other_position1 = "other_position1";
  } else {
    $position = "position";
    $other_position = "other_position";

    $radio = $_POST['radio'];
    $other_position1 = $_POST['other_position1'];
  }



  $mrf_location = $_POST['mrf_location'];
  $division1 = $_POST['division'];

  $client = $_POST['client'];
  $p_title = $_POST['p_title'];
  $ce_number = $_POST['ce_number'];



  $no_male = $_POST['no_male'];
  $no_female = $_POST['no_female'];
  $height_r = $_POST['height_r'];

  $edu = $_POST['edu'];

  $perso1 = $_POST['perso1'];
  $perso2 = $_POST['perso2'];
  $perso3 = $_POST['perso3'];
  $perso4 = $_POST['perso4'];
  $perso5 = $_POST['perso5'];
  $perso6 = $_POST['perso6'];
  $o_perso7 = $_POST['o_perso7'];



  $basic = $_POST['basic'];
  $transpo = $_POST['transpo'];
  $meal = $_POST['meal'];
  $comm = $_POST['comm'];
  $other_allow = $_POST['other_allow'];

  $es = $_POST['es'];

  $salary_sched = $_POST['salary_sched'];
  $work_duration = $_POST['work_duration'];
  $work_days = $_POST['work_days'];
  $time_sched = $_POST['time_sched'];
  $day_off1 = $_POST['day_off'];
  $outlet1 = $_POST['outlet'];

  $date_r = $_POST['date_r'];
  $date_needed = $_POST['date_needed'];
  $drp = $_POST['drp'];
  $r_pos = $_POST['r_pos'];

  $tracking = "100";


  //$result=	mysql_query("INSERT INTO data
  //				(mrf_type,mrf_location,division1,client,p_title,ce_number,position,radio,other_position,other_position1,no_male,no_female,height_r,edu,perso1,perso2,perso3,perso4,perso5,perso6,o_perso7,basic,transpo,meal,comm,other_allow,es,salary_sched,work_duration,work_days,time_sched,day_off,outlet,date_r,date_needed,drp,r_pos,tracking)
  //                   	VALUES
  //				('$mrf_type','$mrf_location','$division1','$client','$p_title','$ce_number','$position','$radio','$other_position','$other_position1','$no_male','$no_female','$height_r','$edu','$perso1','$perso2','$perso3','$perso4','$perso5','$perso6','$o_perso7','$basic','$transpo','$meal','$comm','$other_allow','$es','$salary_sched','$work_duration','$work_days','$time_sched','$day_off','$outlet','$date_r','$date_needed','$drp','$r_pos','$tracking')
  //								");

  $result =  mysql_query("INSERT INTO data
              (mrf_type,mrf_location,division1,client,p_title,ce_number,position,radio,other_position,other_position1,no_male,no_female,height_r,edu,perso1,perso2,perso3,perso4,perso5,perso6,o_perso7,basic,transpo,meal,comm,other_allow,es,salary_sched,work_duration,work_days,time_sched,day_off1,outlet1,date_r,date_needed1,drp,r_pos,tracking)
                          VALUES
              ('$mrf_type','$mrf_location','$division1','$client','$p_title','$ce_number','$position','$radio','$other_position','$other_position1','$no_male','$no_female','$height_r','$edu','$perso1','$perso2','$perso3','$perso4','$perso5','$perso6','$o_perso7','$basic','$transpo','$meal','$comm','$other_allow','$es','$salary_sched','$work_duration','$work_days','$time_sched','$day_off1','$outlet1','$date_r','$date_needed','$drp','$r_pos','$tracking')
                      ");









  echo "saving data";
}




?>








<!DOCTYPE html>
<html>



<style type="text/css">
  #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;



  }

  #customers table {
    width: 80%;

  }

  #customers td,
  #customers th {
    border: 1px solid black;
    padding: 1px;


  }

  #customers tr:nth-child(even) {
    background-color: white;
  }

  #customers tr:nth-child(odd) {
    background-color: white;
  }

  #customers tr:hover {
    background-color: #ddd;
  }

  #customers th {
    padding-top: 8px;
    padding-bottom: 8px;
    text-align: center;
    background-color: Tomato;
    color: white;
  }

  .cs {
    padding-top: 8px;
    padding-bottom: 8px;
    text-align: center;
    background-color: Tomato;
    color: white;

  }

  .cs1 {



    color: Black;
    padding: 10px 50px 10px 50px;
  }



  /* The container */
  .container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* Hide the browser's default checkbox */
  .container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
  }

  /* Create a custom checkbox */
  .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    /*background-color: #eee;*/
  }

  /* On mouse-over, add a grey background color */
  .container:hover input~.checkmark {
    /*background-color: #ccc;*/
  }

  /* When the checkbox is checked, add a blue background */
  .container input:checked~.checkmark {
    /*  background-color: #2196F3;*/
  }

  /* Create the checkmark/indicator (hidden when not checked) */
  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }

  /* Show the checkmark when checked */
  .container input:checked~.checkmark:after {
    display: block;
  }

  /* Style the checkmark/indicator */
  .container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
  }

  .howx {
    position: absolute;

    /* background: tomato;*/
    background-size: 100% 100%;
    top: 0;
    height: 100%;
    width: 100%;
  }

  .how {
    position: relative;
    z-index: 3;
    background: tomato;
    background-size: 100% 100%;
    top: 0;
    height: 100%;
    width: 100%;
  }

  .many {

    z-index: 3;
    height: 50%;
    width: 60%;
    border: 2px inset Blue;
    opacity: .8;
    border-radius: 10px;
    box-shadow: 1px 5px 10px 5px #000000;
    font-family: Arial;
    font-size: 25;

  }

  .centerme {
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }

  .container {
    margin: 10px 10px 10px 10px;
    position: absolute;
    width: 100%;
    height: 100%;
  }




  .wrapper {


    z-index: 3;
    width: 250px;
    height: 250px;
  }


  /* Center the loader */
  #loader {
    position: absolute;

    z-index: 3;
    width: 250px;
    height: 250px;

    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 16px solid #3498db;

    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
  }

  .wrapper {
    z-index: 3;
    background: url('pcn.png') center no-repeat;
    background-size: 50%;
  }

  @-webkit-keyframes spin {
    0% {
      -webkit-transform: rotate(0deg);
    }

    100% {
      -webkit-transform: rotate(360deg);
    }
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  * {
    box-sizing: border-box;
  }

  /* Create four equal columns that floats next to each other */
  .column {
    float: left;
    width: 23%;

    /* height: 200px; /* Should be removed. Only for demonstration */
    */ border-radius: 10px;
    justify-content: center;
    padding-bottom: 10px;
    margin: 0px 0px 10px 0px;
    text-align: center;

  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;

  }

  /* Responsive layout - makes a two column-layout instead of four columns */
  @media screen and (max-width: 900px) {
    .column {
      width: 50%;
    }
  }

  /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 600px) {
    .column {

      margin-left: 30px;
      width: 90%;


    }
  }

  .containerx {
    margin: 0px 10px 10px 10px;

    border-radius: 10px;
    justify-content: center;
    text-align: left;

    display: inline-block;
    text-align: left;

  }


  body {
    background-color: #bbb;
  }

  .vertical-center {
    margin: 0;
    position: absolute;
    top: 50%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
  }


  body {
    font-family: Arial, Helvetica, sans-serif;
  }

  /* The Modal (background) */
  .modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
  }

  /* Modal Content */
  .modal-content {
    position: relative;
    background-color: #001d3d;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
  }

  /* Add Animation */
  @-webkit-keyframes animatetop {
    from {
      top: -300px;
      opacity: 0
    }

    to {
      top: 0;
      opacity: 1
    }
  }

  @keyframes animatetop {
    from {
      top: -300px;
      opacity: 0
    }

    to {
      top: 0;
      opacity: 1
    }
  }

  /* The Close Button */
  .close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }

  .modal-header {
    padding: 2px 16px;
    background-color: #001d3d;
    color: white;
  }

  .modal-body {
    padding: 2px 16px;
  }

  .modal-footer {
    padding: 2px 16px;
    background-color: #001d3d;
    color: white;
  }


  .pulsingButton {
    width: 80%;
    text-align: center;
    white-space: nowrap;
    display: block;
    margin: 1px auto;
    padding: 2px;
    box-shadow: 0 0 0 0 rgba(232, 76, 6, 0.7);
    border-radius: 10px;
    background-color: #0077b6;
    -webkit-animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
    -moz-animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
    -ms-animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
    animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
    font-size: 22px;
    font-weight: normal;
    font-family: sans-serif;
    text-decoration: none !important;
    color: #ffffff;
    transition: all 300ms ease-in-out;
    cursor: pointer;
  }


  /* Comment-out to have the button continue to pulse on mouseover */

  a.pulsingButton:hover {
    -webkit-animation: none;
    -moz-animation: none;
    -ms-animation: none;
    animation: none;
    color: #ffffff;
    box-shadow: 0 12px 16px 0 rgba(0, 0, 0), 0 17px 50px 0 rgba(0, 0, 0);
  }


  /* Animation */

  @-webkit-keyframes pulsing {
    to {
      box-shadow: 0 0 0 15px rgba(232, 76, 61, 0);
    }
  }

  @-moz-keyframes pulsing {
    to {
      box-shadow: 0 0 0 15px rgba(232, 76, 61, 0);
    }
  }

  @-ms-keyframes pulsing {
    to {
      box-shadow: 0 0 0 15px rgba(232, 76, 61, 0);
    }
  }

  @keyframes pulsing {
    to {
      box-shadow: 0 0 0 15px rgba(232, 76, 61, 0);
    }
  }
</style>

<head>




  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>MRF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  </head>

<body>

  <?php
  echo '<input type="text" name = "ldate" id = "ldate" class="form-control"  value= "' . $ldate . '"   placeholder="" style= "height:45px;width:45%;display:block"  readonly >';
  echo '<input type="text" name = "ltime" id = "ltime" class="form-control"  value= "' . $timeko . '"   placeholder="" style= "height:45px;width:45%;display:block" readonly>';
  echo '<input type="text" name = "lstamp" id = "lstamp" class="form-control"  value= "' . $datenow . '"   placeholder="" style= "height:45px;width:45%;display:block" readonly>';

  echo '<input type="text" name = "uname" id = "uname" class="form-control"  value= "' . $timeko . '"   placeholder="" style= "height:45px;width:45%;display:block" readonly>';
  echo '<input type="text" name = "udept" id = "udept" class="form-control"  value= ""   placeholder="" style= "height:45px;width:45%;display:block" readonly>';
  echo '<input type="text" name = "upos" id = "upos" class="form-control"  value= "' . $timeko . '"   placeholder="" style= "height:45px;width:45%;display:block" readonly>';

  ?>






  <div class="" id="re1"></div>

  <div class="" id="re2"></div>


  <div id="how" class="centerme howx">
    <div id="wrapper" class="wrapper centerme">
      <div id="loader"></div>
    </div>

  </div>


  <center>
    <label for="email">
      <font size="5">MANPOWER REQUISITION FORM (MRF)</font>
    </label><br>
  </center>
  <br>


  <form action="" method="POST">

    <label for="email" style="padding-left:30px">
      <font size="5"><strong>PROJECT DETAILS</strong></font>
    </label><br>
    <div class="row cs1">




      <div class="col-md-4">

        <label for="NEW" style="font-size:20px">MRF TYPE :</label>
        <!--         <input type="text" name="location" id="location" value="" style= "height:45px;width:50%;" class="form-control">-->
        <br>

        <div class="form-group">

          <select class="form-control cbo" name="mrf_type" id="mrf_type" onchange="validate_type()" data-placeholder="" style="height:45px;width:250px"> ;


            <option value="" disabled selected>Please select One</option>
            <option>INHOUSE</option>
            <option>FIELD_FORCE</option>


          </select>
        </div>


        <label for="NEW" style="font-size:20px">LOCATION :</label>
        <br>

        <div class="form-group">

          <select class="form-control cbo" name="mrf_location" id="mrf_location" data-placeholder="" style="height:45px;width:250px"> ;


            <option value="" disabled selected>Please select One</option>
            <option>NCR</option>
            <option>PROVINCIAL</option>


          </select>
        </div>






        <label for="NEW" style="font-size:20px">Division : </label> <br>

        <div class="form-group">

          <select class="form-control cbo" name="division" id="division" data-placeholder="" style="height:45px;width:250px"> ;


            <option value="" disabled selected>Please select One</option>
            <option>BD1</option>
            <option>BD2</option>
            <option>BD3</option>
            <option>FINANCE</option>
            <option>HRD</option>
            <option>BSG</option>
            <option>PPI</option>
            <option>STRAT</option>



          </select>
        </div>




      </DIV>

      <div class="col-md-4">

        <label for="NEW" style="font-size:20px">Client : </label> <br>





        <?php echo '                <div class="form-group">
                                               
                                                      <select class="form-control cbo" name="client" id="client"  data-placeholder="" style= "height:45px;width:350px"> ;      
                                                        
                                                           ';
        echo '<option value="" disabled selected>Please select One</option>';
        $results = mysql_query("SELECT * FROM client_company where is_deleted='0' order by company_name asc ");
        while ($rows = mysql_fetch_array($results)) {
          echo '<option value="' . $rows[0] . '">' . $rows[1] . '</option>';
        }
        ?> echo '
        </select>
      </div>


      <label for="NEW" style="font-size:20px">Project Title : </label> <br> .

      <div class="form-group">

        <select class="form-control cbo" name="p_title" id="p_title" data-placeholder="" style="height:45px;width:350px"> ;

        </select>
      </div>




      <!--=========================================================================================================-->







      <label for="NEW" style="font-size:20px">CE Number : </label> <br>
      <!--<input type="text" name="ce_number" id="ce_number" value=""   class="form-control" style= "height:45px;width:; > <br>-->
      <select class="form-control cbo" name="ce_number" id="ce_number" value="" data-placeholder="Select CE Number" style="height:45px;width:60%"> ;
      </select>
    </div>
    </div>


    <hr>
    <label style="font-size:20px;padding-left:30px"><strong>Position</strong></label> <br>
    <div class="row cs1">
      <div class="col-md-4">
        <div class="form-group" id="inhouse">

          <select class="form-control cbo" name="position" id="position" data-placeholder="" style="height:45px;width:80%"> ;
            <option value="" disabled selected>Please select One</option>
            <option>ACCOUNT EXECUTIVE</option>
            <option>BUSS. MANAGER</option>
            <option>ACCOUNT MANAGER</option>
            <option>OPERATIONS MANAGER</option>
            <option>PROJECT MANAGER</option>
            <option>PROJECT COORDINATOR</option>
            <option>AREA COORDINATOR</option>
            <option>BILLING ASST.</option>
            <option>TRAINER</option>
            <option>ENCODER</option>
            <option>MERCHANDISING SUPERVISOR</option>
            <option>OPERATIONS SUPERVISOR</option>
            <option>OTHER</option>
          </select>
        </div>

        <input type="text" name="other_position" id="other_position" value="" style="height:45px;width:50%;" class="form-control" onfocusout="myFunction_focusout()">
      </div>
    </div>




    <!--=================================================================================-->
    <div class="form-group" id="field">
      <div class="row cs1">
        <div class="column " style="background-color:#bbb;">
          <div class="containerx ">
              <label class="form-control">
              <input type="radio" name="radio" />
              Push Girl
            </label>

            <label class="form-control">
              <input type="radio" name="radio" />
              Demo Girl
            </label>

            <label class="form-control">
              <input type="radio" name="radio" />
              Promo Girl
            </label>

            <label class="form-control">
              <input type="radio" name="radio" />
              Sampler
            </label>
          </div>
        </div>

        <div class="column" style="background-color:#bbb;">
          <div class="containerx">

              <label class="form-control">
              <input type="radio" name="radio" />
              Merchandiser
            </label>

            <label class="form-control">
              <input type="radio" name="radio" />
              Helper
            </label>

            <label class="form-control">
              <input type="radio" name="radio" />
              Mystery Buyer
            </label>

            <label class="form-control">
              <input type="radio" name="radio" />
              Validator
            </label>
          </div>
        </div>

        <div class="column" style="background-color:#bbb;">
          <div class="containerx">

              <label class="form-control">
              <input type="radio" name="radio" />
              Promoter
            </label>

            <label class="form-control">
              <input type="radio" name="radio" />
              Encoder
            </label>

            <label class="form-control">
              <input type="radio" name="radio" />
              Coordinator
            </label>

            <label class="form-control">
              <input type="radio" name="radio" />
              Bundler
            </label>
          </div>
        </div>

        <div class="column" style="background-color:#bbb;">
          <div class="containerx">
            <br>
            <h5>Others</h5>
            <p>Please Specify</p>

            <input type="text" name="other_position1" id="other_position1" value="" style="height:45px;width:98%;" class="form-control" onfocusout="myFunction_focusout()">
          </div>
        </div>

      </div>

    </div>







    <label for="email">
      <font size="5px" style="padding-left:30px"><strong>JOB REQUIREMENTS</strong></font>
    </label>
    <div class="row cs1">
      <div class="col-md-4">

        <label for="NEW" style="font-size:20px"><strong>No. of People</strong></label> <br>
        <label for="NEW" style="font-size:18px">Male</label> <br>
        <input type="text" name="no_male" id="no_male" value="" class="form-control" style="height:45px;width:250px;"> <br>

        <label for="NEW" style="font-size:18px">Female</label> <br>
        <input type="text" name="no_female" id="no_female" value="" class="form-control" style="height:45px;width:250px;"> <br>

        <label for="NEW" style="font-size:18px">Height Requirement</label> <br>
        <input type="text" name="height_r" id="height_r" value="" class="form-control" style="height:45px;width:;"> <br>



      </div>

      <div class="col-md-4">

        <label for="NEW" style="font-size:20px"><strong>Educational Background </strong></label> <br><br>

        <div class="form-group">

          <select class="form-control cbo" name="edu" id="edu" data-placeholder="Select Source" style="height:45px;width:80%" onclick="verify_next()"> ;

            <option value="" disabled selected>Please select One</option>
            <option>High School Graduate</option>
            <option>College Level</option>
            <option>College Graduate</option>
            <option>Vocational</option>


          </select>
        </div>



        <br>
      </div>




      <div class="col-md-4">

        <label for="NEW" style="font-size:20px"><strong>Personality</strong></label> <br> <br>
        <input type="checkbox" id="perso1" name="perso1" value="Pleasing Personality">

        <label for="NEW" style="font-size:18px">Pleasing Personality</label> <br>

        <input type="checkbox" id="perso2" name="perso2" value="With Good Moral Character">
        <label for="NEW" style="font-size:18px">With Good Moral Character</label> <br>

        <input type="checkbox" id="perso3" name="perso3" value="With work experience">
        <label for="NEW" style="font-size:18px">With work experience</label> <br>

        <input type="checkbox" id="perso4" name="perso4" value="Good communication skills">
        <label for="NEW" style="font-size:18px">Good communication skills</label> <br>

        <input type="checkbox" id="perso5" name="perso5" value="Physically fit / good built">
        <label for="NEW" style="font-size:18px">Physically fit / good built</label> <br>

        <input type="checkbox" id="perso6" name="perso6" value="Articulate">
        <label for="NEW" style="font-size:18px">Articulate</label> <br>


        <label for="NEW" style="font-size:18px">Others</label> <br>
        <input type="text" name="o_perso7" id="o_perso7" value="" class="form-control" style="height:45px;width:80%;"> <br>
      </div>


    </div>





    <label for="email">
      <font size="5px" style="padding-left:30px"><strong>WORK DETAILS</strong></font>
    </label>
    <div class="row cs1">
      <div class="col-md-4">

        <label for="NEW" style="font-size:20px"><strong>Salary Package</strong></label> <br>
        <label for="NEW" style="font-size:18px">Basic Salary</label> <br>
        <input type="text" name="basic" id="basic" value="" class="form-control" style="height:45px;width:80%;"> <br>

        <label for="NEW" style="font-size:18px">Transpo Allowance</label> <br>
        <input type="text" name="transpo" id="transpo" value="" class="form-control" style="height:45px;width:80%;"> <br>

        <label for="NEW" style="font-size:18px">Meal Allowance</label> <br>
        <input type="text" name="meal" id="meal" value="" class="form-control" style="height:45px;width:80%;"> <br>

        <label for="NEW" style="font-size:18px">Comm Allowance</label> <br>
        <input type="text" name="comm" id="comm" value="" class="form-control" style="height:45px;width:80%;"> <br>

        <label for="NEW" style="font-size:18px">Others</label> <br>
        <input type="text" name="other_allow" value="" id="other_allow" class="form-control" style="height:45px;width:80%;"> <br>

      </div>

      <div class="col-md-4">

        <label for="NEW" style="font-size:20px"><strong>Employment Status</strong></label> <br><br>


        <div class="form-group">

          <select class="form-control cbo" name="es" id="es" data-placeholder="Select Source" style="height:45px;width:80%" onclick="verify_next()"> ;


            <option value="" disabled selected>Please select One</option>
            <option>Project Based</option>
            <option>Probationary (180 Days)</option>
            <option>Regular</option>
            <option>Co - Terminus</option>


          </select>
        </div>


      </div>




      <div class="col-md-4">

        <label for="NEW" style="font-size:20px"><strong>Work Schedule and Others</strong></label> <br> <br>


        <label for="NEW" style="font-size:18px">Salary Schedule</label> <br>
        <input type="text" name="salary_sched" id="salary_sched" value="" class="form-control" style="height:45px;width:80%;"> <br>

        <label for="NEW" style="font-size:18px">Work Duration</label> <br>
        <input type="text" name="work_duration" id="work_duration" value="" class="form-control" style="height:45px;width:80%;"> <br>

        <label for="NEW" style="font-size:18px">Work Days</label> <br>
        <input type="text" name="work_days" id="work_days" value="" class="form-control" style="height:45px;width:80%;"> <br>

        <label for="NEW" style="font-size:18px">Time Schedule</label> <br>
        <input type="text" name="time_sched" id="time_sched" value="" class="form-control" style="height:45px;width:80%;"> <br>

        <label for="NEW" style="font-size:18px">Day Off</label> <br>
        <input type="text" name="day_off" id="day_off" value="" class="form-control" style="height:45px;width:80%;"> <br>

        <label for="NEW" style="font-size:18px">Outlet</label> <br>
        <input type="text" name="outlet" id="outlet" value="" class="form-control" style="height:45px;width:80%;"> <br>
      </div>



    </div>

    <label for="email">
      <font size="5px" style="padding-left:30px"><strong>REQUISITIONER INFO</strong></font>
    </label>
    <div class="cs1">

      <label for="NEW" style="font-size:20px"><strong>Date Requested : </strong> </label> <br>
      <input type="text" name="date_r" id="date_r" value="<?php echo  $datenow  ?>" class="form-control" style="height:45px;width:250px;" readonly> <br>


      <label for="NEW" style="font-size:18px">Date Needed :</label> <br>
      <input type="date" name="date_needed" id="date_needed" value="" class="form-control" style="height:45px;width:350px;"> <br>

      <label for="NEW" style="font-size:18px">Directly Reporting to :</label> <br>
      <div class="form-group">

        <select class="form-control cbo" name="drp" id="drp" data-placeholder="Select Source" onchange="myFunction1(this.value)" style="height:45px;width:350px"> ;
          <option value="" disabled selected id="showDatax">Please select One</option>
          <option>Project Based</option>
          <option>Probationary (180 Days)</option>
          <option>Regular</option>
          <option>Co - Terminus</option>
        </select>
      </div>



      <label for="NEW" style="font-size:18px">Requestee Position</label><br>

      <select class="form-control cbo" name="r_pos" id="r_pos" data-placeholder="Select Source" style="height:45px;width:350px" readonly> ;
        <option value="" disabled selected id="showDatax1">This is auto populated</option>
        <option>Project Based</option>
        <option>Probationary (180 Days)</option>
        <option>Regular</option>
        <option>Co - Terminus</option>
      </select>









    </div>


    <input type="submit" name="data" value="Process" class="btn-info btn-lg" style="font-size:15;width:200px;height:50px">

  </form>
</body>

</html>>
<?php






if (isset($kekelpogi)) {

  echo '<div class = "howx"><div class = "many centerme"><br> <br> <br> <br> 
    <center>
    ' . $kekelpogi . '<br>
    <form action = "" method = "POST"><br>
    <input type = "submit" name = "mrf" value = "Okay" class="btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px">
    </form>
    </center>
  </div></div>';
}




?>





<script type="text/javascript">
  document.getElementById('other_position').style.visibility = 'hidden';


  //FOR position text magic

  document.getElementById("position").addEventListener("change", function() {
    var e = document.getElementById("position");
    var selected = e.options[e.selectedIndex].text;

    //alert(e.options[e.selectedIndex].text);
    if (e.options[e.selectedIndex].text == "OTHER") {
      document.getElementById('other_position').style.visibility = 'visible';
      document.getElementById('other_position').focus();

    } else {
      document.getElementById('other_position').style.visibility = 'hidden';
    }

  });

  function myFunction_focusout() {

  }




  document.getElementById('field').style.display = 'none';
  document.getElementById('inhouse').style.display = 'none';


  document.getElementById("mrf_type").addEventListener("change", function() {
    var e = document.getElementById("mrf_type");
    var selected = e.options[e.selectedIndex].text;

    //alert(e.options[e.selectedIndex].text);
    if (e.options[e.selectedIndex].text == "INHOUSE") {
      document.getElementById('field').style.display = 'none';
      document.getElementById('inhouse').style.display = 'block';
      document.getElementById('position').focus();

    } else {
      document.getElementById('field').style.display = 'block';
      document.getElementById('inhouse').style.display = 'none';

    }

  });



  function validate_type() {

  }



  $("#client").on("change", function() {

    var x_values = $("#client").find(":selected").val();

    $.ajax({
      url: 'ajax_project.php',
      type: 'POST',
      //dataType:'JSON',
      data: {
        city_code: x_values
      },
      success: function(result) {

        result = JSON.parse(result);

        //Empty option on change
        var select = document.getElementById("p_title");
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
          var select = document.getElementById("p_title");
          select.appendChild(option);
        });
      },

      error: function(result) {
        console.log(result)
      }
    });

  });


























  $(window).on('load', function() {
    document.getElementById("loader").style.visibility = "hidden";
    document.getElementById("wrapper").style.visibility = "hidden";
    document.getElementById("how").style.visibility = "hidden";
  });
</script>

<script type="text/javascript">
  //====================================
  read_value();



  function read_value() {
    //drive/global
    document.getElementById("loader").style.visibility = "visible";
    document.getElementById("wrapper").style.visibility = "visible";
    document.getElementById("how").style.visibility = "visible";
    /// alert("SDF");
    var script_url = "https://script.google.com/macros/s/AKfycbwD1woEfFKf-dHW_kD-bvU64ucSzCnOElwP7lHaSvFrEHp_OW0/exec";

    var url = script_url + "?action=read_sources";

    $.getJSON(url, function(json) {

        for (var ix = 0; ix < json.records.length; ix++) {
          if (json.records[ix].FULL_NAME == "") {
            break;
          }
          var options = [json.records[ix].FULL_NAME];
          //$('#sourcex').empty();
          $.each(options, function(ix, p) {
            $('#regionn').append($('<option></option>').val(p).html(p));

          });

        }

      })
      .done(function() { //alert("second success"); 
      })
      .fail(function() {
        //  document.getElementById("loader").style.display = "none";
        // document.getElementById("wrapper").style.display = "none";
        // document.getElementById("how").style.visibility = "hidden";
      })
      .always(function() { //alert("Load Complete"); 
        //document.getElementById("loader").style.display = "none";
        // document.getElementById("wrapper").style.display = "none";
        // document.getElementById("how").style.visibility = "hidden";
      });

  }



  function myFunction1(val) {
    document.getElementById("loader").style.visibility = "visible";
    document.getElementById("wrapper").style.visibility = "visible";
    document.getElementById("how").style.visibility = "visible";

    // alert("The input value has changed. The new value is: " + val);
    var script_url = "https://script.google.com/macros/s/AKfycbwD1woEfFKf-dHW_kD-bvU64ucSzCnOElwP7lHaSvFrEHp_OW0/exec";
    var url = script_url + "?action=read_sources";


    $('#cityn').empty();

    $.getJSON(url, function(json) {

        for (var ib = 0; ib < json.records.length; ib++) {

          if (json.records[ib].FULL_NAME == val) {



            var options = [json.records[ib].POSITION];

            $.each(options, function(ib, p) {
              $('#cityn').append($('<option></option>').val(p).html(p));
            });

          }
        }

      })
      .done(function() { //alert("second success"); 
      })
      .fail(function() {
        // document.getElementById("loader").style.display = "none";
        // document.getElementById("wrapper").style.display = "none";
        // document.getElementById("how").style.visibility = "hidden";
      })
      .always(function() { //alert("Load Complete"); 
        //document.getElementById("loader").style.display = "none";
        //document.getElementById("wrapper").style.display = "none";
        //document.getElementById("how").style.visibility = "hidden";
      });

    //$('#cityn').focus();
  }
</script>











<h2>Animated Modal with Header and Footer</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="width:500px">
    <div class="modal-header">
      <h4>Input User ID</h4>


    </div>
    <div class="modal-body">
      <br>
      <!--   <form action = "" method = "POST">-->
      <input type="text" name="idnum" id="idnum" value="" placeholder="ID Number" class="form-control" style="height:45px;width:80%;"> <br>

    </div>
    <div class="modal-footer">

      <!--  <input type = "submit" name = "log1" id = "log1" value = "PROCESS" class="pulsingButton"  style = "height:45px;width:150px;">
      </form>-->

      <button type="button" onclick="log_value();" class="pulsingButton" id="log_in" style="height:45px;width:150px;">Process</button>
    </div>
  </div>

</div>


<script>
  document.getElementById("myModal").style.display = "block";
  document.getElementById("idnum").focus();


  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  //span.onclick = function() {
  //  modal.style.display = "none";
  //}

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "block";
    }
  }
</script>



<script type="text/javascript">
  function read_ce() {




    //document.getElementById("loader").style.display = "block";
    //document.getElementById("wrapper").style.display = "block";

    alert("Processing Your CE Number Listing");

    //document.getElementById("dept_val").value="BD1";
    //var script_url = "https://script.google.com/macros/s/AKfycbz_8MheSWKbsaCoVqc1a9J-4dxhBxNIz2tBNrIVjJRISRiJTsZloyYd66OPO3sfEZzs/exec";

    var script_url = "https://script.google.com/macros/s/AKfycbx7V6ybpFowI4OYMQBidO3zeJ-z2LyHNFCBQ1EWezw-XUot3m__IC0kQbE4wFxGI_cfcw/exec";


    //var url = script_url+"?action=read_sourcesbd3";
    var url = script_url + "?action=read_dd";


    //===========================================================================================





    $.getJSON(url, function(json) {
      $('#ce_number').empty();
      $('#ce_number').append($('<option></option>').val("").html("Please select One."));
      $('#ce_number').append($('<option></option>').val("NA").html("NA"));
      //
      document.getElementById("id_numberx").value = document.getElementById("udept").value;
      alert(document.getElementById("id_numberx").value);
      for (var ix = 0; ix < json.records.length; ix++) {

        if (json.records[ix].PCN_ID == document.getElementById('id_numberx').value) {



          var options = [json.records[ix].GENERATED_CE];

          $.each(options, function(ix, p) {
            $('#ce_number').append($('<option></option>').val(p).html(p));
          });

          $("#ce_number option[value=NA]").wrap("<span>");

        }






      }






      $('option[value=""').attr("disabled", "disabled");


    })





    //=============================

  }
</script>