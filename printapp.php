<?php
//export.php  

include("connect.php");
session_start();

date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');

$dtnow = date("m/d/Y");





if (isset($_POST['Back'])) {

  header("location:recruitment.php");
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

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Julius+Sans+One&family=Poppins&family=Quicksand:wght@400;500;800&family=Roboto&family=Thasadith&display=swap" rel="stylesheet">

  <style type="text/css">
    * {
      font-family: 'Inter', sans-serif;
      font-weight: 800;
    }

    .form-label {
      text-align: left !important;
      /* padding: 0px 15% 0px 0px; */
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

    .buttons,
    .name,
    .footer {
      text-align: right;
    }

    .form-control{
      border-top: none;
      border-left: none;
      border-right: none;
      border-bottom: 1px solid black;
      border-radius: 0;
      margin-top: 1rem;
    }

    .form-group{
      margin-top: 1rem !important;
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
      /* text-align: right; */
      font-size: 12px;
    }

    @media screen and (max-width: 840px){
      .name .name{
        font-size: 20px;
      }
      .name .address, .name .number{
        font-size: 12px;
      }
    }
  </style>
  <title></title>
</head>

<body>

  <div class="body5025p">

    <?php

    //echo $_SESSION["appnoto"];
    $appnoto = $_SESSION["appnoto"];

    $querytap = "SELECT * FROM employees where appno ='$appnoto'";
    $resultap = mysqli_query($link, $querytap);
    while ($rowap = mysqli_fetch_array($resultap)) { ?>


      <div class="many1"><br>
        <form action="" method="POST">
          <div class="mb-1 buttons">
            <button class="btn btn-dark" id="myDIV" onclick="myFunction()">Print this page</button>
            <button class="btn btn-secondary" name="Back" id="myDIV1">Back</button>
          </div>
        </form>

        <div class="form-group name">

          <center>
            <img src="<?php echo $rowap[2] ?>" alt="" style="float:left; width:150px;height:150px;">
          </center>
          <br><br><br>

          <label class="form-label">
            <font class="name" color="Black" size="6"><?php echo $rowap[6] .  ", " . $rowap[7] . " " . $rowap[8] ?></font>
          </label>
          <br>
          <label class="form-label address"><?php echo $rowap[10] ?></label>
          <br>
          <label class="form-label number"><?php echo $rowap[18] ?></label>

        </div>

        <hr>
        <center>
          <label class="form-label">
            <font color="Black" size="4">Applicant Information</font>
          </label>
        </center>
        <hr>

        <form action="" class="row">
          <div class="col-md-12 mt-3">
            <label class="form-labe">Applicant Number:</label>
            <input type="text" name="newshortlist" id="number" value="<?php echo $rowap[4] ?>" class="form-controls" placeholder="" readonly>
          </div>
          <div class="form-group col-md-12">
            <label class="form-label">Region:</label>
            <input type="text" name="newshortlist" value="<?php echo $rowap[12] ?>" class="form-controls" placeholder="" style="height:35px;width:60%;" readonly>
          </div>
          <div class="form-group col-md-12">
            <label class="form-label">Gender:</label>
            <input type="text" name="newshortlist" value="<?php echo $rowap[16] ?>" class="form-controls" placeholder="" style="height:35px;width:60%;" readonly>
          </div>
          <div class="form-group col-md-12">
            <label class="form-label">Birthdate:</label>
            <input type="text" name="newshortlist" value="<?php echo $rowap[14] ?>" class="form-controls" placeholder="" style="height:35px;width:60%;" readonly>
          </div>
          <div class="form-group col-md-12">
            <label class="form-label">Civil Status:</label>
            <input type="text" name="newshortlist" value="<?php echo $rowap[17] ?>" class="form-controls" placeholder="" style="height:35px;width:60%;" readonly>
          </div>
          <div class="form-group col-md-12">
            <label class="form-label">SSS Number:</label>
            <input type="text" name="newshortlist" value="<?php echo $rowap[24] ?>" class="form-controls" placeholder="" style="height:35px;width:60%;" readonly>
          </div>
          <div class="form-group col-md-12">
            <label class="form-label">Philhealth Number:</label>
            <input type="text" name="newshortlist" value="<?php echo $rowap[26] ?>" class="form-controls" placeholder="" style="height:35px;width:60%;" readonly>
          </div>
          <div class="form-group col-md-12">
            <label class="form-label">Pag-ibig Number:</label>
            <input type="text" name="newshortlist" value="<?php echo $rowap[25] ?>" class="form-controls" placeholder="" style="height:35px;width:60%;" readonly>
          </div>
          <div class="form-group col-md-12">
            <label class="form-label">TIN Number:</label>
            <input type="text" name="newshortlist" value="<?php echo $rowap[27] ?>" class="form-controls" placeholder="" style="height:35px;width:60%;" readonly>

            <div class="form-group col-md-12">
              <label class="form-label">Desired Position:</label>
              <input type="text" name="newshortlist" value="<?php echo $rowap[21] ?>" class="form-controls" placeholder="" style="height:35px;width:60%;" readonly>

            </div>
            <div class="form-group col-md-12">
              <label class="form-label">Email Address:</label>
              <input type="text" name="newshortlist" value="<?php echo $rowap[20] ?>" class="form-controls" placeholder="" style="height:35px;width:60%;" readonly>

            </div>
            <div class="form-group col-md-12">
              <label class="form-label">Joined Date:</label>
              <input type="text" name="newshortlist" value="<?php echo $rowap[3] ?>" class="form-controls" placeholder="" style="height:35px;width:60%;" readonly>

            </div>
        </form>
        <br>
        <hr>


        <label style="float:left; width:400px;height:10px;">I hereby certify that the above information are true and correct.</label>

        <br><br>

        <div class="footer">
          <label class="form-label">___________________________</label><br>
          <label class="form-label">Signature over Printed Name</label>
          <br><br>
          <label class="form-label">________________</label><br>
          <label class="form-label">Date</label>
        </div>



      <?php
      $rowap[10];
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