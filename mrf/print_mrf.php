<?php
include '../connect.php';
session_start();

date_default_timezone_set('Asia/Hong_Kong');
$timestamp = time(); // You can replace this with your desired timestamp
$formatted_date = date("F j, Y", $timestamp);
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

    <title></title>

    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }

        .containers {
            margin: 0rem 2rem;
        }

        .form-control {
            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: 1px solid black;
            border-radius: 0;
        }

        .form-check-input {
            border: 1px solid black;
        }

        table {
            border: 1px solid black !important;
            font-size: 12px;
        }
        .table td, .table th {
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
    </style>
</head>

<body>
    <div class="containers">
        <div class="row">
            <div class="header">
                <img src="../assets/img/pcnlogo1.png" alt="" class="img-responsive justify-content-start logo">
                <center>
                    <p class="justify-content-center" style="margin-top: -4rem; font-size: 10px;"><i>PCN-HR-006 Rev No.1 - <?php echo $formatted_date ?></i></p>
                    <h4 class="fs-5" style="margin-top: -1rem;"><strong>MANPOWER REQUISITION FORM (MRF)</strong></h4>
                </center>
                <div class="sub-header mt-4">
                    <p style="font-size: 12px;"><strong><i>Instructions: 1. Accomplish / Complete the form on a per position basis. <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2. Forward to Recruitment (hard copy or scanned copy) together with the Job description</i></strong></p>
                </div>


                <?php 
                    $id = $_GET['id'];
                    $query = "SELECT * FROM mrf WHERE id = '$id'";
                    $result = $link->query($query);
                    $row = $result->fetch_assoc();
                ?>
                <div class="sub-header-checkbox">
                    <table class="table" style="border: 1px solid white !important;">
                        <tbody>
                            <tr>
                                <td width="80">
                                    <div class="form-check col-md-1">
                                        <?php 
                                            if($row['location'] === 'NCR'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                        <label for="" class="form-check-label">NCR</label>
                                    </div>
                                    <div class="form-check col-md-1" >
                                        <?php 
                                            if($row['mrf_category'] === 'NEW'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                        <label for="" class="form-check-label">NEW</label>
                                    </div>
                                </td>
                                <td  width="20">
                                    <div class="form-check col-md-12">
                                        <?php 
                                            if($row['location'] === 'PROVINCIAL'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                        <label for="" class="form-check-label">PROVINCIAL</label>
                                    </div>

                                    <div class="form-check col-md-1">
                                        <?php 
                                            if($row['mrf_category'] === 'REPLACEMENT'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                        <label for="" class="form-check-label">REPLACEMENT<i style="text-decoration: underline;"><?php echo $row['mrf_category_name']?></i></label>
                                    </div>
                                </td>

                                <td width="20">
                                <div class="form-check col-md-1" style="visibility: hidden;">
                                        
                                        <label for="" class="form-check-label ">RELIEVER_______________</label>
                                    </div>
                                    <div class="form-check col-md-1">
                                        <?php 
                                            if($row['mrf_category'] === 'RELIEVER'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                        <label for="" class="form-check-label ">RELIEVER_______________</label>
                                    </div>

                                </td>


                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="body">
                <table class="table table-bordered" width="100">
                    <thead>
                        <tr>
                            <th colspan="7" class="text-center" style="background: whitesmoke;">PROJECT DETAILS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="40">Division/Dept</td>
                            <td width="100"><i style="color: skyblue;"><?php echo $row['division']?></i></td>
                            <td width="60">Client</td>
                            <td width="100" colspan="4"><i style="color: skyblue;"><?php echo $row['client']?></i></td>
                        </tr>
                        <tr>
                            <td>Project Title</td>
                            <td colspan="4"><i style="color: skyblue;"><?php echo $row['project_title']?></i></td>
                            <td width="70">C.E. No.</td>
                            <td ><i style="color: skyblue;"><?php echo $row['ce_number']?></i></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered" width="100">
                    <thead>
                        <tr>
                            <th colspan="6" class="text-center" style="background: whitesmoke;">POSITION (Please choose one and attach detailed Job Description)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border-right: 1px solid white !important;">
                                <div class="form-check col-md-12">
                                    <?php 
                                        if($row['position'] === 'Push Girl'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">Push Girl</label>
                                </div>
                                <div class="form-check col-md-12">
                                <?php 
                                        if($row['position'] === 'Demo Girl'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">Demo Girl</label>
                                </div>
                                <div class="form-check col-md-12">
                                    <input type="checkbox" name="" id="" class="form-check-input">
                                    <label for="" class="form-check-label">Promo Girl</label>
                                </div>
                                <div class="form-check col-md-12">
                                <?php 
                                        if($row['position'] === 'Sampler'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">Sampler</label>
                                </div>
                            </td>
                            <td style="border-right: 1px solid white !important;">
                                <div class="form-check col-md-12">
                                <?php 
                                        if($row['position'] === 'Merchandiser'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <input type="checkbox" name="" id="" class="form-check-input">
                                    <label for="" class="form-check-label">Merchandiser</label>
                                </div>
                                <div class="form-check col-md-12">
                                <?php 
                                        if($row['position'] === 'Helper'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">Helper</label>
                                </div>
                                <div class="form-check col-md-12">
                                <?php 
                                        if($row['position'] === 'Mystery Buyer'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">Mystery Buyer</label>
                                </div>
                                <div class="form-check col-md-12">
                                <?php 
                                        if($row['position'] === 'Validator'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">Validator</label>
                                </div>
                            </td>
                            <td style="border-right: 1px solid white !important;">
                                <div class="form-check col-md-12">
                                <?php 
                                        if($row['position'] === 'Promoter'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">Promoter</label>
                                </div>
                                <div class="form-check col-md-12">
                                <?php 
                                        if($row['position'] === 'Encoder'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">Encoder</label>
                                </div>
                                <div class="form-check col-md-12">
                                <?php 
                                        if($row['position'] === 'Coordinator'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">Coordinator</label>
                                </div>
                                <div class="form-check col-md-12">
                                <?php 
                                        if($row['position'] === 'Bundler'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">Bundler</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check col-md-12">
                                <?php 
                                        if($row['position'] === 'Others'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">Others (Please Specify)</label>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" name="" id="" class="form-control" value="<?php echo $row['position_detail']?>">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered" width="100">
                    <thead>
                        <tr>
                            <th colspan="6" class="text-center" style="background: whitesmoke;">JOB REQUIREMENTS / QUALIFICATIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="padding: 10rem !important;">
                            <th style="border-right: 1px solid white !important; border-bottom: 1px solid white !important;"></th>
                            <th style="border-right: 1px solid white !important; border-bottom: 1px solid white !important">Male</th>
                            <th style="border-right: 1px solid white !important; border-bottom: 1px solid white !important">Female</th>
                            <th style="border-bottom: 1px solid white !important">Personality</th>
                        </tr>
                        <tr>
                            <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important;">No. of People</td>
                            <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important;"><?php echo $row['np_male']?></td>
                            <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important"><?php echo $row['np_female']?></td>
                            <td rowspan="7" colspan="4" style="border-left: 1px solid white !important; border-bottom: 1px solid white !important;">
                                <div class="col-md-12 form-check">
                                <?php 
                                        if($row['pleasing_personality'] === 'Pleasing Personality'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">Pleasing Personality</label>
                                </div>
                                <div class="col-md-12 form-check">
                                <?php 
                                        if($row['moral'] === 'Good Moral'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">With Good Moral Character</label>
                                </div>
                                <div class="col-md-12 form-check">
                                <?php 
                                        if($row['work_experience'] === 'With Work Experience'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">With Work Experience</label>
                                </div>
                                <div class="col-md-12 form-check">
                                <?php 
                                        if($row['comm_skills'] === 'Good communication skills'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">Good Communication Skills</label>
                                </div>
                                <div class="col-md-12 form-check">
                                <?php 
                                        if($row['physically'] === 'Physically fit / good built'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">Physically fit / Good Built</label>
                                </div>
                                <div class="col-md-12 form-check">
                                <?php 
                                        if($row['articulate'] === 'Articulate'){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">Articulate</label>
                                </div>
                                <div class="col-md-12 form-check">
                                <?php 
                                        if(!empty($row['others'])){
                                        ?>
                                        <input type="checkbox" name="" id="" class="form-check-input" checked>
                                        <?php } else{?>
                                        <input type="checkbox" name="" id="" class="form-check-input">
                                        <?php }?>
                                    <label for="" class="form-check-label">Others: <?php echo $row['others']?></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important">Height Requirement</td>
                            <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important"><?php echo $row['height_r']?></td>
                            <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important"><?php echo $row['height_r']?></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="border-right: 1px solid white !important; border-bottom: 1px solid white !important; border-top: 1px solid white !important">Educational Background (please check)</td>
                        </tr>
                        <tr>
                            <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important">High School Graduate</td>
                            <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important"></td>
                            <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important"></td>
                        </tr>
                        <tr>
                            <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important">College Level</td>
                            <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important"></td>
                            <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important"></td>
                        </tr>
                        <tr>
                            <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important">College Graduate</td>
                            <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important"></td>
                            <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important"></td>
                        </tr>
                        <tr>
                            <td style="border-right: 1px solid white !important;">Others __________________</td>
                            <td style="border-right: 1px solid white !important;"></td>
                            <td style="border-right: 1px solid white !important;"></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered" width="100">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="6">JOB / WORK DETAILS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <th style="border-bottom: 1px solid white;">Salary Package</th>
                            <th style="border-bottom: 1px solid white;">Employment Status</th>
                            <th style="border-bottom: 1px solid white;">Work Schedule & Others</th>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid white;">Basic Salary</td>
                            <td rowspan="6">
                                <div class="form-check">
                                    <input type="checkbox" name="" id="" class="form-check-input">
                                    <label for="" class="form-check-label">Project Based</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="" id="" class="form-check-input">
                                    <label for="" class="form-check-label">Probationary (180 Days)</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="" id="" class="form-check-input">
                                    <label for="" class="form-check-label">Regular</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="" id="" class="form-check-input">
                                    <label for="" class="form-check-label">Other</label>
                                </div>
                            </td>
                            <td style="border-bottom: 1px solid white;">Salary Schedule</td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid white;">Transpo Allowance</td>
                            <td style="border-bottom: 1px solid white;">Work Duration</td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid white;">Meal Allowance</td>
                            <td style="border-bottom: 1px solid white;">Work Days</td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid white;">Communication Allowance</td>
                            <td style="border-bottom: 1px solid white;">Time Schedule</td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid white;">Others</td>
                            <td style="border-bottom: 1px solid white;">Day-off</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Outlet</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered" width="100">
                    <thead>
                        <tr>
                            <th colspan="6" class="text-center">SPECIAL REQUIREMENTS (IF ANY) / INSTRUCTIONS / REMARKS / RECOMMENDATIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="6">
                                <p>
                                    asdasdasdas
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered" width="100">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="4">REQUISITIONER</th>
                            <th class="text-center">APPROVER</th>
                            <th class="text-center">RECEIVER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3">Date Requested:</td>
                            <td rowspan="3" class="text-center">Prepared / Requested By:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td  colspan="3">Date Needed: </td>
                            <td style="border-top: 1px solid white;"></td>
                            <td style="border-top: 1px solid white;"></td>
                        </tr>
                        <tr>
                            <td colspan="3">Directly Reporting to:</td>
                            <td style="border-top: 1px solid white;"></td>
                            <td style="border-top: 1px solid white;"></td>
                        </tr>
                        <tr>
                            <td colspan="3">Position:</td>
                            <td style="border-top: 1px solid white;" class="text-center"><i>Sig. over Printed Name/Date</i></td>
                            <td class="text-center" style="border-top: 1px solid white;"><i>Dept. Head / MGL / FSB</i></td>
                            <td class="text-center" style="border-top: 1px solid white;"><i>HR Sig. over printed Name/Date</i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>