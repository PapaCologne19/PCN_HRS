<?php
session_start();
include 'connect.php';
$appnum1 = $_SESSION['appnum2'];
$appnum3 = $_SESSION['appko'];
$view = "Applicant Shortlist Details (" . $appnum3 . ")";
?>
<center>

    <h2 class="fs-2">
        <font color="black"><?php echo $view ?></font>
    </h2>
    <br>
    <table id="example" class="table table-bordered p-3 table-sm align-middle p-3 border border-info border-start-0 border-end-0 rounded-end" style="width:100%;">
        <thead>
            <tr>
                <th> List of Project </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $resulty = mysqli_query($link, "SELECT * FROM shortlist_master WHERE appnumto = '$appnum1'");
            while ($rowy = mysqli_fetch_row($resulty)) { ?>
                <tr>
                    <td> <?php echo $rowy[1] ?> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</center>