<?php
include '../connect.php';
session_start();

    if(isset($_POST['process'])){
        $tracking_number = mysqli_real_escape_string($link, $_POST['tracking_number']);
        $category = mysqli_real_escape_string($link, $_POST['mrf_category']);
        $category_name = mysqli_real_escape_string($link, $_POST['category_name']);
        $mrf_type = mysqli_real_escape_string($link, $_POST['mrf_type']);
        $client = mysqli_real_escape_string($link, $_POST['client']);
        $location = mysqli_real_escape_string($link, $_POST['location']);
        $project_title = mysqli_real_escape_string($link, $_POST['projectTitle']);
        $division = mysqli_real_escape_string($link, $_POST['division']);
        $ce_number = mysqli_real_escape_string($link, $_POST['ce_number']);
        $position_inhouse = mysqli_real_escape_string($link, $_POST['position']);
        $position_field = mysqli_real_escape_string($link, $_POST['radio']);
        $other_position_inhouse = mysqli_real_escape_string($link, $_POST['other_position']);
        $other_position_field = mysqli_real_escape_string($link, $_POST['other_position1']);
        $selected_position = ($_POST['mrf_type'] === 'INHOUSE') ? $position_inhouse : $position_field;
        $selected_other_position = ($_POST['mrf_type'] === 'INHOUSE') ? $other_position_inhouse : $other_position_field;
        $no_of_people_male = mysqli_real_escape_string($link, $_POST['number_male']);
        $no_of_people_female = mysqli_real_escape_string($link, $_POST['number_female']);
        $height = (isset($_POST['height_male'])) ? $_POST['height_male'] : $_POST['height_female'];
        $educational_background = mysqli_real_escape_string($link, $_POST['educational_background']);
        $pleasing_personality = mysqli_real_escape_string($link, $_POST['pleasing_personality']);
        $good_moral = mysqli_real_escape_string($link, $_POST['good_moral']);
        $work_experience = mysqli_real_escape_string($link, $_POST['work_experience']);
        $good_communication = mysqli_real_escape_string($link, $_POST['good_communication']);
        $physically_fit = mysqli_real_escape_string($link, $_POST['physically_fit']);
        $articulate = mysqli_real_escape_string($link, $_POST['articulate']);
        $other_personality = mysqli_real_escape_string($link, $_POST['other_personality']);
        $basic_salary = mysqli_real_escape_string($link, $_POST['basic_salary']);
        $transportation_allowance = mysqli_real_escape_string($link, $_POST['transportation_allowance']);
        $meal_allowance = mysqli_real_escape_string($link, $_POST['meal_allowance']);
        $communication_allowance = mysqli_real_escape_string($link, $_POST['communication_allowance']);
        $other_salary_package = mysqli_real_escape_string($link, $_POST['other_salary_package']);
        $employment_status = mysqli_real_escape_string($link, $_POST['employment_status']);
        $salary_schedule = mysqli_real_escape_string($link, $_POST['salary_schedule']);
        $work_duration = mysqli_real_escape_string($link, $_POST['work_duration']);
        $work_days = mysqli_real_escape_string($link, $_POST['work_days']);
        $time_schedule = mysqli_real_escape_string($link, $_POST['time_schedule']);
        $day_off = mysqli_real_escape_string($link, $_POST['day_off']);
        $outlet = mysqli_real_escape_string($link, $_POST['outlet']);
        $date_requested = mysqli_real_escape_string($link, $_POST['date_requested']);
        $date_needed = mysqli_real_escape_string($link, $_POST['date_needed']);
        $direct_report = mysqli_real_escape_string($link, $_POST['direct_report']);
        $job_position = mysqli_real_escape_string($link, $_POST['job_position']);
        $special_requirements = mysqli_real_escape_string($link, $_POST['special_requirements']);

        
        // Insert Query
        $query = "INSERT INTO mrf(tracking, mrf_category, mrf_category_name, type, client, location, project_title, division, ce_number, position, position_detail, np_male, 
        np_female, height_r, edu, pleasing_personality, moral, work_experience, comm_skills, physically, 
        articulate, others, basic_salary, transpo, meal, comm, other_allow, employment_stat, 
        salary_sched, work_duration, work_days, time_sched, day_off, outlet, dt_now, date_needed, drt, rp, special_requirements_others)
        
                VALUES('$tracking_number', '$category', '$category_name', '$mrf_type', '$client', '$location', '$project_title', '$division', '$ce_number', '$selected_position', '$selected_other_position', '$no_of_people_male', 
        '$no_of_people_female', '$height', '$educational_background', '$pleasing_personality', '$good_moral', '$work_experience', '$good_communication', '$physically_fit', 
        '$articulate', '$other_personality', '$basic_salary', '$transportation_allowance', '$meal_allowance', '$communication_allowance', '$other_salary_package', '$employment_status',
        '$salary_schedule', '$work_duration', '$work_days', '$time_schedule', '$day_off', '$outlet', '$date_requested', '$date_needed', '$direct_report', '$job_position', '$special_requirements')";

        $result = $link->query($query);
        $id = mysqli_insert_id($link);
        if($result){
            $_SESSION['successMessage'] = "Process Successfully";
            header("Location: index.php?id=$id");
        } else{
            $_SESSION[''] = "Process Error";
            header("Location: index.php");
        }

    }
