<?php

include '../../inc/conn.php';

header('Content-Type: application/json');

$user_ID = $_GET['id'];

$sql = "Select * from `teacher` where user_id='$user_ID'";

$result = mysqli_query($con, $sql);

$data = array();

foreach ($result as $rowitem){
    
	$user_id = $rowitem['user_id'];
	$name = $rowitem['user_name'];
	$mobile = $rowitem['mobile_number'];
	$type = $rowitem['type'];
	$technology = $rowitem['technology'];
	$position = $rowitem['position'];
	$email = $rowitem['email'];
	// 
	// 
	$doner_list['user_id'] = $user_id;
	$doner_list['user_name'] = $name;
	$doner_list['mobile_number'] = $mobile;
	$doner_list['type'] = $type;
	$doner_list['technology'] = $technology;
	$doner_list['position'] = $position;
	$doner_list['email'] = $email;
	
	array_push($data, $doner_list);
	
}

echo json_encode($data);

?>