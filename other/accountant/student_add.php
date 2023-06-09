<?php

// Set the timezone to Bangladesh
date_default_timezone_set('Asia/Dhaka');
include '../../inc/conn.php';
session_start();

// Check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION['w_type'])) {
    header('Location: ../../login.php');
    exit();
}

$session_user_id = $_SESSION['user_id'];
$session_user_name = $_SESSION['username'];
$session_technology = $_SESSION['technology'];

if (isset($_POST['student_submit'])) {

    $technology = $_POST['technology'];
    $admision_Year = $_POST['admision_Year'];
    $semester = $_POST['semester'];
    $user_name = $_POST['user_name'];
    $gender = $_POST['gender'];
    $clg_id = $_POST['clg_id'];
    $roll_no = $_POST['roll_no'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];

    if (mysqli_connect_errno())
        echo "Couldn't connect to Database! <br>";

    // Generate a random number
    do {
        $random_num = rand(1000, 9999);
        $query = "SELECT user_id FROM student_list WHERE user_id = '$random_num'";
        $result = mysqli_query($con, $query);
    } while (mysqli_num_rows($result) > 0);

    // Insert data into the database
    $sql = "INSERT INTO student_list (user_id, technology, admision_Year, current_semester, user_name, gender, clg_id, roll_no, mobile_number, email, inserter_id) 
    VALUES('$random_num','$technology', '$admision_Year','$semester' , '$user_name', '$gender' , '$clg_id' , '$roll_no', '$mobile_number', '$email', '$session_user_id') ";
    $result = mysqli_query($con, $sql);


    if ($result)
        echo "<script>alert('Student Data Inserted Successfully')
        window.location.href = 'index.php';
        </script>";
    else
        echo "Query error!";

}

?>

<!-- HTML File -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Student Add</title>
</head>

<body>

    <?php
    include '../../inc/navbar.php';
    ?>

    <div class="container text-center">
        <a class="text-decoration-none" href="../../">
            <h2 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h2>
        </a>
        <p class="fs-4">Fill the form for add a new student in database.</p>
    </div>

    <div class="container text-center">
        <form class="form-inline" action="" method="POST">
            <div class="input-group">
                <select name="technology" id="technology" class="cars form-control" required>
                    <option value="" selected>Select a Technology</option>
                    <option value="Computer">Computer</option>
                    <option value="Graphic">Graphic</option>
                    <option value="RAC">RAC</option>
                    <option value="Civil">Civil</option>
                    <option value="Electronic">Electronic</option>
                    <option value="Electrical">Electrical</option>
                    <option value="Architecture">Architecture</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <br>
            <div class="input-group">
                <select name="admision_Year" id="admisionYear" class="cars form-control" required>
                    <option value="" selected>Select Seasons</option>
                    <option value="18-19">18-19</option>
                    <option value="19-20">19-20</option>
                    <option value="20-21">20-21</option>
                    <option value="21-22">21-22</option>
                    <option value="22-23">22-23</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <br>
            <div class="input-group">
                <select name="semester" id="semester" class="cars form-control" required>
                    <option value="" selected>Select Semester</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                    <option value="6th">6th</option>
                    <option value="7th">7th</option>
                    <option value="8th">8th</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <br>
            <div class="input-group">
                <input type="text" name="user_name" id="name" class="form-control" placeholder="Name" required>
            </div>
            <br>
            <div class="input-group">
                <select name="gender" id="admisionYear" class="cars form-control" required>
                    <option value="" selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <br>
            <div class="input-group">
                <input type="text" name="clg_id" id="clgId" class="form-control" placeholder="Collage ID" required>
            </div>
            <br>
            <div class="input-group">
                <input type="number" name="roll_no" id="Roll" class="form-control" placeholder="Roll no" required>
            </div>
            <br>
            <div class="input-group">
                <input type="tel" name="mobile_number" id="name" class="form-control" placeholder="Mobile number"
                    required>
            </div>
            <br>
            <div class="input-group">
                <input type="tel" name="email" id="name" class="form-control" placeholder="Email" required>
            </div>
            <br>
            <input class="submit btn btn-success save-btn" name="student_submit" type="submit" value="Save">

        </form>
    </div>

    <!-- Bootstrap Script Link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
        </script>

    <!-- Bootstrap Script Link -->
</body>

</html>