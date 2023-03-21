<?php

include '../../inc/conn.php';

header('Content-Type: application/json');

$user_ID = $_GET['user_id'];

$sql = "SELECT * FROM `fees_deposit` WHERE user_id ='$user_ID'";

$result = mysqli_query($con, $sql);

$data = array();

foreach ($result as $rowitem){
    
	$date = $rowitem['date'];
	$current_semester = $rowitem['current_semester'];
	$deposit_category = $rowitem['deposit_category'];
	$deposit_amount = $rowitem['deposit_amount'];
	$comment = $rowitem['comment'];
	$deposit_challan_no = $rowitem['deposit_challan_no'];
	// 
	// 
	$student_list['date'] = $date;
	$student_list['current_semester'] = $current_semester;
	$student_list['deposit_category'] = $deposit_category;
	$student_list['deposit_amount'] = $deposit_amount;
	$student_list['comment'] = $comment;
	$student_list['deposit_challan_no'] = $deposit_challan_no;
	
	array_push($data, $student_list);
	
}

echo json_encode($data);

?>