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


    <!-- Datatables -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.semanticui.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>


    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <title>MRF List</title>

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

        i{
            text-decoration: underline;
            color: #3876BF;
            font-weight: bold;
        }
        .icon{
            color: #C2C7D0 !important;
        }
        .icon:hover{
            color: red;
        }
        .form-check-input {
            pointer-events: none; /* Prevent user interaction with the checkbox */
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['successMessage'])) {
        $id = mysqli_insert_id($link);
        $query = "SELECT * FROM mrf WHERE id = '$id'";
        $result = $link->query($query);
    ?>
        <script>
            var id = <?php echo $_GET['id']; ?>; // Pass $id as a JavaScript variable
            Swal.fire({
                title: '<?php echo $_SESSION['successMessage']; ?>',
                icon: 'success',
                showCloseButton: true,
                showCancelButton: false,
                showConfirmButton: true,
                confirmButtonText: 'Print Data',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Open the "print_mrf.php" page in a new window
                    window.open("print_mrf.php?id=" + encodeURIComponent(id));
                }
            });
        </script>
    <?php
        unset($_SESSION['successMessage']);
    }
    ?>

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

        <div class="container" style="padding-top: 10rem;">
            <table class="table p-3 table-striped align-middle mb-0 p-3 bg-info bg-opacity-10 border border-info border-start-0 border-end-0 rounded-end mdc-data-table" id="example" style="border: 1px solid whitesmoke !important;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tracking Number</th>
                        <th>Project Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM mrf WHERE uid = '" . $_SESSION['id'] . "'";
                    $result = $link->query($query);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['tracking'] ?></td>
                            <td><?php echo $row['project_title'] ?></td>
                            <td>
                                <button type="button" class="btn btnview" data-bs-toggle="modal" data-bs-target="#viewmdf"><i class="bi bi-eye icon" style="color: black !important;"></i></button>
                                <button type="button" class="btn btnprint" id="btnprint" onclick="location.href = 'print_mrf.php?id=<?php echo $row['id'] ?>'"><i class="bi bi-printer icon" style="color: black !important;"></i></button>
                                <button type="button" class="btn btnedit"><i class="bi bi-gear icon" style="color: black !important;"></i></button>
                                <button type="button" class="btn btndelete"><i class="bi bi-trash3 icon" style="color: black !important;"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


        <!-- Modal for View MDF -->
        <div class="modal fade" id="viewmdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <modal class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </modal>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <?php
                                $query = "SELECT * FROM mrf";
                                $result = $link->query($query);
                                $row = $result->fetch_assoc();
                                ?>
                                <div class="header">
                                    <img src="../assets/img/pcnlogo1.png" alt="" class="img-responsive justify-content-start logo">
                                    <center>
                                        <p class="justify-content-center" style="margin-top: -4rem; font-size: 10px;"><i style="color: black !important;">PCN-HR-006 Rev No.1 - October 12, 2020</i></p>
                                        <h4 class="fs-5" style=""><strong>MANPOWER REQUISITION FORM (MRF)</strong></h4>
                                    </center>
                                    <div class="tracking">
                                        <p style="float: right;">Tracking No. <?php echo $row['tracking'] ?></p>
                                    </div>
                                    <div class="sub-header mt-4">
                                        <p style="font-size: 12px;"><strong><i style="color: black !important; text-decoration: none !important;">Instructions: 1. Accomplish / Complete the form on a per position basis. <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2. Forward to Recruitment (hard copy or scanned copy) together with the Job description</i></strong></p>
                                    </div>



                                    <div class="sub-header-checkbox">
                                        <table class="table" style="border: 1px solid white !important;">
                                            <tbody>
                                                <tr>
                                                    <td width="80">
                                                        <div class="form-check col-md-1">
                                                            <?php
                                                            if ($row['location'] === 'NCR') {
                                                            ?>
                                                                <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                            <?php } else { ?>
                                                                <input type="checkbox" name="" id="" class="form-check-input">
                                                            <?php } ?>
                                                            <label for="" class="form-check-label">NCR</label>
                                                        </div>
                                                        <div class="form-check col-md-1">
                                                            <?php
                                                            if ($row['mrf_category'] === 'NEW') {
                                                            ?>
                                                                <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                            <?php } else { ?>
                                                                <input type="checkbox" name="" id="" class="form-check-input">
                                                            <?php } ?>
                                                            <label for="" class="form-check-label">NEW</label>
                                                        </div>
                                                    </td>
                                                    <td width="20">
                                                        <div class="form-check col-md-12">
                                                            <?php
                                                            if ($row['location'] === 'PROVINCIAL') {
                                                            ?>
                                                                <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                            <?php } else { ?>
                                                                <input type="checkbox" name="" id="" class="form-check-input">
                                                            <?php } ?>
                                                            <label for="" class="form-check-label">PROVINCIAL</label>
                                                        </div>

                                                        <div class="form-check col-md-12">
                                                            <?php
                                                            if ($row['mrf_category'] === 'REPLACEMENT') {
                                                            ?>
                                                                <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                            <?php } else { ?>
                                                                <input type="checkbox" name="" id="" class="form-check-input">
                                                            <?php } ?>
                                                            <label for="" class="form-check-label">REPLACEMENT<i style="text-decoration: underline;"><?php echo $row['mrf_category_name'] ?></i></label>
                                                        </div>
                                                    </td>

                                                    <td width="20">
                                                        <div class="form-check col-md-1" style="visibility: hidden;">

                                                            <label for="" class="form-check-label ">RELIEVER_______________</label>
                                                        </div>
                                                        <div class="form-check col-md-1">
                                                            <?php
                                                            if ($row['mrf_category'] === 'RELIEVER') {
                                                            ?>
                                                                <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                            <?php } else { ?>
                                                                <input type="checkbox" name="" id="" class="form-check-input">
                                                            <?php } ?>
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
                                                <td width="100"><i style="color: skyblue;"><?php echo $row['division'] ?></i></td>
                                                <td width="60">Client</td>
                                                <td width="100" colspan="4"><i style="color: skyblue;"><?php echo $row['client'] ?></i></td>
                                            </tr>
                                            <tr>
                                                <td>Project Title</td>
                                                <td colspan="4"><i style="color: skyblue;"><?php echo $row['project_title'] ?></i></td>
                                                <td width="70">C.E. No.</td>
                                                <td><i style="color: skyblue;"><?php echo $row['ce_number'] ?></i></td>
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
                                                        if ($row['position'] === 'Push Girl') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Push Girl</label>
                                                    </div>
                                                    <div class="form-check col-md-12">
                                                        <?php
                                                        if ($row['position'] === 'Demo Girl') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Demo Girl</label>
                                                    </div>
                                                    <div class="form-check col-md-12">
                                                        <?php
                                                        if ($row['position'] === 'Promo Girl') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Promo Girl</label>
                                                    </div>
                                                    <div class="form-check col-md-12">
                                                        <?php
                                                        if ($row['position'] === 'Sampler') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Sampler</label>
                                                    </div>
                                                </td>
                                                <td style="border-right: 1px solid white !important;">
                                                    <div class="form-check col-md-12">
                                                        <?php
                                                        if ($row['position'] === 'Merchandiser') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <input type="checkbox" name="" id="" class="form-check-input">
                                                        <label for="" class="form-check-label">Merchandiser</label>
                                                    </div>
                                                    <div class="form-check col-md-12">
                                                        <?php
                                                        if ($row['position'] === 'Helper') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Helper</label>
                                                    </div>
                                                    <div class="form-check col-md-12">
                                                        <?php
                                                        if ($row['position'] === 'Mystery Buyer') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Mystery Buyer</label>
                                                    </div>
                                                    <div class="form-check col-md-12">
                                                        <?php
                                                        if ($row['position'] === 'Validator') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Validator</label>
                                                    </div>
                                                </td>
                                                <td style="border-right: 1px solid white !important;">
                                                    <div class="form-check col-md-12">
                                                        <?php
                                                        if ($row['position'] === 'Promoter') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Promoter</label>
                                                    </div>
                                                    <div class="form-check col-md-12">
                                                        <?php
                                                        if ($row['position'] === 'Encoder') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Encoder</label>
                                                    </div>
                                                    <div class="form-check col-md-12">
                                                        <?php
                                                        if ($row['position'] === 'Coordinator') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Coordinator</label>
                                                    </div>
                                                    <div class="form-check col-md-12">
                                                        <?php
                                                        if ($row['position'] === 'Bundler') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Bundler</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check col-md-12">
                                                        <?php
                                                        if ($row['position'] === 'Others') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Others (Please Specify)</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <?php
                                                        if (
                                                            $row['position'] === 'Push Girl' || $row['position'] === 'Demo Girl' || $row['position'] === 'Promo Girl'
                                                            || $row['position'] === 'Sampler' || $row['position'] === 'Merchandiser' || $row['position'] === 'Helper' || $row['position'] === 'Mystery Buyer'
                                                            || $row['position'] === 'Validator' || $row['position'] === 'Promoter' || $row['position'] === 'Encoder' || $row['position'] === 'Coordinator'
                                                            || $row['position'] === 'Coordinator' || $row['position'] === 'Bundler'
                                                        ) {
                                                        ?>
                                                            <input type="text" name="" id="" class="form-control" value="<?php echo $row['position_detail'] ?>">
                                                        <?php } else { ?>
                                                            <input type="text" name="" id="" class="form-control" value="<?php echo $row['position'] . " (" . $row['position_detail'] . ")" ?>">
                                                        <?php } ?>
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
                                                <th style="border-bottom: 1px solid white !important; padding-left: 7rem;">Personality (Please Check)</th>
                                            </tr>
                                            <tr>
                                                <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important;">No. of People</td>
                                                <td width="50" style="border-right: 1px solid white !important; text-align: center; "><i style="text-decoration: none !important; "><?php echo $row['np_male'] ?></i></td>
                                                <td width="50" style="border-right: 1px solid white !important;text-align: center;"><i style="text-decoration: none !important; "><?php echo $row['np_female'] ?></i></td>
                                                <td rowspan="7" colspan="4" style="border-left: 1px solid white !important;">
                                                    <div class="col-md-12 form-check" style=" padding-left: 8rem;">
                                                        <?php
                                                        if ($row['pleasing_personality'] === 'Pleasing Personality') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Pleasing Personality</label>
                                                    </div>
                                                    <div class="col-md-12 form-check" style=" padding-left: 8rem;">
                                                        <?php
                                                        if ($row['moral'] === 'Good Moral') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">With Good Moral Character</label>
                                                    </div>
                                                    <div class="col-md-12 form-check" style=" padding-left: 8rem;">
                                                        <?php
                                                        if ($row['work_experience'] === 'With Work Experience') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">With Work Experience</label>
                                                    </div>
                                                    <div class="col-md-12 form-check" style=" padding-left: 8rem;">
                                                        <?php
                                                        if ($row['comm_skills'] === 'Good communication skills') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Good Communication Skills</label>
                                                    </div>
                                                    <div class="col-md-12 form-check" style=" padding-left: 8rem;">
                                                        <?php
                                                        if ($row['physically'] === 'Physically fit / good built') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Physically fit / Good Built</label>
                                                    </div>
                                                    <div class="col-md-12 form-check" style=" padding-left: 8rem;">
                                                        <?php
                                                        if ($row['articulate'] === 'Articulate') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Articulate</label>
                                                    </div>
                                                    <div class="col-md-12 form-check" style=" padding-left: 8rem;">
                                                        <?php
                                                        if (!empty($row['others'])) {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Others: &nbsp; &nbsp; &nbsp; &nbsp; <i><?php echo $row['others'] ?></i></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important">Height Requirement</td>
                                                <td width="50" style="border-right: 1px solid white !important;  text-align: center; "><i style="text-decoration: none !important;"><?php echo $row['height_r'] ?></i></td>
                                                <td width="50" style="border-right: 1px solid white !important;  text-align: center; "><i style="text-decoration: none !important;"><?php echo $row['height_female'] ?></i></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="border-right: 1px solid white !important; border-bottom: 1px solid white !important;">Educational Background (please check)</td>
                                            </tr>
                                            <tr>
                                                <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important">High School Graduate</td>
                                                <?php
                                                if ($row['edu'] === 'High School Graduate') {
                                                ?>
                                                    <td style="border-right: 1px solid white !important; text-align: center;">

                                                        <i style="text-decoration: none !important;">1</i>
                                                    </td>
                                                    <td style="border-right: 1px solid white !important; text-align: center;">

                                                        <i style="text-decoration: none !important;">1</i>
                                                    </td>
                                                <?php } ?>

                                            </tr>
                                            <tr>
                                                <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important; border-top: 1px solid white !important">College Level</td>
                                                <td style="border-right: 1px solid white !important; text-align:center;">
                                                    <?php
                                                    if ($row['edu'] === 'College Level') {
                                                    ?>
                                                        <i style="text-decoration: none !important;">1</i>
                                                </td>
                                                <td style="border-right: 1px solid white !important; text-align:center;">
                                                    <i style="text-decoration: none !important;">1</i>
                                                <?php } else {
                                                    } ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-right: 1px solid white !important; border-bottom: 1px solid white !important;">College Graduate</td>
                                                <td style="border-right: 1px solid white !important;  text-align: center;">
                                                    <?php
                                                    if ($row['edu'] === 'College Graduate') {
                                                    ?>
                                                        <i style="text-decoration: none !important;">1</i>
                                                </td>
                                                <td style="border-right: 1px solid white !important;  text-align: center;">
                                                    <i style="text-decoration: none !important;">1</i>
                                                <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <?php
                                                if ($row['edu'] === 'Vocational') { ?>
                                                    <td style="border-right: 1px solid white !important;">Others:
                                                        <i><?php echo $row['edu'] ?></i>
                                                    <?php } else { ?>
                                                    </td>
                                                    <td style="border-right: 1px solid white !important;">Others: _________</td>
                                                <?php } ?>
                                                <td style="border-right: 1px solid white !important;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered" width="100">
                                        <thead>
                                            <tr>
                                                <th class="text-center" colspan="6" style="font-weight: 900;">JOB / WORK DETAILS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <th style="border-bottom: 1px solid white;">Salary Package</th>
                                                <th style="border-bottom: 1px solid white;">Employment Status</th>
                                                <th style="border-bottom: 1px solid white;">Work Schedule & Others</th>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid white;">Basic Salary: &nbsp;&nbsp;&nbsp;<i style="float: right; margin-right: 1rem;"><?php echo $row['basic_salary'] ?></i></td>
                                                <td rowspan="6">
                                                    <div class="form-check">
                                                        <?php
                                                        if ($row['employment_stat'] === 'Project Based') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Project Based</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <?php
                                                        if ($row['employment_stat'] === 'Probationary') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Probationary (180 Days)</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <?php
                                                        if ($row['employment_stat'] === 'Regular') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Regular</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <?php
                                                        if ($row['employment_stat'] === 'Other') {
                                                        ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" name="" id="" class="form-check-input">
                                                        <?php } ?>
                                                        <label for="" class="form-check-label">Other: </label>
                                                    </div>
                                                </td>
                                                <td style="border-bottom: 1px solid white;">Salary Schedule: <i style="float: right; margin-right: 1.5rem;"><?php echo $row['salary_sched'] ?></i></td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid white;">Transpo Allowance: <i style="float: right; margin-right: 1.5rem; margin-right: 1.5rem;"><?php echo $row['transpo'] ?></i></td>
                                                <td style="border-bottom: 1px solid white;">Work Duration: <i style="float: right; margin-right: 1.5rem;"><?php echo $row['work_duration'] ?></i></td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid white;">Meal Allowance: <i style="float: right; margin-right: 1.5rem; "><?php echo $row['meal'] ?></i></td>
                                                <td style="border-bottom: 1px solid white;">Work Days: <i style="float: right; margin-right: 1.5rem;"><?php echo $row['work_days'] ?></i></td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid white;">Communication Allowance: <i style="float: right; margin-right: 1.5rem;"><?php echo $row['comm'] ?></i></td>
                                                <td style="border-bottom: 1px solid white;">Time Schedule: <i style="float: right; margin-right: 1.5rem;"><?php echo $row['time_sched'] ?></i></td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid white;">Others: <i style="float: right; margin-right: 1.5rem; margin-right: 1.5rem;"><?php echo $row['other_allow'] ?></i></td>
                                                <td style="border-bottom: 1px solid white;">Day-off: <i style="float: right; margin-right: 1.5rem;"><?php echo $row['day_off'] ?></i></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Outlet: <i style="float: right; margin-right: 1.5rem;"><?php echo $row['outlet'] ?></i></td>
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
                                                        <i style="text-decoration: none !important;"><?php echo $row['special_requirements_others'] ?></i>
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
                                                <td colspan="3">Date Requested: <i style="display: block; text-decoration: none !important;"><?php echo $row['dt_now'] ?></i></td>
                                                <td rowspan="3" class="text-center" style=" font-weight: bold;">Prepared / Requested By: <br><br><br> <?php echo $row['prepared_by'] ?></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Date Needed: <i style="float: right;text-decoration: none !important;"><?php echo $row['date_needed'] ?></i></td>
                                                <td style="border-top: 1px solid white;"></td>
                                                <td style="border-top: 1px solid white;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Directly Reporting to: <i style="display: block;text-decoration: none !important;"><?php echo $row['drt'] ?></i></td>
                                                <td style="border-top: 1px solid white;"></td>
                                                <td style="border-top: 1px solid white;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Position: <i style="display: block;text-decoration: none !important;"><?php echo $row['rp'] ?></i></td>
                                                <td style="border-top: 1px solid white;" class="text-center"><i style="color: black !important;">Sig. over Printed Name/Date</i></td>
                                                <td class="text-center" style="border-top: 1px solid white;"><i style="color: black !important;">Dept. Head / MGL / FSB</i></td>
                                                <td class="text-center" style="border-top: 1px solid white;"><i style="color: black !important;">HR Sig. over printed Name/Date</i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

        <script>
            new DataTable('#example');
        </script>


    <?php } ?>
</body>

</html>