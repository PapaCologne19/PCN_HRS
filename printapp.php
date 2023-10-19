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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gabarito&family=Inter&family=Julius+Sans+One&family=Poppins&family=Quicksand:wght@400;500&family=Roboto&family=Thasadith&display=swap" rel="stylesheet">

  <style type="text/css">
    * {
      font-family: 'Gabarito', sans-serif;
      font-weight: 800;
    }

    .form-label {
      text-align: left !important;
    }

    .form-control{
      text-transform: uppercase;
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

    .form-group {
      font-size: 13px !important;
    }

    .form-control{
      border-top: none;
      border-right: none;
      border-left: none;
    }

    .form-label{
      font-size: 13px !important;
    }

    .many1 {
      padding: 3rem;
    }

    @media screen and (max-width: 840px) {
      .name .name {
        font-size: 13px;
      }
      .name .address,
      .name .number {
        font-size: 12px;
      }
    }
  </style>
  <title></title>
</head>

<body>

  <div class="container">
    <?php

    //echo $_SESSION["appnoto"];
    $appnoto = $_SESSION["appnoto"];

    $querytap = "SELECT * FROM employees where appno ='$appnoto'";
    $resultap = mysqli_query($link, $querytap);
    while ($rowap = mysqli_fetch_assoc($resultap)) { ?>


      <div class="many1">

        <form action="" method="POST">
          <div class="mb-1 buttons">
            <button class="btn btn-dark" id="myDIV" onclick="myFunction()">Print this page</button>
            <button class="btn btn-secondary" name="Back" id="myDIV1">Back</button>
          </div>
        </form>

        <div class="form-group name">
          <p>Tracking No. <?php echo $rowap['tracking'] ?></p>
          <center>
            <img src="<?php echo $rowap['photopath'] ?>" alt="" class="img-responsive" style="float:left; width:130px; height:130px;">
          </center>
          <br>

          <label class="form-label">
            <h4 class="name"><?php echo $rowap['lastnameko'] .  ", " . $rowap['firstnameko'] . " " . $rowap['mnko'] ?></h2>
          </label>
          <br>
          <label class="form-label address"><?php echo $rowap['paddress'] ?></label>
          <br>
          <label class="form-label number"><?php echo $rowap['cpnum'] ?></label>

        </div>

        <hr>
        <center>
          <label class="form-label">
            <font color="Black" size="3">Applicant Information</font>
          </label>
        </center>
        <hr>

        <form action="" class="row">
          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label">Applicant Number</label>
            </div>
            <div class="col-md-6">
              <input type="text" name="newshortlist" id="number" value="<?php echo $rowap["appno"] ?>" class="form-control" readonly>
            </div>
          </div>


          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label">Region</label>
            </div>
            <div class="col-md-6">
              <input type="text" name="newshortlist" value="<?php echo $rowap["regionn"] ?>" class="form-control" readonly>
            </div>
          </div>


          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label">Gender</label>
            </div>
            <div class="col-md-6">
              <input type="text" name="newshortlist" value="<?php echo $rowap["gendern"] ?>" class="form-control" readonly>
            </div>
          </div>


          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label">Birthdate</label>
            </div>
            <div class="col-md-6">
              <input type="text" name="newshortlist" value="<?php echo $rowap["birthday"] ?>" class="form-control" readonly>
            </div>
          </div>


          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label">Civil Status</label>
            </div>
            <div class="col-md-6">
              <input type="text" name="newshortlist" value="<?php echo $rowap["civiln"] ?>" class="form-control" readonly>
            </div>
          </div>


          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label">SSS Number</label>
            </div>
            <div class="col-md-6">
              <input type="text" name="newshortlist" value="<?php echo $rowap["sssnum"] ?>" class="form-control" readonly>
            </div>
          </div>


          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label">PhilHealth Number</label>
            </div>
            <div class="col-md-6">
              <input type="text" name="newshortlist" value="<?php echo $rowap["phnum"] ?>" class="form-control" readonly>
            </div>
          </div>


          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label">Pag-IBIG Number</label>
            </div>
            <div class="col-md-6">
              <input type="text" name="newshortlist" value="<?php echo $rowap["pagibignum"] ?>" class="form-control" readonly>
            </div>
          </div>


          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label">TIN Number</label>
            </div>
            <div class="col-md-6">
              <input type="text" name="newshortlist" value="<?php echo $rowap["tinnum"] ?>" class="form-control" readonly>
            </div>
          </div>


          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label">Desired Position</label>
            </div>
            <div class="col-md-6">
              <input type="text" name="newshortlist" value="<?php echo $rowap["despo"] ?>" class="form-control" readonly>
            </div>
          </div>


          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label">Email Address</label>
            </div>
            <div class="col-md-6">
              <input type="text" name="newshortlist" value="<?php echo $rowap["emailadd"] ?>" class="form-control" readonly>
            </div>
          </div>


          <div class="row mt-2">
            <div class="col-md-3">
              <label class="form-label">Joined Date</label>
            </div>
            <div class="col-md-6">
              <input type="text" name="newshortlist" value="<?php echo $rowap["dapplied"] ?>" class="form-control" readonly>
            </div>
          </div>

        </form>
        <hr>


      
        <label style="float:left; width:400px;height:10px; font-family: 'Thasadith', sans-serif; font-style: italic; font-size: 13px;">I hereby certify that the above information are true and correct.</label>

        <br>

        <div class="footer">
          <label class="form-label">___________________________</label><br>
          <label class="form-label">Signature over Printed Name</label>
          <br>
          <label >________________</label><br>
          <label class="form-label">Date</label>
        </div>



      <?php
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