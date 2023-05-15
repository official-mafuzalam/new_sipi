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
    <title>Search Teacher</title>

</head>

<body>

    <?php
    include '../../inc/navbar.php';
    ?>

    <div class="container text-center">
        <a class="text-decoration-none" href="../../">
            <h2 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h2>
        </a>
        <p class="fs-4">Find student by semester & technology.</p>
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
                <button name="submit_search" type="submit" class="btn btn-outline-success mb-3">Search</button>
            </div>
        </form>
    </div>

    <div class="container">

        <?php

        if (isset($_POST['submit_search'])) {
            $search_technology = $_POST['technology'];
            $sql = "SELECT * FROM `teacher` WHERE technology ='$search_technology' ORDER BY sno ASC";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '
                    <table class="table table-striped table-hover table-bordered" id="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">User Id</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Technology</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    <tbody>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                        <tr>
                            <td>' . $row['sno'] . '</td>
                            <td>' . $row['user_id'] . '</td>
                            <td>' . $row['user_name'] . '</td>
                            <td>' . $row['technology'] . '</td>
                            <td>' . $row['mobile_number'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm">
                                    <a class="text-decoration-none" href="update_teacher_details.php?user_id=' . $row['user_id'] . '">Edit</a>
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