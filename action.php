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

    if ($updateQueryResult) {
        $_SESSION['successMessage'] = "Update Successful!";
        header("Location: recruitment.php");
    } else {
        $_SESSION['errorMessage'] = "Update Error!";
        header("Location: recruitment.php");
    }
}


//   For Blacklisting
if (isset($_POST['blacklist_button'])) {
    $id = $_POST['blacklistID'];
    $blacklistreason = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['reason']))));
    $datenow = date("m/d/Y");
    $actionpoint = "BLACKLISTED";

    $blacklist_query = "UPDATE employees SET actionpoint = '$actionpoint', reasonofaction = '$blacklistreason', dateofaction = '$datenow' WHERE id = '$id'";
    $blacklist_result = mysqli_query($link, $blacklist_query);

    if ($blacklist_result) {
        $queryem = "SELECT * FROM employees WHERE id = '$id'";
        $resultem = mysqli_query($link, $queryem);
        while ($rowem = mysqli_fetch_array($resultem)) {

            $blacklist_history_query = "INSERT INTO blacklist_history(tracking,photopath,dapplied,appno,source,lastnameko,firstnameko,mnko,extnname,paddress,cityn,regionn,peraddress,birthday,age,gendern,civiln,cpnum,landline,emailadd,despo,classn,idenn,sssnum,pagibignum,phnum,tinnum,policed,brgyd,nbid,psa,remarks,actionpoint,reasonofaction,dateofaction)
                VALUES ('$rowem[1]','$rowem[2]','$rowem[3]','$rowem[4]','$rowem[5]','$rowem[6]','$rowem[7]','$rowem[8]','$rowem[9]','$rowem[10]','$rowem[11]','$rowem[12]','$rowem[13]','$rowem[14]','$rowem[15]','$rowem[16]','$rowem[17]','$rowem[18]','$rowem[19]','$rowem[20]','$rowem[21]','$rowem[22]','$rowem[23]','$rowem[24]','$rowem[25]','$rowem[26]','$rowem[27]','$rowem[28]','$rowem[29]','$rowem[30]','$rowem[31]','$rowem[32]','$actionpoint1','$blacklistreason1','$datenow')";
            $blacklist_history_result = mysqli_query($link, $blacklist_history_query);

            if ($blacklist_history_result) {
                $_SESSION['successMessage'] = "Blacklist successfully!";
                header("Location: recruitment.php");
            } else {
                $_SESSION['errorMessage'] = "Blacklist error!";
                header("Location: recruitment.php");
            }
        }
    }
}

// For Deleting Applicants. Change status to canceled but not totally deleted in database for records purposes
if (isset($_POST['delete_applicant_button'])) {
    $id = $_POST['delete_applicant_ID'];
    $delete_applicant_reason = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['reason']))));
    $datenow = date("m/d/Y");
    $actionpoint = "CANCELED";

    $delete_applicant_query = "UPDATE employees SET actionpoint = '$actionpoint', reasonofaction = '$delete_applicant_reason', dateofaction = '$datenow' WHERE id = '$id'";
    $delete_applicant_result = mysqli_query($link, $delete_applicant_query);

    if ($delete_applicant_result) {
        $_SESSION['successMessage'] = "Successfully Deleted!";
        header("Location: recruitment.php");
    } else {
        $_SESSION['errorMessage'] = "Delete error!";
        header("Location: recruitment.php");
    }
}

// For Undo Blacklisted Applicants
if (isset($_POST['undo_button_click'])) {
    $undo_blacklisted_id = $_POST['undoblacklist_id'];
    $undo_blacklist = "UPDATE employees SET actionpoint = '', reasonofaction = '', dateofaction = '' WHERE id = '$undo_blacklisted_id'";

    $result_editblacklist = mysqli_query($link, $undo_blacklist);

    if ($result_editblacklist) {
        $_SESSION['successMessage'] = "Blacklist reverted";
        header("Location: recruitment.php");
    } else {
        $_SESSION['errorMessage'] = "Error";
        header("Location: recruitment.php");
    }
}

