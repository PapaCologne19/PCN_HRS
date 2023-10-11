
<?php 

include("connect.php");
    session_start();
   

    
date_default_timezone_set('Asia/Hong_Kong');

$datenow=date("m/d/Y h:i:s A");
$datenow1=date("Y-m-d");







if(isset($_POST['Back']))
{

  header("location:deployment.php");
}




?>

<html>
<head>
<title>PCN HRS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">



   

 

 <link rel="stylesheet" type="text/css" href="deo1.css">


<style>
.container {
  position: relative;

  color: black;
}

.bottom-left {
  position: absolute;
  bottom: 8px;
  left: 16px;
}

.top-left {
  position: absolute;
  top: 180px;
  left: 16px;
  font-size: 53;

}

.top-right {
  position: absolute;
  top: 8px;
  right: 16px;
}

.bottom-right {
  position: absolute;
  bottom: 8px;
  right: 16px;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);


}


.id_pic {
  position: absolute;
  top: 70px;
  left: 56px;
  font-size: 12;
}
.name {
  position: absolute;
  top: 178px;
  left: 18px;
  font-size: 12;
}
.position {
  position: absolute;
  top: 215px;
  left: 18px;
  font-size: 12;
}

.id_num {
  position: absolute;
  top: 293px;
  left: 18px;
  font-size: 12;
}
.val_until {
  position: absolute;
  top: 293px;
  left: 122px;
  font-size: 12;
}
.c_person {
  position: absolute;
  top: 73px;
  left: 295px;
  font-size: 8;
}
.addressnya {
  position: absolute;
  top: 98px;
  left: 268px;
  font-size:10 ;
  word-wrap: break-word;
  width: 140px; 
}
.c_num {
  position: absolute;
  top: 143px;
  left: 285px;
  font-size: 10;
}
.sss1 {
  position: absolute;
  top: 169px;
  left: 285px;
  font-size: 10;
}
.tin1 {
  position: absolute;
  top: 193px;
  left: 285px;
  font-size: 10;
}
.ph1 {
  position: absolute;
  top: 217px;
  left: 285px;
  font-size: 10;
}
.hdmf1 {
  position: absolute;
  top: 240px;
  left: 285px;
  font-size: 10;
}
.bday1 {
  position: absolute;
  top: 263px;
  left: 285px;
  font-size: 10;
}


</style>
</head>
<body>


<?php
//echo $_SESSION["appid"];
//$appno=$_SESSION["appid"];
$appno="349";

                                                          $resultem = mysql_query("SELECT * FROM employees where appno='$appno' ");
                                                                        while($rowem = mysql_fetch_row($resultem))
                                                                    {
    
                                                                      $lname=$rowem[6];
                                                                      $fname=$rowem[7];
                                                                      $mname=$rowem[8];
                                                                      $fullname= $lname.", ".$fname." ".$mname;

                                                                      $paddress=$rowem[10];

                                                                      $sss_1=$rowem[24];
                                                                      $Pagibig_1=$rowem[25];
                                                                      $ph_1=$rowem[26];
                                                                      $tin_1=$rowem[27];

                                                                       $contk_num =  $rowem[18];
                                                                       $bdayto =    $rowem[14];
                                                                        
                                                                        $e_person1 =    $rowem[38];
                                                                        $e_address1 =    $rowem[39];
                                                                        $e_number1 =    $rowem[40];
                                                                        $foto=$rowem[2];

                                                                    }

                                                             $resultloa = mysql_query("SELECT * FROM deployment where appno_d='$appno' ");
                                                                        while($rowloa = mysql_fetch_array($resultloa))
                                                                    {

                                                          $jposition = $rowloa[16];
                                                           $idnum1 = $rowloa[37];
                                                            $val_until1 = $rowloa[9];

                                                                    }


?>

<div class="container">
  <img src="id.jpg" style=" width="460"; height="345"">

   <img src="<?php echo $foto ?>" class="id_pic" style="height:96px;width:95px;">
   <input type="text" id="fname" name = "name" class="name"  style= "height:20px;width:178px;  text-align: center; border: none;" value = "<?php echo $fullname ?>" >
   <input type="text" id="fname" name = "position" class="position"  style= "height:20px;width:178px;  text-align: center; border: none;" value = "<?php echo $jposition ?>" >
   <input type="text" id="fname" name = "idnum" class="id_num"  style= "height:20px;width:78px;  text-align: center; border: none;" value = "<?php echo $idnum1 ?>" >
   <input type="text" id="fname" name = "val_until" class="val_until"  style= "height:20px;width:78px;  text-align: center; border: none;" value = "<?php echo $val_until1 ?>" >
   <input type="text" id="fname" name = "c_person" class="c_person"  style= "height:20px;width:115px;  text-align: left; border: none;" value = "<?php echo $e_person1 ?>" >
 <div class="addressnya"><?php echo $e_address1 ?></div>

   <input type="text" id="fname" name = "c_num" class="c_num"  style= "height:20px;width:115px;  text-align: left; border: none;" value = "<?php echo $e_number1 ?>" >
      <input type="text" id="fname" name = "sss1" class="sss1"  style= "height:20px;width:115px;  text-align: left; border: none;" value = "<?php echo $sss_1 ?>" >
         <input type="text" id="fname" name = "tin1" class="tin1"  style= "height:20px;width:115px;  text-align: left; border: none;" value = "<?php echo $tin_1 ?>" >
            <input type="text" id="fname" name = "ph1" class="ph1"  style= "height:20px;width:115px;  text-align: left; border: none;" value = "<?php echo $ph_1 ?>" >
               <input type="text" id="fname" name = "hdmf1" class="hdmf1"  style= "height:20px;width:115px;  text-align: left; border: none;" value = "<?php echo $Pagibig_1 ?>" >
                  <input type="text" id="fname" name = "bday1" class="bday1"  style= "height:20px;width:115px;  text-align: left; border: none;" value = "<?php echo $bdayto ?>" >

</div>

<hr>
<br>

<form action = "" method = "POST">
<button class="btn  button1" Name ="Back" style="float:left"><span>BACK </span></button>
</form>


</body>
</html> 

