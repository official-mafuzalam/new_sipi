<?php

include '../../inc/conn.php';

header('Content-Type: application/json');

$technology = $_GET['tec'];
$semester = $_GET['sem'];

$sql = "Select * from `subject_by_semester` where technology='$technology' && semester='$semester'";

$result = mysqli_query($con, $sql);

$data = array();

foreach ($result as $rowitem) {

    $book_name = $rowitem['book_name'];
    // 
    // 
    $doner_list['book_name'] = $book_name;

    array_push($data, $doner_list);

}

echo json_encode($data);

?>