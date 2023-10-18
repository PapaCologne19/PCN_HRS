<?php
include '../connect.php';
session_start();

// For Adding MRF
if (isset($_POST['process'])) {
    $tracking_number = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['tracking_number']))));
    $category = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['mrf_category']))));
    $category_name = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['category_name']))));
    $mrf_type = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['mrf_type']))));
    $client = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['client']))));
    $location = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['location']))));
    $project_title = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['projectTitle']))));
    $division = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['division']))));
    $ce_number = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['ce_number']))));
    $position_inhouse = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['position']))));
    $position_field = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['radio']))));
    $other_position_inhouse = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['other_position']))));
    $other_position_field = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['other_position1']))));
    $selected_position = ($_POST['mrf_type'] === 'INHOUSE') ? $position_inhouse : $position_field;
    $selected_other_position = ($_POST['mrf_type'] === 'INHOUSE') ? $other_position_inhouse : $other_position_field;
    $no_of_people_male = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['number_male']))));
    $no_of_people_female = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['number_female']))));
    $height_male = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['height_male']))));
    $height_female = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['height_female']))));
    $educational_background = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['educational_background']))));
    $pleasing_personality = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['pleasing_personality']))));
    $good_moral = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['good_moral']))));
    $work_experience = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['work_experience']))));
    $good_communication = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['good_communication']))));
    $physically_fit = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['physically_fit']))));
    $articulate = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['articulate']))));
    $other_personality = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['other_personality']))));
    $basic_salary = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['basic_salary']))));
    $transportation_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['transportation_allowance']))));
    $meal_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['meal_allowance']))));
    $communication_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['communication_allowance']))));
    $other_salary_package = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['other_salary_package']))));
    $employment_status = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['employment_status']))));
    $salary_schedule = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['salary_schedule']))));
    $work_duration = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['work_duration']))));
    $work_days = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['work_days']))));
    $time_schedule = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['time_schedule']))));
    $day_off = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['day_off']))));
    $outlet = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['outlet']))));
    $date_requested = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['date_requested']))));
    $date_needed = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['date_needed']))));
    $direct_report = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['direct_report']))));
    $job_position = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['job_position']))));
    $special_requirements = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['special_requirements']))));
    $prepared_by = preg_replace('/\s+/', ' ', (strtoupper($_SESSION['lastname'] . ", " . $_SESSION['firstname'])));
    $id = $_SESSION['id'];


    // Insert Query
    $query = "INSERT INTO mrf(tracking, mrf_category, mrf_category_name, type, client, location, project_title, division, ce_number, position, position_detail, np_male, 
        np_female, height_r, height_female, edu, pleasing_personality, moral, work_experience, comm_skills, physically, 
        articulate, others, basic_salary, transpo, meal, comm, other_allow, employment_stat, 
        salary_sched, work_duration, work_days, time_sched, day_off, outlet, dt_now, date_needed, drt, rp, special_requirements_others, uid, prepared_by)
        
                VALUES('$tracking_number', '$category', '$category_name', '$mrf_type', '$client', '$location', '$project_title', '$division', '$ce_number', '$selected_position', '$selected_other_position', '$no_of_people_male', 
        '$no_of_people_female', '$height_male', '$height_female', '$educational_background', '$pleasing_personality', '$good_moral', '$work_experience', '$good_communication', '$physically_fit', 
        '$articulate', '$other_personality', '$basic_salary', '$transportation_allowance', '$meal_allowance', '$communication_allowance', '$other_salary_package', '$employment_status',
        '$salary_schedule', '$work_duration', '$work_days', '$time_schedule', '$day_off', '$outlet', '$date_requested', '$date_needed', '$direct_report', '$job_position', '$special_requirements', '$id' , '$prepared_by')";

    $result = $link->query($query);
    $id = mysqli_insert_id($link);
    if ($result) {
        $_SESSION['successMessage'] = "Process Successfully";
        header("Location: index.php?id=$id");
    } else {
        $_SESSION['errorMessage'] = "Process Error";
        header("Location: index.php");
    }
}

