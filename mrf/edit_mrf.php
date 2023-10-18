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


    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <title>Edit MRF</title>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        .containers {
            margin: 0rem 2rem;
        }

        .form-control {
            width: 100% !important;
            padding: 0.375rem 2.25rem 0.375rem 0.75rem !important;
            font-size: 1rem !important;
            font-weight: 400 !important;
            line-height: 1.5 !important;
            color: var(--bs-body-color) !important;
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            appearance: none !important;
            background-color: var(--bs-body-bg) !important;
            background-image: var(--bs-form-select-bg-img), var(--bs-form-select-bg-icon, none) !important;
            background-repeat: no-repeat !important;
            background-position: right 0.75rem center !important;
            background-size: 16px 12px !important;
            border: var(--bs-border-width) solid var(--bs-border-color) !important;
            border-radius: var(--bs-border-radius) !important;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
        }

        .form-check-input {
            border: 1px solid black;
        }

        table {
            border: 1px solid black !important;
            font-size: 12px;
        }

        .table td,
        .table th {
            padding: 0 .3rem;
        }

        table tr td {
            padding-top: .1rem !important;
            padding-bottom: 0rem !important;

        }

        table thead tr th {
            background: whitesmoke !important;
        }

        .form-check-label,
        .form-control {
            font-size: 13px;
        }

        i {
            text-decoration: underline;
            color: #3876BF;
            font-weight: bold;
        }

        .icon {
            color: #C2C7D0 !important;
        }

        .icon:hover {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['errorMessage'])) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: "<?php echo $_SESSION['errorMessage']; ?>",
            })
        </script>
    <?php unset($_SESSION['errorMessage']);
    } ?>
    <?php
    if ($_SESSION['darkk'] === "mrf") {

        include '../components/sidebar.php';
    ?>


        <div class="container containers">
            <center>
                <h2 class="fs-3 mb-5">MANPOWER REQUISITION FORM (MRF)</h2>
            </center>
            <?php
                $edit_id = $_GET['id'];
                $sql = "SELECT * FROM mrf WHERE id = '$edit_id'";
                $results = $link->query($sql);
                $rows = $results->fetch_assoc();
            ?>
                <form action="action.php" method="post" class="row">
                    <center>
                        <h4 class="fs-4">PROJECT DETAILS</h4>
                    </center>
                    <input type="hidden" name="updateID" value="<?php echo $rows['id']?>">
                    <div class="col-md-4 mt-3">
                        <label for="" class="form-label">TRACKING NUMBER</label>
                        <input type="text" name="tracking_number" id="tracking_number" class="form-control" value="<?php echo $rows['tracking'] ?>" readonly>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="" class="form-label">MRF Category</label>
                        <select name="mrf_category" id="mrf_category" onchange="showCategory()" class="form-select cbo" required>
                            <option value="" selected disabled></option>
                            <option value="NEW">NEW</option>
                            <option value="REPLACEMENT">REPLACEMENT</option>
                            <option value="RELIEVER">RELIEVER</option>
                        </select>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="" class="form-label" id="name-label">Name</label>
                        <input type="text" class="form-control" name="category_name" id="category_name" style="display: none !important;">
                    </div>
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
                                <option value="<?php echo $row['company_name'] ?>"><?php echo $row['company_name'] ?></option>
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
                        <input type="text" name="projectTitle" id="projectTitle" class="form-control" value="<?php echo $rows['project_title'] ?>" required>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="" class="form-label">Division</label>
                        <select name="division" id="division" class="form-select" required>
                            <option value="" disabled selected></option>
                            <option value="HR">HR</option>
                            <option value="BSG">BSG</option>
                            <option value="BD1">BD1</option>
                            <option value="BD2">BD2</option>
                            <option value="BD3">BD3</option>
                            <option value="FINANCE">FINANCE</option>
                            <option value="HR">HR</option>
                            <option value="PPI">PPI</option>
                            <option value="STRAT">STRAT</option>
                            <option value="EXECOM">EXECOM</option>
                            <option value="MANCOM">MANCOM</option>

                        </select>
                    </div>
                    <div class="col-md-4 mt-3">
                        <label for="" class="form-label">CE Number</label>
                        <input type="text" name="ce_number" id="ce_number" class="form-control" value="<?php echo $rows['ce_number'] ?>" required>
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
                                        <input type="radio" name="radio" value="Demo Girl" />
                                        Demo Girl
                                    </label>
                                    <label class="form-control">
                                        <input type="radio" name="radio" value="Promo Girl" />
                                        Promo Girl
                                    </label>
                                    <label class="form-control">
                                        <input type="radio" name="radio" value="Sampler" />
                                        Sampler
                                    </label>
                                </div>
                            </div>

                            <div class="column">
                                <div class="containerx">

                                      <label class="form-control">
                                        <input type="radio" name="radio" value="Merchandiser" />
                                        Merchandiser
                                    </label>

                                    <label class="form-control">
                                        <input type="radio" name="radio" value="Helper" />
                                        Helper
                                    </label>

                                    <label class="form-control">
                                        <input type="radio" name="radio" value="Mystery Buyer" />
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
                                        <input type="radio" name="radio" value="Promoter" />
                                        Promoter
                                    </label>

                                    <label class="form-control">
                                        <input type="radio" name="radio" value="Encoder" />
                                        Encoder
                                    </label>

                                    <label class="form-control">
                                        <input type="radio" name="radio" value="Coordinator" />
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
                        <input type="text" name="number_male" id="number_male" placeholder="Male" value="<?php echo $rows['np_male'] ?>" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="number_female" id="number_female" placeholder="Female" value="<?php echo $rows['np_female'] ?>" class="form-control">
                    </div>

                    <label for="" class="form-label mt-3">Height Requirements</label>
                    <div class="col-md-6">
                        <input type="text" name="height_male" id="height_male" placeholder="Male" value="<?php echo $rows['height_r'] ?>" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="height_female" id="height_female" placeholder="Female" value="<?php echo $rows['height_female'] ?>" class="form-control">
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
                        <?php 
                        if(!empty($rows['pleasing_personality'])){
                        ?>
                        <input type="checkbox" name="pleasing_personality" id="pleasing_personality" value="Pleasing Personality" class="form-check-input" checked>
                        <label for="pleasing_personality" class="form-check-label">Pleasing Personality</label>
                        <?php } else {?>
                        <input type="checkbox" name="pleasing_personality" id="pleasing_personality" value="Pleasing Personality" class="form-check-input">
                        <label for="pleasing_personality" class="form-check-label">Pleasing Personality</label>
                        <?php }?>
                    </div>
                    <div class="col-md-12 form-check">
                        <?php 
                        if(!empty($rows['moral'])){
                        ?>
                        <input type="checkbox" name="good_moral" id="good_moral" value="Good Moral" class="form-check-input" checked>
                        <label for="" class="form-check-label">With Good Moral Character</label>
                        <?php } else {?>
                        <input type="checkbox" name="good_moral" id="good_moral" value="Good Moral" class="form-check-input">
                        <label for="" class="form-check-label">With Good Moral Character</label>
                        <?php }?>
                    </div>
                    <div class="col-md-12 form-check">
                        <?php 
                        if(!empty($rows['work_experience'])){
                        ?>
                        <input type="checkbox" name="work_experience" id="work_experience" value="With Work Experience" class="form-check-input" checked>
                        <label for="" class="form-check-label">With Work Experience</label>
                        <?php } else {?>
                            <input type="checkbox" name="work_experience" id="work_experience" value="With Work Experience" class="form-check-input">
                        <label for="" class="form-check-label">With Work Experience</label>
                        <?php }?>
                    </div>
                    <div class="col-md-12 form-check">
                        <?php 
                        if(!empty($rows['comm_skills'])){
                        ?>
                        <input type="checkbox" name="good_communication" id="good_communication" value="Good communication skills" class="form-check-input" checked>
                        <label for="" class="form-check-label">Good Communication Skills</label>
                        <?php } else {?>
                        <input type="checkbox" name="good_communication" id="good_communication" value="Good communication skills" class="form-check-input">
                        <label for="" class="form-check-label">Good Communication Skills</label>
                        <?php }?>
                    </div>
                    <div class="col-md-12 form-check">
                        <?php 
                        if(!empty($rows['physically'])){
                        ?>
                        <input type="checkbox" name="physically_fit" id="physically_fit" value="Physically fit / good built" class="form-check-input" checked>
                        <label for="" class="form-check-label">Physically Fit / Good Build</label>
                        <?php } else {?>
                        <input type="checkbox" name="physically_fit" id="physically_fit" value="Physically fit / good built" class="form-check-input">
                        <label for="" class="form-check-label">Physically Fit / Good Build</label>
                        <?php }?>
                    </div>
                    <div class="col-md-12 form-check">
                        <?php 
                        if(!empty($rows['articulate'])){
                        ?>
                        <input type="checkbox" name="articulate" id="articulate" value="Articulate" class="form-check-input" checked>
                        <label for="" class="form-check-label">Articulate</label>
                        <?php } else {?>
                        <input type="checkbox" name="articulate" id="articulate" value="Articulate" class="form-check-input">
                        <label for="" class="form-check-label">Articulate</label>
                        <?php }?>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-1">
                            <label for="" class="form-label">Others</label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="other_personality" id="other_personality" value="<?php echo $rows['others'] ?>" class="form-control">
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
                            <input type="text" class="form-control salary_package" name="basic_salary" id="basic_salary" value="<?php echo $rows['basic_salary'] ?>" required>
                        </div>

                        <div class="col-md-2">
                            <label for="" class="form-label">Transpo Allowance: </label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control salary_package" name="transportation_allowance" value="<?php echo $rows['transpo'] ?>"  id="transportation_allowance" required>
                        </div>

                        <div class="col-md-2">
                            <label for="" class="form-label">Meal Allowance: </label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control salary_package" name="meal_allowance" value="<?php echo $rows['meal'] ?>"  id="meal_allowance"  required>
                        </div>
                        <div class="col-md-2">
                            <label for="" class="form-label">Comm. Allowance: </label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control salary_package" name="communication_allowance" value="<?php echo $rows['comm'] ?>"  id="communication_allowance" required>
                        </div>
                        <div class="col-md-1">
                            <label for="" class="form-label">Others: </label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control salary_package" name="other_salary_package" value="<?php echo $rows['other_allow'] ?>"  id="other_salary_package">
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
                                <input type="text" class="form-control salary_package" name="salary_schedule" value="<?php echo $rows['salary_sched'] ?>"  id="salary_schedule" required>
                            </div>

                            <div class="col-md-2">
                                <label for="" class="form-label">Work Duration: </label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control salary_package" name="work_duration" value="<?php echo $rows['work_duration'] ?>"  id="work_duration" required>
                            </div>

                            <div class="col-md-2">
                                <label for="" class="form-label">Work Days: </label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control salary_package" name="work_days" value="<?php echo $rows['work_days'] ?>"  id="work_days" required>
                            </div>
                            <div class="col-md-2">
                                <label for="" class="form-label">Time Schedule: </label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control salary_package" name="time_schedule" value="<?php echo $rows['time_sched'] ?>" id="time_schedule" required>
                            </div>
                            <div class="col-md-2 mt-3">
                                <label for="" class="form-label">Day-Off: </label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control salary_package" name="day_off" value="<?php echo $rows['day_off'] ?>"  id="day_off" required>
                            </div>
                            <div class="col-md-2 mt-3">
                                <label for="" class="form-label">Outlet: </label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control salary_package" name="outlet" id="outlet" value="<?php echo $rows['outlet'] ?>"  required>
                            </div>

                        </div>

                    </div>

                    <center>
                        <h4 class="fs-4 mt-4">SPECIAL REQUIREMENTS (IF ANY) / INSTRUCTIONS / REMARKS / RECOMMENDATIONS</h4>
                    </center>
                    <textarea name="special_requirements" id="special_requirements" cols="30" rows="5" class="form-control"><?php echo $rows['special_requirements_others'] ?></textarea>


                    <!-- FOR REQUISITIONER INFORMATION -->
                    <center>
                        <h4 class="fs-4 mt-4">REQUISITIONER INFORMATION</h4>
                    </center>
                    <div class="col-md-6 mt-3">
                        <label for="" class="form-label">Date Requested</label>
                        <input type="text" name="date_requested" value="<?php echo $datenow ?>" id="date_requested" class="form-control" readonly>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="" class="form-label">Date Needed</label>
                        <input type="date" name="date_needed" id="date_needed" class="form-control" value="<?php echo $rows['date_needed'] ?>"  required>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Directly Reporting To</label>
                        <select name="direct_report" id="direct_report" class="form-select" required>
                            <option value="" selected disabled></option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Requestee Position</label>
                        <select name="job_position" id="job_position" class="form-select">
                            <option value="" selected disabled>Please select</option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-5">
                        <button type="submit" name="updatemrf" class="btn btn-primary" id="updatemrf">Update</button>
                        <button type="reset" name="" class="btn btn-secondary">Reset</button>
                        <a href="mrf_list.php" class="btn btn-dark">Back</a>
                    </div>
            </form>
        </div>



        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                var employeeData = [];

                $(document).ready(function() {
                    // Add an event listener to the "Division" dropdown
                    $('#division').change(function() {
                        var selectedDivision = $(this).val();
                        if (selectedDivision) {
                            // Make an AJAX request to fetch employee data for the selected division
                            $.ajax({
                                url: 'get_employee_data.php', // Replace with your server-side script
                                method: 'POST',
                                data: {
                                    division: selectedDivision
                                },
                                dataType: 'json',
                                success: function(data) {
                                    // Update the employeeData array with the fetched data
                                    employeeData = data;
                                    var directReportDropdown = $('#direct_report');
                                    directReportDropdown.empty();
                                    directReportDropdown.append('<option value="" selected disabled></option>');
                                    $.each(data, function(key, value) {
                                        directReportDropdown.append('<option value="' + value.fullname + '">' + value.fullname + '</option>');
                                    });
                                }
                            });
                        }
                    });

                    $('#direct_report').change(function() {
                        var selectedEmployee = $(this).val();
                        var positionDropdown = $('#job_position');

                        // Check if a valid employee is selected
                        if (selectedEmployee) {
                            // Retrieve the employee's position from the updated employeeData array
                            var position = getPositionForEmployee(selectedEmployee);

                            // Update the "Requestee Position" dropdown
                            positionDropdown.empty();
                            positionDropdown.append('<option value="' + position + '">' + position + '</option>');
                        } else {
                            // Clear the "Requestee Position" dropdown if no employee is selected
                            positionDropdown.empty();
                            positionDropdown.append('<option value="" selected disabled>Please select</option>');
                        }
                    });

                    // Function to retrieve the position for the selected employee
                    function getPositionForEmployee(employeeName) {
                        var employee = employeeData.find(function(employee) {
                            return employee.fullname === employeeName;
                        });
                        if (employee) {
                            return employee.position;
                        } else {
                            return "Position not found";
                        }
                    }
                });
            </script>
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

                function showCategory() {
                    var category = document.getElementById("mrf_category");
                    var category_name = document.getElementById('category_name');
                    var name_label = document.getElementById('name-label');

                    if (category.options[category.selectedIndex].text === "REPLACEMENT" || category.options[category.selectedIndex].text === "RELIEVER") {
                        category_name.style.display = 'block';
                        name_label.style.display = 'block';
                        category_name.required = true;
                    } else {
                        category_name.style.display = 'none';
                        name_label.style.display = 'none';
                        category_name.required = false;
                    }
                }

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

                function validate_type() {}

    </script>










<?php } ?>
</body>

</html>