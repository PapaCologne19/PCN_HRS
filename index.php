<?php
include("connect.php");
session_start();


date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');


if (isset($_POST['SubButton'])) {
  $Username = $_POST['Username'];
  $Password = $_POST['Password'];
  $Usert1 = "ADMIN";

  if (strlen($Username) == 0 || strlen($Password) == 0) {
    $kekelpogi = "Invalid Input";
    echo '<div class = "how1"><div class = "many"><br> 
    ' . $kekelpogi . '<br>
    <form action = "" method = "POST"><br>
    <input type = "submit" name = "next1" value = "Okay" class="btn btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px"></form>
    
  </div></div>';
  }

  $query = "SELECT * FROM data WHERE uname = '$Username' AND pname = '$Password' ";
  $result = mysqli_query($link, $query);

  if (mysqli_num_rows($result) == 0) {
    // kapag wala pang user name na kaparehas
    $kekel = "No Such User Here !";
    echo '<div class = "how1"><div class = "many"><br> 
    ' . $kekel . '<br>
    <form action = "" method = "POST"><br>
    <input type = "submit" name = "next1" value = "Okay" class="btn btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px">
    </form>
    
  </div></div>';
  } else {

    $query1 = "SELECT * FROM data WHERE uname = '$Username' and pname = '$Password' and approve = '1'";
    $result1 = mysqli_query($link, $query1);
    while ($rowd = mysqli_fetch_array($result1))


      if ($rowd[9] == "EWB") {

        // Set session variables

        $_SESSION["dmark"] = $rowd[7];
        $_SESSION["dmark1"] = $rowd[7] . $rowd[8];
        $_SESSION["darkk"] = "ewb";
        $_SESSION["dept"] = $rowd[6];
        $_SESSION["data"] = $rowd[0];

        //log control
        $dtnow = date("m/d/Y");

        $query3 = "INSERT INTO log (Username, Datelog, time, activitynya) VALUES('$rowd[7]','$dtnow',now(),'RECRUITMENT login Accepted')";
        $result3 = mysqli_query($link, $query3);

        header("location:ewb.php");
      } else if ($rowd[9] == "DEPLOYMENT") {

        // Set session variables

        $_SESSION["dmark"] = $rowd[7];
        $_SESSION["dmark1"] = $rowd[7] . $rowd[8];
        $_SESSION["darkk"] = "deployment";
        $_SESSION["dept"] = $rowd[6];
        $_SESSION["data"] = $rowd[0];

        //log control
        $dtnow = date("m/d/Y");

        $query4 = "INSERT INTO log (Username, Datelog, time, activitynya) VALUES('$rowd[7]','$dtnow',now(),'RECRUITMENT login Accepted')";
        $result4  = mysqli_query($link, $query4);

        header("location:deployment.php");
      } else	if ($rowd[9] == "RECRUITMENT") {

        // Set session variables

        $_SESSION["dmark"] = $rowd[7];
        $_SESSION["dmark1"] = $rowd[7] . $rowd[8];
        $_SESSION["darkk"] = "recruitment";
        $_SESSION["dept"] = $rowd[6];
        $_SESSION["data"] = $rowd[0];

        //log control
        $dtnow = date("m/d/Y");

        $query5 = "INSERT INTO log(Username, Datelog, time, activitynya) VALUES('$rowd[7]','$dtnow',now(),'RECRUITMENT login Accepted')";
        $result5 = mysqli_query($link, $query5);

        header("location:recruitment.php");

      } else if($rowd[9] == "MRF"){
        // Set session variables

        $_SESSION["dmark"] = $rowd[7];
        $_SESSION["dmark1"] = $rowd[7] . $rowd[8];
        $_SESSION["darkk"] = "mrf";
        $_SESSION["dept"] = $rowd[6];
        $_SESSION["data"] = $rowd[0];

        //log control
        $dtnow = date("m/d/Y");

        $query5 = "INSERT INTO log(Username, Datelog, time, activitynya) VALUES('$rowd[7]','$dtnow',now(),'RECRUITMENT login Accepted')";
        $result5 = mysqli_query($link, $query5);

        header("location: mrf/form.php");

      } else if ($rowd[9] == "CASHIER") {

        // Set session variables
        $_SESSION["dmark"] = $rowd[1];
        $_SESSION["dmark1"] = $rowd[9];
        $_SESSION["darkk"] = "Cashier";
        $_SESSION["data"] = $rowd[0];
        //log control
        $dtnow = date("m/d/Y");

        $query6 = "INSERT INTO log(Username, Datelog, time, activitynya) VALUES('$rowd[7]','$dtnow',now(),'Cashier login Accepted')";
        mysqli_query($link, $query6);

        //header("location:hrencodeedit.php");
        header("location:cashier.php");
      } else if ($rowd[9] == "REPORT") {

        // Set session variables
        $_SESSION["dmark"] = $rowd[1];
        $_SESSION["dmark1"] = $rowd[9];
        $_SESSION["darkk"] = "report";
        $_SESSION["dept"] = "Report";
        $_SESSION["data"] = $rowd[0];
        //log control
        $dtnow = date("m/d/Y");

        $query7 = "INSERT INTO log(Username, Datelog, time, activitynya) VALUES('$rowd[7]','$dtnow',now(),'report log in identified')";
        $result7 = mysqli_query($link, $query7);


        header("location:report.php");
      } else if ($rowd[9] == "ADMIN") {
        $_SESSION["dmark"] = $rowd[1];
        $_SESSION["dmark1"] = $rowd[9];
        $_SESSION["data"] = $rowd[0];
        $_SESSION["darkk"] = "green";
        //log control
        $dtnow = date("m/d/Y");

        $query8 = "INSERT INTO log(Username,Datelog,time,activitynya) VALUES('$rowd[7]','$dtnow',now(),'Admin login Accepted')";
        $result8 = mysqli_query($link, $query8);

        //echo $dtnow;
        header("Location: adminfinal.php");
      } else if ($rowd[9] == "OTHERS") {
        $_SESSION["dmark"] = $rowd[1];
        $_SESSION["dmark1"] = $rowd[3] . $rowd[4];
        $_SESSION["data"] = $rowd[0];

        //log control
        $dtnow = date("m/d/Y");

        $query9 = "INSERT INTO log(Username,Datelog,time,activitynya) VALUES('$rowd[7]','$dtnow',now(),'OTHERS login Accepted')";
        $result9 = mysqli_query($link, $query9);

        //echo $dtnow;
        header("location:declaration.php");
      } 
      else if ($result1 = mysqli_query($link, "SELECT * FROM data WHERE uname = '$Username' and pname = '$Password' and approve = '0'")); {
      $kekelpogi = "User not allowed by MIS, Please notify Mike or Deo";
      echo '<div class = "how1"><div class = "many"><br> 
                ' . $kekelpogi . ' 
                <br> 
                <form action = "" method = "POST"><br>
                <input type = "submit" name = "next1" value = "Okay" class="btn btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px"></form>
                
              </div></div>';
    }
  }
}