// For creating shortlist title
if (isset($_POST['createshortlist'])) {
    $dtnow = date("m/d/Y");

    $projecttitle1 = $_POST['projecttitle'];
    $newshortlist1 = $_POST['newshortlist'];

    if (!empty($projecttitle1) || !empty($newshortlist1)) {
        $querymo = "SELECT * FROM projects where id = '$projecttitle1'";
        $resultmo = mysqli_query($link, $querymo);
        while ($rowmo = mysqli_fetch_assoc($resultmo)) {
            $project_t = $rowmo['project_title'];
            $client_t = $rowmo['client_company_id'];
        }

        $queryns = "select * from shortlist_details WHERE shortlistname = '$newshortlist1'";
        $resultns = mysqli_query($link, $queryns);

        if (mysqli_num_rows($resultns) == 0) {
            // kapag wala pang user name na kaparehas

            $query = "INSERT INTO shortlist_details(shortlistname,project,client,datecreated,activity) VALUES('$newshortlist1','$project_t','$client_t','$dtnow','ACTIVE')";
            $result = mysqli_query($link, $query);

            if ($result) {
                $_SESSION['successMessage'] = "Shortlist Created";
                header("Location: recruitment.php");
            } else {
                $_SESSION['errorMessage'] = "Error in creating shortlist title";
                header("Location: recruitment.php");
            }
        } else {
            $_SESSION['errorMessage'] = "unable to create shortlist, name not unique !";
        }
    } else {
        $_SESSION['errorMessage'] = "Fields must be Filled";
        header("Location: recruitment.php");
    }
}


// For adding applicants to shortlist
if (isset($_POST['add_shortlist_click'])) {
    $id1 = $_POST['appno_id_click'];
    $data = $_SESSION["data"];

    // echo "Reached here";

    $querytac = "SELECT * FROM employees WHERE appno = '$id1'";
    $resultac = mysqli_query($link, $querytac);
    while ($rowac = mysqli_fetch_assoc($resultac)) {

        if ($rowac['actionpoint'] === "ACTIVE") {
            $query1 = "UPDATE employees SET actionpoint = 'SHORTLISTED' WHERE appno = '$id1'";
            $results1 = mysqli_query($link, $query1);

            if ($results1) {
                $dtnow = date("m/d/Y");

                $querychk = "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data' AND appnumto = '$id1' ";
                $resultchk = mysqli_query($link, $querychk);
                if (mysqli_num_rows($resultchk) === 0) {
                    // kapag wala pang user name na kaparehas
                    $query2 = "INSERT INTO shortlist_master(shortlistnameto, appnumto, dateto) VALUES('$data', '$id1', '$dtnow')";
                    $results2 = mysqli_query($link, $query2);
                    if ($results2) {
                        $response = array('message' => 'Successfully added to the shortlist');
                        echo json_encode($response);
                        exit;
                    } else {
                        $response = array('message' => 'Not Added due to Duplication!');
                        echo json_encode($response);
                        exit;
                    }
                } else {
                    $response = array('message' => 'Not Added due to Duplication!');
                    echo json_encode($response);
                    exit;
                }
            } else {
                $_SESSION['errorMessage'] = "Not Added due to duplication!";
                error_log("Query 1 failed: " . mysqli_error($link));
                // You can also include more detailed error information in your JSON response.
                $response = array('message' => 'Error: Query 1 failed');
                echo json_encode($response);
                exit;
            }
        } else {
            $dtnow = date("m/d/Y");
            $querychk = "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data' AND appnumto='$id1' ";
            $resultchk = mysqli_query($link, $querychk);
            if (mysqli_num_rows($resultchk) == 0) {
                // kapag wala pang user name na kaparehas
                $query3 = "INSERT INTO shortlist_master(shortlistnameto,appnumto,dateto) VALUES('$data','$id1','$dtnow')";
                $results3 = mysqli_query($link, $query3);

                if ($results3) {
                    $response = array('message' => 'Successfully added to the shortlist');
                    echo json_encode($response);
                    exit;
                } else {
                    $response = array('message' => 'Not Added due to Duplication!');
                    echo json_encode($response);
                    exit;
                }
            } else {
                $response = array('message' => 'Not Added due to Duplication!');
                echo json_encode($response);
                exit;
            }
        }
    }
}

// For untermination of applicants
if (isset($_POST['unterminate_applicant_button'])) {

    $emp_number1 = $_POST['unterminate_applicant_ID'];
    $unter_reason1 = mysqli_real_escape_String($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['reason']))));

    $unterminate_query = "UPDATE employees SET actionpoint = 'EWB', unter_reason = '$unter_reason1', reasonofaction = '$unter_reason1' WHERE appno = '$emp_number1'";
    $resultemp = mysqli_query($link, $unterminate_query);

    if($resultemp){
        $_SESSION['succesMessage'] = "Untermination successful";
        header("Location: recruitment.php");
    }
    else{
        $_SESSION['errorMessage'] = "Untermination error!";
        header("Location: recruitment.php");
    }
}
