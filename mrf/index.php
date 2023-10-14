<?php
include '../connect.php';
session_start();

date_default_timezone_set('Asia/Hong_Kong');
$datenow = date("m/d/Y h:i:s A");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito&family=Inter&family=Julius+Sans+One&family=Poppins&family=Quicksand:wght@400;500&family=Roboto&family=Thasadith&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">
    <title>MRF</title>

    <style>
        .modal-body {
            font-family: 'Gabarito', sans-serif;
        }

        .form-check-label {
            font-size: 15px;
        }

        .form-check-input {
            font-size: 16px;
            margin-top: .50em !important;
        }

        #otherPersonality,
        .salary_package {
            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: 1px solid black;
            border-radius: 0;
        }
    </style>
</head>

<body>
    <?php
    if ($_SESSION['darkk'] === "mrf") {
    ?>

        <header class="cd-main-header js-cd-main-header">
            <div class="cd-logo-wrapper">
                <a href="#0" class="cd-logo"><img src="../assets/img/pcnlogo1.png" alt="Logo"></a>
            </div>
            <button class="reset cd-nav-trigger js-cd-nav-trigger" aria-label="Toggle menu"><span></span></button>

            <ul class="cd-nav__list js-cd-nav__list">
                <li class="cd-nav__item cd-nav__item--has-children cd-nav__item--account js-cd-item--has-children">
                    <a href="">
                        <img src="../assets/img/cd-avatar.svg" alt="avatar">
                        <span>Account</span>
                    </a>
                    <form action="" method="POST">
                        <ul class="cd-nav__sub-list">
                            <li class="cd-nav__sub-item"><a href="#0">Edit Account</a></li>
                            <li class="cd-nav__sub-item"><button class="btn btn-primary button2" name="to_index" style="font-size:14;">Log out</button></li>
                        </ul>
                    </form>
                </li>
            </ul>
        </header>


        <main class="cd-main-content" style="width: 100%;">
            <nav class="cd-side-nav js-cd-side-nav">
                <ul class="cd-side__list js-cd-side__list">
                    <li class="cd-side__label" style="font-size:26"><span>MANPOWER REQUEST FORM MENU</span></li>
                    <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
                        <a href="">REPORTS</a>

                        <ul class="cd-side__sub-list">

                            <form action="" method="POST">
                                <li class="cd-side__btn"><BUTTON class="btn" name="viewdatabase" style="font-size:14; width:150px;height:50px">Presently Deployed</button></li>
                            </form>

                            <li class="cd-side__btn"><button class="btn" data-bs-toggle="modal" data-bs-target="#myModaldephistory" style="font-size:14; width:150px;height:50px">Employee History</button></li>
                            <li class="cd-side__btn"><button class="btn" data-bs-toggle="modal" data-bs-target="#myModalprojecthistory" style="font-size:14; width:150px;height:50px">Project History</button></li>
                        </ul>
                    </li>

                    <li class="cd-side__item cd-side__item--has-children cd-side__item--bookmarks js-cd-item--has-children">
                        <ul class="cd-side__sub-list">
                            <form action="" method="POST">
                                <li class="cd-side__btn"><BUTTON class="btn" name="summarygender" style="font-size:14; width:150px;height:50px">Gender</button></li>
                            </form>
                            <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModalgender">+ Gender</button></li>

                            <li class="cd-side__btn"><button class="btn" data-bs-toggle="modal" data-bs-target="#myModaldephistory" style="font-size:14; width:150px;height:50px">Employee History</button></li>
                            <li class="cd-side__btn"><button class="btn" data-bs-toggle="modal" data-bs-target="#myModalprojecthistory" style="font-size:14; width:150px;height:50px">Project History</button></li>
                        </ul>
                    </li>

                </ul>

                <ul class="cd-side__list js-cd-side__list">
                    <form action="" method="POST">
                        <li class="cd-side__label"><span>MRF ACTION</span></li>

                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#mrfform"><i class="bi bi-ui-checks" style="margin-right: 1rem;"></i> MRF Form</button></li>
                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal_id"><i class="bi bi-file-plus" style="margin-right: .5rem !important"></i> Create ID</button></li>
                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal_LOA"><i class="bi bi-person-lines-fill" style="margin-right: .5rem !important"></i> LOA</button></li>
                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal_xletter"><i class="bi bi-envelope" style="margin-right: .5rem !important"></i> Excuse Letter</button></li>
                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModalter"><i class="bi bi-terminal-x" style="margin-right: .5rem !important"></i> Terminate</button></li>
                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModalres"><i class="bi bi-person-x" style="margin-right: .5rem !important"></i> Resign</button></li>
                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal_retrench"><i class="bi bi-person-dash" style="margin-right: .5rem !important"></i> Retrench</button></li>
                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal_float"><i class="bi bi-person-up" style="margin-right: .5rem !important"></i> Float</button></li>
                        <li class="cd-side__btn"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModalewb"><i class="bi bi-layer-forward" style="margin-right: .5rem !important"></i> Forward to EWB</button></li>
                    </form>
                </ul>
            </nav>



            <!-- Modal for MRF Form -->
            <div class="modal fade" id="mrfform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <img src="../assets/img/pcnlogo1.png" alt="">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <center>
                                <h2 class="fs-3 mb-5">MANPOWER REQUISITION FORM (MRF)</h2>
                            </center>
                            <form action="action.php" method="post" class="row">
                                <center>
                                    <h4 class="fs-4">PROJECT DETAILS</h4>
                                </center>
                                <div class="col-md-4 mt-3">
                                    <label for="" class="form-label">MRF Type</label>
                                    <select name="mrf_type" id="mrf_type" onchange="validate_type()" class="form-select cbo" required>
                                        <option value="" selected disabled></option>
                                        <option value="INHOUSE">INHOUSE</option>
                                        <option value="FIELD FORCE">FIELD FORCE</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="" class="form-label">Client</label>
                                    <hr>
                                    <select name="client" id="client" class="form-select" required>
                                        <option value="" selected disabled></option>
                                        <?php
                                        $query = "SELECT * FROM client_company WHERE is_deleted = '0' ORDER BY company_name ASC";
                                        $result = $link->query($query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['company_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="" class="form-label">Location</label>
                                    <select name="location" id="location" class="form-select" required>
                                        <option value="" selected disabled></option>
                                        <option value="NCR">NCR</option>
                                        <option value="PROVINCIAL">PROVINCIAL</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="" class="form-label">Project Title</label>
                                    <select name="projectTitle" id="projectTitle" class="form-select" required>
                                        <option value="" selected disabled></option>
                                        <?php
                                        $query = "SELECT * FROM projects WHERE status = '1' AND is_deleted = '0'";
                                        $result = $link->query($query);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <option value="<?php echo $row['project_title']; ?>"><?php echo $row['project_title']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="" class="form-label">Division</label>
                                    <select name="division" id="division" class="form-select" required>
                                        <option value="" disabled selected></option>
                                        <option value="BD1">BD1</option>
                                        <option value="BD2">BD2</option>
                                        <option value="BD3">BD3</option>
                                        <option value="FINANCE">FINANCE</option>
                                        <option value="HRD">HRD</option>
                                        <option value="BSG">BSG</option>
                                        <option value="PPI">PPI</option>
                                        <option value="STRAT">STRAT</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="" class="form-label">CE Number</label>
                                    <select name="ce_number" id="ce_number" class="form-select" required>
                                        <option value="" selected disabled></option>
                                        <option value="Test">Select this for temporary</option>
                                    </select>
                                </div>

                                <!-- FOR POSITION -->
                                <center>
                                    <h4 class="fs-4 mt-4">POSITION</h4>
                                </center>
                                <div class="row cs1">
                                    <div class="col-md-12">
                                        <div class="form-group" id="inhouse">
                                            <select class="form-select cbo" name="position" id="position"> ;
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
                                        <input type="text" name="other_position" id="other_position" class="form-control" onfocusout="myFunction_focusout()">
                                    </div>
                                </div>
                                <!--=================================================================================-->
                                <div class="form-group" id="field">
                                    <div class="row cs1">
                                        <div class="column ">
                                            <div class="containerx ">
                                                  <label class="form-control">
                                                    <input type="radio" name="radio" value="Push Girl" />
                                                    Push Girl
                                                </label>
                                                <label class="form-control">
                                                    <input type="radio" name="radio" value="Demo Girl"/>
                                                    Demo Girl
                                                </label>
                                                <label class="form-control">
                                                    <input type="radio" name="radio" value="Promo Girl"/>
                                                    Promo Girl
                                                </label>
                                                <label class="form-control">
                                                    <input type="radio" name="radio" value="Sampler"/>
                                                    Sampler
                                                </label>
                                            </div>
                                        </div>

                                        <div class="column" >
                                            <div class="containerx">

                                                  <label class="form-control">
                                                    <input type="radio" name="radio" value="Merchandiser"/>
                                                    Merchandiser
                                                </label>

                                                <label class="form-control">
                                                    <input type="radio" name="radio" value="Helper"/>
                                                    Helper
                                                </label>

                                                <label class="form-control">
                                                    <input type="radio" name="radio" value="Mystery Buyer"/>
                                                    Mystery Buyer
                                                </label>

                                                <label class="form-control">
                                                    <input type="radio" name="radio" value="Validator">
                                                    Validator
                                                </label>
                                            </div>
                                        </div>

                                        <div class="column">
                                            <div class="containerx">

                                                  <label class="form-control">
                                                    <input type="radio" name="radio" value="Promoter"/>
                                                    Promoter
                                                </label>

                                                <label class="form-control">
                                                    <input type="radio" name="radio" value="Encoder"/>
                                                    Encoder
                                                </label>

                                                <label class="form-control">
                                                    <input type="radio" name="radio" value="Coordinator"/>
                                                    Coordinator
                                                </label>

                                                <label class="form-control">
                                                    <input type="radio" name="radio" value="Bundler">
                                                    Bundler
                                                </label>
                                            </div>
                                        </div>

                                        <div class="column">
                                            <div class="containerx">
                                                <br>
                                                <h5>Others</h5>
                                                <p>Please Specify</p>

                                                <input type="text" name="other_position1" id="other_position1" value="" class="form-control" onfocusout="myFunction_focusout()">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- FOR JOB REQUIREMENTS -->
                                <center>
                                    <h4 class="fs-4 mt-4">JOB REQUIREMENTS / QUALIFICATIONS</h4>
                                </center>
                                <label for="" class="form-label mt-3">No. of People</label>
                                <div class="col-md-6">
                                    <input type="text" name="number_male" id="number_male" placeholder="Male" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="number_female" id="number_female" placeholder="Female" class="form-control">
                                </div>

                                <label for="" class="form-label mt-3">Height Requirements</label>
                                <div class="col-md-6">
                                    <input type="text" name="height_male" id="height_male" placeholder="Male" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="height_female" id="height_female" placeholder="Female" class="form-control">
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label for="" class="form-label">Educational Background</label>
                                    <select name="educational_background" id="educational_background" class="form-select" required>
                                        <option value="" selected disabled></option>
                                        <option value="High School Graduate">High School Graduate</option>
                                        <option value="College Level">College Level</option>
                                        <option value="College Graduate">College Graduate</option>
                                        <option value="Vocational">Vocational</option>
                                    </select>
                                </div>

                                <!-- PERSONALITY -->
                                <label for="" class="form-label mt-4">Personality</label>
                                <div class="col-md-12 form-check">
                                    <input type="checkbox" name="pleasing_personality" id="pleasing_personality" value="Pleasing Personality" class="form-check-input">
                                    <label for="pleasing_personality" class="form-check-label">Pleasing Personality</label>
                                </div>
                                <div class="col-md-12 form-check">
                                    <input type="checkbox" name="good_moral" id="good_moral" value="Good Moral" class="form-check-input">
                                    <label for="" class="form-check-label">With Good Moral Character</label>
                                </div>
                                <div class="col-md-12 form-check">
                                    <input type="checkbox" name="work_experience" id="work_experience" value="With Work Experience" class="form-check-input">
                                    <label for="" class="form-check-label">With Work Experience</label>
                                </div>
                                <div class="col-md-12 form-check">
                                    <input type="checkbox" name="good_communication" id="good_communication" value="Good communication skills" class="form-check-input">
                                    <label for="" class="form-check-label">Good Communication Skills</label>
                                </div>
                                <div class="col-md-12 form-check">
                                    <input type="checkbox" name="physically_fit" id="physically_fit" value="Physically fit / good built" class="form-check-input">
                                    <label for="" class="form-check-label">Physically Fit / Good Build</label>
                                </div>
                                <div class="col-md-12 form-check">
                                    <input type="checkbox" name="articulate" id="articulate" value="Articulate" class="form-check-input">
                                    <label for="" class="form-check-label">Articulate</label>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-1">
                                        <label for="" class="form-label">Others</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" name="other_personality" id="other_personality" class="form-control">
                                    </div>
                                </div>

                                <!-- For JOB / WORK DETAILS -->
                                <center>
                                    <h4 class="fs-4 mt-5">WORK DETAILS</h4>
                                    <label for="" class="form-label mt-4 fs-6">Salary Package</label>
                                </center>

                                <div class="row mt-3">
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Basic Salary: </label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control salary_package" name="basic_salary" id="basic_salary" required>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="" class="form-label">Transpo Allowance: </label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control salary_package" name="transportation_allowance" id="transportation_allowance" required>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="" class="form-label">Meal Allowance: </label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control salary_package" name="meal_allowance" id="meal_allowance" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Comm. Allowance: </label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control salary_package" name="communication_allowance" id="communication_allowance" required>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="" class="form-label">Others: </label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control salary_package" name="other_salary_package" id="other_salary_package">
                                    </div>
                                </div>

                                <center>
                                    <div class="col-md-8 mt-4">

                                        <label for="" class="form-label mt-3 fs-6">Employment Status</label>

                                        <select name="employment_status" id="employment_status" class="form-select">
                                            <option value="" selected disabled></option>
                                            <option value="Project Based">Project Based</option>
                                            <option value="Probationary">Probationary (180 Days)</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Co-Terminus">Co-Terminus</option>
                                        </select>
                                    </div>
                                </center>

                                <div class="col-md-12 mt-4">
                                    <center>
                                        <label for="" class="form-label mt-3 fs-6">Work Schedule and Others</label>
                                    </center>
                                    <div class="row mt-3">
                                        <div class="col-md-2">
                                            <label for="" class="form-label">Salary Schedule: </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control salary_package" name="salary_schedule" id="salary_schedule" required>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="" class="form-label">Work Duration: </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control salary_package" name="work_duration" id="work_duration" required>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="" class="form-label">Work Days: </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control salary_package" name="work_days" id="work_days" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="form-label">Time Schedule: </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control salary_package" name="time_schedule" id="time_schedule" required>
                                        </div>
                                        <div class="col-md-2 mt-3">
                                            <label for="" class="form-label">Day-Off: </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control salary_package" name="day_off" id="day_off" required>
                                        </div>
                                        <div class="col-md-2 mt-3">
                                            <label for="" class="form-label">Outlet: </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control salary_package" name="outlet" id="outlet" required>
                                        </div>

                                    </div>

                                </div>

                                <!-- FOR REQUISITIONER INFORMATION -->
                                <center>
                                    <h4 class="fs-4 mt-4">REQUISITIONER INFORMATION</h4>
                                </center>
                                <div class="col-md-6 mt-3">
                                    <label for="" class="form-label">Date Requested</label>
                                    <input type="text" name="date_requested" value="<?php echo  $datenow  ?>" id="date_requested" class="form-control" disabled>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="" class="form-label">Date Needed</label>
                                    <input type="date" name="date_needed" id="date_needed" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Directly Reporting To</label>
                                    <select name="direct_report" id="direct_report" class="form-select">
                                        <option value="" selected disabled></option>
                                        <option value="VILLAVICENCIO, RODEO">Mr. Deo</option>
                                        <option value="BURCE, MIKE">Mr. Mike</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Requestee Position</label>
                                    <select name="job_position" id="job_position" class="form-select">
                                        <option value="" selected disabled>Please select</option>
                                        <?php
                                        $query = "SELECT * FROM job_title WHERE is_deleted = '0'";
                                        $result = $link->query($query);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <option value="<?php echo $row['description'] ?>"><?php echo $row['description'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="process">Process</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>




        </main>
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
        </script>
    <?php } ?>
</body>

</html>