<?php

include '../../inc/conn.php';

header('Content-Type: application/json');


$sql = "SELECT * FROM teacher ORDER BY sno ASC";
$result = mysqli_query($con, $sql);
$rowcount = mysqli_num_rows($result);

$data = array();

foreach ($result as $rowitem) {

    $sno = $rowitem['sno'];
    $user_id = $rowitem['user_id'];
    $user_name = $rowitem['user_name'];
    $technology = $rowitem['technology'];
    $position = $rowitem['position'];
    $mobile_number = $rowitem['mobile_number'];
    $email = $rowitem['email'];
    // 
    // 
    $teacher_list['sno'] = $sno;
    $teacher_list['user_id'] = $user_id;
    $teacher_list['user_name'] = $user_name;
    $teacher_list['technology'] = $technology;
    $teacher_list['position'] = $position;
    $teacher_list['mobile_number'] = $mobile_number;
    $teacher_list['email'] = $email;

    array_push($data, $teacher_list);

}

echo json_encode($data);

?>