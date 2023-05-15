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
    <title>Book List</title>

</head>

<body>

    <?php
    include '../../inc/navbar.php';
    ?>

    <div class="container text-center">
        <a class="text-decoration-none" href="../../">
            <h2 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h2>
        </a>
        <p class="fs-4">Find Book List by semester & technology.</p>
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
                <button name="submit_book" type="submit" class="btn btn-success">Search</button>
            </div>
        </form>
    </div>
    <br>

    <div class="container">

        <?php
        // Retrieve the book names from the database based on the search query
        if (isset($_POST['submit_book'])) {
            $search_technology = $_POST['technology'];
            $search_semester = $_POST['semester'];
            $sql = "SELECT * FROM `subject_by_semester` WHERE technology ='$search_technology' && semester='$search_semester' ORDER BY s_no ASC";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '
                    <table class="table table-striped table-hover table-bordered" id="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Technology</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                        <tr>
                            <td>' . $row['s_no'] . '</td>
                            <td>' . $row['technology'] . '</td>
                            <td>' . $row['semester'] . '</td>
                            <td>' . $row['book_name'] . '</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm">
                                    <a class="text-decoration-none" href="update_book_name.php?id=' . $row['s_no'] . '">Edit</a>
                                </button>
                            </td>
                        </tr>';
                }
                echo '</tbody></table>';
            } else {
                echo 'Data not found in the database';
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