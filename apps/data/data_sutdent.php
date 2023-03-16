<?php

include '../../inc/conn.php';

header('Content-Type: application/json');

$sql = "SELECT * FROM student_list ORDER BY id ASC";
$result = mysqli_query($con, $sql);
$rowcount = mysqli_num_rows($result);

$data = array();

foreach ($result as $rowitem) {

    $id = $rowitem['id'];
    $user_id = $rowitem['user_id'];
    $roll_no = $rowitem['roll_no'];
    $clg_id = $rowitem['clg_id'];
    $user_name = $rowitem['user_name'];
    $technology = $rowitem['technology'];
    $admision_Year = $rowitem['admision_Year'];
    $mobile_number = $rowitem['mobile_number'];
    // 
    // 
    $student_list['id'] = $id;
    $student_list['user_id'] = $user_id;
    $student_list['roll_no'] = $roll_no;
    $student_list['clg_id'] = $clg_id;
    $student_list['user_name'] = $user_name;
    $student_list['technology'] = $technology;
    $student_list['admision_Year'] = $admision_Year;
    $student_list['mobile_number'] = $mobile_number;

    array_push($data, $student_list);

}

echo json_encode($data);

?>