if (isset($_POST['next1'])) {
  header("location:index.php");
}

//================================

if (isset($_POST['SavenewUser1'])) {


  //$Usertype = strtoupper($_POST['user_type']);


  $lastname = strtoupper($_POST['lastnameko']);
  $firstname = strtoupper($_POST['firstnameko']);
  $mi = strtoupper($_POST['miko']);
  $contactno = $_POST['contactno'];
  $email1 = $_POST['email'];
  $fms = $_POST['fmsname'];
  $uname = $_POST['uname'];
  $pname = $_POST['pname'];
  $idno = $_POST['idnoko'];
  //$approve = $_POST['approve'];






  if (strlen($lastname) == 0 || strlen($firstname) == 0 || strlen($contactno) == 0 || $fms == "Select FMS Name" || strlen($uname) == 0 || strlen($pname) == 0) {
    $kekelpogi = "All Fields are required. Try Again !";
  } else {

    //check if username exist na
    $query10 = "select * from data WHERE uname = '$uname' ";
    $result = mysqli_query($link, $query10);

    if (mysqli_num_rows($result) == 0) {

      $query11 = "INSERT INTO data(lastname,firstname,mi,contactno,emailadd,fms,uname,pname,typenya,approve,idnum) VALUES('$lastname','$firstname','$mi','$contactno','email','$fms','$uname','$pname','DISER','0','$idno')";
      mysqli_query($link, $query11);



      $fmsnamelog = $lastname . ", " . $firstname . " " . $mi;
      $dtnow = date("m/d/Y");

      $query12 = "INSERT INTO log(Username,Datelog,time,activitynya) VALUES('$fmsnamelog','$dtnow',now(),'Account Created')";
      mysqli_query($link, $query12);








      $kekelpogi1 = "Save Successful!";
    } else {
      $kekelpogi = "username already taken! Try Again";
    }
  }
}

//===============================




?>






