<?php

include '../../inc/conn.php';

header('Content-Type: application/json');

$technology = $_GET['tec'];

$sql = "Select * from `student_list` where technology='$technology'";

$result = mysqli_query($con, $sql);

$data = array();

foreach ($result as $rowitem) {

    $id = $rowitem['id'];
    $roll_no = $rowitem['roll_no'];
    $name = $rowitem['user_name'];
    $mobile = $rowitem['mobile_number'];
    $collage_id = $rowitem['clg_id'];
    $year = $rowitem['admision_Year'];
    // 
    // 
    $student_list['id'] = $id;
    $student_list['roll_no'] = $roll_no;
    $student_list['user_name'] = $name;
    $student_list['mobile_number'] = $mobile;
    $student_list['clg_id'] = $collage_id;
    $student_list['admission_Year'] = $year;

    array_push($data, $student_list);

}

echo json_encode($data);

?>