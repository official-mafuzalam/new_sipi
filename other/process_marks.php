<?php

include '../inc/conn.php';
// process form data here and save it to the database
$user_id = $_POST['user_id'];
$roll_no = $_POST['roll_no'];
$user_name = $_POST['user_name'];
$current_semester = $_POST['current_semester'];
$technology = $_POST['technology'];
$subject = $_POST['subject'];
$marks = $_POST['marks'];

// your database connection code here

$sql = "INSERT INTO marks_db (user_id, roll_no, user_name, semester, technology, subject, marks) 
                            VALUES ('$user_id','$roll_no','$user_name','$current_semester','$technology', '$subject', '$marks')";
$result = mysqli_query($con, $sql);

if ($result) {
    echo 'Data saved successfully!';
} else {
    echo 'Error occurred while saving data!';
}

?>