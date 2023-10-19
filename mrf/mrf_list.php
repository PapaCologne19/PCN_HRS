<?php
include '../connect.php';
session_start();

date_default_timezone_set('Asia/Hong_Kong');
$datenow = date("m/d/Y");

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <title>MRF List</title>

    <style>
        * {
            font-family: 'Inter', sans-serif;
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
        .form-check-input {
            pointer-events: none; /* Prevent user interaction with the checkbox */
        }
    </style>
</head>

<body oncontextmenu="return false">
    <?php
    if (isset($_SESSION['successMessage'])) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: "<?php echo $_SESSION['successMessage']; ?>",
            })
        </script>
    <?php unset($_SESSION['successMessage']);
    } ?>

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
    if (isset($_SESSION['darkk'])) {

        include '../components/sidebar.php';
    ?>

        <div class="container" style="padding-top: 10rem;">
            <table class="table p-3 table-striped table-bordered align-middle mb-0 border border-dark border-start-0 border-end-0 rounded-end" id="example" style="border: 1px solid whitesmoke !important; width: 100%; font-size: 15px !important;">
                <thead>
                    <tr>
                        <th>Date Created</th>
                        <th>ID</th>
                        <th>Tracking Number</th>
                        <th>Project Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM mrf WHERE uid = '" . $_SESSION['id'] . "' AND is_deleted = '0'";
                    $result = $link->query($query);
                    while ($row = $result->fetch_assoc()) {
                        $inputDate = $row['dt_now'];
                        $timestamp = strtotime($inputDate);
                        $formattedDate = date("F d, Y", $timestamp);
                    ?>
                        <tr>
                            <td><?php echo $formattedDate ?></td>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['tracking'] ?></td>
                            <td><?php echo $row['project_title'] ?></td>
                            <td>
                                <input type="hidden" name="ids" class="ids" id="ids" value="<?php echo $row['id']; ?>">
                                <button type="button" class="btn btnview" data-bs-toggle="modal" data-bs-target="#viewmrf" ><i class="bi bi-eye icon" style="color: black !important;"></i></button>
                                <button type="button" class="btn btnprint" id="btnprint" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Print MRF" onclick="location.href = 'print_mrf.php?id=<?php echo $row['id'] ?>'"><i class="bi bi-printer icon" style="color: black !important;"></i></button>
                                <a href="edit_mrf.php?id=<?php echo $row['id']?>" method="post" style="width: 0% !important;">
                                    <input type="hidden" name="edit_id" class="edit_id" id="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="button" class="btn btnedit" name="btnedit" id="btnedit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit MRF"><i class="bi bi-gear icon" style="color: black !important;"></i></button>
                                </a>

                                <input type="hidden" name="delete_id" class="delete_id" id="delete_id" value="<?php echo $row['id']; ?>">
                                <button type="button" class="btn btndelete" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete MRF"><i class="bi bi-trash3 icon" style="color: black !important;"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


        <!-- Modal for View MRF -->
        <div class="modal fade" id="viewmrf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">

                    </div>

                </div>
            </div>
        </div>




        


        <script>     
            // Viewing of MRF
            $(document).ready(function() {
                $('tbody').on('click', '.btnview', function() {
                    var Id = $(this).prev('.ids').val();
                    $('#viewmrf').modal('show');

                    // load the corresponding question(s) for the clicked row
                    $.ajax({
                        url: 'view_mrf.php',
                        type: 'post',
                        data: {
                            id: Id
                        },
                        success: function(response) {
                            $('#viewmrf .modal-body').html(response);
                        },
                        error: function() {
                            alert('Error.');
                        }
                    });
                });
            });


            // Deleting MRF
            $(document).ready(function() {
                $('.btndelete').click(function(e) {
                    e.preventDefault();

                    var deleteID = $(this).closest("tr").find('.delete_id').val();
                    Swal.fire({
                        title: "Are you sure you want to delete this MRF?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel",
                    }).then((willDelete) => {
                        if (willDelete.isConfirmed) {
                            $.ajax({
                                    type: "POST",
                                    url: "action.php",
                                    data: {
                                        "delete_button_click": 1,
                                        "deleteIDs": deleteID,
                                    },
                                    success: function(response) {

                                        Swal.fire({
                                            title: "Successfully Deleted!",
                                            icon: "success"
                                        }).then((result) => {
                                            location.reload();
                                        });

                                    }
                                });
                        }
                    });
                });
            });

            // Enabling Tooltips
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        </script>
<script>
            $(document).ready(function() {
                $('#example').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>


    <?php } ?>
</body>

</html>