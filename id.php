<?php
require_once 'PHPWord/PHPWord.php';
include("connect.php");
session_start();



date_default_timezone_set('Asia/Hong_Kong');

$datenow = date("m/d/Y h:i:s A");
$datenow1 = date("Y-m-d");


?>


<html>

<head>
  <title>PCN HRS</title>
</head>

<body>
  <form action="" method="POST"><br>
    <input type="submit" name="dl_loa" value="Download LOA" class="btn-info btn-lg" style="font-size:15;width:250px;height:50px">
    <input type="submit" name="dl_loa1" value="Download LOA1" class="btn-info btn-lg" style="font-size:15;width:250px;height:50px">
    <input type="submit" name="dl_loa2" value="Download LOA3" class="btn-info btn-lg" style="font-size:15;width:250px;height:50px">


  </form>
  <?php


  if (isset($_POST['dl_loa2'])) {
    echo '

<img src="id.jpg" alt="Flowers in Chania" width="460" height="345">



      <label for="email"><font color="white">Username:</font></label>
  
 

     <input type="text" id="fname" name = "Username" class="" placeholder="Username" style= "height:45px;width:250px;" value = "xx" onfocusout="myFunction()">


';
  }








  if (isset($_POST['dl_loa1'])) {


    $template = 'loa_templates/template.docx';

    $PHPWord = new PHPWord();
    $document = $PHPWord->loadTemplate($template);

    #reemplaza una variable con varias imagenes
    $aImgs = array(
      array(
        'img' => 'PHPWord/Examples/_earth.JPG',
        'size' => array(580, 280)
      ),
      array(
        'img' => 'PHPWord/Examples/_mars.jpg',
        'dataImg' => 'Esta es el pie de imagen para _mars.jpg'
      )
    );
    $document->replaceStrToImg('areaImages', $aImgs);




    $document->save('nuevoDoc.docx');

    header("location:download.php?download_file=nuevoDoc.docx");
  }



  if (isset($_POST['dl_loa'])) {

    echo $_SESSION["appno"];
    //$appno=$_SESSION["appno"];
    $appno = "158";


    $resultem = mysqli_query($link, "SELECT * FROM employees where appno='$appno' ");
    while ($rowem = mysqli_fetch_row($resultem)) {

      $lname = $rowem[6];
      $fname = $rowem[7];
      $mname = $rowem[8];
      $fullname = $lname . ", " . $fname . " " . $mname;

      $paddress = $rowem[10];

      $sss_1 = $rowem[24];
      $Pagibig_1 = $rowem[25];
      $ph_1 = $rowem[26];
      $tin_1 = $rowem[27];

      $contk_num =  $rowem[18];
      $e_person =  $rowem[38];
      $e_add =  $rowem[39];
      $e_num =  $rowem[40];
      $bdate =  $rowem[14];
    }

    $resultloa = mysqli_query($link, "SELECT * FROM deployment where appno_d='$appno' ");
    while ($rowloa = mysqli_fetch_array($resultloa)) {

      $stemplate =  $rowloa[17];
      $ptitle =  $rowloa[3];
      $caddress =  $rowloa[2];
      $jposition = $rowloa[16];
      $estatus = $rowloa[15];


      // $datefrom = $rowloa[8];
      $datefromx = date_create($rowloa[8]);
      $datefrom = date_format($datefromx, "m/d/Y");



      //$dateto = $rowloa[9];
      $datetox = date_create($rowloa[9]);
      $dateto = date_format($datetox, "m/d/Y");



      $rate_day = $rowloa[18];
      $daily_rate = $rowloa[18];
      $ecola = $rowloa[19];
      $comm_al = $rowloa[23];
      $transpo = $rowloa[24];
      $meal_al = $rowloa[21];
      $inet_al = $rowloa[20];
      $outbase = $rowloa[22];
      $outlet = $rowloa[27];
      $nodays = $rowloa[26];

      $dep_by = $rowloa[31];
      $dep_desi = $rowloa[32];

      $hr_rep = $rowloa[28];
      $hr_desi = $rowloa[29];

      $ps = $rowloa[33];
      $ps_desi = $rowloa[34];

      $head =  $rowloa[35];
      $head_desi = $rowloa[36];

      $id_1 = $rowloa[35];

      $emp_no = $rowloa[6];
      $id_num1 = $rowloa[37];
    }







    $LOAtemp = "loa_templates/" . $stemplate;
    $filenamenya = "loa_files/" . $stemplate;

    $Rowvaladd = "27 CRESTA STREET, BARANGAY MALAMIG, MANDALUYONG CITY and 30 ARAYAT STREET, BARANGAY MALAMIG, MANDALUYONG CITY";
    $Rowval1 = $fullname;


    $Rowval2 = $paddress;
    $Rowval3 = $ptitle;

    $Rowval5 = $caddress;
    $Rowval6 = $jposition;
    $Rowval7 = $estatus;
    $Rowval8 = $datefrom;
    $Rowval9 = $dateto;
    $Rowval10 =  $rate_day;
    $Rowval10p = $daily_rate;
    $Rowval10c = $ecola;
    $Rowval10a = $comm_al;
    $Rowval10b = $transpo;

    $Rowval = $meal_al;
    $Rowval = $inet_al;
    $Rowval = $outbase;


    $Rowval11a = $outlet;
    $Rowval12 = $nodays;

    $Rowval16 = $dep_by;
    $Rowval17 = $dep_desi;

    $Rowval18 = $hr_rep;
    $Rowval19 = $hr_desi;

    $Rowval20 = $ps;
    $Rowval21 = $ps_desi;

    $Rowval22 = $head;
    $Rowval23 = $head_desi;

    $Rowval27 = "$fullname";




    $Rowval13 = date("d");
    $Rowval14x = date("n");

    switch ($Rowval14x) {
      case '1':
        # code...
        $Rowval14 = "January";
        break;
      case '2':
        # code...
        $Rowval14 = "February";
        break;
      case '3':
        # code...
        $Rowval14 = "March";
        break;
      case '4':
        # code...
        $Rowval14 = "April";
        break;
      case '5':
        # code...
        $Rowval14 = "May";
        break;
      case '6':
        # code...
        $Rowval14 = "June";
        break;
      case '7':
        # code...
        $Rowval14 = "July";
        break;
      case '8':
        # code...
        $Rowval14 = "August";
        break;
      case '9':
        # code...
        $Rowval14 = "September";
        break;
      case '10':
        # code...
        $Rowval14 = "October";
        break;
      case '11':
        # code...
        $Rowval14 = "November";
        break;
      case '12':
        # code...
        $Rowval14 = "December";
        break;
      default:
        # code...
        break;
    }



    $Rowval15 = date("Y");




    $Rowval26 = $sss_1;
    $Rowval27 = $ph_1;
    $Rowval28 = $Pagibig_1;
    $Rowval29 = $tin_1;

    $Rowval31 = $id_num1;
    $Rowval32 = $contk_num;
    $Rowval33 = $emp_no;

    $Rowval38 = $e_person;
    $Rowval39 = $e_add;
    $Rowval40 = $e_num;

    $Rowval41 = $bdate;


    //$Rowval35="rodeo villavicencio";
    //$Rowval36="rodeo villavicencio";
    //$Rowval37="Date - Division - Emp no  ";







    $PHPWord = new PHPWord();





    $document = $PHPWord->loadTemplate($LOAtemp);

    $document->setImageValue('foto', '_mars.jpg');
    $document->setValue('VAddress', $Rowvaladd);
    $document->setValue('Value1', $Rowval1);
    $document->setValue('Value2', $Rowval2);
    $document->setValue('Value3', $Rowval3);

    $document->setValue('Value4', $Rowval4);
    $document->setValue('Value5', $Rowval5);


    $document->setValue('Value6', $Rowval6);
    $document->setValue('Value7', $Rowval7);
    $document->setValue('Value8', $Rowval8);
    $document->setValue('Deo9', $Rowval9);
    $document->setValue('Value10', $Rowval10);
    $document->setValue('Value10c', $Rowval10c);
    $document->setValue('Value10a', $Rowval10a);
    $document->setValue('Value10b', $Rowval10b);




    $document->setValue('Value11a', $Rowval11a);
    $document->setValue('Value12', $Rowval12);



    $document->setValue('Value13', $Rowval13);
    $document->setValue('Value14', $Rowval14);
    $document->setValue('Value15', $Rowval15);

    $document->setValue('Value16', $Rowval16);
    $document->setValue('Value17', $Rowval17);

    $document->setValue('Value18', $Rowval18);
    $document->setValue('Value19', $Rowval19);

    $document->setValue('Value20', $Rowval20);
    $document->setValue('Value21', $Rowval21);

    $document->setValue('Value22', $Rowval22);
    $document->setValue('Value23', $Rowval23);

    $document->setValue('Value24', $Rowval24);
    $document->setValue('Value25', $Rowval25);



    $document->setValue('Value26', $Rowval26);
    $document->setValue('Value27', $Rowval27);
    $document->setValue('Value28', $Rowval28);
    $document->setValue('Value29', $Rowval29);

    $document->setValue('Value30', $Rowval30);

    $document->setValue('Value31', $Rowval31);
    $document->setValue('Value32', $Rowval32);

    $document->setValue('Value33', $Rowval33);
    $document->setValue('Value34', $Rowval34);
    // $document->setValue('Value35', $Rowval35);
    // $document->setValue('Value36', $Rowval36);
    //$document->setValue('Value37', $Rowval37);

    $document->setValue('Value38', $Rowval38);
    $document->setValue('Value39', $Rowval39);
    $document->setValue('Value40', $Rowval40);
    $document->setValue('Value41', $Rowval41);


    $document->save($filenamenya);

    //autodownload the file 
    // this includes the download.php
    header("location:download.php?download_file=" . $filenamenya);
  }

  ?>











</body>

</html>