<html>
<style type="text/css">
  .wrapper {
    width: 250px;
    height: 250px;
    position: absolute;
    left: 40%;
    top: 30%;

  }


  /* Center the loader */
  #loader {
    position: absolute;
    left: 40%;
    top: 30%;
    z-index: 1;
    width: 250px;
    height: 250px;
    margin: -75px 0 0 -100px;
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 16px solid #3498db;

    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
  }

  .wrapper {
    background: url('pcn_logo.jpg') center no-repeat;
    background-size: 80%;
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
</style>

<head>

  <title>Welcome</title>
  <meta charset="utf-8">

  <script src="strap/jquery.min.js"></script>
  <script src="strap/bootstrap.min.js"></script>
  <link rel="stylesheet" href="strap/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="deo1.css">



</head>

<body onload="myFunction()" style="background-image: url(bg3a.jpg); background-size:100% 100%; background-repeat: no-repeat;">
  <div id="wrapper" class="wrapper">
    <div id="loader"></div>
  </div>

  <div class="login">

    <br>
    <h2>
      <font color="white">Log In</font>
    </h2>
    <form action="" method="POST">

      <div class="form-group">
        <label>
          <font color="white">Username:</font>
        </label>
        <input type="username" name="Username" class="form-control" placeholder="Username" style="height:45px;width:250px;" autofocus>
      </div>

      <div class="form-group">
        <label>
          <font color="white">Password:</font>
        </label>
        <input type="password" name="Password" class="form-control" placeholder="Password" style="height:45px;width:250px;">
      </div>


      <input type="submit" name="SubButton" value=" " class="loginButton">;
      <!--<input type = "submit" name = "register" value = " " class="signupbutton">	-->



    </form>


    <br><br><br>
    <div class="container signin">
      <!--<p><b><font color="white">No Account Yet? <a href="" data-toggle="modal" data-target="#Modaladduser">Sign up</font></a></a>.</p>-->
    </div>



  </div>




  <!--Modal Control / Adding new user-->


  <form action="" method="POST">
    <!--Modal Control / Adding new user-->
    <!--<div class="container">

 <!--  Modal -->
    <div class="modal fade" id="Modaladduser" role="dialog">
      <div class="modal-dialog modal-med"> <!--//sm,med, lg , xl-->
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add New User</h4>
          </div>

          <div class="modal-body">
            <center>
              <form action="" method="POST">
                <div class="form-group">
                  <label for="email">Id Number:</font></label>
                  <input type="username" name="idnoko" class="form-control" placeholder="ID Number" style="height:45px;width:250px;">
                </div>

                <div class="form-group">
                  <label for="email">Last Name:</font></label>
                  <input type="username" name="lastnameko" class="form-control" placeholder="Last name" style="height:45px;width:250px;">
                </div>

                <div class="form-group">
                  <label for="email">First Name:</font></label>
                  <input type="username" name="firstnameko" class="form-control" placeholder="First name" style="height:45px;width:250px;">
                </div>

                <div class="form-group">
                  <label for="email">Middle Name:</font></label>
                  <input type="username" name="miko" class="form-control" placeholder="Middle Initial" style="height:45px;width:250px;">
                </div>

                <div class="form-group">
                  <label for="email">Contact Number:</font></label>
                  <input type="username" name="contactno" maxlength="11" class="form-control" placeholder="Contact Number" style="height:45px;width:250px;">
                </div>

                <!-- <div class="form-group" >
                              <label for="email">Email Address:</font></label>
                            <input type="text" name = "email" id="email" class="form-control"  placeholder="Email Address" style= "height:45px;width:250px;" onblur="myFunctionemail()">
                            
                        </div>-->

                <div class="form-group">
                  <label for="pwd">* Division :</font></label>
                  <select class="form-control cbo" name="fmsname" data-placeholder="Select User type" style="height:45px;width:250px"> ;

                    <?php echo '<option >Select Division Name</option> ';
                    $query13 = "SELECT * FROM divisionnya";
                    $resultpop1 = mysqli_query($link, $query13);
                    while ($rowm1 = mysqli_fetch_array($resultpop1)) {



                      echo '<option  value=' . $rowm1[1] . '>' . $rowm1[1] . ' </option> "';
                    }
                    ?>






                  </select>
                </div>




                <br>
                <div class="form-group">
                  <label for="email">Preferred Username:</font></label>
                  <input type="text" name="uname" id="uname" class="form-control" placeholder="User Name" style="height:45px;width:250px;">

                </div>

                <div class="form-group">
                  <label for="email">Preferred Password:</font></label>
                  <input type="password" name="pname" id="pnameiddiser" class="form-control" placeholder="Password" style="height:45px;width:250px;">

                </div>
                <div class="checkbox">
                  <label><input type="checkbox" id="myCheck" onclick="myFunctiondiser()">Show Password</font></label>
                </div>



              </form>
            </center>


          </div>

          <div class="modal-footer">
            <input type="submit" name="SavenewUser1" value="Save" class="btn btn-info btn-lg" style="height:50px;width:100px;">
            <input type="submit" name="Cancelko" value="Cancel" class="btn btn-info btn-lg" style="font-size:15;width: 100px;height: 50px">
          </div>

        </div>
      </div>
    </div>
    </div>
  </form>

  </div>

  <!--Modal Control / Adding new user-->




  <?php
  if (isset($kekelpogi)) {
    echo '<div class = "how1"><div class = "many"><br> 
    ' . $kekelpogi . '<br>
    <form action = "" method = "POST"><br>
    <input type = "submit" name = "" value = "Okay" class="btn btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px"></form>
    
  </div></div>';
  }

  if (isset($kekelpogi1)) {
    echo '<div class = "how1"><div class = "many"><br> 
    ' . $kekelpogi1 . '<br>
    <form action = "" method = "POST"><br>
    <input type = "submit" name = "next1" value = "Okay" class="btn btn-info btn-lg" style = "font-size:15;width: 100px;height: 50px"></form>
    
  </div></div>';
  }

  ?>

  <script type="text/javascript">
    function myFunctiondiser() {
      var x = document.getElementById("pnameiddiser");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>

  <script>
    document.getElementById("myFrame").onload = function() {
      myFunction()
    };
    var myVar;

    function myFunction() {
      document.getElementById("loader").style.display = "none";
      document.getElementById("wrapper").style.display = "none";

    }
  </script>