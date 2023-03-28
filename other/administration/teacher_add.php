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
    <title>Search Student</title>
</head>

<body>

    <?php
    include '../../inc/navbar.php';
    ?>

    <div class="container text-center">
        <h3 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h3>
        <p class="fs-4">Find student by semester & technology.</p>
        <a class="text-decoration-none" href="../../">
            <h3 class="text-center">Home</h3>
        </a>
    </div>

    <div class="container text-center">
        <h3 class="text-center">Student Add System</h3>
        <p class="fs-4">Fill the form for add a new student in database.</p>
        <hr>
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
                <input type="text" name="user_name" id="name" class="form-control" placeholder="Name" required>
            </div>
            <br>
            <div class="input-group">
                <select name="position" id="position" class="cars form-control" required>
                    <option value="" selected>Select Position</option>
                    <option value="CI">CI</option>
                    <option value="JR Instructor">JR Instructor</option>
                    <option value="Accountants">Accountants</option>
                    <option value="Others">Others</option>
                </select>
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
            <input class="submit btn btn-success save-btn" name="teacher_submit" type="submit" value="Save">

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