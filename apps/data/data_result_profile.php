<?php

include '../../inc/conn.php';

header('Content-Type: application/json');

$user_ID = $_GET['user_id'];

$sql = "Select * from `marks_db` where user_id='$user_ID'";

$result = mysqli_query($con, $sql);

$data = array();

foreach ($result as $rowitem){
    
	$subject = $rowitem['subject'];
	$marks = $rowitem['marks'];
	$technology = $rowitem['technology'];
	$semester = $rowitem['semester'];
	// 
	// 
	$student_list['subject'] = $subject;
	$student_list['marks'] = $marks;
	$student_list['technology'] = $technology;
	$student_list['semester'] = $semester;
	
	array_push($data, $student_list);
	
}

echo json_encode($data);

?>