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
$session_technology = $_SESSION['technology'];

?>

<!-- HTML File -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Result Publish</title>

</head>

<body>

    <?php
    include '../../inc/navbar.php';
    ?>

    <div class="container text-center">
        <a class="text-decoration-none" href="../../">
            <h2 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h2>
        </a>
        <p class="fs-4">Search technology & semester and select subject for publish result.</p>
        <hr>
    </div>

    <div class="container text-center">
        <form class="row g-3 d-flex" role="search" method="POST">
            <div class="col-md-4">
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
            </div>
            <div class="col-md-4">
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
            </div>
            <div class="col-md-4">
                <button name="submit_semester" type="submit" class="btn btn-success">Search</button>
            </div>
        </form>
    </div>

    <div class="container">

        <?php
        // Retrieve the book names from the database based on the search query
        if (isset($_POST['submit_semester'])) {
            $search_technology = $_POST['technology'];
            $search_semester = $_POST['semester'];
            $sql = "SELECT book_name FROM `subject_by_semester` WHERE technology ='$search_technology' && semester='$search_semester' ORDER BY s_no ASC";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<hr><form action="result_publish_form.php" method="POST">';
                echo '<input type="hidden" name="technology" value="' . $search_technology . '">';
                echo '<input type="hidden" name="semester" value="' . $search_semester . '">';
                echo '<select class="cars form-control" name="book_name" id="book_name">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['book_name'] . '">' . $row['book_name'] . '</option>';
                }
                echo '</select>';
                echo '<br>';
                echo '<button type="submit" class="btn btn-primary" name="submit">Submit</button>';
                echo '</form>';
            } else {
                echo 'No books found.';
            }


        }
        ?>


    </div>




    <!-- Bootstrap Script Link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>

    <!-- Bootstrap Script Link -->
</body>

</html>