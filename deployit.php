<?php
require_once './PHPWord.php';

include("connect.php");

session_start();

date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');
$datenow = date("m/d/Y h:i:s A");


if (isset($_POST['Back'])) {
  header("location:deployment.php");
}

if (isset($_POST['dl_loa'])) {

  echo $_SESSION["appno"];
  $appno = $_SESSION["appno"];



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

  $Rowval31 = $id_1;
  $Rowval32 = $contk_num;
  $Rowval33 = $emp_no;



  //$Rowval35="rodeo villavicencio";
  //$Rowval36="rodeo villavicencio";
  //$Rowval37="Date - Division - Emp no  ";




  $PHPWord = new PHPWord();

  $document = $PHPWord->loadTemplate($LOAtemp);


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




  $document->save($filenamenya);

  //autodownload the file 
  // this includes the download.php
  header("location:download.php?download_file=" . $filenamenya);
}





















if (isset($_POST['Regular'])) {


  $client_d1 = $_POST['client_d'];
  $address_d1 = $_POST['address_d'];
  $project_d1 = $_POST['project_d'];
  $shortlist_d1 = $_POST['shortlist_d'];
  $appno_d1 = $_POST['appno_d'];
  //$empno_d1 = $_POST['empno_d'];
  $deploy_stat1 = $_POST['deploy_stat'];
  $emp_startdate_d1 = $_POST['emp_startdate_d'];
  $emp_end_date_d1 = $_POST['emp_end_date_d'];
  $X1 = $_POST['X'];
  $Y1 = $_POST['Y'];
  $category_d1 = $_POST['category_d'];
  $locator_d1 = $_POST['locator_d'];
  $channel_d1 = $_POST['channel_d'];
  $employment_status_d1 = $_POST['employment_status_d'];
  $job_title_d1 = $_POST['job_title_d'];
  $loa_template_d1 = $_POST['loa_template_d'];
  $basic_salary_d1 = $_POST['basic_salary_d'];
  $ecola_d1 = $_POST['ecola_d'];
  $internet_allowance_d1 = $_POST['internet_allowance_d'];
  $meal_allowance_d1 = $_POST['meal_allowance_d'];
  $outbase_meal_d1 = $_POST['outbase_meal_d'];
  $comm_allowance1 = $_POST['comm_allowance'];
  $transpo_allowance1 = $_POST['transpo_allowance'];
  $deployment_remarks1 = $_POST['deployment_remarks'];
  $no_of_days_work_d1 = $_POST['no_of_days_work_d'];
  $outlet_d1 = $_POST['outlet_d'];
  $hrrep_d1 = $_POST['hrrep_d'];
  $hr_designation_d1 = $_POST['hr_designation_d'];
  $fs_d1 = $_POST['fs_d'];
  $deploying_personnel_d1 = $_POST['deploying_personnel_d'];
  $deploying_designation_d1 = $_POST['deploying_designation_d'];
  $project_supervisor_d1 = $_POST['project_supervisor_d'];
  $ps_designation_d1 = $_POST['ps_designation_d'];
  $head_d1 = $_POST['head_d'];
  $head_designation_d1 = $_POST['head_designation_d'];
  $idnum1 = $_POST['idnum'];
  $mandatory_status1 = $_POST['mandatory_status'];
  $date_created1 = $_POST['date_created'];
  $disqualified_date_d1 = $_POST['disqualified_date_d'];
  $desqualified_remarks_d1 = $_POST['desqualified_remarks_d'];


  switch ($employment_status_d1) {
    case 'Regular':
      # code...
      $empno_d1 = "R" . $appno_d1;

      break;

    case 'Probationary':
      # code...
      $empno_d1 = "P" . $appno_d1;
      break;

    case 'Project_Based':
      # code...
      $empno_d1 = "A" . $appno_d1;
      break;

    default:
      # code...
      $empno_d1 = "X" . $appno_d1;
      break;
  }


  // dito ka gumawa ng mga restriction kung mga blank



  //===================

  $resulttracking = mysqli_query($link, "SELECT * FROM track WHERE id = '2'");
  while ($rowtr = mysqli_fetch_array($resulttracking)) {
    //echo $rowtr[1]+1;
    $newloatracking = $rowtr[1] + 1;
    //echo $newtracking;



    mysqli_query($link, "UPDATE track
          SET
          
          appno = '$newloatracking'
          WHERE
          id = '2'
          ");

    $loanumber1 = $newloatracking;
  }


  //determine last loa, change val to blank inactive, affect history and dep database as active


  mysqli_query($link, "UPDATE deployment SET active = 'INACTIVE' WHERE appno_d = '$appno_d1' ");
  mysqli_query($link, "UPDATE deployment_history SET active = 'INACTIVE' WHERE appno_d = '$appno_d1' ");


  //===================


  mysqli_query($link, "INSERT INTO deployment
        (client_d,clientadd_d,project_d,shortlist_d,appno_d,empno_d,status_d,emp_startdate_d,emp_end_date,division_d,department_d,category_d,locator_d,channel_d,employment_status_d,job_title_d,loa_template_d,basic_salary_d,ecola_d,internet_allowance_d,meal_allowance_d,outbase_meal_d,comm_allowance,transpo_allowance,deployment_remarks,no_of_days_work_d,outlet_d,hr_manager_d,hr_designation,supervisor_d,deploying_personnel_d,deploying_designation_d,project_supervisor_d,ps_designation_d,head_d,head_designation_d,idnum,mandatory_status,date_created,disqualified_date_d,letter_remarks_d,loa_number,active)

        VALUES
        ('$client_d1','$address_d1','$project_d1','$shortlist_d1','$appno_d1','$empno_d1','$deploy_stat1','$emp_startdate_d1','$emp_end_date_d1','$X1','$Y1','$category_d1','$locator_d1','$channel_d1','$employment_status_d1','$job_title_d1','$loa_template_d1','$basic_salary_d1','$ecola_d1','$internet_allowance_d1','$meal_allowance_d1','$outbase_meal_d1','$comm_allowance1','$transpo_allowance1','$deployment_remarks1','$no_of_days_work_d1','$outlet_d1','$hrrep_d1','$hr_designation_d1','$fs_d1','$deploying_personnel_d1','$deploying_designation_d1','$project_supervisor_d1','$ps_designation_d1','$head_d1','$head_designation_d1','$idnum1','$mandatory_status1','$date_created1','$disqualified_date_d1','$desqualified_remarks_d1','$loanumber1','ACTIVE')
        ");



  mysqli_query($link, "INSERT INTO deployment_history
        (client_d,clientadd_d,project_d,shortlist_d,appno_d,empno_d,status_d,emp_startdate_d,emp_end_date,division_d,department_d,category_d,locator_d,channel_d,employment_status_d,job_title_d,loa_template_d,basic_salary_d,ecola_d,internet_allowance_d,meal_allowance_d,outbase_meal_d,comm_allowance,transpo_allowance,deployment_remarks,no_of_days_work_d,outlet_d,hr_manager_d,hr_designation,supervisor_d,deploying_personnel_d,deploying_designation_d,project_supervisor_d,ps_designation_d,head_d,head_designation_d,idnum,mandatory_status,date_created,disqualified_date_d,letter_remarks_d,loa_number,active)

        VALUES
        ('$client_d1','$address_d1','$project_d1','$shortlist_d1','$appno_d1','$empno_d1','$deploy_stat1','$emp_startdate_d1','$emp_end_date_d1','$X1','$Y1','$category_d1','$locator_d1','$channel_d1','$employment_status_d1','$job_title_d1','$loa_template_d1','$basic_salary_d1','$ecola_d1','$internet_allowance_d1','$meal_allowance_d1','$outbase_meal_d1','$comm_allowance1','$transpo_allowance1','$deployment_remarks1','$no_of_days_work_d1','$outlet_d1','$hrrep_d1','$hr_designation_d1','$fs_d1','$deploying_personnel_d1','$deploying_designation_d1','$project_supervisor_d1','$ps_designation_d1','$head_d1','$head_designation_d1','$idnum1','$mandatory_status1','$date_created1','$disqualified_date_d1','$desqualified_remarks_d1','$loanumber1','ACTIVE')
        ");



  mysqli_query($link, "UPDATE employees
          SET
          
          actionpoint = 'DEPLOYED',
          reasonofaction = '$project_d1',
          dateofaction='$datenow',
          end_con='$emp_end_date_d1'
          WHERE
          appno = '$appno_d1'
          ");


  // characterize, if old emp with attrition , clear ter, res, retreach at employee, put to attrition table


  $resultatt = mysqli_query($link, "select * from employees WHERE appno = '$appno_d1' ");

  while ($rowatt = mysqli_fetch_array($resultatt)) {
    //termination
    if ($rowatt[41] != "") {
      //insert to attrition table
      //clear terminaton record at employees table
      mysqli_query($link, "INSERT INTO attrition
                                (emp_no,start_dateto,end_dateto,project,positionto,e_date,by_hr,actionto,reasonto)

                                VALUES
                                ('$appno_d1','$emp_startdate_d1','$emp_end_date_d1','$project_d1','$job_title_d1','$rowatt[41]','$rowatt[42]','TERMINATION','$rowatt[46]')
                                ");



      mysqli_query($link, "UPDATE employees
                                  SET
                                  
                                  ter_date = '',
                                  ter_person = '',
                                  ter_reason=''
                                  WHERE
                                  appno = '$appno_d1'
                                  ");
    }
    //resignation
    if ($rowatt[43] != "") {
      //insert to attrition table
      //clear resignation record at employees table
      mysqli_query($link, "INSERT INTO attrition
                                (emp_no,start_dateto,end_dateto,project,positionto,e_date,by_hr,actionto,reasonto)

                                VALUES
                                ('$appno_d1','$emp_startdate_d1','$emp_end_date_d1','$project_d1','$job_title_d1','$rowatt[43]','$rowatt[44]','RESIGNATION','$rowatt[48]')
                                ");



      mysqli_query($link, "UPDATE employees
                                  SET
                                  
                                  res_date = '',
                                  res_person = '',
                                  res_reason=''
                                  WHERE
                                  appno = '$appno_d1'
                                  ");
    }
    //retrench
    if ($rowatt[49] != "") {
      //insert to attrition table
      //clear retrench record at employees table
      mysqli_query($link, "INSERT INTO attrition
                                (emp_no,start_dateto,end_dateto,project,positionto,e_date,by_hr,actionto,reasonto)

                                VALUES
                                ('$appno_d1','$emp_startdate_d1','$emp_end_date_d1','$project_d1','$job_title_d1','$rowatt[49]','$rowatt[50]','RETRENCH','$rowatt[51]')
                                ");



      mysqli_query($link, "UPDATE employees
                                  SET
                                  
                                  retrench_date = '',
                                  retrench_person = '',
                                  retrench_reason=''
                                  WHERE
                                  appno = '$appno_d1'
                                  ");
    }
  }
  $kekelpogi = "Applicant Deployed Successfuly";
  //header("location:deployment.php"); 
}
?>

<html>

<head>

  <title>HRS DEPLOYMENT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Julius+Sans+One&family=Poppins&family=Quicksand&family=Roboto&family=Thasadith&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="deo1.css">

  <style>
    * {
      font-family: 'Inter', sans-serif;
    }

    .how2s {
      padding-left: 30rem;
      padding-right: 30rem;
    }

    .many1s {
      width: 100%;
      display: block;
      margin: 1rem;
      padding: 2rem;
      box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.40) 0px 1px 3px 1px;
    }

    .col-md-12 .form-label {
      text-align: left;
      display: inline;
      /* float:left; */
    }
  </style>

</head>

<body>
  <div class="how2s">
    <div class="many1s">
      <br><br>
      <?php
      $shashort1x = $_SESSION["shashort"];
      $shaproject1x = $_SESSION["shaproject"];
      $shaclient1x = $_SESSION["shaclient"];
      $idto = $_SESSION["dark"];
      ?>

      <form action="" method="POST" class="row">
        <div class="col-md-12">
          <label class="form-label"> Select Status </label>
          <select class="form-select" name="deploy_stat" data-placeholder=""> ';
            <option></option>
            <?php
            $resultpro = mysqli_query($link, "SELECT * FROM deploy_status order by description ASC ");
            while ($rowpro = mysqli_fetch_array($resultpro)) {
              echo '<option  value="' . $rowpro[1] . '">' . $rowpro[1] . '</option>';
            }
            ?>
          </select>
        </div>
        <br>

        <div class="col-md-6 mt-3">
          <label class="form-label">Employee Start date</label>
          <input type="date" name="emp_startdate_d" class="form-control" placeholder="">
        </div>
        <br>

        <div class="col-md-6 mt-3">
          <label class="form-label">Employee End date</label>
          <input type="date" name="emp_end_date_d" class="form-control" placeholder="">
        </div>
        <br>

        <div class="col-md-4 mt-3">
          <label class="form-label">Division</label>
          <select class="form-select" name="X" id="X" data-placeholder=""> ';
            <?php
            echo '<option>Select Division:</option> ';
            $resultrg = mysqli_query($link, "SELECT * FROM divisions");
            while ($rowrg = mysqli_fetch_array($resultrg)) {
              echo '<option  value="' . $rowrg[1] . '">' . $rowrg[1] . ' </option> ';
            }
            ?>
          </select>
        </div>
        <br>

        <div class="col-md-4 mt-3">
          <label class="form-label"> Department </label>
          <select class="form-select" name="Y" id="Y" data-placeholder=""> 
            <?php
              echo '<option>Select Department:</option> ';
              $resultrg1 = mysqli_query($link, "SELECT * FROM department");
              while ($rowrg1 = mysqli_fetch_array($resultrg1)) {
                echo '<option  value="' . $rowrg1[1] . '">' . $rowrg1[1] . ' </option> ';
              }
            ?>
          </select>
        </div>
        <br>

        <div class="col-md-4 mt-3">
          <label class="form-label">Category</label>
          <select class="form-select" name="category_d" data-placeholder=""> 
            <?php
            echo '<option>Select Category:</option> ';
            $resultrg1 = mysqli_query($link, "SELECT * FROM categories");
            while ($rowrg1 = mysqli_fetch_array($resultrg1)) {
              echo '<option  value="' . $rowrg1[1] . '">' . $rowrg1[1] . ' </option> ';
            }
            ?>
          </select>
        </div>
        <br>

        <div class="col-md-12 mt-3">
          <label class="form-label">Locator</label>
          <input type="text" name="locator_d" value="<?php echo $idto; ?>" class="form-control" placeholder="" readonly>
        </div>
        <br>

        <div class="col-md-12 mt-3">
          <label class="form-label">Project Title</label>
          <input type="text" name="project_d" value="<?php echo $shaproject1x; ?>" class="form-control" placeholder="" readonly>
        </div>
        <br>

        <div class="col-md-12 mt-3">
          <label class="form-label">Client Address</label>
          <?php
          $resultcl = mysqli_query($link, "SELECT * FROM client_company where company_name='$shaclient1x'");
          while ($rowcl = mysqli_fetch_array($resultcl)) {
            echo '<input type="text" name = "address_d"  value="' . $rowcl[5] . '" class="form-control"  placeholder="" style= "height:35px;width:60%;" readonly> ';
          }
          ?>
        </div>
        <br>

        <div class="col-md-12 mt-3">
          <label class="form-label">Channel</label>
          <select class="form-select" name="channel_d" data-placeholder=""> ';
            <?php
            echo '<option>Select Channel:</option> ';
            $resultc = mysqli_query($link, "SELECT * FROM channels order by description ASC");
            while ($rowc = mysqli_fetch_array($resultc)) {
              echo '<option  value="' . $rowc[1] . '">' . $rowc[1] . ' </option> ';
            }
            ?>
          </select>
        </div>
        <br>

        <div class="col-md-12 mt-3">
          <label class="form-label">Employment Status</label>
          <select class="form-select" name="employment_status_d" data-placeholder=""> ';
            <?php
            echo '<option>Select Status:</option> ';
            $resultes = mysqli_query($link, "SELECT * FROM employment_status");
            while ($rowes = mysqli_fetch_array($resultes)) {
              echo '<option  value="' . $rowes[1] . '">' . $rowes[1] . ' </option> ';
            }
            ?>
          </select>
        </div>
        <br>

        <div class="col-md-12 mt-3">
          <label class="form-label">Job Title</label>
          <select class="form-select" name="job_title_d" data-placeholder=""> ';
            <?php
            echo '<option>Select JT:</option> ';
            $resultjt = mysqli_query($link, "SELECT * FROM job_title order by description ASC");
            while ($rowjt = mysqli_fetch_array($resultjt)) {
              echo '<option  value="' . $rowjt[2] . '">' . $rowjt[2] . ' </option> ';
            }
            ?>
          </select>
        </div>
        <br>

        <div class="col-md-12 mt-3">
          <label class="form-label">LOA Template</label>
          <select class="form-select" name="loa_template_d" data-placeholder=""> ';

            <?php
            echo '<option>Select template:</option> ';
            $resultl = mysqli_query($link, "SELECT * FROM loa_files where is_deleted ='0'  order by file_name ASC");
            while ($rowl = mysqli_fetch_array($resultl)) {
              echo '<option  value="' . $rowl[3] . '">' . $rowl[2] . ' </option> ';
            }
            ?>

          </select>
        </div>
        <br>

        <div class="col-md-12 mt-3">
          <label class="form-label">Basic Salary</label>
          <input type="text" name="basic_salary_d" class="form-control" placeholder="">
        </div>
        <br>

        <div class="col-md-12 mt-3">
          <label class="form-label">Ecola</label>
          <input type="text" name="ecola_d" class="form-control" placeholder="">
        </div>
        <br>

        <div class="col-md-12 mt-3">
          <label class="form-label">Internet Allowance</label>
          <input type="text" name="internet_allowance_d" class="form-control" placeholder="">
        </div>
        <br>

        <div class="col-md-12 mt-3">
          <label class="form-label">Meal Allowance</label>
          <input type="text" name="meal_allowance_d" class="form-control" placeholder="">
        </div>
        <br>

        <div class="col-md-12 mt-3">
          <label class="form-label">Outbase Meal</label>
          <input type="text" name="outbase_meal_d" class="form-control" placeholder="">
        </div>
        <br>

        <div class="col-md-12 mt-3">
          <label class="form-label">Comm Allowance</label>
          <input type="text" name="comm_allowance" class="form-control" placeholder="">
        </div>
        <br>

        <div class="col-md-12 mt-3">
          <label class="form-label">Transpo ALlowance</label>
          <input type="text" name="transpo_allowance" class="form-control" placeholder="">
        </div>

        <br>
        <div class="col-md-12 mt-3">
          <label class="form-label">Deployment Remarks</label>
          <input type="text" name="deployment_remarks" class="form-control" placeholder="">
        </div>

        <br>
        <div class="col-md-12 mt-3">
          <label class="form-label">No of Days Worked</label>
          <input type="text" name="no_of_days_work_d" class="form-control" placeholder="">
        </div>

        <br>
        <div class="col-md-12 mt-3">
          <label class="form-label">Outlet</label>
          <input type="text" name="outlet_d" class="form-control" placeholder="">
        </div>

        <br>
        <div class="col-md-12 mt-3">
          <label class="form-label">HR Representative</label>
          <input type="text" name="hrrep_d" class="form-control" placeholder="">
        </div>

        <br>
        <div class="col-md-12 mt-3">
          <label class="form-label">HR Designation</label>
          <input type="text" name="hr_designation_d" class="form-control" placeholder="">
        </div>

        <br>
        <div class="col-md-12 mt-3">
          <label class="form-label">Field Supervisor</label>
          <input type="text" name="fs_d" class="form-control" placeholder="">
        </div>

        <br>
        <div class="col-md-12 mt-3">
          <label class="form-label">Deployed By</label>
          <input type="text" name="deploying_personnel_d" class="form-control" placeholder="">
        </div>

        <br>
        <div class="col-md-12 mt-3">
          <label class="form-label">Designation</label>
          <input type="text" name="deploying_designation_d" class="form-control" placeholder="">
        </div>

        <br>
        <div class="col-md-12 mt-3">
          <label class="form-label">Project Supervisor</label>
          <input type="text" name="project_supervisor_d" class="form-control" placeholder="">
        </div>

        <br>
        <div class="col-md-12 mt-3">
          <label class="form-label">Designation</label>
          <input type="text" name="ps_designation_d" class="form-control" placeholder="">
        </div>

        <br>
        <div class="col-md-12 mt-3">
          <label class="form-label">Head</label>
          <input type="text" name="head_d" class="form-control" placeholder="">
        </div>

        <br>
        <div class="col-md-12 mt-3">
          <label class="form-label">Designation</label>
          <input type="text" name="head_designation_d" class="form-control" placeholder="">
        </div>

        <br>
        <div class="col-md-12 mt-3">
          <label class="form-label">ID Number</label>
          <input type="number" name="idnum" class="form-control" placeholder="">
        </div>

        <br>
        <div class="col-md-12 mt-3">
          <label class="form-label">Creation Date</label>
          <input type="text" name="date_created" value="<?php echo $datenow; ?>" class="form-control" placeholder="" readonly>
        </div>
        <br>

        <div class="col-md-12 mt-4">
          <input type="hidden" name="client_d" value="<?php echo $shaclient1x; ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          <input type="hidden" name="shortlist_d" value="<?php echo $shashort1x; ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          <input type="hidden" name="appno_d" value="<?php echo $idto; ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          <input type="hidden" name="empno_d" value="<?php echo "e" . $idto; ?>" class="form-control" placeholder="" style="height:45px;width:60%;">
          <input type="hidden" name="mandatory_status" class="form-control" placeholder="" style="height:45px;width:60%;">
          <input type="hidden" name="disqualified_date_d" class="form-control" placeholder="" style="height:45px;width:60%;">
          <input type="hidden" name="desqualified_remarks_d" class="form-control" placeholder="" style="height:45px;width:60%;"><br><br>
          <input type="submit" name="Regular" value="Deploy It" class="btn btn-primary">
          <input type="submit" name="Back" value="Back" onclick="history.back()" class="btn btn-secondary">
        </div>
      </form>
    </div>

</body>

</html>


<?php

if (isset($kekelpogi)) {
  echo '<div class = "how2"><div class = "many2">
  <br><br> 

    ';


  $_SESSION["appno"] = $appno_d1;
  echo '
      <h3>' . $kekelpogi . '</h3><br><br><br>
    <form action = "" method = "POST"><br>
       <input type = "submit" name = "dl_loa" value = "Download LOA" class="btn btn-info">

       <input type = "submit" name = "Back" value = "Close" class="btn btn-secondary ">
       
    </form>
    
  </div></div>';
}

?>





<script language="JavaScript">
  $("#X").on("change", function() {

    var x_values = $("#X").find(":selected").val();

    $.ajax({
      url: 'ajax.php',
      type: 'POST',
      //dataType:'JSON',
      data: {
        city_code: x_values
      },
      success: function(result) {

        result = JSON.parse(result);

        //Empty option on change
        var select = document.getElementById("Y");
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
          var select = document.getElementById("Y");
          select.appendChild(option);
        });
      },

      error: function(result) {
        console.log(result)
      }
    });

  });



  $("#project_d").on("change", function() {

    var x1_values = $("#project_d").find(":selected").val();

    $.ajax({
      url: 'ajax1.php',
      type: 'POST',
      //dataType:'JSON',
      data: {
        city_code1: x1_values
      },
      success: function(result) {

        result = JSON.parse(result);

        //Empty option on change
        var select = document.getElementById("address_d");
        var length = select.options.length;

        for (i = length - 1; i >= 0; i--) {
          select.options[i] = null;
        }
        //end

        result.forEach(function(item, index) {

          //console.log(item[2]);

          var option = document.createElement("option");
          option.text = item['city_name1'];
          option.value = item['city_name1'];
          var select = document.getElementById("address_d");
          select.appendChild(option);
        });
      },

      error: function(result) {
        console.log(result)
      }
    });

  });
</script>