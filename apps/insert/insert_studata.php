<?php

include '../../inc/conn.php';

$technology = $_GET['t'];
$admision_Year = $_GET['ay'];
$semester = $_GET['sem'];
$user_name = $_GET['un'];
$gender = $_GET['g'];
$clg_id = $_GET['ci'];
$roll_no = $_GET['rn'];
$mobile_number = $_GET['mn'];
$email = $_GET['m'];

// Generate a random number
do {
    $random_num = rand(1000, 9999);
    $query = "SELECT user_id FROM student_list WHERE user_id = '$random_num'";
    $result = mysqli_query($con, $query);
} while (mysqli_num_rows($result) > 0);

// Insert data into the database
$sql = "INSERT INTO student_list (user_id, technology, admision_Year, current_semester, user_name, gender, clg_id, roll_no, mobile_number, email) 
        VALUES('$random_num','$technology', '$admision_Year','$semester' , '$user_name', '$gender' , '$clg_id' , '$roll_no', '$mobile_number', '$email') ";
$result = mysqli_query($con, $sql);

if ($result)
    echo $random_num;
else
    echo "Server Problem!";

?>