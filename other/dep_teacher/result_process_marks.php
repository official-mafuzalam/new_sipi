<?php

// Set the timezone to Bangladesh
date_default_timezone_set("Asia/Dhaka");
include '../../inc/conn.php';
session_start();

// Check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION['w_type'])) {
    header("Location: ../../login.php");
    exit();
}

$session_user_id = $_SESSION['user_id'];
$session_user_name = $_SESSION['username'];

// process form data here and save it to the database
$user_id = $_POST['user_id'];
$roll_no = $_POST['roll_no'];
$user_name = $_POST['user_name'];
$current_semester = $_POST['current_semester'];
$technology = $_POST['technology'];
$subject = $_POST['subject'];
$marks = $_POST['marks'];

// your database connection code here

$sql = "INSERT INTO marks_db (user_id, roll_no, user_name, semester, technology, subject, marks, inserter_id) 
                            VALUES ('$user_id','$roll_no','$user_name','$current_semester','$technology', '$subject', '$marks', '$session_user_id')";
$result = mysqli_query($con, $sql);

if ($result) {
    echo 'Data saved successfully!';
} else {
    echo 'Error occurred while saving data!';
}

?>