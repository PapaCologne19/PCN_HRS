<?php 
include("connect.php");

	
	if(!empty($_GET['id']))
	{		
		$data=$link->myQuery("SELECT regDesc FROM region WHERE regCode = ?",array($_GET['id']))->fetchAll(PDO::FETCH_ASSOC);
	}

	echo $_GET['id'];
	// else
	// {
	// 	$data=$con->myQuery("SELECT DISTINCT sc.grade_lvl_sec_id, sc.grade_level_section, sd.sched_id FROM schedule_details sd INNER JOIN schedules sc ON sc.sched_id = sd.sched_id WHERE sd.employee_id = '$emp_id' ")->fetchAll(PDO::FETCH_ASSOC);
	// }
	echo makeOptions($data);
?>