<?php

include 'connect.php';
session_start();

// For Inserting Applicant in database
if (isset($_POST['next'])) {
    $photoko2 = $_SESSION["photoko"];
    $dapplied1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['dapplied']))));
    $appno1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['appnoko']))));
    $source1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['source']))));
    $lastnameko1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['lastnameko']))));
    $firstnameko1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['firstnameko']))));
    $mnko1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['mnko']))));
    $extnname1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['extnname']))));
    $paddress1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['paddress']))));
    $cityn1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['cityn']))));
    $regionn1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['regionn']))));
    $peraddress1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['peraddress']))));
    $birthday1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['birthday']))));
    $dateOfBirth = $birthday1;
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $age1 = $diff->format("%y");
    $datebirth = date_create($birthday1);
    $birthday1a = date_format($datebirth, "m/d/Y");
    $gendern = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['gendern']))));
    $civiln1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['civiln']))));
    $cpnum1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['cpnum']))));
    $landline1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['landline']))));
    $emailadd1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['emailadd']))));
    $despo1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['despo']))));
    $classn1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['classn']))));
    $idenn1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['idenn']))));
    $sssnum1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['sssnum']))));
    $pagibignum1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['pagibignum']))));
    $phnum1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['phnum']))));
    $tinnum1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['tinnum']))));
    $e_person1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['e_person']))));
    $e_address1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['e_address']))));
    $e_contact1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['e_contact']))));
    $policed1x = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['policed']))));
    $datepol = date_create($policed1x);
    $policed1 = date_format($datepol, "m/d/Y");
    $brgyd1x = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['brgyd']))));
    $datebrgy = date_create($brgyd1x);
    $brgyd1 = date_format($datebrgy, "m/d/Y");
    $nbid1x = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['nbid']))));
    $datenbi = date_create($nbid1x);
    $nbid1 = date_format($datenbi, "m/d/Y");
    $psa1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['psa']))));
    $remarks1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['remarks']))));
    $resultempl = mysqli_query($link, "select * from employees WHERE lastnameko = '$lastnameko1' and firstnameko ='$firstnameko1' and mnko='$mnko1'");

    if (mysqli_num_rows($resultempl) === 0) {
        $InsertApplicantQuery = "INSERT INTO employees
      (tracking,photopath,dapplied,appno,source,lastnameko,firstnameko,mnko,extnname,paddress,cityn,regionn,peraddress,birthday,age,gendern,civiln,cpnum,landline,emailadd,despo,classn,idenn,sssnum,pagibignum,phnum,tinnum,policed,brgyd,nbid,psa,remarks,e_person,e_address,e_number)
      VALUES
      ('$appno1','$photoko2','$dapplied1','$appno1','$source1','$lastnameko1','$firstnameko1','$mnko1','$extnname1','$paddress1','$cityn1','$regionn1','$peraddress1','$birthday1','$age1','$gendern','$civiln1','$cpnum1','$landline1','$emailadd1','$despo1','$classn1','$idenn1','$sssnum1','$pagibignum1','$phnum1','$tinnum1','$policed1x','$brgyd1x','$nbid1x','$psa1','$remarks1','$e_person1','$e_address1','$e_contact1')
      ";
        $InsertApplicantResult = mysqli_query($link, $InsertApplicantQuery);

        if ($InsertApplicantResult) {
            $_SESSION['successMessage'] = "Successful!";
            header("Location: recruitment.php");
        } else {
            $_SESSION['errorMessage'] = "Error in inserting applicant";
            header("Location: recruitment.php");
        }
    } else {
        $_SESSION['errorMessage'] = "Applicant is in Database!";
        header("Location: recruitment.php");
    }
}

// For Updating Applicant in database
if (isset($_POST['updateit'])) {
    $id1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['shadowEdit']))));
    $source1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['source']))));
    $lastnameko1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['lastnameko']))));
    $firstnameko1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['firstnameko']))));
    $mnko1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['mnko']))));
    $extnname1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['extnname']))));
    $paddress1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['paddress']))));
    $cityn1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['cityn']))));
    $regionn1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['regionn']))));
    $peraddress1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['peraddress']))));
    $birthday1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['birthday']))));
    $dateOfBirth = $birthday1;
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $age1 = $diff->format("%y");
    $datebirth = date_create($birthday1);
    $birthday1a = date_format($datebirth, "m/d/Y");
    $gendern = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['gendern']))));
    $civiln1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['civiln']))));
    $cpnum1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['cpnum']))));
    $landline1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['landline']))));
    $emailadd1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['emailadd']))));
    $despo1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['despo']))));
    $classn1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['classn']))));
    $idenn1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['idenn']))));
    $sssnum1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['sssnum']))));
    $pagibignum1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['pagibignum']))));
    $phnum1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['phnum']))));
    $tinnum1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['tinnum']))));
    $e_person1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['e_person']))));
    $e_address1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['e_address']))));
    $e_contact1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['e_contact']))));
    $policed1x = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['policed']))));
    $datepol = date_create($policed1x);
    $policed1 = date_format($datepol, "m/d/Y");
    $brgyd1x = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['brgyd']))));
    $datebrgy = date_create($brgyd1x);
    $brgyd1 = date_format($datebrgy, "m/d/Y");
    $nbid1x = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['nbid']))));
    $datenbi = date_create($nbid1x);
    $nbid1 = date_format($datenbi, "m/d/Y");
    $psa1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['psa']))));
    $remarks1 = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['remarks']))));

    $updateQuery = "UPDATE employees
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
    WHERE id = '$id1'";
    $updateQueryResult = mysqli_query($link, $updateQuery);

    if($updateQueryResult){
        $_SESSION['successMessage'] = "Update Successful!";
        header("Location: recruitment.php");
    }
    else{
        $_SESSION['errorMessage'] = "Update Error!";
        header("Location: recruitment.php");
    }
    
  }
