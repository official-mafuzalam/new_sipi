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
    <title>Attendance History</title>

    <style>
        @media print {
            #no-print {
                display: none;
            }

            #print-btn {
                display: none;
            }

            .container {
                max-width: none;
                width: auto;
            }
        }
    </style>

</head>

<body>

    <?php
    include '../../inc/navbar.php';
    ?>

    <div class="container text-center">
        <a class="text-decoration-none" href="../../">
            <h2 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h2>
        </a>
        <p class="fs-4">Attendance History</p>
        <hr>
    </div>

    <div class="container text-center">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col fw-bold">
                <?php if (isset($_POST['submit_attendance'])) {
                    echo $search_technology = $_POST['technology'];
                } ?>
            </div>
            <div class="col fw-bold">
                <?php if (isset($_POST['submit_attendance'])) {
                    echo $search_technology = $_POST['semester'];
                } ?>
            </div>
            <div class="col fw-bold">
                <?php if (isset($_POST['submit_attendance'])) {
                    echo $search_technology = $_POST['date'];
                } ?>
            </div>
        </div>
    </div>

    <div class="container text-center" id="no-print">
        <form class="row g-3 d-flex" role="search" method="POST">
            <div class="col-md-3">
                <div class="input-group">
                    <input type="text" name="technology" id="technology" class="form-control" placeholder="Name"
                        value="<?php echo $session_technology; ?>" readonly>
                </div>
            </div>
            <div class="col-md-3">
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
            <div class="col-md-3">
                <input name="date" type="text" class="form-control" value="05/15/2023" required />
            </div>
            <div class="col-md-3">
                <button name="submit_attendance" type="submit" class="btn btn-success">Search</button>
            </div>
        </form>
    </div>

    <div class="container">

        <?php
        // Retrieve the book names from the database based on the search query
        if (isset($_POST['submit_attendance'])) {
            $search_technology = $_POST['technology'];
            $search_semester = $_POST['semester'];
            $search_date = $_POST['date'];
            $sql = "SELECT * FROM `stu_atten` WHERE technology ='$search_technology' && semester='$search_semester' && att_date = '$search_date' ORDER BY id ASC";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '
                    <table class="table table-striped table-hover table-bordered" id="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Technology</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Status</th>
                                <th scope="col" id="no-print">Action</th>
                            </tr>
                        </thead>
                    <tbody>';

                $counter = 1;

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $counter . '</td>'; // Display the serial number
                    echo '<td>' . $row['stu_name'] . '</td>';
                    echo '<td>' . $row['technology'] . '</td>';
                    echo '<td>' . $row['semester'] . '</td>';
                    if ($row['atten_status'] == 1) {
                        echo '<td>
                                <input type="radio" class="btn-check" id="success-outlined' . $row['user_id'] . '" autocomplete="on" checked>
                                <label class="btn btn-outline-success btn-sm" for="success-outlined' . $row['user_id'] . '">Present</label>
                            </td>';
                    } else {
                        echo '<td>
                                <input type="radio" class="btn-check" id="danger-outlined ' . $row['user_id'] . '" autocomplete="on" checked>
                                <label class="btn btn-outline-danger btn-sm" for="danger-outlined ' . $row['user_id'] . '">Absent</label>
                            </td>';
                    }
                    echo '<td id="no-print">
                            <button type="button" class="btn btn-warning btn-sm">
                                <a class="text-decoration-none" href="update_student_details.php?id=' . $row['id'] . '">Edit</a>
                            </button>
                        </td>';
                    echo '</tr>';
                    $counter++; // Increment the counter variable for the next row
                }
                echo '</tbody></table>';
                echo '<button id="print-btn" class="btn btn-primary btn-sm">Print</button>';
            } else {
                echo 'Data not found in the database';
            }
        }

        ?>

    </div>


    <script>
        document.getElementById("print-btn").addEventListener("click", function () {
            window.print();
        });
    </script>


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