<?php

include '../../inc/conn.php';

header('Content-Type: application/json');

$user_ID = $_GET['id'];

$sql = "Select * from `student_list` where user_id='$user_ID'";

$result = mysqli_query($con, $sql);

$data = array();

foreach ($result as $rowitem){
    
	$user_id = $rowitem['user_id'];
	$roll_no = $rowitem['roll_no'];
	$name = $rowitem['user_name'];
	$mobile = $rowitem['mobile_number'];
	$email = $rowitem['email'];
	$collage_id = $rowitem['clg_id'];
	$admission_Year = $rowitem['admision_Year'];
	$technology = $rowitem['technology'];
	$semester = $rowitem['current_semester'];
	// 
	// 
	$student_list['user_id'] = $user_id;
	$student_list['roll_no'] = $roll_no;
	$student_list['user_name'] = $name;
	$student_list['mobile_number'] = $mobile;
	$student_list['email'] = $email;
	$student_list['clg_id'] = $collage_id;
	$student_list['admission_Year'] = $admission_Year;
	$student_list['technology'] = $technology;
	$student_list['semester'] = $semester;
	
	array_push($data, $student_list);
	
}

echo json_encode($data);

?>