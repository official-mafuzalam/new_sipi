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
        <h3 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h3>
        <p class="fs-4">Attendance History</p>
        <a class="text-decoration-none" href="../../">
            <h3 class="text-center">Home</h3>
        </a>
    </div>

    <div class="container text-center">
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
                <input name="date" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required />
            </div>
            <div class="col-md-3">
                <button name="submit_attendance" type="submit" class="btn btn-outline-success mb-3">Search</button>
            </div>
        </form>
    </div>

    <div class="container">

        <table class="table table-striped table-hover" id="table">

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
                    <table class="table table-striped table-hover" id="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Status</th>
                                <th scope="col">Comment</th>
                            </tr>
                        </thead>
                    <tbody>';

                    $counter = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $counter . '</td>'; // Display the serial number
                        echo '<td>' . $row['stu_name'] . '</td>';
                        echo '<td>' . $row['semester'] . '</td>';
                        echo '<td>' . $row['atten_status'] . '</td>';
                        echo '<td>' . " " . '</td>';
                        echo '</tr>';
                        $counter++; // Increment the counter variable for the next row
                    }
                    echo '</tbody></table>';
                } else {
                    echo 'Data not found in the database';
                }
            }

            ?>


        </table>

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