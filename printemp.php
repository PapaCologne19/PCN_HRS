<?php
//export.php  

include("connect.php");
session_start();

date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');

$dtnow = date("m/d/Y");

if (isset($_POST['Back'])) {

  header("location:deployment.php");
}




?>

<html>

<head>


  <style type="text/css">
    p {
      text-align: right;
      padding: 0px 15% 0px 0px;
    }

    .body5025p {
      position: absolute;
      top: 1px;
      left: 20%;
      border: 0px solid green;
      height: 90%;
      width: 60%;
    }

    .body50 {
      position: absolute;
      top: inherit;
      left: 0%;
      border: 0px solid black;
      height: 100%;
      width: 30%;
    }

    .body60 {
      position: absolute;
      top: inherit;
      left: 25%;
      border: 0px solid black;
      height: 100%;
      width: 50%;
    }

    .many1 {
      position: absolute;
      left: 0%;
      top: 0px;
      color: black;
      width: 100%;
      z-index: 100;
      border: 0px inset Blue;
      opacity: .8;

      padding: 0% 7% 0% 3%;
      background-size: cover;
      border-radius: 0px;
      box-shadow: 0px 0px 0px 0px #000000;
      text-align: right;

      font-family: AR berkley medium;
      font-size: 15;

    }
  </style>
  <title></title>
</head>

<body>

  <div class="body5025p">

    <?php

    //echo $_SESSION["appnoto"];
    $appnoto = $_SESSION["appnoto1"];

    $resultap = mysqli_query($link, "SELECT * FROM employees where appno ='$appnoto'");
    while ($rowap = mysqli_fetch_row($resultap)) {


      $resultap1 = mysqli_query($link, "SELECT * FROM deployment where appno_d ='$rowap[4]' and is_deleted !='1'");
      while ($rowap1 = mysqli_fetch_row($resultap1)) {

        echo '


<div class="many1"><br>
<form action = "" method = "POST">
  <button class="button" name="Back" style="float:right;font-size:15;width:150px;height:30px" id="myDIV1" >Back</button>

  <button class="button" style="float:right;font-size:15;width:150px;height:30px" id="myDIV" onclick="myFunction()">Print this page</button>
</form>

<div class="form-group" >

        <center>
                          <img src="' . $rowap[2] . '" alt="" style="float:left; width:150px;height:150px;">
                          </center>
                          <br><br><br>

        <label><font color="Black" size="6">' . $rowap[6] . "," . $rowap[7] . " " . $rowap[8] . '</font></label>
        <br>
        <label>' . $rowap[10] . '</label>
           <br>
        <label>' . $rowap[18] . '</label>
  
       </div>


       <hr>
       <center>
          <label><font color="Black" size="4">Employee Information</font></label>
       </center>
         <hr>





  <div class="form-group">
   <p> <label >Employee Number:</label>
      <input type="text" name = "newshortlist" value= "' . $rowap1[6] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly><p>
    </div>

<div class="form-group" >
       <p> <label>Employment Status:</label>
      <input type="text" name = "newshortlist" value= "' . $rowap1[15] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly></p>
    </div>


  <div class="form-group" >
       <p> <label>Client:</label>
      <input type="text" name = "newshortlist" value= "' . $rowap1[1] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly></p>
    </div>
      <div class="form-group" >
       <p> <label>Project:</label>
          <input type="text" name = "newshortlist" value= "' . $rowap1[3] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly></p>
    </div>
      <div class="form-group" >
      <p>  <label>Employment Start Date:</label>
          <input type="text" name = "newshortlist" value= "' . $rowap1[8] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly></p>
    </div>
  <div class="form-group" >
       <p> <label>Employment End Date:</label>
      <input type="text" name = "newshortlist" value= "' . $rowap1[9] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly></p>
    </div>

<div class="form-group" >
       <p> <label>Outlet:</label>
      <input type="text" name = "newshortlist" value= "' . $rowap1[27] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly></p>
    </div>

<div class="form-group" >
       <p> <label>Area:</label>
      <input type="text" name = "newshortlist" value= "' . $rowap[27] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly></p>
    </div>

      <div class="form-group" >
       <p> <label>SSS Number:</label>
      <input type="text" name = "newshortlist" value= "' . $rowap[24] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly></p>
    </div>
    <div class="form-group" >
       <p> <label>Philhealth Number:</label>
      <input type="text" name = "newshortlist" value= "' . $rowap[26] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly></p>
    </div>
      <div class="form-group" >
       <p> <label>Pag-ibig Number:</label>
      <input type="text" name = "newshortlist" value= "' . $rowap[25] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly></p>
    </div>
      <div class="form-group" >
       <p> <label>TIN Number:</label>
      <input type="text" name = "newshortlist" value= "' . $rowap[27] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly></p>
   <div class="form-group" >
       <p> <label>Birthdate:</label>
      <input type="text" name = "newshortlist" value= "' . $rowap[14] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly></p>
      



      <div class="form-group" >
       <p> <label>Salary:</label>
        <input type="text" name = "newshortlist" value= "' . $rowap1[18] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly></p>
    </div>
  <div class="form-group" >
       <p> <label>Job Title:</label>
      <input type="text" name = "newshortlist" value= "' . $rowap1[16] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly></p>
    </div>
    
    <div class="form-group" >
       <p> <label>LOA Number:</label>
      <input type="text" name = "newshortlist" value= "' . $rowap1[43] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly></p>
    </div>

      <div class="form-group" >
       <p> <label>ID Number:</label>
      <input type="text" name = "newshortlist" value= "' . $rowap1[37] . '" class="form-group"  placeholder="" style= "height:35px;width:60%;" readonly></p>
    </div>

<hr>


      <label style="float:left; width:400px;height:10px;">I hereby certify that the above information are true and correct.</label>
      
<br><br>

<label>___________________________</label><br>
 <label>Signature over Printed Name</label>
<br><br>
<label>________________</label><br>
 <label>Date</label>




';
      }
    }
    ?>




  </div>

</body>

</html>

<script>
  function myFunction() {
    var x = document.getElementById("myDIV");
    var y = document.getElementById("myDIV1");

    if (x.style.display === "none") {
      x.style.display = "block";
      y.style.display = "block";

    } else {

      x.style.display = "none";
      y.style.display = "none";

      window.print();
      x.style.display = "block";
      y.style.display = "block";
    }
  }
</script>