// For Updating MRF 
if (isset($_POST['updatemrf'])) {
    $updateID = $_POST['updateID'];
    $category = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['mrf_category']))));
    $category_name = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['category_name']))));
    $mrf_type = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['mrf_type']))));
    $client = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['client']))));
    $location = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['location']))));
    $project_title = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['projectTitle']))));
    $division = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['division']))));
    $ce_number = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['ce_number']))));
    $position_inhouse = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['position']))));
    $position_field = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['radio']))));
    $other_position_inhouse = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['other_position']))));
    $other_position_field = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['other_position1']))));
    $selected_position = ($_POST['mrf_type'] === 'INHOUSE') ? $position_inhouse : $position_field;
    $selected_other_position = ($_POST['mrf_type'] === 'INHOUSE') ? $other_position_inhouse : $other_position_field;
    $no_of_people_male = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['number_male']))));
    $no_of_people_female = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['number_female']))));
    $height_male = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['height_male']))));
    $height_female = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['height_female']))));
    $educational_background = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['educational_background']))));
    $pleasing_personality = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['pleasing_personality']))));
    $good_moral = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['good_moral']))));
    $work_experience = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['work_experience']))));
    $good_communication = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['good_communication']))));
    $physically_fit = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['physically_fit']))));
    $articulate = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['articulate']))));
    $other_personality = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['other_personality']))));
    $basic_salary = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['basic_salary']))));
    $transportation_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['transportation_allowance']))));
    $meal_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['meal_allowance']))));
    $communication_allowance = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['communication_allowance']))));
    $other_salary_package = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['other_salary_package']))));
    $employment_status = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['employment_status']))));
    $salary_schedule = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['salary_schedule']))));
    $work_duration = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['work_duration']))));
    $work_days = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['work_days']))));
    $time_schedule = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['time_schedule']))));
    $day_off = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['day_off']))));
    $outlet = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['outlet']))));
    $date_needed = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['date_needed']))));
    $direct_report = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['direct_report']))));
    $job_position = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['job_position']))));
    $special_requirements = mysqli_real_escape_string($link, preg_replace('/\s+/', ' ', (strtoupper($_POST['special_requirements']))));

    $update_query = " UPDATE mrf 
        SET 
        mrf_category = '$category', 
        mrf_category_name = '$category_name', 
        type = '$mrf_type', 
        client = '$client', 
        location = '$location', 
        project_title = '$project_title', 
        division = '$division', 
        ce_number = '$ce_number', 
        position = '$selected_position', 
        position_detail = '$selected_other_position', 
        np_male = '$no_of_people_male', 
        np_female = '$no_of_people_female', 
        height_r = '$height_male', 
        height_female = '$height_female', 
        edu = '$educational_background', 
        pleasing_personality = '$pleasing_personality', 
        moral = '$good_moral', 
        work_experience = '$work_experience', 
        comm_skills = '$good_communication', 
        physically = '$physically_fit', 
        articulate = '$articulate', 
        others = '$other_personality', 
        basic_salary = '$basic_salary', 
        transpo = '$transportation_allowance', 
        meal = '$meal_allowance', 
        comm = '$communication_allowance', 
        other_allow = '$other_salary_package', 
        employment_stat = '$employment_status', 
        salary_sched = '$salary_schedule', 
        work_duration = '$work_duration', 
        work_days = '$work_days', 
        time_sched = '$time_schedule', 
        day_off = '$day_off', 
        outlet = '$outlet', 
        date_needed = '$date_needed', 
        drt = '$direct_report', 
        rp = '$job_position', 
        special_requirements_others = '$special_requirements' 
        WHERE id = '$updateID'";

    $update_result = $link->query($update_query);

    if ($update_result) {
        $_SESSION['successMessage'] = "Update Successfully";
        header("Location: mrf_list.php");
    } else {
        $_SESSION['errorMessage'] = "Update Error";
        header("Location: mrf_list.php");
    }
}

    if(isset($_POST['delete_button_click'])){
        $delete_id = $_POST['deleteIDs'];
        $delete_status = "1";

        $delete_query = "UPDATE mrf SET is_deleted = '$delete_status' WHERE id = '$delete_id'";
        $delete_result = $link->query($delete_query);

        if($delete_result){
            $_SESSION['successMessage'] = "Successfully Deleted";
            header("Location: mrf_list.php");
        }
        else{
            $_SESSION['errorMessage'] = "Delete Error";
            header("Location: mrf_list.php");
        }

    }
